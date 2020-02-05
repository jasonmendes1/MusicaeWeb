<?php namespace backend\tests;

use common\models\Musicos;

class MusicoTest extends \Codeception\Test\Unit
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
        $user = new Musicos();

        $user->NivelCompromisso = null;
        $this->assertFalse($user->validate(['NivelCompromisso']));
        $user->NivelCompromisso = 'Diversao';
        $this->assertTrue($user->validate(['NivelCompromisso']));
        $user->NivelCompromisso = 'Moderadamente Comprometido';
        $this->assertTrue($user->validate(['NivelCompromisso']));
        $user->NivelCompromisso = 'Comprometido';
        $this->assertTrue($user->validate(['NivelCompromisso']));
        $user->NivelCompromisso = 'Muito Comprometido';
        $this->assertTrue($user->validate(['NivelCompromisso']));
        $user->NivelCompromisso = 'Tour';
        $this->assertTrue($user->validate(['NivelCompromisso']));
        $user->NivelCompromisso = 'OutraCoisa';
        $this->assertFalse($user->validate(['NivelCompromisso']));

        $user->idProfile = null;
        $this->assertFalse($user->validate(['idProfile']));
        $user->idProfile = 'Texto';
        $this->assertFalse($user->validate(['idProfile']));

        $user->idHabilidade = null;
        $this->assertFalse($user->validate(['idHabilidade']));
        $user->idHabilidade = 'Texto';
        $this->assertFalse($user->validate(['idHabilidade']));

        $user->idGenero = null;
        $this->assertFalse($user->validate(['idGenero']));
        $user->idGenero = 'Texto';
        $this->assertFalse($user->validate(['idGenero']));
    }

    function testSavingMusico()
    {
        $user = new Musicos();
        $user->NivelCompromisso = 'Comprometido';
        $user->idProfile = 2;
        $user->idHabilidade = 3;
        $user->idGenero = 4;
        $user->save();
        $this->tester->seeInDatabase('musicos', ['NivelCompromisso' => 'Comprometido']);
    }

    function testMusicoCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Musicos', ['NivelCompromisso' => 'Comprometido']);

        $user = Musicos::findOne($id);
        $user->NivelCompromisso = ('Tour');
        $user->save();

        $this->tester->seeRecord('common\models\Musicos', ['NivelCompromisso' => 'Tour']);
        $this->tester->dontSeeRecord('common\models\Musicos', ['NivelCompromisso' => 'Comprometido']);
    }

    function testMusicoDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Musicos', ['NivelCompromisso' => 'Tour']);

        $user = Musicos::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\Musicos', ['NivelCompromisso' => 'Tour']);
    }
}