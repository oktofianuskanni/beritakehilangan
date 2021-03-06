<?php

namespace backend\controllers;

use Yii;
use backend\models\Provinces;
use backend\models\ProvincesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ProvincesController implements the CRUD actions for Provinces model.
 */
class ProvincesController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Provinces models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){
            $searchModel = new ProvincesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Displays a single Provinces model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);


        }

        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Creates a new Provinces model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){
            $model = new Provinces();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->province_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }


        }

        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Provinces model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->province_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }


        }

        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Provinces model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);


        }

        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the Provinces model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Provinces the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Provinces::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
