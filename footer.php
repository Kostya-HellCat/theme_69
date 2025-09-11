<?php
    $footer_logo = get_field('footer_logo', 'options');
    $copyright = get_field('under_footer_text', 'options');
    $footer_text = get_field('footer_text', 'options');
    $footer_images = get_field('footer_images', 'options');

    $enable_relink_block = get_field('enable_relink_block', 'options');
    $relink_items = $enable_relink_block ? get_field('relink_sites', 'options') : false;

    if (empty($relink_items) && !empty($enable_relink_block) && function_exists('icl_get_default_language')) {
        $relink_items = get_global_option('relink_sites');
    }

    $mobile_button = get_field('mobile_button');
    $socials = get_field('socials', 'options');

?>

<div class="go-up js-go-up">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="m18 19-6-6-6 6m12-8-6-6-6 6" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/>
    </svg>
</div>

<footer class="footer wrapper">
    <?php wp_footer() ?>

        <div class="footer__row">
            <?php if (!empty($footer_logo)): ?>
                <?php if ( is_front_page() ): ?>
                    <div class="footer__logo">
                        <?= get_image( $footer_logo ) ?>
                    </div>
                <?php else: ?>
                    <a class="footer__logo" href="<?= home_url() ?>">
                        <?= get_image( $footer_logo ) ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <img src="<?= get_template_directory_uri() ?>/build/images/18+.webp" width="38" height="39" alt="18+">
        </div>

        <?php get_template_part('inc/navigation/footer-nav') ?>

        <?php if ( !empty( $socials ) ): ?>
            <?php
                $socials_text = get_field('socials_text', 'options');
            ?>
            <div class="footer__soc">
                <?= $socials_text ?>
                <ul class="footer__soc-list">
                    <?php foreach ( $socials as $social ): ?>
                        <li class="footer__soc-item">
                            <a class="footer__soc-link" href="<?= $social['url'] ?>" aria-label="<?= $social['name'] ?>">
                                <?= get_image($social['image']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

    <?php if ( !empty($footer_text) ): ?>
        <div class="footer__info">
            <?= $footer_text ?>
        </div>
    <?php endif; ?>

    <?php if ( !empty( $footer_images ) ): ?>
        <ul class="footer__logos">
            <?php foreach ( $footer_images as $img ): ?>
                <li><?= get_image($img) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ( !empty( $copyright) ): ?>
        <p class="footer__copyright"><?= $copyright ?></p>
    <?php endif; ?>
</footer>

<div class="modal js-modal">
    <div class="modal__content js-modal__content">
        <p class="modal__title"></p>
        <button class="modal__close js-modal__close" type="button" aria-label="Mobile button"></button>
        <div class="modal__body"></div>
    </div>
</div>

<?php if ( !empty( $mobile_button['button'] ) ): ?>
    <aside class="mob-btn">
        <?= get_image($mobile_button['image']) ?>
        <p class="mob-btn__text"><?= $mobile_button['title'] ?><span class="mob-btn__rating" style="--rating: <?= $mobile_button['rating'] ?>;"><?= $mobile_button['rating'] ?></span></p>
        <button class="btn sf-link btn--tertiary" data-sf-a="<?= $mobile_button['button']['url'] ?>"><?= $mobile_button['button']['title'] ?></button>
    </aside>
<?php endif; ?>


</body>
</html>
