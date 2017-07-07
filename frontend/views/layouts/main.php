<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\BeritakehilanganAsset;
use common\widgets\Alert;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\models\Beritas;
use frontend\models\BeritasSearch;
use frontend\models\User;




BeritakehilanganAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



    <!-- header -->
    <header id="header" class="clearfix">
        <!-- navbar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/"><img class="img-responsive" src="<?php Yii::$app->request->baseUrl; ?>/images/logo.png" alt="Logo"></a>
                </div>
                <!-- /navbar-header -->
                
                <div class="navbar-left">
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <?php if (Yii::$app->user->isGuest){ ?>
                                <li class="active"><a href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">UTAMA</a></li>
                                <li><a href="<?php Yii::$app->request->baseUrl; ?>/penjelasan/index/">PENJELASAN</a></li>
                            <?php } else { ?>
                                <li class="active"><a href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">UTAMA</a></li>
                                <li><a href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/index/">BERITA ANDA</a></li>
                                <li><a href="<?php Yii::$app->request->baseUrl; ?>/user/index/">PROFILE ANDA</a></li>
                                <li><a href="<?php Yii::$app->request->baseUrl; ?>/penjelasan/index/">PENJELASAN</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div><!-- navbar-left -->
                
                <!-- nav-right -->
                <div class="nav-right">             
                    <ul class="sign-in">
                    <?php if (Yii::$app->user->isGuest){ ?>
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="<?php Yii::$app->request->baseUrl; ?>/site/login/">LOGIN</a></li>
                        <li><a href="<?php Yii::$app->request->baseUrl; ?>/site/signup/">REGISTRASI</a></li>
                    <?php }  else { ?>
                        <li>
                            <?php echo Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-success logout']
                            ) . Html::endForm(); ?>
                        </li>
                    <?php } ?>
                    </ul><!-- sign-in -->                   

                    <a href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/create/" class="btn">Buat Berita Anda</a>
                </div>
                <!-- nav-right -->
            </div><!-- container -->
        </nav><!-- navbar -->
    </header><!-- header -->


        
        <?= Alert::widget() ?>
        <?= $content ?>
    <!-- download -->
    <section id="download" class="clearfix parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Download on App Store</h2>
                </div>
            </div><!-- row -->

            <!-- row -->
            <div class="row">
                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="../images/icon/16.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
                            <span>available on</span>
                            <strong>Google Play</strong>
                        </span>
                    </a>
                </div><!-- download-app -->

                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="../images/icon/17.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
                            <span>available on</span>
                            <strong>App Store</strong>
                        </span>
                    </a>
                </div><!-- download-app -->

                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="../images/icon/18.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
                            <span>available on</span>
                            <strong>Windows Store</strong>
                        </span>
                    </a>
                </div><!-- download-app -->
            </div><!-- row -->
        </div><!-- contaioner -->
    </section><!-- download -->
    
    <!-- footer -->
    <footer id="footer" class="clearfix">
        <!-- footer-top -->
        <section class="footer-top clearfix">
            <div class="container">
                <div class="row">
                    <!-- footer-widget -->
                    <div class="col-sm-8">
                        <div class="footer-widget">
                            <h3>Quik Links</h3>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">All Cities</a></li>
                                <li><a href="#">Help & Support</a></li>
                                <li><a href="#">Advertise With Us</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->


                    <!-- footer-widget -->
                    <div class="col-sm-4">
                        <div class="footer-widget social-widget">
                            <h3>Follow us on</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-official"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i>Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i>Google+</a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i>youtube</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->


                </div><!-- row -->
            </div><!-- container -->
        </section><!-- footer-top -->

        <div class="footer-bottom clearfix text-center">
            <div class="container">
                <p>Copyright &copy; <a href="#">Jobs</a> 2017. Developed by <a href="http://themeregion.com/">ThemeRegion</a></p>
            </div>
        </div><!-- footer-bottom -->
    </footer><!-- footer -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
