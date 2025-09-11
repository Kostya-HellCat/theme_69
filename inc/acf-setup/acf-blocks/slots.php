<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $slots = get_field('slots');
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Слоты</div>
    <div class="preview-block__content">
        <?php endif; ?>

        <?php if ( !empty($slots)): ?>
            <ul class="scroll-list js-scroll-list">
                <?php foreach ( $slots as $slot ): ?>
                    <li class="slot-card">
                        <div class="slot-card__wrap">
                            <?= get_image($slot['image']) ?>
                            <div class="slot-card__btns">
                                <?php if ( !empty($slot['button']) ): ?>
                                    <button class="btn sf-link btn--primary btn--s js-modal__btn" data-sf-a="<?= $slot['button']['url'] ?>"><?= $slot['button']['title'] ?></button>
                                <?php endif; ?>
                                <?php if ( !empty($slot['demo']) ): ?>
                                    <button class="btn js-modal__open btn--secondary btn--s" data-modal-title="<?= $slot['name'] ?? '' ?>" data-modal-url="<?= $slot['demo']['url'] ?>"><?= $slot['demo']['title'] ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ( !empty($slot['name']) ): ?>
                            <p class="slot-card__name"><?= $slot['name'] ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($slot['caption']) ): ?>
                            <p class="slot-card__provider"><?= $slot['caption'] ?></p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
