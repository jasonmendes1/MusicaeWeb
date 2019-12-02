<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Musicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-musicas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lista Musicas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDListaMusica',
            'Nome',
            'CaminhoPasta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
