<?php

function importio_get_icon($name, $classes = '', $fill = null) {
    $path = get_template_directory() . '/img/icon-' . $name . '.svg';

    if (!file_exists($path)) {
        return '';
    }

    $svg = file_get_contents($path);
    $svg = preg_replace('/\s(width|height)="[^"]*"/', '', $svg, 2);

    if ($fill) {
        $svg = str_replace('fill="white"', 'fill="' . esc_attr($fill) . '"', $svg);
    }

    if ($classes) {
        $svg = preg_replace('/^<svg /', '<svg class="' . esc_attr($classes) . '" ', $svg, 1);
    }

    return $svg;
}

function importio_get_menu_items() {
    $locations = get_nav_menu_locations();

    if (!empty($locations['primary'])) {
        $menu       = wp_get_nav_menu_object($locations['primary']);
        $menu_items = $menu ? wp_get_nav_menu_items($menu->term_id) : [];

        if ($menu_items) {
            $children = [];

            foreach ($menu_items as $menu_item) {
                if ($menu_item->menu_item_parent) {
                    $children[$menu_item->menu_item_parent][] = [
                        'label' => $menu_item->title,
                        'url'   => $menu_item->url,
                    ];
                }
            }

            $items = [];

            foreach ($menu_items as $menu_item) {
                if ($menu_item->menu_item_parent) {
                    continue;
                }

                $items[] = [
                    'label'    => $menu_item->title,
                    'url'      => $menu_item->url,
                    'caret'    => isset($children[$menu_item->ID]),
                    'children' => $children[$menu_item->ID] ?? [],
                ];
            }

            return $items;
        }
    }

    return [
        [
            'label'    => pll__('Usługi'),
            'url'      => '#',
            'caret'    => true,
            'children' => [
                ['label' => pll__('Import hurtowy z Chin'), 'url' => '#'],
                ['label' => pll__('Import maszyn z Chin'), 'url' => '#'],
                ['label' => pll__('Dla sklepów e-commerce'), 'url' => '#'],
                ['label' => pll__('Dla firm produkcyjnych'), 'url' => '#'],
                ['label' => pll__('Dla hurtowników'), 'url' => '#'],
                ['label' => pll__('Dla usługodawców'), 'url' => '#'],
            ],
        ],
        ['label' => pll__('Portal B2B'), 'url' => '#', 'caret' => false, 'children' => []],
        [
            'label'    => pll__('O nas'),
            'url'      => '#',
            'caret'    => true,
            'children' => [
                ['label' => pll__('O firmie'), 'url' => importio_translated_page_url('o-firmie')],
                ['label' => pll__('Referencje'), 'url' => importio_translated_page_url('referencje')],
                ['label' => pll__('Case study'), 'url' => get_post_type_archive_link('case_study') ?: '#'],
                ['label' => pll__('Praca'), 'url' => importio_translated_page_url('praca')],
            ],
        ],
        ['label' => pll__('Baza wiedzy'), 'url' => get_permalink(get_option('page_for_posts')) ?: '#', 'caret' => false, 'children' => []],
        ['label' => pll__('Kontakt'), 'url' => importio_translated_page_url('kontakt'), 'caret' => false, 'children' => []],
    ];
}
