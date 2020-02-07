<?php

namespace frontend\controllers;

use frontend\models\CriarBandaForm;
use Yii;
use common\models\BandaMembros;
use common\models\Profiles;
use common\models\User;
use common\models\BandaMembrosSearch;
use yii\helpers\BaseVarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BandaMembroController implements the CRUD actions for BandaMembros model.
 */
class BandaMembroController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BandaMembros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BandaMembrosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $currentId = Yii::$app->user->id;
        $user = User::find()->where(['id' => $currentId])->one();

        $dataProvider = $user->profile->musicos->bandas;

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BandaMembros model.
     * @param integer $IdBanda
     * @param integer $IdMusico
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdBanda, $IdMusico)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdBanda, $IdMusico),
        ]);
    }

    /**
     * Creates a new BandaMembros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CriarBandaForm();

        if ($model->load(Yii::$app->request->post()) && $model->criarBanda()) {
            return $this->redirect(['/banda-membro/index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BandaMembros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdBanda
     * @param integer $IdMusico
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdBanda, $IdMusico)
    {
        $model = $this->findModel($IdBanda, $IdMusico);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdMusico' => $model->IdMusico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BandaMembros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdBanda
     * @param integer $IdMusico
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdBanda, $IdMusico)
    {
        $this->findModel($IdBanda, $IdMusico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BandaMembros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdBanda
     * @param integer $IdMusico
     * @return BandaMembros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdBanda, $IdMusico)
    {
        if (($model = BandaMembros::findOne(['IdBanda' => $IdBanda, 'IdMusico' => $IdMusico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
