<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "memberinfo".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $discribe
 * @property integer $sex
 * @property integer $age
 * @property integer $created_at
 * @property integer $updated_at
 */
class Memberinfo extends \common\models\CustomActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memberinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'discribe', 'sex', 'age'], 'required'],
            [['sex', 'age', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address', 'discribe'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'address' => '地址',
            'discribe' => '简介',
            'sex' => '性别',
            'age' => '年龄',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
