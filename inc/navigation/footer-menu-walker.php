<?php

    class Footer_Menu_Walker extends Walker_Nav_Menu {
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = $depth ? str_repeat("\t", $depth) : '';

            $classes = array_intersect($item->classes, ['menu-item', 'menu-item-has-children', 'current-menu-item']);
            $is_sub_item = $depth > 0;

            $classes = array_map(function($class) use ($is_sub_item) {
                if ($class === 'menu-item') return 'footer__nav-item';
//                if ($class === 'menu-item-has-children') return 'main-nav__item--has-children';
                if ($class === 'current-menu-item') return 'active';
                return $class;
            }, $classes);

            $class_names = $classes ? ' class="' . esc_attr(join(' ', $classes)) . '"' : '';

            $link_tag = in_array('active', $classes) || $item->url === '#' ? 'span' : 'a';

            $output .= "$indent<li$class_names>\n";

            $atts = !empty($item->url) && $link_tag === 'a' ? ' class="footer__nav-link" href="' . esc_url($item->url) . '"' : '';
            $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);

            $output .= "<$link_tag$atts>" . esc_html($title) . "</$link_tag>\n";

            if (in_array('main-nav__item--has-children', $classes)) {
                $output .= "<span class='main-nav__item-arrow'><svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M4 6L8 10L12 6' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path></svg></span>";
            }
        }

        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class='sub-menu'>\n";
        }

        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }
    }
