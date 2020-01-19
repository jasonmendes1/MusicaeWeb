<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;


/**
 * Default controller for the `v1` module
 */
class BandaHabilidadesController extends ActiveController
{
    public $modelClass = 'common\models\BandaHabilidades';
    public $modelBanda = 'common\models\Bandas';
    public $modelHabilidade = 'common\models\Habilidades';

    public function actionFeed()
    {
        $bandaHabilidades = new $this->modelClass;
        $recs = $bandaHabilidades::find()->all();
        $banda = new $this->modelBanda;
        $habilidade = new $this->modelHabilidade;
        /*$auxNome = array();
        $auxLogo = array();
        $auxInstrumento = array();
        $auxExperiencia = array();
        $auxCompromisso = array();*/
        $feed = array();

        foreach ($recs as $rec) {
            $bandaRec = $banda::find()->where("Id=" . '\'' . $rec->IdBanda . '\'')->one();
            $habilidadeRec = $habilidade::find()->where("Id=" . '\'' . $rec->IdHabilidade . '\'')->one();

            array_push($feed, 
            ['Id'=>$rec->Id, 
            "Nome" => $bandaRec->Nome, 
            "Instrumento" => $habilidadeRec->Nome, 
            "Experiencia" => $rec->experiencia, 
            "Compromisso" => $rec->compromisso, 
            "Logo" => $bandaRec->Logo]);
        }

        //ir buscar todos
        return $feed;

        //ir buscar 1 pedido
        //return $feed[0];

        //ir buscar o nome por exemplo
        //return $feed[0][0];
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
}
