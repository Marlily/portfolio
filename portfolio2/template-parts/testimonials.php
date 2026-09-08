<?php
$heading_bold    = get_field('testimonials_heading_bold') ?: pll__('Partnerstwo');
$heading_regular = get_field('testimonials_heading_regular') ?: pll__(' oparte na zaufaniu');
$description     = get_field('testimonials_description') ?: pll__('Najlepszą rekomendacją są opinie klientów, którzy rozwijają swój biznes dzięki współpracy z nami.');

$items = get_field('testimonials') ?: array_slice(importio_default_testimonials(), 0, 4);
?>

<section class="overflow-hidden">
    <div class="container-content flex flex-col gap-12 py-12 lg:gap-18 lg:py-26">

        <?php
        get_template_part('template-parts/section-heading', null, [
            'heading_bold'    => $heading_bold,
            'heading_regular' => $heading_regular,
            'description'     => $description,
        ]);
        ?>

        <div class="flex flex-col items-center gap-8">
            <div class="testimony-slider glide w-full min-w-0">
                <div class="glide__track !overflow-visible" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php foreach ($items as $i => $item) : ?>
                            <li class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i % 3]; ?> glide__slide pt-7">
                                <?php get_template_part('template-parts/testimonial-card', null, $item); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="glide__bullets mt-8 flex items-center justify-center gap-4" data-glide-el="controls[nav]">
                    <?php foreach ($items as $i => $item) : ?>
                        <button type="button" class="glide__bullet h-2 w-2 shrink-0 rounded-full bg-blue-gray-50 transition-all [&.glide\_\_bullet--active]:w-12 [&.glide\_\_bullet--active]:bg-orange-500" data-glide-dir="=<?php echo (int) $i; ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>
