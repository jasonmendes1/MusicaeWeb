<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Generos;

/* @var $this yii\web\View */
/* @var $model common\models\BandaMembros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banda-membros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput() ?>
    <?= $form->field($model, 'Descricao')->textInput() ?>
    <?= $form->field($model, 'Localizacao')->textInput() ?>
    <?= $form->field($model, 'Contacto')->textInput() ?>
    <?= $form->field($model, 'IdGenero')->dropDownList(
        ArrayHelper::map(Generos::find()->all(), 'Id','Nome'),
        ['prompt'=>'']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
