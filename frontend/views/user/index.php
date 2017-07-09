<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profile Saya';
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

                    <div role="tabpanel" class="tab-pane fade in active" id="profile-anda">
                        <div class="job-ad-item">
                            <div class="item-info">
                             <div class="site-index">


                                <div class="body-content">




<!--     <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->




<?php Pjax::begin(); ?>    

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'nama_lengkap',
            //'username',
            //'auth_key',
            //'password_hash',
            // 'password_reset_token',
            'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            //'province_id',

/*            [
                'attribute' => 'province_id',
                'format' => 'html',
                'value' => function($model){
                        $dataPropince = (new \yii\db\Query())
                            ->select('name')
                            ->from('provinces')
                            ->where(['province_id'=>$model->province_id])
                            ->scalar();
                            return $dataPropince;
                }
            ],*/



/*            [
                'attribute' => 'regency_id',
                'format' => 'html',
                'value' => function($model){
                        $dataRegency = (new \yii\db\Query())
                            ->select('name')
                            ->from('regencies')
                            ->where(['regency_id'=>$model->regency_id])
                            ->scalar();
                            return $dataRegency;
                }
            ],*/

            //'regency_id',
            //'district_id',
            //'village_id',
            //'alamat',
            //'telephone',
            //'mobile_handphone',
            //'pin_bb',
            // 'status_account',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => function ($model, $key, $index) {
                        return $model->status === 1 ? false : true;
                     },

                    'delete' => function ($model, $key, $index) {
                        return $model->status === 1 ? false : false;
                     },
                     
                    'update' => function ($model, $key, $index) {
                        return $model->status === 1 ? false : true;
                     },             

                ]
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>





    </div>
</div>



                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    



                    </div><!-- tab-pane -->



                </div><!-- tab-content -->
            </div><!-- trending ads -->     



     

        </div><!-- conainer -->
    </div><!-- page -->






