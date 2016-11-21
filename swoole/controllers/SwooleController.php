<?php

namespace swoole\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SwooleController implements the CRUD actions for Swoole model.
 */
class SwooleController extends \yii\web\Controller
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
     * Lists all Swoole models.
     * @return mixed
     */
    public function actionIndex()
    {
        return '{
            "provider": "ali.scm:show",
            "code": 1,
            "desc": "successed!",
            "cost": 0.034268140792847,
            "data": {
                "user_id": 1766,
                "user_name": "trijif",
                "user_level": 8,
                "user_image": {
                    "large": "http://g2.ykimg.com/0130391F48554CE2C9F77E000006E6737994D9-7B66-C416-7E19-5CDA1498E7C5",
                    "big": "http://g3.ykimg.com/0130391F48554CE2CAC0EE000006E642B6C2D6-02D9-9AD7-51A0-AC0B14127BCE",
                    "middle": "http://g3.ykimg.com/0130391F48554CE2CAC59C000006E6C3E0BFC9-57CF-939B-B5F0-1C5B96EB7931",
                    "small": "http://g3.ykimg.com/0130391F48554CE2CAE450000006E6DE25C0EF-216B-5566-6660-C05E1F05E660"
                },
                "verify_status": 4,
                "servicer_verify_status": 0
            }
        }';
    }

}
