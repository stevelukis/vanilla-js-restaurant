<?php

return array(

    // Typical Database configuration
    'pgsql' => array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'postgres',
        'password' => '',
        'Database' => 'ci_test',
        'dbdriver' => 'postgre'
    ),

    // Database configuration with failover
    'pgsql_failover' => array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'not_travis',
        'password' => 'wrong password',
        'Database' => 'not_ci_test',
        'dbdriver' => 'postgre',
        'failover' => array(
            array(
                'dsn' => '',
                'hostname' => 'localhost',
                'username' => 'postgres',
                'password' => '',
                'Database' => 'ci_test',
                'dbdriver' => 'postgre',
            )
        )
    )
);