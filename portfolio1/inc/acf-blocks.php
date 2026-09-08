<?php

add_action( 'acf/init', function () {

    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    acf_register_block_type( [
        'name'            => 'slider-zdjec',
        'title'           => 'Slider ze zdjęciami',
        'render_template' => get_template_directory() . '/template-parts/blocks/slider-zdjec.php',
        'category'        => 'media',
        'icon'            => 'images-alt2',
        'keywords'        => [ 'slider', 'zdjecia', 'galeria', 'foto' ],
        'supports'        => [
            'align' => false,
            'mode'  => false,
        ],
    ] );

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( [
        'key'    => 'group_block_slider_zdjec',
        'title'  => 'Slider ze zdjęciami – zdjęcia',
        'fields' => [
            [
                'key'           => 'field_slider_zdjecia',
                'label'         => 'Zdjęcia',
                'name'          => 'zdjecia',
                'type'          => 'gallery',
                'return_format' => 'array',
                'library'       => 'all',
                'min'           => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param'    => 'block',
                    'operator' => '==',
                    'value'    => 'acf/slider-zdjec',
                ],
            ],
        ],
        'menu_order' => 0,
    ] );

} );
