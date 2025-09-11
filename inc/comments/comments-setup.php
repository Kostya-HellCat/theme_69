<?php
function ajax_comment() {
	global $wpdb;
	$post_ID = isset( $_POST['post_ID'] ) ? (int) $_POST['post_ID'] : 0;

	$comment_author       = ( isset( $_POST['name'] ) ) ? trim( strip_tags( $_POST['name'] ) ) : null;
	$comment_author_email = ( isset( $_POST['email'] ) ) ? trim( $_POST['email'] ) : null;
	$comment_content      = ( isset( $_POST['comment'] ) ) ? trim( $_POST['comment'] ) : null;
	$comment_parent = (isset($_POST['parent_id'])) ? $_POST['parent_id'] : '';
	$comment_karma = ( isset( $_POST['karma'] ) ) ? intval( trim( $_POST['karma'] ) ) : null;

	echo wp_new_comment( [
		'comment_post_ID' => $post_ID,
		'comment_author' => $comment_author,
		'comment_author_email' => $comment_author_email,
		'comment_content' => $comment_content,
		'comment_type' => 'comment',
		'comment_parent' => $comment_parent,
        'comment_karma' => $comment_karma
	] );
	die();
}

add_action( 'wp_ajax_ajaxcomments', 'ajax_comment' );
add_action( 'wp_ajax_nopriv_ajaxcomments', 'ajax_comment' );

function ajax_karma_comment() {
	global $wpdb;
	$comment_update = [
		'comment_ID' => $_POST['comment_id'],
		'comment_karma' => $_POST['karma_value']
	];

	echo wp_update_comment($comment_update, true);
	die();
}

add_action( 'wp_ajax_ajaxkarma', 'ajax_karma_comment' );
add_action( 'wp_ajax_nopriv_ajaxkarma', 'ajax_karma_comment' );
