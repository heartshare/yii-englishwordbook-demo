<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'English Wordbook Yii Framework',
    'language' => 'ja',
    'defaultController' => 'word',
    'preload' => array(
        'log',
    ),
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => array('application.gii'),
            'password' => false,
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    'components' => array(
        'cache' => array(
            'class' => 'CFileCache',
        ),
        'user' => array(
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                'gii' => 'gii',
                '<action:(login|logout)>' => 'site/<action>',
                '<view:[\w.]+>' => 'site/page',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ),
        ),
        /*
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/yii_englishwordbook_demo.sqlite3',
        ),
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yii_englishwordbook_demo',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => getenv('DB_PASS'),
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'schemaCachingDuration' => 86400,
        ),
        'coreMessages' => array(
            'basePath' => null,
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'request' => array(
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CProfileLogRoute',
                ),
            ),
        ),
    ),
    'params' => array(
        'adminEmail' => 'webmaster@example.com',
        'confirmDelete' => 'この項目を削除してもよろしいですか？',
    ),
);

