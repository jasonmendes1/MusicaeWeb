<?php namespace backend\tests;

use common\models\BandaHabilidades;

class BandasHabilidadeTest extends \Codeception\Test\Unit
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
        $user = new BandaHabilidades();

        $user->Nome = null;
        $this->assertFalse($user->validate(['experiencia']));

        $user->Nome = null;
        $this->assertFalse($user->validate(['compromisso']));
    }

    function testSavingBanda()
    {
        $user = new BandaHabilidades();
        $user->IdBanda = '1';
        $user->IdHabilidade = '1';
        $user->experiencia = 'Aprendiz';
        $user->compromisso = 'Pouco';
        $user->save();
        $this->tester->seeInDatabase('bandahabilidades', ['experiencia' => 'Aprendiz']);
    }
}