<?php
/***************************************************************************
 * 控制台
 * Copyright (c) 2016 songyun, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file Console.php
 * @author song(mingzhehao@github.com)
 * @date 2016/04/13 11:00:29
 *  
 **/
namespace console\controllers;

use common\Util\Logger;
use yii\console\Controller;
use yii\db\Query;

class Console extends Controller{
    public function getDb($db = 'db')
    {   
        return \Yii::$app->$db;
    }   

    public static function query(){
        return new Query();
    }   

    public function trace($msg)
    {   
        Logger::log('tmp_file', $msg);
    }   
}

?>
