<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'cubicTaskDemo',
    'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1A34B5992AFE443B55E33D010',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'defaultRoute' => '/../controllers/cubicTask',
//        'params' => $params,
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
         'cubicProject' => [
            'class' => 'app\modules\cubicProject\Module',
       ],

        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', 'localhost', '*'],
        ],
    ],
    'bootstrap' => ['gii',],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = 'yii\gii\Module';
//    $config['modules']['gii']['allowedIPs'] = ['127.0.0.1', '::1', 'localhost'];
}

return $config;
