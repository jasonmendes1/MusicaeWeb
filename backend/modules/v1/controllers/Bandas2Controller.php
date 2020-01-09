<?php

namespace backend\modules\v1\controllers;

use common\models\User;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

/**
 * Default controller for the `v1` module
 */
class BandasController extends ActiveController
{
    public $modelClass = 'common\models\Bandas';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
        'class' => HttpBasicAuth::className(),
        'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    { 
        $bandas = \common\models\
        User::findByUsername($username);
        if ($bandas && $bandas->validatePassword($password)) {
        return $bandas;
        }
        return null;
    }

}
