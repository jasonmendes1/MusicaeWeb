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

        $user->Nome = 'Pedro';
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingUser()
    {
        $user = new Profiles();
        $user->Nome = 'Profileeeeee';
        $user->Sexo = 'homem';
        $user->DataNac = '2000-07-09 12:12:12';
        $user->Descricao = 'Descriii';
        $user->Foto = null;
        $user->Localidade = '2430 MG';
        $user->IdUser = 3;
        $user->save();
        $this->tester->seeInDatabase('profiles', ['Nome' => 'Profileeeeee']);
    }

    function testUserNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Profiles', ['Nome' => 'Profileeeeee']);

        $user = Profiles::findOne($id);
        $user->Nome = ('Teste');
        $user->save();

        $this->tester->seeRecord('common\models\Profiles', ['Nome' => 'Teste']);
        $this->tester->dontSeeRecord('common\models\Profiles', ['Nome' => 'Profileeeeee']);
    }

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Profiles', ['Nome' => 'Teste']);

        $user = Profiles::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\Profiles', ['Nome' => 'Teste']);
    }
}