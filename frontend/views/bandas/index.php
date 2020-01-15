<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Bandas;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bandas';
$this->params['breadcrumbs'][] = $this->title;
// $classModelo = 'common\models\Bandas';
// $banda = new $classModelo;

// var_dump($banda->getMusicos()->primaryModel->IdBanda);
// $query = Bandas::find()->where([Bandas::getBandamembros()->primaryModel => 1]);


/*
// $query = Bandas::find()->where([$banda->getBandamembros() => 1]);
$query = $banda->find()->where(['id' => 5]);
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);

*/
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