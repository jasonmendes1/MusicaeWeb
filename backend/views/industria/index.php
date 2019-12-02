<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Industrias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industrias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Industrias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDIndustria',
            'Tipo',
            'IdGenero',
            'IdListaMusica',
            'IdListaFoto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
