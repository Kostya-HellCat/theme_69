<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $image = get_field('image');
    $disable_lazy = get_field('disable_lazy') ?: false;
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Text image</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <div<?= $anchor_tag ?> class="content-img">
                <?= get_image($image, $disable_lazy) ?>
                <div class="content-img__content">
                    <InnerBlocks/>
                </div>
            </div>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
