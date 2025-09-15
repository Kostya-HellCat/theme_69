<?php

function my_acf_admin_head() { ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/build/css/main.min.css' ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        .preview-block {
            border: 1px solid #a4a4a4;
            background: #cecece;
            padding: 5px;
        }

        .preview-block__title {
            font-size: 14px;
            background: #aaa;
            color: #000;
            padding: 5px;
        }

        .preview-block__content {
            margin-top: 5px;
            border: 1px solid #a4a4a4;
            padding: 5px;
        }

        .wp-block {
            max-width: 100%;
        }

        .wp-block-columns {
            display: flex;
            align-items: stretch;
            padding: 0 !important;
        }

        .wp-block-post-title,
        .block-editor-default-block-appender__content,
        .components-radio-control,
        .block-editor-rich-text__editable.rich-text{
            color: #000;
        }

        .acf-block-panel .acf-field {
            width: 100%!important;
        }

        html :where(.editor-styles-wrapper) {
            color: var(--text-color, #DFE6F7)
        }

        html :where(.wp-block)[data-align="left"] > *,
        html :where(.wp-block)[data-align="right"] > *{
            float: none;
            margin: unset;
        }

        html :where(.wp-block)[data-align="left"],
        html :where(.wp-block)[data-align="right"] {
            height: auto;
        }

        [data-type="acf/tab-item"] > .acf-block-body > div > .acf-block-fields {
            min-height: 20px;
        }

        .tabs__item.visually-hidden {
            position: static!important;
            opacity: 1;
        }
    </style>
	<?php
}

