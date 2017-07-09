<?php
use yii\helpers\ArrayHelper;

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
                    'clientId' => '146031295964640',
                    'clientSecret' => '60530592c21f01588355b0c8652727ec',
                ],



                'twitter' => [
                    'class' => 'yii\authclient\clients\Twitter',
                    'attributeParams' => [
                        'include_email' => 'true'
                    ],
                    'consumerKey' => 'XmztlBMjDL7HUTkFL3CRiHqMX',
                    'consumerSecret' => 'OW7AwgYshdvHJHqaJHFyKOcIZDTlpybLgY3zy1GrJ63fBCLEBL',
                ],

/*                'google' => [
                      'class' => 'yii\authclient\clients\Google',
                      'clientId'     => '1042155925137-9aqu20s67685fa44o35sro6pn1ri2og3.apps.googleusercontent.com',
                      'clientSecret' => 'n7hu7LcAEL7BH3Ck47qk9o7U',
                ],*/



                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId'     => '1042155925137-9aqu20s67685fa44o35sro6pn1ri2og3.apps.googleusercontent.com',
                    'clientSecret' => 'n7hu7LcAEL7BH3Ck47qk9o7U',
                    'normalizeUserAttributeMap' => [
                        'email' => ['emails', 0, 'value'],
                        'name' => 'displayName',
                        'profile' => 'url',
                        'avatar' => function ($attributes) {
                            return str_replace('?sz=50', '', ArrayHelper::getValue($attributes, 'image.url'));
                        },
                    ]
                ],

            
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
