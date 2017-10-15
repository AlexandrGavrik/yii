<?php

use kartik\datecontrol\Module;
$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\admin\Module',
        ],
        'datecontrol' => [
            'class'=>'kartik\datecontrol\Module',
            'displaySettings'=>[
                Module::FORMAT_DATE=>'php:d/M/Y',
                Module::FORMAT_TIME=>'php:H:i',
                Module::FORMAT_DATETIME=>'php: d/M/Y H:i',
            ],
            'saveSettings'=>[
                Module::FORMAT_DATE=>'yyyy-M-dd',
                Module::FORMAT_TIME=>'H:i:s',
                Module::FORMAT_DATETIME=>'yyyy-M-dd H:i:s',
            ],
            'displayTimezone'=>'Europe/Samara',
            'saveTimezone'=>'Europe/Samara',
            'autoWidget'=>true,
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            //'cache' => 'cache',
        ],
        //'cache' => [
        //    'class' => 'yii\caching\FileCache',  // Подключаем файловое кэширование данных
        //],
        'formatter' => [
            'class'=>'yii\i18n\Formatter',
            'decimalSeparator'=>',',
            'thousandSeparator'=>' ',
            'currencyCode'=>'EUR',
            'dateFormat'=>'php: d/m/Y',
            'datetimeFormat'=>'php: d/m/Y H:i',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dCprom5DvlPTbZw8HLXgiy5cUwk-LEHB',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
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

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
