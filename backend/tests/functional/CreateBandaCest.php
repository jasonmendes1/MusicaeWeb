<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateBandaCest
{
    public function tryCreateBanda(FunctionalTester $I)
    {
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'user');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (user)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');

        $I->click('Home');
        $I->click('Bandas');
        $I->click('Create Bandas');
        $I->fillField('Nome', 'BandaTeste');
        $I->fillField('Descricao', 'BandaTeste');
        $I->fillField('Localizacao', 'BandaTeste');
        $I->fillField('Contacto', '123456789');
        $I->fillField('Logo', 'Logo');
        $I->fillField('Removida', '0');
        $I->selectOption('Genero', '3');
        $I->click('Save');
    }

}
