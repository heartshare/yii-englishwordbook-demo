<?php

/**
 * User class file.
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 */
class User extends ActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User|CActiveRecord active record model instance.
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * @see CActiveRecord::tableName()
     */
    public function tableName()
    {
        return 'user';
    }
}

