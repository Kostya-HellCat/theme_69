<?php if( has_nav_menu('header-menu') ): ?>
    <nav class="header__nav js-burger__nav js-menu">
        <?php
            $menu = wp_nav_menu(array(
                'container' => false,
                'menu_class' => 'header-menu js-menu__list',
                'theme_location' => 'header-menu',
                'menu_id' => false,
                'walker' => new Custom_Menu_Walker(),
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb' => ''
            ));
        ?>
    </nav>
<?php endif; ?>