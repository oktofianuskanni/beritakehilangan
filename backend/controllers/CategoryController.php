<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com@beritakehilangan.com')){
            $searchModel = new CategorySearch();
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
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
            
        if (Yii::$app->user->can('administrator@beritakehilangan.com@beritakehilangan.com')){
            $model = new Category();

            if ($model->load(Yii::$app->request->post())) {
                $model->created_at=date('Y-m-d H:i:s');
                $model->updated_at=date('Y-m-d H:i:s');
                $model->save();
                return $this->redirect(['index']);
                //return $this->redirect(['view', 'id' => $model->category_id]);
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('administrator@beritakehilangan.com')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->category_id]);
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
