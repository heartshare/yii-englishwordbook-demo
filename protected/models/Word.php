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
            // en
            array('en', 'required'),
            array('en', 'length', 'max'=>50),
            // ja
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
            'condition' => $this->getTableAlias(false, false).'.user_id = :user_id',
            'params' => array(':user_id' => user()->id),
        );
    }

    /**
     * Finds the all words by sort.
     * @param mixed $sort null or sorting strings
     * @return CActiveDataProvider
     */
    public function findAllBySort($sort)
    {
        $c = new CDbCriteria();
        $c->order = 't.id DESC';

        if (strlen($sort) === 1) {
            $c->addSearchCondition('t.en', $sort.'%', false);
            $c->order = 't.en';
        }
        if ($sort === 'az') {
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

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $c,
            'pagination' => array(
                'pageSize' => param('wordPerPage'),
                'pageVar' => 'page',
            ),
        ));
    }

    /**
     * Retrieves the list of words based on the current search conditions
     * @param string $q searching strings
     * @return CActiveDataProvider
     */
    public function search($q)
    {
        $c = new CDbCriteria();
        $c->addSearchCondition('t.en', $q, true, 'OR');
        $c->addSearchCondition('t.ja', $q, true, 'OR');
        $c->order = 't.id DESC';

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $c,
            'pagination' => array(
                'pageSize' => param('wordPerPage'),
                'pageVar' => 'page',
                'params' => compact('q'),
            ),
        ));
    }
}

