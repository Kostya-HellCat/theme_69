<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $listing = get_field('listing');
?>

<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Листинг</div>
        <div class="preview-block__content">
		    <?php endif; ?>

                <?php if ( !empty( $listing ) ): ?>
                    <table<?= $anchor_tag ?> class="listing">
                        <tbody class="listing__list">
                            <?php foreach ( $listing as $i => $item ): ?>
                                <tr class="listing__row">
                                    <td class="listing__item">
                                        <?php if ( !empty( $item['name']) ): ?>
                                            <p class="listing__name"><span class="listing__place"><?= $i + 1 ?>.</span><?= $item['name'] ?></p>
                                        <?php endif; ?>

                                        <div class="listing__item-block listing__info">
                                            <?= get_image($item['image']) ?>
                                            <span class="listing__rating" style="--rating: <?= $item['rating'] ?? '4.8' ?>;"><?= $item['rating'] ?? '4.8' ?></span>
                                        </div>
                                        <?php if ( !empty( $item['advantages'] ) ): ?>
                                            <ul class="listing__item-block listing__advantages">
                                                <?php foreach ( $item['advantages'] as $advantage ): ?>
                                                    <li class="listing__advantages-item"><?= $advantage['text'] ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="listing__item-block listing__bonus">
                                            <?php if ( !empty($item['bonus_title']) ): ?>
                                                <span><?= $item['bonus_title'] ?></span>
                                            <?php endif; ?>
                                            <?php if ( !empty($item['bonus_text']) ): ?>
                                                <p class="listing__bonus-text"><?= $item['bonus_text'] ?></p>
                                            <?php endif; ?>

                                        </div>
                                        <div class="listing__btns">
                                            <?php if ( !empty( $item['button'] ) ): ?>
                                                <button class="btn sf-link btn--primary" data-sf-a="<?= $item['button']['url'] ?>="><?= $item['button']['title'] ?></button>
                                            <?php endif; ?>
                                            <?php if ( !empty( $item['payments'] ) ): ?>
                                                <ul class="listing__payments">
                                                    <?php foreach ( $item['payments'] as $payment_image ): ?>
                                                        <li class="listing__payments-item"><?= get_image($payment_image) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>