<?php include_once "_partials/header.php"; 


    // create "storage" if not exists
    $file = '_inc/storage';
    mk_file( $file );

    $data = file_get_contents( $file );
    $data = json_decode( $data ) ?: [];

    
    // add new data, if form was submitted
    if ( can_edit() && ! empty($_POST) ) {
        
        $time = time();

        foreach ( $_POST['message'] as $message ) {
            if ( ! $message = trim($message) ) continue;

            array_push( $data, (object) [
                'text' => $message,
                'time' => $time
            ]);
        }
        
        file_put_contents( $file, json_encode($data) );
        
    }

    /**
     * add item form   if i can edit it
     */
    if ( can_edit() ) {
        
        include_once '_partials/add-form.php';
    }
?>


    <section class="article-list">
        <?php foreach ( $data as $i => $item ) : $row = ++$i ?>

            <article>
                <time datetime="<?=  date( 'Y-m-d' , $item->time ) ?>">
                    <?=  date( 'j M Y' , $item->time ) ?>
                </time>
                <p><?= nl2br( plain($item->text) ) ?></p>
            </article>

        <?php endforeach ?>
    </section>

<?php include_once "_partials/footer.php"; ?>


