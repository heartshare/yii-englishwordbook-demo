<?php

/**
 * ActiveRecord class file.
 */
class ActiveRecord extends CActiveRecord
{
    /**
     * @see CModel::beforeValidate()
     */
    protected function beforeValidate()
    {
        foreach ($this->getSafeAttributeNames() as $attribute) {
            if ($this->tableSchema->columns[$attribute]->type === 'string') {
                $this->$attribute = trim(mb_convert_kana($this->$attribute, 's', Yii::app()->charset));
            }
        }
        return parent::beforeValidate();
    }

    /**
     * @see CActiveRecord::beforeSave()
     */
    protected function beforeSave()
    {
        if ($this->hasAttribute('user_id')) {
            $this->user_id = Yii::app()->getUser()->getId();
        }
        return parent::beforeSave();
    }
}

