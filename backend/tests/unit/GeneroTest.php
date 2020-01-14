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

        $user->Nome = 'toolooooongnaaaaaaameeeeee';
        $this->assertFalse($user->validate(['Nome']));

        $user->Nome = 'pop';
        $this->assertTrue($user->validate(['Nome']));
    }

    /*function testSavingUser()
    {
        $user = new Generos();
        $user->Nome = ('elllll');
        $user->save();
        //$this->tester->seeInDatabase('generos', ['Nome' => 'Jazz']);
    }*/

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Generos', ['Nome' => 'elllll']);

        $user = Generos::findOne($id);
        $user->delete();

        //$this->tester->dontSeeRecord('backend\models\Pessoa', ['Nome' => 'Tiago']);
    }
}