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

    public function actionFeed()
    {
        $bandaHabilidades = new $this->modelClass;
        $recs = $bandaHabilidades::find()->all();
        $banda = new $this->modelBanda;
        $habilidade = new $this->modelHabilidade;
        $feed = array();

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
