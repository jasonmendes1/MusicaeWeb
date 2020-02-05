<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateHabilidadeCest
{
    public function tryCreateHabilidade(FunctionalTester $I)
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
        $I->click('Habilidades');
        $I->click('Create Habilidades');
        $I->fillField('Nome', 'HabilidadesTest');
        $I->click('Save');
    }

}
