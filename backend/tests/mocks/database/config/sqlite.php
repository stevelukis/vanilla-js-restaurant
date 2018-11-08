<?php

return array(

    // Typical Database configuration
    'sqlite' => array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'sqlite',
        'password' => 'sqlite',
        'Database' => realpath(__DIR__ . '/..') . '/ci_test.sqlite',
        'dbdriver' => 'sqlite3'
    ),

    // Database configuration with failover
    'sqlite_failover' => array(
        'dsn' => '',
        'hostname' => 'localhost',
        'username' => 'sqlite',
        'password' => 'sqlite',
        'Database' => '../not_exists.sqlite',
        'dbdriver' => 'sqlite3',
        'failover' => array(
            array(
                'dsn' => '',
                'hostname' => 'localhost',
                'username' => 'sqlite',
                'password' => 'sqlite',
                'Database' => realpath(__DIR__ . '/..') . '/ci_test.sqlite',
                'dbdriver' => 'sqlite3'
            )
        )
    )
);