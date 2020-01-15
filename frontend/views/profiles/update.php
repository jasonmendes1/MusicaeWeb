<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */

$this->title = 'Update Profiles: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<style>
    a {
        color: #800000;
    }

    a:hover {
        color: #800000;
    }
</style>

<div class="profiles-update" style="color: #800000;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>