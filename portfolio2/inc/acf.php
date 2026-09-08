<?php

if (!function_exists('acf_add_local_field_group')) {
    return;
}

add_filter('acf/settings/show_admin', '__return_false');

$homepage_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/homepage.php',
]]];

$usluga_location = [[[
    'param'    => 'post_type',
    'operator' => '==',
    'value'    => 'usluga',
]]];

// ─── Hero ─────────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_hero',
    'title'      => 'Hero',
    'fields'     => [
        [
            'key'           => 'field_mb_hero_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'hero_heading_bold',
            'type'          => 'text',
            'default_value' => 'Import z Chin',
        ],
        [
            'key'           => 'field_mb_hero_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'hero_heading_regular',
            'type'          => 'text',
            'default_value' => 'bez ryzyka i zbędnych pośredników',
        ],
        [
            'key'           => 'field_mb_hero_description',
            'label'         => 'Opis',
            'name'          => 'hero_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="text-orange-500">...</span>.',
            'new_lines'     => '',
            'default_value' => 'Pomagamy firmom sprowadzać <span class="text-orange-500">produkty, maszyny i komponenty z Chin</span>. Weryfikujemy dostawców, negocjujemy warunki, organizujemy transport i wspieramy cały proces od pierwszego zapytania aż po dostawę do Twojej firmy.',
        ],
        [
            'key'           => 'field_mb_hero_image',
            'label'         => 'Zdjęcie tła (desktop)',
            'name'          => 'hero_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_hero_image_mobile',
            'label'         => 'Zdjęcie tła (mobile)',
            'name'          => 'hero_image_mobile',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_hero_cta_text',
            'label'         => 'Przycisk główny – tekst',
            'name'          => 'hero_cta_text',
            'type'          => 'text',
            'default_value' => 'Bezpłatna wycena produktów',
        ],
        [
            'key'           => 'field_mb_hero_cta_url',
            'label'         => 'Przycisk główny – URL',
            'name'          => 'hero_cta_url',
            'type'          => 'url',
            'default_value' => '#',
        ],
        [
            'key'           => 'field_mb_hero_cta_secondary_text',
            'label'         => 'Przycisk dodatkowy – tekst',
            'name'          => 'hero_cta_secondary_text',
            'type'          => 'text',
            'default_value' => 'Poznaj naszą ofertę',
        ],
        [
            'key'           => 'field_mb_hero_cta_secondary_url',
            'label'         => 'Przycisk dodatkowy – URL',
            'name'          => 'hero_cta_secondary_url',
            'type'          => 'url',
            'default_value' => '#',
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 10,
]);

// ─── Hero podstrony ──────────────────────────────────────────────────────────

$page_hero_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'default',
]], [[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/o-firmie.php',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_hero_page',
    'title'      => 'Hero podstrony',
    'fields'     => [
        [
            'key'           => 'field_mb_hero_page_heading',
            'label'         => 'Nagłówek',
            'name'          => 'hero_page_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => 'Poznaj zespół stojący za <b>skutecznym importem z Chin</b>',
        ],
        [
            'key'           => 'field_mb_hero_page_description',
            'label'         => 'Opis',
            'name'          => 'hero_page_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Łączymy doświadczenie, znajomość rynku i sprawdzone procesy, pomagając przedsiębiorcom skutecznie rozwijać biznes dzięki importowi z Chin.',
        ],
        [
            'key'           => 'field_mb_hero_page_image',
            'label'         => 'Zdjęcie wyróżniające',
            'name'          => 'hero_page_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
    ],
    'location'   => $page_hero_location,
    'menu_order' => 20,
]);

// ─── Treść strony ────────────────────────────────────────────────────────────

$page_content_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'default',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_page_content',
    'title'      => 'Treść strony',
    'fields'     => [
        [
            'key'          => 'field_mb_page_content',
            'label'        => 'Treść',
            'name'         => 'page_content',
            'type'         => 'wysiwyg',
            'tabs'         => 'all',
            'toolbar'      => 'full',
            'media_upload' => 1,
        ],
    ],
    'location'   => $page_content_location,
    'menu_order' => 21,
]);

// ─── Hero – Wycena produktu ─────────────────────────────────────────────────────

$quote_hero_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/wycena.php',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_quote_hero',
    'title'      => 'Hero – Wycena produktu',
    'fields'     => [
        [
            'key'           => 'field_mb_quote_hero_eyebrow',
            'label'         => 'Etykieta',
            'name'          => 'quote_hero_eyebrow',
            'type'          => 'text',
            'default_value' => 'Wyceń produkt',
        ],
        [
            'key'           => 'field_mb_quote_hero_heading',
            'label'         => 'Nagłówek – pierwszy fragment',
            'name'          => 'quote_hero_heading',
            'type'          => 'text',
            'default_value' => 'Sprawdź możliwości ',
        ],
        [
            'key'           => 'field_mb_quote_hero_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'quote_hero_heading_bold',
            'type'          => 'text',
            'default_value' => 'importu',
        ],
        [
            'key'           => 'field_mb_quote_hero_heading_end',
            'label'         => 'Nagłówek – ostatni fragment',
            'name'          => 'quote_hero_heading_end',
            'type'          => 'text',
            'default_value' => ' swojego produktu',
        ],
        [
            'key'           => 'field_mb_quote_hero_description',
            'label'         => 'Opis',
            'name'          => 'quote_hero_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Prześlij link, zdjęcie lub krótki opis produktu, a przeanalizujemy możliwości jego importu oraz przygotujemy wstępną wycenę współpracy.',
        ],
        [
            'key'           => 'field_mb_quote_hero_image',
            'label'         => 'Zdjęcie',
            'name'          => 'quote_hero_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
    ],
    'location'   => $quote_hero_location,
    'menu_order' => 21,
]);

// ─── Dla kogo (ForWho) ────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_forwho',
    'title'      => 'Dla kogo',
    'fields'     => [
        [
            'key'           => 'field_mb_forwho_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'forwho_heading_bold',
            'type'          => 'text',
            'default_value' => 'Import dla firm',
        ],
        [
            'key'           => 'field_mb_forwho_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'forwho_heading_regular',
            'type'          => 'text',
            'default_value' => 'o różnych potrzebach',
        ],
        [
            'key'           => 'field_mb_forwho_description',
            'label'         => 'Opis',
            'name'          => 'forwho_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Niezależnie od skali działalności pomagamy znaleźć odpowiednich dostawców, zoptymalizować proces zakupowy i bezpiecznie realizować import z Chin.',
        ],
        [
            'key'          => 'field_mb_forwho_items',
            'label'        => 'Karty',
            'name'         => 'forwho_items',
            'type'         => 'repeater',
            'min'          => 1,
            'max'          => 4,
            'layout'       => 'block',
            'button_label' => 'Dodaj kartę',
            'sub_fields'   => [
                [
                    'key'           => 'field_mb_forwho_item_image',
                    'label'         => 'Zdjęcie',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                ],
                [
                    'key'           => 'field_mb_forwho_item_image_mobile',
                    'label'         => 'Zdjęcie (mobile, opcjonalnie)',
                    'name'          => 'image_mobile',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                ],
                [
                    'key'           => 'field_mb_forwho_item_title',
                    'label'         => 'Tytuł',
                    'name'          => 'title',
                    'type'          => 'text',
                ],
                [
                    'key'           => 'field_mb_forwho_item_description',
                    'label'         => 'Opis',
                    'name'          => 'description',
                    'type'          => 'textarea',
                    'rows'          => 3,
                ],
            ],
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 15,
]);

// ─── Mapa ─────────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_map',
    'title'      => 'Mapa',
    'fields'     => [
        [
            'key'           => 'field_mb_map_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'map_heading_bold',
            'type'          => 'text',
            'default_value' => 'Dostarczamy produkty regularnie',
        ],
        [
            'key'           => 'field_mb_map_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'map_heading_regular',
            'type'          => 'text',
            'default_value' => 'do większości krajów europejskich',
        ],
        [
            'key'           => 'field_mb_map_description',
            'label'         => 'Opis',
            'name'          => 'map_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Możesz je znaleźć w sklepach internetowych jak i sieciach handlowych',
        ],
        [
            'key'           => 'field_mb_map_image',
            'label'         => 'Grafika mapy',
            'name'          => 'map_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 12,
]);

