<?php

namespace backend\controllers;

use Yii;
use common\models\ListaBandas;
use common\models\ListaBandasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ListaBandaController implements the CRUD actions for ListaBandas model.
 */
class ListaBandaController extends Controller
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
     * Lists all ListaBandas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListaBandasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ListaBandas model.
     * @param integer $IdMusico
     * @param integer $IdBanda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdMusico, $IdBanda)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdMusico, $IdBanda),
        ]);
    }

    /**
     * Creates a new ListaBandas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ListaBandas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMusico' => $model->IdMusico, 'IdBanda' => $model->IdBanda]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ListaBandas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdMusico
     * @param integer $IdBanda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdMusico, $IdBanda)
    {
        $model = $this->findModel($IdMusico, $IdBanda);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMusico' => $model->IdMusico, 'IdBanda' => $model->IdBanda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ListaBandas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdMusico
     * @param integer $IdBanda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdMusico, $IdBanda)
    {
        $this->findModel($IdMusico, $IdBanda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ListaBandas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdMusico
     * @param integer $IdBanda
     * @return ListaBandas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdMusico, $IdBanda)
    {
        if (($model = ListaBandas::findOne(['IdMusico' => $IdMusico, 'IdBanda' => $IdBanda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
