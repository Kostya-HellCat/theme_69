<?php
    $button = get_field('button');
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Кнопка</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <?php if ( !empty($button) ): ?>
                <button class="btn sf-link btn--primary" data-sf-a="<?= $button['url'] ?>"><?= $button['title'] ?></button>
            <?php endif; ?>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
