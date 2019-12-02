<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BandaGenero */

$this->title = $model->IdBanda;
$this->params['breadcrumbs'][] = ['label' => 'Banda Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="banda-genero-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdBanda' => $model->IdBanda, 'IdGenero' => $model->IdGenero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdBanda' => $model->IdBanda, 'IdGenero' => $model->IdGenero], [
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
            'IdBanda',
            'IdGenero',
        ],
    ]) ?>

</div>
