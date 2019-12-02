<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicoHabilidade */

$this->title = 'Create Musico Habilidade';
$this->params['breadcrumbs'][] = ['label' => 'Musico Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musico-habilidade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
