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

class TestController extends Console
{
    public function actionIndex()
    {
        exit("test console");
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
