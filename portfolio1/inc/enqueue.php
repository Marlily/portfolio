<?php

function qorttheme_enqueue_assets() {

    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    /*
    |--------------------------------------------------------------------------
    | DEV SERVER (Vite HMR)
    |--------------------------------------------------------------------------
    */

    $vite_server = 'https://qort-ta.ddev.site:5174';

    $socket = @fsockopen('localhost', 5174, $errno, $errstr, 1);
    if ($socket) {
        fclose($socket);

        wp_enqueue_script(
            'vite-client',
            $vite_server . '/@vite/client',
            [],
            null,
            true
        );

        wp_enqueue_script(
            'qorttheme-nav',
            $vite_server . '/assets/js/nav.js',
            [],
            null,
            true
        );

        wp_enqueue_script(
            'qorttheme-app',
            $vite_server . '/assets/js/app.js',
            [],
            null,
            true
        );

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | PRODUCTION BUILD
    |--------------------------------------------------------------------------
    */

    $manifest_path = $theme_dir . '/dist/.vite/manifest.json';

    if (!file_exists($manifest_path)) {
        return;
    }

    $manifest = json_decode(
        file_get_contents($manifest_path),
        true
    );

    $entry_app = $manifest['assets/js/app.js'];
    $entry_nav = $manifest['assets/js/nav.js'] ?? null;

    /*
    |--------------------------------------------------------------------------
    | CSS
    |--------------------------------------------------------------------------
    */

    if (!empty($entry_app['css'])) {
        foreach ($entry_app['css'] as $css) {
            wp_enqueue_style(
                'qorttheme-style',
                $theme_uri . '/dist/' . $css,
                [],
                null
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | JS nav (krytyczny – wykluczony z JS Delay w LiteSpeed)
    |--------------------------------------------------------------------------
    */

    if ($entry_nav) {
        wp_enqueue_script(
            'qorttheme-nav',
            $theme_uri . '/dist/' . $entry_nav['file'],
            [],
            null,
            true
        );
    }

    /*
    |--------------------------------------------------------------------------
    | JS app (slidery, AOS – może być opóźniony przez LiteSpeed)
    |--------------------------------------------------------------------------
    */

    wp_enqueue_script(
        'qorttheme-script',
        $theme_uri . '/dist/' . $entry_app['file'],
        [],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'qorttheme_enqueue_assets');

add_filter('script_loader_tag', function ($tag, $handle) {
    $module_handles = ['vite-client', 'qorttheme-nav', 'qorttheme-app', 'qorttheme-script'];
    if (in_array($handle, $module_handles)) {
        return str_replace('<script ', '<script type="module" ', $tag);
    }
    return $tag;
}, 10, 2);