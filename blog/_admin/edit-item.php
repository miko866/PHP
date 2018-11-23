<?php

	// include
	require '../_inc/config.php';

	// just to be safe
	if ( ! logged_in() ) {
		redirect('/');
	}


	// c'mon baby do the locomo.. validation
	if ( ! $data = validate_post() ) {
		redirect('back');
	}

	extract( $data );


	// does this even exist?
	if ( ! $post = get_post($post_id, false) ) {
		flash()->error('no such post');
		redirect('back');
	}

	// is this the author?
	if ( ! can_edit( $post ) ) {
		flash()->error('what are you trying to pull here');
		redirect('back');
	}


	// add new title and text
	$update_post = $db->prepare("
		UPDATE posts SET
			title = :title,
			text  = :text
		WHERE
			id = :post_id
	");

	$update_post->execute([
		'title'   => $title,
		'text'    => $text,
		'post_id' => $post_id
	]);


	// remove all tags for this post
	$delete_tags = $db->prepare("
		DELETE FROM posts_tags
		WHERE post_id = :post_id
	");

	$delete_tags->execute([
		'post_id' => $post_id
	]);


	// if we have tags, add them
	if ( isset( $tags ) && $tags = array_filter( $tags ) )
	{
		foreach ( $tags as $tag_id )
		{
			$insert_tags = $db->prepare("
				INSERT INTO posts_tags
				VALUES (:post_id, :tag_id)
			");

			$insert_tags->execute([
				'post_id' => $post_id,
				'tag_id'  => $tag_id
			]);
		}
	}

	// redirect
	if ( $update_post->rowCount() )
	{
		flash()->success( 'yay, changed it!' );
		redirect( get_post_link($post) );
	}

	flash()->warning( 'sorry, girl' );
	redirect('back');