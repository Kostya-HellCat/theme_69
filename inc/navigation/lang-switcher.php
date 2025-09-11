<?php
    if ( function_exists('icl_get_languages') ) :
        $languages = icl_get_languages('skip_missing=1&orderby=code&order=DIR') ?: [];

        if ( Count($languages) >= 2 ) :
            $current_lang = '';
            $output = '';
            ?>
            <nav class="lang js-lang">
                <?php
                    foreach ( $languages as $lang ){
                        if ( $lang['active'] != 1 ) continue;

                        $current_lang = '<img src="' . $lang['country_flag_url'] . '" width="18" height="12" alt="' . $lang['code'] . '">' . $lang['code'] . '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="m5 7.5 5 5 5-5" stroke="#2B2B2B" stroke-width="2" stroke-linecap="round"/></svg>';
                    }

                    foreach ( $languages as $lang ){
                        $output .= '<li class="lang__item"><a class="lang__link" href="' . $lang['url'] . '"><img src="' . $lang['country_flag_url'] . '" width="18" height="12" alt="' . $lang['code'] . '" loading="lazy" decoding="async">' . $lang['translated_name'] . '</a></li>';
                    }

                    echo $current_lang;
                    echo "<ul class='lang__list'>$output</ul>";
                ?>
            </nav>
        <?php endif; ?>
    <?php endif; ?>