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

        if ($this->isTextPresent(self::LOGOUT_BUTTON)) {
            $this->clickAndWait('link=' . self::LOGOUT_BUTTON);
        }

        // test login
        $this->login('', '');
        $this->assertTextPresent('ログイン情報が正しくありません。');

        $this->login(self::USERNAME, '');
        $this->assertTextPresent('ログイン情報が正しくありません。');

        $this->login('', self::PASSWORD);
        $this->assertTextPresent('ログイン情報が正しくありません。');

        $this->login();
        $this->assertTextPresent(self::LOGOUT_BUTTON);

        // test logout
        $this->clickAndWait('link=' . self::LOGOUT_BUTTON);
        $this->assertLocation(TEST_BASE_URL . 'login');
    }
}

