<?php
/*
 * Template Name: Wycena produktu
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/hero-wycena'); ?>

<section class="relative overflow-hidden bg-bg">

    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/map-world.svg'); ?>" alt="" class="pointer-events-none absolute top-1/2 left-1/2 hidden w-[56rem] max-w-none -translate-x-1/2 -translate-y-1/2 opacity-[0.06] lg:block">

    <div class="container-content relative flex justify-center py-12 lg:py-26">
        <div class="w-full max-w-[58rem]" data-quote-form>
            <?php echo do_shortcode('[contact-form-7 id="' . (int) importio_get_quote_form_id() . '" title="' . esc_attr(pll__('Formularz wyceny')) . '"]'); ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>
