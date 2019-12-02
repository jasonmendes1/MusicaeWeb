<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListaMusicas */

$this->title = 'Update Lista Musicas: ' . $model->IDListaMusica;
$this->params['breadcrumbs'][] = ['label' => 'Lista Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDListaMusica, 'url' => ['view', 'id' => $model->IDListaMusica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lista-musicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
