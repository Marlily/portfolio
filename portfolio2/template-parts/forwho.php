<?php
$heading_bold    = get_field('forwho_heading_bold') ?: pll__('Import dla firm');
$heading_regular = get_field('forwho_heading_regular') ?: pll__('o różnych potrzebach');
$description     = get_field('forwho_description') ?: pll__('Niezależnie od skali działalności pomagamy znaleźć odpowiednich dostawców, zoptymalizować proces zakupowy i bezpiecznie realizować import z Chin.');

$items = get_field('forwho_items');

if (!$items) {
    $items = [
        [
            'image'        => ['url' => get_template_directory_uri() . '/img/forwho-1.jpg'],
            'image_mobile' => ['url' => get_template_directory_uri() . '/img/forwho-1-mobile.jpg'],
            'title'        => pll__('Tworzymy marki dla klientów'),
            'description'  => pll__('Stwórz własny produkt z indywidualnym logo, kolorystyką, opakowaniem i pełną personalizacją dopasowaną do Twojej marki.'),
        ],
        [
            'image'        => ['url' => get_template_directory_uri() . '/img/forwho-2.jpg'],
            'image_mobile' => null,
            'title'        => pll__('Dla sklepów e-commerce'),
            'description'  => pll__('Poszerz ofertę o produkty o wysokiej marży i zwiększ konkurencyjność swojego sklepu.'),
        ],
        [
            'image'        => ['url' => get_template_directory_uri() . '/img/forwho-3.jpg'],
            'image_mobile' => ['url' => get_template_directory_uri() . '/img/forwho-3-mobile.jpg'],
            'title'        => pll__('Dla usługodawców'),
            'description'  => pll__('Sprowadzaj urządzenia, wyposażenie i produkty dopasowane do potrzeb Twojego biznesu.'),
        ],
        [
            'image'        => ['url' => get_template_directory_uri() . '/img/forwho-4.jpg'],
            'image_mobile' => null,
            'title'        => pll__('Dla hurtowników'),
            'description'  => pll__('Buduj przewagę cenową dzięki bezpośredniej współpracy z chińskimi dostawcami.'),
        ],
    ];
}
?>

<section class="container-content flex flex-col gap-8 pb-12 lg:gap-18 lg:pb-26 pt-12 lg:pt-0 bg-bg">

    <?php
    get_template_part('template-parts/section-heading', null, [
        'heading_bold'    => $heading_bold,
        'heading_regular' => $heading_regular,
        'description'     => $description,
    ]);
    ?>

    <div class="grid grid-cols-2 gap-4 lg:grid-cols-[1.55fr_1fr_1fr_1fr] lg:gap-8">
        <?php foreach ($items as $key => $item) :
            $image            = $item['image'] ?? null;
            $image_mobile      = $item['image_mobile'] ?? null;
            $image_url        = $image['url'] ?? '';
            $image_mobile_url = $image_mobile['url'] ?? $image_url;
            $delay            = ['', 'delay-100', 'delay-200', 'delay-300'][$key % 4];
        ?>
            <div class="reveal <?php echo $delay; ?> flex flex-col items-start gap-4">
                <div class="h-[12.5rem] w-full shrink-0 shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:h-[30rem]">
                    <img src="<?php echo esc_url($image_mobile_url); ?>" alt="" class="h-full w-full object-cover lg:hidden">
                    <img src="<?php echo esc_url($image_url); ?>" alt="" class="hidden h-full w-full object-cover lg:block">
                </div>
                <div class="flex flex-col items-start gap-3 lg:pr-8">
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

</section>
