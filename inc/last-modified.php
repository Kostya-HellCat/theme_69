<?php

add_action('template_redirect', 'Sheensay_HTTP_Headers_Last_Modified');

function Sheensay_HTTP_Headers_Last_Modified()
{

	if ((defined('DOING_AJAX') && DOING_AJAX) || (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) || (defined('REST_REQUEST') && REST_REQUEST) || (is_admin())) {
		return;
	}

	$last_modified = '';


	// Для страниц и записей
	if (is_singular()) {
		global $post;

		// Если пост запаролен - пропускаем его
		if (post_password_required($post))
			return;

		if (!isset($post->post_modified_gmt)) {
			return;
		}

		$post_time = strtotime($post->post_modified_gmt);
		$modified_time = $post_time;

		// Если есть комментарий, обновляем дату
		if (( int )$post->comment_count > 0) {
			$comments = get_comments(array(
				'post_id' => $post->ID,
				'number' => '1',
				'status' => 'approve',
				'orderby' => 'comment_date_gmt',
			));
			if (!empty($comments) && isset($comments[0])) {
				$comment_time = strtotime($comments[0]->comment_date_gmt);
				if ($comment_time > $post_time) {
					$modified_time = $comment_time;
				}
			}
		}

		$last_modified = str_replace('+0000', 'GMT', gmdate('r', $modified_time));
	}


	// Cтраницы архивов: рубрики, метки, даты и тому подобное
	if (is_archive() || is_home()) {
		global $posts;

		if (empty($posts)) {
			return;
		}

		$post = $posts[0];

		if (!isset($post->post_modified_gmt)) {
			return;
		}

		$post_time = strtotime($post->post_modified_gmt);
		$modified_time = $post_time;

		$last_modified = str_replace('+0000', 'GMT', gmdate('r', $modified_time));
	}


	// Если заголовки уже отправлены - ничего не делаем
	if (headers_sent()) {
		return;
	}

	if (!empty($last_modified)) {
		header('Last-Modified: ' . $last_modified);

		if (!is_user_logged_in()) {
			if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $modified_time) {
				$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');
				header($protocol . ' 304 Not Modified');
			}
		}
	}
}
