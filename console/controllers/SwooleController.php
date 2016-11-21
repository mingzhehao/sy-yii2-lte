<?php
/***************************************************************************
 * 测试控制台
 * Copyright (c) 2016 songyun, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
/**
 * @file TestController.php
 * @author song(mingzhehao@github.com)
 * @date 2016/04/13 11:05:22
 *  
 **/

namespace console\controllers;
use common\models\Admin;
use Hprose\Http\Server;
use console\controllers\SwooleService;

class SwooleController extends Console
{
    public function actionSwoole(){
        $data = [
            "data" => [
                [
                    "a" => "swoole/send",
                    "p" => ["测试邮件1","测试邮件2"]
                ],
            ],
            "finish" => [
                [
                    "a" => "swoole/receive",
                    "p" => ["测试邮件回调1","测试邮件回调2"]
                ],
            ]
        ];
        \Yii::$app->swooleasync->async(json_encode($data));
    }

    public function actionSend($a='',$b=''){
        echo "发送邮件：参数为 ".$a.'-'.$b."\n\n";
    }

    public function actionReceive($a='',$b=''){
        echo "接收邮件：参数为 ".$a.'-'.$b."\n\n";
    }  

    public function actionData()
    {
        return '{
            "provider": "ali.scm:show",
            "code": 1,
            "desc": "successed!",
            "cost": 0.034268140792847,
            "data": {
                "user_id": 1766,
                "user_name": "trijif",
                "user_level": 8,
                "user_image": {
                    "large": "http://g2.ykimg.com/0130391F48554CE2C9F77E000006E6737994D9-7B66-C416-7E19-5CDA1498E7C5",
                    "big": "http://g3.ykimg.com/0130391F48554CE2CAC0EE000006E642B6C2D6-02D9-9AD7-51A0-AC0B14127BCE",
                    "middle": "http://g3.ykimg.com/0130391F48554CE2CAC59C000006E6C3E0BFC9-57CF-939B-B5F0-1C5B96EB7931",
                    "small": "http://g3.ykimg.com/0130391F48554CE2CAE450000006E6DE25C0EF-216B-5566-6660-C05E1F05E660"
                },
                "verify_status": 4,
                "servicer_verify_status": 0
            }
        }';
    }

    /**
     * 用户服务
     * @return mixed
     */
    public function actionUser() {
        $service = new SwooleServiceController();

        $server = new Server();
        $server->addInstanceMethods($service);

        return $server->start();
    }

}





?>
