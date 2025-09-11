<?php
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $is_enabled_webp = false;
    if ( is_plugin_active( 'webp-express/webp-express.php' ) ) {
        $is_enabled_webp = true;
    }

    function get_image_url( $url, $disable_webp = false ): string {
        global $is_enabled_webp;

        if ( ! $is_enabled_webp || $disable_webp || $url['extension'] === 'gif' || $url['extension'] === 'svg') {
            return "{$url['dirname']}/{$url['filename']}.{$url['extension']}";
        } else {
            return "{$url['dirname']}/{$url['filename']}.webp";
        }
    }

    function get_image( $id, $disable_lazy = false, $raw = true, $raw_schema = false ): string
    {
        if (empty($id)) return false;

        /* Для админки */
        if (is_admin()) {
            if ($raw) return wp_get_attachment_image($id, 'full');
            else return "<div class='get-image'>" . wp_get_attachment_image($id, 'full') . "</div>";
        }

        $img = wp_get_attachment_image_src($id, 'full');
        if (!$img) return false;

        $full_size_url = wp_get_attachment_image_url($id, 'full');
        $full_size_image_url = get_image_url(pathinfo($full_size_url));

        /* Для SVG формата */
        if (pathinfo($full_size_url)['extension'] === 'svg') {
            $domain = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

            if ($domain) {
                $svg = file_get_contents(ABSPATH . str_replace($domain, '', $full_size_url));
            }

            return $svg ?? '';
        }

        if ( !$disable_lazy ) $image_str = wp_get_attachment_image($id, 'full', false, ['loading' => 'lazy', 'decoding' => 'async']);
        else $image_str = wp_get_attachment_image($id, 'full', false, ['loading' => 'eager', 'decoding' => 'sync']);

        $alt = !empty(get_post_meta($id, '_wp_attachment_image_alt', TRUE)) ? get_post_meta($id, '_wp_attachment_image_alt', TRUE) : "";
        $alt = str_replace('"', '\'', $alt);

        $schema = $raw_schema ? '' : <<<HTML
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ImageObject",
        "contentUrl": "{$full_size_image_url}",
        "description": "{$alt}",
        "width": "$img[1]",
        "height": "$img[2]"
    }
</script>
HTML;

        if ($raw) return $schema . $image_str;
        else return "<div class='get-image'>$schema$image_str</div>";
    }
