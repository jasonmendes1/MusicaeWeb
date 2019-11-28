<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;

class HomeCest
{
    /*public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('musicaeweb/frontend/web/index-test.php');
        $I->see('Musicae');

        $I->seeLink('About');
        $I->click('About');
        $I->wait(2); // wait for page to be opened

        $I->see('This is the About page.');
    }*/

    public function checkLogin(AcceptanceTester $I)
    {
        $I->amOnPage('musicaeweb/frontend/web/index-test.php');
        $I->wait(2); // wait for page to be opened
        $I->seeLink('Login');
        $I->click('Login');
        $I->wait(2); // wait for page to be opened
        $I->see('Username');
        $I->fillField('LoginForm[username]', 'pedro');
        $I->wait(1); // wait for page to be opened
        $I->fillField('LoginForm[password]', '123456');
        $I->wait(1); // wait for page to be opened
        $I->click('login-button');
        $I->wait(5); // wait for page to be opened
    }
}
