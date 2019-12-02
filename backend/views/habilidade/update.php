<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Habilidades */

$this->title = 'Update Habilidades: ' . $model->IDHabilidade;
$this->params['breadcrumbs'][] = ['label' => 'Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDHabilidade, 'url' => ['view', 'id' => $model->IDHabilidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="habilidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
