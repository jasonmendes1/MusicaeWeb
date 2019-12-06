<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = 'common\models\User';

    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
        'class' => HttpBasicAuth::className(),
        'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password){
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) 
        {
            return $user;
        } 
        return null;
    }

    /*
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
        'class' => HttpBasicAuth::className(),
        'auth' => function ($username, $password){
            $user = \common\models\User::findByUsername($username);
            if ($user && $user->validatePassword($password)){
                return $user;
            }
        } return null;
        ];
    }
    */
}
