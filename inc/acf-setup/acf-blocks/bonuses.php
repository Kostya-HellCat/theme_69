<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $bonuses = get_field('bonuses');
    $title = get_field('title');
    $text = get_field('text');
    $button = get_field('button');
?>
<?php if ( $is_preview ): ?>
    <div class="preview-block">
        <div class="preview-block__title">Бонусы</div>
        <div class="preview-block__content">
            <?php endif; ?>

                <?php if ( !empty($bonuses) ): ?>
                    <ul<?= $anchor_tag ?> class="grid-block">
                        <?php foreach ( $bonuses as $bonus ): ?>
                            <li class="bonus-card">
                                <?= get_image($bonus['image']) ?>
                                <span class="bonus-card__rating" style="--rating: <?= $bonus['rating'] ?>;"><?= $bonus['rating'] ?></span>
                                <?php if ( !empty($bonus['title'] ) ): ?>
                                    <p class="bonus-card__provider"><?= $bonus['title'] ?></p>
                                <?php endif; ?>
                                <?php if ( !empty($bonus['text'] ) ): ?>
                                    <p class="bonus-card__bonus"><?= $bonus['text'] ?></p>
                                <?php endif; ?>
                                <?php if ( !empty( $bonus['button'] ) ): ?>
                                    <button class="btn sf-link btn--primary" data-sf-a="<?= $bonus['button']['url'] ?>"><?= $bonus['button']['title'] ?></button>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>
