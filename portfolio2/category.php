<?php get_header(); ?>

<?php
$category = get_queried_object();
?>

<?php
$blogarchive_image     = get_field('blogarchive_image', 'option');
$blogarchive_image_url = $blogarchive_image['url'] ?? get_template_directory_uri() . '/img/whyus-handshake.jpg';

$blogarchive_category_prefix = mb_option('blogarchive_category_prefix') ?: pll__('Baza wiedzy:');

get_template_part('template-parts/hero-page', null, [
    'heading'     => '<b>' . esc_html($blogarchive_category_prefix) . '</b> ' . esc_html($category->name),
    'description' => $category->description ?: (mb_option('blogarchive_description') ?: pll__('Publikujemy poradniki, analizy i aktualności związane z importem z Chin, logistyką, cłem oraz współpracą z producentami.')),
    'image_url'   => $blogarchive_image_url,
    'crumbs'      => [
        ['title' => pll__('Baza wiedzy'), 'url' => get_permalink(get_option('page_for_posts'))],
        ['title' => $category->name, 'url' => null],
    ],
]);
?>

<?php get_template_part('template-parts/knowledge-base-content'); ?>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
