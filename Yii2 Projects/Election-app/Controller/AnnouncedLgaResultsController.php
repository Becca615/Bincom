<?php

namespace app\controllers;

use app\models\announcedLgaResults;
use app\models\AnnounceLgaResultsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnnouncedLgaResultsController implements the CRUD actions for announcedLgaResults model.
 */
class AnnouncedLgaResultsController extends Controller
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
     * Lists all announcedLgaResults models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AnnounceLgaResultsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single announcedLgaResults model.
     * @param int $result_id Result ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($result_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($result_id),
        ]);
    }

    /**
     * Creates a new announcedLgaResults model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new announcedLgaResults();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'result_id' => $model->result_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing announcedLgaResults model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $result_id Result ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($result_id)
    {
        $model = $this->findModel($result_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'result_id' => $model->result_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing announcedLgaResults model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $result_id Result ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($result_id)
    {
        $this->findModel($result_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the announcedLgaResults model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $result_id Result ID
     * @return announcedLgaResults the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($result_id)
    {
        if (($model = announcedLgaResults::findOne(['result_id' => $result_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
