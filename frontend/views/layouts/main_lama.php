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
                    <a class="navbar-brand" href="index.html"><img class="img-responsive" src="../images/logo.png" alt="Logo"></a>
                </div>
                <!-- /navbar-header -->
                
                <div class="navbar-left">
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="job-list.html">Job list</a></li>
                            <li><a href="details.html">Job Details</a></li>
                            <li><a href="resume.html">Resume</a></li> 
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="post-resume.html">Post Resume</a></li>
                                    <li><a href="post.html">Job Post</a></li>
                                    <li><a href="edit-resume.html">Edit Resume</a></li>
                                    <li><a href="profile-details.html">profile Details</a></li>
                                    <li><a href="bookmark.html">Bookmark</a></li>
                                    <li><a href="applied-job.html">Applied Job</a></li>
                                    <li><a href="delete-account.html">Close Account</a></li>
                                    <li><a href="signup.html">Job Signup</a></li>
                                    <li><a href="signin.html">Job Signin</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- navbar-left -->
                
                <!-- nav-right -->
                <div class="nav-right">             
                    <ul class="sign-in">
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="signin.html">Sign In</a></li>
                        <li><a href="signup.html">Register</a></li>
                    </ul><!-- sign-in -->                   

                    <a href="post.html" class="btn">Post Your Job</a>
                </div>
                <!-- nav-right -->
            </div><!-- container -->
        </nav><!-- navbar -->
    </header><!-- header -->

    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <h3>Menemukan Mempertemukan Mengembalikan</h3>
            <div class="banner-form">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Masukkan Kata Kunci (Mis: Nama, No. KTP, Plat Nomor)">

                    <button type="submit" class="btn btn-primary" value="Search">Search</button>
                    
                </form>
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
            <div>&nbsp;</div>
            <div class="section latest-jobs-ads">
                <div class="section-title tab-manu">
                    <h4>Latest Jobs</h4>
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#hot-jobs" data-toggle="tab">Berita Terpopuler</a></li>
                        <!-- <li role="presentation"><a href="#recent-jobs" data-toggle="tab">Recent Jobs</a></li> -->
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
                                        <a href="job-details.html"><img src="../images/job/2.png" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div>

                                <div class="ad-info">
                                    <span><a href="job-details.html" class=title>Graphics Designer</a> @ <a href="#">AOK Security</a></span>
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
                        <?= $content; ?>
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- trending ads -->     



        </div><!-- conainer -->
    </div><!-- page -->
    
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
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
                        <div class="footer-widget">
                            <h3>How to sell fast</h3>
                            <ul>
                                <li><a href="#">How to sell fast</a></li>
                                <li><a href="#">Membership</a></li>
                                <li><a href="#">Banner Advertising</a></li>
                                <li><a href="#">Promote your ad</a></li>
                                <li><a href="#">Jobs Delivers</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->

                    <!-- footer-widget -->
                    <div class="col-sm-3">
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

                    <!-- footer-widget -->
                    <div class="col-sm-3">
                        <div class="footer-widget news-letter">
                            <h3>Newsletter</h3>
                            <p>Jobs is Worldest leading Portal platform that brings!</p>
                            <!-- form -->
                            <form action="#">
                                <input type="email" class="form-control" placeholder="Your email id">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </form><!-- form -->            
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
