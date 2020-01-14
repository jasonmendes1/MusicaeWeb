<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateGeneroCest
{
    public function tryCreateBand(FunctionalTester $I)
    {
        // Login na Página
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'user');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (user)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');

        $I->amOnPage('/genero');
        $I->click('Create');
        $I->fillField('Nome', 'GeneroTest');
        $I->click('Save');
    }

    public function tryEditGenero(FunctionalTester $I)
    {
        $I->amOnPage('/genero/update?id=27');
        $I->fillField('Nome', 'GeneroUpdate');
        $I->click('Save');
    }
/*
    public function tryDeleteBand(FunctionalTester $I)
    {
        $I->amOnPage('/banda/delete?id=6');
    }
*/
}
