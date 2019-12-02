<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industrias */

$this->title = 'Create Industrias';
$this->params['breadcrumbs'][] = ['label' => 'Industrias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industrias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
