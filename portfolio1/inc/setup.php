<?php 

// Allow SVG uploads
function qorttheme_allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'qorttheme_allow_svg_upload');

function qorttheme_fix_svg_mime_type($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext'] = 'svg';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'qorttheme_fix_svg_mime_type', 10, 4);

function qorttheme_fix_svg_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'qorttheme_fix_svg_display');

// menu
function qorttheme_register_menus() {
    register_nav_menus([
        'primary' => __('Menu główne', 'qorttheme'),
    ]);
        register_nav_menus([
        'footer' => __('Stopka', 'qorttheme'),
    ]);
}
add_action('after_setup_theme', 'qorttheme_register_menus');


// Site logo
function qorttheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}
add_action('after_setup_theme', 'qorttheme_setup');

function qorttheme_logo_url() {
    $id = get_theme_mod('custom_logo');
    return $id ? wp_get_attachment_image_url($id, 'full') : null;
}

// Contact 7 
add_filter('wpcf7_autop_or_not', '__return_false');

// Emoji
remove_action( 'wp_head',         'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email' );

// wp_head bloat
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Dequeue CF7 assets – tylko na stronach z formularzem
add_action( 'wp_enqueue_scripts', function () {
    if ( is_page_template( 'template-pages/homepage.php' ) ) return;
    wp_dequeue_script( 'contact-form-7' );
    wp_dequeue_style( 'contact-form-7' );
    wp_dequeue_script( 'wpcf7-recaptcha' );
}, 99 );

// Lazy load + decoding="async" na każdym <img> bez loading=
add_action( 'template_redirect', function () {
    if ( is_admin() || wp_doing_ajax() ) return;
    ob_start( function ( $html ) {
        return preg_replace_callback(
            '/<img([^>]+)>/i',
            function ( $m ) {
                $attrs = $m[1];
                if ( str_contains( $attrs, 'loading=' ) ) return $m[0];
                if ( ! str_contains( $attrs, 'decoding=' ) ) {
                    $attrs .= ' decoding="async"';
                }
                return '<img' . $attrs . ' loading="lazy">';
            },
            $html
        );
    } );
} );