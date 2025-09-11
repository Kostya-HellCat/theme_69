<?php

    add_action( 'wp_enqueue_scripts', function () {
        global $is_rtl;

        $prefix = $is_rtl ? "rtl-" : "";

        wp_enqueue_style( 'main', CSS_DIR . "/" . $prefix . "main.min.css", array(), filemtime( get_theme_file_path( '/build/css/main.min.css') ));
        #wp_enqueue_style( 'uniq', CSS_DIR . '/uniq.css', null, filemtime( get_theme_file_path( '/build/css/uniq.css')));

        wp_enqueue_script( 'main', JS_DIR . '/main.js', array(), filemtime( get_theme_file_path('/build/js/main.js') ), [ 'in_footer' => true, 'strategy'  => 'defer' ] );
        wp_localize_script('main', 'themeData', ['themeUrl' => get_template_directory_uri()]);
        #if (comments_open()) {
        #    wp_enqueue_script('comments', JS_DIR . '/comments.js', array(), filemtime( get_theme_file_path('/build/js/comments.js') ), [ 'in_footer' => true, 'strategy'  => 'defer',]);
        #}
    } );
