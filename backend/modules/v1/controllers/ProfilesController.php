<?php

namespace backend\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class ProfilesController extends ActiveController
{
    public $modelClass = 'common\models\Profiles';
}
