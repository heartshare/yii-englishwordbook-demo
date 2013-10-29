<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'English Wordbook Console Yii Framework',
    'preload' => array(
        'log',
    ),
    'components' => array(
        /*
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/yii_englishwordbook_demo.sqlite3',
        ),
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yii_englishwordbook_demo',
            'emulatePrepare' => true,
            'username' => 'testuser',
            'password' => 'testpass',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'commandMap' => array(
        'migrate' => array(
            'class' => 'system.cli.commands.MigrateCommand',
            'migrationTable' => 'migration',
            'templateFile' => 'application.migrations.template',
        ),
    ),
);

