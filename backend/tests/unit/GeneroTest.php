<?php namespace backend\tests;

use common\models\Generos;

class GeneroTest extends \Codeception\Test\Unit
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
        $user = new Generos();

        $user->Nome = null;
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'JazzJazzJazzJazzJazzJazzJazz';
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'Jazz';
        $this->assertTrue($user->validate(['Nome']));
    }

    function testSavingGenero()
    {
        $user = new Generos();
        $user->Nome = ('Jazz');
        $user->save();
        $this->tester->seeInDatabase('generos', ['Nome' => 'Jazz']);
    }

    function testGeneroCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Generos', ['Nome' => 'Jazz']);

        $user = Generos::findOne($id);
        $user->Nome = ('Rap');
        $user->save();

        $this->tester->seeRecord('common\models\Generos', ['Nome' => 'Rap']);
        $this->tester->dontSeeRecord('common\models\Generos', ['Nome' => 'Jazz']);
    }

    function testGeneroDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Generos', ['Nome' => 'Rap']);

        $user = Generos::findOne($id);
        $user->delete();

        $this->tester->dontSeeRecord('common\models\Generos', ['Nome' => 'Rap']);
    }
}