<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bandas */

$this->title = 'Create Bandas';
$this->params['breadcrumbs'][] = ['label' => 'Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bandas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>