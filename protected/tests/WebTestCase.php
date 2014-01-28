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
    const LOGOUT_BUTTON = 'Logout (admin)';

    protected function setUp()
    {
        parent::setUp();
        $this->setBrowserUrl(TEST_BASE_URL);
    }

    /**
     * User logged in.
     */
    public function login($username = WebTestCase::USERNAME, $password = WebTestCase::PASSWORD)
    {
        $this->open('login');
        $this->type('LoginForm[username]', $username);
        $this->type('LoginForm[password]', $password);
        $this->clickAndWait("//input[@value='".self::LOGIN_BUTTON."']");
    }
}

