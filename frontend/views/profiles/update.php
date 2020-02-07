<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $modelMusico common\models\Musicos */
/* @var $modelUser common\models\User */

$this->title = 'Update Profiles: ' . $model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<style>
    h1{
        color: #ffffff;
        font-size: 30px;
    }
    label{
        color: #ffffff;
    }
</style>

<div class="profiles-update">

    <h1>EDITAR PERFIL</h1>
    <br><br>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
        'modelMusico' => $modelMusico,
    ]) ?>

</div>