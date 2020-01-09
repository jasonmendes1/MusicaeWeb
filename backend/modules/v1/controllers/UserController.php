<?php

namespace backend\modules\v1\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\web\User;
use yii\rest\ActiveController;
use yii\web\Request;
use Yii;

/**
 * Default controller for the `v1` module
 */
class UserController extends ActiveController
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

    public function auth($username, $password)
    { 
        $user = \common\models\
        User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
        return $user;
        }
        return null;
    }

    public function actionTotal()
    {
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();

        return ['total' => count($recs)];
    }

    // public function actionVerifica($user, $pw)
    // {
    //     $userModel = new $this->modelClass;
    //     if (!($userModel::find()->where("username=" . '\'' . $user . '\'')->one())) {
    //         return ['id' => -1];
    //     }
    //     // Token.
    //     $key = "tHeApAcHe6410111";
    //     $pw .= "==";
    //     $dec = openssl_decrypt(base64_decode($pw), "aes-128-ecb", $key, OPENSSL_RAW_DATA);

    //     $rec = $userModel::find()->where("username=" . '\'' . $user . '\'')->one();
    //     if ($rec->validatePassword($dec)) {
    //         return ['id' => $rec->id];
    //     } else {
    //         return ['id' => -1];
    //     }
    // }

    public function actionVerifica()
    {
        //Authorization: Basic Auth
        //Tentar sacar o id do gajo que faz a autênticação.
        $userModel = new $this->modelClass;
        $request = Yii::$app->request;

        $user = $request->get('username');
        $pw = $request->get('password_hash');
        $key = "tHeApAcHe6410111";


        $dec = openssl_decrypt(base64_decode($pw), "aes-128-ecb", $key, OPENSSL_RAW_DATA);
        if (!($userModel::find()->where("username=" . '\'' . $user . '\'')->one())) {
            return ['id' => -1];
        }

        $rec = $userModel::find()->where("username=" . '\'' . $user . '\'')->one();
        if ($rec->validatePassword($dec)) {
            return ['id' => $rec->id];
        } else {
            return ['id' => -1];
        }
    }
}