// ─── Usługi ───────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_services',
    'title'      => 'Usługi',
    'fields'     => [
        [
            'key'           => 'field_mb_services_heading_line1',
            'label'         => 'Nagłówek – linia 1',
            'name'          => 'services_heading_line1',
            'type'          => 'text',
            'default_value' => 'Kompleksowa obsługa',
        ],
        [
            'key'           => 'field_mb_services_heading_line2',
            'label'         => 'Nagłówek – linia 2 (pogrubiona)',
            'name'          => 'services_heading_line2',
            'type'          => 'text',
            'default_value' => 'importu z Chin',
        ],
        [
            'key'           => 'field_mb_services_description',
            'label'         => 'Opis',
            'name'          => 'services_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Wspieramy przedsiębiorców na każdym etapie współpracy z chińskimi producentami, minimalizując ryzyko i oszczędzając czas.',
        ],
        [
            'key'          => 'field_mb_services',
            'label'        => 'Usługi',
            'name'         => 'services',
            'type'         => 'repeater',
            'min'          => 1,
            'max'          => 6,
            'layout'       => 'block',
            'button_label' => 'Dodaj usługę',
            'sub_fields'   => [
                [
                    'key'           => 'field_mb_service_icon',
                    'label'         => 'Ikona',
                    'name'          => 'service_icon',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'thumbnail',
                ],
                [
                    'key'           => 'field_mb_service_icon_color',
                    'label'         => 'Kolor tła ikony',
                    'name'          => 'service_icon_color',
                    'type'          => 'color_picker',
                    'default_value' => '#E38032',
                ],
                [
                    'key'           => 'field_mb_service_title',
                    'label'         => 'Tytuł',
                    'name'          => 'service_title',
                    'type'          => 'text',
                ],
                [
                    'key'           => 'field_mb_service_description',
                    'label'         => 'Opis',
                    'name'          => 'service_description',
                    'type'          => 'textarea',
                    'rows'          => 3,
                ],
            ],
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 20,
]);

// ─── Co zyskujesz (WhyUs) ─────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_whyus',
    'title'      => 'Co zyskujesz',
    'fields'     => [
        [
            'key'           => 'field_mb_whyus_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'whyus_heading_bold',
            'type'          => 'text',
            'default_value' => 'Co zyskujesz',
        ],
        [
            'key'           => 'field_mb_whyus_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'whyus_heading_regular',
            'type'          => 'text',
            'default_value' => 'dzięki współpracy z nami?',
        ],
        [
            'key'           => 'field_mb_whyus_image',
            'label'         => 'Zdjęcie',
            'name'          => 'whyus_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'          => 'field_mb_whyus_items',
            'label'        => 'Punkty',
            'name'         => 'whyus_items',
            'type'         => 'repeater',
            'min'          => 1,
            'max'          => 6,
            'layout'       => 'block',
            'button_label' => 'Dodaj punkt',
            'sub_fields'   => [
                [
                    'key'           => 'field_mb_whyus_item_icon',
                    'label'         => 'Ikona',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'thumbnail',
                ],
                [
                    'key'           => 'field_mb_whyus_item_label',
                    'label'         => 'Treść',
                    'name'          => 'label',
                    'type'          => 'text',
                ],
            ],
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 25,
]);

// ─── 5 kroków (Steps) ─────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_steps',
    'title'      => '5 kroków',
    'fields'     => [
        [
            'key'           => 'field_mb_steps_heading_line1',
            'label'         => 'Nagłówek – linia 1',
            'name'          => 'steps_heading_line1',
            'type'          => 'text',
            'default_value' => 'Import z Chin w',
        ],
        [
            'key'           => 'field_mb_steps_heading_line2',
            'label'         => 'Nagłówek – linia 2 (pogrubiona)',
            'name'          => 'steps_heading_line2',
            'type'          => 'text',
            'default_value' => '5 prostych krokach',
        ],
        [
            'key'           => 'field_mb_steps_description',
            'label'         => 'Opis',
            'name'          => 'steps_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Dzięki sprawdzonemu procesowi minimalizujemy ryzyko i oszczędzamy czas naszych klientów.',
        ],
        [
            'key'          => 'field_mb_steps_items',
            'label'        => 'Kroki',
            'name'         => 'steps_items',
            'type'         => 'repeater',
            'min'          => 1,
            'max'          => 5,
            'layout'       => 'block',
            'button_label' => 'Dodaj krok',
            'sub_fields'   => [
                [
                    'key'  => 'field_mb_steps_item_title',
                    'label' => 'Tytuł',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key'  => 'field_mb_steps_item_description',
                    'label' => 'Opis',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                ],
            ],
        ],
    ],
    'location'   => array_merge($homepage_location, $usluga_location),
    'menu_order' => 27,
]);

// ─── Portal B2B ───────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_portalb2b',
    'title'      => 'Portal B2B',
    'fields'     => [
        [
            'key'           => 'field_mb_portalb2b_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'portalb2b_heading_bold',
            'type'          => 'text',
            'default_value' => 'Portal B2B',
        ],
        [
            'key'           => 'field_mb_portalb2b_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'portalb2b_heading_regular',
            'type'          => 'text',
            'default_value' => ' – jedno miejsce do zarządzania importem',
        ],
        [
            'key'           => 'field_mb_portalb2b_description',
            'label'         => 'Opis',
            'name'          => 'portalb2b_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Nasz portal B2B umożliwia wygodną komunikację, śledzenie zamówień, dostęp do dokumentów oraz bieżący podgląd statusu realizowanych projektów.',
        ],
        [
            'key'           => 'field_mb_portalb2b_image',
            'label'         => 'Zrzut ekranu portalu',
            'name'          => 'portalb2b_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'          => 'field_mb_portalb2b_items',
            'label'        => 'Punkty',
            'name'         => 'portalb2b_items',
            'type'         => 'repeater',
            'min'          => 1,
            'max'          => 4,
            'layout'       => 'block',
            'button_label' => 'Dodaj punkt',
            'sub_fields'   => [
                [
                    'key'           => 'field_mb_portalb2b_item_icon',
                    'label'         => 'Ikona',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'thumbnail',
                ],
                [
                    'key'           => 'field_mb_portalb2b_item_label',
                    'label'         => 'Treść',
                    'name'          => 'label',
                    'type'          => 'text',
                ],
            ],
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 28,
]);

// ─── Historie realizacji (CaseStudies) ─────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_casestudies',
    'title'      => 'Historie realizacji',
    'fields'     => [
        [
            'key'           => 'field_mb_casestudies_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'casestudies_heading_bold',
            'type'          => 'text',
            'default_value' => 'Historie',
        ],
        [
            'key'           => 'field_mb_casestudies_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'casestudies_heading_regular',
            'type'          => 'text',
            'default_value' => ' naszych realizacji',
        ],
        [
            'key'           => 'field_mb_casestudies_description',
            'label'         => 'Opis',
            'name'          => 'casestudies_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Zobacz wybrane projekty importowe zrealizowane dla naszych klientów.',
        ],
        [
            'key'           => 'field_mb_casestudies_cta_text',
            'label'         => 'Przycisk – tekst',
            'name'          => 'casestudies_cta_text',
            'type'          => 'text',
            'default_value' => 'Wszystkie case studies',
        ],
        [
            'key'           => 'field_mb_casestudies_cta_url',
            'label'         => 'Przycisk – URL',
            'name'          => 'casestudies_cta_url',
            'type'          => 'url',
            'instructions'  => 'Pozostaw puste, aby użyć domyślnego adresu archiwum case studies.',
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 29,
]);

// ─── Case study (CPT) ───────────────────────────────────────────────────────────

