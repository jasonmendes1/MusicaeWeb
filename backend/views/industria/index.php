<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IndustriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Industrias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industrias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Industrias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Tipo',
            'IdProfile',
            'IdGenero',
            'IdListaMusica',
            //'IdListaFoto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
