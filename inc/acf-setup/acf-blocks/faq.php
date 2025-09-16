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
                    <div<?= $anchor_tag ?> class="section-faq section-faq__list">
                        <?php foreach ($faq as $i => $item): ?>
                            <details class="section-faq__item">
                                <summary>
                                    <span class="section-faq__index"><?= $i + 1 ?></span><?= $item['question'] ?>
                                </summary>
                                <p><?= $item['answer'] ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php
                    if (!empty($faq) && !is_front_page()) {
                        $faq_schema = [
                            '@context' => 'https://schema.org',
                            '@type'    => 'FAQPage',
                            'mainEntity' => array_map(function($item) {
                                return [
                                    '@type' => 'Question',
                                    'name'  => $item['question'],
                                    'acceptedAnswer' => [
                                        '@type' => 'Answer',
                                        'text'  => $item['answer']
                                    ]
                                ];
                            }, $faq)
                        ];

                        add_action('wp_footer', function() use ($faq_schema) {
                            echo '<script type="application/ld+json">'.json_encode($faq_schema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES).'</script>';
                        });
                    }
                ?>

            <?php if ( $is_preview ): ?>
        </div>
    </div>
<?php endif; ?>