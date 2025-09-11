<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";
    
    $preview = get_field('preview');
    $preview_attr = !empty($preview) ? ' style="background-image: url(' . $preview['url'] .');"' : '';

    $demo_btn = get_field('embed');
    $button = get_field('redirect_link');
    $title = get_field('title');
?>


<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Демо игра</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <div<?= $anchor_tag ?> class="section-hero__demo"<?= $preview_attr ?>>
                <div class="section-hero__btns">
                    <?php if ( !empty($button) ): ?>
                        <button class="btn sf-link btn--primary js-modal__btn" data-sf-a="<?= $button['url'] ?>"><?= $button['title'] ?></button>
                    <?php endif; ?>
                    <?php if ( !empty($demo_btn) ): ?>
                        <button class="btn btn--secondary js-modal__open" data-modal-title="Sugar Rush Demo" data-modal-url="<?= $demo_btn['url'] ?>"><?= $demo_btn['title'] ?></button>
                    <?php endif; ?>
                </div>
            </div>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>