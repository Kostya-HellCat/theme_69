<?php if( has_nav_menu('footer-menu') ): ?>
    <nav class="footer__nav">
        <?php

            $footer_menu = wp_nav_menu(array(
                'container' => false,
                'theme_location' => 'footer-menu',
                'menu_id' => false,
                'menu_class' => 'footer__nav-list',
                'walker' => new Footer_Menu_Walker(),
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb' => ''
            ));
        ?>
    </nav>
<?php endif; ?>