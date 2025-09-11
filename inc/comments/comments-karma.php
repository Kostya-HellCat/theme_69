<?php if ( false ): ?>
    <div class="comment__karma" data-comment-id="<?= $comment->comment_ID ?>">
        <button type="button" class="karma__control decrease">-</button>
        <span class="value"><?= $comment->comment_karma ?></span>
        <button type="button" class="karma__control increase">+</button>
    </div>
<?php endif; ?>
