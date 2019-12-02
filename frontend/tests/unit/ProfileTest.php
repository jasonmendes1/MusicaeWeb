<?php namespace frontend\tests;

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

    function testSavingUser()
    {
        $profile = new Profiles();

        $profile->Nome = ('Pedro Alves');
        $profile->Sexo = ('Masculino');
        $profile->DataNac = ('1998-11-23 13:17:17');
        $profile->Descricao = ('Descricao');
        $profile->Localidade = ('Marinha Grande');
        $profile->save();
        $this->tester->seeInDatabase('profiles', ['Nome' => 'Pedro']);
    }

    public function testValidation()
    {
        $profile = new Profiles();

        $profile->Nome = (null);
        $this->assertFalse($profile->validate(['Nome']));

        $profile->Nome = ('toolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeeaaaaaaeeeeeeaaaaaaeeeeeeaaaaaeaeauyegagduaegduyagdaegdgugyadgudguaeguyaguaegdyguagdaugdyugquyaeuyqadeadeadaedaehdaieuhdashdusaihdashdashdasihfduhoitjgiodgjidfgjoidfjo');
        $this->assertFalse($profile->validate(['Nome']));

        $profile->Nome = ('davert');
        $this->assertTrue($profile->validate(['Nome']));
    }
}