$case_study_location = [[[
    'param'    => 'post_type',
    'operator' => '==',
    'value'    => 'case_study',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_case_study',
    'title'      => 'Szczegóły case study',
    'fields'     => [
        [
            'key'   => 'field_mb_cs_challenge_intro',
            'label' => 'Wyzwanie – wprowadzenie',
            'name'  => 'challenge_intro',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_mb_cs_challenge_body',
            'label'        => 'Wyzwanie – rozwinięcie',
            'name'         => 'challenge_body',
            'type'         => 'textarea',
            'rows'         => 4,
            'new_lines'    => 'br',
            'instructions' => 'Osobne akapity oddziel pustą linią.',
        ],
        [
            'key'   => 'field_mb_cs_client_description',
            'label' => 'O kliencie',
            'name'  => 'client_description',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'key'   => 'field_mb_cs_actions_intro',
            'label' => 'Nasze działania – wprowadzenie',
            'name'  => 'actions_intro',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_mb_cs_actions_body',
            'label'        => 'Nasze działania – rozwinięcie',
            'name'         => 'actions_body',
            'type'         => 'textarea',
            'rows'         => 4,
            'new_lines'    => 'br',
            'instructions' => 'Osobne akapity oddziel pustą linią.',
        ],
        [
            'key'   => 'field_mb_cs_results_intro',
            'label' => 'Rezultaty – wprowadzenie',
            'name'  => 'results_intro',
            'type'  => 'textarea',
            'rows'  => 2,
        ],
        [
            'key'          => 'field_mb_cs_results_body',
            'label'        => 'Rezultaty – rozwinięcie',
            'name'         => 'results_body',
            'type'         => 'textarea',
            'rows'         => 4,
            'new_lines'    => 'br',
            'instructions' => 'Osobne akapity oddziel pustą linią.',
        ],
        [
            'key'          => 'field_mb_cs_key_effects',
            'label'        => 'Kluczowe efekty',
            'name'         => 'key_effects',
            'type'         => 'repeater',
            'min'          => 1,
            'layout'       => 'table',
            'button_label' => 'Dodaj efekt',
            'sub_fields'   => [
                [
                    'key'   => 'field_mb_cs_key_effect_label',
                    'label' => 'Treść',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
            ],
        ],
    ],
    'location'   => $case_study_location,
    'menu_order' => 5,
]);

// ─── Usługi ─────────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_usluga',
    'title'      => 'Szczegóły usługi',
    'fields'     => [
        [
            'key'          => 'field_mb_usluga_story_blocks',
            'label'        => 'Bloki treści (tekst + zdjęcie)',
            'name'         => 'story_blocks',
            'type'         => 'repeater',
            'min'          => 0,
            'layout'       => 'block',
            'button_label' => 'Dodaj blok',
            'instructions' => 'Puste pole tekstowe lub brak zdjęcia powoduje pominięcie danego elementu. Blok bez żadnej treści i zdjęcia w ogóle się nie wyświetli. Bloki wyświetlają się naprzemiennie (zdjęcie raz z prawej, raz z lewej strony).',
            'sub_fields'   => [
                [
                    'key'   => 'field_mb_usluga_sb_heading_regular',
                    'label' => 'Nagłówek – fragment zwykły',
                    'name'  => 'heading_regular',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_mb_usluga_sb_heading_bold',
                    'label' => 'Nagłówek – fragment pogrubiony',
                    'name'  => 'heading_bold',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_mb_usluga_sb_intro',
                    'label' => 'Wprowadzenie',
                    'name'  => 'intro',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'          => 'field_mb_usluga_sb_body',
                    'label'        => 'Rozwinięcie',
                    'name'         => 'body',
                    'type'         => 'textarea',
                    'rows'         => 4,
                    'new_lines'    => 'br',
                    'instructions' => 'Osobne akapity oddziel pustą linią.',
                ],
                [
                    'key'           => 'field_mb_usluga_sb_image',
                    'label'         => 'Zdjęcie',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                ],
            ],
        ],
        [
            'key'   => 'field_mb_usluga_services_heading_regular',
            'label' => 'Sekcja korzyści – nagłówek, fragment zwykły',
            'name'  => 'services_heading_regular',
            'type'  => 'text',
        ],
        [
            'key'   => 'field_mb_usluga_services_heading_bold',
            'label' => 'Sekcja korzyści – nagłówek, fragment pogrubiony',
            'name'  => 'services_heading_bold',
            'type'  => 'text',
        ],
        [
            'key'          => 'field_mb_usluga_services_items',
            'label'        => 'Sekcja korzyści – karty',
            'name'         => 'services_items',
            'type'         => 'repeater',
            'min'          => 0,
            'layout'       => 'block',
            'button_label' => 'Dodaj kartę',
            'instructions' => 'Sekcja nie wyświetli się, jeśli nagłówek jest pusty i nie dodano żadnej karty.',
            'sub_fields'   => [
                [
                    'key'           => 'field_mb_usluga_si_icon',
                    'label'         => 'Ikona',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                ],
                [
                    'key'   => 'field_mb_usluga_si_title',
                    'label' => 'Tytuł',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_mb_usluga_si_description',
                    'label' => 'Opis',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
            ],
        ],
    ],
    'location'   => $usluga_location,
    'menu_order' => 6,
]);

// ─── Baza wiedzy (Blog) ─────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_blog',
    'title'      => 'Baza wiedzy',
    'fields'     => [
        [
            'key'           => 'field_mb_blog_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'blog_heading_bold',
            'type'          => 'text',
            'default_value' => 'Wiedza',
        ],
        [
            'key'           => 'field_mb_blog_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'blog_heading_regular',
            'type'          => 'text',
            'default_value' => ' o imporcie w praktyce',
        ],
        [
            'key'           => 'field_mb_blog_description',
            'label'         => 'Opis',
            'name'          => 'blog_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Publikujemy poradniki, analizy i aktualności związane z importem z Chin, logistyką, cłem oraz współpracą z producentami.',
        ],
        [
            'key'           => 'field_mb_blog_cta_text',
            'label'         => 'Przycisk – tekst',
            'name'          => 'blog_cta_text',
            'type'          => 'text',
            'default_value' => 'Wszystkie artykuły',
        ],
        [
            'key'           => 'field_mb_blog_cta_url',
            'label'         => 'Przycisk – URL',
            'name'          => 'blog_cta_url',
            'type'          => 'url',
            'instructions'  => 'Pozostaw puste, aby użyć domyślnego adresu archiwum wpisów.',
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 45,
]);

// ─── Kontakt ──────────────────────────────────────────────────────────────────

$contact_location = array_merge($homepage_location, [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/kontakt.php',
]]]);

acf_add_local_field_group([
    'key'        => 'group_mb_contact',
    'title'      => 'Kontakt',
    'fields'     => [
        [
            'key'           => 'field_mb_contact_heading',
            'label'         => 'Nagłówek',
            'name'          => 'contact_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => '<b>Skontaktuj się</b> z zespołem Importio',
        ],
        [
            'key'           => 'field_mb_contact_description',
            'label'         => 'Opis',
            'name'          => 'contact_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Masz pytania dotyczące importu, dostawców lub logistyki? Napisz do nas, a wspólnie omówimy możliwości współpracy i dalsze kroki.',
        ],
        [
            'key'           => 'field_mb_contact_info_heading',
            'label'         => 'Nagłówek – dane kontaktowe',
            'name'          => 'contact_info_heading',
            'type'          => 'text',
            'default_value' => 'Dane kontaktowe',
        ],
        [
            'key'           => 'field_mb_contact_phone',
            'label'         => 'Telefon',
            'name'          => 'contact_phone',
            'type'          => 'text',
            'default_value' => '+48 123 456 789',
        ],
        [
            'key'           => 'field_mb_contact_email',
            'label'         => 'E-mail',
            'name'          => 'contact_email',
            'type'          => 'email',
            'default_value' => 'kontakt@importio.pl',
        ],
        [
            'key'           => 'field_mb_contact_address',
            'label'         => 'Adres',
            'name'          => 'contact_address',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => "ul. Przykładowa 123\n00-000 Warszawa",
        ],
        [
            'key'           => 'field_mb_contact_hero_image',
            'label'         => 'Zdjęcie hero (strona Kontakt)',
            'name'          => 'contact_hero_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
            'instructions'  => 'Widoczne tylko na banerze strony Kontakt.',
        ],
    ],
    'location'   => $contact_location,
    'menu_order' => 65,
]);

// ─── Opinie klientów ──────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_testimonials',
    'title'      => 'Opinie klientów',
    'fields'     => [
        [
            'key'           => 'field_mb_testimonials_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment',
            'name'          => 'testimonials_heading_bold',
            'type'          => 'text',
            'default_value' => 'Partnerstwo',
        ],
        [
            'key'           => 'field_mb_testimonials_heading_regular',
            'label'         => 'Nagłówek – dalszy fragment',
            'name'          => 'testimonials_heading_regular',
            'type'          => 'text',
            'default_value' => ' oparte na zaufaniu',
        ],
        [
            'key'           => 'field_mb_testimonials_description',
            'label'         => 'Opis',
            'name'          => 'testimonials_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Najlepszą rekomendacją są opinie klientów, którzy rozwijają swój biznes dzięki współpracy z nami.',
        ],
        [
            'key'          => 'field_mb_testimonials',
            'label'        => 'Opinie',
            'name'         => 'testimonials',
            'type'         => 'repeater',
            'min'          => 1,
            'layout'       => 'block',
            'button_label' => 'Dodaj opinię',
            'sub_fields'   => [
                [
                    'key'           => 'field_mb_testimonial_quote',
                    'label'         => 'Opinia',
                    'name'          => 'testimonial_quote',
                    'type'          => 'textarea',
                    'rows'          => 3,
                ],
                [
                    'key'           => 'field_mb_testimonial_name',
                    'label'         => 'Imię i nazwisko',
                    'name'          => 'testimonial_name',
                    'type'          => 'text',
                ],
                [
                    'key'           => 'field_mb_testimonial_title',
                    'label'         => 'Stanowisko',
                    'name'          => 'testimonial_title',
                    'type'          => 'text',
                ],
            ],
        ],
    ],
    'location'   => $homepage_location,
    'menu_order' => 50,
]);

// ─── Referencje (podstrona) ─────────────────────────────────────────────────────

$references_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/referencje.php',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_references_page',
    'title'      => 'Referencje – nagłówek',
    'fields'     => [
        [
            'key'           => 'field_mb_references_heading',
            'label'         => 'Nagłówek',
            'name'          => 'references_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => 'Zobacz, co mówią <b>nasi klienci</b>',
        ],
        [
            'key'           => 'field_mb_references_description',
            'label'         => 'Opis',
            'name'          => 'references_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Poznaj doświadczenia firm, które skorzystały z naszego wsparcia przy imporcie z Chin.',
        ],
        [
            'key'           => 'field_mb_references_image',
            'label'         => 'Zdjęcie wyróżniające',
            'name'          => 'references_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
    ],
    'location'   => $references_location,
    'menu_order' => 22,
]);

