<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bandas */

$this->title = 'Create Bandas';
$this->params['breadcrumbs'][] = ['label' => 'Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    a {
        color: #800000;
    }

    a:hover {
        color: #800000;
    }
</style>

<div class="bandas-create" style="color: #800000;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>