<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>


    <section class="clearfix job-bg user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">


                             <div class="user-account">


                                    <div class="site-contact">
                                        <h1><?= Html::encode($this->title) ?></h1>

                                        <p>
                                            If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
                                        </p>

                                        <div class="row">

                                                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                                                    <?= $form->field($model, 'email') ?>

                                                    <?= $form->field($model, 'subject') ?>

                                                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                                                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                                    ]) ?>

                                                    <div class="form-group">
                                                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                                    </div>

                                                <?php ActiveForm::end(); ?>

                                        </div>

                                    </div>


                            </div> 

                        <!-- <p><a href="<?php Yii::$app->request->baseUrl; ?>/site/signup/" class="b-login-button">Create a New Account</a></p> -->
                    </div>

                    <!-- user-login -->           
                </div><!-- row -->  
            </div><!-- container -->
        </section><!-- signin-page -->

