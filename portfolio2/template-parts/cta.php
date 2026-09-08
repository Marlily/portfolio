<?php
$args = $args ?? [];

$heading_before = $args['heading_before'] ?? (mb_option('cta_heading_before') ?: pll__('Chcesz sprawdzić '));
$heading_bold   = $args['heading_bold'] ?? (mb_option('cta_heading_bold') ?: pll__('możliwości importu'));
$heading_after  = $args['heading_after'] ?? (mb_option('cta_heading_after') ?: pll__(' swojego produktu?'));
$description    = $args['description'] ?? (mb_option('cta_description') ?: pll__('Prześlij link, zdjęcie lub krótki opis produktu, a przeanalizujemy możliwości jego importu oraz przygotujemy wstępną wycenę współpracy.'));
$cta_text       = $args['cta_text'] ?? (mb_option('cta_button_text') ?: pll__('Bezpłatna wycena produktów'));
$cta_url        = $args['cta_url'] ?? (mb_option('cta_button_url') ?: '#');
$cta2_text      = $args['cta2_text'] ?? (mb_option('cta_button_secondary_text') ?: pll__('Poznaj naszą ofertę'));
$cta2_url       = $args['cta2_url'] ?? (mb_option('cta_button_secondary_url') ?: '#');
?>

<section class="container-content py-12 lg:py-26">
    <div class="flex flex-col items-center gap-8 bg-blue-700 px-6 py-12 text-center lg:gap-12 lg:px-24 lg:py-18">

        <div class="flex flex-col items-center gap-4 text-white lg:mx-auto lg:max-w-[46.5rem] lg:gap-8">
            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo esc_html($heading_before); ?><span class="font-bold"><?php echo esc_html($heading_bold); ?></span><?php echo esc_html($heading_after); ?>
            </p>
            <p class="reveal delay-100 text-base/[1.5] font-medium text-white/80 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($description); ?>
            </p>
        </div>

        <div class="reveal delay-200 flex w-full flex-col items-stretch gap-2 lg:w-auto lg:flex-row lg:items-center lg:gap-4">
            <a href="<?php echo esc_url($cta_url); ?>" class="inline-flex h-12 items-center justify-center gap-2 bg-orange-500 px-6 text-[0.9375rem] font-semibold text-white transition hover:bg-orange-700">
                <?php echo esc_html($cta_text); ?>
                <?php echo importio_get_icon('arrow-right', 'size-4 shrink-0'); ?>
            </a>
            <a href="<?php echo esc_url($cta2_url); ?>" class="inline-flex h-12 items-center justify-center border border-white/10 px-6 text-[0.9375rem] font-semibold text-white transition hover:border-orange-700 hover:text-orange-500">
                <?php echo esc_html($cta2_text); ?>
            </a>
        </div>

    </div>
</section>
