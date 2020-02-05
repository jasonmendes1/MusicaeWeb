<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Habilidades;
use common\models\Generos;
use common\models\User;
use common\models\Profiles;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'Nome') ?>
                <?= $form->field($model, 'Sexo')->textInput() ?>
                <?= $form->field($model, 'DataNac')->textInput() ?>
                <?= $form->field($model, 'Descricao')->textInput() ?>
                <?= $form->field($model, 'Localidade')->textInput() ?>

                <?= $form->field($model, 'NivelCompromisso')->dropDownList(
                    [ 'Diversao' => 'Diversao', 'Moderadamente Comprometido' => 'Moderadamente Comprometido', 'Comprometido' => 'Comprometido', 'Muito Comprometido' => 'Muito Comprometido', 'Tour' => 'Tour'],
                    ['prompt' => '']
                ) ?>
                <?= $form->field($model, 'idHabilidade')->dropDownList(
                    ArrayHelper::map(Habilidades::find()->all(), 'Id','Nome'),
                    ['prompt'=>'']
                ) ?>

                <?= $form->field($model, 'idGenero')->dropDownList(
                    ArrayHelper::map(Generos::find()->all(), 'Id','Nome'),
                    ['prompt'=>'']
                ) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
