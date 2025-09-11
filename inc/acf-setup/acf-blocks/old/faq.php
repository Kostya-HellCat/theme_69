<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $faq = get_field('faq');
?>

<?php if ( $is_preview ): ?>
<div class="preview-block">
    <div class="preview-block__title">FAQ</div>
        <div class="preview-block__content">
		    <?php endif; ?>

                <?php if ( !empty($faq) ): ?>
                    <div class="faq-new"<?= $anchor_tag ?>>
                        <section class="faq-section" itemscope itemtype="https://schema.org/FAQPage">
                            <div class="faq-new-block" id="accordionFAQ-1">
                                <?php foreach ($faq as $i => $item): ?>
                                    <div class="faq">
                                        <div class="faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                            <details class="faq__item-details">
                                                <summary itemprop="name"><?= $item['question'] ?></summary>
                                                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                                    <p itemprop="text"><?= $item['answer'] ?></p>
                                                </div>
                                            </details>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    </div>
                <?php endif; ?>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>