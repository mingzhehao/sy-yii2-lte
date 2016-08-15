<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        //配置request 为了让restful接口返回json格式,但是不好使
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            /**
             * notice: 自定义接口 和 restful接口
             */
            /*自定义接口-start*/
            'rules' => [
                '<controller:\w+>/<id:[\d\-]+>' => 'v1/<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:[\d\-]+>' => 'v1/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => 'v1/<controller>/<action>',
            ],
            /*自定义接口-end*/
            /*restful接口-start*/
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/user',
                        'v1/admin',
                    ]
                ],
            ],
            /*restful接口-end*/
        ],
    ],
    'modules' => [  // 添加模块v1和v2，分别表示不同的版本  
        'v1' => [  
            'class' => 'api\modules\v1\Module'  
        ],  
        'v2' => [  
            'class' => 'api\modules\v2\Module'  
        ]  
    ],
    'params' => $params,
];
