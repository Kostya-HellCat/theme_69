<?php
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page([
            'page_title' => 'Блок перелинковки',
            'menu_title' => 'Блок перелинковки',
            'menu_slug' => 'relink-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ]);
    }

    if( function_exists('acf_add_local_field_group') ) {

        acf_add_local_field_group([
            'key' => 'field_relink_settings',
            'title' => 'Настройки блока перелинковки',
            'fields' => [
                [
                    "key" => "field_relink_enable",
                    "label" => "Включить блок перелинковки?",
                    "name" => "enable_relink_block",
                    "type" => "true_false",
                    "instructions" => "",
                    "required" => 0,
                    "conditional_logic" => 0,
                    "wrapper" => [
                    "width" => "20",
                        "class" => "",
                        "id" => ""
                    ],
                    "message" => "",
                    "default_value" => 0,
                    "ui" => 1,
                    "ui_on_text" => "",
                    "ui_off_text" => ""
                ],
                [
                    'key' => 'field_relink_sites',
                    'label' => 'Сайты',
                    'name' => 'relink_sites',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ],
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => '',
                    'sub_fields' => [
                        [
                            'key' => 'field_flag_name',
                            'label' => 'Flag name',
                            'name' => 'flag_name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '10',
                                'class' => '',
                                'id' => ''
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => ''
                        ],
                        [
                            'key' => 'field_relink_name',
                            'label' => 'Country name',
                            'name' => 'name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '10',
                                'class' => '',
                                'id' => ''
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => ''
                        ],
                        [
                            'key' => 'field_relink_alt',
                            'label' => 'Alt',
                            'name' => 'alt',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '30',
                                'class' => '',
                                'id' => ''
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => ''
                        ],
                        [
                            'key' => 'field_relink_url',
                            'label' => 'Url',
                            'name' => 'url',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '45',
                                'class' => '',
                                'id' => ''
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => ''
                        ],
                        [
                            'key' => 'field_is_current',
                            'label' => 'Current',
                            'name' => 'is_current',
                            'type' => 'true_false',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '5',
                                'class' => '',
                                'id' => ''
                            ],
                            'message' => '',
                            'default_value' => 0,
                            'ui' => 0,
                            'ui_on_text' => '',
                            'ui_off_text' => ''
                        ]
                    ]
                ]
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'relink-settings',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
        ]);
    }