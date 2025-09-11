<?php
    $tag_wrapper = get_field( 'wrapper_tag' ) ?: 'section';
?>
<?php if ( $is_preview ): ?>
    <div class="preview-block">
        <div class="preview-block__title">Sidebar</div>
        <div class="preview-block__content">
            <?php endif; ?>

                <<?= $tag_wrapper ?> class="sidebar wrapper">
                    <?php
                        echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode([
                                'acf/sidebar-info',
                                'acf/sidebar-bonus',
                                'acf/winners'
                            ]) ) . '" />';
                    ?>
                </<?= $tag_wrapper ?>>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>
