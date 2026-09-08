<?php
/*
 * Template Name: Referencje
 */
?>

<?php get_header(); ?>

<?php
$image     = get_field('references_image');
$image_url = $image['url'] ?? get_template_directory_uri() . '/img/hero-page.jpg';

get_template_part('template-parts/hero-page', null, [
    'heading'     => get_field('references_heading') ?: pll__('Zobacz, co mówią <b>nasi klienci</b>'),
    'description' => get_field('references_description') ?: pll__('Poznaj doświadczenia firm, które skorzystały z naszego wsparcia przy imporcie z Chin.'),
    'image_url'   => $image_url,
    'crumbs'      => [
        ['title' => pll__('O nas'), 'url' => null],
        ['title' => pll__('Referencje'), 'url' => null],
    ],
]);
?>

<section>
    <div class="container-content grid grid-cols-1 gap-6 pt-12 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 lg:pt-26">
        <?php foreach (importio_default_testimonials() as $key => $item) : ?>
            <div class="reveal <?php echo ['', 'delay-100', 'delay-200'][$key % 3]; ?> pt-8">
                <?php get_template_part('template-parts/testimonial-card', null, $item); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
