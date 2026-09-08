<?php

add_action( 'acf/init', function () {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( [
        'key'      => 'group_footer',
        'title'    => 'Stopka (dla całej witryny)',
        'location' => [ [ [
            'param'    => 'page_type',
            'operator' => '==',
            'value'    => 'front_page',
        ] ] ],
        'menu_order' => 100,
        'fields'   => [

            // ── Sekcja: Środowisko ──────────────────────────────────────
            [
                'key'   => 'field_ft_tab_srodowisko',
                'label' => 'Sekcja: Środowisko',
                'name'  => '',
                'type'  => 'tab',
            ],
            [
                'key'           => 'field_ft_srodowisko_heading_1',
                'label'         => 'Nagłówek – linia 1',
                'name'          => 'srodowisko_heading_1',
                'type'          => 'text',
                'default_value' => 'Tworzymy środowisko',
            ],
            [
                'key'           => 'field_ft_srodowisko_heading_2',
                'label'         => 'Nagłówek – linia 2',
                'name'          => 'srodowisko_heading_2',
                'type'          => 'text',
                'default_value' => 'nie tylko obiekt.',
            ],
            [
                'key'           => 'field_ft_srodowisko_image',
                'label'         => 'Zdjęcie tła',
                'name'          => 'srodowisko_image',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
            ],

            // ── Sekcja: Stopka – dane ───────────────────────────────────
            [
                'key'   => 'field_ft_tab_footer',
                'label' => 'Stopka',
                'name'  => '',
                'type'  => 'tab',
            ],
            [
                'key'           => 'field_ft_description',
                'label'         => 'Opis pod logo',
                'name'          => 'footer_description',
                'type'          => 'textarea',
                'rows'          => 3,
                'new_lines'     => '',
                'default_value' => 'Elitarna akademia tenisowa dla maksymalnie 30 zawodników. Kompleksowy program przygotowania na najwyższym poziomie.',
            ],
            [
                'key'           => 'field_ft_address_1',
                'label'         => 'Adres – wiersz 1',
                'name'          => 'footer_address_1',
                'type'          => 'text',
                'default_value' => 'QORT Tennis Academy',
            ],
            [
                'key'           => 'field_ft_address_2',
                'label'         => 'Adres – wiersz 2',
                'name'          => 'footer_address_2',
                'type'          => 'text',
                'default_value' => 'ul. Przykładowa 123',
            ],
            [
                'key'           => 'field_ft_address_3',
                'label'         => 'Adres – wiersz 3',
                'name'          => 'footer_address_3',
                'type'          => 'text',
                'default_value' => '00-000 Przeźmierowo',
            ],
            [
                'key'           => 'field_ft_email',
                'label'         => 'Email kontaktowy',
                'name'          => 'footer_email',
                'type'          => 'text',
                'default_value' => 'kontakt@qort-academy.pl',
            ],
            [
                'key'           => 'field_ft_phone',
                'label'         => 'Telefon kontaktowy',
                'name'          => 'footer_phone',
                'type'          => 'text',
                'default_value' => '+48 123 456 789',
            ],

            // ── Social media ────────────────────────────────────────────
            [
                'key'   => 'field_ft_tab_social',
                'label' => 'Social Media',
                'name'  => '',
                'type'  => 'tab',
            ],
            [
                'key'           => 'field_ft_instagram',
                'label'         => 'Instagram URL',
                'name'          => 'footer_instagram',
                'type'          => 'url',
                'default_value' => '',
            ],
            [
                'key'           => 'field_ft_facebook',
                'label'         => 'Facebook URL',
                'name'          => 'footer_facebook',
                'type'          => 'url',
                'default_value' => '',
            ],
            [
                'key'           => 'field_ft_youtube',
                'label'         => 'YouTube URL',
                'name'          => 'footer_youtube',
                'type'          => 'url',
                'default_value' => '',
            ],

            // ── Stopka dolny pasek ──────────────────────────────────────
            [
                'key'   => 'field_ft_tab_bottom',
                'label' => 'Dolny pasek',
                'name'  => '',
                'type'  => 'tab',
            ],
            [
                'key'           => 'field_ft_privacy_url',
                'label'         => 'Polityka prywatności URL',
                'name'          => 'footer_privacy_url',
                'type'          => 'url',
                'default_value' => '#',
            ],
            [
                'key'           => 'field_ft_terms_url',
                'label'         => 'Regulamin URL',
                'name'          => 'footer_terms_url',
                'type'          => 'url',
                'default_value' => '#',
            ],
        ],
    ] );
} );
