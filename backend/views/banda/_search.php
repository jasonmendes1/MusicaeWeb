<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BandasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bandas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'Descricao') ?>

    <?= $form->field($model, 'Localizacao') ?>

    <?= $form->field($model, 'Contacto') ?>

    <?php // echo $form->field($model, 'Logo') ?>

    <?php // echo $form->field($model, 'Removida') ?>

    <?php // echo $form->field($model, 'IdGenero') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
