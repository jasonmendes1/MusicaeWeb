<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BandaGeneroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banda Generos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banda-genero-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Banda Genero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdBanda',
            'IdGenero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
