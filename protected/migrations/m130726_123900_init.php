<?php
class m130726_123900_init extends CDbMigration
{
    public function safeUp()
    {
        $options = '';

        if (Yii::app()->db->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        }

        // user
        $this->createTable('user', array(
            'id' => 'pk',
            'username' => 'string NOT NULL COMMENT \'ユーザ名\'',
            'email' => 'string NOT NULL COMMENT \'メールアドレス\'',
            'password' => 'string NOT NULL COMMENT \'パスワード\'',
        ), $options);

        $this->createIndex('user_username', 'user', 'username', true);
        $this->createIndex('user_email', 'user', 'email', true);

        // word
        $this->createTable('word', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'en' => 'string NOT NULL COMMENT \'英単語\'',
            'ja' => 'string NOT NULL COMMENT \'日本語訳\'',
        ), $options);

        $this->addForeignKey('fk_word_user_id', 'word', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('word_en_user_id', 'word', 'user_id, en');
    }

    public function safeDown()
    {
        $this->dropTable('word');
        $this->dropTable('user');
    }
}

