<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $screenshots = get_field('screenshots');
?>

<?php if ( $is_preview ): ?>
    <div class="preview-block">
    <div class="preview-block__title">Скриншоты</div>
    <div class="preview-block__content">
<?php endif; ?>

    <?php if ( !empty($screenshots) ): ?>
        <ul class="gallery js-scroll-list">
            <?php foreach ( $screenshots as $file ): ?>
                <?php
                    $image_url = is_plugin_active( 'webp-express/webp-express.php' ) ? str_replace(['.png','.jpg','.jpeg'], '.webp', $file['url']) : $file['url'] ;
                ?>
                <?php if ( $file['type'] === 'image'): ?>
                    <li class="gallery__item">
                        <a class="gallery__item-link" href="<?= $file['url'] ?>" data-glightbox="gallery">
                            <?= get_image($file['id']) ?>
                        </a>
                    </li>
                <?php elseif ( $file['type'] === 'video') : ?>
                    <li class="gallery__item gallery__item--video">
                        <a class="gallery__item-link" href="<?= $file['url'] ?>" data-glightbox="gallery">
                            <video src="<?= $file['url'] ?>" preload="metadata" playsinline></video>
                            <svg width="52" height="36" viewBox="0 0 52 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M51 1v24.586L41.586 35H1V1z" stroke="#D32F6F" stroke-width="2"/><path d="M21 13.148c0-.891 1.03-1.441 1.84-.983l8.57 4.852a1.115 1.115 0 0 1 0 1.966l-8.57 4.852c-.81.458-1.84-.092-1.84-.983z" fill="#D32F6F"/></svg></a>
                        <p class="gallery__item-title"><?= $file['title'] ?? $file['alt'] ?></p>
                    </li>
                <?php endif; ?>
                
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<?php if ( $is_preview ): ?>
    </div>
    </div>
<?php endif; ?>