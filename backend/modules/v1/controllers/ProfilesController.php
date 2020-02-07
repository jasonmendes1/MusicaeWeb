<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;


/**
 * Default controller for the `v1` module
 */
class ProfilesController extends ActiveController
{
    public $modelClass = 'common\models\Profiles';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ];
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }
}
