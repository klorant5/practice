<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'en-US',      //default nyelv. erre fog alapból fordítani a frontend fordító is
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'xx-XX', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 86400,
                    'enableCaching' => true,
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
            'showScriptName' => false,
//            'rules' => [
//                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
//            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

    ],
    'modules' => [
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
        ],
        'signup' => [
            'class' => \common\modules\signup\Module::class,
        ]
    ],
];
