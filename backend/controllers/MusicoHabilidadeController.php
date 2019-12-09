<?php

namespace backend\controllers;

use Yii;
use common\models\MusicoHabilidade;
use common\models\MusicoHabilidadeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MusicoHabilidadeController implements the CRUD actions for MusicoHabilidade model.
 */
class MusicoHabilidadeController extends Controller
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
     * Lists all MusicoHabilidade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MusicoHabilidadeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MusicoHabilidade model.
     * @param integer $IdMusico
     * @param integer $IdHabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdMusico, $IdHabilidade)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdMusico, $IdHabilidade),
        ]);
    }

    /**
     * Creates a new MusicoHabilidade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MusicoHabilidade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMusico' => $model->IdMusico, 'IdHabilidade' => $model->IdHabilidade]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MusicoHabilidade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IdMusico
     * @param integer $IdHabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdMusico, $IdHabilidade)
    {
        $model = $this->findModel($IdMusico, $IdHabilidade);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMusico' => $model->IdMusico, 'IdHabilidade' => $model->IdHabilidade]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MusicoHabilidade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IdMusico
     * @param integer $IdHabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdMusico, $IdHabilidade)
    {
        $this->findModel($IdMusico, $IdHabilidade)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MusicoHabilidade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdMusico
     * @param integer $IdHabilidade
     * @return MusicoHabilidade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdMusico, $IdHabilidade)
    {
        if (($model = MusicoHabilidade::findOne(['IdMusico' => $IdMusico, 'IdHabilidade' => $IdHabilidade])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
