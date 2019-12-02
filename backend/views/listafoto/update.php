<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListaFotos */

$this->title = 'Update Lista Fotos: ' . $model->IdListaFoto;
$this->params['breadcrumbs'][] = ['label' => 'Lista Fotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdListaFoto, 'url' => ['view', 'id' => $model->IdListaFoto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lista-fotos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
