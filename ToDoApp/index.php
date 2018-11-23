<?php include_once '_partials/header.php'; ?>

    <h1 class="page-header">
        Simple ToDo List
    </h1>

    <?php $data = $database->select('items', ['id', 'text']); ?>

    <div class="flex-direction">
        <ul  id="item-list" class="list-group">
            <?php 
                foreach ( $data as $item ) {
                    echo '<li id="item-'. $item['id'] .'" class="list-group__item">';
                    echo    '<p>'. $item['text'] .'</p>';
                    echo '  <div class="controls">';
                    echo '      <a href="edit.php?id='. $item['id'] .' "             class="edit-link"> edit </a>';
                    echo '      <a href="delete.php?id='. $item['id'] .' " class="delete-link fas fa-times"></a>';
                    echo '  </div>';
                    echo '</li>';
                }
            ?>
        </ul>

        <form  id="add-form" action="_inc/add-item.php" method="post">
            <p class="form-group">
                <textarea name="message" id="text" rows="5" class="form-group__control" placeholder="Enter the text"></textarea>
            </p>
            <p class="form-group">
                <input type="submit" value="add new thing" class="btn">
            </p>
        </form>
        
    </div>

<?php include_once '_partials/footer.php'; ?>