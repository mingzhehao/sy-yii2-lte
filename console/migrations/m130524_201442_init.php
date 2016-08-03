<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'photo' => $this->string(255),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'role'   => $this->smallInteger()->notNull()->defaultValue(2),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'kladmin',
            'auth_key' => 'GT7jqZC03O-8jayvw7eZTfZMhykmbDiK',
            'password_hash' => '$2y$13$YoFXDVSFHXNx3D0ni3bepOlNg9vm8of0cpsayF8x9DRPmfUFxChWa',
            'password_reset_token' => null,
            'email' => 'kladmin@github.com',
            'status' => \common\models\User::STATUS_ACTIVE,
            'role' => 1,// 超级管理员 1
            'created_at' => time(),
            'updated_at' => time(),
        ]); 
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
    
    /**
                  id: 1
            username: kladmin
            auth_key: GT7jqZC03O-8jayvw7eZTfZMhykmbDiK
       password_hash: $2y$13$YoFXDVSFHXNx3D0ni3bepOlNg9vm8of0cpsayF8x9DRPmfUFxChWa
password_reset_token: NULL
               email: kladmin@github.com
              status: 10
          created_at: 1458110730
          updated_at: 1458110730
    **/

}
