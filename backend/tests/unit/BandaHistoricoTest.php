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

    function testSavingBandasHistorico()
    {
        $user = new BandasHistorico();
        $user->IdMusico = 1;
        $user->Duracao = '2000-01-01';
        $user->IdBanda = 3;
        $user->save();
        $this->tester->seeInDatabase('bandasHistorico', ['Duracao' => '2000-01-01']);
    }

    function testBandasHistoricoCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\BandasHistorico', ['Duracao' => '2000-01-01']);

        $user = BandasHistorico::findOne($id);
        $user->Duracao = ('2020-02-02');
        $user->save();

        $this->tester->seeRecord('common\models\BandasHistorico', ['Duracao' => '2020-02-02']);
        $this->tester->dontSeeRecord('common\models\BandasHistorico', ['Duracao' => '2000-01-01']);
    }

    function testBandasHistoricoDeleted()
    {
        $id = $this->tester->grabRecord('common\models\BandasHistorico', ['Duracao' => '2020-02-02']);

        $user = BandasHistorico::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\BandasHistorico', ['Duracao' => '2020-02-02']);
    }
}