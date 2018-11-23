<?php

    require_once '_inc/config.php';
    session_start();

    // check to see if score is set, if not created it 
    if ( ! isset($_SESSION['score']) ) 
    {
        $_SESSION['score'] = 0;
    } 


    if ( isset($_POST['submit']) ) 
    {
        // $number from questions.php -> [input:hidden]
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];

        $next = $number + 1;

        // get total questions
        $query_total = $database->select('questions', 'question_number');
        $total = count($query_total);

        // get correct choice with ID
        $query = $database->select( 'choices', '*', ['question_number' => $number, 'is_correct' => 1] );
        $correct_choice = $query[0]['id'];

        // compare
        if ( $correct_choice == $selected_choice )
        {
            // answer is correct
            $_SESSION['score']++;
        }

        // check last question 
        if ( $number == $total )
        {
            header("Location: final.php");
            exit();
        } else
            {
                header("Location: questions.php?n=" . $next);
            }


    }
