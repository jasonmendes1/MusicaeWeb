<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BandaHabilidadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banda-habilidades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdBanda') ?>

    <?= $form->field($model, 'IdHabilidade') ?>

    <?= $form->field($model, 'experiencia') ?>

    <?= $form->field($model, 'compromisso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
