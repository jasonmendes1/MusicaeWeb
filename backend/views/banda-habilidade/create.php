<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandaHabilidades */

$this->title = 'Create Banda Habilidades';
$this->params['breadcrumbs'][] = ['label' => 'Banda Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banda-habilidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
