<?php

namespace backend\controllers;

use Yii;
use common\models\App;
use common\models\AppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use linslin\yii2\curl;

/**
 * AppController implements the CRUD actions for App model.
 */
class AppController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all App models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single App model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new App model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new App();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post("App");
            extract($post);
            $curl = new curl\Curl();
            $url = "http://10.10.73.234:8001/oauth.yk/show/applyApplicationInfo.json?";
            $params = array(
                'pid'       =>  $pid,
                'pname'     =>  $pname,
                'app_name'  =>  $app_name,
                'app_type'  =>  $app_type,
            );
            $requestUrl = $url.http_build_query($params,'','&');
            $response = $curl->get($requestUrl);
            switch ($curl->responseCode) {
                case 'timeout':
                    //timeout error logic here
                    $model->addError(null, "timeout !");
                    break;
                case 200:
                    if(!empty($response))
                    {
                        $res = json_decode($response,1);
                        if(intval($res['code']) !== 1)
                        {
                            $model->addError(null, $res['desc']);
                        }
                        else
                        {
                            return $this->redirect(['index']);
                        }
                    }
                    break;
                case 404:
                    //404 Error logic here
                    $model->addError(null, "404 Not Found !");
                    break;
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing App model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing App model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the App model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return App the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = App::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
