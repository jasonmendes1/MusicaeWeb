<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Habilidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="habilidades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->dropDownList([ 'accordion' => 'Accordion', 'acoustic guitar' => 'Acoustic guitar', 'background singer' => 'Background singer', 'bagpipes' => 'Bagpipes', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
