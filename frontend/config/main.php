<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',

    'modules' => [
       'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
    
    'components' => [

    
          'request' => [
                'baseUrl' => '',
            ],




            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                    //'' => 'site/index',

                   
/*                   'jh34h3jhjh2<controller>6k4h6hkj3h' => '<controller>/index', // supaya bisa cari
                    'D<controller>SSFFF' => '/view/<controller>', // biar bisa aktive encodex
                    'hk433h5h53h<controller>jh34h2kk2h' => '<controller>/update', // biar bisa aktive encodex
                    'encuncnrncw<controller>nkcufnhahf' => '<controller>/login', // biar bisa aktive encodex                    
                    '<controller>kbckfcacfj' => '<controller>/list', // biar bisa aktive encodex
                        */
/*
                        'A<action>'=>'site/<action>',
                        'B<action>'=>'penjelasan/<action>',
                        //'C<action>'=>'beritas/<action>',

                    ['class' => 'common\helpers\UrlRule', 'connectionID' => 'db',],*/
                    


                ],
            ],



        'authClientCollection' => [
          'class' => 'yii\authclient\Collection',
          'clients' => [


            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                'clientId' => '1927395184210308',
                'clientSecret' => '75f6a0f22cb37479a0637597edf28f61',
            ],

/*            'google' => [
                'class' => 'yii\authclient\OpenIdConnect',
                'issuerUrl' => 'https://accounts.google.com',
                'clientId' => '927107541399-7j5fgknb1u19639t0uu61abrtl59tl81.apps.googleusercontent.com',
                'clientSecret' => 'wIj3t0tzmM1IDtaovWlhhvf8',
                'name' => 'google',
                'title' => 'BERITAKEHILANGAN.COM',
            ],
*/
          ],
        ],



        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

       'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => __DIR__ . '/../tmp',
        ],



        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
