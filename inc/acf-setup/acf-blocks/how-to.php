<?php
    global $lang_content;

	$anchor = get_field('anchor');
	$anchor_attr = $anchor ? " id='$anchor'" : "";

    $tag = get_field('tag') ?: 'ol';

    $how_to = get_field('how_to');

    $enable_schema = !is_null( get_field('enable_schema') ) ? get_field('enable_schema') : false;

	$schema_steps = [];
    $random_id = "how-to__item-" . rand(1, 10000);

    if (!function_exists('clear_data')) {
        function clear_data($value)
        {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            return htmlspecialchars($value);
        }
    }
?>

<?php if ( $is_preview ): ?>
<div class="preview-block">
	<div class="preview-block__title">How to</div>
	<div class="preview-block__content">
		<?php endif; ?>

            <<?= $tag ?><?= $anchor_attr ?> class="how-to">
                <?php foreach ( $how_to as $i => $item ) : ?>
                    <?php
                        $schema_steps[] = [
                            "@type" => "HowToStep",
                            "position" => $i + 1,
                            "name" => clear_data($item['title']),
                            "text" => clear_data($item['text']),
                            "image" => !empty($item['image']['url']) ? esc_url($item['image']['url']) : ""
                        ];
                    ?>
                    <li class="how-to__item">
                        <div class="how-to__item-col">
                            <?php if ( !empty($item['title']) ): ?>
                                <h3 class="how-to__item-title"><?= $item['title'] ?></h3>
                            <?php endif; ?>
                            <?php if ( !empty($item['text']) ): ?>
                                <p class="how-to__item-descr"><?= $item['text'] ?></p>
                            <?php endif; ?>
                            <?php if ( !empty($item['button']) ): ?>
                                <button class="btn sf-link btn--primary" data-sf-a="<?= $item['button']['url'] ?>"><?= $item['button']['title'] ?></button>
                            <?php endif; ?>
                        </div>
                        <?= get_image( $item['image']['id'] ) ?>
                    </li>
                <?php endforeach; ?>
            </<?= $tag ?>>

            <?php if ($enable_schema) : ?>
                <script type="application/ld+json">
                                    <?= json_encode([
                        "@context" => "https://schema.org",
                        "@type" => "HowTo",
                        "name" => !empty($title) ? clear_data($title) : "How to",
                        "step" => $schema_steps
                    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
                </script>
            <?php endif; ?>
    
        <?php if ( $is_preview ): ?>
    </div>
</div>
<?php endif; ?>