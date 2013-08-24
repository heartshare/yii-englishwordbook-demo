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
            $this->$attribute = trim(mb_convert_kana($this->$attribute, 's', Yii::app()->charset));
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

    /**
     * Gets the pagination.
     * @param CDbCriteria $c
     * @param integer $pageSize number of items in each page
     * @param string $q the query strings
     * @return CPagination custom pagination
     */
    public function getPages($c, $pageSize = 10, $q = '')
    {
        $pages = new CPagination($this->count($c));
        $pages->pageSize = $pageSize;
        $pages->applyLimit($c);
        $pages->params = $q ? compact('q') : null;

        return $pages;
    }
}

