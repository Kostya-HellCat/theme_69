<?php
    $toc = get_field('Items');

    $title = get_field('title') ?: 'Content';
    $title_tag = get_field('title_tag') ?: 'h3';
?>
<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">TOC</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <?php if ( !empty($toc) ): ?>
                <div class="toc-section js-toc">
                    <<?= $title_tag ?> class="toc-section__title js-toc__trigger"><?= $title ?></<?= $title_tag ?>>
                    <nav class="toc-section__nav">
                        <ul class="toc-section__list">
                            <?php foreach ($toc as $item): ?>
                                <li class="toc-section__item">
                                    <a class="toc-section__link" href="#<?= $item['url'] ?>"><?= $item['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>

        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>
