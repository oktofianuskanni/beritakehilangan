<?php 
	use yii\widgets\ListView;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\data\ActiveDataProvider;
	use frontend\models\User;
	use frontend\models\Category;
	use frontend\models\Beritas;
	use frontend\models\Documents;
?>
    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <h3>Menemukan Mempertemukan Mengembalikan</h3>
            <div class="banner-form">
                <!-- <form action="searching"> -->

                    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<!--                     <input type="text" class="form-control" placeholder="Type your key word" name="Search">
                    <button type="submit" class="btn btn-primary" value="Search">Search</button> -->
                <!-- </form> -->
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
                <div class="section-title tab-manu">
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#hot-jobs" data-toggle="tab">Berita Terpopuler</a></li>
                        <li role="presentation" class="active"><a href="#popular-jobs" data-toggle="tab">Berita Terbaru</a></li>
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
    //echo $get_filename->berita_id;
    //exit();
 ?>
<?php //$get_user = User::find()->where(['id' => $model->user_id])->one(); echo $get_user->username; ?>
              
					<div class='job-ad-item'>
					    <div class='item-info'>
							<div class="item-image-box">
								<div class="item-image">
                                <img src="<?php Yii::$app->request->baseUrl; ?>/uploads/empty.jpg" alt="Image" class="img-responsive">
									<!-- <a href="<?php //Yii::$app->request->baseUrl; ?>/<?php //echo str_replace('thum','img',$get_filename->filename); ?>" target="_blank"><img src="<?php //Yii::$app->request->baseUrl;  ?>/<?php //echo $get_filename->filename; ?>" alt="Image" class="img-responsive"></a> -->
								</div><!-- item-image -->
							</div>
					        <div class='ad-info'>
					            <span><a href='view?id=<?php echo $model->berita_id; ?>' class='title'><?php echo $model->jenis_berita."/ " ?><?php $get_id = Category::find()->where(['category_id' => $model->category_id])->one(); echo $get_id->category_name; ?>/ <?php echo  $model->judul_berita; ?></span>
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
					            <a href='view?id=<?php echo $model->berita_id; ?>' class='btn btn-primary'>Detail</a>
					        </div>
					    </div><!-- item-info -->
					</div>
<?php } ]); ?>


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
