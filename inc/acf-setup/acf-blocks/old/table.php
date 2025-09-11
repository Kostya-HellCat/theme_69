<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $table = get_field('table');
    $is_vertical = get_field('vertical') ?: false;
?>
<?php if ( $is_preview ): ?>
    <div class="preview-block">
        <div class="preview-block__title">Таблица</div>
        <div class="preview-block__content">
            <?php endif; ?>

            <div<?= $anchor_tag ?> class="table wp-block-table js-scroll-list<?= $is_vertical ? ' table--v' : '' ?>">
                <table>
                    <?php if ( !empty( $table['header'] )): ?>
                        <thead>
                            <tr>
                                <?php foreach ( $table['header'] as $i => $th ): ?>
                                    <th<?= $i === 0 ? ' class="bold"' : "" ?>><?= $th['c'] ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                    <?php endif; ?>
                    <?php if ( !empty( $table['body'] )): ?>
                        <tbody>
                            <?php foreach ( $table['body'] as $i => $tr ): ?>
                                <tr>
                                    <?php foreach ( $tr as $j => $td ): ?>
                                        <td<?= $j === 0 ? ' class="bold"' : '' ?>><?= $td['c'] ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    <?php endif; ?>
                </table>
            </div>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>
