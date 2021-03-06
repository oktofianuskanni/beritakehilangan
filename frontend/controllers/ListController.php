<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Beritas;
use frontend\models\ListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ListController implements the CRUD actions for Beritas model.
 */
class ListController extends Controller
{
    /**
     * @inheritdoc
     */

    public $allModels;
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
        $provider = new Beritas([
            'allModels' => $this->getFakedModels(),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'attributes' => ['id'],
            ],
        ]);

        return $this->render('index', ['listDataProvider' => $provider]);
    }


    // function to generate faked models, don't care about this.
    private function getFakedModels()
    {
        $fakedModels = [];

        for ($i = 1; $i < 18; $i++) {
            $fakedItem = [
                'id' => $i,
                'title' => 'Title ' . $i,
                'image' => 'http://placehold.it/300x200'
            ];

            $fakedModels[] = $fakedItem;
        }

        return $fakedModels;
    }
 


    /**
     * Displays a single Beritas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Beritas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Beritas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->berita_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->berita_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
