<?php

namespace common\modules\user\controllers;

use yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\User;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\helpers\Url;

use common\modules\user\models\CropAvatar;
use yii\web\UploadedFile;

class HomeController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','login'],
                'rules' => [
                    [
                        'actions' => ['signup','login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            // 'pageCache' => [
            //     'class' => 'yii\filters\PageCache',
            //     'only' => ['show'],//首页进行页面缓存
            //     'duration' => 3600,
            //     'variations' => [
            //         \Yii::$app->language,
            //     ],
            // ]
        ];
    }

    /*用户个人主页*/
    public function actionIndex()
    {
        $id = Yii::$app->request->getQueryParam('id');
        if(isset($id) && !empty($id))
            $model = User::findIdentity($id);
        else
            $model = User::findIdentity(Yii::$app->user->id);
        if(empty($model))
        {
            return $this->render('error',['id'=>$id]);
        }
        $this->layout = 'left_user';
        return $this->render('index',['model'=>$model,]);
    }

    /*用户基本信息对外展示设置*/
    public function actionShow()
    {   
        $params = Yii::$app->request->get();
        $model = User::findIdentity(Yii::$app->user->id);
        if(Yii::$app->user->id != $params['id'])
        {       
            return $this->render('error',['id'=>Yii::$app->user->id]);
        }
        if(empty($model))
        {   
            return $this->render('error',['id'=>Yii::$app->user->id]);
        }   
        $this->layout = 'left_user_setting';
        return $this->render('setting',['model'=>$model,]);
    }   


    /*用户头像设置*/
    public function actionAvatar()
    {
        $model = User::findIdentity(Yii::$app->user->id);
        $this->layout = 'left_user_setting';

        if (Yii::$app->request->isPost) {
            $postAvatar = Yii::$app->request->post();
            $crop = new CropAvatar($postAvatar['avatar_src'], $postAvatar['avatar_data'], $_FILES['avatar_file']);
            $result = explode('.',$crop -> getResult());
            $resultShow = '/'.$result['0'].'_big.'.$result['1'];/*添加/进行输出*/
            $response = array(
                'state'  => 200,
                'message' => $crop -> getMsg(),
                'result' => $resultShow
            );
            $model->photo = $result['0'].'.'.$result['1'];
            $model->save();
            echo(json_encode($response));exit;

        }
        
        $userImage = explode('.',Yii::$app->user->getIdentity()->photo);
        if(empty($userImage) || empty(Yii::$app->user->getIdentity()->photo))
        {
            $userImageSrc = Yii::getAlias('@backend/web/images/');
            $userMiddleImage = "images/noavatar_middle.gif";
            $userBigImage    = "images/noavatar_big.gif";
        }
        else
        {
            $userMiddleImage = $userImage['0'].'_middle.'.$userImage['1'];
            $userBigImage = $userImage['0'].'_big.'.$userImage['1'];
        }
        return $this->render('avatarCropper', [
                'model' => $model,
                'userMiddleImage'=>$userMiddleImage,
                'userBigImage'=>$userBigImage,
                ]);
    }

}
