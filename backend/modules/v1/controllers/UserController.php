<?php

namespace backend\modules\v1\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\web\User;
use yii\rest\ActiveController;
use yii\web\Request;
use yii\web\Response;
use Yii;

/**
 * Default controller for the `v1` module
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $modelProfile = 'common\models\Profiles';
    public $modelHabilidade = 'common\models\Habilidades';
    public $modelGenero = 'common\models\Generos';

    public function actionTotal()
    {
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();

        return ['total' => count($recs)];
    }

    public function actionVerifica()
    {
        //Authorization: Basic Auth
        //Tentar sacar o id do gajo que faz a autênticação.
        $userModel = new $this->modelClass;
        $request = Yii::$app->request;
        $userInfo = array();

        $user = $request->get('username');
        $pw = $request->get('password_hash');
        $key = "tHeApAcHe6410111";


        $dec = openssl_decrypt(base64_decode($pw), "aes-128-ecb", $key, OPENSSL_RAW_DATA);
        if (!($userModel::find()->where("username=" . '\'' . $user . '\'')->one())) {
            return ['id' => -1];
        }

        $rec = $userModel::find()->where("username=" . '\'' . $user . '\'')->one();
        array_push(
            $userInfo,
            [
                "id" => $rec->Id,
                "username" => $rec->username,
                "email" => $rec->email,
            ]
        );
        if ($rec->validatePassword($dec)) {
            return $userInfo;
        } else {
            return ['id' => -1];
        }
    }
    /*
    UNTOUCHED
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
            return ['id' => $rec->Id];
        } else {
            return ['id' => -1];
        }
    }
    */

    public function actionProfile($id)
    {
        $user = new $this->modelClass;
        $userRecord = $user::find()->where("Id=" . '\'' . $id . '\'')->one();
        $habilidadeModel = new $this->modelHabilidade;
        $generoModel = new $this->modelGenero;
        $profile = array();

        $habilidadeRecord = $habilidadeModel::find()->where("Id=" . '\'' . $userRecord->profile->musicos->idHabilidade . '\'')->one();
        $generoRecord = $generoModel::find()->where("Id=" . '\'' . $userRecord->profile->musicos->idGenero . '\'')->one();

        array_push(
            $profile,
            [
                "UserUsername" => $userRecord->username,
                "HabilidadeNome" => $habilidadeRecord->Nome,
                "GeneroNome" => $generoRecord->Nome,
                "ProfileNome" => $userRecord->profile->Nome,
                "ProfileSexo" => $userRecord->profile->Sexo,
                "ProfileLocalidade" => $userRecord->profile->Localidade,
                "ProfileFoto" => $userRecord->profile->Foto,
                "UserEmail" => $userRecord->email,
            ]
        );
        return $profile;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ];
        return $behaviors;
    }
}
