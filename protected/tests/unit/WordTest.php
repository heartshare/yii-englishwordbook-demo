<?php

class WordTest extends DbTestCase
{
    public $fixtures = array(
        'words' => 'Word',
        'users' => 'User',
    );

    public function setUp()
    {
        parent::setUp();
        user()->setId($this->users['User_1']['id']);
    }

    public function testDefaultScope()
    {
        $c = new CDbCriteria();
        $c->condition = Word::model()->getTableAlias(false, false).'.user_id = :user_id';
        $c->params = array(':user_id' => user()->id);
        $this->assertEquals(Word::model()->getDbCriteria(), $c);
    }

    /**
     * @dataProvider findAllBySortProvider
     */
    public function testFindAllBySort($expectedCount, $expectedOrder, $sort)
    {
        $dataProvider = Word::model()->findAllBySort($sort);
        $this->assertEquals($expectedCount, $dataProvider->totalItemCount);
        $this->assertEquals($expectedOrder, $dataProvider->getCriteria()->order);
    }

    public function findAllBySortProvider()
    {
        return array(
            array(5, 't.id DESC', null),
            array(5, 't.id DESC', 'new'),
            array(5, 't.id DESC', uniqid()),
            array(5, 't.en', 'az'),
            array(5, 't.en DESC', 'za'),
            array(5, 't.id', 'old'),
            array(5, 'RAND()', 'rnd'),
            array(1, 't.en', 'a'),
            array(0, 't.en', 'z'),
        );
    }

    /**
     * @dataProvider searchProvider
     */
    public function testSearch($expectedCount, $q)
    {
        $dataProvider = Word::model()->search($q);
        $this->assertEquals($expectedCount, $dataProvider->totalItemCount);
    }

    public function searchProvider()
    {
        return array(
            array(5, null),
            array(1, 'a'),
            array(1, 'えー'),
            array(0, uniqid()),
        );
    }
}

