<?php
$heading_bold    = get_field('portalb2b_heading_bold') ?: pll__('Portal B2B');
$heading_regular = get_field('portalb2b_heading_regular') ?: pll__(' – jedno miejsce do zarządzania importem');
$description     = get_field('portalb2b_description') ?: pll__('Nasz portal B2B umożliwia wygodną komunikację, śledzenie zamówień, dostęp do dokumentów oraz bieżący podgląd statusu realizowanych projektów.');
$image           = get_field('portalb2b_image');
$image_url       = $image['url'] ?? get_template_directory_uri() . '/img/portalb2b-screenshot.jpg';

$items = get_field('portalb2b_items');

if (!$items) {
    $img = get_template_directory_uri() . '/img/';

    $items = [
        ['icon' => ['url' => $img . 'icon-portalb2b-tracking.svg'], 'label' => pll__('Śledzenie zamówień')],
        ['icon' => ['url' => $img . 'icon-portalb2b-comments.svg'], 'label' => pll__('Wygodna komunikacja')],
        ['icon' => ['url' => $img . 'icon-portalb2b-stats.svg'], 'label' => pll__('Status projektów')],
        ['icon' => ['url' => $img . 'icon-portalb2b-document.svg'], 'label' => pll__('Dostęp do dokumentów')],
    ];
}
?>

<section>
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <div class="relative h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:order-1 lg:h-auto">
            <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        </div>

        <div class="flex flex-col gap-8 self-start lg:order-2 lg:gap-18 lg:pl-16 lg:pb-18">

            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <span class="font-bold"><?php echo esc_html($heading_bold); ?></span><?php echo esc_html($heading_regular); ?>
            </p>

            <p class="reveal delay-100 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[1.125rem]/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($description); ?>
            </p>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                <?php foreach ($items as $key => $item) :
                    $icon     = $item['icon'] ?? null;
                    $icon_url = $icon['url'] ?? '';
                    $delay    = ['', 'delay-100', 'delay-200', 'delay-300'][$key % 4];
                ?>
                    <div class="reveal <?php echo $delay; ?> flex items-center gap-4">
                        <div class="flex size-10 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                            <img src="<?php echo esc_url($icon_url); ?>" alt="" class="size-5 lg:size-6">
                        </div>
                        <p class="flex-1 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                            <?php echo esc_html($item['label']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</section>