// ─── O firmie (podstrona) ───────────────────────────────────────────────────────

$about_page_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/o-firmie.php',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_about_page',
    'title'      => 'O firmie – treść',
    'fields'     => [
        [
            'key'           => 'field_mb_about_block1_heading',
            'label'         => 'Blok 1 – nagłówek',
            'name'          => 'about_block1_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="font-bold">...</span>.',
            'default_value' => 'Stawiamy na <span class="font-bold">sprawdzone rozwiązania</span>',
        ],
        [
            'key'           => 'field_mb_about_block1_intro',
            'label'         => 'Blok 1 – wprowadzenie',
            'name'          => 'about_block1_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Każdy projekt rozpoczynamy od dokładnego poznania potrzeb klienta. Analizujemy wymagania dotyczące produktu, budżetu oraz oczekiwanych terminów realizacji.',
        ],
        [
            'key'           => 'field_mb_about_block1_body',
            'label'         => 'Blok 1 – rozwinięcie',
            'name'          => 'about_block1_body',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => 'br',
            'instructions'  => 'Osobne akapity oddziel pustą linią.',
            'default_value' => "Następnie wyszukujemy odpowiednich producentów, weryfikujemy ich wiarygodność i negocjujemy warunki współpracy.\n\nDzięki uporządkowanemu procesowi jesteśmy w stanie skutecznie wspierać zarówno firmy realizujące pierwsze zamówienie z Chin, jak i przedsiębiorstwa regularnie rozwijające swoje łańcuchy dostaw. Naszym priorytetem jest transparentna komunikacja i pełna kontrola nad każdym etapem realizacji.",
        ],
        [
            'key'           => 'field_mb_about_block1_image',
            'label'         => 'Blok 1 – zdjęcie',
            'name'          => 'about_block1_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_about_block2_heading',
            'label'         => 'Blok 2 – nagłówek',
            'name'          => 'about_block2_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="font-bold">...</span>.',
            'default_value' => '<span class="font-bold">Partner w imporcie</span>, nie tylko pośrednik',
        ],
        [
            'key'           => 'field_mb_about_block2_intro',
            'label'         => 'Blok 2 – wprowadzenie',
            'name'          => 'about_block2_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Import z Chin to znacznie więcej niż znalezienie dostawcy i złożenie zamówienia. To proces wymagający znajomości rynku, umiejętności negocjacji, kontroli jakości oraz sprawnej organizacji logistyki.',
        ],
        [
            'key'           => 'field_mb_about_block2_body',
            'label'         => 'Blok 2 – rozwinięcie',
            'name'          => 'about_block2_body',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => 'br',
            'instructions'  => 'Osobne akapity oddziel pustą linią.',
            'default_value' => "Właśnie dlatego wspieramy naszych klientów na każdym etapie współpracy, pomagając im podejmować bezpieczne i świadome decyzje biznesowe.\n\nWspółpracujemy z przedsiębiorcami reprezentującymi różne branże – od e-commerce i handlu hurtowego, przez firmy produkcyjne, aż po przedsiębiorstwa poszukujące specjalistycznych maszyn i komponentów. Naszym celem jest uproszczenie procesu importu oraz ograniczenie ryzyka, które często towarzyszy współpracy z zagranicznymi dostawcami.",
        ],
        [
            'key'           => 'field_mb_about_block2_image',
            'label'         => 'Blok 2 – zdjęcie',
            'name'          => 'about_block2_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_about_items_heading',
            'label'         => 'Karty – nagłówek',
            'name'          => 'about_items_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="font-bold">...</span>.',
            'default_value' => 'Co wyróżnia <span class="font-bold">Importio</span>?',
        ],
        [
            'key'           => 'field_mb_about_items_description',
            'label'         => 'Karty – opis',
            'name'          => 'about_items_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Łączymy doświadczenie, sprawdzone procesy i indywidualne podejście, pomagając firmom bezpiecznie rozwijać działalność dzięki importowi z Chin.',
        ],
        [
            'key'           => 'field_mb_about_items',
            'label'         => 'Karty',
            'name'          => 'about_items',
            'type'          => 'repeater',
            'min'           => 1,
            'max'           => 4,
            'layout'        => 'block',
            'button_label'  => 'Dodaj kartę',
            'default_value' => [
                ['icon' => 'about-individual', 'title' => 'Indywidualne podejście', 'description' => 'Każdy projekt traktujemy indywidualnie, dopasowując rozwiązania do specyfiki działalności klienta.'],
                ['icon' => 'about-suppliers', 'title' => 'Sprawdzeni dostawcy', 'description' => 'Weryfikujemy producentów i dostawców, ograniczając ryzyko związane z importem.'],
                ['icon' => 'about-support', 'title' => 'Kompleksowa obsługa', 'description' => 'Od pierwszego zapytania po dostawę towaru – zapewniamy wsparcie na każdym etapie procesu.'],
                ['icon' => 'about-transparency', 'title' => 'Transparentna współpraca', 'description' => 'Stawiamy na jasne zasady działania, regularny kontakt i pełną przejrzystość realizowanych działań.'],
            ],
            'sub_fields'    => [
                [
                    'key'          => 'field_mb_about_item_icon',
                    'label'        => 'Ikona',
                    'name'         => 'icon',
                    'type'         => 'text',
                    'instructions' => 'Slug ikony z zestawu importio_get_icon(), np. about-individual.',
                ],
                [
                    'key'   => 'field_mb_about_item_title',
                    'label' => 'Tytuł',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_mb_about_item_description',
                    'label' => 'Opis',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
            ],
        ],
    ],
    'location'   => $about_page_location,
    'menu_order' => 23,
]);

// ─── Praca (podstrona) ──────────────────────────────────────────────────────────

$career_page_location = [[[
    'param'    => 'page_template',
    'operator' => '==',
    'value'    => 'template-pages/praca.php',
]]];

acf_add_local_field_group([
    'key'        => 'group_mb_career_page',
    'title'      => 'Praca – treść',
    'fields'     => [
        [
            'key'           => 'field_mb_career_hero_heading',
            'label'         => 'Hero – nagłówek',
            'name'          => 'career_hero_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => 'Rozwijaj swoją karierę <b>razem z Importio</b>',
        ],
        [
            'key'           => 'field_mb_career_hero_description',
            'label'         => 'Hero – opis',
            'name'          => 'career_hero_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Jeżeli cenisz samodzielność, odpowiedzialność i chcesz rozwijać się w dynamicznym środowisku biznesowym, chętnie poznamy Twoje doświadczenie i pomysły.',
        ],
        [
            'key'           => 'field_mb_career_hero_image',
            'label'         => 'Hero – zdjęcie',
            'name'          => 'career_hero_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_career_block1_heading',
            'label'         => 'Blok 1 – nagłówek',
            'name'          => 'career_block1_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="font-bold">...</span>.',
            'default_value' => '<span class="font-bold">Dołącz do zespołu</span> Importio',
        ],
        [
            'key'           => 'field_mb_career_block1_intro',
            'label'         => 'Blok 1 – wprowadzenie',
            'name'          => 'career_block1_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Szukamy osób, które chcą rozwijać się w obszarze międzynarodowego handlu, logistyki oraz współpracy z partnerami biznesowymi na całym świecie.',
        ],
        [
            'key'           => 'field_mb_career_block1_body',
            'label'         => 'Blok 1 – rozwinięcie',
            'name'          => 'career_block1_body',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Cenimy zaangażowanie, odpowiedzialność i otwartość na nowe wyzwania. Niezależnie od tego, czy posiadasz doświadczenie w branży importowej, sprzedaży, obsłudze klienta czy logistyce, chętnie poznamy Twoją historię i kompetencje.',
        ],
        [
            'key'           => 'field_mb_career_block1_image',
            'label'         => 'Blok 1 – zdjęcie',
            'name'          => 'career_block1_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_career_block2_heading',
            'label'         => 'Blok 2 – nagłówek',
            'name'          => 'career_block2_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="font-bold">...</span>.',
            'default_value' => '<span class="font-bold">Kogo</span> szukamy?',
        ],
        [
            'key'           => 'field_mb_career_block2_intro',
            'label'         => 'Blok 2 – wprowadzenie',
            'name'          => 'career_block2_intro',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Interesują nas osoby, które lubią działać samodzielnie, potrafią budować relacje i chcą mieć realny wpływ na rozwój firmy.',
        ],
        [
            'key'           => 'field_mb_career_block2_body',
            'label'         => 'Blok 2 – rozwinięcie',
            'name'          => 'career_block2_body',
            'type'          => 'textarea',
            'rows'          => 4,
            'new_lines'     => 'br',
            'instructions'  => 'Osobne akapity oddziel pustą linią.',
            'default_value' => "Wierzymy, że sukces tworzą ludzie, dlatego stawiamy na współpracę opartą na zaufaniu i wzajemnym wsparciu.\n\nSzukamy zarówno specjalistów z doświadczeniem, jak i osób, które dopiero chcą rozwijać swoją karierę w branży związanej z importem i handlem międzynarodowym.",
        ],
        [
            'key'           => 'field_mb_career_block2_image',
            'label'         => 'Blok 2 – zdjęcie',
            'name'          => 'career_block2_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_career_final_heading',
            'label'         => 'Sekcja końcowa – nagłówek',
            'name'          => 'career_final_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do wyróżnienia można otoczyć tagiem <span class="font-bold">...</span>.',
            'default_value' => 'Chcesz <span class="font-bold">pracować z nami?</span>',
        ],
        [
            'key'           => 'field_mb_career_final_description',
            'label'         => 'Sekcja końcowa – opis',
            'name'          => 'career_final_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Jeżeli cenisz zaangażowanie, odpowiedzialność i otwartość na nowe wyzwania, prześlij nam swoje CV lub kilka słów o sobie. Zawsze jesteśmy otwarci na kontakt z osobami, które mogą wnieść do naszego zespołu wiedzę, doświadczenie i świeże spojrzenie.',
        ],
        [
            'key'           => 'field_mb_career_cv_label',
            'label'         => 'Etykieta – wysyłka CV',
            'name'          => 'career_cv_label',
            'type'          => 'text',
            'default_value' => 'Wyślij CV na:',
        ],
        [
            'key'           => 'field_mb_career_cv_email',
            'label'         => 'E-mail do CV',
            'name'          => 'career_cv_email',
            'type'          => 'email',
            'default_value' => 'kontakt@importio.pl',
        ],
    ],
    'location'   => $career_page_location,
    'menu_order' => 24,
]);

