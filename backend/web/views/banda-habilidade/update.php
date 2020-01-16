<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandaHabilidades */

$this->title = 'Update Banda Habilidades: ' . $model->IdBanda;
$this->params['breadcrumbs'][] = ['label' => 'Banda Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdBanda, 'url' => ['view', 'IdBanda' => $model->IdBanda, 'IdHabilidade' => $model->IdHabilidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banda-habilidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
