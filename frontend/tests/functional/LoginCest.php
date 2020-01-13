<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class LoginCest
{
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'pedro');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (erau)', 'form button[type=submit]');
        // $I->seeEmailIsSent(); // only for Symfony
    }
}
