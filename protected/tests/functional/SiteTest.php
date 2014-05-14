<?php

class SiteTest extends WebTestCase
{
    public function testAbout()
    {
        $this->open('site/page/view/about');
        $this->assertTextPresent('このサイトについて');
    }

    public function testLoginLogout()
    {
        $this->open('');

        if ($this->isTextPresent(WebTestCase::LOGOUT_BUTTON)) {
            $this->clickAndWait('link='.WebTestCase::LOGOUT_BUTTON);
        }

        // test login
        $this->login('', '');
        $this->assertTextPresent('ログイン情報が正しくありません。');

        $this->login(WebTestCase::USERNAME, '');
        $this->assertTextPresent('ログイン情報が正しくありません。');

        $this->login('', WebTestCase::PASSWORD);
        $this->assertTextPresent('ログイン情報が正しくありません。');

        $this->login();
        $this->assertTextPresent(WebTestCase::LOGOUT_BUTTON);

        // test logout
        $this->clickAndWait('link='.WebTestCase::LOGOUT_BUTTON);
        $this->assertLocation(TEST_BASE_URL.'login');
    }
}

