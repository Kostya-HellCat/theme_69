<?php
    global $lang_content;

    $style = get_field('style') ?: 'h1';

    $author_fields      = get_field( 'choose_author' );
    $author_id          = "user_{$author_fields}";

    $first_name = get_the_author_meta('first_name', $author_fields) ?? '';
    $last_name  = get_the_author_meta('last_name', $author_fields) ?? '';
    $author_avatar      = get_field( 'author_avatar', $author_id );
    $author_position = get_field( 'position', $author_id );
    $author_position_text = !empty($author_position) ? ' (' . $author_position . ')' : '';

    $date = get_the_modified_time('Y-m-d');

    $day  = get_the_modified_time('j');
    $year = get_the_modified_time('Y');
    $monthNum = (int) get_the_modified_time('n') - 1;

?>
<?php if ( $is_preview ): ?>
    <div class="preview-block">
        <div class="preview-block__title">Инфо об авторе</div>
        <div class="preview-block__content">
<?php endif; ?>

    <?php
        switch ( $style ){
            case 'h1':
                ?>
                <div class="author-row">
                    <?= get_image( $author_avatar ) ?>
                    <p class="author-row__name"><?= $first_name ?> <?= $last_name ?></p>
                    <p class="author-row__position">(<?= $author_position_text ?>)</p>
                    <time class="author-row__time" datetime="<?= $date ?>"><span><?= $lang_content['last_update'] ?? 'Last Updated' ?>:</span><?= $lang_content['month_list'][$monthNum] ?> <?= $day ?>, <?= $year ?></time>
                </div>
                <?php
                break;
            case 'page':
                $rating = get_field('rating');
                $text = get_field('text');
                ?>
                    <blockquote class="author-block">
                        <?= get_image( $author_avatar ) ?>
                        <p class="author-block__name"><?= $first_name ?> <?= $last_name ?></p><span class="author-block__role"><?= $author_position_text ?></span>
                        <span class="author-block__rate" style="--rating: <?= $rating ?>;"><?= $rating ?></span>
                        <?php if ( !empty( $text ) ): ?>
                            <p class="author-block__text"><?= $text ?></p>
                        <?php endif; ?>
                    </blockquote>
                <?php
                break;
        }
    ?>

<?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>