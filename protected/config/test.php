<?php

return CMap::mergeArray(
    require __DIR__ . '/main.php',
    array(
        'components' => array(
            'fixture' => array(
                'class' => 'system.test.CDbFixtureManager',
            ),
            /*
            'db' => array(
                'connectionString' => 'sqlite:' . __DIR__ . '/../data/yii_englishwordbook_demo_test.sqlite3',
            ),
             */
            'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=yii_englishwordbook_demo_test',
                'username' => 'root',
                'password' => getenv('DB_PASS'),
            ),
            'urlManager' => array(
                'showScriptName' => true,
            ),
        ),
    )
);

