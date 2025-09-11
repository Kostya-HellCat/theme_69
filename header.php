<?php
    $header_logo = get_field('header_logo', 'options');
?>

<!DOCTYPE html>
<html <?= get_language_attributes() ?>>
<head>
    <?php get_template_part('inc/head') ?>
    <?php if (get_field('header_code', 'options')) {
        echo get_field('header_code', 'options');
    } ?>
    <?php if (get_field('markup_field', $post->ID)) {
        echo get_field('markup_field', $post->ID);
    } ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php if (get_field('body_code', 'options')) {
    echo get_field('body_code', 'options');
} ?>

<header class="header js-header">
    <?php if ( !empty($header_logo) ): ?>
        <?php if ( is_front_page() ): ?>
            <div class="header__logo"><?= get_image($header_logo, true) ?></div>
        <?php else: ?>
            <a class="header__logo" href="<?= home_url() ?>"><?= get_image($header_logo, true) ?></a>
        <?php endif; ?>
    <?php endif; ?>

    <?php get_template_part('inc/navigation/header-nav') ?>
    <?php get_template_part('inc/navigation/lang-switcher') ?>

    <?php if (has_nav_menu('header-menu')): ?>
        <div class="header__burger js-burger"></div>
    <?php endif; ?>
</header>
