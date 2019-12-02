<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Habilidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habilidades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Habilidades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDHabilidade',
            'Nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
