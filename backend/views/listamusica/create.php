<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListaMusicas */

$this->title = 'Create Lista Musicas';
$this->params['breadcrumbs'][] = ['label' => 'Lista Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-musicas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
