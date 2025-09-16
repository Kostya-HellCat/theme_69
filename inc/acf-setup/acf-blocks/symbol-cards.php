<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $cards = get_field('cards');
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Текстовые карточки</div>
    <div class="preview-block__content">
        <?php endif; ?>

        <?php if ( !empty($cards) ): ?>
            <ul class="symbol-cards">
                <?php foreach ( $cards as $card ): ?>
                    <li class="symbol-cards__item">
                        <?= get_image($card['image']) ?>
                        <?php if ( !empty($card['title']) ): ?>
                            <p class="symbol-cards__item-title"><?= $card['title'] ?></p>
                        <?php endif; ?>
                        <?php if ( !empty( $card['table']) ): ?>
                            <table class="symbol-cards__item-table">
                                <tbody class="symbol-cards__item-tbody">
                                <?php foreach ( $card['table'] as $row ): ?>
                                    <tr class="symbol-cards__item-row">
                                        <td><?= $row['name'] ?? '' ?></td>
                                        <td><?= $row['val'] ?? '' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
