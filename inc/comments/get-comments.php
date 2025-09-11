<?php
global $lang_content;

$args          = [
	'hierarchical' => 'threaded',
	'orderby'      => 'comment_date'
];
$comments_list = get_comments( $args );

if ( $comments_list ): ?>
    <div class="comments__list">
        <?php foreach ( $comments_list as $comment ): ?>
            <?php
                $comment_this_post = $comment->comment_post_ID == $post->ID;
                if ( !$comment->comment_approved || !$comment_this_post ) continue;
            ?>
            <article id="comment-<?= $comment->comment_ID ?>" class="comment-item" itemscope itemtype="http://schema.org/Comment">
                <div class="comment-item__header" itemprop="author" itemtype="https://schema.org/Person" itemscope>
                    <p class="comment-item__nickname" itemprop="name"><?= $comment->comment_author ?></p>
                    <?php if ($comment->comment_karma) : ?>
                        <div class="rate-block">
                            <span class="comment-item__rate-title rate-block__title"><?= $lang_content['comment_rate'] ?>:</span>
                            <?php for ( $i=1; $i<=5; $i++ ) : ?>
                                <div class="comment-item__star rate-block__star _<?= $i <= $comment->comment_karma ? 'fill' : 'empty' ?>"></div>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="comment-item__text" itemprop="text"><?= $comment->comment_content ?></p>
                <span class="comment-item__date">
                    <?php
                        $date = new DateTime($comment->comment_date );
                        $date_to_print = $date->format('d.m.Y');
                    ?>
                    <time datetime="<?= $comment->comment_date ?>" itemprop="datePublished"><?= $date_to_print ?></time>
                </span>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
