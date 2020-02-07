<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Habilidades;
use common\models\Generos;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $modelMusico common\models\Musicos */
/* @var $modelUser common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    a {
        color: #800000;
    }

    a:hover {
        color: #800000;
    }
</style>

<div class="profiles-form" style="color: #800000;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelUser, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataNac')->textInput() ?>

    <?= $form->field($model, 'Localidade')->textInput() ?>

    <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Foto')->textInput() ?>

    <?= $form->field($modelMusico, 'NivelCompromisso')->dropDownList(
        [ 'Diversao' => 'Diversao', 'Moderadamente Comprometido' => 'Moderadamente Comprometido', 'Comprometido' => 'Comprometido', 'Muito Comprometido' => 'Muito Comprometido', 'Tour' => 'Tour'],
        ['prompt' => '']
    ) ?>
    <?= $form->field($modelMusico, 'idHabilidade')->dropDownList(
        ArrayHelper::map(Habilidades::find()->all(), 'Id','Nome'),
        ['prompt'=>'']
    ) ?>

    <?= $form->field($modelMusico, 'idGenero')->dropDownList(
        ArrayHelper::map(Generos::find()->all(), 'Id','Nome'),
        ['prompt'=>'']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>