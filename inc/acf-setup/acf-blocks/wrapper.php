<?php
    $tag_wrapper = get_field( 'wrapper_tag' ) ?: 'section';
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $is_h1 = get_field('is_h1') ?: false;
    $classes = $is_h1 ? ' section-hero' : '';
?>
<?php if ( $is_preview ): ?>
    <div class="preview-block">
        <div class="preview-block__title">Wrapper</div>
        <div class="preview-block__content">
            <?php endif; ?>

                <<?= $tag_wrapper ?><?= $anchor_tag ?> class="wrapper<?= $classes?>">
                    <?php if ( $is_h1 ): ?>
                        <?php
                            $rating = get_field('rating');
                            $title = get_field('title');
                        ?>
                        <?php if ( !empty( $title ) ): ?>
                            <h1><?= $title ?></h1>
                        <?php endif; ?>
                        <?php if ( !empty( $rating ) ): ?>
                            <span class="section-hero__rating" style="--rating: <?= $rating ?>;"><?= $rating ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                    <InnerBlocks/>
                </<?= $tag_wrapper ?>>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>
