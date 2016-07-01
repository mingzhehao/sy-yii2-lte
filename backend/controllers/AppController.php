<?php

namespace backend\controllers;

class AppController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
