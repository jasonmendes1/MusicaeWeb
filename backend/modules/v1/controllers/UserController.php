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

    public function actionTotal(){
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();
        
        return ['total' => count($recs)];
    }

    public function actionVerifica($id, $pw){
        $userModel = new $this->modelClass;
        $rec = $userModel::find()->where("id=".$id)->one();


        if($rec->validatePassword($pw)){
            return ['validate' => 'true'];
        }else{
            return ['validate' => 'false'];
        }
        // return ['id' => $rec->id, "pw" => $pw];
    }



    //return Yii::$app->security->validatePassword($password, $this->password_hash);





}
