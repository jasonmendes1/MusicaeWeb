<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industrias */

$this->title = 'Update Industrias: ' . $model->IDIndustria;
$this->params['breadcrumbs'][] = ['label' => 'Industrias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDIndustria, 'url' => ['view', 'id' => $model->IDIndustria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="industrias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
