<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bandas */

$this->title = 'Update Bandas: ' . $model->IDBanda;
$this->params['breadcrumbs'][] = ['label' => 'Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDBanda, 'url' => ['view', 'id' => $model->IDBanda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bandas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
