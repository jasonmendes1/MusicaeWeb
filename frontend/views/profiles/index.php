<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Profiles;
use common\models\Musicos;
use common\models\Generos;
use common\models\Habilidades;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;

$user_id = Yii::$app->user->identity->getId();
$profile = Profiles::find()->where(['IdUser' => $user_id])->one();
$musico = Musicos::find()->where(['idProfile' => $profile->Id])->one();
$genero = Generos::find()->where(['Id' => $musico->idGenero])->one();
$habilidade = Habilidades::find()->where(['Id' => $musico->idHabilidade])->one();

?>

<style>
    body {
        color: #293133 !important;
    }

    h1 {
        color: #ffffff;
        font-size: 30px;
    }

    table,
    th,
    td {
        color: #ffffff;
        font-size: 20px;
        border: 1px solid black;
        padding: 10px;
    }
</style>

<div class="profiles-index" style="color: #800000;">

    <h1><img style="border-radius: 50%; width: 150px; height: 150px;" src="https://images.unsplash.com/photo-1510915361894-db8b60106cb1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt=""><?= Yii::$app->user->identity->username ?> (<?= Yii::$app->user->identity->email ?>)</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <table style="width:100%">
        <tr>
            <th>Nome</th>
            <td><?= $profile->Nome ?></td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td><?= $profile->Sexo ?></td>
        </tr>
        <tr>
            <th>Data de Nascimento</th>
            <td><?= $profile->DataNac ?></td>
        </tr>
        <tr>
            <th>Localidade</th>
            <td><?= $profile->Localidade ?></td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td><?= $profile->Descricao ?></td>
        </tr>
        <tr>
            <th>Nível de Compromisso</th>
            <td><?= $musico->NivelCompromisso ?></td>
        </tr>
        <tr>
            <th>Habilidade</th>
            <td><?= $habilidade->Nome ?></td>
        </tr>
        <tr>
            <th>Genero</th>
            <td><?= $genero->Nome ?></td>
        </tr>
    </table>

</div>