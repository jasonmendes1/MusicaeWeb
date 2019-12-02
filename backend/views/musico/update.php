<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicos */

$this->title = 'Update Musicos: ' . $model->IDMusico;
$this->params['breadcrumbs'][] = ['label' => 'Musicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDMusico, 'url' => ['view', 'id' => $model->IDMusico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="musicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
