<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BandasHistoricoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bandas Historicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bandas-historico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bandas Historico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdMusico',
            'Duracao',
            'IdBanda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
