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

    //Feed completo, caso não tenha escolhido nada no filtro
    public function actionFeed()
    {
        $bandaHabilidade = new $this->modelBDHabilidade;
        $habilidade = new $this->modelHabilidade;
        $banda = new $this->modelClass;
        $recsBandasHabilidades = $bandaHabilidade::find()->all();

        $idHabilidade = array();
        $experiencia = array();
        $recs2 = array();
        $tempArray = array();
        $i = 0;

        foreach ($recsBandasHabilidades as $rec) {
            $idHabilidade[$i] = $rec->getHabilidade()->primaryModel->IdHabilidade;
            $experiencia[$i] = $rec->getHabilidade()->primaryModel->experiencia;

            $recsHabilidade = $habilidade::find()->where("Id=" . '\'' . $rec->getHabilidade()->primaryModel->IdHabilidade . '\'')->one();
            $recsBanda = $banda::find()->where("Id=" . '\'' . $rec->getHabilidade()->primaryModel->IdBanda . '\'')->one();

            array_push($tempArray, $recsBanda->Nome, $recsHabilidade->Nome);
            array_push($recs2, $tempArray);
            $tempArray = array();
            $i++;
        }

        return ["idHabilidade" => $recs2];
        /* 
        return ["idHabilidade" => $recsBandasHabilidades];
        return ["skrt" => ];
        $habilidade = new $this->modelHabilidade;
        $recsHabilidade = $habilidade::find()->where("Id=" . '\'' . $recsBandas->IdHabilidade . '\'')->one();
        return ['feed' => $recsHabilidade];
        */
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
