<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Musicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="musicos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NivelCompromisso')->dropDownList([ 'Diversao' => 'Diversao', 'Moderadamente Comprometido' => 'Moderadamente Comprometido', 'Comprometido' => 'Comprometido', 'Muito Comprometido' => 'Muito Comprometido', 'Tour' => 'Tour', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'idProfile')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
