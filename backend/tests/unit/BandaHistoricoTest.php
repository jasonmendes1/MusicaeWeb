<?php namespace backend\tests;

use common\models\BandasHistorico;

class BandaHistoricoTest extends \Codeception\Test\Unit
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
        $user = new BandasHistorico();

        $user->Duracao = null;
        $this->assertFalse($user->validate(['Duracao']));
    }

    function testSavingGenero()
    {
        $user = new BandasHistorico();
        $user->IdMusico = 1;
        $user->Duracao = '2017-07-23';
        $user->IdBanda = 3;
        $user->save();
        $this->tester->seeInDatabase('bandasHistorico', ['Duracao' => '2017-07-23']);
    }
}