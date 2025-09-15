<?php

# ACF
add_filter( 'acf/settings/path', 'my_acf_settings_path' );
function my_acf_settings_path( $path ) {
	$path = get_stylesheet_directory() . '/inc/plugins/acf/';

	return $path;
}

add_filter( 'acf/settings/dir', 'my_acf_settings_dir' );
function my_acf_settings_dir( $dir ) {
	$dir = get_stylesheet_directory_uri() . '/inc/plugins/acf/';

	return $dir;
}

include_once( get_stylesheet_directory() . '/inc/plugins/acf/acf.php' );

# TGMPA
//include_once(get_stylesheet_directory() . '/inc/plugins/TGMPA/class-tgm-plugin-activation.php');
//
//add_action('tgmpa_register', function() {
//    $plugins = [
//        [
//            'name' => 'Table Field Add-on for ACF and SCF',
//            'slug' => 'advanced-custom-fields-table-field',
//            'required' => true,
//        ],
//    ];
//
//    $config = [
//        'id' => 'theme67',
//        'default_path' => '',
//        'menu' => 'tgmpa-install-plugins',
//        'has_notices' => true,
//        'dismissable' => false,
//        'is_automatic' => true,
//    ];
//
//    tgmpa($plugins, $config);
//});