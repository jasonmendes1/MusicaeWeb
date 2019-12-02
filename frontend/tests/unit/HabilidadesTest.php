<?php namespace frontend\tests;

use common\models\Habilidades;

class HabilidadesTest extends \Codeception\Test\Unit
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
        $habilidade = new Habilidades();

        $habilidade->Nome = ('accordion');
        $habilidade->save();
        $this->tester->seeInDatabase('habilidades', ['Nome' => 'accordion']);
    }
    
    public function testValidation()
    {
        $habilidade = new Habilidades();

        $habilidade->Nome = (null);
        $this->assertFalse($habilidade->validate(['Nome']));

        $habilidade->Nome = ('erro');
        $this->assertFalse($habilidade->validate(['Nome']));

        $habilidade->Nome = ('davert');
        $this->assertTrue($habilidade->validate(['Nome']));
    }
}