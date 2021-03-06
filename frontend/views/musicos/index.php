<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Musicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    a {
        color: #800000;
    }

    a:hover {
        color: #800000;
    }
</style>

<div class="musicos-index" style="color: #800000;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Musicos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'NivelCompromisso',
            'idProfile',
            'idHabilidade',
            'idGenero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>