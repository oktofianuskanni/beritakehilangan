<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Taipei',    
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    
];

