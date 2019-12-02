<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListaBandas */

$this->title = 'Create Lista Bandas';
$this->params['breadcrumbs'][] = ['label' => 'Lista Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-bandas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
