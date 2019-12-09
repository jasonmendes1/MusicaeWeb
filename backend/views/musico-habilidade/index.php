<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MusicoHabilidadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Musico Habilidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musico-habilidade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Musico Habilidade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdMusico',
            'IdHabilidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
