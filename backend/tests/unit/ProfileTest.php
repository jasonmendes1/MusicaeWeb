<?php namespace backend\tests;

use common\models\Profiles;

class ProfileTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
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

        $user->Nome = null;
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhss';
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'pedro';
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingUser()
    {
        $user = new Profiles();
        $user->Nome = 'pedro';
        $user->Sexo = 'homem';
        $user->DataNac = '2000-07-09 12:12:12';
        $user->Descricao = 'wtf';
        $user->Foto = null;
        $user->Localidade = '2430 MG';
        $user->IdUser = 1;
        $user->save();
        //$this->tester->seeInDatabase('profiles', ['Nome' => 'pedro']);
    }

    /*function testUserNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Profiles', ['Nome' => 'pedro']);

        $user = Profiles::findOne($id);
        $user->Nome = ('jason');
        $user->save();

        $this->tester->seeRecord('common\models\Profiles', ['Nome' => 'jason']);
        $this->tester->dontSeeRecord('common\models\Profiles', ['Nome' => 'pedro']);
    }*/
}