<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;


/**
 * Default controller for the `v1` module
 */
class BandaMembrosController extends ActiveController
{
    public $modelClass = 'common\models\BandaMembros';

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
