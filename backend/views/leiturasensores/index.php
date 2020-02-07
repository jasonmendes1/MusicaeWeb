<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leiturasensores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leiturasensores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leiturasensores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Temperatura',
            'Humidade',
            'Luminosidade',
            'Descricao:ntext',

            ['class' => 'yii\grid\ActionColumn'],

        ],
        'rowOptions' => function ($model, $key, $index, $column) {
            if ($model->Temperatura < 9) {
                return ['style' => 'Color: blue'];
            } else {
                if ($model->Temperatura > 10 && $model->Temperatura < 19) {
                    return ['style' => 'Color: orange'];
                } else {
                    if ($model->Temperatura > 20) {
                        return ['style' => 'Color: red'];
                    }
                }
            }
        },
    ]); ?>


</div>