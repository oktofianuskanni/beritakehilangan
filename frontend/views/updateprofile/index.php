<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profile Saya';
$this->params['breadcrumbs'][] = $this->title;
?>

			<?php
				/* @var $this yii\web\View */
				$get_id = User::find()->where(['username' => 
				Yii::$app->user->identity->username])->one();
				//echo 'get_id :'.$get_id->id.'<br>';
				//echo 'nama_lengkap :'.$get_id->username.'<br>';
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
                <div class="section-title tab-manu tab-manu hidden-lg hidden-md">
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/index/">Berita Anda</a></li>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/user/index/">Profile Anda</a></li>
                        <?php } ?>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">Utama</a></li>
                        <li role="presentation" class="active"><a href="#popular-jobs" data-toggle="tab">Update Profile Anda</a></li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                        <div class="job-ad-item">
                            <div class="item-info">
							 <div class="site-index">


							    <div class="body-content">





            <div class="section latest-jobs-ads">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
						<h1>Update Profile Anda</h1>

						<p>
						    Kami menganggap sangat penting untuk mengupdate profile anda, agar kami tahu data yang anda masukkan valid.

						    Klik <?= Html::a('Update Profile', ['../user/index'], ['class'=>'btn btn-success']) ?>

						</p>
                        
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- trending ads -->  




    </div>
</div>



                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    



                    </div><!-- tab-pane -->



                </div><!-- tab-content -->
            </div><!-- trending ads -->     



     

        </div><!-- conainer -->
    </div><!-- page -->





