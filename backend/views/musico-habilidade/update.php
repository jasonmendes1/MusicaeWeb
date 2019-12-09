<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicoHabilidade */

$this->title = 'Update Musico Habilidade: ' . $model->IdMusico;
$this->params['breadcrumbs'][] = ['label' => 'Musico Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMusico, 'url' => ['view', 'IdMusico' => $model->IdMusico, 'IdHabilidade' => $model->IdHabilidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="musico-habilidade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
