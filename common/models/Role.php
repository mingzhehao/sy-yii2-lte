<?php

namespace common\models;

use Yii;

/**
 */
class Role extends \yii\db\ActiveRecord
{

    //获取应用列表
    public static function getRoleList()
    {
        return  array(
                2 => "普通用户",
                1 => "管理员",
            );
    }

}

