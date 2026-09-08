<?php

// ── CPT: Kadra ────────────────────────────────────────────────────────────────

function qorttheme_register_cpt_kadra() {
    register_post_type( 'kadra', [
        'labels' => [
            'name'               => 'Kadra',
            'singular_name'      => 'Osoba z kadry',
            'add_new'            => 'Dodaj osobę',
            'add_new_item'       => 'Dodaj nową osobę',
            'edit_item'          => 'Edytuj osobę',
            'new_item'           => 'Nowa osoba',
            'search_items'       => 'Szukaj w kadrze',
            'not_found'          => 'Nie znaleziono',
            'not_found_in_trash' => 'Brak w koszu',
        ],
        'public'          => false,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'show_in_rest'    => false,
        'supports'        => [ 'title', 'thumbnail', 'page-attributes' ],
        'menu_icon'       => 'dashicons-groups',
        'menu_position'   => 5,
    ] );
}
add_action( 'init', 'qorttheme_register_cpt_kadra' );


// ── Helper: pobierz panele dla zakładek kadry ─────────────────────────────────

function qorttheme_get_kadra_panels() {
    $tab_labels = [
        'trenerzy-tenisa' => 'Trenerzy tenisa',
        'kadra-medyczna'  => 'Sztab medyczny',
        'motoryka'        => 'Motoryka',
        'mental'          => 'Mental',
        'dietetyka'       => 'Dietetyka',
        'edukacja'        => 'Edukacja',
    ];
    $tabs    = array_keys( $tab_labels );
    $grouped = array_fill_keys( $tabs, [] );

    $query = new WP_Query( [
        'post_type'      => 'kadra',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ] );

    while ( $query->have_posts() ) {
        $query->the_post();
        $tab = get_field( 'zakladka' ) ?: 'trenerzy-tenisa';
        if ( ! array_key_exists( $tab, $grouped ) ) {
            $tab = 'trenerzy-tenisa';
        }
        $grouped[ $tab ][] = [
            'img'  => (string) get_field( 'zdjecie' ),
            'name' => get_the_title(),
            'role' => (string) get_field( 'rola' ),
            'bio'  => (string) get_field( 'bio' ),
        ];
    }
    wp_reset_postdata();

    $panels = [];
    foreach ( $tabs as $tab ) {
        $panels[] = [
            'slug'   => $tab,
            'label'  => $tab_labels[ $tab ],
            'people' => $grouped[ $tab ],
        ];
    }
    return $panels;
}
