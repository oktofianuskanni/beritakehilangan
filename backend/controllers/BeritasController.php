<?php

namespace backend\controllers;

use Yii;
use backend\models\Beritas;
use backend\models\BeritasSerach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;


/**
 * BeritasController implements the CRUD actions for Beritas model.
 */
class BeritasController extends Controller
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
     * Lists all Beritas models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com@beritakehilangan.com')){
            $searchModel = new BeritasSerach();
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
     * Displays a single Beritas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com@beritakehilangan.com')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Creates a new Beritas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        if (Yii::$app->user->can('administrator@beritakehilangan.com@beritakehilangan.com')){

            $model = new Beritas();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->berita_id]);
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
     * Updates an existing Beritas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->berita_id]);
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
     * Deletes an existing Beritas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * Finds the Beritas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Beritas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Beritas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
