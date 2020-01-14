<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateHabilidadeCest
{
    public function tryCreateHabilidade(FunctionalTester $I)
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

        $I->amOnPage('/habilidade');
        $I->click('Create');
        $I->fillField('Nome', 'HabilidadesTest');
        $I->click('Save');
    }

    public function tryEditHabilidade(FunctionalTester $I)
    {
        $I->amOnPage('/habilidade/update?id=5');
        $I->fillField('Nome', 'HabilidadesUpdate');
        $I->click('Save');
    }
/*
    public function tryDeleteBand(FunctionalTester $I)
    {
        $I->amOnPage('/banda/delete?id=6');
    }
*/
}
