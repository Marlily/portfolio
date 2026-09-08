<?php

function qorttheme_register_blocks() {
    wp_register_script(
        'qort-slider-zdjec-editor',
        get_template_directory_uri() . '/blocks/slider-zdjec/editor.js',
        [ 'wp-blocks', 'wp-block-editor', 'wp-element', 'wp-components' ],
        wp_get_theme()->get( 'Version' ),
        true
    );

    register_block_type( 'qort/slider-zdjec', [
        'title'           => 'Slider ze zdjęciami',
        'category'        => 'media',
        'icon'            => 'images-alt2',
        'editor_script'   => 'qort-slider-zdjec-editor',
        'attributes'      => [
            'imageIds' => [
                'type'    => 'array',
                'items'   => [ 'type' => 'integer' ],
                'default' => [],
            ],
        ],
        'render_callback' => 'qorttheme_render_slider_zdjec',
    ] );
}
add_action( 'init', 'qorttheme_register_blocks' );


function qorttheme_render_slider_zdjec( $attributes ) {
    $image_ids = array_filter( array_map( 'absint', $attributes['imageIds'] ?? [] ) );
    if ( empty( $image_ids ) ) {
        return '';
    }

    $images = [];
    foreach ( $image_ids as $id ) {
        $url = wp_get_attachment_image_url( $id, 'full' );
        if ( ! $url ) {
            continue;
        }
        $images[] = [
            'url' => $url,
            'alt' => (string) get_post_meta( $id, '_wp_attachment_image_alt', true ),
        ];
    }

    if ( empty( $images ) ) {
        return '';
    }

    $block_id = wp_unique_id( 'foto-slider-' );

    ob_start();
    include get_template_directory() . '/template-parts/blocks/slider-zdjec.php';
    return ob_get_clean();
}
