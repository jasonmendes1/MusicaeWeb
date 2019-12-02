<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IndustriaBandas */

$this->title = $model->IdIndustria;
$this->params['breadcrumbs'][] = ['label' => 'Industria Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="industria-bandas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdIndustria' => $model->IdIndustria, 'IdBanda' => $model->IdBanda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdIndustria' => $model->IdIndustria, 'IdBanda' => $model->IdBanda], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Duracao',
            'IdIndustria',
            'IdBanda',
        ],
    ]) ?>

</div>
