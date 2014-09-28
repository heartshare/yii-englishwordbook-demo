<?php

// change the following paths if necessary
$yii    = __DIR__ . '/protected/vendor/yiisoft/yii/framework/yii.php';
$config = __DIR__ . '/protected/config/main.php';

// remove the following lines when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once $yii;
require __DIR__ . '/protected/vendor/autoload.php';
require __DIR__ . '/protected/helpers/functions.php';

Yii::createWebApplication($config)->run();

