<?php 
    
    include_once '_partials/header.php' ;

    session_unset();
    session_start();


?>

    <h2>You're done!</h2>
    <p>Congrats! You have completed test</p>
    <p>Final Score: <?php echo $_SESSION['score']; ?></p>
    <?php session_unset(); ?>
    <a href="questions.php?n=1" class="start">Take again.</a>



<?php include_once '_partials/footer.php' ?>