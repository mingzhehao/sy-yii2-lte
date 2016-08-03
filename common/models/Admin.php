<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Admin extends \common\models\CustomActiveRecord
{
    var $password_hash_new;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['status','role', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => '认证Key',
            'password_hash' => '密码',
            'password_hash_new' => '密码',
            'password_reset_token' => '密码重置Token',
            'email' => '邮箱',
            'status' => '状态',
            'role' => '角色',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function beforeSave($insert)
    {
        $password_hash_new = Yii::$app->request->post('password_hash_new');
        if($this->isNewRecord)
        {   
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
            $this->auth_key   = Yii::$app->security->generateRandomString();
            $this->password_reset_token = NULL; 
        }   
        else
        {   
            $this->updated_at=time();
            if(!empty($password_hash_new)) 
            {   
                $this->password_hash = Yii::$app->security->generatePasswordHash($password_hash_new);
            }  
        } 
        if(empty($this->password_hash))
        {
            $this->addError('password_hash','密码不可为空');
        }
        return parent::beforeSave($insert);
    }

}
