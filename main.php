<?php
/***************************************************************************
 * yii2-swoole 主文件
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
/**
 * @file main.php
 * @author root(mingzhehao@github.com)
 * @date 2016/11/17 10:23:30
 *  
 **/


defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/common/config/bootstrap.php');
require(__DIR__ . '/console/config/bootstrap.php');

require(__DIR__ . '/swoole/SwooleService.php');
require(__DIR__ . '/swoole/SHttpServer.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common/config/main.php'),
    require(__DIR__ . '/common/config/main-local.php'),
    require(__DIR__ . '/console/config/main-swoole.php'),
    require(__DIR__ . '/console/config/main-local.php')
);

$application = new yii\web\Application($config);


$runtimePath = Yii::$app->getRuntimePath();
$defaultSetting = [
    'host'              => '127.0.0.1',
    'port'              => '9512',
    'process_name'      => 'swooleServ',
    'open_tcp_nodelay'  => '1',
    'daemonize'         => '1',
    'worker_num'        => '2',
    'task_worker_num'   => '2',
    'task_max_request'  => '10000',
    'pidfile'           => $runtimePath.'/swoole/yii2-swoole-async.pid',
    'log_dir'           => $runtimePath.'/swoole/log',
    'task_tmpdir'       => $runtimePath.'/swoole/task',
    'log_file'          => $runtimePath.'/swoole/log/http.log',
    'log_size'          => 204800000,
];
try {
    $paramsSetting = Yii::$app->params['swooleAsync'];
}catch (yii\base\ErrorException $e) {
    throw new yii\base\ErrorException('Empty param swooleAsync in params. ',8);
}

$settings = yii\helpers\ArrayHelper::merge(
    $defaultSetting,
    $paramsSetting
);
$swooleService = new SwooleService($settings,$application);
$mode = isset($argv["1"])?$argv["1"]:"start";
switch ($mode) {
    case 'start':
        $swooleService->serviceStart();
        break;
    case 'restart':
        $swooleService->serviceStop();
        $swooleService->serviceStart();
        break;
    case 'stop':
        $swooleService->serviceStop();
        break;
    case 'stats':
        $swooleService->serviceStats();
        break;
    case 'list':
        $swooleService->serviceList();
        break;
    default:
        exit('error:参数错误');
}
?>
