<?php

class WordTest extends CDbTestCase
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
        $this->assertEquals(5, count($word->findAll()));

        user()->setId($this->users['User_2']['id']);
        $word = new Word();
        $this->assertEquals(2, count($word->findAll()));
    }

    /**
     * @dataProvider sortProvider
     */
    public function testSort($expectedCount, $expectedId, $sort)
    {
        $words = Word::model()->sort($sort)->findAll();
        $this->assertEquals($expectedCount, count($words));
        $this->assertEquals($expectedId, $words[0]->id);
    }

    public function sortProvider()
    {
        return array(
            array(5, '5', null),
            array(5, '5', 'new'),
            array(5, '5', 'xxxxx'),
            array(5, '3', 'az'),
            array(5, '4', 'za'),
            array(5, '1', 'old'),
            // array(5, '1', 'rnd'),
            array(1, '3', 'a'),
            array(1, '2', 'c'),
        );
    }

    /**
     * @dataProvider searchProvider
     */
    public function testSearch($expectedCount, $expectedId, $q)
    {
        $words = Word::model()->search($q)->findAll();
        $this->assertEquals($expectedCount, count($words));
        $this->assertEquals($expectedId, $words[0]->id);
    }

    public function searchProvider()
    {
        return array(
            array(5, '3', ''),
            array(1, '3', 'le'),
            array(1, '3', 'ご'),
            array(1, '1', 'er'),
            array(1, '1', 'ル'),
            array(2, '2', 'at'),
            array(1, '5', 'sk'),
            array(1, '5', 'くえ'),
        );
    }
}

