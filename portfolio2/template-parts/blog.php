<?php
$heading_bold    = get_field('blog_heading_bold') ?: pll__('Wiedza');
$heading_regular = get_field('blog_heading_regular') ?: pll__(' o imporcie w praktyce');
$description     = get_field('blog_description') ?: pll__('Publikujemy poradniki, analizy i aktualności związane z importem z Chin, logistyką, cłem oraz współpracą z producentami.');
$cta_text        = get_field('blog_cta_text') ?: pll__('Wszystkie artykuły');
$cta_url         = get_field('blog_cta_url') ?: get_permalink(get_option('page_for_posts')) ?: '#';
$card_button_text = mb_option('blogarchive_card_button_text') ?: pll__('Czytaj więcej');

$posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
]);

if ($posts) {
    $items = array_map(function ($post) {
        $categories  = get_the_category($post->ID);
        $placeholder = get_template_directory_uri() . '/img/blog-1.jpg';

        return [
            'badge'       => $categories ? $categories[0]->name : '',
            'date'        => get_the_date('j F Y', $post),
            'title'       => get_the_title($post),
            'description' => get_the_excerpt($post),
            'image_url'   => get_the_post_thumbnail_url($post, 'large') ?: $placeholder,
            'url'         => get_permalink($post),
        ];
    }, $posts);
} else {
    $img   = get_template_directory_uri() . '/img/';
    $items = [
        ['badge' => pll__('Weryfikacja dostawców'), 'date' => '15 maja 2026', 'title' => pll__('Jak bezpiecznie weryfikować dostawców z Chin?'), 'description' => pll__('Poznaj sprawdzone metody weryfikacji chińskich producentów i minimalizuj ryzyko współpracy.'), 'image_url' => $img . 'blog-1.jpg', 'url' => '#'],
        ['badge' => pll__('E-commerce'), 'date' => '15 maja 2026', 'title' => pll__('Transport morski vs. lotniczy - co wybrać?'), 'description' => pll__('Porównanie kosztów i czasów dostawy różnych metod transportu przy imporcie z Chin.'), 'image_url' => $img . 'blog-2.jpg', 'url' => '#'],
        ['badge' => pll__('Cło i formalności'), 'date' => '30 kwietnia 2026', 'title' => pll__('Nowe przepisy celne w 2026 roku'), 'description' => pll__('Przegląd najważniejszych zmian w procedurach celnych i ich wpływ na import.'), 'image_url' => $img . 'blog-3.jpg', 'url' => '#'],
        ['badge' => pll__('E-commerce'), 'date' => '22 kwietnia 2026', 'title' => pll__('Jak znaleźć producenta dla własnej marki?'), 'description' => pll__('Dowiedz się, na co zwrócić uwagę podczas poszukiwania producenta i jak przygotować się do rozpoczęcia produkcji pod własną marką.'), 'image_url' => $img . 'blog-4.jpg', 'url' => '#'],
    ];
}
?>

<section class="overflow-hidden bg-blue-500">
    <div class="container-content flex flex-col gap-8 py-12 lg:flex-row lg:items-start lg:gap-8 lg:py-26">

        <div class="flex shrink-0 flex-col items-start gap-6 lg:w-[15.5rem] xl:w-[30.33rem] xl:pr-26 lg:gap-8">
            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-white lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <span class="font-bold"><?php echo esc_html($heading_bold); ?></span><?php echo esc_html($heading_regular); ?>
            </p>
            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] text-white/60 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                <?php echo esc_html($description); ?>
            </p>
            <a href="<?php echo esc_url($cta_url); ?>" class="reveal delay-200 inline-flex h-12 shrink-0 items-center justify-center gap-2 bg-orange-500 px-6 text-[0.9375rem] font-semibold text-white transition hover:bg-orange-700">
                <?php echo esc_html($cta_text); ?>
                <?php echo importio_get_icon('arrow-right', 'size-4 shrink-0'); ?>
            </a>
        </div>

        <div class="blog-slider glide w-full min-w-0 overflow-hidden lg:pb-14">
            <div class="glide__track !overflow-visible" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($items as $i => $item) : ?>
                        <li class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i % 3]; ?> glide__slide pt-2">
                            <a href="<?php echo esc_url($item['url']); ?>" class="flex h-full flex-col bg-white shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)]">
                                <div class="relative h-[13.5rem] shrink-0 overflow-hidden">
                                    <img src="<?php echo esc_url($item['image_url']); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
                                    <?php if ($item['badge']) : ?>
                                        <span class="absolute top-4 left-4 rounded-full border border-blue-500/10 bg-white/80 px-3 py-1.5 text-xs font-semibold text-blue-500 uppercase backdrop-blur-[5px]">
                                            <?php echo esc_html($item['badge']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="flex flex-1 flex-col gap-6 p-6 lg:p-8">
                                    <div class="flex flex-1 flex-col gap-4">
                                        <div class="flex items-center gap-2">
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-calendar.svg'); ?>" alt="" class="size-4">
                                            <span class="text-sm tracking-[-0.00875rem] text-blue-gray-300"><?php echo esc_html($item['date']); ?></span>
                                        </div>
                                        <p class="text-lg/[1.3] font-semibold tracking-[-0.015rem] text-blue-500">
                                            <?php echo esc_html($item['title']); ?>
                                        </p>
                                        <p class="text-[0.9375rem]/[1.5] tracking-[-0.009375rem] text-blue-gray-300">
                                            <?php echo esc_html($item['description']); ?>
                                        </p>
                                    </div>
                                    <span class="inline-flex h-12 w-fit items-center justify-center bg-orange-500 px-6 text-[0.9375rem] font-semibold text-white transition hover:bg-orange-700">
                                        <?php echo esc_html($card_button_text); ?>
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="glide__bullets mt-8 flex items-center justify-center gap-4 lg:absolute lg:bottom-0 lg:mt-0" data-glide-el="controls[nav]">
                <?php foreach ($items as $i => $item) : ?>
                    <button type="button" class="glide__bullet h-2 w-2 shrink-0 rounded-full bg-blue-gray-50 transition-all [&.glide\_\_bullet--active]:w-12 [&.glide\_\_bullet--active]:bg-orange-500" data-glide-dir="=<?php echo (int) $i; ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
