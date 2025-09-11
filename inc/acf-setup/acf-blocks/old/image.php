<?php
    $image = get_field('image');
    $disable_lazy = get_field('disable_lazy') ?: false;
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Картинка</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <?= get_image( $image, $disable_lazy ) ?>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
