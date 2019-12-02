<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListaFotos */

$this->title = 'Create Lista Fotos';
$this->params['breadcrumbs'][] = ['label' => 'Lista Fotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-fotos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
