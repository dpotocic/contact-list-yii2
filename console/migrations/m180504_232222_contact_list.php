<?php

use yii\db\Migration;

class m180504_232222_contact_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%contact}}', [
                'id' => $this->primaryKey(),
                'first_name' => $this->string(255)->null(),
                'last_name' => $this->string(255)->null(),
                'profile_photo' => $this->string(255)->null(),
                'email' => $this->string(100)->notNull(),
                'status' => $this->smallInteger()->notNull()->defaultValue(1),
                'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            ], $tableOptions);

        $this->createTable('{{%contact_phone}}', [
                'id' => $this->primaryKey(),
                'contact_id' => $this->integer()->notNull(),
                'label' => $this->string(50)->notNull(),
                'phone_number' => $this->string(50)->notNull(),
            ], $tableOptions);

        $this->createTable('{{%contact_favorite}}', [
                'user_id' => $this->integer()->notNull(),
                'contact_id' => $this->integer()->notNull(),
            ], $tableOptions);

        $this->addPrimaryKey('user_favorite_pk', '{{%contact_favorite}}', ['user_id', 'contact_id']);
    }


    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
        $this->dropTable('{{%contact_phone}}');
        $this->dropTable('{{%contact_favorite}}');
    }
}
