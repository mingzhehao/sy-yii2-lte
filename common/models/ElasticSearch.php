<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "elasticsearch".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $title
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ElasticSearch extends \yii\elasticsearch\ActiveRecord
{
    /**
     * @return array the list of attributes for this record
     */
    public function attributes()
    {
        // path mapping for '_id' is setup to field 'id'
        return ['id', 'name', 'address', 'registration_date','title','status','created_at','updated_at'];
    }

    /**
     * @return ActiveQuery defines a relation to the Order record (can be in other database, e.g. redis or sql)
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id'])->orderBy('id');
    }

    /**
     * Defines a scope that modifies the `$query` to return only active(status = 1) customers
     */
    public static function active($query)
    {
        $query->andWhere(['status' => 1]);
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'elasticsearch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'title', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'title' => 'Title',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
