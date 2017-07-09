<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


    <section class="clearfix job-bg user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">


                             <div class="user-account">


                        
                                <h3>LOGIN DENGAN MEDIA SOSIAL</h3>



                                <p><?= yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth']]) ?> </p>

                                <!-- <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


                                    
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'password')->passwordInput() ?>

                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                    <div style="color:#999;margin:1em 0">
                                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                    </div>

                                    <div class="form-group">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                    </div>

                                <?php ActiveForm::end(); ?> -->

                            </div> 

                    <!-- <p><a href="<?php Yii::$app->request->baseUrl; ?>/site/signup/" class="b-login-button">Create a New Account</a></p> -->
                </div>

                <!-- user-login -->           
            </div><!-- row -->  
        </div><!-- container -->
    </section><!-- signin-page -->




    

    

