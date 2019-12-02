<?php

namespace app\controllers;

use Yii;
use common\models\BandaMembros;
use yii\data\ActiveDataProvider;
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
        $dataProvider = new ActiveDataProvider([
            'query' => BandaMembros::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BandaMembros model.
     * @param integer $IdBanda
     * @param integer $IdMusico
     * @param integer $Idhabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IdBanda, $IdMusico, $Idhabilidade)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdBanda, $IdMusico, $Idhabilidade),
        ]);
    }

    /**
     * Creates a new BandaMembros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BandaMembros();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdMusico' => $model->IdMusico, 'Idhabilidade' => $model->Idhabilidade]);
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
     * @param integer $Idhabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($IdBanda, $IdMusico, $Idhabilidade)
    {
        $model = $this->findModel($IdBanda, $IdMusico, $Idhabilidade);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdBanda' => $model->IdBanda, 'IdMusico' => $model->IdMusico, 'Idhabilidade' => $model->Idhabilidade]);
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
     * @param integer $Idhabilidade
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IdBanda, $IdMusico, $Idhabilidade)
    {
        $this->findModel($IdBanda, $IdMusico, $Idhabilidade)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BandaMembros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IdBanda
     * @param integer $IdMusico
     * @param integer $Idhabilidade
     * @return BandaMembros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdBanda, $IdMusico, $Idhabilidade)
    {
        if (($model = BandaMembros::findOne(['IdBanda' => $IdBanda, 'IdMusico' => $IdMusico, 'Idhabilidade' => $Idhabilidade])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