// ─── Ustawienia globalne (Options Page) ─────────────────────────────────────────

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Ustawienia globalne',
        'menu_title' => 'Ustawienia globalne',
        'menu_slug'  => 'mb-theme-options',
        'capability' => 'manage_options',
        'redirect'   => false,
        'position'   => 80,
        'icon_url'   => 'dashicons-admin-generic',
    ]);
}

$options_location = [[[
    'param'    => 'options_page',
    'operator' => '==',
    'value'    => 'mb-theme-options',
]]];

// ─── Stopka ───────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_footer',
    'title'      => 'Stopka',
    'fields'     => [
        [
            'key'           => 'field_mb_footer_description',
            'label'         => 'Opis firmy (PL)',
            'name'          => 'footer_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Kompleksowa obsługa importu z Chin. Weryfikacja dostawców, logistyka i wsparcie na każdym etapie współpracy.',
        ],
        [
            'key'           => 'field_mb_footer_description_en',
            'label'         => 'Opis firmy (EN)',
            'name'          => 'footer_description_en',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Comprehensive import service from China. Supplier verification, logistics, and support at every stage of cooperation.',
        ],
        [
            'key'           => 'field_mb_footer_col_services_label',
            'label'         => 'Nagłówek kolumny – Usługi (PL)',
            'name'          => 'footer_col_services_label',
            'type'          => 'text',
            'default_value' => 'Usługi',
        ],
        [
            'key'           => 'field_mb_footer_col_services_label_en',
            'label'         => 'Nagłówek kolumny – Usługi (EN)',
            'name'          => 'footer_col_services_label_en',
            'type'          => 'text',
            'default_value' => 'Services',
        ],
        [
            'key'          => 'field_mb_footer_services_items',
            'label'        => 'Usługi – linki',
            'name'         => 'footer_services_items',
            'type'         => 'repeater',
            'min'          => 1,
            'max'          => 8,
            'layout'       => 'table',
            'button_label' => 'Dodaj link',
            'sub_fields'   => [
                [
                    'key'   => 'field_mb_footer_service_label',
                    'label' => 'Treść (PL)',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_mb_footer_service_label_en',
                    'label' => 'Treść (EN)',
                    'name'  => 'label_en',
                    'type'  => 'text',
                ],
                [
                    'key'           => 'field_mb_footer_service_url',
                    'label'         => 'URL (PL)',
                    'name'          => 'url',
                    'type'          => 'url',
                    'default_value' => '#',
                ],
                [
                    'key'           => 'field_mb_footer_service_url_en',
                    'label'         => 'URL (EN)',
                    'name'          => 'url_en',
                    'type'          => 'url',
                    'default_value' => '#',
                ],
            ],
        ],
        [
            'key'           => 'field_mb_footer_col_company_label',
            'label'         => 'Nagłówek kolumny – Firma (PL)',
            'name'          => 'footer_col_company_label',
            'type'          => 'text',
            'default_value' => 'Firma',
        ],
        [
            'key'           => 'field_mb_footer_col_company_label_en',
            'label'         => 'Nagłówek kolumny – Firma (EN)',
            'name'          => 'footer_col_company_label_en',
            'type'          => 'text',
            'default_value' => 'Company',
        ],
        [
            'key'           => 'field_mb_footer_link_about',
            'label'         => 'Link – O firmie (PL)',
            'name'          => 'footer_link_about',
            'type'          => 'text',
            'default_value' => 'O firmie',
        ],
        [
            'key'           => 'field_mb_footer_link_about_en',
            'label'         => 'Link – O firmie (EN)',
            'name'          => 'footer_link_about_en',
            'type'          => 'text',
            'default_value' => 'About us',
        ],
        [
            'key'           => 'field_mb_footer_link_references',
            'label'         => 'Link – Referencje (PL)',
            'name'          => 'footer_link_references',
            'type'          => 'text',
            'default_value' => 'Referencje',
        ],
        [
            'key'           => 'field_mb_footer_link_references_en',
            'label'         => 'Link – Referencje (EN)',
            'name'          => 'footer_link_references_en',
            'type'          => 'text',
            'default_value' => 'References',
        ],
        [
            'key'           => 'field_mb_footer_link_casestudies',
            'label'         => 'Link – Case study (PL)',
            'name'          => 'footer_link_casestudies',
            'type'          => 'text',
            'default_value' => 'Case study',
        ],
        [
            'key'           => 'field_mb_footer_link_casestudies_en',
            'label'         => 'Link – Case study (EN)',
            'name'          => 'footer_link_casestudies_en',
            'type'          => 'text',
            'default_value' => 'Case studies',
        ],
        [
            'key'           => 'field_mb_footer_link_blog',
            'label'         => 'Link – Baza wiedzy (PL)',
            'name'          => 'footer_link_blog',
            'type'          => 'text',
            'default_value' => 'Baza wiedzy',
        ],
        [
            'key'           => 'field_mb_footer_link_blog_en',
            'label'         => 'Link – Baza wiedzy (EN)',
            'name'          => 'footer_link_blog_en',
            'type'          => 'text',
            'default_value' => 'Knowledge base',
        ],
        [
            'key'           => 'field_mb_footer_link_career',
            'label'         => 'Link – Praca (PL)',
            'name'          => 'footer_link_career',
            'type'          => 'text',
            'default_value' => 'Praca',
        ],
        [
            'key'           => 'field_mb_footer_link_career_en',
            'label'         => 'Link – Praca (EN)',
            'name'          => 'footer_link_career_en',
            'type'          => 'text',
            'default_value' => 'Career',
        ],
        [
            'key'           => 'field_mb_footer_link_quote',
            'label'         => 'Link – Wyceń produkt (PL)',
            'name'          => 'footer_link_quote',
            'type'          => 'text',
            'default_value' => 'Wyceń produkt',
        ],
        [
            'key'           => 'field_mb_footer_link_quote_en',
            'label'         => 'Link – Wyceń produkt (EN)',
            'name'          => 'footer_link_quote_en',
            'type'          => 'text',
            'default_value' => 'Get a quote',
        ],
        [
            'key'           => 'field_mb_footer_col_contact_label',
            'label'         => 'Nagłówek kolumny – Kontakt (PL)',
            'name'          => 'footer_col_contact_label',
            'type'          => 'text',
            'default_value' => 'Kontakt',
        ],
        [
            'key'           => 'field_mb_footer_col_contact_label_en',
            'label'         => 'Nagłówek kolumny – Kontakt (EN)',
            'name'          => 'footer_col_contact_label_en',
            'type'          => 'text',
            'default_value' => 'Contact',
        ],
        [
            'key'           => 'field_mb_footer_phone',
            'label'         => 'Telefon',
            'name'          => 'footer_phone',
            'type'          => 'text',
            'default_value' => '+48 123 456 789',
        ],
        [
            'key'           => 'field_mb_footer_email',
            'label'         => 'E-mail',
            'name'          => 'footer_email',
            'type'          => 'email',
            'default_value' => 'kontakt@importio.pl',
        ],
        [
            'key'           => 'field_mb_footer_address',
            'label'         => 'Adres',
            'name'          => 'footer_address',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => "ul. Przykładowa 123\n00-000 Warszawa",
        ],
        [
            'key'           => 'field_mb_footer_copyright_text',
            'label'         => 'Tekst praw autorskich (PL)',
            'name'          => 'footer_copyright_text',
            'type'          => 'text',
            'instructions'  => 'Poprzedzone automatycznie znakiem © i bieżącym rokiem.',
            'default_value' => 'Wszelkie prawa zastrzeżone.',
        ],
        [
            'key'           => 'field_mb_footer_copyright_text_en',
            'label'         => 'Tekst praw autorskich (EN)',
            'name'          => 'footer_copyright_text_en',
            'type'          => 'text',
            'instructions'  => 'Poprzedzone automatycznie znakiem © i bieżącym rokiem.',
            'default_value' => 'All rights reserved.',
        ],
        [
            'key'           => 'field_mb_footer_privacy_link_text',
            'label'         => 'Link – polityka prywatności, tekst (PL)',
            'name'          => 'footer_privacy_link_text',
            'type'          => 'text',
            'default_value' => 'Polityka prywatności i cookies',
        ],
        [
            'key'           => 'field_mb_footer_privacy_link_text_en',
            'label'         => 'Link – polityka prywatności, tekst (EN)',
            'name'          => 'footer_privacy_link_text_en',
            'type'          => 'text',
            'default_value' => 'Privacy policy and cookies',
        ],
        [
            'key'           => 'field_mb_footer_privacy_link_url',
            'label'         => 'Link – polityka prywatności, URL (PL)',
            'name'          => 'footer_privacy_link_url',
            'type'          => 'url',
            'default_value' => '#',
        ],
        [
            'key'           => 'field_mb_footer_privacy_link_url_en',
            'label'         => 'Link – polityka prywatności, URL (EN)',
            'name'          => 'footer_privacy_link_url_en',
            'type'          => 'url',
            'default_value' => '#',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 10,
]);

