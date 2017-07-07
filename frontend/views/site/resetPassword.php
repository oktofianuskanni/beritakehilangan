<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

    <section class="job-bg user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">


                        <div class="site-reset-password">
                            <h1><?= Html::encode($this->title) ?></h1>

                            <p>Please choose your new password:</p>

                            <div class="row">
                                <div class="col-lg-5">
                                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                                        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                                        <div class="form-group">
                                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                                        </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>



       
            </div><!-- row -->  
        </div><!-- container -->
    </section><!-- signin-page -->





