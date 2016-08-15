<?php

namespace api\modules\v1\controllers;

use yii\web\Controller;
use common\models\Admin;

class TestController extends Controller
{
    public function actionIndex()  
    {  
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;  
        return [  
            'message' => '自定义接口输出',  
            'code' => 1,  
        ];  
    }  

    public function actionView($id)
    {
        $model=$this->findModel($id);
        echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);
    }
 
    /* function to find the requested record/model */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'Bad request'),JSON_PRETTY_PRINT);
            exit;
        }
    }
}
