<?php
$eyebrow      = get_field('quote_hero_eyebrow') ?: pll__('Wyceń produkt');
$heading      = get_field('quote_hero_heading') ?: pll__('Sprawdź możliwości ');
$heading_bold = get_field('quote_hero_heading_bold') ?: pll__('importu');
$heading_end  = get_field('quote_hero_heading_end') ?: pll__(' swojego produktu');
$description  = get_field('quote_hero_description') ?: pll__('Prześlij link, zdjęcie lub krótki opis produktu, a przeanalizujemy możliwości jego importu oraz przygotujemy wstępną wycenę współpracy.');
$image        = get_field('quote_hero_image');
$image_url    = $image['url'] ?? get_template_directory_uri() . '/img/hero-wycena.jpg';
?>

<section class="relative overflow-hidden border-b-[3px] border-orange-500 bg-blue-500">

    <div class="hero-dots absolute inset-0"></div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-stretch">

        <div class="flex w-full flex-col items-start gap-4 py-12 pr-4 pl-[max(1rem,calc((100%-75.68rem)/2+1rem))] lg:w-3/5 lg:justify-center lg:gap-6 lg:py-20 lg:pr-16 xl:pl-[max(1rem,calc((100%-97rem)/2+1rem))]">

            <p class="reveal text-xs font-semibold tracking-[0.18rem] text-orange-500 uppercase">
                <?php echo esc_html($eyebrow); ?>
            </p>

            <p class="reveal delay-100 text-[2rem]/[1.2] font-normal tracking-[-0.06rem] text-white lg:text-[3rem]/[1.2] lg:tracking-[-0.09rem]">
                <?php echo esc_html($heading); ?><span class="font-bold"><?php echo esc_html($heading_bold); ?></span><?php echo esc_html($heading_end); ?>
            </p>

            <p class="reveal delay-150 max-w-[40rem] text-base/[1.5] font-medium text-white/60 lg:text-lg/[1.5]">
                <?php echo esc_html($description); ?>
            </p>

        </div>

        <div class="relative min-h-[16rem] w-full overflow-hidden lg:min-h-0 lg:w-2/5">
            <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-blue-500 to-transparent lg:bg-gradient-to-l lg:from-transparent lg:to-blue-500"></div>
        </div>

    </div>

</section>
