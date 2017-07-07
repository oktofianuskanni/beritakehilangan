<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BeritakehilanganAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/icofont.css',
        'css/main.css',
        'css/presets/preset1.css',
        'css/responsive.css',
        //'https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300',
        //'https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700',

    ];
    public $js = [
        //'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/price-range.js',   
        'js/main.js',
        //'js/switcher.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
