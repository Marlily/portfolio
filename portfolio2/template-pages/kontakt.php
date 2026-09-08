<?php
/*
 * Template Name: Kontakt
 */
?>

<?php get_header(); ?>

<?php
$contact_hero_image     = get_field('contact_hero_image');
$contact_hero_image_url = $contact_hero_image['url'] ?? get_template_directory_uri() . '/img/hero-kontakt.jpg';

get_template_part('template-parts/hero-page', null, [
    'heading'     => get_field('contact_heading') ?: pll__('<b>Skontaktuj się</b> z zespołem Importio'),
    'description' => get_field('contact_description') ?: pll__('Masz pytania dotyczące importu, dostawców lub logistyki? Napisz do nas, a wspólnie omówimy możliwości współpracy i dalsze kroki.'),
    'image_url'   => $contact_hero_image_url,
    'crumbs'      => [
        ['title' => pll__('Kontakt'), 'url' => null],
    ],
]);
?>

<?php get_template_part('template-parts/contact', null, ['show_heading' => false]); ?>

<?php get_footer(); ?>
