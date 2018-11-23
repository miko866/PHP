<?php 
    
    include_once '_partials/header.php';
    
    // get total questions number
    $query = $database->select('questions', 'question_number');

    // count questions rows
    $rows = count($query);

?>

    <h2>Test Your PHP Knowledge</h2>
    <p>This is a multiple choice quiz to test your knowledge of PHP</p>
    <ul>
        <li><strong>Number of Questions: </strong><?php echo $rows ?></li>
        <li><strong>Type: </strong>Multiple Choice</li>
        <li><strong>Estimated Time: </strong><?php echo $rows * 0.5; ?> Minutes</li>
    </ul>
    <a href="questions.php?n=1" class="start">Start Quiz</a>
    <a href="add.php" class="start add">Add Quiz</a>

<?php include_once '_partials/footer.php' ?>