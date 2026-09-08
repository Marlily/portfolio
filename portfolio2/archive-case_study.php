<?php get_header(); ?>

<?php
$csarchive_image     = get_field('csarchive_image', 'option');
$csarchive_image_url = $csarchive_image['url'] ?? get_template_directory_uri() . '/img/hero-page.jpg';
$csarchive_empty_text = mb_option('csarchive_empty_text') ?: pll__('Brak case studies do wyświetlenia.');

get_template_part('template-parts/hero-page', null, [
    'heading'     => mb_option('csarchive_heading') ?: pll__('Historie <b>naszych realizacji</b>'),
    'description' => mb_option('csarchive_description') ?: pll__('Zobacz wybrane projekty importowe zrealizowane dla naszych klientów.'),
    'image_url'   => $csarchive_image_url,
    'crumbs'      => [
        ['title' => pll__('O nas'), 'url' => null],
        ['title' => pll__('Case study'), 'url' => null],
    ],
]);
?>

<section>
    <div class="container-content flex flex-col gap-8 pt-12 lg:gap-18 lg:pt-26">

        <?php if (have_posts()) : ?>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <?php $i = 0; while (have_posts()) : the_post(); ?>
                    <div class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i++ % 3]; ?> pt-2">
                        <?php get_template_part('template-parts/casestudy-card', null, ['post' => get_post()]); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php get_template_part('template-parts/pagination', null, ['aria_label' => mb_option('csarchive_pagination_aria_label') ?: pll__('Nawigacja po case studies')]); ?>

        <?php else : ?>

            <p class="text-base text-blue-gray-300"><?php echo esc_html($csarchive_empty_text); ?></p>

        <?php endif; ?>

    </div>
</section>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
