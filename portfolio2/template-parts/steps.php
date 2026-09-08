<?php
$heading_line1 = get_field('steps_heading_line1') ?: pll__('Import z Chin w');
$heading_line2 = get_field('steps_heading_line2') ?: pll__('5 prostych krokach');
$description   = get_field('steps_description') ?: pll__('Dzięki sprawdzonemu procesowi minimalizujemy ryzyko i oszczędzamy czas naszych klientów.');

$steps = get_field('steps_items');

if (!$steps) {
    $steps = [
        [
            'title'       => pll__('Analiza potrzeb i produktu'),
            'description' => pll__('Każdy projekt rozpoczynamy od rozmowy i poznania specyfiki Twojego biznesu. Określamy wymagania dotyczące produktu, budżetu oraz planowanej skali zamówień. Dzięki temu możemy dobrać rozwiązania najlepiej odpowiadające Twoim celom.'),
        ],
        [
            'title'       => pll__('Wyszukanie odpowiednich dostawców'),
            'description' => pll__('Na podstawie zebranych wymagań docieramy do sprawdzonych producentów i fabryk, które odpowiadają specyfice Twojego zamówienia. Porównujemy oferty pod kątem jakości, ceny i możliwości produkcyjnych.'),
        ],
        [
            'title'       => pll__('Weryfikacja producentów i negocjacje'),
            'description' => pll__('Sprawdzamy wiarygodność wybranych dostawców, dokumentację oraz warunki współpracy. Negocjujemy ceny, terminy i warunki płatności, dbając o Twoje interesy na każdym etapie rozmów.'),
        ],
        [
            'title'       => pll__('Zamówienie oraz kontrola jakości'),
            'description' => pll__('Koordynujemy realizację zamówienia i na bieżąco monitorujemy proces produkcji. Przed wysyłką przeprowadzamy kontrolę jakości, aby mieć pewność, że towar spełnia ustalone wymagania.'),
        ],
        [
            'title'       => pll__('Transport i dostawa do klienta'),
            'description' => pll__('Organizujemy transport morski, lotniczy lub kolejowy oraz zajmujemy się formalnościami celnymi. Dbamy o to, aby produkty dotarły do Twojej firmy bezpiecznie i w ustalonym terminie.'),
        ],
    ];
}
?>

<section class="bg-blue-500 bg-[linear-gradient(131deg,rgba(2,27,47,1)_1%,rgba(2,27,47,0)_41%)]">
    <div class="container-content flex flex-col gap-8 py-12 lg:gap-18 lg:py-26">

        <div class="flex flex-col gap-4 border-b border-blue-500/10 text-white lg:gap-8">
            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo esc_html($heading_line1); ?> <span class="font-bold"><?php echo esc_html($heading_line2); ?></span>
            </p>
            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] text-white/60 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($description); ?>
            </p>
        </div>

        <div class="flex w-full flex-col gap-2 lg:flex-row lg:items-stretch lg:gap-8" data-steps>
            <?php foreach ($steps as $i => $step) : ?>
                <button
                    type="button"
                    data-step
                    <?php echo $i === 0 ? 'data-open' : ''; ?>
                    aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                    class="group flex w-full flex-col items-start gap-2 border border-white/10 px-6 py-5 text-left backdrop-blur-[10px] transition-all duration-300 ease-out hover:border-white/30 data-[open]:bg-[linear-gradient(135deg,rgba(255,255,255,0.05),rgba(255,255,255,0))] max-lg:data-[open]:gap-6 max-lg:data-[open]:p-6 lg:w-[15.1875rem] lg:shrink-0 lg:gap-8 lg:p-12 lg:data-[open]:w-auto lg:data-[open]:flex-1 lg:data-[open]:shrink"
                >
                    <span class="block text-[1.125rem] leading-[1.3] font-semibold tracking-[-0.01125rem] text-orange-500 max-lg:group-data-[open]:text-[2.5rem] max-lg:group-data-[open]:leading-none max-lg:group-data-[open]:tracking-[-0.075rem] lg:text-[4.5rem] lg:leading-none lg:tracking-[-0.135rem]">
                        <?php echo sprintf('%02d', $i + 1); ?>
                    </span>

                    <span class="block text-base leading-[1.5] font-medium tracking-[-0.01rem] text-white max-lg:group-data-[open]:text-lg max-lg:group-data-[open]:font-semibold max-lg:group-data-[open]:leading-[1.3] max-lg:group-data-[open]:tracking-[-0.01125rem] lg:text-lg lg:leading-[1.5] lg:tracking-[-0.01125rem] lg:group-data-[open]:text-2xl lg:group-data-[open]:font-semibold lg:group-data-[open]:leading-[1.3] lg:group-data-[open]:tracking-[-0.015rem]">
                        <?php echo esc_html($step['title']); ?>
                    </span>

                    <div class="grid grid-rows-[0fr] overflow-hidden transition-[grid-template-rows] duration-300 ease-out group-data-[open]:grid-rows-[1fr] lg:pr-8">
                        <p class="min-h-0 text-sm/[1.5] tracking-[-0.00875rem] text-white/60 opacity-0 transition-opacity duration-200 group-data-[open]:opacity-100 group-data-[open]:delay-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                            <?php echo esc_html($step['description']); ?>
                        </p>
                    </div>
                </button>
            <?php endforeach; ?>
        </div>

    </div>
</section>
