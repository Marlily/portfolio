<?php

add_action( 'acf/init', function () {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( [
        'key'    => 'group_team',
        'title'  => 'Kadra – treść strony',
        'fields' => [

            // ── Hero ───────────────────────────────────────────────────────
            [
                'key'           => 'field_team_hero_title',
                'label'         => 'Hero – tytuł (HTML)',
                'name'          => 'hero_title',
                'type'          => 'textarea',
                'rows'          => 2,
                'new_lines'     => '',
                'default_value' => 'Zespół pracujący<br><b>dla jednego celu</b>.',
            ],
            [
                'key'           => 'field_team_hero_btn_text',
                'label'         => 'Hero – tekst przycisku',
                'name'          => 'hero_btn_text',
                'type'          => 'text',
                'default_value' => 'Poznaj Nas',
            ],
            [
                'key'           => 'field_team_hero_btn_url',
                'label'         => 'Hero – URL przycisku',
                'name'          => 'hero_btn_url',
                'type'          => 'url',
                'default_value' => '#',
            ],
            [
                'key'           => 'field_team_hero_image_mobile',
                'label'         => 'Hero – grafika mobile',
                'name'          => 'hero_image_mobile',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'instructions'  => 'Opcjonalna grafika na urządzeniach mobilnych (< 1024px). Jeśli puste, używana jest grafika główna.',
            ],

            // ── Podejście ──────────────────────────────────────────────────
            [
                'key'           => 'field_team_podejscie_heading',
                'label'         => 'Podejście – nagłówek (HTML)',
                'name'          => 'podejscie_heading',
                'type'          => 'textarea',
                'rows'          => 2,
                'new_lines'     => '',
                'default_value' => 'Sport to gra zespołowa –<br>nawet w tenisie.',
            ],
            [
                'key'           => 'field_team_podejscie_text_1',
                'label'         => 'Podejście – akapit 1',
                'name'          => 'podejscie_text_1',
                'type'          => 'textarea',
                'rows'          => 5,
                'new_lines'     => '',
                'default_value' => "Choć tenis jest dyscypliną indywidualną, za sukcesem zawodnika stoi zespół ludzi odpowiedzialnych za każdy aspekt jego rozwoju.\n\nW QORT nie funkcjonujemy w modelu niezależnych specjalistów pracujących obok siebie. Tworzymy środowisko, w którym wszystkie decyzje treningowe, zdrowotne i rozwojowe są częścią wspólnego procesu.",
            ],
            [
                'key'           => 'field_team_podejscie_text_2',
                'label'         => 'Podejście – akapit 2',
                'name'          => 'podejscie_text_2',
                'type'          => 'textarea',
                'rows'          => 2,
                'new_lines'     => '',
                'default_value' => 'Dzięki temu zawodnik otrzymuje spójne wsparcie na każdym etapie swojej kariery.',
            ],

            // ── Kadra ──────────────────────────────────────────────────────
            [
                'key'           => 'field_team_kadra_heading',
                'label'         => 'Kadra – nagłówek',
                'name'          => 'kadra_heading',
                'type'          => 'text',
                'default_value' => 'Za każdym zawodnikiem stoi zespół',
            ],
        ],
        'location' => [
            [
                [
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'template-pages/team.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'style'      => 'default',
    ] );
} );
