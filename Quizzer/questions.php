<?php 

    include_once '_partials/header.php';

    // set question number
    $number = $_GET['n'];

    // get Question from DB 
    $query_q = $database->select( 'questions', ['question_number', 'text'], ['question_number' => $number] );
    $data_q = $query_q;

    // get Choices from DB
    $query_ch = $database->select( 'choices', '*', ['question_number' => $number] );
    $data_ch = $query_ch;

    // get total questions
    $query_total_q = $database->select('questions', 'question_number');
    $total_questions = count($query_total_q);

?>

    <div class="current"> Question <?php echo $data_ch[0]['question_number'] ?> of <?php echo $total_questions ?> </div>
    <p class="question">
        <?php foreach ( $data_q as $item ) : ?>
            <?= $item['text'] ?>
        <?php endforeach; ?>
    </p>
    <form action="process.php" method="POST">
        <ul class="choices">
            <?php foreach ( $data_ch as $item ) : ?>
                <li><input type="radio" name="choice" value="<?= $item['id'] ?>"><?= $item['text'] ?></li>
            <?php endforeach; ?>
        </ul>
        <input type="submit" value="Submit" name="submit">
        <input type="hidden" name="number" value="<?php echo $number ?>">
    </form>


<?php include_once '_partials/footer.php' ?>