<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BandaHabilidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banda-habilidades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdBanda')->textInput() ?>

    <?= $form->field($model, 'IdHabilidade')->textInput() ?>

    <?= $form->field($model, 'experiencia')->dropDownList([ 'Aprendiz' => 'Aprendiz', 'Novato' => 'Novato', 'Experiente' => 'Experiente', 'Profissional' => 'Profissional', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'compromisso')->dropDownList([ 'Pouco' => 'Pouco', 'Medio' => 'Medio', 'Muito' => 'Muito', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
