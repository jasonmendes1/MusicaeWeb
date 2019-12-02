<?php namespace frontend\tests;

use common\models\Bandas;

class BandasTest extends \Codeception\Test\Unit
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
        $banda = new Bandas();

        $banda->Nome = ('Banda');
        $banda->Descricao = ('Banda');
        $banda->Localizacao = ('Leiria');
        $banda->Contacto = ('123456');
        $banda->save();
        $this->tester->seeInDatabase('bandas', ['Nome' => 'Banda']);
    }

    public function testValidation()
    {
        $banda = new Bandas();

        $banda->Nome = (null);
        $this->assertFalse($banda->validate(['Nome']));

        $banda->Nome = ('toolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeetoolooooongnaaaaaaameeeeaaaaaaeeeeeeaaaaaaeeeeeeaaaaaeaeauyegagduaegduyagdaegdgugyadgudguaeguyaguaegdyguagdaugdyugquyaeuyqadeadeadaedaehdaieuhdashdusaihdashdashdasihfduhoitjgiodgjidfgjoidfjo');
        $this->assertFalse($banda->validate(['Nome']));

        $banda->Nome = ('davert');
        $this->assertTrue($banda->validate(['Nome']));
    }
}