add_action( 'current_screen', 'styles_for_editor' );
function styles_for_editor() {
	$screen = get_current_screen();

	if ( $screen->post_type === 'page' && $screen->is_block_editor ) {
		add_action( 'acf/input/admin_head', 'my_acf_admin_head' );
	}elseif( $screen->post_type === 'post' && $screen->is_block_editor ){
        add_action( 'acf/input/admin_head', 'my_acf_admin_head' );
    }
}

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( [
		'page_title' => 'Настройки Сайта',
		'menu_title' => 'Настройки Сайта',
		'menu_slug'  => 'site-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	] );
}

add_action( 'acf/init', function () {

	acf_register_block_type( [
		'name'            => 'Wrapper',
		'title'           => 'Wrapper',
		'description'     => 'Wrapper',
		'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/wrapper.php',
		'category'        => 'container-blocks',
		'icon'            => 'carrot',
		'mode'            => 'preview',
		'supports'        => [
			'jsx'   => true
		]
	] );

    acf_register_block_type( [
        'name'            => 'text-image',
        'title'           => 'Text Image',
        'description'     => 'Блок с текстом и картинкой',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/text-image.php',
        'category'        => 'container-blocks',
        'icon'            => 'carrot',
        'mode'            => 'preview',
        'supports'        => [
            'jsx'   => true
        ]
    ] );

    acf_register_block_type( [
        'name'            => 'Sidebar',
        'title'           => 'Sidebar',
        'description'     => 'Sidebar',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/sidebar.php',
        'category'        => 'container-blocks',
        'icon'            => 'carrot',
        'mode'            => 'preview',
        'supports'        => [
            'jsx'   => true
        ]
    ] );

    acf_register_block_type( [
        'name'            => 'Sidebar_info',
        'title'           => 'Sidebar info',
        'description'     => 'Блок для сайдбара с информацией',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/sidebar-info.php',
        'category'        => 'container-blocks',
        'icon'            => 'carrot',
        'mode'            => 'preview'
    ] );

    acf_register_block_type( [
        'name'            => 'Sidebar_bonus',
        'title'           => 'Sidebar bonus',
        'description'     => 'Блок для сайдбара с бонусом',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/sidebar-bonus.php',
        'category'        => 'container-blocks',
        'icon'            => 'carrot',
        'mode'            => 'preview'
    ] );

    acf_register_block_type( [
        'name' => 'toc',
        'title' => 'TOC',
        'description' => 'Table of content',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/toc.php',
        'category' => 'hand-made-blocks',
        'icon' => 'carrot',
        'mode' => 'edit'
    ] );

    acf_register_block_type( [
        'name' => 'winners',
        'title' => 'Top Winners',
        'description' => 'Вывод победителей',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/winners.php',
        'category' => 'hand-made-blocks',
        'icon' => 'carrot',
        'mode' => 'edit'
    ] );

    acf_register_block_type( [
        'name' => 'bonuses',
        'title' => 'Бонусы',
        'description' => 'Вывод списка бонусов',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/bonuses.php',
        'category' => 'hand-made-blocks',
        'icon' => 'carrot',
        'mode' => 'edit'
    ] );

    acf_register_block_type( [
        'name' => 'button',
        'title' => 'Кнопка',
        'description' => 'Пользовательская кнопка',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/button.php',
        'category' => 'hand-made-blocks',
        'icon' => 'carrot',
        'mode' => 'edit'
    ] );
//
//    acf_register_block_type( [
//        'name' => 'table',
//        'title' => 'Кастомная таблица',
//        'description' => 'Различные вариации вывода таблицы',
//        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/table.php',
//        'category' => 'hand-made-blocks',
//        'icon' => 'carrot',
//        'mode' => 'edit'
//    ] );
//
//    acf_register_block_type( [
//        'name'            => 'image',
//        'title'           => 'Картинка',
//        'description'     => 'Пользовательская картинка с разметкой и опциями',
//        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/image.php',
//        'category'        => 'hand-made-blocks',
//        'icon'            => 'carrot',
//        'mode'            => 'edit'
//    ] );
//
    acf_register_block_type( [
        'name'            => 'listing',
        'title'           => 'Листинг',
        'description'     => 'Листинг',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/listing.php',
        'category'        => 'hand-made-blocks',
        'icon'            => 'carrot',
        'mode'            => 'edit'
    ] );

    acf_register_block_type( [
        'name'            => 'screenshots',
        'title'           => 'Screenshots',
        'description'     => 'Блок со скриншотами',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/screenshots.php',
        'category'        => 'container-blocks',
        'icon'            => 'carrot',
        'mode'            => 'edit',
        'enqueue_assets'  => function () {
            wp_enqueue_style('screenshot_gallery_styles', get_template_directory_uri() . '/inc/libs/glightbox.min.css');
            wp_enqueue_script('screenshot_gallery_scripts', get_template_directory_uri() . '/inc/libs/glightbox.min.js', false, null, false);
            wp_enqueue_script('init_screenshot_gallery', get_template_directory_uri() .'/build/js/gallery.js', [], null, false);
        },

    ] );

    acf_register_block_type( [
        'name'            => 'game',
        'title'           => 'Демка (игра)',
        'description'     => 'Демо игра',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/game.php',
        'category'        => 'text-blocks',
        'icon'            => 'carrot',
        'mode'            => 'edit'
    ] );
//
//    acf_register_block_type( [
//        'name' => 'slot-info',
//        'title' => 'Информация о слоте',
//        'description' => 'Информация о слоте',
//        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/slot-info.php',
//        'category' => 'hand-made-blocks',
//        'icon' => 'carrot',
//        'mode' => 'edit'
//    ] );
//
    acf_register_block_type( [
        'name' => 'slots',
        'title' => 'Слоты',
        'description' => 'Популярные слоты',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/slots.php',
        'category' => 'hand-made-blocks',
        'icon' => 'carrot',
        'mode' => 'edit'
    ] );
//
//    acf_register_block_type( [
//        'name'            => 'faq',
//        'title'           => 'FAQ',
//        'description'     => 'FAQ',
//        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/faq.php',
//        'category'        => 'text-blocks',
//        'icon'            => 'carrot',
//        'mode'            => 'edit'
//    ] );


	acf_register_block_type( [
		'name'            => 'how-to',
		'title'           => 'How to',
		'description'     => 'How to',
		'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/how-to.php',
		'category'        => 'text-blocks',
		'icon'            => 'carrot',
		'mode'            => 'edit'
	] );

    acf_register_block_type( [
        'name' => 'author',
        'title' => 'Вывод автора',
        'description' => 'Вывод автора',
        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/author.php',
        'category' => 'hand-made-blocks',
        'icon' => 'carrot',
        'mode' => 'edit'
    ] );
//
//
//    acf_register_block_type( [
//        'name'            => 'pros-and-cons',
//        'title'           => 'Плюсы и минусы',
//        'description'     => 'Плюсы и минусы',
//        'render_template' => get_template_directory() . '/inc/acf-setup/acf-blocks/pros-and-cons.php',
//        'category'        => 'text-blocks',
//        'icon'            => 'carrot',
//        'mode'            => 'edit'
//    ] );


} );
