<?php namespace backend\tests;

use common\models\Habilidades;

class HabilidadeTest extends \Codeception\Test\Unit
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
        $user = new Habilidades();

        $user->Nome = null;
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhss';
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'Pedro';
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingHabilidade()
    {
        $user = new Habilidades();
        $user->Nome = 'Profileeeeee';
        $user->Sexo = 'homem';
        $user->DataNac = '2000-07-09 12:12:12';
        $user->Descricao = 'Descriii';
        $user->Foto = null;
        $user->Localidade = '2430 MG';
        $user->IdUser = 3;
        $user->save();
        $this->tester->seeInDatabase('habilidades', ['Nome' => 'Profileeeeee']);
    }

    function testHabilidadeCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Habilidades', ['Nome' => 'Profileeeeee']);

        $user = Habilidades::findOne($id);
        $user->Nome = ('Teste');
        $user->save();

        $this->tester->seeRecord('common\models\Habilidades', ['Nome' => 'Teste']);
        $this->tester->dontSeeRecord('common\models\Habilidades', ['Nome' => 'Profileeeeee']);
    }

    function testHabilidadeDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Habilidades', ['Nome' => 'Teste']);

        $user = Habilidades::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\Habilidades', ['Nome' => 'Teste']);
    }
}