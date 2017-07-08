<?php

namespace frontend\controllers;

use Yii;
use frontend\models\BeritasKehilanganDitemukan;
use frontend\models\BeritasKehilanganDitemukanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\User;
use frontend\models\Documents;
use frontend\models\Beritas;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

use yii\imagine\Image;
use Imagine\Image\Box;  
use Imagine\Image\BoxInterface;



/**
 * BeritasKehilanganDitemukanController implements the CRUD actions for BeritasKehilanganDitemukan model.
 */
class BeritasKehilanganDitemukanController extends Controller
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
     * Lists all BeritasKehilanganDitemukan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritasKehilanganDitemukanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BeritasKehilanganDitemukan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    public function actionSearching($Search)
    {
        return $this->redirect(['beritas/list?BeritasSearch%5BglobalSearch%5D='.$Search]);

    }


    /**
     * Creates a new BeritasKehilanganDitemukan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {      
        // juka belum login
        if (Yii::$app->user->isGuest) {
            return $this->redirect([Yii::$app->request->baseUrl.'/site/login']);
        }


        $model = new BeritasKehilanganDitemukan();
        $model2 = new BeritasKehilanganDitemukan();
        $getBeritaId = new Documents;

        if ($model->load(Yii::$app->request->post())) {

                $get_id = User::find()->where(['username' => 
                Yii::$app->user->identity->username])->one();

                $model->user_id = $get_id->id;
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                $model->status = 'Enable';
                $model->email = $get_id->email;       
                $model->save();

            if ($model->file = UploadedFile::getInstance($model,'file')) {

                if(isset($model->file->extension)){

                    $model->getPrimaryKey();  

                    FileHelper::createDirectory('uploads/' . $model->berita_id . '/img');
                    FileHelper::createDirectory('uploads/' . $model->berita_id . '/thum');

                    $model->file->saveAs('uploads/' . $model->berita_id . '/img/' . $model->file->baseName . '.' . $model->file->extension);

                    Image::thumbnail('uploads/' . $model->berita_id . '/img/' . $model->file, 500, 300)
                            ->resize(new Box(500,300))
                            ->save('uploads/' . $model->berita_id . '/img/' . $model->file->baseName . '.' . $model->file->extension, 
                                    ['quality' => 70]);
                    
                    Image::thumbnail('uploads/' . $model->berita_id . '/img/' . $model->file, 500, 300)
                            ->resize(new Box(120,80))
                            ->save('uploads/' . $model->berita_id . '/thum/' . $model->file->baseName . '.' . $model->file->extension, 
                                    ['quality' => 70]);

                    $getBeritaId->berita_id = $model->berita_id;
                    $getBeritaId->filename = 'uploads/' . $model->berita_id . '/thum/' .$model->file->baseName . '.' . $model->file->extension;  
                    $getBeritaId->created_at = date('Y-m-d H:i:s');
                    $getBeritaId->updated_at = date('Y-m-d H:i:s');
                    $getBeritaId->save();  

                }  
            } 

            else {
                    $model->getPrimaryKey();  
                    FileHelper::createDirectory('uploads/' . $model->berita_id . '/img');
                    FileHelper::createDirectory('uploads/' . $model->berita_id . '/thum');
                    //Image::thumbnail('uploads/empty.jpg', 120, 80)->save(Yii::getAlias('uploads/'.$model->berita_id.'img/empty.jpg'), ['quality' => 70]);
                    //Image::thumbnail('uploads/empty.jpg', 120, 80)->save(Yii::getAlias('uploads/'.$model->berita_id.'thum/empty.jpg'), ['quality' => 70]);
                    Image::getImagine()->open('uploads/empty.jpg')->thumbnail(new Box(120,80))->save('uploads/'.$model->berita_id.'/img/empty.jpg', ['quality' => 90]);

                    Image::getImagine()->open('uploads/empty.jpg')->thumbnail(new Box(120,80))->save('uploads/'.$model->berita_id.'/thum/empty.jpg', ['quality' => 90]);


                    $getBeritaId->berita_id = $model->berita_id;


                    Image::getImagine()->open('uploads/empty.jpg')->thumbnail(new Box(120,80))->save('uploads/'.$model->berita_id.'/thum/empty.jpg', ['quality' => 90]);
                    $getBeritaId->filename = 'uploads/' . $model->berita_id . '/thum/empty.jpg';
                    $getBeritaId->created_at = date('Y-m-d H:i:s');
                    $getBeritaId->updated_at = date('Y-m-d H:i:s');
                    $getBeritaId->save();  

            }


            return $this->redirect(['index']);
        } else {

            $get_id = User::find()->where(['username' => 
            Yii::$app->user->identity->username])->one();

            if (($get_id->regency_id)=='0'){
                //print_r('alamat kosong');
                //print_r($get_id->username);
                //return $this->render('create', ['model' => $model,]);        
                return $this->redirect(Yii::$app->request->baseUrl.'/updateprofile/index');

            }

            else {
                return $this->render('create', ['model' => $model,]);        
            }
        }
    }

    /**
     * Updates an existing BeritasKehilanganDitemukan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post())) {




            /*
            if ($model->tampilkan_alamatlengkap){
                $provinceId = (new \yii\db\Query())
                ->select('province_id')
                ->from(['user'])
                ->where(['user.id'=>$model->user_id])
                ->scalar();

                $regencyId = (new \yii\db\Query())
                ->select('regency_id')
                ->from(['user'])
                ->where(['user.id'=>$model->user_id])
                ->scalar();

                $alamatLengkap = (new \yii\db\Query())
                ->select('alamat')
                ->from(['user'])
                ->where(['user.id'=>$model->user_id])
                ->scalar();

                $model->province_id=$provinceId;
                $model->regency_id=$regencyId;
                $model->alamat=$alamatLengkap;
            }

            else {
                $model->province_id='';
                $model->regency_id='';
                $model->alamat='';           
            }


            // pilihan tampil nomor telepon
            if ($model->tampilkan_notelp1){
                $viewTelepone = (new \yii\db\Query())
                ->select('telephone')
                ->from(['user'])
                ->where(['user.id'=>$model->user_id])
                ->scalar();
                $model->no_telp1=$viewTelepone;
            }

            else {
                $model->no_telp1='';
            }



            // pilihan tampil mobile hpn
            if ($model->tampilkan_notelp2){
                $viewMobile = (new \yii\db\Query())
                ->select('mobile_handphone')
                ->from(['user'])
                ->where(['user.id'=>$model->user_id])
                ->scalar();
                $model->no_telp2=$viewMobile;
            }

            else {
                $model->no_telp2='';
            }

            */
            $getBeritaId = new Documents;
            //$model = new BeritasKehilanganDitemukan();

            if ($model->file = UploadedFile::getInstance($model,'file')) {
                if(isset($model->file->extension)){
                    // print_r($model->file).' ';
                    // print_r($model->file->extension).' ';
                    // print_r($model->berita_id).' ';
                    // print_r($model->berita_id).' ';
                    // print_r($model->berita_id).' ';
                    // print_r($model->berita_id).' ';
                    //print_r($model->file->baseName).' ';
                    //print_r($model->file->extension).' ';
                     //exit();

                    //$model->getPrimaryKey();   
                    FileHelper::createDirectory('uploads/' . $model->berita_id . '/img');
                    FileHelper::createDirectory('uploads/' . $model->berita_id . '/thum');

                    $model->file->saveAs('uploads/' . $model->berita_id . '/img/' . $model->file->baseName . '.' . $model->file->extension);

                    Image::thumbnail('uploads/' . $model->berita_id . '/img/' . $model->file, 500, 300)
                            ->resize(new Box(500,300))
                            ->save('uploads/' . $model->berita_id . '/img/' . $model->file->baseName . '.' . $model->file->extension, 
                                    ['quality' => 70]);
                    
                    Image::thumbnail('uploads/' . $model->berita_id . '/img/' . $model->file, 500, 300)
                            ->resize(new Box(120,80))
                            ->save('uploads/' . $model->berita_id . '/thum/' . $model->file->baseName . '.' . $model->file->extension, 
                                    ['quality' => 70]);

                    $getBeritaId->berita_id = $model->berita_id;
                    $getBeritaId->filename = 'uploads/' . $model->berita_id . '/thum/' .$model->file->baseName . '.' . $model->file->extension;  
                    $getBeritaId->created_at = date('Y-m-d H:i:s');
                    $getBeritaId->updated_at = date('Y-m-d H:i:s');
                    $getBeritaId->save();  



                    Yii::$app->db->createCommand("
                        DELETE FROM documents 
                        WHERE berita_id =  $model->berita_id
                    ")->execute();



                    $getBeritaId->document_id = $getBeritaId->document_id;
                    $getBeritaId->berita_id = $model->berita_id;
                    $getBeritaId->filename = $model->file;  
                    $getBeritaId->created_at = date('Y-m-d H:i:s');
                    $getBeritaId->updated_at = date('Y-m-d H:i:s');
                    $getBeritaId->save();  

                    //print_r($getBeritaId->document_id).' ';
                    //print_r($getBeritaId->berita_id).' ';
                    //print_r($model->file).' ';
                    //exit();


                }  
            } 



            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();     


            return $this->redirect(['view', 'id' => $model->berita_id]);
        } else {

            // tampilkan user_id dari login
            $get_user_id = User::find()->where(['username' => 
            Yii::$app->user->identity->username])->one();
            $model->user_id = $get_user_id->id;

            // tampilkan user_id dari table berita
            $get_user_id_beritas = Beritas::find()->where(['berita_id' => $_GET['id']])->one();
            $model->user_id = $get_user_id_beritas->user_id;
            

            //echo 'get_user_id_beritas : '.$get_user_id_beritas->user_id.'<br>';
            //echo 'get_user_id : '.$get_user_id->id.'<br>';

            //exit();

            if ($get_user_id_beritas->user_id==$get_user_id->id){
                return $this->render('update', ['model' => $model,]);
            }

            else {
                //echo 'anda tidam mepunyai aksesk untuk halaman ini';
                $this->redirect(['index']);
            }
        }
    }

    /**
     * Deletes an existing BeritasKehilanganDitemukan model.
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
     * Finds the BeritasKehilanganDitemukan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BeritasKehilanganDitemukan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BeritasKehilanganDitemukan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
