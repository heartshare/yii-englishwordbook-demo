<?php

class WordTest extends WebTestCase
{
    public $fixtures = array(
        'words' => 'Word',
    );
    
    public function testIndex()
    {
        $this->open('word/index');
        $this->login();
        $this->checkSortArea();
    }
    
    public function testEdit()
    {
        $this->open('word/edit');
        $this->login();
        $this->checkSortArea();
        
        // test search form
        $this->type('name=q', '　　a　');
        $this->clickAndWait("//input[@value='Search']");
        $this->assertValue('name=q', 'a');
        $this->assertTextPresent('1 results');
        $this->assertTextPresent($this->words['Word_1']['en']);
        
        // test insert form
        $this->clickAndWait("//input[@value='Create']");
        $this->assertTextPresent('英単語 が入力されていません。');
        $this->assertTextPresent('日本語訳 が入力されていません。');
        
        $this->type('name=Word[en]', '　　fff　');
        $this->type('name=Word[ja]', '　　えふえふえふ　');
        $this->clickAndWait("//input[@value='Create']");
        $this->assertTextPresent('英単語の追加が完了いたしました。');
        $this->assertTextPresent('fff');
        $this->assertTextPresent('えふえふえふ');
    }
    
    public function testView()
    {
        $this->open('word/1');
        $this->login();
        
        // test 404 error
        $this->open('word/99999');
        $this->assertTextPresent('データがありません。');
        
        // test view
        $this->open('word/1');
        $this->assertTextPresent($this->words['Word_1']['en']);
        $this->assertTextPresent($this->words['Word_1']['ja']);
    }
    
    public function testUpdate()
    {
        $this->open('word/update/1');
        $this->login();
        
        // test 404 error
        $this->open('word/update/99999');
        $this->assertTextPresent('データがありません。');
        
        // test update form
        $this->open('word/update/1');
        $this->assertValue('name=Word[en]', $this->words['Word_1']['en']);
        $this->assertValue('name=Word[ja]', $this->words['Word_1']['ja']);
        
        $this->type('name=Word[en]', '');
        $this->type('name=Word[ja]', '');
        $this->clickAndWait("//input[@value='Update']");
        $this->assertTextPresent('英単語 が入力されていません。');
        $this->assertTextPresent('日本語訳 が入力されていません。');
        
        $this->type('name=Word[en]', '　　'.$this->words['Word_1']['en'].'a　');
        $this->type('name=Word[ja]', '　　'.$this->words['Word_1']['ja'].'えー　');

        $this->clickAndWait("//input[@value='Update']");
        $this->assertTextPresent('英単語の更新が完了いたしました。');
        $this->assertTextPresent($this->words['Word_1']['en'].'a');
        $this->assertTextPresent($this->words['Word_1']['ja'].'えー');
    }
    
    public function testDelete()
    {
        $this->open('word/edit');
        $this->login();
        
        // test 400 error
        $this->open('word/delete/5');
        $this->assertTextPresent('無効なリクエストです。');
        
        // test delete
        $this->open('word/edit');
        $this->assertTextPresent('5 results');
        $this->assertTextPresent($this->words['Word_5']['en']);
        
        $this->clickAndWait('link=delete');
        $this->assertConfirmation(param('confirmDelete'));
        $this->assertTextPresent('英単語の削除が完了いたしました。');
        $this->assertTextPresent('4 results');
        $this->assertTextNotPresent($this->words['Word_5']['en']);
    }
    
    private function checkSortArea()
    {
        $this->clickAndWait('link=a');
        $this->assertTextPresent('1 results');
        $this->assertTextPresent($this->words['Word_1']['en']);
        $this->assertTextNotPresent($this->words['Word_2']['en']);
        
        $this->clickAndWait('link=b');
        $this->assertTextPresent('1 results');
        $this->assertTextPresent($this->words['Word_2']['en']);
        $this->assertTextNotPresent($this->words['Word_1']['en']);
    }
}

