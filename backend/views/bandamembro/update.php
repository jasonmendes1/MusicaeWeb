<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandaMembros */

$this->title = 'Update Banda Membros: ' . $model->IdBanda;
$this->params['breadcrumbs'][] = ['label' => 'Banda Membros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdBanda, 'url' => ['view', 'IdBanda' => $model->IdBanda, 'IdMusico' => $model->IdMusico, 'Idhabilidade' => $model->Idhabilidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banda-membros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
