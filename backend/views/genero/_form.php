<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Generos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->dropDownList([ 'acoustic' => 'Acoustic', 'alternative' => 'Alternative', 'blues' => 'Blues', 'celtic' => 'Celtic', 'gospel' => 'Gospel', 'classic rock' => 'Classic rock', 'classical' => 'Classical', 'country' => 'Country', 'electronic' => 'Electronic', 'funk' => 'Funk', 'hip hop' => 'Hip hop', 'jazz' => 'Jazz', 'metal' => 'Metal', 'pop' => 'Pop', 'reggae' => 'Reggae', 'rock' => 'Rock', 'other' => 'Other', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
