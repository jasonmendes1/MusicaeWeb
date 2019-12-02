<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandasHistorico */

$this->title = 'Create Bandas Historico';
$this->params['breadcrumbs'][] = ['label' => 'Bandas Historicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bandas-historico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
