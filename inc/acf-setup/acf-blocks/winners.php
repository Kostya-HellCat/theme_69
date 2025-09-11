<?php
    $anchor = get_field('anchor');
    $anchor_tag = $anchor ? " id='$anchor'" : "";

    $count = get_field('count') ?: 5;

    $title = get_field('title') ?: 'Winning now';
    $title_tag = get_field('title_tag') ?: 'p';

    $names = get_field('names');
    $range = get_field('min');
    $min = $range['min'] ?? 500;
    $max = $range['max'] ?? 2000;
    $currency = get_field('currency') ?: '$';

    $hide_names = get_field('hide_names');

    $names = !empty( $names ) ? explode(',', $names) : [];
    if ( empty($names) ) delete_transient('winners');

    if ( !function_exists('mask_name') ) {
        function mask_name($name) {
            if (strlen($name) <= 4) return $name;
            return substr($name, 0, 4) . '***' . substr($name, -2);
        }
    }
?>
<?php if ($is_preview): ?>
<div class="preview-block">
    <div class="preview-block__title">Top Winners</div>
    <div class="preview-block__content">
        <?php endif; ?>

            <?php if ( !empty($names) && Count($names) > $count): ?>
                <div<?= $anchor_tag ?> class="last-winners">
                    <<?= $title_tag ?> class="last-winners__title"><?= $title ?></<?= $title_tag ?>>
                    <ul class="last-winners__list">
                        <?php
                        $rand_keys = array_rand($names, 20);
                        $hash = md5($count . $min . $max . $currency . $hide_names );

                        $cashed = get_transient('winners_' . $hash);

                        if ( !empty( $cashed ) ) {
                                echo $cashed;
                            }else {
                                ob_start();
                                for ($i = 1; $i <= $count; $i++): ?>
                                    <li class="last-winners__item"> <span class="last-winners__item-index"><?= $i ?></span><?= $hide_names ? mask_name($names[$i]) : $names[$i] ?><span class="last-winners__item-sum"><?= $currency ?><?= rand($min, $max); ?></span></li>
                                <?php endfor;

                                $content = ob_get_clean();
                                set_transient('winners_' . $hash, $content, DAY_IN_SECONDS);
                                echo $content;
                            }
                        ?>
                    </ul>
                </div>
            <?php endif; ?>

        <?php if ($is_preview): ?>
    </div>
</div>
<?php endif; ?>
