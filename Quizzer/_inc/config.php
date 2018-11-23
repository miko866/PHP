<?php

    // show all errors, only for development
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    // require stuff
    require_once 'vendor/autoload.php';


    // connect to db with Medoo
    use Medoo\Medoo;

    $database = new Medoo([
        // required
        'database_type' => 'mysql',
        'database_name' => 'quizzer',
        'server'        => 'localhost',
        'username'      => 'root',
        'password'      => 'root',
    ]);

