<?php

namespace app\controllers;

use Yii;
use common\models\IndustriaBandas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IndustriaBandaController implements the CRUD actions for IndustriaBandas model.
 */
class IndustriaBandaController extends Controller
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
     * Lists all IndustriaBandas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => IndustriaBandas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IndustriaBandas model.
     * @param integer $IdIndustria
     * @param integer $IdBanda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdIndustria, $IdBanda)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdIndustria, $IdBanda),
        ]);
    }

    /**
     * Creates a new IndustriaBandas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IndustriaBandas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdIndustria' => $model->IdIndustria, 'IdBanda' => $model->IdBanda]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IndustriaBandas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdIndustria
     * @param integer $IdBanda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdIndustria, $IdBanda)
    {
        $model = $this->findModel($IdIndustria, $IdBanda);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdIndustria' => $model->IdIndustria, 'IdBanda' => $model->IdBanda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IndustriaBandas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdIndustria
     * @param integer $IdBanda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdIndustria, $IdBanda)
    {
        $this->findModel($IdIndustria, $IdBanda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IndustriaBandas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdIndustria
     * @param integer $IdBanda
     * @return IndustriaBandas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdIndustria, $IdBanda)
    {
        if (($model = IndustriaBandas::findOne(['IdIndustria' => $IdIndustria, 'IdBanda' => $IdBanda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
