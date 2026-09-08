<?php

function mbtheme_enqueue_assets() {

    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    /*
    |--------------------------------------------------------------------------
    | DEV SERVER (Vite HMR)
    |--------------------------------------------------------------------------
    */

    $vite_server = 'https://importio.ddev.site:5174';

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
            'mbtheme-app',
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

    $entry = $manifest['assets/js/app.js'];

    /*
    |--------------------------------------------------------------------------
    | CSS
    |--------------------------------------------------------------------------
    */

    if (!empty($entry['css'])) {

        foreach ($entry['css'] as $css) {

            wp_enqueue_style(
                'mbtheme-style',
                $theme_uri . '/dist/' . $css,
                [],
                null
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | JS
    |--------------------------------------------------------------------------
    */

    wp_enqueue_script(
        'mbtheme-script',
        $theme_uri . '/dist/' . $entry['file'],
        [],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'mbtheme_enqueue_assets');

add_filter('script_loader_tag', function ($tag, $handle) {
    $module_handles = ['vite-client', 'mbtheme-app', 'mbtheme-script'];
    if (in_array($handle, $module_handles)) {
        return str_replace('<script ', '<script type="module" ', $tag);
    }
    return $tag;
}, 10, 2);