<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>




    <section class="job-bg user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <div class="site-request-password-reset">
                            <h1><?= Html::encode($this->title) ?></h1>

                            <p>Please fill out your email. A link to reset password will be sent there.</p>

                            <div class="row">

                                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                                        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                                        <div class="form-group">
                                            <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                                        </div>

                                    <?php ActiveForm::end(); ?>

                            </div>
                        </div>

                        </div><!-- row -->  
                    </div><!-- container -->
                </section><!-- signin-page -->





