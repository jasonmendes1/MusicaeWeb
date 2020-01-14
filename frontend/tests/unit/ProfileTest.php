<?php namespace frontend\tests;

use yii\codeception\DbTestCase;
use common\models\Profiles;

class ProfileTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    {
        $user = new Profiles();

        $user->Nome = (null);
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = ('toolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeeaaaaaaeeeeeeaaaaaaeeeeeeaaaaaeaeauyegagduaegduyagdaegdgugyadgudguaeguyaguaegdyguagdaugdyugquyaeuyqadeadeadaedaehdaieuhdashdusaihdashdashdasihfduhoitjgiodgjidfgjoidfjo');
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = ('davert');
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingUser()
    {
        $user = new Profiles();
        $user->Nome = 'pedroooooo';
        $user->Sexo = 'homem';
        $user->DataNac = '2000-07-09 12:12:12';
        $user->Descricao = 'wtf';
        $user->Foto = null;
        $user->Localidade = '2430 MG';
        $user->IdUser = 1;
        $user->save();
        //$this->tester->seeInDatabase('profiles', ['Nome' => 'pedro']);
    }

    
}