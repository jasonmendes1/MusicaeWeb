<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Musico Generos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musico-genero-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Musico Genero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdMusico',
            'IdGenero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
