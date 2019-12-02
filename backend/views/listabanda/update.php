<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListaBandas */

$this->title = 'Update Lista Bandas: ' . $model->IdMusico;
$this->params['breadcrumbs'][] = ['label' => 'Lista Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMusico, 'url' => ['view', 'IdMusico' => $model->IdMusico, 'IdBanda' => $model->IdBanda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lista-bandas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
