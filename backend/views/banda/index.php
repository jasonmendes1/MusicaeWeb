<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BandasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bandas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bandas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bandas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Nome',
            'Descricao',
            'Localizacao',
            'Contacto',
            //'Logo',
            //'Removida',
            //'IdGenero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
