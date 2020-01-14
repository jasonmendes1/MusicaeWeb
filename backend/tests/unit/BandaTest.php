<?php namespace backend\tests;

use common\models\Bandas;

class BandaTest extends \Codeception\Test\Unit
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
        $user = new Bandas();

        $user->Nome = null;
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'Banda';
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingBanda()
    {
        $user = new Bandas();
        $user->Nome = 'Banda';
        $user->Descricao = 'descriicao';
        $user->Localizacao = 'Leiria';
        $user->Contacto = '912345678';
        $user->Logo = null;
        $user->Removida = 0;
        $user->IdGenero = 1;
        $user->save();
        $this->tester->seeInDatabase('bandas', ['Nome' => 'Banda']);
    }

    /*function testBandaNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Bandas', ['Nome' => 'Banda']);

        $user = Bandas::findOne($id);
        $user->Nome = ('BandaUPDATE');
        $user->save();

        $this->tester->seeRecord('common\models\Bandas', ['Nome' => 'BandaUPDATE']);
        $this->tester->dontSeeRecord('common\models\Bandas', ['Nome' => 'Banda']);
    }*/

    /*function testBandaDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Bandas', ['Nome' => 'BandaUPDATE']);

        $user = Bandas::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\Bandas', ['Nome' => 'BandaUPDATE']);
    }*/
}