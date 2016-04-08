<?php

use yii\db\Migration;

class m160408_092432_create_memberinfo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%memberinfo}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'address' => $this->string()->notNull(),
            'discribe' => $this->string()->notNull(),
            'sex' => $this->smallInteger()->notNull(),
            'age' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%memberinfo}}');
    }
}
