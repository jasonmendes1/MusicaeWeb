<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Habilidades */

$this->title = 'Create Habilidades';
$this->params['breadcrumbs'][] = ['label' => 'Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habilidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
