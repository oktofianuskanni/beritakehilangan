<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Beritas;
use frontend\models\User;
use frontend\models\BeritasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

use frontend\models\Category;
use frontend\models\BeritasHits;

use yii\helpers\Html;

use yii\imagine\Image;
use Imagine\Image\Box;  
use Imagine\Image\BoxInterface;
use Imagine;

use Imagine\Image\Point;




/**
 * BeritasController implements the CRUD actions for Beritas model.
 */
class BeritasController extends Controller
{
    /**
     * @inheritdoc
     */
   public $globalSearch='';
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


        if (Yii::$app->request->queryParams){
            //echo 'cari';
            $searchModel = new BeritasSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'listDataProvider' => $dataProvider, // dataProviderBeritas empty
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        else {
            //echo 'bukan cari';
            $dataProvider = new ActiveDataProvider([
                'query' => Beritas::find()
                //->from('beritas','category')
                ->where(['status' => 'Enable'])->orderBy('berita_id DESC'),
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);

            $searchModel = new BeritasSearch();
            //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'listDataProvider' => $dataProvider, // dataProviderBeritas empty
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //exit();

        // biar pakai tutup ini akan 20 row
        /*
        $dataProviderBeritas = new ActiveDataProvider([
            'query' => Beritas::find()
            //->from('beritas','category')
            ->where(['status' => 'Disable'])->orderBy('berita_id DESC'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        */

        //$this->load($params);
        //exit();


    }

    /*ÿ
     * Displays a single Beritas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $beritashitsdata = new BeritasHits;
        $berita_id_hits = BeritasHits::find()->where(['berita_id' => $id])->one();
        if ($berita_id_hits){
            //echo 'ada';
            $post = BeritasHits::findOne($berita_id_hits->beritas_hits_id);
            $post->updateCounters(['hits' => 1]);
        }
        else {
            //echo 'tidak ada';
            $beritashitsdata->berita_id = $id;
            $beritashitsdata->hits = 1;  
            $beritashitsdata->created_at = date('Y-m-d H:i:s');
            $beritashitsdata->updated_at = date('Y-m-d H:i:s');     
            $beritashitsdata->save();
        }
        
        //cho $berita_id_hits->hits;
        //exit();

        //exit();
        // jila dari ada dari form pencarian
        if (!$id){
            //echo 'cari';
            $searchModel = new BeritasSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'listDataProvider' => $dataProvider, // dataProviderBeritas empty
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        else {
            //echo "bukan<br><br><br>";
            if (!Yii::$app->user->isGuest) {
                $get_id = User::find()->where(['username' => Yii::$app->user->identity->username])->one();
                //$get_id->mobile_handphone;
                //echo $get_id->mobile_handphone;
                header("Content-Type: image/png");
                $im = @imagecreate(300, 30)
                    or die("Cannot Initialize new GD image stream");
                $background_color = imagecolorallocate($im, 255, 255, 255);
                $text_color = imagecolorallocate($im, 0, 0, 0);
                imagestring($im, 10, 0, 5,  $get_id->email, $text_color);
                imagepng($im,'./uploads/email/'.$get_id->email.'.png');
                imagedestroy($im);



                header("Content-Type: image/png");
                $im = @imagecreate(300, 30)
                    or die("Cannot Initialize new GD image stream");
                $background_color = imagecolorallocate($im, 255, 255, 255);
                $text_color = imagecolorallocate($im, 0, 0, 0);
                imagestring($im, 10, 0, 5,  $get_id->telephone, $text_color);
                imagepng($im,'./uploads/telephone/'.$get_id->telephone.'.png');
                imagedestroy($im);



                header("Content-Type: image/png");
                $im = @imagecreate(300, 30)
                    or die("Cannot Initialize new GD image stream");
                $background_color = imagecolorallocate($im, 255, 255, 255);
                $text_color = imagecolorallocate($im, 0, 0, 0);
                imagestring($im, 10, 0, 5,  $get_id->mobile_handphone, $text_color);
                imagepng($im,'./uploads/mobile_handphone/'.$get_id->mobile_handphone.'.png');
                imagedestroy($im);
       

                $searchModel = new BeritasSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return $this->render('view', [ 
                    'model' => $this->findModel($id),
                    'searchModel' => $searchModel,

                ]);
            }

            else {
                return $this->redirect(['site/login']);
            }


        }

    }


/*    public function actionSearching($Search)
    {
        return $this->redirect(['beritas/list?BeritasSearch%5BglobalSearch%5D='.$Search]);

    }*/

    

    /**
     * Creates a new Beritas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Beritas();

        if ($model->load(Yii::$app->request->post())) {
            
            $get_id = User::find()->where(['username' => Yii::$app->user->identity->username])->one();
            $model->user_id = $get_id->id;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->status = 'Disable';
            $model->email = $get_id->email;
       
            $model->save();
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->berita_id]);
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
        return $this->redirect(['beritas/index']);
    }


  


    public function actionUpload(){

        $fileName = 'file';
        $uploadPath = 'uploads';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database

                echo \yii\helpers\Json::encode($file);
            }
        }

        else {
            return $this->render('upload');
        }

        return false;  



    }



/*
    public function actionList()
    {
        //Where-nya otomatis nanti muncul kalau sdh dibuatkan relasi
        //Alternatif kalau mau langsung murni sql, pake SqlDataProvider jangan ActiveDataProvider
        // Coba aja dulu.. saya sih prefer activeDataProvider pke activerecord.. lebih seru dan ada tantangan..
        $dataProvider = new ActiveDataProvider([
            'query' => Beritas::find()
            //->from('beritas','category')
            ->where(['status' => 'Disable'])->orderBy('berita_id DESC'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $searchModel = new BeritasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('list', [
                    'listDataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
            ]);
    }
*/


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
