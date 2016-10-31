<?php
/***************************************************************************
 * 测试控制台
 * Copyright (c) 2016 songyun, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
/**
 * @file TestController.php
 * @author song(mingzhehao@github.com)
 * @date 2016/04/13 11:05:22
 *  
 **/

namespace console\controllers;
use common\models\Admin;

class SwooleController extends Console
{
    public function actionSwoole(){
        $data = [
            "data" => [
                [
                    "a" => "swoole/send",
                    "p" => ["测试邮件1","测试邮件2"]
                ],
            ],
            "finish" => [
                [
                    "a" => "swoole/receive",
                    "p" => ["测试邮件回调1","测试邮件回调2"]
                ],
            ]
        ];
        \Yii::$app->swooleasync->async(json_encode($data));
    }

    public function actionSend($a='',$b=''){
        echo "发送邮件：参数为 ".$a.'-'.$b."\n\n";
    }

    public function actionReceive($a='',$b=''){
        echo "接收邮件：参数为 ".$a.'-'.$b."\n\n";
    }  

    public function actionData()
    {
        $id = 1;
        #$model = Admin::find()->where(['id' => $id])->one();
        if (($model = Admin::findOne($id)) !== null) 
        {
            foreach($model->attributes as $key => $val)
            {
                echo $key." :\t$val\n";
            }
        }
    }
}





?>
