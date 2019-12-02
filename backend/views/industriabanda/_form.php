<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IndustriaBandas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="industria-bandas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Duracao')->textInput() ?>

    <?= $form->field($model, 'IdIndustria')->textInput() ?>

    <?= $form->field($model, 'IdBanda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
