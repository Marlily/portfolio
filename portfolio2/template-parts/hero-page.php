<?php
$args = $args ?? [];

$heading     = array_key_exists('heading', $args) ? $args['heading'] : (get_field('hero_page_heading') ?: pll__('Poznaj zespół stojący za <b>skutecznym importem z Chin</b>'));
$description = array_key_exists('description', $args) ? $args['description'] : (get_field('hero_page_description') ?: pll__('Łączymy doświadczenie, znajomość rynku i sprawdzone procesy, pomagając przedsiębiorcom skutecznie rozwijać biznes dzięki importowi z Chin.'));
$image           = get_field('hero_page_image');
$image_url       = $args['image_url'] ?? $image['url'] ?? get_template_directory_uri() . '/img/hero-page.jpg';

if (isset($args['crumbs'])) {
    $crumbs = $args['crumbs'];
} else {
    $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
    $crumbs    = array_map(fn ($id) => ['title' => get_the_title($id), 'url' => get_permalink($id)], $ancestors);
    $crumbs[]  = ['title' => get_the_title(), 'url' => null];
}
$last_key = array_key_last($crumbs);
?>

<section class="relative overflow-hidden border-b-[3px] border-orange-500 bg-blue-500">

    <div class="hero-dots absolute inset-0"></div>

    <div class="relative z-10 flex flex-col lg:flex-row lg:items-stretch">

        <div class="flex w-full flex-col items-start gap-6 py-12 pr-4 pl-[max(1rem,calc((100%-75.68rem)/2+1rem))] lg:w-2/3 lg:justify-center lg:gap-12 lg:py-20 lg:pr-16 xl:pl-[max(1rem,calc((100%-97rem)/2+1rem))]">

            <div class="reveal flex flex-wrap items-center gap-4 text-xs font-semibold tracking-[0.18rem] text-white uppercase">
                <?php foreach ($crumbs as $i => $crumb): ?>
                    <?php if ($i > 0): ?>
                        <span class="text-white/30">/</span>
                    <?php endif; ?>
                    <?php if ($crumb['url'] && $i !== $last_key): ?>
                        <a href="<?php echo esc_url($crumb['url']); ?>" class="hover:text-orange-500 transition">
                            <?php echo esc_html($crumb['title']); ?>
                        </a>
                    <?php else: ?>
                        <span class="<?php echo $i === $last_key ? 'text-orange-500' : ''; ?>">
                            <?php echo esc_html($crumb['title']); ?>
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="flex flex-col items-start gap-4 lg:gap-6">
                <p class="reveal delay-100 [&_b]:font-bold text-[2rem]/[1.2] font-normal tracking-[-0.06rem] text-white lg:text-[3rem]/[1.2] lg:tracking-[-0.09rem]">
                    <?php echo wp_kses_post($heading); ?>
                </p>

                <p class="reveal delay-150 max-w-[40rem] text-base/[1.5] font-medium text-white/60 lg:text-lg/[1.5]">
                    <?php echo esc_html($description); ?>
                </p>
            </div>

        </div>

        <div class="relative min-h-[16rem] w-full overflow-hidden lg:min-h-0 lg:w-1/3">
            <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-blue-500 to-transparent lg:bg-gradient-to-l lg:from-transparent lg:to-blue-500"></div>
        </div>

    </div>

</section>
