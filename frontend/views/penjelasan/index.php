<?php

/* @var $this yii\web\View */

$this->title = 'BERITA KEHILANGAN';
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
                <div class="section-title tab-manu tab-manu hidden-lg hidden-md">
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas-kehilangan-ditemukan/index/">Berita Anda</a></li>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/user/index/">Profile Anda</a></li>
                        <?php } ?>
                        <li role="presentation"><a class="navbar-brand" href="<?php Yii::$app->request->baseUrl; ?>/beritas/index/">Utama</a></li>
                        <li role="presentation" class="active"><a href="#popular-jobs" data-toggle="tab">Penjelasan</a></li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                        <div class="job-ad-item">
                            <div class="item-info">
 <div class="site-index">



    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>TUJUAN</h2>

                <p>Layanan ini tentunya ingin membatu mempertemukan orang yang kehilangan dan orang yang menemukan baik berupa barang, orang ataupun ternak. Di beberapa media sosial dan layanan messanger informasi kehilangan atau ditemukan tentu bannyak, namun kami memberikan infomasi pencarian yang akurat. Misalnya Anda kehilangan barang bulan lalu dan sudah di input pada layanan ini, lalu bulan ini anda kunjungi lalu memasukkan kata kunci (mis. ktp, nama, etc) kalau sistem menampilkan 2 baris kehilangan dan ditemukan, maka silahkan ada berkomunikasi langsung ke yang menemukan selama yang menemukan menampilkan data pribadi di halaman utama, jika tidak maka harus melalui kami.</p>

                <p><a class="btn btn-default" href="#">Detail &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Yang boleh dilakukan</h2>

                <p>Menunujuk pada tujuan kami, tentunya apa saja boleh di informasikan lewat layanan ini selama masih berhubungan dengan berita kehilangan atau ditemukan. 
                   </p>

                <p><a class="btn btn-default" href="#">Detail &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Tidak boleh dilakukan</h2>
                <p>Menginformasikan berita kehilangan atau ditemukan yang tidak benar, karena tentunya proses hukum akan menanti anda jika ada yang complain. Dalam proses registrasi, tentu ada harus memasukkan data yang valid. Untuk email terdaftar, sistem kami akan mencoba mengirim email ke alamat email terdaftar, jika gagal maka sistem secara otomatis menghapus account tersebut.</p>

                <p><a class="btn btn-default" href="#">Detail &raquo;</a></p>
            </div>
        </div>

    </div>
</div>



                            </div><!-- item-info -->
                        </div><!-- ad-item -->  
                    



                    </div><!-- tab-pane -->



                </div><!-- tab-content -->
            </div><!-- trending ads -->     



     

        </div><!-- conainer -->
    </div><!-- page -->
    







