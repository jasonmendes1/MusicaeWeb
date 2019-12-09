<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IndustriasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="industrias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Tipo') ?>

    <?= $form->field($model, 'IdProfile') ?>

    <?= $form->field($model, 'IdGenero') ?>

    <?= $form->field($model, 'IdListaMusica') ?>

    <?php // echo $form->field($model, 'IdListaFoto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