// ─── CTA Banner ───────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_cta_banner',
    'title'      => 'CTA Banner',
    'fields'     => [
        [
            'key'           => 'field_mb_cta_heading_before',
            'label'         => 'Nagłówek – początek (PL)',
            'name'          => 'cta_heading_before',
            'type'          => 'text',
            'default_value' => 'Chcesz sprawdzić ',
        ],
        [
            'key'           => 'field_mb_cta_heading_before_en',
            'label'         => 'Nagłówek – początek (EN)',
            'name'          => 'cta_heading_before_en',
            'type'          => 'text',
            'default_value' => 'Want to check ',
        ],
        [
            'key'           => 'field_mb_cta_heading_bold',
            'label'         => 'Nagłówek – pogrubiony fragment (PL)',
            'name'          => 'cta_heading_bold',
            'type'          => 'text',
            'default_value' => 'możliwości importu',
        ],
        [
            'key'           => 'field_mb_cta_heading_bold_en',
            'label'         => 'Nagłówek – pogrubiony fragment (EN)',
            'name'          => 'cta_heading_bold_en',
            'type'          => 'text',
            'default_value' => 'the import options',
        ],
        [
            'key'           => 'field_mb_cta_heading_after',
            'label'         => 'Nagłówek – zakończenie (PL)',
            'name'          => 'cta_heading_after',
            'type'          => 'text',
            'default_value' => ' swojego produktu?',
        ],
        [
            'key'           => 'field_mb_cta_heading_after_en',
            'label'         => 'Nagłówek – zakończenie (EN)',
            'name'          => 'cta_heading_after_en',
            'type'          => 'text',
            'default_value' => ' for your product?',
        ],
        [
            'key'           => 'field_mb_cta_description',
            'label'         => 'Opis (PL)',
            'name'          => 'cta_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Prześlij link, zdjęcie lub krótki opis produktu, a przeanalizujemy możliwości jego importu oraz przygotujemy wstępną wycenę współpracy.',
        ],
        [
            'key'           => 'field_mb_cta_description_en',
            'label'         => 'Opis (EN)',
            'name'          => 'cta_description_en',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Send us a link, photo or short description of the product, and we will analyze its import options and prepare an initial quote for the cooperation.',
        ],
        [
            'key'           => 'field_mb_cta_button_text',
            'label'         => 'Przycisk główny – tekst (PL)',
            'name'          => 'cta_button_text',
            'type'          => 'text',
            'default_value' => 'Bezpłatna wycena produktów',
        ],
        [
            'key'           => 'field_mb_cta_button_text_en',
            'label'         => 'Przycisk główny – tekst (EN)',
            'name'          => 'cta_button_text_en',
            'type'          => 'text',
            'default_value' => 'Free product quote',
        ],
        [
            'key'           => 'field_mb_cta_button_url',
            'label'         => 'Przycisk główny – URL (PL)',
            'name'          => 'cta_button_url',
            'type'          => 'url',
            'default_value' => '/wycena-produktu/',
        ],
        [
            'key'           => 'field_mb_cta_button_url_en',
            'label'         => 'Przycisk główny – URL (EN)',
            'name'          => 'cta_button_url_en',
            'type'          => 'url',
            'default_value' => '/en/product-quote/',
        ],
        [
            'key'           => 'field_mb_cta_button_secondary_text',
            'label'         => 'Przycisk dodatkowy – tekst (PL)',
            'name'          => 'cta_button_secondary_text',
            'type'          => 'text',
            'default_value' => 'Poznaj naszą ofertę',
        ],
        [
            'key'           => 'field_mb_cta_button_secondary_text_en',
            'label'         => 'Przycisk dodatkowy – tekst (EN)',
            'name'          => 'cta_button_secondary_text_en',
            'type'          => 'text',
            'default_value' => 'See our offer',
        ],
        [
            'key'           => 'field_mb_cta_button_secondary_url',
            'label'         => 'Przycisk dodatkowy – URL (PL)',
            'name'          => 'cta_button_secondary_url',
            'type'          => 'url',
            'default_value' => '/',
        ],
        [
            'key'           => 'field_mb_cta_button_secondary_url_en',
            'label'         => 'Przycisk dodatkowy – URL (EN)',
            'name'          => 'cta_button_secondary_url_en',
            'type'          => 'url',
            'default_value' => '/en/homepage/',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 20,
]);

// ─── Nawigacja ────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_nav',
    'title'      => 'Nawigacja',
    'fields'     => [
        [
            'key'           => 'field_mb_nav_cta_text',
            'label'         => 'Przycisk CTA – tekst (PL)',
            'name'          => 'nav_cta_text',
            'type'          => 'text',
            'default_value' => 'Bezpłatna wycena produktów',
        ],
        [
            'key'           => 'field_mb_nav_cta_text_en',
            'label'         => 'Przycisk CTA – tekst (EN)',
            'name'          => 'nav_cta_text_en',
            'type'          => 'text',
            'default_value' => 'Free product quote',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 5,
]);

// ─── Strona 404 ───────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_404',
    'title'      => 'Strona 404',
    'fields'     => [
        [
            'key'           => 'field_mb_404_heading_regular',
            'label'         => 'Nagłówek – fragment zwykły (PL)',
            'name'          => 'notfound_heading_regular',
            'type'          => 'text',
            'default_value' => 'Nie znaleźliśmy',
        ],
        [
            'key'           => 'field_mb_404_heading_regular_en',
            'label'         => 'Nagłówek – fragment zwykły (EN)',
            'name'          => 'notfound_heading_regular_en',
            'type'          => 'text',
            'default_value' => 'We couldn\'t find',
        ],
        [
            'key'           => 'field_mb_404_heading_bold',
            'label'         => 'Nagłówek – fragment pogrubiony (PL)',
            'name'          => 'notfound_heading_bold',
            'type'          => 'text',
            'default_value' => 'szukanej strony',
        ],
        [
            'key'           => 'field_mb_404_heading_bold_en',
            'label'         => 'Nagłówek – fragment pogrubiony (EN)',
            'name'          => 'notfound_heading_bold_en',
            'type'          => 'text',
            'default_value' => 'the page you\'re looking for',
        ],
        [
            'key'           => 'field_mb_404_description',
            'label'         => 'Opis (PL)',
            'name'          => 'notfound_description',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'Strona, której szukasz, mogła zostać przeniesiona lub usunięta. Wróć na stronę główną albo skontaktuj się z nami, a chętnie pomożemy.',
        ],
        [
            'key'           => 'field_mb_404_description_en',
            'label'         => 'Opis (EN)',
            'name'          => 'notfound_description_en',
            'type'          => 'textarea',
            'rows'          => 3,
            'default_value' => 'The page you are looking for may have been moved or deleted. Go back to the homepage or contact us — we\'ll be happy to help.',
        ],
        [
            'key'           => 'field_mb_404_button_text',
            'label'         => 'Przycisk główny – tekst (PL)',
            'name'          => 'notfound_button_text',
            'type'          => 'text',
            'default_value' => 'Wróć na stronę główną',
        ],
        [
            'key'           => 'field_mb_404_button_text_en',
            'label'         => 'Przycisk główny – tekst (EN)',
            'name'          => 'notfound_button_text_en',
            'type'          => 'text',
            'default_value' => 'Back to homepage',
        ],
        [
            'key'           => 'field_mb_404_button_secondary_text',
            'label'         => 'Przycisk dodatkowy – tekst (PL)',
            'name'          => 'notfound_button_secondary_text',
            'type'          => 'text',
            'default_value' => 'Skontaktuj się z nami',
        ],
        [
            'key'           => 'field_mb_404_button_secondary_text_en',
            'label'         => 'Przycisk dodatkowy – tekst (EN)',
            'name'          => 'notfound_button_secondary_text_en',
            'type'          => 'text',
            'default_value' => 'Contact us',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 40,
]);

