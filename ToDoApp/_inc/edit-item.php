<?php

    // include
    require 'config.php';

    // update item
    $affected = $database->update("items", 
        [ "text" => $_POST['message'] ], 
        [ "id" => $_POST['id'] ]
    );

    // success
    if ( $affected ) {
        header("Location: $site_url/index.php");
        die();
    }
