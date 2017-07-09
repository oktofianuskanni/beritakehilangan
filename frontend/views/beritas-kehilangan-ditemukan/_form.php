<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use dosamigos\datepicker\DatePicker;
use frontend\models\User;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model frontend\models\BeritasKehilanganDitemukan */
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
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/user/index/">Profile Saya</a></li>
                        <li role="presentation" class="active"><a href="#berita-anda" data-toggle="tab">Berita Anda</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="berita-anda">
                        <div class="job-ad-item">
                            <div class="item-info">
                                <div class="beritas-kehilangan-ditemukan-form">

                                    <?php $form = ActiveForm::begin(); ?>

                                    <?php  echo $form->field($model, 'category_id')->widget(Select2::classname(), [
                                            'data' => ArrayHelper::map(Category::find()->All(),'category_id','category_name'),
                                            'language' => 'en',
                                            'options' => ['placeholder' => 'Select Category Name'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                     ?>


                                    <?= $form->field($model, 'jenis_berita')->dropDownList([ 'Kehilangan' => 'Kehilangan', 'Ditemukan' => 'Ditemukan', ], ['prompt' => '']) ?>

                                    <?= $form->field($model, 'judul_berita')->textInput(['rows' => 6]) ?>
                                    <?= $form->field($model, 'deskripsi_berita')->textarea(['rows' => 6]) ?>

                                     <?php //echo $form->field($model, 'email')->textInput(['readonly' => !$model->isNewRecord]) ?> 
                                     <?php //echo $form->field($model, 'pin_bb')->hiddenInput(['attribute'=>'pin_bb','value'=>$get_id->pin_bb])->label(false); ?> 


                                    <!--     <?= $form->field($model, 'tanggal_kejadian')->widget(
                                        DatePicker::className(), [
                                            // inline too, not bad
                                            'inline' => false, 
                                            'clientOptions' => [
                                                'autoclose' => true,
                                                'format' => 'yyyy-mm-dd'
                                            ]
                                    ]);?> -->

                                    <?php $get_id = User::find()->where(['username' => Yii::$app->user->identity->username])->one(); ?> 

                                    <?php echo $form->field($model, 'email')->hiddenInput(['attribute'=>'email','value'=>$get_id->email])->label(false); ?>
                                    <?php echo $form->field($model, 'no_telp1')->hiddenInput(['attribute'=>'no_telp1','value'=>$get_id->telephone])->label(false); ?>
                                    <?php echo $form->field($model, 'no_telp2')->hiddenInput(['attribute'=>'no_telp2','value'=>$get_id->mobile_handphone])->label(false); ?> 
                                    <?php echo $form->field($model, 'province_id')->hiddenInput(['attribute'=>'province_id','value'=>$get_id->province_id])->label(false); ?> 
                                    <?php echo $form->field($model, 'regency_id')->hiddenInput(['attribute'=>'regency_id','value'=>$get_id->regency_id])->label(false); ?> 
                                    <?php echo $form->field($model, 'alamat')->hiddenInput(['attribute'=>'alamat','value'=>$get_id->alamat])->label(false); ?> 
                                    <?php echo $form->field($model, 'pin_bb')->hiddenInput(['attribute'=>'pin_bb','value'=>$get_id->pin_bb])->label(false); ?> 

                                     <?php 
                                        $list = ['Bisa dihubungi lewat WA'];
                                        echo $form->field($model,'hub_wa')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                    ?>     

                                    <!--      <?php 
                                        $list = ['Bisa dihubungi lewat BBM'];
                                        echo $form->field($model,'hub_pin_bb')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                    ?>     --> 


                                    <?php 
                                        $list = ['hub_email'];
                                        echo $form->field($model,'hub_email')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                    ?>  

                                    <?php 
                                        $list = ['tampilkan_notelp1'];
                                        echo $form->field($model,'tampilkan_notelp1')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                    ?>   

                                    <?php 
                                        $list = ['tampilkan_notelp2'];
                                        echo $form->field($model,'tampilkan_notelp2')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                    ?> 


                                    <?php 
                                        $list = ['tampilkan_alamatlengkap'];
                                        echo $form->field($model,'tampilkan_alamatlengkap')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                    ?>

                                    <?php 
                                        $list = ['tampil_nama'];
                                        echo $form->field($model,'tampil_nama')->checkbox($list,[ 'value' => '1', 'class' => ''])->label(''); 
                                        //echo $form->field($model, 'tampil_nama')->checkBox(['label' => 'Tampilkan nama di halaman utama', 'uncheck' => null, 'checked' => 'checked']);
                                        //echo $form->field($model, 'tampil_nama')->checkBox(['label' => 'Tampilkan nama di halaman utama', 'uncheck' => null, 'selected' => true]);  
                                    ?>


                                    <?php 
                                        if (!$model->isNewRecord){
                                                echo $form->field($model, 'status')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable', ], ['' => '']);
                                        }
                                    ?>


                                    <?PHP 

                                    /*        
                                        $dataJenisBerita = (new \yii\db\Query())
                                            ->select('jenis_berita')
                                            ->from('beritas')
                                            ->where(['berita_id'=>$model->berita_id])
                                            ->scalar();*/




                                        if ($model->jenis_berita=='Ditemukan'){
                                            //if ($_GET['']!=='beritas-kehilangan-ditemukan/create'){
                                                echo $form->field($model, 'status_ditemukan')->dropDownList([ '0' => 'Belum Ditemukan', '1' => 'Telah Ditemukan', ], ['' => '']); 
                                            //}
                                        }

                                        if ($model->jenis_berita=='Kehilangan'){
                                           // if ($_GET['']!=='beritas-kehilangan-ditemukan/create'){
                                                echo $form->field($model, 'status_ditemukan')->dropDownList([ '2' => 'Belum diambil oleh pemiliknya', '3' => 'Sudah diambil oleh pemiliknya', ], ['' => '']); 
                                           // }
                                        }
                                    ?>

                                    <?php
                                        // Usage with ActiveForm and model
                                        echo $form->field($model, 'file')->widget(FileInput::classname(), [
                                            'options' => ['accept' => 'uploads/*',
                                            ],
                                        ]);

                                    ?>


                                    <br>


                                    <div class="form-group">
                                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- trending ads -->     
        </div><!-- conainer -->
    </div><!-- page -->














