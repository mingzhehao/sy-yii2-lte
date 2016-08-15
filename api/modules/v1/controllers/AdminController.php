<?php

namespace api\modules\v1\controllers;
use yii\rest\ActiveController; 
use yii\web\Response;

class AdminController extends ActiveController
{
    public $modelClass = 'common\models\User';
    protected $formatType = 'json';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        switch($this->formatType)
        {
            default :
            case 'json' :
            case 'jsonp' :
                $formatType = Response::FORMAT_JSON;
                $behaviors['contentNegotiator']['formats'] = [];
                $behaviors['contentNegotiator']['formats']['application/json'] = $formatType;
                break;
            case 'xml' :
                $formatType = Response::FORMAT_XML;
                $behaviors['contentNegotiator']['formats'] = [];
                $behaviors['contentNegotiator']['formats']['application/xml'] = $formatType;
                break;            
            case 'html' :
                $formatType = Response::FORMAT_HTML;
                $behaviors['contentNegotiator']['formats'] = [];
                $behaviors['contentNegotiator']['formats']['html/text'] = $formatType;
                break;
        }
        return $behaviors;
    }
    }