// ─── Case study – archiwum i etykiety ───────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_case_study_archive',
    'title'      => 'Case study – archiwum',
    'fields'     => [
        [
            'key'           => 'field_mb_csarchive_heading',
            'label'         => 'Nagłówek (PL)',
            'name'          => 'csarchive_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => 'Historie <b>naszych realizacji</b>',
        ],
        [
            'key'           => 'field_mb_csarchive_heading_en',
            'label'         => 'Nagłówek (EN)',
            'name'          => 'csarchive_heading_en',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => 'Stories of <b>our projects</b>',
        ],
        [
            'key'           => 'field_mb_csarchive_description',
            'label'         => 'Opis (PL)',
            'name'          => 'csarchive_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Zobacz wybrane projekty importowe zrealizowane dla naszych klientów.',
        ],
        [
            'key'           => 'field_mb_csarchive_description_en',
            'label'         => 'Opis (EN)',
            'name'          => 'csarchive_description_en',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Browse selected import projects completed for our clients.',
        ],
        [
            'key'           => 'field_mb_csarchive_image',
            'label'         => 'Zdjęcie',
            'name'          => 'csarchive_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_csarchive_card_button_text',
            'label'         => 'Karta – przycisk (PL)',
            'name'          => 'csarchive_card_button_text',
            'type'          => 'text',
            'default_value' => 'Zobacz szczegóły',
        ],
        [
            'key'           => 'field_mb_csarchive_card_button_text_en',
            'label'         => 'Karta – przycisk (EN)',
            'name'          => 'csarchive_card_button_text_en',
            'type'          => 'text',
            'default_value' => 'See details',
        ],
        [
            'key'           => 'field_mb_csarchive_pagination_aria_label',
            'label'         => 'Paginacja – aria-label (PL)',
            'name'          => 'csarchive_pagination_aria_label',
            'type'          => 'text',
            'default_value' => 'Nawigacja po case studies',
        ],
        [
            'key'           => 'field_mb_csarchive_pagination_aria_label_en',
            'label'         => 'Paginacja – aria-label (EN)',
            'name'          => 'csarchive_pagination_aria_label_en',
            'type'          => 'text',
            'default_value' => 'Case studies navigation',
        ],
        [
            'key'           => 'field_mb_csarchive_empty_text',
            'label'         => 'Tekst przy braku wpisów (PL)',
            'name'          => 'csarchive_empty_text',
            'type'          => 'text',
            'default_value' => 'Brak case studies do wyświetlenia.',
        ],
        [
            'key'           => 'field_mb_csarchive_empty_text_en',
            'label'         => 'Tekst przy braku wpisów (EN)',
            'name'          => 'csarchive_empty_text_en',
            'type'          => 'text',
            'default_value' => 'No case studies to display.',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 20,
]);

