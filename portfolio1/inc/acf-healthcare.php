<?php

add_action( 'acf/init', function () {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( [
        'key'    => 'group_healthcare',
        'title'  => 'Opieka zdrowotna – treść strony',
        'fields' => [

            // ── Hero ───────────────────────────────────────────────────────
            [
                'key'           => 'field_hc_hero_title',
                'label'         => 'Hero – tytuł (HTML)',
                'name'          => 'hero_title',
                'type'          => 'textarea',
                'rows'          => 2,
                'new_lines'     => '',
                'default_value' => 'Najpierw zdrowie.<br><b>Potem wynik</b>.',
            ],
            [
                'key'           => 'field_hc_hero_btn_text',
                'label'         => 'Hero – tekst przycisku',
                'name'          => 'hero_btn_text',
                'type'          => 'text',
                'default_value' => 'Dowiedz się więcej',
            ],
            [
                'key'           => 'field_hc_hero_btn_url',
                'label'         => 'Hero – URL przycisku',
                'name'          => 'hero_btn_url',
                'type'          => 'url',
                'default_value' => '#',
            ],
            [
                'key'           => 'field_hc_hero_image_mobile',
                'label'         => 'Hero – grafika mobile',
                'name'          => 'hero_image_mobile',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'instructions'  => 'Opcjonalna grafika na urządzeniach mobilnych (< 1024px). Jeśli puste, używana jest grafika główna.',
            ],

            // ── Sekcja główna ──────────────────────────────────────────────
            [
                'key'           => 'field_hc_section_label',
                'label'         => 'Sekcja – bullet label',
                'name'          => 'section_label',
                'type'          => 'text',
                'default_value' => 'Opieka zdrowotna',
            ],
            [
                'key'           => 'field_hc_section_heading',
                'label'         => 'Sekcja – nagłówek (HTML)',
                'name'          => 'section_heading',
                'type'          => 'textarea',
                'rows'          => 2,
                'new_lines'     => '',
                'default_value' => 'Zdrowie jako element<br>treningu',
            ],

            // ── Opieka 1 ───────────────────────────────────────────────────
            [
                'key'           => 'field_hc_opieka_1_image',
                'label'         => 'Opieka 1 – zdjęcie',
                'name'          => 'opieka_1_image',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_hc_opieka_1_heading',
                'label' => 'Opieka 1 – tytuł',
                'name'  => 'opieka_1_heading',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_hc_opieka_1_desc',
                'label'        => 'Opieka 1 – opis',
                'name'         => 'opieka_1_desc',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ],

            // ── Opieka 2 ───────────────────────────────────────────────────
            [
                'key'           => 'field_hc_opieka_2_image',
                'label'         => 'Opieka 2 – zdjęcie',
                'name'          => 'opieka_2_image',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_hc_opieka_2_heading',
                'label' => 'Opieka 2 – tytuł',
                'name'  => 'opieka_2_heading',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_hc_opieka_2_desc',
                'label'        => 'Opieka 2 – opis',
                'name'         => 'opieka_2_desc',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ],

            // ── Opieka 3 ───────────────────────────────────────────────────
            [
                'key'           => 'field_hc_opieka_3_image',
                'label'         => 'Opieka 3 – zdjęcie',
                'name'          => 'opieka_3_image',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_hc_opieka_3_heading',
                'label' => 'Opieka 3 – tytuł',
                'name'  => 'opieka_3_heading',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_hc_opieka_3_desc',
                'label'        => 'Opieka 3 – opis',
                'name'         => 'opieka_3_desc',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ],

            // ── Opieka 4 ───────────────────────────────────────────────────
            [
                'key'           => 'field_hc_opieka_4_image',
                'label'         => 'Opieka 4 – zdjęcie',
                'name'          => 'opieka_4_image',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_hc_opieka_4_heading',
                'label' => 'Opieka 4 – tytuł',
                'name'  => 'opieka_4_heading',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_hc_opieka_4_desc',
                'label'        => 'Opieka 4 – opis',
                'name'         => 'opieka_4_desc',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ],

            // ── Opieka 5 ───────────────────────────────────────────────────
            [
                'key'           => 'field_hc_opieka_5_image',
                'label'         => 'Opieka 5 – zdjęcie',
                'name'          => 'opieka_5_image',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_hc_opieka_5_heading',
                'label' => 'Opieka 5 – tytuł',
                'name'  => 'opieka_5_heading',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_hc_opieka_5_desc',
                'label'        => 'Opieka 5 – opis',
                'name'         => 'opieka_5_desc',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ],
        ],
        'location' => [
            [
                [
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'template-pages/healthcare.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'style'      => 'default',
    ] );
} );
