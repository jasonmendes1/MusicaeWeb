<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;
use Yii;


/**
 * Default controller for the `v1` module
 */
class BandaMembrosController extends ActiveController
{
    public $modelClass = 'common\models\BandaMembros';
    public $modelBanda = 'common\models\Bandas';
    public $modelMusico = 'common\models\Musicos';
    public $modelProfile = 'common\models\Profiles';
    public $modelUser = 'common\models\User';



    public function actionAdd()
    {
        $request = Yii::$app->request;
        $idUser = $request->get('IdUser');
        $BandaNome = $request->get('BandaNome');

        $user = new $this->modelUser;
        $userRec = $user::find()->where("Id=" . '\'' . $idUser . '\'')->one();

        $profile = new $this->modelProfile;
        $profileRec = $profile::find()->where("Id=" . '\'' . $userRec->profile->Id . '\'')->one();

        $musicos = new $this->modelMusico;
        $musicoRec = $musicos::find()->where("Id=" . '\'' . $profileRec->musicos->Id . '\'')->one();

        $banda = new $this->modelBanda;
        $bandaRec = $banda::find()->where("Nome=" . '\'' . $BandaNome . '\'')->one();


        $bandaMembro = new $this->modelClass;

        $bandaMembro->DataEntrada = date('Y/m/d H:i:s', time());
        $bandaMembro->IdBanda = $bandaRec->Id;
        $bandaMembro->IdMusico = $musicoRec->Id;
        $bandaMembro->save(false);

        \Yii::$app->response->statusCode = 201;
        return ["code" => "ok"];
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
