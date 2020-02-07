<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leiturasensores */

// var_dump(\Yii::$app->authManager->getRolesByUser(\Yii::$app->user->identity->id));


$auth = \Yii::$app->authManager;
$userRole = $auth->getRole('admin');

var_dump($userRole);



if (\Yii::$app->user->can('editarBanda')) {
    $this->title = 'Create Leiturasensores';
    $this->params['breadcrumbs'][] = ['label' => 'Leiturasensores', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
    <div class="leiturasensores-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

<?php } ?>