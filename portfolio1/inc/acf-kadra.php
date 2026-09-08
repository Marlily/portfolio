<?php

add_action( 'acf/init', function () {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( [
        'key'    => 'group_kadra',
        'title'  => 'Dane osoby z kadry',
        'fields' => [
            [
                'key'           => 'field_kadra_zdjecie',
                'label'         => 'Zdjęcie',
                'name'          => 'zdjecie',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_kadra_rola',
                'label' => 'Rola / stanowisko',
                'name'  => 'rola',
                'type'  => 'text',
            ],
            [
                'key'           => 'field_kadra_zakladka',
                'label'         => 'Zakładka',
                'name'          => 'zakladka',
                'type'          => 'select',
                'choices'       => [
                    'trenerzy-tenisa' => 'Trenerzy tenisa',
                    'kadra-medyczna'  => 'Sztab medyczny',
                    'motoryka'        => 'Motoryka',
                    'mental'          => 'Mental',
                    'dietetyka'       => 'Dietetyka',
                ],
                'default_value' => 'trenerzy-tenisa',
                'return_format' => 'value',
            ],
            [
                'key'       => 'field_kadra_bio',
                'label'     => 'Bio',
                'name'      => 'bio',
                'type'      => 'textarea',
                'rows'      => 4,
                'new_lines' => '',
            ],
        ],
        'location' => [
            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'kadra',
                ],
            ],
        ],
        'menu_order' => 0,
        'style'      => 'default',
    ] );

} );
