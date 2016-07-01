<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "t_user_app".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $app_secret
 * @property string $app_name
 * @property string $app_type
 * @property integer $pid
 * @property string $pname
 * @property integer $create_time
 * @property integer $update_time
 */
class App extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user_app';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_app');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_name', 'app_type', 'pid', 'pname'], 'required'],
            [['app_id', 'pid', 'create_time', 'update_time'], 'integer'],
            [['app_secret', 'app_name', 'app_type', 'pname'], 'string', 'max' => 255],
            [['app_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'app_name' => '应用名称',
            'app_type' => '应用标识',
            'pid' => '合作方id',
            'pname' => '合作方名称',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }
}
