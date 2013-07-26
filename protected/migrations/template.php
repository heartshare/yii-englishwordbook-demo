<?php
class {ClassName} extends CDbMigration
{
    public function safeUp()
    {
        $options = '';

        if (Yii::app()->db->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        }
    }

    public function safeDown()
    {
    }
}

