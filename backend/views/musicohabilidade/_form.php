<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MusicoHabilidade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="musico-habilidade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdMusico')->textInput() ?>

    <?= $form->field($model, 'IdHabilidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
