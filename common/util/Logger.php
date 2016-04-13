<?php
/***************************************************************************
 * 日志记录
 * Copyright (c) 2016 songyun, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
/**
 * @file common/util/Logger.php
 * @author song(mingzhehao@github.com)
 * @date 2016/03/30 15:14:26
 *  
 **/
namespace common\util;

class Logger
{
    public static function log($file, $data = "") 
    {   
        $path = \Yii::getAlias("@runtime") . '/logs/' . date("Y/m/d/") . $file . '.log';
        $dir_path = dirname($path);
        if(!is_dir($dir_path)) {
            @mkdir($dir_path, 0777, true);
            @chmod($dir_path, 0777);
        }   

        $data = sprintf("[%s] %s\n", date('Y-m-d H:i:s'), is_string($data)?$data:var_export($data, true));
        echo $data;
        file_put_contents($path, $data, FILE_APPEND);
    } 
}




?>
