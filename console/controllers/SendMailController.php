<?php
/***************************************************************************
 * 邮件发送
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 **************************************************************************/
 
 
 
/**
 * @file console/controllers/MailController.php
 * @author root(mingzhehao@github.com)
 * @date 2016/08/11 13:48:28
 **/

namespace console\controllers;

class SendMailController extends Console
{
    /**
     * 邮件发送主方法
     **/
    public function actionSendMultiple()
    {
        $users = ['190833714@qq.com', '190833714@qq.com']; 
        $messages = []; 
        foreach ($users as $user) 
        {
            $messages[] = Yii::$app->mailer->compose() 
            ->setTo($user) 
            ->setSubject('测试主题') 
            ->setHtmlBody('测试内容'); 
        } 
        Yii::$app->mailer->sendMultiple($messages);
    }

    public function actionSendOne()
    {
        $mail= \Yii::$app->mailer->compose(); 
        $mail->setTo('190833714@qq.com'); //要发送给那个人的邮箱 
        $mail->setSubject("邮件主题"); //邮件主题 
        //$mail->setTextBody('测试text'); //发布纯文字文本 
        $mail->setHtmlBody("测试html text"); //发送的消息内容 
        var_dump($mail->send());
    }

}





