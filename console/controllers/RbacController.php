<?php
namespace console\controllers;

use Yii;

class RbacController extends \yii\console\Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $acederBackend = $auth->createPermission('acederBackend');
        $acederBackend->description = 'Aceder ao Backend';
        $auth->add($acederBackend);

        $abrirBanda = $auth->createPermission('abrirBanda');
        $abrirBanda->description = 'Abrir uma banda';
        $auth->add($abrirBanda);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $abrirBanda);
        $auth->addChild($admin, $acederBackend);

        $user = $auth->createRole('user');
        $auth->add($user);

        $auth->assign($admin, 1);
        $auth->assign($admin, 8);
        $auth->assign($admin, 9);
        $auth->assign($user, 10);
    }
}