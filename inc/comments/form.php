<?php global $lang_content;?>

<div class="comment-add-field site-section">
    <div class="comment-add-field__header site-section__header">
        <h2><?= $lang_content['comments_title']; ?></h2>
    </div>
    <div class="comment-add-field__body site-section__body">
        <form class="comment-add-field__form comment-add-form">
            <div class="comment-add-form__header">
                <input class="comment-add-form__name comment-input" name="name" type="text" placeholder="<?= $lang_content['comment_input_name'] ?>">
                <div class="comment-add-form__rate-block rate-block">
                    <span class="rate-block__title"><?= $lang_content['comments_rate'] ?>:</span>
                    <span class="comment-add-form__star rate-block__star _empty"></span>
                    <span class="comment-add-form__star rate-block__star _empty"></span>
                    <span class="comment-add-form__star rate-block__star _empty"></span>
                    <span class="comment-add-form__star rate-block__star _empty"></span>
                    <span class="comment-add-form__star rate-block__star _empty"></span>
                </div>
                <input type="hidden" class="comment-add-form__karma" name="karma" value="0">
            </div>
            <textarea class="comment-add-form__text comment-input" name="comment" cols="30" rows="10" placeholder="<?= $lang_content['comment_input_comment'] ?>" aria-label="Comment"></textarea>
            <input type="hidden" name="post_ID" value="<?= $post->ID ?>">
            <button class="comment-add-form__btn" type="button"><?= $lang_content['comment_form_button'] ?></button>
            <p class="comment-add-form__alert"></p>
        </form>
    </div>
</div>

