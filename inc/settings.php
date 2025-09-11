<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'advanced_small', 300, 300, false );
add_image_size( 'advanced_medium', 450, 450, false );
add_image_size( 'advanced_large', 600, 600, false );

function set_any_type_for_author_page ( $query ) {
    // apply changes only for author archive page
    if ( ! is_author() || ! $query->is_main_query() )
        return;

    $query->set('post_type', ['post','page']);
}
add_action( 'pre_get_posts', 'set_any_type_for_author_page' );

add_post_type_support( 'page', 'excerpt' );