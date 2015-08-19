<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

// Загружает автоматически то, что сконфигурировал композер
require(__DIR__ . '/../vendor/autoload.php');

// Подключаем фреймворк
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// Файл конфигурации
$config = require(__DIR__ . '/../config/web.php');

// Создаем приложение и запускаем
(new yii\web\Application($config))->run();