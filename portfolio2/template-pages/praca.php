<?php
/*
 * Template Name: Praca
 */
?>

<?php get_header(); ?>

<?php
$career_hero_image     = get_field('career_hero_image');
$career_hero_image_url = $career_hero_image['url'] ?? get_template_directory_uri() . '/img/hero-praca.jpg';

get_template_part('template-parts/hero-page', null, [
    'heading'     => get_field('career_hero_heading') ?: pll__('Rozwijaj swoją karierę <b>razem z Importio</b>'),
    'description' => get_field('career_hero_description') ?: pll__('Jeżeli cenisz samodzielność, odpowiedzialność i chcesz rozwijać się w dynamicznym środowisku biznesowym, chętnie poznamy Twoje doświadczenie i pomysły.'),
    'image_url'   => $career_hero_image_url,
    'crumbs'      => [
        ['title' => pll__('O nas'), 'url' => null],
        ['title' => pll__('Praca'), 'url' => null],
    ],
]);

$career_block1_heading = get_field('career_block1_heading') ?: pll__('<span class="font-bold">Dołącz do zespołu</span> Importio');
$career_block1_intro   = get_field('career_block1_intro') ?: pll__('Szukamy osób, które chcą rozwijać się w obszarze międzynarodowego handlu, logistyki oraz współpracy z partnerami biznesowymi na całym świecie.');
$career_block1_body    = get_field('career_block1_body') ?: pll__('Cenimy zaangażowanie, odpowiedzialność i otwartość na nowe wyzwania. Niezależnie od tego, czy posiadasz doświadczenie w branży importowej, sprzedaży, obsłudze klienta czy logistyce, chętnie poznamy Twoją historię i kompetencje.');
$career_block1_image     = get_field('career_block1_image');
$career_block1_image_url = $career_block1_image['url'] ?? get_template_directory_uri() . '/img/job-laptop.jpg';
?>

<section>
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <div class="flex flex-col gap-8 lg:order-1 lg:gap-8 lg:py-18 lg:pr-16">
            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo wp_kses_post($career_block1_heading); ?>
            </p>
            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] text-blue-gray-500 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($career_block1_intro); ?>
            </p>
            <p class="reveal delay-200 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-500/60 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                <?php echo esc_html($career_block1_body); ?>
            </p>
        </div>

        <div class="relative h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:order-2 lg:h-auto">
            <img src="<?php echo esc_url($career_block1_image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        </div>

    </div>
</section>

<?php
$career_block2_heading = get_field('career_block2_heading') ?: pll__('<span class="font-bold">Kogo</span> szukamy?');
$career_block2_intro   = get_field('career_block2_intro') ?: pll__('Interesują nas osoby, które lubią działać samodzielnie, potrafią budować relacje i chcą mieć realny wpływ na rozwój firmy.');
$career_block2_body    = get_field('career_block2_body') ?: nl2br(esc_html(pll__("Wierzymy, że sukces tworzą ludzie, dlatego stawiamy na współpracę opartą na zaufaniu i wzajemnym wsparciu.\n\nSzukamy zarówno specjalistów z doświadczeniem, jak i osób, które dopiero chcą rozwijać swoją karierę w branży związanej z importem i handlem międzynarodowym.")));
$career_block2_image     = get_field('career_block2_image');
$career_block2_image_url = $career_block2_image['url'] ?? get_template_directory_uri() . '/img/job-warehouse.jpg';
?>

<section class="bg-blue-500">
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <div class="relative order-2 h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:order-1 lg:h-auto">
            <img src="<?php echo esc_url($career_block2_image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        </div>

        <div class="order-1 flex flex-col gap-8 lg:order-2 lg:gap-8 lg:py-18 lg:pl-16">
            <p class="reveal delay-150 text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-white lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo wp_kses_post($career_block2_heading); ?>
            </p>
            <p class="reveal delay-200 text-base/[1.5] font-medium tracking-[-0.01rem] text-white lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($career_block2_intro); ?>
            </p>
            <div class="reveal delay-300 flex flex-col gap-4 text-sm/[1.5] tracking-[-0.00875rem] text-white/60 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                <p><?php echo wp_kses_post($career_block2_body); ?></p>
            </div>
        </div>

    </div>
</section>

<?php
$career_final_heading     = get_field('career_final_heading') ?: pll__('Chcesz <span class="font-bold">pracować z nami?</span>');
$career_final_description = get_field('career_final_description') ?: pll__('Jeżeli cenisz zaangażowanie, odpowiedzialność i otwartość na nowe wyzwania, prześlij nam swoje CV lub kilka słów o sobie. Zawsze jesteśmy otwarci na kontakt z osobami, które mogą wnieść do naszego zespołu wiedzę, doświadczenie i świeże spojrzenie.');
$career_cv_label          = get_field('career_cv_label') ?: pll__('Wyślij CV na:');
$career_cv_email          = get_field('career_cv_email') ?: 'kontakt@importio.pl';
?>

<section class="relative overflow-hidden">

    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/map-world.svg'); ?>" alt="" class="pointer-events-none absolute top-1/2 left-1/2 hidden w-[56rem] max-w-none -translate-x-1/2 -translate-y-1/2 opacity-[0.06] lg:block">

    <div class="container-content relative flex flex-col items-center gap-8 py-12 text-center lg:gap-8 lg:py-26">

        <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
            <?php echo wp_kses_post($career_final_heading); ?>
        </p>

        <p class="reveal delay-100 max-w-[46.5rem] text-base/[1.5] font-medium tracking-[-0.01rem] text-blue-gray-300 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
            <?php echo esc_html($career_final_description); ?>
        </p>

        <div class="reveal delay-200 flex items-center gap-6">
            <div class="flex size-14 shrink-0 items-center justify-center bg-orange-500">
                <?php echo importio_get_icon('contact-email', 'size-6'); ?>
            </div>
            <div class="flex flex-col items-start gap-1 text-left">
                <p class="text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                    <?php echo esc_html($career_cv_label); ?>
                </p>
                <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.015rem]">
                    <?php echo esc_html($career_cv_email); ?>
                </p>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
