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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
