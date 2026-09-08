<?php

// Pobiera pole z options page z automatycznym fallbackiem na wariant językowy (_en itp.)
function mb_option(string $name): mixed {
    $lang = function_exists('pll_current_language') ? pll_current_language() : 'pl';
    if ($lang && $lang !== 'pl') {
        $localized = get_field($name . '_' . $lang, 'option');
        if ($localized !== null && $localized !== '') {
            return $localized;
        }
    }
    return get_field($name, 'option');
}

// Lokalizuje wiersz repeatera — zamienia pola bazowe na warianty językowe (_en itp.) gdy są wypełnione
function mb_option_localize_row(array $row): array {
    $lang = function_exists('pll_current_language') ? pll_current_language() : 'pl';
    if ($lang && $lang !== 'pl') {
        $suffix = '_' . $lang;
        foreach (array_keys($row) as $key) {
            if (str_ends_with($key, $suffix)) {
                continue;
            }
            $localized_key = $key . $suffix;
            if (isset($row[$localized_key]) && $row[$localized_key] !== '') {
                $row[$key] = $row[$localized_key];
            }
        }
    }
    return $row;
}

// Contact Form 7: markup i style w pełni po stronie motywu (Tailwind)
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_load_css', '__return_false');
add_filter('wpcf7_load_js', '__return_true');

// Zwraca ID posta/strony w bieżącym języku Polylang (jeśli wtyczka jest aktywna)
function importio_translated_id($id) {
    if (!$id) {
        return $id;
    }

    return function_exists('pll_get_post') ? (pll_get_post($id) ?: $id) : $id;
}

// Zwraca link do strony o podanym slug, w bieżącym języku
function importio_translated_page_url($slug) {
    $page = get_page_by_path($slug);

    if (!$page) {
        return '#';
    }

    return get_permalink(importio_translated_id($page->ID)) ?: '#';
}

function importio_get_contact_form_id() {
    static $id = null;

    if ($id === null) {
        $form = get_page_by_path('formularz-kontaktowy', OBJECT, 'wpcf7_contact_form');
        $id   = $form ? importio_translated_id($form->ID) : 0;
    }

    return $id;
}

function importio_get_quote_form_id() {
    static $id = null;

    if ($id === null) {
        $form = get_page_by_path('formularz-wyceny', OBJECT, 'wpcf7_contact_form');
        $id   = $form ? importio_translated_id($form->ID) : 0;
    }

    return $id;
}

function importio_get_quote_page_url() {
    static $url = null;

    if ($url === null) {
        $pages = get_posts([
            'post_type'      => 'page',
            'posts_per_page' => 1,
            'meta_key'       => '_wp_page_template',
            'meta_value'     => 'template-pages/wycena.php',
            'lang'           => function_exists('pll_current_language') ? pll_current_language() : '',
        ]);
        $url = $pages ? get_permalink($pages[0]) : '#';
    }

    return $url;
}

// Allow SVG uploads
function mbtheme_allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'mbtheme_allow_svg_upload');

function mbtheme_fix_svg_mime_type($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext'] = 'svg';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'mbtheme_fix_svg_mime_type', 10, 4);

function mbtheme_fix_svg_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'mbtheme_fix_svg_display');

// main menu
function mbtheme_register_menus() {
    register_nav_menus([
        'primary' => __('Menu główne', 'mbtheme'),
    ]);
}
add_action('after_setup_theme', 'mbtheme_register_menus');

