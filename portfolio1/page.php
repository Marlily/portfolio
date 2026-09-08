<?php get_header(); ?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => get_the_title(),
    'btn_text' => 'Dowiedz się więcej',
    'btn_url'  => '#dowiedz-sie-wiecej',
    'image'    => get_the_post_thumbnail_url( null, 'full' ) ?: get_template_directory_uri() . '/img/miejsce/hero.jpg',
] ); ?>

<section id="dowiedz-sie-wiecej" class="py-10 lg:py-36 overflow-hidden">

    <div class="container-content">
        <div class="custom-content">
            <?php the_content() ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
