<?php

define( "CSS_DIR", get_template_directory_uri() . '/build/css' );
define( 'JS_DIR', get_template_directory_uri() . '/build/js' );
define( 'IMG_DIR', get_template_directory_uri() . '/build/images' );

require_once "inc/navigation/custom-menu-walker.php";
require_once "inc/navigation/footer-menu-walker.php";

require_once "inc/activate-plugins.php";
require_once "inc/acf-setup/acf-save-fields.php";
require_once "inc/acf-setup/acf-setup.php";
require_once "inc/lang.php";
require_once "inc/filters.php";
require_once "inc/last-modified.php";
require_once "inc/styles-scripts.php";
require_once "inc/settings.php";
#require_once "inc/comments/comments-setup.php";

require_once "inc/functions/get-image.php";
require_once "inc/navigation/relink_from_admin.php";

# get_global_option() - Get option field from the main wpml lang
if ( !function_exists('cl_acf_set_language') && !function_exists('get_global_option') ){
    function cl_acf_set_language() {
        return acf_get_setting('default_language');
    }
    function get_global_option($name) {
        add_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
        $option = get_field($name, 'option');
        remove_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
        return $option;
    }
}


# Register menu
function mytheme_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
        )
    );
}
add_action( 'init', 'mytheme_register_menus' );

# RTL Version
$lang = get_field('settings_lang','options') ?: 'en';
$is_rtl = in_array(strtolower($lang), [

]);

if ( $is_rtl ) {
    add_filter('locale', function ($locale) {
        global $wp_locale;
        $wp_locale->text_direction = 'rtl';
        return get_field('settings_lang','options');
    });

    add_action('admin_head', function () {
        echo '<style>#wpcontent,#wpfooter{margin-right: 160px !important;margin-left: 0; !important}</style>';
    });
}


# Change lang
add_filter('language_attributes', function() {
    $lang = get_field('settings_lang', 'options') ?: 'en';

    $is_rtl = in_array( strstr($lang, '-', true), ['ar','he', 'fa', 'ur', 'dv', 'ps', 'ug']);
    $dir = $is_rtl ? ' dir="rtl"' : '';

    return sprintf('lang="%s"%s', $lang, $dir);
});