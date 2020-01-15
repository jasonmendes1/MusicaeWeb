<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bandas';
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
<div class="bandas-index" style="color: #800000;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bandas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Nome',
            'Descricao',
            'Localizacao',
            'Contacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>