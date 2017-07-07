<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],

/*    'as access' => [
         'class' => '\hscstudio\mimin\components\AccessControl',
         'allowActions' => [
            // add wildcard allowed action here!
            //'category/*',
            //'provinces/*',
            //'category/*',
            'site/*',
            'debug/*',
            'mimin/*', // only in dev mode
        ],
    ],
*/

    'modules' => [


        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
        ],

        'utility' => [
            'class' => 'c006\utility\migration\Module',
        ],


    ],
    'components' => [
/*        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],*/



        'authManager'=>
        [
           'class'=>'yii\rbac\DbManager',
           'defaultRoles'=>['guest'],
        ],

               
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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

        'urlManager' => [
         //'enablePrettyUrl' => true,
         //'showScriptName' => false,
            'rules' => [
                ['class' => 'common\helpers\UrlRule', 'connectionID' => 'db',],
            ],
        ],
        
    ],
    'params' => $params,
];
