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
                                <tr class="listing__item">
                                    <td class="listing__item-block listing__info">
                                        <div class="listing__img">
                                            <p class="listing__place"><?= $i + 1 ?></p>
                                            <?= get_image( $item['image'] ) ?>
                                        </div>
                                        <p class="listing__title"><?= $item['name'] ?><span class="listing__rate" style="--rating: <?= $item['rating'] ?>"><?= $item['rating'] ?></span></p>
                                    </td>
                                    <td class="listing__item-block listing__bonus">
                                        <p class="listing__bonus-text"><?= $item['bonus_text'] ?></p>
                                    </td>
                                    <td class="listing__item-block listing__btn">
                                        <?php if ( !empty($item['button']) ): ?>
                                            <button class="btn sf-link btn--primary btn--m" data-sf-a="<?= $item['button']['url'] ?>">
                                                <?= $item['button']['title'] ?>
                                            </button>
                                        <?php endif; ?>
                                        <?php if ( !empty( $item['payments'] ) ): ?>
                                            <ul class="listing__payments">
                                                <?php foreach ( $item['payments'] as $img ): ?>
                                                    <li class="listing__payments-item"><?= get_image( $img ) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
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