<?php
return [
    'name'=>'云管理后台',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            'defaultRoles' => ['guest'],
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'db'=>[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars'=>[],
                    'logTable'=>'{{%system_log}}'
                ]
            ],
        ],
        'keyStorage' => [                                    
            'class' => 'common\components\keyStorage\KeyStorage'
        ],  
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
                // configure more hosts if you have a cluster
            ],
        ],
        'mailer' => [ 
            'class' => 'yii\swiftmailer\Mailer', 
            'viewPath' => '@common/mail', 
            // send all mails to a file by default. You have to set 
            // 'useFileTransport' to false and configure a transport 
            // for the mailer to send real emails. 
            'useFileTransport' => false, //false 发送邮件，true 不发送邮件，只输出日志(console/runtime/mail)
            'transport' => [ 
                'class' => 'Swift_SmtpTransport', 
                'host' => 'smtp.126.com', 
                'username' => 'justtest126', 
                'password' => 'just126', //126，163 邮箱的授权码
                'port' => '25', 
                'encryption' => 'tls', 
            ], 
            'messageConfig'=>[ 
                'charset'=>'UTF-8', 
                'from'=>['justtest126@126.com'=>'justtest126'] 
            ], 
        ], 

    ],
];
