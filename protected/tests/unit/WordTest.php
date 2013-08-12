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
        $word = new Word();
        $this->assertCount(5, $word->findAll());

        $c = new CDbCriteria();
        $c->condition = $word->getTableAlias(false, false).'.user_id = :user_id';
        $c->params = array(':user_id' => user()->id);
        $this->assertEquals($word->getDbCriteria(), $c);
    }

    /**
     * @dataProvider getCriteriaBySortAndQProvider
     */
    public function testGetCriteriaBySortAndQ($expectedParams, $expectedOrder, $sort, $q)
    {
        $method = parent::getMethod('Word', 'getCriteriaBySortAndQ');
        $c = $method->invokeArgs(new Word(), array($sort, $q));
        $this->assertEquals($expectedParams, $c->params);
        $this->assertEquals($expectedOrder, $c->order);
    }

    public function getCriteriaBySortAndQProvider()
    {
        return array(
            array(array(), 't.id DESC', null, ''),
            array(array(), 't.id DESC', 'new', ''),
            array(array(), 't.id DESC', uniqid(), ''),
            array(array(), 't.en', 'az', ''),
            array(array(), 't.en DESC', 'za', ''),
            array(array(), 't.id', 'old', ''),
            array(array(), 'RAND()', 'rnd', ''),
            array(array(':ycp0' => 'a%'), 't.en', 'a', ''),
            array(array(':ycp1' => '%a%', ':ycp2' => '%a%'), 't.en', null, 'a'),
        );
    }

    /**
     * @dataProvider findAllBySortAndQProvider
     */
    public function testFindAllBySortAndQ($expectedCount, $sort, $q)
    {
        $dataProvider = Word::model()->findAllBySortAndQ($sort, $q);
        $this->assertEquals($expectedCount, $dataProvider->totalItemCount);
    }

    public function findAllBySortAndQProvider()
    {
        return array(
            array(5, null, ''),
            array(1, 'a', ''),
            array(1, '', 'a'),
            array(1, '', 'えー'),
            array(0, '', uniqid()),
        );
    }
}

