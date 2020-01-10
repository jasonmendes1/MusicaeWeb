<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BandaHabilidades */
/* @var $bandas common\models\Bandas */

$this->title = $model->IdBanda;
$this->params['breadcrumbs'][] = ['label' => 'Banda Habilidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="banda-habilidades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'IdBanda' => $model->IdBanda, 'IdHabilidade' => $model->IdHabilidade], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'IdBanda' => $model->IdBanda, 'IdHabilidade' => $model->IdHabilidade], [
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
            'IdHabilidade',
            'banda.Nome',
            'habilidade.Nome',
        ],
    ]) ?>

</div>