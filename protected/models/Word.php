<?php

/**
 * Word class file.
 *
 * The followings are the available columns in table 'word':
 * @property integer $id
 * @property integer $user_id
 * @property string $en
 * @property string $ja
 */
class Word extends ActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Word|CActiveRecord active record model instance.
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
        return 'word';
    }
    
    /**
     * @see CModel::attributeLabels()
     */
    public function attributeLabels()
    {
        return array(
            'en' => '英単語',
            'ja' => '日本語訳',
        );
    }
    
    /**
     * @see CModel::rules()
     */
    public function rules()
    {
        return array(
            array('en', 'required'),
            array('en', 'length', 'max'=>50),
            array('ja', 'required'),
            array('ja', 'length', 'max'=>50),
        );
    }
    
    /**
     * @see CActiveRecord::defaultScope()
     */
    public function defaultScope()
    {
        return array(
            'alias' => $this->getTableAlias(false, false),
            'condition' => 'user_id = :user_id',
            'params' => array(':user_id' => user()->id),
        );
    }

    /**
     * Gets the criteria by sort and query.
     * @param mixed $sort null or sorting strings
     * @param string $q searching strings
     * @return CDbCriteria the query criteria
     */
    protected function getCriteriaBySortAndQ($sort, $q)
    {
        $c = new CDbCriteria();
        $c->addSearchCondition('t.en', $q, true, 'OR');
        $c->addSearchCondition('t.ja', $q, true, 'OR');
        $c->order = 't.id DESC';

        if (strlen($sort) === 1) {
            $c->addSearchCondition('t.en', $sort.'%', false);
            $c->order = 't.en';
        }
        if ($sort === 'az' || $q) {
            $c->order = 't.en';
        }
        if ($sort === 'za') {
            $c->order = 't.en DESC';
        }
        if ($sort === 'old') {
            $c->order = 't.id';
        }
        if ($sort === 'rnd') {
            $c->order = 'RAND()';
        }
        return $c;
    }

    /**
     * Gets the dataProvider by sort and query.
     * @param mixed $sort null or sorting strings
     * @param string $q searching strings
     * @return CActiveDataProvider
     */
    public function findAllBySortAndQ($sort, $q = '')
    {
        $sort = substr($sort, 0, 3);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->getCriteriaBySortAndQ($sort, $q),
            'pagination' => array(
                'pageSize' => param('wordPerPage'),
                'pageVar' => 'page',
                'params' => $q ? compact('q') : null,
            ),
        ));
    }
}

