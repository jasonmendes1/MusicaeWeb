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
    public $modelMusico = 'common\models\Musicos';

    public function actionTotal()
    {
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();

        return ['total' => count($recs)];
    }

    public function actionVerifica()
    {
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
                "HabilidadeId" => $habilidadeRecord->Id,
                "HabilidadeNome" => $habilidadeRecord->Nome,
                "GeneroId" => $generoRecord->Id,
                "GeneroNome" => $generoRecord->Nome,
                "ProfileNome" => $userRecord->profile->Nome,
                "ProfileSexo" => $userRecord->profile->Sexo,
                "ProfileLocalidade" => $userRecord->profile->Localidade,
                "ProfileDataNasc" => $userRecord->profile->DataNac,
                "ProfileDescricao" => $userRecord->profile->Descricao,
                "ProfileFoto" => $userRecord->profile->Foto,
                "UserEmail" => $userRecord->email,
            ]
        );
        return $profile;
    }

    public function actionEdit()
    {
        $request = Yii::$app->request;

        $idUser = $request->get('IdUser');
        $user = new $this->modelClass;
        $profile = new $this->modelProfile;
        $musico = new $this->modelMusico;
        $userRecord = $user::find()->where("Id=" . '\'' . $idUser . '\'')->one();
        $musicoRecord = $musico::find()->where("Id=" . '\'' . $userRecord->profile->musicos->Id . '\'')->one();
        $profileRecord = $profile::find()->where("Id=" . '\'' . $userRecord->profile->Id . '\'')->one();

        $habilidadeId = $request->get('HabilidadeId');
        $generoId = $request->get('GeneroId');
        $profileNome = $request->get('ProfileNome');
        $profileSexo = $request->get('ProfileSexo');
        $profileLocalidade = $request->get('ProfileLocalidade');
        $profileDescricao = $request->get('ProfileDescricao');

        $musicoRecord->idHabilidade = $habilidadeId;
        $musicoRecord->idGenero = $generoId;
        $profileRecord->Nome = $profileNome;
        $profileRecord->Sexo = $profileSexo;
        $profileRecord->Localidade = $profileLocalidade;
        $profileRecord->Descricao = $profileDescricao;

        $musicoRecord->save();
        $userRecord->save();
        $profileRecord->save(false);

        return $profileRecord->Id;
    }

    public function actionAdd()
    {
        $request = Yii::$app->request;

        $userUsername = $request->get('userUsername');
        $userPassword = $request->get('userPassword');
        $userEmail = $request->get('userEmail');
        $profileNome = $request->get('profileNome');
        $profileSexo = $request->get('profileSexo');
        $profileLocalidade = $request->get('profileLocalidade');
        $profileDataNasc = $request->get('profileDataNasc');
        $musicoIdHabilidade = $request->get('musicoIdHabilidade');
        $musicoIdIdGenero = $request->get('musicoIdGenero');


        $user = new $this->modelClass;
        $user->setPassword($userPassword);
        $user->username = $userUsername;
        $user->status = 1;
        $user->email = $userEmail;
        $user->generateAuthKey();
        $user->save(false);

        $profile = new $this->modelProfile;
        $profile->IdUser = $user->Id;
        $profile->Nome = $profileNome;
        $profile->Sexo = $profileSexo;
        $profile->Localidade = $profileLocalidade;
        $profile->DataNac = $profileDataNasc;
        $profile->Descricao = "";
        $profile->Foto = "";
        $profile->save(false);


        $musico = new $this->modelMusico;
        $musico->idProfile = $profile->Id;
        $musico->NivelCompromisso = "Diversao";
        $musico->idHabilidade = $musicoIdHabilidade;
        $musico->idGenero = $musicoIdIdGenero;
        $musico->save(false);

        return 0;
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
