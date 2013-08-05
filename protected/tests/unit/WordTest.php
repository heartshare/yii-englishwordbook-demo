<?php

class WordTest extends DbTestCase
{
    public $fixtures = array(
        'words' => 'Word',
    );

    public function testBeforeValidate()
    {
        $word = new Word();
        $word->setAttributes(array(
            'en' => '　　hello　',
            'ja' => '　　こんにちは　',
        ));
        $this->assertTrue($word->validate());
        $this->assertEquals('hello', $word->en);
        $this->assertEquals('こんにちは', $word->ja);
    }

    public function testDefaultScope()
    {
        user()->setId(1);
        $word = new Word();
        $this->assertCount(5, Word::model()->findAll());

        $c = new CDbCriteria();
        $c->alias = $word->getTableAlias(false, false);
        $c->condition = 'user_id = :user_id';
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
            array(array(), 't.id DESC', 'abcde', ''),
            array(array(), 't.en', 'az', ''),
            array(array(), 't.en DESC', 'za', ''),
            array(array(), 't.id', 'old', ''),
            array(array(), 'RAND()', 'rnd', ''),
            array(array(':ycp0' => 'a%'), 't.en', 'a', ''),
            array(array(':ycp1' => '%abcde%', ':ycp2' => '%abcde%'), 't.en', null, 'abcde'),
        );
    }

    public function testGetAllBySortAndQ()
    {
        list($pages, $words) = Word::model()->getAllBySortAndQ(null);
        $this->assertInstanceOf('CPagination', $pages);

        $method = parent::getMethod('Word', 'getCriteriaBySortAndQ');
        $c = $method->invokeArgs(new Word(), array(null, null));
        $this->assertEquals(Word::model()->findAll($c), $words);
    }
}

