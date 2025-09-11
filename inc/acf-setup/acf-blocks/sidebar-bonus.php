<?php
    $image = get_field('image');
    $name = get_field('name');
    $rating = get_field('rating');
    $text = get_field('text');
    $button = get_field('bonus');
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Sidebar bonus</div>
    <div class="preview-block__content">
        <?php endif; ?>
            <div class="sidebar-bonus">
                <?= get_image($image) ?>
                <?php if ( !empty($name) ): ?>
                    <p class="sidebar-bonus__title"><?= $name ?><span class="sidebar-bonus__rating" style="--rating: <?= $rating ?>;"><?= $rating ?></span></p>
                <?php endif; ?>
                <?php if ( !empty($text)): ?>
                    <p class="sidebar-bonus__bonus"><?= $text ?></p>
                <?php endif; ?>
                <?php if ( !empty($button) ): ?>
                    <button class="btn sf-link btn--primary" data-sf-a="<?= $button['url'] ?>"><?= $button['title'] ?></button>
                <?php endif; ?>
            </div>
        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
