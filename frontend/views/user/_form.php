<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Provinces;
use frontend\models\Regencies;
use frontend\models\Districts;


use yii\web\Url;








/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
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
                                

                                                  <div class="user-form">

                                                      <?php $form = ActiveForm::begin(); ?>

                                                      <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

                                                      <!-- <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?> -->

                                                      <!-- <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?> -->

                                                      <?= $form->field($model, 'email')->textInput(['readonly' => !$model->isNewRecord]) ?> 


                                                      <?php 
                                                          $dataProvinces=ArrayHelper::map(Provinces::find()->orderBy('name ASC')->asArray()->all(), 'province_id', 'name');
                                                          echo $form->field($model, 'province_id')->dropDownList($dataProvinces, 
                                                           ['prompt'=>'Pilih Propinsi',
                                                            'onchange'=>'
                                                             $.post( "../regencies/lists?idgets='.'"+$(this).val(), function( dataPropinsi ) {

                                                                $( "select#name" ).html( dataPropinsi );
                                                              });         

                                                           ']); 
                                                     ?>

                                                     

                                                      <?php 

                                                          $dataRegencies=ArrayHelper::map(Regencies::find()->orderBy('name ASC')->asArray()->all(), 'regency_id', 'name');
                                                          echo $form->field($model, 'regency_id')->dropDownList($dataRegencies, 
                                                           ['prompt'=>'Pilih Kabupaten/ Kota','id'=>'name']);

                                                      ?>

                                                      <?= $form->field($model, 'alamat')->textarea(['rows' => '6']) ?>

                                                      <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

                                                      <?= $form->field($model, 'mobile_handphone')->textInput(['maxlength' => true]) ?>

                                                      <!-- <?= $form->field($model, 'pin_bb')->textInput(['maxlength' => true]) ?> -->

                                                      <div class="form-group">
                                                          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                                      </div>

                                                      <?php ActiveForm::end(); ?>

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





