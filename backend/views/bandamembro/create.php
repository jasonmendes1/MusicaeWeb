<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BandaMembros */

$this->title = 'Create Banda Membros';
$this->params['breadcrumbs'][] = ['label' => 'Banda Membros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banda-membros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
