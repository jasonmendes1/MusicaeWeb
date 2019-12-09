<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Industrias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="industrias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Tipo')->dropDownList([ 'songwriter' => 'Songwriter', 'producer' => 'Producer', 'photographer' => 'Photographer', 'manager' => 'Manager', 'recording studio' => 'Recording studio', 'music teacher' => 'Music teacher', 'sound engineer' => 'Sound engineer', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'IdProfile')->textInput() ?>

    <?= $form->field($model, 'IdGenero')->textInput() ?>

    <?= $form->field($model, 'IdListaMusica')->textInput() ?>

    <?= $form->field($model, 'IdListaFoto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
