<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Musicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Musicos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDMusico',
            'NivelCompromisso',
            'idProfile',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
