<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'REGISTRASI';
$this->params['breadcrumbs'][] = $this->title;
?>


    <section class="job-bg user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">


                        <div class="site-signup">
                            <h1><?= Html::encode($this->title) ?></h1>

                            <div class="row">

                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                <!-- <?= $form->field($model, 'nama_lengkap')->textInput(['autofocus' => true]) ?> -->

                                <!-- <?= $form->field($model, 'mobile_handphone')->textInput(['autofocus' => true]) ?> -->

                                <!-- <?= $form->field($model, 'telephone')->textInput(['autofocus' => true]) ?> -->
                                
                                <!-- <?= $form->field($model, 'pin_bb')->textInput(['autofocus' => true]) ?>   -->    


                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                                
                                <!-- <?= $form->field($model, 'username')->textInput() ?> -->

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'password_repeat')->passwordInput() ?>



                                <div class="form-group">
                                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- row -->  
        </div><!-- container -->
    </section><!-- signin-page -->




