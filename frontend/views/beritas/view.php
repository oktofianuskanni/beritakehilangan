<?php
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use frontend\models\User;
use frontend\models\Category;
use frontend\models\Beritas;
use frontend\models\Documents;

?>



<div class="beritas-view">

    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <h3>Menemukan Mempertemukan Mengembalikan</h3>
            <div class="banner-form">


                    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

                    <!-- <input type="text" class="form-control" placeholder="Type your key word" name="Search">
                    <button type="submit" class="btn btn-primary" value="Search">Search</button> -->

            </div><!-- banner-form -->
            
            <ul class="banner-socail list-inline">
                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
            </ul><!-- banner-socail -->
        </div><!-- container -->
    </div><!-- banner-section -->

<!-- <div>&nbsp;</div> -->

    <div class="page">
        <div class="container">
     

            <div class="section latest-jobs-ads">
                <div class="section-title tab-manu tab-manu hidden-lg hidden-md">
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/index/">Berita Anda</a></li>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/user/index/">Profile Anda</a></li>
                        <?php } ?>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">Halaman Utama</a></li>
                        <li role="presentation" class="active"><a href="#popular-jobs" data-toggle="tab">Berita Detail</a></li>
                    </ul>
                </div>

                <div class="tab-content">


                    <div role="tabpanel" class="tab-pane fade in" id="hot-jobs">
                        <div class="job-ad-item">
                            <div class="item-info">
                                <div class="item-image-box">
                                    <div class="item-image">
                                        <a href="job-details.html"><img src="../images/job/3.png" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div>

                                <div class="ad-info">
                                    <span><a href="job-details.html" class=title>CTO</a> @ <a href="#">Volja Events & Entertainment</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                                        </ul>
                                    </div><!-- ad-meta -->                                  
                                </div><!-- ad-info -->
                                <div class="button">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    </div><!-- tab-pane -->

                    <div role="tabpanel" class="tab-pane fade in" id="recent-jobs">                   
                        <div class="job-ad-item">
                            <div class="item-info">
                                <div class="item-image-box">
                                    <div class="item-image">
                                        <a href="job-details.html"><img src="../images/job/3.png" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div>

                                <div class="ad-info">
                                    <span><a href="job-details.html" class="title">CTO</a> @ <a href="#">Volja Events & Entertainment</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                                        </ul>
                                    </div><!-- ad-meta -->                                  
                                </div><!-- ad-info -->
                                <div class="button">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    </div><!-- tab-pane -->


                    <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                        <div class="job-ad-item">
                            <div class="item-info">

                                <div class="beritas-kehilangan-ditemukan-view">

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            //'berita_id',
                                            [
                                                'attribute' => 'user_id',
                                                'format' => 'html',
                                                'label' => 'Kehilangan/ Menemukan',
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
                                                        return '-';
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
                                                            return Html::img(Yii::$app->request->baseUrl.'/'.$beritaDocuments,['width' => '400px', 'align'=>'left']);  
                                                        }
                                                        else {
                                                            return Html::img(Yii::$app->request->baseUrl.'/'.'uploads/empty.jpg',['width' => '400px']);
                                                        }

                                                }
                                            ],


                                            //'updated_at',
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
                                                            //return $model->email; 
                                                            return '<img src=/uploads/email/'.$model->email.'.png>'; 

                                                        }

                                                        else {
                                                            return '-'; 
                                                        }   
                                                }
                                            ],

                                          [
                                                'attribute' => 'hub_wa',
                                                'format' => 'html',
                                                'label'=>'Saya bisa dihubungi lewat WA',
                                                'value' => function($model){
                                                        if ($model->hub_wa==1 AND $model->tampilkan_notelp2==1){
                                                            return 'Ya';
                                                        }

                                                        else {
                                                            return '-'; 
                                                        }
                                                }
                                            ],

                                            [
                                                'attribute' => 'tampilkan_notelp1',
                                                'format' => 'html',
                                                'label'=>'Telepon',
                                                'value' => function($model){
                                                        if ($model->tampilkan_notelp1==1){
                                                            $viewTelepone = (new \yii\db\Query())
                                                                ->select('telephone')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            //return $model->no_telp1;
                                                            return '<img src=/uploads/telephone/'.$model->no_telp1.'.png>'; 
                                                        }

                                                        else {
                                                            return '-'; 
                                                        }   
                                                }
                                            ],

                                            [
                                                'attribute' => 'tampilkan_notelp2',
                                                'format' => 'html',
                                                'label'=>'Mobile',
                                                'value' => function($model){
                                                        if ($model->tampilkan_notelp2==1){
                                                            $viewMobile = (new \yii\db\Query())
                                                                ->select('mobile_handphone')
                                                                ->from('user')
                                                                ->where(['id'=>$model->user_id])
                                                                ->scalar();
                                                            return '<img src=/uploads/mobile_handphone/'.$model->no_telp2.'.png>'; 
                                                        }

                                                        else {
                                                            return '-'; 
                                                        }   
                                                }
                                            ],

                                            [
                                                'attribute' => 'province_id',
                                                'format' => 'html',
                                                'label'=>'Propinsi',
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
                                                        return '-'; 
                                                    }
                                                }
                                            ],

                                            [
                                                'attribute' => 'regency_id',
                                                'format' => 'html',
                                                'label'=>'Kabupaten',
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
                                                        return '-'; 
                                                    }
                                                }
                                            ],


                                            [
                                                'attribute' => 'tampilkan_alamatlengkap',
                                                'format' => 'html',
                                                'label'=>'Alamat',
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
                                                            return '-'; 
                                                        }   
                                                }
                                            ],

                                            [
                                                'attribute' => 'status_ditemukan',
                                                'format' => 'html',
                                                'label'=>'Status',
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

                                            'updated_at',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- trending ads -->     



            <div class="section cta cta-two text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-cta">
                            <div class="cta-icon icon-jobs">
                                <img src="../images/icon/31.png" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->
                            <h3>3,412</h3>
                            <h4>Live Jobs</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div><!-- single-cta -->

                    <div class="col-sm-4">
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-company">
                                <img src="../images/icon/32.png" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->
                            <h3>12,043</h3>
                            <h4>Total Company</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div><!-- single-cta -->

                    <div class="col-sm-4">
                        <div class="single-cta">
                            <div class="cta-icon icon-candidate">
                                <img src="../images/icon/33.png" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->
                            <h3>5,798,298</h3>
                            <h4>Total Candidate</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div><!-- single-cta -->
                </div><!-- row -->
            </div><!-- cta -->          

        </div><!-- conainer -->
    </div><!-- page -->















</div>


