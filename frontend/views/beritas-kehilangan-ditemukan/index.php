<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BeritasKehilanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beritas Kehilangan';
$this->params['breadcrumbs'][] = $this->title;
?>


<?PHP
if (!Yii::$app->user->isGuest) {
    $get_id = User::find()->where(['username' => 
    Yii::$app->user->identity->username])->one();
    //echo 'get_id :'.$get_id->id.'<br>';
    //echo 'nama_lengkap :'.$get_id->username.'<br>';
}

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
                        <li role="presentation" class="active"><a href="#berita-anda" data-toggle="tab">Berita Anda</a></li>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/user/view?id=<?php echo Yii::$app->user->identity->id; ?>">Profile Anda</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="berita-anda">
                        <div class="job-ad-item">
                            <div class="item-info">

                                <div class="beritas-index"><!-- mulai tempel index -->
                                    <?php Pjax::begin(); ?>    


                                    <p><?= Html::a('Buat Berita', ['create'], ['class' => 'btn btn-success']) ?></p>

                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        //'filterModel' => $searchModel,
                                        'tableOptions' => ['class' => 'table table-striped table-bordered'],
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                    /*
                                        [
                                            'attribute' => 'jenis_berita',
                                            'contentOptions' => ['class' => 'text-center'],
                                            'headerOptions' => ['class' => 'text-center'],
                                        ],*/

                                    /*                            [
                                            'attribute'=>'category_id',
                                            'value'=>'category.category_name',
                                            'contentOptions' => ['class' => 'text-center'],
                                            'headerOptions' => ['class' => 'text-center'],                         
                                        ],*/


                                        [
                                            'attribute' => 'judul_berita',
                                            'format' => 'html',
                                            'label' => 'Judul Berita',
                                            'headerOptions' => ['class' => 'text-center'],               
                                            'value' => function ($model) {
                                                if (strlen($model->judul_berita)>=25){
                                                    return substr(($model->judul_berita),0,25).'...';
                                                }

                                                else {
                                                    return ($model->judul_berita);
                                                }
                                            },

                                        ], 

                                    /*                            [
                                            'attribute' => 'deskripsi_berita',
                                            'format' => 'html',
                                            'label' => 'Deskripsi',
                                            'headerOptions' => ['class' => 'text-center'],
                                            'value' => function ($model) {
                                                if (strlen($model->deskripsi_berita)>40){
                                                    return substr(($model->deskripsi_berita),0,40).'...';
                                                }

                                                else {
                                                    return ($model->deskripsi_berita);
                                                }
                                            },

                                        ],*/

                                        [
                                            'attribute' => 'updated_at',
                                            'contentOptions' => ['class' => 'text-center'],
                                            'headerOptions' => ['class' => 'text-center'],
                                        ],
                                        'status',
                                        [
                                            'attribute' => 'berita_id',
                                            'format' => 'html',
                                            'label' => 'Foto',   
                                            'contentOptions' => ['class' => 'text-center'],
                                            'headerOptions' => ['class' => 'text-center'],
                                            'value' => function($model){
                                                    $beritaDocuments = (new \yii\db\Query())
                                                        ->select('filename')
                                                        ->from('documents')
                                                        ->where(['berita_id'=>$model->berita_id])
                                                        ->scalar();
                                                   if ($beritaDocuments){
                                                        return Html::img(Yii::$app->request->baseUrl.'/'.$beritaDocuments,['height' => '50px']);  
                                                    }
                                                    else {
                                                        return Html::img(Yii::$app->request->baseUrl.'/uploads/empty.jpg',['height' => '50px']);
                                                    }

                                            }
                                        ],



                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'contentOptions' => ['class' => 'text-center'],
                                            'headerOptions' => ['class' => 'text-center'],      
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




                                    <?php Pjax::end(); ?>
                                </div> <!-- end tempel index -->

                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- trending ads -->     
        </div><!-- conainer -->
    </div><!-- page -->













