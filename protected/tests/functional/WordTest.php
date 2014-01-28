<?php

class WordTest extends WebTestCase
{
    public $fixtures = array(
        'words' => 'Word',
    );

    protected function setUp()
    {
        parent::setUp();
        $this->start();
        $this->login();
    }

    public function testIndex()
    {
        $this->open('word/index');
        $this->assertTextPresent('5 results');
        $this->checkSortArea();
    }

    public function testAdmin()
    {
        $this->open('word/index');
        $this->clickAndWait('link=Admin');
        $this->assertTextPresent('5 results');
        $this->checkSortArea();

        // test search form
        $this->type('q', '　　えー　');
        $this->clickAndWait('css=.btn-search');
        $this->assertValue('q', 'えー');
        $this->assertTextPresent('1 results');
        $this->assertTextPresent($this->words['Word_1']['en']);
        $this->assertTextPresent($this->words['Word_1']['ja']);
    }

    public function testCreate()
    {
        $this->open('word/index');
        $this->clickAndWait('link=Create');

        $this->clickAndWait("//input[@value='登録する']");
        $this->assertTextPresent('英単語 が入力されていません。');
        $this->assertTextPresent('日本語訳 が入力されていません。');

        $this->type('Word[en]', 'hello');
        $this->type('Word[ja]', 'こんにちは');
        $this->clickAndWait("//input[@value='登録する']");
        $this->assertLocation(TEST_BASE_URL . 'word/[1-9][0-9]*');
        $this->assertTextPresent('英単語の追加が完了いたしました。');
        $this->assertTextPresent('hello');
        $this->assertTextPresent('こんにちは');

        $this->clickAndWait('link=Admin');
        $this->assertTextPresent('6 results');
        $this->assertTextPresent('hello');
        $this->assertTextPresent('こんにちは');
    }

    public function testView()
    {
        $this->open('word/' . $this->words['Word_1']['id']);
        $this->assertTextPresent($this->words['Word_1']['en']);
        $this->assertTextPresent($this->words['Word_1']['ja']);

        // test 404 error
        $this->open('word/99999');
        $this->assertTextPresent('データがありません。');
    }

    public function testUpdate()
    {
        $this->open('word/admin');
        $this->clickAndWait('link=Update');
        $this->assertValue('Word[en]', $this->words['Word_5']['en']);
        $this->assertValue('Word[ja]', $this->words['Word_5']['ja']);

        $this->type('Word[en]', '');
        $this->type('Word[ja]', '');
        $this->clickAndWait("//input[@value='更新する']");
        $this->assertTextPresent('英単語 が入力されていません。');
        $this->assertTextPresent('日本語訳 が入力されていません。');

        $this->type('Word[en]', 'hello');
        $this->type('Word[ja]', 'こんにちは');
        $this->clickAndWait("//input[@value='更新する']");

        $this->assertLocation(TEST_BASE_URL . 'word/' . $this->words['Word_5']['id']);
        $this->assertTextPresent('英単語の更新が完了いたしました。');
        $this->assertTextPresent('hello');
        $this->assertTextPresent('こんにちは');

        $this->clickAndWait('link=Admin');
        $this->assertTextPresent('5 results');
        $this->assertTextPresent('hello');
        $this->assertTextPresent('こんにちは');
        $this->assertTextNotPresent($this->words['Word_5']['en']);
        $this->assertTextNotPresent($this->words['Word_5']['ja']);

        // test 404 error
        $this->open('word/update/99999');
        $this->assertTextPresent('データがありません。');
    }

    public function testDelete()
    {
        $this->open('word/admin');
        $this->assertTextPresent('5 results');
        $this->assertTextPresent($this->words['Word_5']['en']);
        $this->assertTextPresent($this->words['Word_5']['ja']);

        $this->clickAndWait('link=Delete');
        $this->assertConfirmation(param('confirmDelete'));
        $this->assertLocation(TEST_BASE_URL . 'word/admin');
        $this->assertTextPresent('英単語の削除が完了いたしました。');
        $this->assertTextPresent('4 results');
        $this->assertTextNotPresent($this->words['Word_5']['en']);
        $this->assertTextNotPresent($this->words['Word_5']['ja']);

        // test 400 error
        $this->open('word/delete/' . $this->words['Word_1']['en']);
        $this->assertTextPresent('無効なリクエストです。');
    }

    private function checkSortArea()
    {
        $this->clickAndWait('link=a');
        $this->assertTextPresent('1 results');
        $this->assertTextPresent($this->words['Word_1']['en']);
        $this->assertTextPresent($this->words['Word_1']['ja']);
        $this->assertTextNotPresent($this->words['Word_2']['en']);
        $this->assertTextNotPresent($this->words['Word_2']['ja']);

        $this->clickAndWait('link=b');
        $this->assertTextPresent('1 results');
        $this->assertTextPresent($this->words['Word_2']['en']);
        $this->assertTextPresent($this->words['Word_2']['ja']);
        $this->assertTextNotPresent($this->words['Word_1']['en']);
        $this->assertTextNotPresent($this->words['Word_1']['ja']);
    }
}

