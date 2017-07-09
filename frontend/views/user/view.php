<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">Halaman Utama</a></li>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/index/">Berita Anda</a></li>
                        <li role="presentation" class="active"><a href="#profile-anda" data-toggle="tab">Profile Anda</a></li>
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
                                                <!-- <h1>Update Profile Anda</h1> -->


<div class="user-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--         <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'nama_lengkap',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            //'created_at',
            [
                'attribute' => 'province_id',
                'format' => 'html',
                'value' => function($model){
                        $provincesName = (new \yii\db\Query())
                            ->select('name')
                            ->from('provinces')
                            ->where(['province_id'=>$model->province_id])
                            ->scalar();
                            return $provincesName;
                }
            ],


            [
                'attribute' => 'regency_id',
                'format' => 'html',
                'value' => function($model){
                        $regencyName = (new \yii\db\Query())
                            ->select('name')
                            ->from('regencies')
                            ->where(['regency_id'=>$model->regency_id])
                            ->scalar();
                            return $regencyName;
                }
            ],
            //'district_id',
            //'village_id',
            'alamat',
            'telephone',
            'mobile_handphone',
            //'pin_bb',
            //'status_account',
            'updated_at',

        ],
    ]) ?>

</div>

                                                
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
        </div>
    </div>

