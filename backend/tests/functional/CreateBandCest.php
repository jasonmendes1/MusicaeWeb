<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateBandCest
{
/*
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Login');
        $I->fillField('Username', 'pedro');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (pedro)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
*/
    public function tryCreateBand(FunctionalTester $I)
    {
        $I->amOnPage('/banda/create');
        //$I->click('Create');
        $I->fillField('Nome', 'BandaTeste');
        $I->fillField('Descricao', 'BandaTeste');
        $I->fillField('Localizacao', 'BandaTeste');
        $I->fillField('Contacto', '123456789');
        $I->fillField('Logo', '1');
        $I->fillField('Removida', '1');
        $I->fillField('Bandas[IdGenero]', '1');
        $I->click('Save');


    }
}
