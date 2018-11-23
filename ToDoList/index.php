<?php 

    require_once '_inc/config.php';

    $data = $database->select('shouts', ['subject', 'message', 'created_at']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="page-header">To Do List</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <section>
                <ul>
                    <?php foreach ( $data as $item ) : ?>
                            <li>
                                <time><?= $item['created_at'] ?></time>
                                <strong><?= $item['subject'] ?>:</strong>
                                <?= $item['message'] ?>
                            </li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <form action="add.php" method="post">
                <input type="text" name="subject" placeholder="Subject">
                <input type="text" name="text" placeholder="Enter some text">
                <p><button type="submit" name="submit">Kick It</button></p>
            </form>
        </div>

    </main>

    <footer>
        <p>Created <strong>Miko866</strong></p>
    </footer>
    
</body>
</html>