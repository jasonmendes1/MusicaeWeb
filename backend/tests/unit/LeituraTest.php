<?php

namespace backend\tests;

use backend\models\Leiturasensores;

class LeituraTest extends \Codeception\Test\Unit
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
        $leitura = new Leiturasensores();

        $leitura->Temperatura = null;
        $this->assertFalse($leitura->validate(['Temperatura']));
        $leitura->Temperatura = "teste";
        $this->assertFalse($leitura->validate(['Temperatura']));

        $leitura->Humidade = null;
        $this->assertFalse($leitura->validate(['Humidade']));
        $leitura->Humidade = "teste";
        $this->assertFalse($leitura->validate(['Humidade']));

        $leitura->Luminosidade = null;
        $this->assertFalse($leitura->validate(['Luminosidade']));
        $leitura->Luminosidade = "teste";
        $this->assertFalse($leitura->validate(['Luminosidade']));

        $leitura->Descricao = null;
        $this->assertFalse($leitura->validate(['Descricao']));
    }

    function testLeitura()
    {
        $leitura = new Leiturasensores();
        $leitura->id = 20;
        $leitura->Temperatura = '25';
        $leitura->Humidade = '13';
        $leitura->Luminosidade = '2';
        $leitura->Descricao = "bla bla";
        $leitura->save();
        $this->tester->seeInDatabase('leiturasensores', ['Temperatura' => '25']);
    }

    function testTemperaturaCanBeChanged()
    {
        $id = $this->tester->grabRecord('backend\models\Leiturasensores', ['Temperatura' => '25']);

        $leitura = Leiturasensores::findOne($id);
        $leitura->Temperatura = ('23');
        $leitura->save();

        $this->tester->seeRecord('backend\models\Leiturasensores', ['Temperatura' => '23']);
        $this->tester->dontSeeRecord('backend\models\Leiturasensores', ['Temperatura' => '25']);
    }

    function testLeituraDeleted()
    {
        $id = $this->tester->grabRecord('backend\models\Leiturasensores', ['Temperatura' => '23']);

        $leitura = Leiturasensores::findOne($id);
        $leitura->delete();

        $this->tester->dontSeeRecord('backend\models\Leiturasensores', ['Temperatura' => '23']);
    }
}
