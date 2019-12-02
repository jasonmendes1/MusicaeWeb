<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ListaBandas */

$this->title = $model->IdMusico;
$this->params['breadcrumbs'][] = ['label' => 'Lista Bandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lista-bandas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdMusico' => $model->IdMusico, 'IdBanda' => $model->IdBanda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdMusico' => $model->IdMusico, 'IdBanda' => $model->IdBanda], [
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
            'IdBanda',
        ],
    ]) ?>

</div>
