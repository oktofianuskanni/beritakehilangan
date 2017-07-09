<?php
//use Yii;
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use frontend\models\Documents;
use frontend\models\Category;
use frontend\models\User;
use yii\data\ActiveDataProvider;
use frontend\models\Beritas;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BeritasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Kehilangan/ Ditemukan';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <h3>Menemukan Mempertemukan Mengembalikan</h3>
            <div class="banner-form">
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
            </div><!-- banner-form -->
            
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
                <div class="section-title tab-manu tab-manu">
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                        <li role="presentation"><a class="navbar-brand hidden-lg hidden-md" href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/index/">Berita Anda</a></li>
                        <li role="presentation"><a class="navbar-brand hidden-lg hidden-md" href="<?php Yii::$app->request->baseUrl; ?>/user/view?id=<?php echo Yii::$app->user->identity->id; ?>">Profile Anda</a></li>
                        <?php } ?>
                        <li role="presentation"><a href="#recent-jobs" data-toggle="tab">Berita Terpopuler</a></li>

                        <li role="presentation" class="active"><a href="#popular-jobs" data-toggle="tab">Berita Terbaru</a></li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in" id="recent-jobs">
                        <!-- isi disini -->
                        popular
                    </div><!-- tab-pane -->

                    <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                                                <!-- isi disini -->

                                                <?php
                                                echo ListView::widget([
                                                'dataProvider' => $listDataProvider,
                                                'options' => [
                                                    'tag' => 'div',
                                                    'class' => 'list-wrapper',
                                                    'berita_id' => 'list-wrapper',
                                                ],
                                                'layout' => "{pager}\n{items}\n{summary}",
                                                'itemView' => function ($model, $key, $index, $widget) {

                                                ?>
                                                <?php $get_filename = Documents::find()->where(['berita_id' => $model->berita_id])->one(); 

                                                    

                                                $checkfilename = (new \yii\db\Query())
                                                ->select('filename')
                                                ->from('documents')
                                                ->where(['berita_id'=>$model->berita_id])
                                                ->scalar();


                                                //echo $checkfilename;
                                                    
                                                    // if (!$get_filename->berita_id){
                                                    //     echo "ada data";
                                                    // }

                                                    // else {

                                                    //     echo "tidak ada data";
                                                    // }
                                                    //echo $get_filename->berita_id;
                                                    //exit();


                                                ?>
                                                <?php //$get_user = User::find()->where(['id' => $model->user_id])->one(); echo $get_user->username; ?>
                                                  
                                                        <div class='job-ad-item'>
                                                            <div class='item-info'>
                                                                <div class="item-image-box">
                                                                    <div class="item-image">
                                                                        <?php if (!$checkfilename){ ?>
                                                                        <img src="<?php Yii::$app->request->baseUrl; ?>/uploads/empty.jpg" alt="Image" class="img-responsive">
                                                                        <?php } else { ?>
                                                                            <a href="<?php Yii::$app->request->baseUrl; ?>/<?php echo str_replace('thum','img',$get_filename->filename); ?>" target="_blank"><img src="<?php Yii::$app->request->baseUrl;  ?>/<?php echo $get_filename->filename; ?>" alt="Image" class="img-responsive"></a>
                                                                        <?php } ?>
                                                                    </div><!-- item-image -->
                                                                </div>
                                                                <div class='ad-info'>
                                                                    <span><a href='<?php Yii::$app->request->baseUrl; ?>/beritas/view?id=<?php echo $model->berita_id; ?>' class='title'><?php echo $model->jenis_berita."/ " ?><?php $get_id = Category::find()->where(['category_id' => $model->category_id])->one(); echo $get_id->category_name; ?>/ <?php echo  $model->judul_berita; ?></span>
                                                                    <div class='ad-meta'>
                                                                        <ul>
                                                                            <li><a href='#'><i class='fa fa-clock-o' aria-hidden='true'></i><?php echo $model->updated_at; ?></a></li>
                                                                            <!--<li><a href='#'><i class='fa fa-money' aria-hidden='true'></i>$25,000 - $35,000</a></li>-->
                                                                            <li><a href='#'><i class='fa fa-tags' aria-hidden='true'></i>Status: 
                                                                            <?php 

                                                                            if ($model->status_ditemukan==0){ echo 'Belum Ditemukan'; }
                                                                            elseif ($model->status_ditemukan==0){ echo 'Telah Ditemukan'; }
                                                                            elseif ($model->status_ditemukan==0){ echo 'Belum diambil oleh pemiliknya'; }
                                                                            else { echo 'Telah diambil oleh pemiliknya'; }


                                                                            ?></a></li>
                                                                        </ul>
                                                                    </div><!-- ad-meta -->                                  
                                                                </div><!-- ad-info -->
                                                                <div class='button'>
                                                                    <a href='<?php Yii::$app->request->baseUrl; ?>/beritas/view?id=<?php echo $model->berita_id; ?>' class='btn btn-primary'>Detail</a>
                                                                </div>
                                                            </div><!-- item-info -->
                                                        </div>
                                                <?php } ]); ?>
                    </div><!-- tab-pane -->

                </div><!-- tab-content -->
            </div><!-- trending ads -->  
        </div>
    </div>
   