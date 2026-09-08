<?php get_header(); ?>

<?php
$blogarchive_image     = get_field('blogarchive_image', 'option');
$blogarchive_image_url = $blogarchive_image['url'] ?? get_template_directory_uri() . '/img/whyus-handshake.jpg';

get_template_part('template-parts/hero-page', null, [
    'heading'     => mb_option('blogarchive_heading') ?: pll__('<b>Wiedza</b> o imporcie w praktyce'),
    'description' => mb_option('blogarchive_description') ?: pll__('Publikujemy poradniki, analizy i aktualności związane z importem z Chin, logistyką, cłem oraz współpracą z producentami.'),
    'image_url'   => $blogarchive_image_url,
    'crumbs'      => [
        ['title' => pll__('Baza wiedzy'), 'url' => null],
    ],
]);
?>

<?php get_template_part('template-parts/knowledge-base-content'); ?>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
