<?php
return [
    'language'=>'de-DE',
    'sourceLanguage'=>'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
//     'formatter'=>[
//         'class'=>\yii\i18n\Formatter::class,
////         'datetimeFormat'=>'php:d/m/Y H:i'
//
//     ]
    'i18n' => [
        'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages',

            ],
        ],
    ],

];
