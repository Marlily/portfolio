<?php
/*
 * Template Name: O firmie
 */
?>

<?php get_header(); ?>

<?php
get_template_part('template-parts/hero-page', null, [
    'crumbs' => [
        ['title' => pll__('O nas'), 'url' => null],
        ['title' => pll__('O firmie'), 'url' => null],
    ],
]);
?>

<?php
$about_block1_heading = get_field('about_block1_heading') ?: pll__('Stawiamy na <span class="font-bold">sprawdzone rozwiązania</span>');
$about_block1_intro   = get_field('about_block1_intro') ?: pll__('Każdy projekt rozpoczynamy od dokładnego poznania potrzeb klienta. Analizujemy wymagania dotyczące produktu, budżetu oraz oczekiwanych terminów realizacji.');
$about_block1_body    = get_field('about_block1_body') ?: nl2br(esc_html(pll__("Następnie wyszukujemy odpowiednich producentów, weryfikujemy ich wiarygodność i negocjujemy warunki współpracy.\n\nDzięki uporządkowanemu procesowi jesteśmy w stanie skutecznie wspierać zarówno firmy realizujące pierwsze zamówienie z Chin, jak i przedsiębiorstwa regularnie rozwijające swoje łańcuchy dostaw. Naszym priorytetem jest transparentna komunikacja i pełna kontrola nad każdym etapem realizacji.")));
$about_block1_image     = get_field('about_block1_image');
$about_block1_image_url = $about_block1_image['url'] ?? get_template_directory_uri() . '/img/about-plane.jpg';
?>

<section>
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <div class="flex flex-col gap-8 self-start lg:order-1 lg:gap-8 lg:pr-16 lg:pb-18">
            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo wp_kses_post($about_block1_heading); ?>
            </p>
            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] text-blue-gray-500 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($about_block1_intro); ?>
            </p>
            <div class="reveal delay-200 flex flex-col gap-4 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-500/60 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                <p><?php echo wp_kses_post($about_block1_body); ?></p>
            </div>
        </div>

        <div class="relative h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:order-2 lg:h-auto">
            <img src="<?php echo esc_url($about_block1_image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        </div>

    </div>
</section>

<?php
$about_block2_heading = get_field('about_block2_heading') ?: pll__('<span class="font-bold">Partner w imporcie</span>, nie tylko pośrednik');
$about_block2_intro   = get_field('about_block2_intro') ?: pll__('Import z Chin to znacznie więcej niż znalezienie dostawcy i złożenie zamówienia. To proces wymagający znajomości rynku, umiejętności negocjacji, kontroli jakości oraz sprawnej organizacji logistyki.');
$about_block2_body    = get_field('about_block2_body') ?: nl2br(esc_html(pll__("Właśnie dlatego wspieramy naszych klientów na każdym etapie współpracy, pomagając im podejmować bezpieczne i świadome decyzje biznesowe.\n\nWspółpracujemy z przedsiębiorcami reprezentującymi różne branże – od e-commerce i handlu hurtowego, przez firmy produkcyjne, aż po przedsiębiorstwa poszukujące specjalistycznych maszyn i komponentów. Naszym celem jest uproszczenie procesu importu oraz ograniczenie ryzyka, które często towarzyszy współpracy z zagranicznymi dostawcami.")));
$about_block2_image     = get_field('about_block2_image');
$about_block2_image_url = $about_block2_image['url'] ?? get_template_directory_uri() . '/img/about-warehouse.jpg';
?>

<section class="bg-blue-500">
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <div class="relative order-2 h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:order-1 lg:h-auto">
            <img src="<?php echo esc_url($about_block2_image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        </div>

        <div class="order-1 flex flex-col gap-8 self-start lg:order-2 lg:gap-8 lg:pl-16 lg:pb-18">
            <p class="reveal delay-150 text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-white lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo wp_kses_post($about_block2_heading); ?>
            </p>
            <p class="reveal delay-200 text-base/[1.5] font-medium tracking-[-0.01rem] text-white lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($about_block2_intro); ?>
            </p>
            <div class="reveal delay-300 flex flex-col gap-4 text-sm/[1.5] tracking-[-0.00875rem] text-white/60 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                <p><?php echo wp_kses_post($about_block2_body); ?></p>
            </div>
        </div>

    </div>
</section>

<?php
$about_items = get_field('about_items') ?: [
    ['icon' => 'about-individual', 'title' => pll__('Indywidualne podejście'), 'description' => pll__('Każdy projekt traktujemy indywidualnie, dopasowując rozwiązania do specyfiki działalności klienta.')],
    ['icon' => 'about-suppliers', 'title' => pll__('Sprawdzeni dostawcy'), 'description' => pll__('Weryfikujemy producentów i dostawców, ograniczając ryzyko związane z importem.')],
    ['icon' => 'about-support', 'title' => pll__('Kompleksowa obsługa'), 'description' => pll__('Od pierwszego zapytania po dostawę towaru – zapewniamy wsparcie na każdym etapie procesu.')],
    ['icon' => 'about-transparency', 'title' => pll__('Transparentna współpraca'), 'description' => pll__('Stawiamy na jasne zasady działania, regularny kontakt i pełną przejrzystość realizowanych działań.')],
];
$about_items_heading     = get_field('about_items_heading') ?: pll__('Co wyróżnia <span class="font-bold">Importio</span>?');
$about_items_description = get_field('about_items_description') ?: pll__('Łączymy doświadczenie, sprawdzone procesy i indywidualne podejście, pomagając firmom bezpiecznie rozwijać działalność dzięki importowi z Chin.');
?>

<section>
    <div class="container-content flex flex-col gap-8 py-12 lg:gap-18 lg:py-26">

        <div class="flex flex-col gap-4 lg:w-[46.5rem] lg:gap-8">
            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo wp_kses_post($about_items_heading); ?>
            </p>
            <p class="reveal delay-150 text-base/[1.5] font-medium tracking-[-0.01rem] text-blue-gray-500 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($about_items_description); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
            <?php foreach ($about_items as $key => $item) :
                $delay = ['', 'delay-100', 'delay-200', 'delay-300'][$key % 4];
            ?>
                <div class="reveal <?php echo $delay; ?> flex flex-col gap-8 border border-blue-500/10 bg-[linear-gradient(124deg,rgba(3,42,74,0.05),rgba(3,42,74,0.005))] p-6 backdrop-blur-[10px] lg:p-12">
                    <div class="flex size-10 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                        <?php echo importio_get_icon($item['icon'], 'size-5 lg:size-6'); ?>
                    </div>
                    <div class="flex flex-col gap-3">
                        <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.015rem]">
                            <?php echo esc_html($item['title']); ?>
                        </p>
                        <p class="text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                            <?php echo esc_html($item['description']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php get_template_part('template-parts/whyus', null, ['dark' => true]); ?>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
