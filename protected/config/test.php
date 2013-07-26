<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components' => array(
            'fixture' => array(
                'class' => 'system.test.CDbFixtureManager',
            ),
            /*
            'db' => array(
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/yii_englishwordbook_demo_test.sqlite3',
            ),
             */
            'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=yii_englishwordbook_demo_test',
                'username' => 'testuser',
                'password' => 'testpass',
            ),
            'urlManager' => array(
                'showScriptName' => true,
            ),
        ),
    )
);

