<?php

namespace app\controllers;

use app\models\PollingUnit;
use app\models\PollingUnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PollingUnitController implements the CRUD actions for PollingUnit model.
 */
class PollingUnitController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all PollingUnit models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PollingUnitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PollingUnit model.
     * @param int $uniqueid Uniqueid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($uniqueid)
    {
        return $this->render('view', [
            'model' => $this->findModel($uniqueid),
        ]);
    }

    /**
     * Creates a new PollingUnit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PollingUnit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'uniqueid' => $model->uniqueid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PollingUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $uniqueid Uniqueid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($uniqueid)
    {
        $model = $this->findModel($uniqueid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'uniqueid' => $model->uniqueid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PollingUnit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $uniqueid Uniqueid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($uniqueid)
    {
        $this->findModel($uniqueid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PollingUnit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $uniqueid Uniqueid
     * @return PollingUnit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uniqueid)
    {
        if (($model = PollingUnit::findOne(['uniqueid' => $uniqueid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
