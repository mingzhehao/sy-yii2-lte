<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'defaultRoute'=>'timeline-event/index',
    'modules'=>[
        'i18n' => [
            'class' => 'backend\modules\i18n\Module',
            'defaultRoute'=>'i18n-message/index'
        ],
        /*rbac-admin*/
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'user_id'
                ]
            ],
            'menus' => [
                'assignment' => [
                    'label' => '授权分配' // change label
                ],
                'route' => '路由设定', // disable menu
                //'route' => null, // disable menu
            ],
        ],
        /*rbac-admin*/
    ],
    'components' => [
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'common\models\User',
            'loginUrl'=>['site/login'],
            'enableAutoLogin' => true,
        ],
        'urlManager' => require(__DIR__.'/_urlManager.php'), 
        'redis_cache' => [
            'class' => 'yii\redis\Cache',
        ],  
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            'defaultRoles' => ['guest'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            /*注意:角色访问控制基于此处配置+rbac数据配置+accessControll配置*/
            /**
             * 1 rbac 后台配置 用户，角色，权限，（权限下分配制定路由）
             * 2 此处首先开启部分功能，不然无法分配
             * 3 在结合对应控制的accessControl
             */
            'site/*',
            'rbac/*',
        ]
    ],
    'params' => $params,
];
