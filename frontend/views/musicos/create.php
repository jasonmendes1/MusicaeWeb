<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicos */

$this->title = 'Create Musicos';
$this->params['breadcrumbs'][] = ['label' => 'Musicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
