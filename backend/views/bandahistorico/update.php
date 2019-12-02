<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandasHistorico */

$this->title = 'Update Bandas Historico: ' . $model->IdMusico;
$this->params['breadcrumbs'][] = ['label' => 'Bandas Historicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMusico, 'url' => ['view', 'IdMusico' => $model->IdMusico, 'IdBanda' => $model->IdBanda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bandas-historico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
