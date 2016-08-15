<?php

namespace api\modules\v1;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'api\modules\v1\controllers';

    public function init()
    {
        \Yii::$app->request->parsers = ['application/json' => 'yii\web\JsonParser'];
        \Yii::$app->request->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        parent::init();

        // custom initialization code goes here
    }
}
