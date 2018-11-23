<?php

    // show all errors, only for development
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    // require stuff
    require_once 'vendor/autoload.php';

    // global variables 
    $site_url = 'http://localhost/Projects/ToDoApp';

    // connect to db with Medoo
    use Medoo\Medoo;

    $database = new Medoo([
        // required
        'database_type' => 'mysql',
        'database_name' => 'todo',
        'server'        => 'localhost',
        'username'      => 'root',
        'password'      => 'root',
    ]);
