<?php
    $image = get_field('image');
    $title = get_field('title');
    $rating_text = get_field('rating_text');
    $rating = get_field('rating');
    $bonus_text = get_field('bonus-text');
    $bonus_text2 = get_field('bonus-text2');
    $button = get_field('button');
    $table = get_field('table');
?>


<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Информация о слоте</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <div class="section-hero__info">
                <?= get_image( $image ) ?>
                <?php if ( !empty( $title ) ): ?>
                    <p class="section-hero__info-title"><?= $title ?></p>
                <?php endif; ?>
                <p class="section-hero__info-rating"><?= $rating_text ?? 'Casino Raiting:' ?><span style="--rating: <?= $rating ?>"><?= $rating ?> / 5</span></p>
                <div class="section-hero__bonus">
                    <?php if ( !empty( $bonus_text ) ): ?>
                        <p class="section-hero__bonus-type"><?= $bonus_text ?></p>
                    <?php endif; ?>
                    <?php if ( !empty( $bonus_text2 ) ): ?>
                        <p class="section-hero__bonus-text"><?= $bonus_text2 ?></p>
                    <?php endif; ?>
                    <?php if ( !empty($button) ): ?>
                        <button class="btn sf-link btn--tertiary btn--m js-modal__btn" data-sf-a="<?= $button['url'] ?>">
                            <?= $button['title'] ?>
                        </button>
                    <?php endif; ?>
                </div>
                <?php if ( !empty($table) ): ?>
                    <table class="section-hero__table">
                        <tbody class="section-hero__table-body">
                            <?php foreach ( $table as $tr ): ?>
                                <tr class="section-hero__table-row">
                                    <td class="section-hero__table-title"><?= $tr['td1'] ?></td>
                                    <td class="section-hero__table-text"><?= $tr['td2'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>