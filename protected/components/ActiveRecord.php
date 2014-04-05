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
            $columns = $this->tableSchema->columns;

            $a = isset($columns[$attribute]) && $columns[$attribute]->type === 'string';
            $b = !isset($columns[$attribute]) && is_string($this->$attribute);

            if ($a || $b) {
                $this->$attribute = mb_trim($this->$attribute);
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

