<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BandasHistorico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bandas-historico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdMusico')->textInput() ?>

    <?= $form->field($model, 'Duracao')->textInput() ?>

    <?= $form->field($model, 'IdBanda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
