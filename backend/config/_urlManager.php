<?php
return [
    'class'=>'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=>[
        // url rules
        'User/<id:\d+>'=>'User/home',
        'User/<id:\d+>/show'=>'User/home/show',//用户基本信息展示
        'User/account'=>'User/home/account',
        'User/profile'=>'User/home/profile',
        'User/avatar'=>'User/home/avatar',
    ]
];
