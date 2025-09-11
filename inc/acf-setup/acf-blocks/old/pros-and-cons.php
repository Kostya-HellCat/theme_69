<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $pros_title = get_field('pros_title') ?: 'Pros';
    $cons_title = get_field('cons_title') ?: 'Cons';

    $titles_tag = get_field('titles_tag');

    $pros = get_field('pros');
    $cons = get_field('cons');
?>
<?php if ( $is_preview ): ?>
    <div class="preview-block">
        <div class="preview-block__title">Плюсы и минусы</div>
        <div class="preview-block__content">
        <?php endif; ?>

            <div class="pros-cons">
                <?php if ( !empty($pros) ): ?>
                    <div class="pros-cons__item pros-cons__item--pros">
                        <<?= $titles_tag ?> class="pros-cons__title"><?= $pros_title ?></<?= $titles_tag ?>>
                        <ul class="pros-cons__list">
                            <?php foreach ( $pros as $pro ): ?>
                                <li><?= $pro['pro'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if ( !empty( $cons ) ): ?>
                    <div class="pros-cons__item pros-cons__item--cons">
                        <<?= $titles_tag ?> class="pros-cons__title"><?= $cons_title ?></<?= $titles_tag ?>>
                        <ul class="pros-cons__list">
                            <?php foreach ( $cons as $con ): ?>
                                <li><?= $con['con'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

        <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>