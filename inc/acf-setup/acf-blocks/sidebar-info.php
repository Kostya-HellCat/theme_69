<?php
    $image = get_field('image');
    $info = get_field('info');
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">Sidebar info</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <div class="sidebar-info">
                <?= get_image($image) ?>
                <?php if ( !empty($info) ): ?>
                    <table class="sidebar-info__table">
                        <tbody class="sidebar-info__tbody">
                        <?php foreach ( $info as $item ): ?>
                            <tr class="sidebar-info__tr">
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['val'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
