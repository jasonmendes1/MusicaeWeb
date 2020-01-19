<?php

namespace backend\modules\v1\controllers;

use common\models\User;
use yii\rest\ActiveController;
use yii\helpers\Json;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;

// use yii\web\IdentityInterface;

/**
 * Default controller for the `v1` module
 */
//implements IdentityInterface
class BandasController extends ActiveController
{
    public $modelClass = 'common\models\Bandas';
    public $modelBDHabilidade = 'common\models\BandaHabilidades';
    public $modelHabilidade = 'common\models\Habilidades';
    public $modelMembrosBanda = 'common\models\BandaMembros';
    public $modelUser = 'common\models\User';
    public $modelProfile = 'common\models\Profiles';
    public $modelMusico = 'common\models\Musicos';
    public $modelGenero = 'common\models\Generos';

    public function actionPerfil()
    {
        $bandas = new $this->modelClass;
        $recs = $bandas::find()->all();
        $genero = new $this->modelGenero;


        $perfil = array();

        foreach ($recs as $rec) {
            $generoRec = $genero::find()->where("Id=" . '\'' . $rec->IdGenero . '\'')->one();

            array_push($perfil, 
            ["Id" => $rec->Id, 
            "Nome" => $rec->Nome,
            "Genero" => $generoRec->Nome,
            "Localizacao" => $rec->Localizacao, 
            "Contacto" => $rec->Contacto, 
            "Descricao" => $rec->Descricao, 
            "Capa" => $rec->Logo]);

        }

        return $perfil;
    }

    public function actionMembros($iduser)
    {
        $user = new $this->modelUser;
        $recUser = $user::find()->where("Id=" . '\'' . $iduser . '\'')->one();
        if ($recUser == null) {
            return ['error' => "404"];
        }
        $profile = new $this->modelProfile;
        $recProfile = $profile::find()->where("Id=" . '\'' . $recUser->profile->Id . '\'')->one();;

        $membros = new $this->modelMembrosBanda;
        $recs = $membros::find()->where("IdMusico=" . '\'' . $recProfile->musicos->Id . '\'')->one();
        $habilidade = new $this->modelHabilidade;
        $temp = array();
        $aux = array();

        foreach ($recs as $rec) {
            $habilidadeRec = $habilidade::find()->where("Id=" . '\'' . $rec->musico->idHabilidade . '\'')->one();
            array_push($temp, $rec->DataEntrada, $rec->banda->Nome, $habilidadeRec->Nome);
            array_push($aux, $temp);
            $temp = array();
        }

        return ['Minhas_Bandas' => $aux];
    }

    //Feed com base na habilidade escolhida no filtro
    public function actionFeedhabilidade($idhabilidade)
    {
        //NomeBanda(Bandas), NomeHabilidade(Habilidades), Experiencia(BandaHabilidade), Compromisso(BandaHabilidade);
        $banda = new $this->modelClass;
        $bandaHabilidade = new $this->modelBDHabilidade;
        $habilidade = new $this->modelHabilidade;

        $recs = $banda::find()->all();
        $recs2 = $bandaHabilidade::find()->where("IdHabilidade=" . '\'' . $idhabilidade . '\'')->all();

        return ['IdBanda' => $recs2];
        //return ['idhabilidade' => $recs2];
        //$rec = $userModel::find()->where("username=" . '\'' . $user . '\'')->one();
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
