<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IndustriaBandas */

$this->title = 'Create Industria Bandas';
$this->params['breadcrumbs'][] = ['label' => 'Industria Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industria-bandas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
