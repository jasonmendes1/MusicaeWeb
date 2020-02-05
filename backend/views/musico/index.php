<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MusicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Musicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php // Html::a('Create Musicos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'NivelCompromisso',
            [
                'attribute' => 'profile.Nome',
                'header' => 'Profile',
                'headerOptions' => ['style' => 'color: #337AB7']
            ],
            [
                'attribute' => 'habilidade.Nome',
                'header' => 'Habilidade',
                'headerOptions' => ['style' => 'color: #337AB7']
            ],
            [
                'attribute' => 'genero.Nome',
                'header' => 'Genero',
                'headerOptions' => ['style' => 'color: #337AB7']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
