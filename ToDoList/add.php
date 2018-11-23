<?php

    // include
    require_once '_inc/config.php';

    if ( isset($_POST['subject']) === '' && isset($_POST['subject']) || empty($_POST['subject']) && empty($_POST['subject']) )
    {
        header("Location: $site_url/index.php");
    } else {

        $id = $database->insert("shouts", [
            "subject" => $_POST['subject'],
            "message" => $_POST['text']
        ]);
    
        if ($id) {
            header("Location: $site_url/index.php");
        }

    }