<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IndustriaBandas */

$this->title = 'Update Industria Bandas: ' . $model->IdIndustria;
$this->params['breadcrumbs'][] = ['label' => 'Industria Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdIndustria, 'url' => ['view', 'IdIndustria' => $model->IdIndustria, 'IdBanda' => $model->IdBanda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="industria-bandas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
