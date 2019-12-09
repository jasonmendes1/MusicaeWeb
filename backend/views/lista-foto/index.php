<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ListaFotosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Fotos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-fotos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lista Fotos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
