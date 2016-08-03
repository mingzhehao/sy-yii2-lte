<?php
/***************************************************************************
 * 基类控制器
 * Copyright (c) 2016 songyun, Inc. All Rights Reserved
 * 
 **************************************************************************/
/**
 * @file backend/controllers/Controller.php
 * @author song(mingzhehao@github.com)
 * @date 2016/03/28 17:36:43
 *  
 **/

namespace backend\controllers;


class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {   
        $this->layout = \Yii::$app->user->isGuest ? 'base' : 'common';
        if (\Yii::$app->getUser()->getIsGuest()) {
            return $this->redirect(['/site/login']);
        }   
        $this->layout = "main"; //统一使用main模板
        return parent::beforeAction($action);
    }   

    public function json($code = 0, $msg = '', $data = '') 
    {   
        $ret = [ 
            'code' => $code,
            'msg' => $msg,
        ];
        if (!empty($data)) {
            $ret['data'] = $data;
        }

        header('Content-type:application/json;charset=utf-8');
        echo json_encode($ret);
        exit;
    }

}






?>
