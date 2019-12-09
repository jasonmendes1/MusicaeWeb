<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MusicoHabilidade */

$this->title = $model->IdMusico;
$this->params['breadcrumbs'][] = ['label' => 'Musico Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="musico-habilidade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdMusico' => $model->IdMusico, 'IdHabilidade' => $model->IdHabilidade], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdMusico' => $model->IdMusico, 'IdHabilidade' => $model->IdHabilidade], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdMusico',
            'IdHabilidade',
        ],
    ]) ?>

</div>
