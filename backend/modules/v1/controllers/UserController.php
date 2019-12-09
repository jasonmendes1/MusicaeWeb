<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionTotal(){
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();
        
        return ['total' => count($recs)];
    }

}
