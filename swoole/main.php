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

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common/config/main.php'),
    require(__DIR__ . '/common/config/main-local.php'),
    require(__DIR__ . '/console/config/main.php'),
    require(__DIR__ . '/console/config/main-local.php')
);

$application = new yii\console\Application($config);


$runtimePath = Yii::$app->getRuntimePath();
$this->settings = [
    'host'              => '127.0.0.1',
    'port'              => '9512',
    'process_name'      => 'swooleServ',
    'open_tcp_nodelay'  => '1',
    'daemonize'         => '1',
    'worker_num'        => '2',
    'task_worker_num'   => '2',
    'task_max_request'  => '10000',
    'pidfile'         => $runtimePath.'/yii2-swoole-async/tmp/yii2-swoole-async.pid',
    'log_dir'           => $runtimePath.'/yii2-swoole-async/log',
    'task_tmpdir'       => $runtimePath.'/yii2-swoole-async/task',
    'log_file'          => $runtimePath.'/yii2-swoole-async/log/http.log',
    'log_size'          => 204800000,
];
try {
    $settings = Yii::$app->params['swooleAsync'];
}catch (yii\base\ErrorException $e) {
    throw new yii\base\ErrorException('Empty param swooleAsync in params. ',8);
}

$this->settings = yii\helpers\ArrayHelper::merge(
    $this->settings,
    $settings
);
$swooleService = new SwooleService($this->settings,Yii::$app);
$swooleService->serviceStart();

?>
