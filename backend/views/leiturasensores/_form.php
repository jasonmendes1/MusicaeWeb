<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Leiturasensores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leiturasensores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'Temperatura')->textInput() ?>

    <?= $form->field($model, 'Humidade')->textInput() ?>

    <?= $form->field($model, 'Luminosidade')->textInput() ?>

    <?= $form->field($model, 'Descricao')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
