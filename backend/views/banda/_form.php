<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Generos;

/* @var $this yii\web\View */
/* @var $model common\models\Bandas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bandas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Localizacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Logo')->textInput() ?>

    <?= $form->field($model, 'Removida')->textInput() ?>

    <?= $form->field($model, 'IdGenero')->dropDownList(
        ArrayHelper::map(Generos::find()->all(), 'Id','Nome'),
        ['prompt'=>'']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
