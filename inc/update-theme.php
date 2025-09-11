<?php

    # Check for updates
//    add_action('admin_notices', function() {
//        if (!isset($_GET['page']) && get_current_screen()->base !== 'themes') return;
//
//        $theme = wp_get_theme();
//        $current_version = $theme->get('Version');
//        $config_url = 'https://dev116.sitereposit.net/theme-update.json';
//
//        $response = wp_remote_get($config_url, [
//            'timeout' => 5,
//            'headers' => [
//                'Authorization' => 'Basic ' . base64_encode('test:test')
//            ]
//        ]);
//
//        if (is_wp_error($response)) {
//            add_action('admin_notices', function() {
//                echo '<div class="notice notice-warning is-dismissible"><p>Не удалось получить информацию об актуальной версии темы.</p></div>';
//            });
//            return;
//        };
//
//        $config = json_decode(wp_remote_retrieve_body($response));
//
//        if (!$config || empty($config->version) || version_compare($current_version, $config->version, '>=')) return;
//
//        echo '<div class="notice notice-warning"><p>Доступна новая версия темы. (<b>' . $config->version . '</b>) <a href="#" id="custom-theme-update">Обновить</a></p></div>';
//        echo '<script>document.getElementById("custom-theme-update").addEventListener("click", e => {
//            e.preventDefault();
//            fetch("admin-ajax.php?action=custom_theme_update").then(() => location.reload());
//        });</script>';
//    });
//
//    add_action('wp_ajax_custom_theme_update', function() {
//        update_theme("https://dev111.sitereposit.net/theme-update.zip");
//        wp_die();
//    });
//
//
//    # Update theme
//    function update_theme( $package_url ) {
//
//        $theme_slug = get_template();
//
//        $args = array(
//            'headers' => array(
//                'Authorization' => 'Basic ' . base64_encode("test:test"),
//            ),
//        );
//        $response = wp_remote_get($package_url, $args);
//
//        if ( is_wp_error($response) || $response['response']['code'] !== 200 ) {
//            add_action('admin_notices', function() {
//                echo '<div class="notice notice-error is-dismissible"><p>Ошибка. Не удалось получить файл для обновления темы.</p></div>';
//            });
//            return;
//        }
//
//        $body = wp_remote_retrieve_body($response);
//
//        $temp_file = tempnam(sys_get_temp_dir(), 'theme_update_');
//        file_put_contents($temp_file, $body);
//
//        if ( mime_content_type($temp_file) !== 'application/zip' ) {
//            add_action('admin_notices', function() {
//                echo '<div class="notice notice-error is-dismissible"><p>Файл темы не соответствует формату.</p></div>';
//            });
//            return;
//        }
//
//        # Backup
//        $theme_dir = WP_CONTENT_DIR . '/themes/' . $theme_slug;
//        $backup_dir = WP_CONTENT_DIR . '/themes/' . $theme_slug . '_backup';
//
//        if ( is_dir($backup_dir) ) {
//            shell_exec("rm -rf " . escapeshellarg($backup_dir));
//        }
//
//        if ( is_dir($theme_dir) ) {
//            rename($theme_dir, $backup_dir);
//        }
//
//        $result = unzip_file($temp_file, $theme_dir);
//
//        if ( is_wp_error($result) ) {
//            add_action('admin_notices', function() {
//                echo '<div class="notice notice-error is-dismissible"><p>Не удалось разархивирвировать файл с темой.</p></div>';
//            });
//            return;
//        }
//
//        # Save uniq.css
//        $css_file = $theme_dir . '/build/css/uniq.css';
//        $old_css_file = $backup_dir . '/build/css/uniq.css';
//
//        if ( file_exists($old_css_file) ) copy( $old_css_file, $css_file );
//
//        @unlink($temp_file);
//        switch_theme($theme_slug);
//
//        add_action('admin_notices', function() {
//            echo '<div class="notice notice-success is-dismissible"><p>Тема успешно обновлена и активирована</p></div>';
//        });
//    }