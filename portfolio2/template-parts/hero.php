<?php
$heading_bold    = get_field('hero_heading_bold') ?: pll__('Import z Chin');
$heading_regular = get_field('hero_heading_regular') ?: pll__('bez ryzyka i zbędnych pośredników');
$description     = get_field('hero_description') ?: pll__('Pomagamy firmom sprowadzać <span class="text-orange-500">produkty, maszyny i komponenty z Chin</span>. Weryfikujemy dostawców, negocjujemy warunki, organizujemy transport i wspieramy cały proces od pierwszego zapytania aż po dostawę do Twojej firmy.');
$cta_text        = get_field('hero_cta_text') ?: pll__('Bezpłatna wycena produktów');
$cta_url         = get_field('hero_cta_url') ?: '#';
$cta2_text       = get_field('hero_cta_secondary_text') ?: pll__('Poznaj naszą ofertę');
$cta2_url        = get_field('hero_cta_secondary_url') ?: '#';
$image           = get_field('hero_image');
$image_url       = $image['url'] ?? get_template_directory_uri() . '/img/hero-bg.jpg';
$image_mobile     = get_field('hero_image_mobile');
$image_mobile_url = $image_mobile['url'] ?? get_template_directory_uri() . '/img/hero-bg-mobile.jpg';
?>

<section class="relative overflow-hidden">

    <div class="absolute inset-0">
        <img src="<?php echo esc_url($image_mobile_url); ?>" alt="" class="h-full w-full object-cover lg:hidden">
        <img src="<?php echo esc_url($image_url); ?>" alt="" class="hidden h-full w-full object-cover lg:block">
    </div>

    <div class="container-content relative z-10 flex min-h-[40rem] items-end py-8 lg:min-h-[46.875rem] lg:items-center lg:py-0">
        <div class="flex max-w-[46.5rem] flex-col items-start gap-6 lg:gap-12">

            <p class="reveal text-[2.25rem]/[1.2] font-bold tracking-[-0.0675rem] text-white lg:text-[3.75rem]/[1.2] lg:tracking-[-0.1125rem]">
                <?php echo esc_html($heading_bold); ?><br><span class="font-normal"><?php echo esc_html($heading_regular); ?></span>
            </p>

            <p class="reveal delay-100 max-w-[40rem] text-base/[1.5] font-medium text-white/80 lg:text-lg/[1.5]">
                <?php echo wp_kses_post($description); ?>
            </p>

            <div class="reveal delay-200 flex w-full flex-col items-stretch gap-2 lg:w-auto lg:flex-row lg:items-center lg:gap-4">
                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary">
                    <?php echo esc_html($cta_text); ?>
                    <?php echo importio_get_icon('arrow-right', 'size-4 shrink-0'); ?>
                </a>
                <a href="<?php echo esc_url($cta2_url); ?>" class="btn btn-secondary-light">
                    <?php echo esc_html($cta2_text); ?>
                </a>
            </div>

        </div>
    </div>

</section>
