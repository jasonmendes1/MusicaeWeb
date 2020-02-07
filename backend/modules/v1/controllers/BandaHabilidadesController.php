<?php

namespace backend\modules\v1\controllers;

use common\models\Bandahabilidades;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;
use Yii;


/**
 * Default controller for the `v1` module
 */
class BandaHabilidadesController extends ActiveController
{
    public $modelClass = 'common\models\BandaHabilidades';
    public $modelBanda = 'common\models\Bandas';
    public $modelHabilidade = 'common\models\Habilidades';
    public $modelBDHabilidade = 'common\models\BandaHabilidades';
    public $modelMembrosBanda = 'common\models\BandaMembros';
    public $modelUser = 'common\models\User';
    public $modelProfile = 'common\models\Profiles';
    public $modelMusico = 'common\models\Musicos';
    public $modelGenero = 'common\models\Generos';

    public function actionFeed($id)
    {
        $user = new $this->modelUser;
        $recUser = $user::find()->where("Id=" . '\'' . $id . '\'')->one();
        if ($recUser == null) {
            return ['error' => "404"];
        }
        $profile = new $this->modelProfile;
        $recProfile = $profile::find()->where("Id=" . '\'' . $recUser->profile->Id . '\'')->one();;

        $membros = new $this->modelMembrosBanda;
        $bandaMembros = $membros::find()->where("IdMusico=" . '\'' . $recProfile->musicos->Id . '\'')->all();

        $bandaHabilidades = new $this->modelClass;
        $recs = $bandaHabilidades::find()->all();
        $banda = new $this->modelBanda;
        $habilidade = new $this->modelHabilidade;
        $feed = array();
        $minhasBandas = array();
        $i = 0;

        foreach ($bandaMembros as $bandasMembros) {
            foreach ($recs as $rec) {
                if ($bandasMembros->IdBanda == $rec->IdBanda) {
                    array_push($minhasBandas, $bandasMembros->IdBanda);
                    continue;
                }
            }
        }

        foreach ($recs as $rec) {
            $bandaRec = $banda::find()->where("Id=" . '\'' . $rec->IdBanda . '\'')->one();
            if ($bandaRec->Removida == 1) {
                continue;
            }
            $habilidadeRec = $habilidade::find()->where("Id=" . '\'' . $rec->IdHabilidade . '\'')->one();

            array_push(
                $feed,
                [
                    "Id" => $bandaRec->Id,
                    "Nome" => $bandaRec->Nome,
                    "Instrumento" => $habilidadeRec->Nome,
                    "Experiencia" => $rec->experiencia,
                    "Compromisso" => $rec->compromisso,
                    "Logo" => $bandaRec->Logo
                ]
            );
        }

        foreach ($feed as $Id => $fed) {
            if (in_array($fed['Id'], $minhasBandas)) {
                unset($feed[$i]);
            }
            $i++;
        }
        $feed = array_values($feed);

        return $feed;
    }

    public function actionFeeed($id)
    {
        $bandaHabilidades = new $this->modelClass;
        $rec = $bandaHabilidades::find()->where("Id=" . '\'' . $id . '\'')->one();
        $banda = new $this->modelBanda;
        $habilidade = new $this->modelHabilidade;

        $feeed = array();

        $bandaRec = $banda::find()->where("Id=" . '\'' . $rec->IdBanda . '\'')->one();
        $habilidadeRec = $habilidade::find()->where("Id=" . '\'' . $rec->IdHabilidade . '\'')->one();

        array_push(
            $feeed,
            [
                "Id" => $bandaRec->Id,
                "Nome" => $bandaRec->Nome,
                "Instrumento" => $habilidadeRec->Nome,
                "Experiencia" => $rec->experiencia,
                "Compromisso" => $rec->compromisso,
                "Logo" => $bandaRec->Logo
            ]
        );

        return $feeed;
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
