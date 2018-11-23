<?php 

    require_once '_inc/config.php';
    require_once '_inc/function.php';

    $item = get_item();
    if( ! $item ) show_404(); 

    include_once '_partials/header.php'; 
    
?>

    <h1 class="page-header">
        Edit ToDo List
    </h1>

    <?php $data = $database->select('items', 'text'); ?>

    <div class="flex-direction">

        <form  id="edit-form" action="_inc/edit-item.php" method="post">
            <p class="form-group">
                <textarea name="message" id="text" rows="5" class="form-group__control">
                    <?php echo $item; ?>
                </textarea>
            </p>
            <p class="form-group">
                <!-- forwarding of element ID from DB -->
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="submit" value="edit item" class="btn">
                <span class="controls">
                    <a href="<?php echo $site_url ?>" class="back-link">back</a>
                </span>
            </p>
        </form>
        
    </div>

<?php include_once '_partials/footer.php'; ?>