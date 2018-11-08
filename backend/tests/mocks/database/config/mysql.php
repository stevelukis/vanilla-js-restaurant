<?php

return array(

    // Typical Database configuration
    'mysql' => array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'travis',
        'password' => '',
        'Database' => 'ci_test',
        'dbdriver' => 'mysql'
    ),

    // Database configuration with failover
    'mysql_failover' => array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'not_travis',
        'password' => 'wrong password',
        'Database' => 'not_ci_test',
        'dbdriver' => 'mysql',
        'failover' => array(
            array(
                'dsn' => '',
                'hostname' => 'localhost',
                'username' => 'travis',
                'password' => '',
                'Database' => 'ci_test',
                'dbdriver' => 'mysql',
            )
        )
    )
);