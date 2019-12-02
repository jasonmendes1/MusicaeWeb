<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BandaMembros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banda-membros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdBanda')->textInput() ?>

    <?= $form->field($model, 'IdMusico')->textInput() ?>

    <?= $form->field($model, 'Idhabilidade')->textInput() ?>

    <?= $form->field($model, 'DataEntrada')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
