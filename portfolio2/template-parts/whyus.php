<?php
$args = $args ?? [];
$dark = !empty($args['dark']);

$heading_bold    = get_field('whyus_heading_bold') ?: pll__('Co zyskujesz');
$heading_regular = get_field('whyus_heading_regular') ?: pll__('dzięki współpracy z nami?');
$image           = get_field('whyus_image');
$image_url       = $image['url'] ?? get_template_directory_uri() . '/img/whyus-handshake.jpg';

$items = get_field('whyus_items');

if (!$items) {
    $img = get_template_directory_uri() . '/img/';

    $items = [
        ['icon' => ['url' => $img . 'icon-whyus-workflow.svg'], 'label' => pll__('Kompleksowa obsługa procesu importowego')],
        ['icon' => ['url' => $img . 'icon-whyus-shield.svg'], 'label' => pll__('Weryfikacja producentów i dostawców')],
        ['icon' => ['url' => $img . 'icon-whyus-coins.svg'], 'label' => pll__('Oszczędność czasu i kosztów')],
        ['icon' => ['url' => $img . 'icon-whyus-temple.svg'], 'label' => pll__('Znajomość rynku chińskiego')],
        ['icon' => ['url' => $img . 'icon-whyus-users.svg'], 'label' => pll__('Wsparcie na każdym etapie współpracy')],
        ['icon' => ['url' => $img . 'icon-whyus-comment.svg'], 'label' => pll__('Transparentna komunikacja')],
    ];
}
?>

<section class="<?php echo $dark ? 'bg-blue-500' : ''; ?>">
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <div class="flex flex-col gap-8 self-start lg:gap-18 lg:pr-16 lg:pb-18">

            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem] <?php echo $dark ? 'text-white' : 'text-blue-500'; ?>">
                <span class="font-bold"><?php echo esc_html($heading_bold); ?></span> <?php echo esc_html($heading_regular); ?>
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
                        <p class="flex-1 text-sm/[1.5] tracking-[-0.00875rem] lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem] <?php echo $dark ? 'text-white/60' : 'text-blue-gray-300'; ?>">
                            <?php echo esc_html($item['label']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="relative h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:h-auto">
            <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        </div>

    </div>
</section>
