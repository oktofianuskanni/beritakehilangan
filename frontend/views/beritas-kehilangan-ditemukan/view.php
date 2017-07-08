<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasKehilanganDitemukan */

$this->title = $model->berita_id;
$this->params['breadcrumbs'][] = ['label' => 'Beritas Kehilangan Ditemukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <h3>Menemukan Mempertemukan Mengembalikan</h3>
            <ul class="banner-socail list-inline">
                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
            </ul><!-- banner-socail -->
        </div><!-- container -->
    </div><!-- banner-section -->

    <div class="page">
        <div class="container">
            <div class="section latest-jobs-ads">
                <div class="section-title tab-manu hidden-lg hidden-md">
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">Utama</a></li>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/user/index/">Profile Saya</a></li>
                        <li role="presentation" class="active"><a href="#berita-anda" data-toggle="tab">Berita Anda</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="berita-anda">
                        <div class="job-ad-item">
                            <div class="item-info">

                                <div class="beritas-kehilangan-ditemukan-view">

                                    <!--     <h1><?= Html::encode($this->title) ?></h1> -->

                                    <p>
                                        <?= Html::a('Update', ['update', 'id' => $model->berita_id], ['class' => 'btn btn-primary']) ?>
                                    <!--         <?= Html::a('Delete', ['delete', 'id' => $model->berita_id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?> -->
                                    </p>

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            //'berita_id',
                                            [
                                                'attribute' => 'user_id',
                                                'format' => 'html',
                                                'label' => 'Tampilkan nama ke halaman utama',
                                                'value' => function($model){
                                                    if ($model->tampil_nama==1){
                                                        $DetailBerita = (new \yii\db\Query())
                                                            ->select('nama_lengkap')
                                                            ->from('user')
                                                            ->where(['id'=>$model->user_id])
                                                            ->scalar();
                                                            return $DetailBerita;
                                                    }

                                                    else {
                                                        return 'Tidak';
                                                    }
                                                }
                                            ],

                                            [
                                                'attribute' => 'category_id',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        $kategoryName = (new \yii\db\Query())
                                                            ->select('category_name')
                                                            ->from('category')
                                                            ->where(['category_id'=>$model->category_id])
                                                            ->scalar();
                                                            return $kategoryName;
                                                }
                                            ],
                                            'jenis_berita',
                                            'judul_berita',
                                            'deskripsi_berita:ntext',
                                            [
                                                'attribute' => 'berita_id',
                                                'format' => 'raw',
                                                'label' => 'Foto',   
                                                'value' => function($model){
                                                        $beritaDocuments = (new \yii\db\Query())
                                                            ->select('filename')
                                                            ->from('documents')
                                                            ->where(['berita_id'=>$model->berita_id])
                                                            ->scalar();
                                                       if ($beritaDocuments){
                                                            $beritaDocuments=str_replace('thum', 'img', $beritaDocuments);
                                                            return Html::img(Yii::$app->request->baseUrl.'/'.$beritaDocuments,['width' => '600px', 'align'=>'left']);  
                                                        }
                                                        else {
                                                            return Html::img(Yii::$app->request->baseUrl.'/'.'uploads/empty.jpg',['width' => '400px']);
                                                        }

                                                }
                                            ],


                                            'updated_at',
                                            //'email:email',

                                          [
                                                'attribute' => 'email',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->hub_email==1){
                                                            $viewTelepone = (new \yii\db\Query())
                                                                ->select('email')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            return $model->email; 
                                                        }

                                                        else {
                                                            return 'Tidak'; 
                                                        }   
                                                }
                                            ],

                                          [
                                                'attribute' => 'hub_wa',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->hub_wa==1 AND $model->tampilkan_notelp2==1){
                                                            return 'Ya';
                                                        }

                                                        else {
                                                            return 'Tidak'; 
                                                        }
                                                }
                                            ],


                                        /*          [
                                                'attribute' => 'pin_bb',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->tampilkan_notelp1==1){
                                                            $viewTelepone = (new \yii\db\Query())
                                                                ->select('pin_bb')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            return $model->pin_bb; 
                                                        }

                                                        else {
                                                            return 'Tidak'; 
                                                        }   
                                                }
                                            ],*/


                                            //'no_telp1',
                                            //'tampilkan_notelp1',
                                            [
                                                'attribute' => 'tampilkan_notelp1',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->tampilkan_notelp1==1){
                                                            $viewTelepone = (new \yii\db\Query())
                                                                ->select('telephone')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            return $model->no_telp1; 
                                                        }

                                                        else {
                                                            return 'Tidak'; 
                                                        }   
                                                }
                                            ],

                                            //'no_telp2',
                                            [
                                                'attribute' => 'tampilkan_notelp2',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->tampilkan_notelp2==1){
                                                            $viewMobile = (new \yii\db\Query())
                                                                ->select('mobile_handphone')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            return $model->no_telp2; 
                                                        }

                                                        else {
                                                            return 'Tidak'; 
                                                        }   
                                                }
                                            ],




                                            //'status',
                                            //'province_id',
                                            [
                                                'attribute' => 'province_id',
                                                'format' => 'html',
                                                'value' => function($model){
                                                    if ($model->tampilkan_alamatlengkap==1){                  
                                                        $provincesName = (new \yii\db\Query())
                                                        ->select('name')
                                                        ->from(['provinces', 'user'])
                                                        ->where(['provinces.province_id'=>$model->province_id,'user.id'=>$model->user_id])
                                                        ->scalar();
                                                        return $provincesName;
                                                    }
                                                    else { 
                                                        return 'Tidak'; 
                                                    }
                                                }
                                            ],

                                            [
                                                'attribute' => 'regency_id',
                                                'format' => 'html',
                                                'value' => function($model){
                                                    if ($model->tampilkan_alamatlengkap==1){
                                                        $regencyName = (new \yii\db\Query())
                                                        ->select('name')
                                                        ->from(['regencies', 'user'])
                                                        ->where(['regencies.regency_id'=>$model->regency_id,'user.id'=>$model->user_id])
                                                        ->scalar();
                                                        return $regencyName;
                                                    }
                                                    else { 
                                                        return 'Tidak'; 
                                                    }
                                                }
                                            ],


                                            [
                                                'attribute' => 'tampilkan_alamatlengkap',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->tampilkan_alamatlengkap==1){
                                                          $viewMobile = (new \yii\db\Query())
                                                                ->select('alamat')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            return $model->alamat; 
                                                        }
                                                        else {
                                                            return 'Tidak'; 
                                                        }   
                                                }
                                            ],

                                            //'alamat',


                                            //'district_id',
                                            //'village_id',
                                            //'created_at',



                                            [
                                                'attribute' => 'status_ditemukan',
                                                'format' => 'html',
                                                'value' => function($model){
                                                        if ($model->status_ditemukan==0){
                                                            return 'Belum Ditemukan'; 
                                                        }
                                                        elseif ($model->status_ditemukan==1){
                                                            return 'Telah Ditemukan'; 
                                                        }
                                                        elseif ($model->status_ditemukan==2){
                                                            return 'Belum diambil oleh pemiliknya'; 
                                                        }                     
                                                        else {
                                                            return 'Telah diambil oleh pemiliknya'; 
                                                        }   
                                                }
                                            ],


                                            'status',

                                            'updated_at',
                                        ],
                                        ]) 
                                    ?>
                                </div>   

                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- trending ads -->     
        </div><!-- conainer -->
    </div><!-- page -->

   