acf_add_local_field_group([
    'key'        => 'group_mb_case_study_labels',
    'title'      => 'Case study – etykiety sekcji',
    'fields'     => [
        [
            'key'           => 'field_mb_cs_label_challenge',
            'label'         => 'Etykieta – Wyzwanie (PL)',
            'name'          => 'cs_label_challenge',
            'type'          => 'text',
            'default_value' => 'Wyzwanie',
        ],
        [
            'key'           => 'field_mb_cs_label_challenge_en',
            'label'         => 'Etykieta – Wyzwanie (EN)',
            'name'          => 'cs_label_challenge_en',
            'type'          => 'text',
            'default_value' => 'Challenge',
        ],
        [
            'key'           => 'field_mb_cs_label_client',
            'label'         => 'Etykieta – O kliencie (PL)',
            'name'          => 'cs_label_client',
            'type'          => 'text',
            'default_value' => 'O kliencie',
        ],
        [
            'key'           => 'field_mb_cs_label_client_en',
            'label'         => 'Etykieta – O kliencie (EN)',
            'name'          => 'cs_label_client_en',
            'type'          => 'text',
            'default_value' => 'About the client',
        ],
        [
            'key'           => 'field_mb_cs_label_actions_regular',
            'label'         => 'Etykieta – Nasze działania, fragment zwykły (PL)',
            'name'          => 'cs_label_actions_regular',
            'type'          => 'text',
            'default_value' => 'Nasze',
        ],
        [
            'key'           => 'field_mb_cs_label_actions_regular_en',
            'label'         => 'Etykieta – Nasze działania, fragment zwykły (EN)',
            'name'          => 'cs_label_actions_regular_en',
            'type'          => 'text',
            'default_value' => 'Our',
        ],
        [
            'key'           => 'field_mb_cs_label_actions_bold',
            'label'         => 'Etykieta – Nasze działania, fragment pogrubiony (PL)',
            'name'          => 'cs_label_actions_bold',
            'type'          => 'text',
            'default_value' => 'działania',
        ],
        [
            'key'           => 'field_mb_cs_label_actions_bold_en',
            'label'         => 'Etykieta – Nasze działania, fragment pogrubiony (EN)',
            'name'          => 'cs_label_actions_bold_en',
            'type'          => 'text',
            'default_value' => 'actions',
        ],
        [
            'key'           => 'field_mb_cs_label_results',
            'label'         => 'Etykieta – Rezultaty (PL)',
            'name'          => 'cs_label_results',
            'type'          => 'text',
            'default_value' => 'Rezultaty',
        ],
        [
            'key'           => 'field_mb_cs_label_results_en',
            'label'         => 'Etykieta – Rezultaty (EN)',
            'name'          => 'cs_label_results_en',
            'type'          => 'text',
            'default_value' => 'Results',
        ],
        [
            'key'           => 'field_mb_cs_label_key_effects_regular',
            'label'         => 'Etykieta – Kluczowe efekty, fragment zwykły (PL)',
            'name'          => 'cs_label_key_effects_regular',
            'type'          => 'text',
            'default_value' => 'Kluczowe',
        ],
        [
            'key'           => 'field_mb_cs_label_key_effects_regular_en',
            'label'         => 'Etykieta – Kluczowe efekty, fragment zwykły (EN)',
            'name'          => 'cs_label_key_effects_regular_en',
            'type'          => 'text',
            'default_value' => 'Key',
        ],
        [
            'key'           => 'field_mb_cs_label_key_effects_bold',
            'label'         => 'Etykieta – Kluczowe efekty, fragment pogrubiony (PL)',
            'name'          => 'cs_label_key_effects_bold',
            'type'          => 'text',
            'default_value' => 'efekty',
        ],
        [
            'key'           => 'field_mb_cs_label_key_effects_bold_en',
            'label'         => 'Etykieta – Kluczowe efekty, fragment pogrubiony (EN)',
            'name'          => 'cs_label_key_effects_bold_en',
            'type'          => 'text',
            'default_value' => 'outcomes',
        ],
        [
            'key'           => 'field_mb_cs_label_related_regular',
            'label'         => 'Etykieta – Zobacz także, fragment zwykły (PL)',
            'name'          => 'cs_label_related_regular',
            'type'          => 'text',
            'default_value' => 'Zobacz',
        ],
        [
            'key'           => 'field_mb_cs_label_related_regular_en',
            'label'         => 'Etykieta – Zobacz także, fragment zwykły (EN)',
            'name'          => 'cs_label_related_regular_en',
            'type'          => 'text',
            'default_value' => 'See',
        ],
        [
            'key'           => 'field_mb_cs_label_related_bold',
            'label'         => 'Etykieta – Zobacz także, fragment pogrubiony (PL)',
            'name'          => 'cs_label_related_bold',
            'type'          => 'text',
            'default_value' => 'także',
        ],
        [
            'key'           => 'field_mb_cs_label_related_bold_en',
            'label'         => 'Etykieta – Zobacz także, fragment pogrubiony (EN)',
            'name'          => 'cs_label_related_bold_en',
            'type'          => 'text',
            'default_value' => 'also',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 21,
]);

// ─── Baza wiedzy – archiwum ─────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_blog_archive',
    'title'      => 'Baza wiedzy – archiwum',
    'fields'     => [
        [
            'key'           => 'field_mb_blogarchive_heading',
            'label'         => 'Nagłówek (PL)',
            'name'          => 'blogarchive_heading',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => '<b>Wiedza</b> o imporcie w praktyce',
        ],
        [
            'key'           => 'field_mb_blogarchive_heading_en',
            'label'         => 'Nagłówek (EN)',
            'name'          => 'blogarchive_heading_en',
            'type'          => 'text',
            'instructions'  => 'Fragment do pogrubienia otocz tagiem <b>...</b>, a wiersz złam tagiem <br>.',
            'default_value' => '<b>Knowledge</b> about importing in practice',
        ],
        [
            'key'           => 'field_mb_blogarchive_description',
            'label'         => 'Opis (PL)',
            'name'          => 'blogarchive_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Publikujemy poradniki, analizy i aktualności związane z importem z Chin, logistyką, cłem oraz współpracą z producentami.',
        ],
        [
            'key'           => 'field_mb_blogarchive_description_en',
            'label'         => 'Opis (EN)',
            'name'          => 'blogarchive_description_en',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'We publish guides, analyses and news related to importing from China, logistics, customs, and working with manufacturers.',
        ],
        [
            'key'           => 'field_mb_blogarchive_image',
            'label'         => 'Zdjęcie',
            'name'          => 'blogarchive_image',
            'type'          => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
        [
            'key'           => 'field_mb_blogarchive_category_prefix',
            'label'         => 'Prefiks nagłówka archiwum kategorii (PL)',
            'name'          => 'blogarchive_category_prefix',
            'type'          => 'text',
            'instructions'  => 'Wyświetlany przed nazwą kategorii na stronie archiwum kategorii bloga.',
            'default_value' => 'Baza wiedzy:',
        ],
        [
            'key'           => 'field_mb_blogarchive_category_prefix_en',
            'label'         => 'Prefiks nagłówka archiwum kategorii (EN)',
            'name'          => 'blogarchive_category_prefix_en',
            'type'          => 'text',
            'instructions'  => 'Wyświetlany przed nazwą kategorii na stronie archiwum kategorii bloga.',
            'default_value' => 'Knowledge base:',
        ],
        [
            'key'           => 'field_mb_blogarchive_all_label',
            'label'         => 'Etykieta filtra – Wszystkie (PL)',
            'name'          => 'blogarchive_all_label',
            'type'          => 'text',
            'default_value' => 'Wszystkie',
        ],
        [
            'key'           => 'field_mb_blogarchive_all_label_en',
            'label'         => 'Etykieta filtra – Wszystkie (EN)',
            'name'          => 'blogarchive_all_label_en',
            'type'          => 'text',
            'default_value' => 'All',
        ],
        [
            'key'           => 'field_mb_blogarchive_card_button_text',
            'label'         => 'Karta – przycisk (PL)',
            'name'          => 'blogarchive_card_button_text',
            'type'          => 'text',
            'default_value' => 'Czytaj więcej',
        ],
        [
            'key'           => 'field_mb_blogarchive_card_button_text_en',
            'label'         => 'Karta – przycisk (EN)',
            'name'          => 'blogarchive_card_button_text_en',
            'type'          => 'text',
            'default_value' => 'Read more',
        ],
        [
            'key'           => 'field_mb_blogarchive_pagination_aria_label',
            'label'         => 'Paginacja – aria-label (PL)',
            'name'          => 'blogarchive_pagination_aria_label',
            'type'          => 'text',
            'default_value' => 'Nawigacja po wpisach',
        ],
        [
            'key'           => 'field_mb_blogarchive_pagination_aria_label_en',
            'label'         => 'Paginacja – aria-label (EN)',
            'name'          => 'blogarchive_pagination_aria_label_en',
            'type'          => 'text',
            'default_value' => 'Posts navigation',
        ],
        [
            'key'           => 'field_mb_blogarchive_empty_text',
            'label'         => 'Tekst przy braku wpisów (PL)',
            'name'          => 'blogarchive_empty_text',
            'type'          => 'text',
            'default_value' => 'Brak artykułów do wyświetlenia.',
        ],
        [
            'key'           => 'field_mb_blogarchive_empty_text_en',
            'label'         => 'Tekst przy braku wpisów (EN)',
            'name'          => 'blogarchive_empty_text_en',
            'type'          => 'text',
            'default_value' => 'No articles to display.',
        ],
        [
            'key'           => 'field_mb_blog_related_heading_regular',
            'label'         => 'Wpis – "Zobacz także", fragment zwykły (PL)',
            'name'          => 'blog_related_heading_regular',
            'type'          => 'text',
            'default_value' => 'także',
        ],
        [
            'key'           => 'field_mb_blog_related_heading_regular_en',
            'label'         => 'Wpis – "Zobacz także", fragment zwykły (EN)',
            'name'          => 'blog_related_heading_regular_en',
            'type'          => 'text',
            'default_value' => 'also',
        ],
        [
            'key'           => 'field_mb_blog_related_heading_bold',
            'label'         => 'Wpis – "Zobacz także", fragment pogrubiony (PL)',
            'name'          => 'blog_related_heading_bold',
            'type'          => 'text',
            'default_value' => 'Zobacz',
        ],
        [
            'key'           => 'field_mb_blog_related_heading_bold_en',
            'label'         => 'Wpis – "Zobacz także", fragment pogrubiony (EN)',
            'name'          => 'blog_related_heading_bold_en',
            'type'          => 'text',
            'default_value' => 'See',
        ],
        [
            'key'           => 'field_mb_blog_post_cta_heading_after',
            'label'         => 'Wpis – CTA, zakończenie nagłówka (PL)',
            'name'          => 'blog_post_cta_heading_after',
            'type'          => 'text',
            'default_value' => ' swojego produktu?',
        ],
        [
            'key'           => 'field_mb_blog_post_cta_heading_after_en',
            'label'         => 'Wpis – CTA, zakończenie nagłówka (EN)',
            'name'          => 'blog_post_cta_heading_after_en',
            'type'          => 'text',
            'default_value' => ' for your product?',
        ],
        [
            'key'           => 'field_mb_blog_post_cta_description',
            'label'         => 'Wpis – CTA, opis (PL)',
            'name'          => 'blog_post_cta_description',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Prześlij link, zdjęcie lub krótki opis produktu, a przygotujemy wstępną analizę możliwości importu.',
        ],
        [
            'key'           => 'field_mb_blog_post_cta_description_en',
            'label'         => 'Wpis – CTA, opis (EN)',
            'name'          => 'blog_post_cta_description_en',
            'type'          => 'textarea',
            'rows'          => 2,
            'default_value' => 'Send us a link, photo or short description of the product, and we will prepare an initial import feasibility analysis.',
        ],
        [
            'key'           => 'field_mb_blog_post_cta_button_text',
            'label'         => 'Wpis – CTA, przycisk (PL)',
            'name'          => 'blog_post_cta_button_text',
            'type'          => 'text',
            'default_value' => 'Wyceń produkt',
        ],
        [
            'key'           => 'field_mb_blog_post_cta_button_text_en',
            'label'         => 'Wpis – CTA, przycisk (EN)',
            'name'          => 'blog_post_cta_button_text_en',
            'type'          => 'text',
            'default_value' => 'Get a quote',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 30,
]);

// ─── Paginacja ────────────────────────────────────────────────────────────────

acf_add_local_field_group([
    'key'        => 'group_mb_pagination',
    'title'      => 'Paginacja',
    'fields'     => [
        [
            'key'           => 'field_mb_pagination_prev_text',
            'label'         => 'Poprzednia – tekst (PL)',
            'name'          => 'pagination_prev_text',
            'type'          => 'text',
            'default_value' => 'Poprzednia',
        ],
        [
            'key'           => 'field_mb_pagination_prev_text_en',
            'label'         => 'Poprzednia – tekst (EN)',
            'name'          => 'pagination_prev_text_en',
            'type'          => 'text',
            'default_value' => 'Previous',
        ],
        [
            'key'           => 'field_mb_pagination_next_text',
            'label'         => 'Następna – tekst (PL)',
            'name'          => 'pagination_next_text',
            'type'          => 'text',
            'default_value' => 'Następna',
        ],
        [
            'key'           => 'field_mb_pagination_next_text_en',
            'label'         => 'Następna – tekst (EN)',
            'name'          => 'pagination_next_text_en',
            'type'          => 'text',
            'default_value' => 'Next',
        ],
        [
            'key'           => 'field_mb_pagination_default_aria_label',
            'label'         => 'Domyślny aria-label (PL)',
            'name'          => 'pagination_default_aria_label',
            'type'          => 'text',
            'default_value' => 'Nawigacja po stronach',
        ],
        [
            'key'           => 'field_mb_pagination_default_aria_label_en',
            'label'         => 'Domyślny aria-label (EN)',
            'name'          => 'pagination_default_aria_label_en',
            'type'          => 'text',
            'default_value' => 'Page navigation',
        ],
    ],
    'location'   => $options_location,
    'menu_order' => 90,
]);
