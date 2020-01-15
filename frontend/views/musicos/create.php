<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicos */

$this->title = 'Create Musicos';
$this->params['breadcrumbs'][] = ['label' => 'Musicos', 'url' => ['index']];
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

<div class="musicos-create" style="color: #800000;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>