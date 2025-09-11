<?php

    class Custom_Menu_Walker extends Walker_Nav_Menu {
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = $depth ? str_repeat("\t", $depth) : '';

            $classes = array_intersect($item->classes, ['menu-item', 'menu-item-has-children', 'current-menu-item']);
            $is_sub_item = $depth > 0;

            $classes = array_map(function($class) use ($is_sub_item) {
                if ($class === 'menu-item') return /*$is_sub_item ? 'sub-item' : */'item';
                #if ($class === 'menu-item-has-children') return 'main-nav__item--has-children';
                #if ($class === 'current-menu-item') return 'active';
                return $class;
            }, $classes);

            $class_names = $classes ? ' class="' . esc_attr(join(' ', $classes)) . '"' : '';

            $empty = in_array('active', $classes) || $item->url === '#';
            $link_tag = $empty ? 'a' : 'a';

            $output .= "$indent<li$class_names>\n";

            $atts = !empty($item->url) && !$empty ? ' href="' . esc_url($item->url) . '"' : '';
            $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);

            $link_class = $is_sub_item ? 'sub-menu__link' : 'main-nav__link';

            $output .= "<$link_tag$atts class='$link_class'>" . esc_html($title) . "</$link_tag>\n";

            if (in_array('main-nav__item--has-children', $classes)) {
                $output .= "<span class='img chevron arrow'><svg width='25' height='25' viewBox='0 0 25 25' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6.5 9.5L12.5 15.5L18.5 9.5' stroke='#FDFDFD' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path></svg></span>";
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
