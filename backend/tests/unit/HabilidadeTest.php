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
        $user->Nome = 'HabilidadeHabilidadeHabilidadeHabilidadeHabilidadeHabilidade';
        $this->assertFalse($user->validate(['Nome']));
        $user->Nome = 'Habilidade';
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingHabilidade()
    {
        $user = new Habilidades();
        $user->Nome = 'Harpa';
        $user->save();
        $this->tester->seeInDatabase('habilidades', ['Nome' => 'Harpa']);
    }

    function testHabilidadeCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Habilidades', ['Nome' => 'Harpa']);

        $user = Habilidades::findOne($id);
        $user->Nome = ('Guitarra');
        $user->save();

        $this->tester->seeRecord('common\models\Habilidades', ['Nome' => 'Guitarra']);
        $this->tester->dontSeeRecord('common\models\Habilidades', ['Nome' => 'Harpa']);
    }

    function testHabilidadeDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Habilidades', ['Nome' => 'Guitarra']);

        $user = Habilidades::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\Habilidades', ['Nome' => 'Guitarra']);
    }
}