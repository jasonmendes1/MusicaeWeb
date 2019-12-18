<?php

//use yii\widgets\UploadForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ListaMusicas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lista-musicas-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'CaminhoPasta[]')->fileInput(['multiple' => false, 'accept' => 'audio/mp3, audio/wav']) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