// Site logo
function mbtheme_setup() {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Wymagane, żeby WP (a za nim Yoast SEO) renderował tag <title> w <head>
    add_theme_support('title-tag');

    // Wymagane, żeby CPT-y zadeklarowane z 'supports' => ['thumbnail'] (np. usługi) miały w adminie box zdjęcia wyróżniającego
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mbtheme_setup');

function mbtheme_logo_url() {
    $id = get_theme_mod('custom_logo');
    return $id ? wp_get_attachment_image_url($id, 'full') : null;
}

// Case studies
function mbtheme_register_case_study_cpt() {
    register_post_type('case_study', [
        'labels' => [
            'name'          => 'Case studies',
            'singular_name' => 'Case study',
            'add_new_item'  => 'Dodaj case study',
            'edit_item'     => 'Edytuj case study',
            'new_item'      => 'Nowe case study',
            'all_items'     => 'Wszystkie case studies',
            'search_items'  => 'Szukaj case studies',
            'not_found'     => 'Nie znaleziono case studies',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'o-nas/case-study', 'with_front' => false],
        'menu_icon'    => 'dashicons-portfolio',
        'menu_position' => 20,
        'supports'     => ['title', 'excerpt', 'thumbnail'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('case_study_category', 'case_study', [
        'labels' => [
            'name'          => 'Kategorie case studies',
            'singular_name' => 'Kategoria',
            'add_new_item'  => 'Dodaj kategorię',
            'edit_item'     => 'Edytuj kategorię',
        ],
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => ['slug' => 'o-nas/case-study/kategoria'],
    ]);
}
add_action('init', 'mbtheme_register_case_study_cpt');

// Usługi
function mbtheme_register_usluga_cpt() {
    register_post_type('usluga', [
        'labels' => [
            'name'          => 'Usługi',
            'singular_name' => 'Usługa',
            'add_new_item'  => 'Dodaj usługę',
            'edit_item'     => 'Edytuj usługę',
            'new_item'      => 'Nowa usługa',
            'all_items'     => 'Wszystkie usługi',
            'search_items'  => 'Szukaj usług',
            'not_found'     => 'Nie znaleziono usług',
        ],
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => ['slug' => 'uslugi', 'with_front' => false],
        'menu_icon'     => 'dashicons-admin-tools',
        'menu_position' => 21,
        'supports'      => ['title', 'excerpt', 'thumbnail'],
        'show_in_rest'  => true,
    ]);
}
add_action('init', 'mbtheme_register_usluga_cpt');

// Polylang – rejestrujemy własne typy treści i taksonomię jako tłumaczalne
add_filter('pll_get_post_types', function ($post_types) {
    $post_types['case_study']         = 'case_study';
    $post_types['usluga']             = 'usluga';
    $post_types['wpcf7_contact_form'] = 'wpcf7_contact_form';

    return $post_types;
});

add_filter('pll_get_taxonomies', function ($taxonomies) {
    $taxonomies['case_study_category'] = 'case_study_category';

    return $taxonomies;
});

// CF7: dodaje multiple i accept do pola your-images (formularz wyceny)
add_filter('wpcf7_form_elements', function ($content) {
    return str_replace(
        'name="your-images"',
        'name="your-images" multiple accept=".jpg,.jpeg,.png,.webp"',
        $content
    );
});

// Domyślne opinie klientów (używane, gdy pole ACF "testimonials" jest puste)
function importio_default_testimonials() {
    return [
        ['testimonial_quote' => pll__('Import maszyny z Chin okazał się znacznie prostszy, niż początkowo zakładaliśmy.'), 'testimonial_name' => 'Tobiasz Lewandowski', 'testimonial_title' => pll__('prezes firmy produkcyjnej')],
        ['testimonial_quote' => pll__('Pomogli nam znaleźć dostawcę, który spełnił wszystkie nasze wymagania jakościowe.'), 'testimonial_name' => 'Olimpia Zielińska', 'testimonial_title' => pll__('kierownik zakupów')],
        ['testimonial_quote' => pll__('Dzięki Importio znaleźliśmy sprawdzonego producenta i obniżyliśmy koszty zakupu naszych produktów.'), 'testimonial_name' => 'Marek Urbanowicz', 'testimonial_title' => pll__('właściciel sklepu e-commerce')],
        ['testimonial_quote' => pll__('Zaoszczędziliśmy mnóstwo czasu, unikając błędów związanych z samodzielnym importem.'), 'testimonial_name' => 'Marek Wiśniewski', 'testimonial_title' => pll__('właściciel hurtowni')],
        ['testimonial_quote' => pll__('Cały proces importu przebiegł sprawnie i zgodnie z ustalonym harmonogramem.'), 'testimonial_name' => 'Karolina Nowak', 'testimonial_title' => pll__('dyrektor operacyjna')],
        ['testimonial_quote' => pll__('Dzięki wsparciu Importio znaleźliśmy nowych dostawców i poprawiliśmy rentowność zamówień.'), 'testimonial_name' => 'Paweł Kaczmarek', 'testimonial_title' => pll__('właściciel firmy handlowej')],
        ['testimonial_quote' => pll__('Otrzymaliśmy kompleksowe wsparcie od pierwszego zapytania aż po dostawę towaru.'), 'testimonial_name' => 'Monika Lewandowska', 'testimonial_title' => pll__('manager ds. zakupów')],
        ['testimonial_quote' => pll__('Współpraca pozwoliła nam bezpiecznie rozpocząć import produktów pod własną marką.'), 'testimonial_name' => 'Adam Zieliński', 'testimonial_title' => pll__('właściciel marki e-commerce')],
    ];
}