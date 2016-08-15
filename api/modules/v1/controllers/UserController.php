<?php

namespace api\modules\v1\controllers;
use yii\rest\ActiveController; 
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
}
