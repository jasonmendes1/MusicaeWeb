<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BandaHabilidadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banda Habilidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banda-habilidades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Banda Habilidades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdBanda',
            'IdHabilidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
