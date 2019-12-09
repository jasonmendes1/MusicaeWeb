<?php

namespace app\controllers;

use Yii;
use common\models\BandaGenero;
use common\models\BandaGeneroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BandaGeneroController implements the CRUD actions for BandaGenero model.
 */
class BandaGeneroController extends Controller
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
     * Lists all BandaGenero models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BandaGeneroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BandaGenero model.
     * @param integer $IdBanda
     * @param integer $IdGenero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdBanda, $IdGenero)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdBanda, $IdGenero),
        ]);
    }

    /**
     * Creates a new BandaGenero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BandaGenero();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdGenero' => $model->IdGenero]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BandaGenero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdBanda
     * @param integer $IdGenero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdBanda, $IdGenero)
    {
        $model = $this->findModel($IdBanda, $IdGenero);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdGenero' => $model->IdGenero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BandaGenero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdBanda
     * @param integer $IdGenero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdBanda, $IdGenero)
    {
        $this->findModel($IdBanda, $IdGenero)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BandaGenero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdBanda
     * @param integer $IdGenero
     * @return BandaGenero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdBanda, $IdGenero)
    {
        if (($model = BandaGenero::findOne(['IdBanda' => $IdBanda, 'IdGenero' => $IdGenero])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
