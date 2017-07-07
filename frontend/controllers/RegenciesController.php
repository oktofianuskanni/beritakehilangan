<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Regencies;
use frontend\models\RegenciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegenciesController implements the CRUD actions for Regencies model.
 */
class RegenciesController extends Controller
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
     * Lists all Regencies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegenciesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Regencies model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Regencies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Regencies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->regency_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Regencies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->regency_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Regencies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPropinsi($id)
    {
        $regencies = Regencies::find()->where(['province_id' => $id])->all();

        foreach ($regencies as $regency)
        {
            $tagOptions = ['prompt' => "=== Select ==="];
            return Html::renderSelectOptions([], ArrayHelper::map($regencies, 'id', 'name'), $tagOptions);
        }

    }



    public function actionLists($idgets)
    {

        $countRegencies = Regencies::find()
            ->where(['province_id' => $idgets])
            ->count();

        $regencies = Regencies::find()
                ->where(['province_id' => $idgets])
                ->orderBy('name ASC')
                ->all();
 
        if($countRegencies>0){
            foreach($regencies as $regency){
                echo "<option value='".$regency->regency_id."'>".$regency->name."</option>";
            }
        }
        else{
            echo "<option>Pilih Kabupaten/ Kota</option>";

        } 
    }


    /**
     * Finds the Regencies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Regencies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Regencies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
