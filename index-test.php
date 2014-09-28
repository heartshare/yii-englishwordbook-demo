<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$yii    = __DIR__ . '/protected/vendor/yiisoft/yii/framework/yii.php';
$config = __DIR__ . '/protected/config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once $yii;
require __DIR__ . '/protected/vendor/autoload.php';
require __DIR__ . '/protected/helpers/functions.php';

Yii::createWebApplication($config)->run();

