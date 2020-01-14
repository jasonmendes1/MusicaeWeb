<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateBandaCest
{
    public function tryCreateBanda(FunctionalTester $I)
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

        $I->amOnPage('/banda');
        $I->click('Create');
        $I->fillField('Nome', 'BandaTeste');
        $I->fillField('Descricao', 'BandaTeste');
        $I->fillField('Localizacao', 'BandaTeste');
        $I->fillField('Contacto', '123456789');
        $I->fillField('Logo', '1');
        $I->fillField('Removida', '1');
        $I->fillField('Bandas[IdGenero]', '1');
        $I->click('Save');
    }

    public function tryEditBanda(FunctionalTester $I)
    {
        $I->amOnPage('/banda/update?id=6');
        $I->fillField('Nome', 'BandaUpdate');
        $I->fillField('Descricao', 'BandaUpdate');
        $I->fillField('Localizacao', 'BandaUpdate');
        $I->fillField('Contacto', '123456789');
        $I->fillField('Logo', '1');
        $I->fillField('Removida', '1');
        $I->fillField('Bandas[IdGenero]', '1');
        $I->click('Save');
    }
/*
    public function tryDeleteBand(FunctionalTester $I)
    {
        $I->amOnPage('/banda/delete?id=6');
    }
*/
}
