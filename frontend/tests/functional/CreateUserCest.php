<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateUserCest
{
    public function tryCreateUser(FunctionalTester $I)
    {
        // Signup
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Join Free');
        $I->fillField('Username', 'userteste');
        $I->fillField('Email', 'userteste@userteste.userteste');
        $I->fillField('Password', '123456');
        $I->fillField('Nome', 'Teste');
        $I->fillField('Sexo', 'Masculino');
        $I->fillField('Data de Nascimento', '2000-09-07');
        $I->fillField('Descrição', 'Descrição Teste');
        $I->fillField('Localidade', 'Leiria');
        $I->selectOption('Nivel de Compromisso', 'Tour');
        $I->selectOption('Habilidade', '3');
        $I->selectOption('Género', '3');
        $I->click('signup-button');
        $I->see('Thank you for registration. Please check your inbox for verification email.');
        
        // Login
        $I->click('Login');
        $I->fillField('Username', 'userteste');
        $I->fillField('Password', '123456');
        $I->click('login-button');
        $I->see('Logout (userteste)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
}
