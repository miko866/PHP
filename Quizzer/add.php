<?php 
    
    include_once '_partials/header.php'; 

    if ( isset($_POST['submit']) )
    {
        $question_num = $_POST['question_num'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];

        // array of choices in input
        $choices = [];
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];

        $query = $database->insert("questions", [
            "question_number" => $question_num,
            "text" => $question_text
        ]);
        
        // validate insert
        if ( $query )
        {
            foreach ( $choices as $choice => $value ) {
                if ( $value != '' )
                {
                    if ( $correct_choice == $choice )
                    {
                        $is_correct = 1;
                    } else
                        {
                            $is_correct = 0;
                        }
                    // choice query
                    $query = $database->insert("choices", [
                        "question_number" => $question_num,
                        "is_correct" => $is_correct,
                        "text" => $value
                    ]);  

                    // valid insert
                    if ( $query )
                    {
                        continue;
                    } else
                        {
                            die('Error');
                        }
                }
            }
            $message = 'Question has been added';
        }
    }

    // get total questions
    $query = $database->select('questions', 'text');
    $total = count($query);
    $next = $total + 1;
    
?>

    <h2>Add A Question</h2>
    <?php 
        if ( isset($message) )
        {
            echo '<p>' . $message . '</p>';
        }
    ?>

    <form action="add.php" method="POST">
        <p>
            <label>Question Number: </label>
            <input type="number" value="<?php echo $next ?>" name="question_num">
        </p>
        <p>
            <label>Question Text: </label>
            <input type="text" name="question_text">
        </p>
        <p>
            <label>Choice #1: </label>
            <input type="text" name="choice1">
        </p>
        <p>
            <label>Choice #2: </label>
            <input type="text" name="choice2">
        </p>
        <p>
            <label>Choice #3: </label>
            <input type="text" name="choice3">
        </p>
        <p>
            <label>Choice #4: </label>
            <input type="text" name="choice4">
        </p>
        <p>
            <label>Choice #5: </label>
            <input type="text" name="choice5">
        </p>
        <p>
            <label>Correct Choice Number: </label>
            <input type="number" name="correct_choice">
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>


<?php include_once '_partials/footer.php' ?>