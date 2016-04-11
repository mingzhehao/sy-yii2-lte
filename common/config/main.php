<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'zh-CN',
    'modules' => [
        'User' => [
            'class' => 'common\modules\user\Module',//大写User处理module模块，user是后台管理使用
        ], 
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]       
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
             'theme' => [
                 'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                 ],
             ],
         ],
        'i18n' => [
            'translations' => [
                'app'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                ],
                '*'=> [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                    'fileMap'=>[
                        'common'=>'common.php',
                        'backend'=>'backend.php',
                        'frontend'=>'frontend.php',
                    ],
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
                ],
            ],
        ],
        //'log' => [
        //    'traceLevel' => YII_DEBUG ? 3 : 0,
        //    'targets' => [
        //        'db'=>[
        //            'class' => 'yii\log\DbTarget',
        //            'levels' => ['error', 'warning'],
        //            'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
        //            'prefix'=>function () {
        //                $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
        //                return sprintf('[%s][%s]', Yii::$app->id, $url);
        //            },
        //            'logVars'=>[],
        //            'logTable'=>'{{%system_log}}'
        //        ]
        //    ],
        //],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
                // configure more hosts if you have a cluster
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' =>  [
                        'User/<id:\d+>'=>'User/home',
                        'User/avatar'=>'User/home/avatar',
                        'User/setting'=>'User/home/show',
                ],  
        ],  
    ],
];
