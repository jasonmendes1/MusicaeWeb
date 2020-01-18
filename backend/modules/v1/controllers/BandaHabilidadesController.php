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
        $temp = array();
        $aux = array();

        foreach ($recs as $rec) {
            $bandaRec = $banda::find()->where("Id=" . '\'' . $rec->IdBanda . '\'')->one();
            $habilidadeRec = $habilidade::find()->where("Id=" . '\'' . $rec->IdHabilidade . '\'')->one();
            array_push($temp, $bandaRec->Nome, $bandaRec->Logo, $habilidadeRec->Nome, $rec->experiencia, $rec->compromisso);
            array_push($aux, $temp);
            $temp = array();
        }

        return ['idBanda' => $aux];
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
