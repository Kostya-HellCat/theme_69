<?
function get_child_comments( $comment_children ) { ?>
    <div class="comment__child">
		<?php foreach ( $comment_children as $comment ): ?>
            <article class="comment" itemscope itemtype="http://schema.org/Comment">
                <h3 class="comment__author"><?= $comment->comment_author ?></h3>
                <span class="comment__date">
                <time datetime="<?= $comment->comment_date ?>"><?= $comment->comment_date ?></time>
            </span>
				<?php include "comments-karma.php"; ?>
                <p class="comment__content"
                   itemprop="description"><?= $comment->comment_content ?></p>
                <button type="button" class="comment__reply"
                        data-parent-id="<?= $comment->comment_ID ?>">
                    Ответить
                </button>
            </article>
			<?
			if ( $comment->get_children() ) {
				get_child_comments( $comment->get_children() );
			}
		endforeach; ?>
    </div>
<?php }

