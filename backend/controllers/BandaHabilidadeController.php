<?php

namespace app\controllers;

use Yii;
use common\models\BandaHabilidades;
use common\models\BandaHabilidadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BandaHabilidadeController implements the CRUD actions for BandaHabilidades model.
 */
class BandaHabilidadeController extends Controller
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
     * Lists all BandaHabilidades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BandaHabilidadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BandaHabilidades model.
     * @param integer $IdBanda
     * @param integer $IdHabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdBanda, $IdHabilidade)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdBanda, $IdHabilidade),
        ]);
    }

    /**
     * Creates a new BandaHabilidades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BandaHabilidades();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdHabilidade' => $model->IdHabilidade]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BandaHabilidades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdBanda
     * @param integer $IdHabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdBanda, $IdHabilidade)
    {
        $model = $this->findModel($IdBanda, $IdHabilidade);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdHabilidade' => $model->IdHabilidade]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BandaHabilidades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdBanda
     * @param integer $IdHabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdBanda, $IdHabilidade)
    {
        $this->findModel($IdBanda, $IdHabilidade)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BandaHabilidades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdBanda
     * @param integer $IdHabilidade
     * @return BandaHabilidades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdBanda, $IdHabilidade)
    {
        if (($model = BandaHabilidades::findOne(['IdBanda' => $IdBanda, 'IdHabilidade' => $IdHabilidade])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
