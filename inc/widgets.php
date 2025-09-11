<?php

//register_sidebar( [
//	'name'          => 'Footer widget',
//	'id'            => 'footer-1',
//	'before_widget' => '<div class="columns__item">',
//	'after_widget'  => '</div>',
//	'before_title'  => '<p class="page-footer__title">',
//	'after_title'   => '</p>'
//] );

add_action( 'after_setup_theme', 'theme_register_header_menu' );

function theme_register_header_menu() {
	register_nav_menu( 'main-nav', 'Main header menu' );
}
