<?php

global $lang_content;

$post_id = get_the_ID();
$lang = get_field('settings_lang','options') ?: 'en';

$site_url           = get_site_url();
$main_breadcrumb    = !empty(get_field('main_breadcrumb', 'options')) ? get_field('main_breadcrumb', 'options') : $lang_content['default_home_breadcrumbs'];

$queried_object        = get_queried_object();
$last_breadcrumb_title = get_field('breadcrumbs_title') ? get_field('breadcrumbs_title') : $queried_object->post_title;

$breadcrumbs_array = [
    [
        'item_title' => $main_breadcrumb,
        'item_url'   => $site_url . '/'
    ]
];

$itemList = [
    [
        "@type"    => "ListItem",
        "position" => 1,
        "name"     => $main_breadcrumb,
        "item"     => $site_url . '/'
    ]
];

$enable_template = false;

if (is_front_page()) {
    $enable_template = false;
} elseif (is_singular('post')) {
    $categories    = get_the_category();
    $category_list = '';
    if ($categories) {
        foreach ($categories as $k => $category) {
            array_push(
                $breadcrumbs_array,
                [
                    'item_title' => $category->cat_name,
                    'item_url'   => get_category_link($category->term_id)
                ]
            );
            array_push(
                $itemList,
                [
                    "@type"    => "ListItem",
                    "position" => 2,
                    "name"     => $category->cat_name,
                    "item"     => get_category_link($category->term_id)
                ]
            );
        }
    }
    array_push(
        $breadcrumbs_array,
        [
            'item_title' => $last_breadcrumb_title,
        ]
    );
    array_push(
        $itemList,
        [
            "@type"    => "ListItem",
            "position" => 3,
            "name"     => $last_breadcrumb_title,
            "item"     => get_permalink()
        ]
    );

    $enable_template = true;
} elseif (is_singular('page')) {
    $parent_id = $post->post_parent;
    $k         = 2;

    if ($parent_id) {
        $page = get_post($parent_id);
        if ($page->post_parent) {
            $parent_parent_id = $page->post_parent;
            $child_page       = get_post($parent_parent_id);
            $the_title        = (get_field("breadcrumbs_title", $child_page->ID)) ? get_field("breadcrumbs_title", $child_page->ID) : get_the_title($child_page->ID);
            array_push(
                $breadcrumbs_array,
                [
                    'item_title' => $the_title,
                    'item_url'   => get_permalink($child_page->ID)
                ]
            );
            array_push(
                $itemList,
                [
                    "@type"    => "ListItem",
                    "position" => $k,
                    "name"     => $the_title,
                    "item"     => get_permalink($child_page->ID)
                ]
            );
            $k++;
        }
        $the_title = (get_field("breadcrumbs_title", $page->ID)) ? get_field("breadcrumbs_title", $page->ID) : get_the_title($page->ID);
        array_push(
            $breadcrumbs_array,
            [
                'item_title' => $the_title,
                'item_url'   => get_permalink($page->ID)
            ]
        );
        array_push(
            $itemList,
            [
                "@type"    => "ListItem",
                "position" => $k,
                "name"     => $the_title,
                "item"     => get_permalink($page->ID)
            ]
        );
        $k++;
    }

    array_push(
        $breadcrumbs_array,
        [
            'item_title' => $last_breadcrumb_title,
        ]
    );
    array_push(
        $itemList,
        [
            "@type"    => "ListItem",
            "position" => $k,
            "name"     => $last_breadcrumb_title,
            "item"     => get_permalink()
        ]
    );

    $enable_template = true;
} elseif (is_author()) {
    $author_name = $queried_object->display_name;
    $author_slug = $queried_object->user_nicename;

    array_push(
        $breadcrumbs_array,
        [
            'item_title' => $author_name,
            'item_url'   => $site_url . '/' . $author_slug . '/'
        ]
    );
    array_push(
        $itemList,
        [
            "@type"    => "ListItem",
            "position" => 2,
            "name"     => $author_name,
            "item"     => $site_url . '/' . $author_slug . '/'
        ]
    );
    $enable_template = true;
} elseif (is_archive()) {
    $category_title = get_the_archive_title();
    $category_id    = get_cat_ID($category_title);

    array_push(
        $breadcrumbs_array,
        [
            'item_title' => $category_title
        ]
    );
    array_push(
        $itemList,
        [
            "@type"    => "ListItem",
            "position" => 2,
            "name"     => $category_title,
            "item"     => get_category_link($category_id)
        ]
    );
    $enable_template = true;
} elseif (is_404()) {
    $category_title = $lang_content['page_404_bread_crumb'];

    array_push(
        $breadcrumbs_array,
        [
            'item_title' => $category_title
        ]
    );
    array_push(
        $itemList,
        [
            "@type"    => "ListItem",
            "position" => 2,
            "name"     => $category_title,
            "item"     => get_site_url() . '/404'
        ]
    );
    $enable_template = true;
}

$breadcrumbList = [
    "@context"        => "http://schema.org",
    "@type"           => "BreadcrumbList",
    "itemListElement" => $itemList
];

if ($enable_template && !empty(get_field('enable_breadcrumbs', 'options'))) : ?>
    <?php if ($breadcrumbs_array) :
        $last_crumb = array_pop($breadcrumbs_array); ?>
        <nav class="breadcrumbs">
            <ul class="breadcrumbs__list container">
                <?php foreach ($breadcrumbs_array as $key => $crumb) : ?>
                    <li class="breadcrumbs__item">
                        <a href="<?= $key === 0 ? home_url() : $crumb['item_url'] ?>" class="breadcrumbs__link">
                            <?= $crumb['item_title'] ?>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 10L16 10" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13 13.3333L16.3333 10" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13 6.66669L16.3333 10" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__link breadcrumbs__link--no-active"><?= $last_crumb['item_title']; ?></span>
                </li>
            </ul>

            <?php
            if ($breadcrumbList) {
                echo '<script type="application/ld+json">' . json_encode($breadcrumbList, JSON_UNESCAPED_UNICODE) . '</script>';
            }
            ?>
        </nav>
    <?php endif; ?>
<?php endif; ?>