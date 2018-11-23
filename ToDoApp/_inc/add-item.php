<?php

    // include
    require 'config.php';

    // add new stuff
    $id = $database->insert("items", [
        "text" => $_POST['message']
    ]);

    // success
    if ( $id ) {
        //header("Location: $site_url/index.php");
        die('success');
    }
