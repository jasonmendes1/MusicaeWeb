<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    public function loginUser(FunctionalTester $I)
    {
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'user');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (user)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }

    public function logoutUser(FunctionalTester $I)
    {
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'user');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (user)', 'form button[type=submit]');
        $I->click('Logout');
    }
    
}
