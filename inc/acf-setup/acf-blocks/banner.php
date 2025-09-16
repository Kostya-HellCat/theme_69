<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $title = get_field('title') ?: 'Winning now';
    $title_tag = get_field('title_tag') ?: 'p';

    $text = get_field('text');
    $button = get_field('button');
    $image = get_field('image');
?>

<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Банер</div>
        <div class="preview-block__content">
		    <?php endif; ?>

                <div<?= $anchor_tag ?> class="banner">
                    <div class="banner__content">
                        <?php if ( !empty($title) ): ?>
                            <<?= $title_tag ?>><?= $title ?></<?= $title_tag ?>>
                        <?php endif; ?>
                        <?= $text ?>
                        <?php if ( !empty($button) ): ?>
                            <button class="btn sf-link btn--primary" data-sf-a="<?= $button['url'] ?>"><?= $button['title'] ?></button>
                        <?php endif; ?>
                    </div>
                    <?= get_image($image) ?>
                </div>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>