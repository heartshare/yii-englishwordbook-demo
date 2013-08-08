<?php

define('TEST_BASE_URL', 'http://localhost/yii-englishwordbook-demo/index-test.php/');

/**
 * WebTestCase class file.
 */
class WebTestCase extends CWebTestCase
{
    const USERNAME = 'admin';
    const PASSWORD = 'adminadmin';
    const LOGIN_BUTTON = 'ログイン';
    const LOGOUT_BUTTON = 'ログアウト';

    protected function setUp()
    {
        parent::setUp();
        //$this->setBrowser('*firefox');
        $this->setBrowser('*googlechrome');
        $this->setBrowserUrl(TEST_BASE_URL);
    }

    /**
     * User logged in.
     */
    public function login($username = WebTestCase::USERNAME, $password = WebTestCase::PASSWORD)
    {
        $this->type('name=LoginForm[username]', $username);
        $this->type('name=LoginForm[password]', $password);
        $this->clickAndWait("//input[@value='".self::LOGIN_BUTTON."']");
    }
}

