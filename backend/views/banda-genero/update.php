<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandaGenero */

$this->title = 'Update Banda Genero: ' . $model->IdBanda;
$this->params['breadcrumbs'][] = ['label' => 'Banda Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdBanda, 'url' => ['view', 'IdBanda' => $model->IdBanda, 'IdGenero' => $model->IdGenero]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banda-genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
