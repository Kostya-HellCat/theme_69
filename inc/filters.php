<?php
    # Block xmlrpc
    function block_xmlrpc_access() {
        if (strpos($_SERVER['REQUEST_URI'], 'xmlrpc.php') !== false) {
            status_header(403);
            exit;
        }
    }
    add_action('init', 'block_xmlrpc_access');

    # Handle redirects
    function handle_redirects() {
        if (is_admin() || wp_doing_ajax()) {
            return;
        }

        # Uppercase redirect
        if ( preg_match( '~[A-Z]~', $_SERVER['REQUEST_URI'] ) ) {
            header( "HTTP/1.1 301 Moved Permanently" );
            header( "Location: https://" . $_SERVER['HTTP_HOST'] . strtolower( $_SERVER['REQUEST_URI'] ) );
            exit();
        }

        # Remove search & pagination
        if ( is_search() || is_paged() ) {
            global $lang_content;
            wp_die( $lang_content['page_404_bread_crumb'] ?? 'Page not found', '', array( 'response' => 410 ));
        }

        # Gone from admin
        if ( is_author() ) {
            $author_id = get_queried_object_id();

            if ( user_can($author_id, 'administrator') ) {
                header("HTTP/1.0 410 Gone");
                die('410 Gone');
            }
        }

        if ( function_exists('icl_get_languages') ){
            # Remove index.php and extra slashes
            if (preg_match('#/{2,}#', $_SERVER['REQUEST_URI'])) {
                $normalized_url = preg_replace('#/{2,}#', '/', $_SERVER['REQUEST_URI']);
                wp_redirect(home_url($normalized_url), 301);
                exit;
            }

            if (strtolower($_SERVER['REQUEST_URI']) === '/index.php' || strtolower($_SERVER['REQUEST_URI']) === '/index.php/') {
                wp_redirect(home_url('/'), 301);
                exit;
            }
        }

        # Redirect from attachment pages
//        if ( is_attachment() ) {
//            $parent_post_id = wp_get_post_parent_id( get_the_ID() );
//
//            if ( $parent_post_id ) {
//                $parent_post_url = get_permalink($parent_post_id);
//
//                if ($parent_post_url) {
//                    wp_redirect($parent_post_url, 301);
//                    exit;
//                }
//            }
//
//            wp_redirect( home_url(), 301 );
//            exit;
//        }

    }
    add_action('template_redirect', 'handle_redirects');

    # Remove trash
    function disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }

    add_action( 'init', 'disable_emojis' );
    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }
    add_action( 'after_setup_theme', function () {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    } );

    remove_action( 'wp_head', 'wp_resource_hints', 2 );
    add_filter( 'the_generator', '__return_empty_string' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
    remove_action( 'wp_head', 'rsd_link' );

    # Remove wp-embed
    add_action( 'wp_footer', function () {
        wp_dequeue_script( 'wp-embed' );
    });

    # Remove wpml generator
    add_action('wp_head', '_remove_wpml_generator', 0);
    function _remove_wpml_generator() {
        if (!empty($GLOBALS['sitepress'])) {
            remove_action(current_filter(), array($GLOBALS['sitepress'], 'meta_generator_tag'));
        }
    }

    # Remove feed page
    if ( !function_exists( 'disable_feed' ) ){
        function disable_feed() {
            wp_die( __( '<strong>Error:</strong> This is not a valid feed template.' ), '', array( 'response' => 410 ));
        }
    }

    add_action('do_feed', 'disable_feed', 1);
    add_action('do_feed_rdf', 'disable_feed', 1);
    add_action('do_feed_rss', 'disable_feed', 1);
    add_action('do_feed_rss2', 'disable_feed', 1);
    add_action('do_feed_atom', 'disable_feed', 1);
    add_action('do_feed_rss2_comments', 'disable_feed', 1);
    add_action('do_feed_atom_comments', 'disable_feed', 1);
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'feed_links', 2 );

    # Remove figure tag
    if ( !function_exists( 'remove_figure_tags' ) ){
        function remove_figure_tags($str){
            $pattern = [ '/<figure(.*?)<\/figure>/i', '/<figcaption(.*?)<\/figcaption>/i' ];
            $replacement =  [ '<div$1</div>', '<p$1</p>' ];

            return preg_replace( $pattern, $replacement, $str);
        }
    }

    add_filter( 'render_block_core/image', function ( $block_content = '', $block = [] ){ return remove_figure_tags($block_content); }, 1000, 2 );
    add_filter( 'render_block_core/media-text', function ( $block_content = '', $block = [] ){ return remove_figure_tags($block_content); }, 1000, 2 );
    add_filter( 'render_block_core/table', function ( $block_content = '', $block = [] ){ return remove_figure_tags($block_content); }, 1000, 2 );

    # Fix ico mime
    add_filter( 'upload_mimes', function ( $mimes ) {
        $mimes['ico'] = 'image/x-icon';
        $mimes['ico'] = 'image/vnd.microsoft.icon';
        return $mimes;
    } );

    # Normal canonical
    function custom_canonical_url() {
        $canonical_url = '';

        if ( is_single() || is_page() ) {
            $canonical_url = get_permalink();
        } elseif ( is_author() ) {
            $author_id = get_queried_object_id();
            $canonical_url = get_author_posts_url($author_id);
        } elseif ( is_category() ) {
            $categories  = get_the_category();
            $category_id = $categories[0]->term_id;
            $canonical_url = get_category_link($category_id);
        }

        if ($canonical_url) {
            #$canonical_url = str_replace( $_SERVER['HTTP_HOST'], 'domain.com', $canonical_url);
            echo '<link rel="canonical" href="' . esc_url($canonical_url) . '" />' . PHP_EOL;
        }
    }

    add_filter('wpseo_canonical', '__return_false');
    remove_action('wp_head', 'rel_canonical');
    add_action('wp_head', 'custom_canonical_url');

    add_action('wp_loaded', function (){ remove_action('wp_head', 'gglstmp_canonical_tag'); });

    function filter_tags( $query_vars ) {
        if ( isset( $query_vars["category"] ) ) {
            $tag = $query_vars["category"];
            if ( urldecode( $_SERVER['REQUEST_URI'] ) == "/category/" . $tag . "/" ) {
                wp_redirect( site_url( "/" . $tag . "/" ), 301 );
                exit();
            }
        }

        return $query_vars;
    }

    add_filter( 'request', 'filter_tags' );
    add_action( 'template_redirect', 'filter_tags' );


    function tags_links( $url, $term, $taxonomy ) {
        $replace = '';
        $url     = str_replace( '/category', $replace, $url );

        return $url;
    }

    add_filter( 'term_link', 'tags_links', 10, 3 );
    add_filter('wp_sitemaps_enabled', '__return_false');

    # Remove core-block-supports
    add_action('wp_footer', function () {
        wp_dequeue_style('core-block-supports');
    });

    # Remove wp-block-library
    function smartwp_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
        wp_dequeue_style( 'classic-theme-styles' );
        wp_dequeue_style( 'global-styles' );
    }
    add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

    # Allow SVG images
    add_filter( 'upload_mimes', 'svg_upload_allow' );
    function svg_upload_allow( $mimes ) {
        $mimes['svg']  = 'image/svg+xml';

        return $mimes;
    }

    add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
    function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
        if ( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
            $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
        else
            $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

        if ( $dosvg ) {
            if( current_user_can('manage_options') ){

                $data['ext']  = 'svg';
                $data['type'] = 'image/svg+xml';
            }
            else {
                $data['ext'] = $type_and_ext['type'] = false;
            }
        }
        return $data;
    }

    add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );
    function show_svg_in_media_library( $response ) {
        if ( $response['mime'] === 'image/svg+xml' ) {
            $response['sizes'] = [
                'medium' => [
                    'url' => $response['url'],
                ],
                'full' => [
                    'url' => $response['url'],
                ],
            ];
        }

        return $response;
    }

    # Correct hreflangs for wpml
    if ( function_exists('icl_get_languages') ) {
        add_filter('wpml_hreflangs', 'change_page_hreflang');
        function change_page_hreflang($hreflang_items) {
            if (count(array_diff_key($hreflang_items, ['x-default' => ''])) < 2) return false;

            $post_id = get_the_ID();
            $default_language = apply_filters('wpml_default_language', null);
            $default_language_url = apply_filters('wpml_permalink', get_permalink($post_id), $default_language);

            $hreflang_items['x-default'] = $default_language_url;
            $hreflang = '';

            foreach ( $hreflang_items as $hreflang_code => $hreflang_url ) {
                if (substr($hreflang_url,-1) !== '/') $hreflang_url .= '/';
                $hreflang_code = str_replace('@', '', $hreflang_code); // Remove @ inside
                $hreflang .= '<link rel="alternate" hreflang="' . esc_attr( $hreflang_code ) . '" href="' . esc_url( $hreflang_url ) . '" />' . PHP_EOL;
            }

            echo apply_filters( 'wpml_hreflangs_html', $hreflang );
            return false;
        }
    }

    # Fix standard columns cols classes
    add_filter( 'render_block_core/columns', function ( $block_content = '', $block = [] ) {
        preg_match_all('/class=["\'][^"\']*wp-block-column(?!-)[^"\']*["\']/', $block_content, $matches);
        $columns_count = count($matches[0]);
        if ($columns_count) {
            $columns_count--;
            $block_content = str_replace("wp-block-columns","wp-block-columns col-$columns_count", $block_content);
        }
        return $block_content;
    }, 1000, 2 );

    # [BAD PARSER, BETTER NOT TO USE] Add loading attr to standard media-text images & disable lazy on first image
    // if ( !function_exists('add_loading_attr') ){
    //     function add_loading_attr($content) {
    //         static $first_match = true;

    //         $pattern = '/decoding=["\']async["\'] width/';

    //         $replace_callback = function($match) use (&$first_match) {
    //             if ($first_match) {
    //                 $first_match = false;
    //                 return 'decoding="sync" loading="eager" width';
    //             } else {
    //                 return 'decoding="async" loading="lazy" width';
    //             }
    //         };

    //         return preg_replace_callback($pattern, $replace_callback, $content);
    //     }
    // }

    // add_filter('the_content', 'add_loading_attr', 20, 1);

    # [BETTER TO USE MANUAL DISABLE] Disable lazy in first block
    //    function modify_first_block_attributes($block_content, $block) {
    //        if ( in_array( $block['blockName'], [ 'core/media-text', 'acf/text-image', 'core/image' ]) ){
    //            $block_content = preg_replace( ['/decoding=["\']async["\']/', '/loading=["\']lazy["\']/'], ['decoding="sync"', 'loading="eager"'], $block_content );
    //            remove_filter('render_block', 'modify_first_block_attributes', 1001, 2);
    //        }

    //        return $block_content;
    //    }
    //    add_filter('render_block', 'modify_first_block_attributes', 1001, 2);

    # Remove img auto css
    add_filter('wp_img_tag_add_auto_sizes', '__return_false');

    # Remove speculation rules
    add_filter( 'wp_speculation_rules_configuration', '__return_null' );