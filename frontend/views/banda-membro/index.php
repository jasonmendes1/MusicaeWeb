<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BandaMembrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banda Membros';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    h1{
        color: #ffffff;
        font-size: 30px;
    }
    a{
        color: #ffffff;
    }
    table, th, td {
        color: #000000;
        font-size: 20px;
        border: 1px solid black;
        padding: 10px;
    }
</style>

<div class="banda-membros-index">

    <h1>MINHAS BANDAS</h1>

    <p>
        <?= Html::a('Crear Banda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <svg width="70" height="70">
        <rect width="70" height="20" style="fill:#DFF0D8;stroke-width:1px;stroke:rgb(0,0,0)" />
        <text x="19" y="15" fill="black">Ativa</text>
    </svg>

    <svg width="70" height="70">
        <rect width="70" height="20" style="fill:#F2DEDE;stroke-width:1px;stroke:rgb(0,0,0)" />
        <text x="14" y="15" fill="black">Inativa</text>
    </svg>

    <?php

        foreach ($dataProvider as $banda){
            if($banda->Removida == 1){
                ?>
                <div class="row" style="background-color: #F2DEDE; color: black">
                <?php
            }
            else{
                ?>
                    <div class="row" style="background-color: #DFF0D8; color: black">
                        <?php
            }
            ?>
                <div class="col-lg-2">
                    <?php
                    foreach ($banda->bandamembros as $membros)
                        echo $membros->DataEntrada;

                    ?>
                </div>
                <div class="col-lg-2">
                    <?= $banda->Nome ?>
                </div>
                <div class="col-lg-2">
                    <?= $banda->Localizacao ?>
                </div>
                <div class="col-lg-2">
                    <?= $banda->Contacto ?>
                </div>
                <div class="col-lg-2">
                    <?= $banda->genero->Nome ?>
                </div>
                <div class="col-lg-2">
                    <?php
                    foreach ($banda->musicos as $musico)
                        echo $musico->profile->Nome;

                    ?>
                </div>
            </div>
            <?php
        }
    ?>

    <?php /* echo GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-bordered'],
        'rowOptions' => function($model){


            if($model['banda']['Removida'] == '1'){
                return ['class'=>'danger'];
            }else{
                return ['class'=>'success'];
            }
        },
        'columns' => [
            'DataEntrada',
            [
                'attribute' => 'banda.Nome',
                'header' => 'Banda',
                'headerOptions' => ['style' => 'color: #ffffff']
            ],
            [
                'attribute' => 'banda.Localizacao',
                'header' => 'Localização',
                'headerOptions' => ['style' => 'color: #ffffff']
            ],
            [
                'attribute' => 'banda.Contacto',
                'header' => 'Contacto',
                'headerOptions' => ['style' => 'color: #ffffff']
            ],
            [
                'attribute' => 'banda.genero.Nome',
                'header' => 'Género',
                'headerOptions' => ['style' => 'color: #ffffff']
            ],
            [
                'attribute' => 'musico.profile.Nome',
                'header' => 'Membros',
                'headerOptions' => ['style' => 'color: #ffffff']
            ],
        ],
    ]);*/ ?>



</div>
