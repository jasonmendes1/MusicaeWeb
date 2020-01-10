<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sexo')->dropDownList(['Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Outro' => 'Outro',], ['prompt' => '']) ?>

    <?= $form->field($model, 'DataNac')->textInput() ?>

    <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Foto')->textInput() ?>

    <?= $form->field($model, 'Localidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdUser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>