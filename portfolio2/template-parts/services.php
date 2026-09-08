<?php
$heading_line1 = get_field('services_heading_line1') ?: pll__('Kompleksowa obsługa');
$heading_line2 = get_field('services_heading_line2') ?: pll__('importu z Chin');
$description   = get_field('services_description') ?: pll__('Wspieramy przedsiębiorców na każdym etapie współpracy z chińskimi producentami, minimalizując ryzyko i oszczędzając czas.');

$items = get_field('services');

if (!$items) {
    $img = get_template_directory_uri() . '/img/';

    $items = [
        [
            'service_icon'       => ['url' => $img . 'icon-service-warehouse.svg'],
            'service_icon_color' => '#E38032',
            'service_title'      => pll__('Import hurtowy z Chin'),
            'service_description' => pll__('Pomagamy znaleźć producentów i dostawców, negocjować ceny oraz organizować cały proces zakupowy.'),
        ],
        [
            'service_icon'       => ['url' => $img . 'icon-service-dolly.svg'],
            'service_icon_color' => '#E38032',
            'service_title'      => pll__('Import maszyn z Chin'),
            'service_description' => pll__('Wsparcie przy zakupie linii produkcyjnych, urządzeń przemysłowych oraz specjalistycznego wyposażenia.'),
        ],
        [
            'service_icon'       => ['url' => $img . 'icon-service-truck.svg'],
            'service_icon_color' => '#E38032',
            'service_title'      => pll__('Logistyka i transport'),
            'service_description' => pll__('Organizujemy transport morski, kolejowy, lotniczy i drogowy wraz z obsługą formalności.'),
        ],
        [
            'service_icon'       => ['url' => $img . 'icon-service-shield.svg'],
            'service_icon_color' => '#E38032',
            'service_title'      => pll__('Kontrola jakości'),
            'service_description' => pll__('Dbamy o zgodność zamówienia jeszcze przed wysyłką towaru.'),
        ],
        [
            'service_icon'       => ['url' => $img . 'icon-service-usertrust.svg'],
            'service_icon_color' => '#E38032',
            'service_title'      => pll__('Weryfikacja dostawców'),
            'service_description' => pll__('Sprawdzamy wiarygodność producentów, dokumentację i warunki współpracy.'),
        ],
        [
            'service_icon'       => ['url' => $img . 'icon-service-document.svg'],
            'service_icon_color' => '#E38032',
            'service_title'      => pll__('Obsługa celna'),
            'service_description' => pll__('Pomagamy przejść przez wszystkie procedury importowe i ograniczyć ryzyko błędów.'),
        ],
    ];
}
?>

<section class="bg-blue-500">
    <div class="container-content flex flex-col items-start gap-8 py-12 lg:gap-18 lg:py-26">

        <div class="flex flex-col gap-4 text-white lg:w-[46.5rem] lg:gap-8">
            <p class="reveal text-[1.875rem]/[1.2] tracking-[-0.05625rem] text-white lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo esc_html($heading_line1); ?><br>
                <span class="font-bold"><?php echo esc_html($heading_line2); ?></span>
            </p>
            <p class="reveal delay-150 text-base/[1.5] font-medium tracking-[-0.01rem] text-white/60 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($description); ?>
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-8">
            <?php foreach ($items as $key => $item) :
                $icon       = $item['service_icon'] ?? null;
                $icon_url   = $icon['url'] ?? '';
                $icon_color = $item['service_icon_color'] ?: '#E38032';
                $delay      = ['', 'delay-100', 'delay-200'][$key % 3];
            ?>
                <div class="reveal <?php echo $delay; ?> flex flex-row items-start gap-4 border border-white/10 bg-[linear-gradient(135deg,rgba(255,255,255,0.05),rgba(255,255,255,0))] p-6 backdrop-blur-[10px] lg:flex-col lg:gap-8 lg:p-12">
                    <div class="flex size-10 shrink-0 items-center justify-center lg:size-14" style="background-color: <?php echo esc_attr($icon_color); ?>">
                        <img src="<?php echo esc_url($icon_url); ?>" alt="" class="size-5 lg:size-6">
                    </div>
                    <div class="flex flex-1 flex-col gap-2 text-white lg:flex-none lg:gap-3">
                        <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-white lg:text-2xl/[1.3] lg:tracking-[-0.015rem]">
                            <?php echo esc_html($item['service_title']); ?>
                        </p>
                        <p class="text-sm/[1.5] tracking-[-0.00875rem] text-white/60 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                            <?php echo esc_html($item['service_description']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
