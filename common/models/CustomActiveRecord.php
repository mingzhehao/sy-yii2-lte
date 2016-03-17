<?php
/***************************************************************************
 * 自定义ActiveRecord 供所有model继承
 * Copyright (c) 2016 songyun, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file CustomActiveRecord.php
 * @author song(mingzhehao@github.com)
 * @date 2016/03/17 17:00:00
 *  
 **/

namespace common\models;

use yii\behaviors\TimestampBehavior;


class CustomActiveRecord extends \yii\db\ActiveRecord
{
    private $old_data = NULL;
    /** 
     * @inheritdoc
     */
    public function behaviors()
    {   
        return [
            TimestampBehavior::className(),
        ];  
    }   

    public static function sql($sql="",$params=[])
    {
        return static::getDb()->createCommand($sql,$params);
    }

    public function getErrorString()
    {
        $string = "";
        foreach ($this->getErrors() as $key => $error) {
            $string .= sprintf("%s: %s; \n", $this->getAttributeLabel($key), implode("\n",$error));
        }
        return $string;
    }

    public function formName()
    {
        return "";
    }

}

