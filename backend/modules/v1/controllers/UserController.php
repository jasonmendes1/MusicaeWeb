<?php

namespace backend\modules\v1\controllers;

use yii\web\User;

use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionTotal()
    {
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();

        return ['total' => count($recs)];
    }

    public function actionVerifica($user, $pw)
    {
        $userModel = new $this->modelClass;
        if (!($userModel::find()->where("username=" . '\'' . $user . '\'')->one())) {
            return ['id' => -1];
        }

        $rec = $userModel::find()->where("username=" . '\'' . $user . '\'')->one();
        if ($rec->validatePassword($pw)) {
            return ['id' => $rec->id];
        } else {
            return ['id' => -1];
        }
    }
}
