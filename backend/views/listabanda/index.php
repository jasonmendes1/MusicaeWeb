<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Bandas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-bandas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lista Bandas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdMusico',
            'IdBanda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
