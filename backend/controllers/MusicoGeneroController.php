<?php

namespace app\controllers;

use Yii;
use common\models\MusicoGenero;
use common\models\MusicoGeneroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MusicoGeneroController implements the CRUD actions for MusicoGenero model.
 */
class MusicoGeneroController extends Controller
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
     * Lists all MusicoGenero models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MusicoGeneroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MusicoGenero model.
     * @param integer $IdMusico
     * @param integer $IdGenero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdMusico, $IdGenero)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdMusico, $IdGenero),
        ]);
    }

    /**
     * Creates a new MusicoGenero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MusicoGenero();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMusico' => $model->IdMusico, 'IdGenero' => $model->IdGenero]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MusicoGenero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdMusico
     * @param integer $IdGenero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdMusico, $IdGenero)
    {
        $model = $this->findModel($IdMusico, $IdGenero);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMusico' => $model->IdMusico, 'IdGenero' => $model->IdGenero]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MusicoGenero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdMusico
     * @param integer $IdGenero
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdMusico, $IdGenero)
    {
        $this->findModel($IdMusico, $IdGenero)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MusicoGenero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdMusico
     * @param integer $IdGenero
     * @return MusicoGenero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdMusico, $IdGenero)
    {
        if (($model = MusicoGenero::findOne(['IdMusico' => $IdMusico, 'IdGenero' => $IdGenero])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
