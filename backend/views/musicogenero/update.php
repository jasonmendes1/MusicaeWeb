<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicoGenero */

$this->title = 'Update Musico Genero: ' . $model->IdMusico;
$this->params['breadcrumbs'][] = ['label' => 'Musico Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMusico, 'url' => ['view', 'IdMusico' => $model->IdMusico, 'IdGenero' => $model->IdGenero]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="musico-genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
