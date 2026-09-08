<?php
$categories = get_the_category();
$category   = $categories ? $categories[0] : null;

$crumbs = [
    ['title' => pll__('Baza wiedzy'), 'url' => get_permalink(get_option('page_for_posts'))],
];

if ($category) {
    $crumbs[] = ['title' => $category->name, 'url' => get_category_link($category)];
}

$crumb_title = get_the_title();
if (mb_strlen($crumb_title) > 24) {
    $crumb_title = mb_substr($crumb_title, 0, 24) . '…';
}
$crumbs[]  = ['title' => $crumb_title, 'url' => null];
$last_key  = array_key_last($crumbs);

$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: get_template_directory_uri() . '/img/single-hero.jpg';
?>

<section class="relative overflow-hidden border-b-[0.1875rem] border-orange-500">

    <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">

    <div class="relative flex flex-col items-center gap-6 bg-gradient-to-t from-blue-500 to-blue-500/0 px-4 pt-24 pb-12 text-center backdrop-blur-[15px] sm:px-8 lg:gap-12 lg:px-[15.5rem] lg:pt-[15rem] lg:pb-26">

        <div class="reveal flex flex-wrap items-center justify-center gap-4 text-xs font-semibold tracking-[0.18rem] text-white uppercase">
            <?php foreach ($crumbs as $i => $crumb): ?>
                <?php if ($i > 0): ?>
                    <span class="text-white/30">/</span>
                <?php endif; ?>
                <?php if ($crumb['url'] && $i !== $last_key): ?>
                    <a href="<?php echo esc_url($crumb['url']); ?>" class="hover:text-orange-500 transition">
                        <?php echo esc_html($crumb['title']); ?>
                    </a>
                <?php else: ?>
                    <span class="<?php echo $i === $last_key ? 'max-w-[15rem] truncate text-orange-500' : ''; ?>">
                        <?php echo esc_html($crumb['title']); ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-col items-center gap-4 lg:gap-6">
            <div class="reveal delay-100 flex items-center gap-2 text-sm text-white/60">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-calendar.svg'); ?>" alt="" class="size-4">
                <?php echo esc_html(get_the_date('j F Y')); ?>
            </div>

            <p class="reveal delay-150 text-[2rem]/[1.2] font-normal tracking-[-0.06rem] text-white lg:text-[3rem]/[1.2] lg:tracking-[-0.09rem]">
                <?php the_title(); ?>
            </p>

            <p class="reveal delay-200 max-w-[40rem] text-base/[1.5] font-medium text-white/60 lg:text-lg/[1.5]">
                <?php echo esc_html(get_the_excerpt()); ?>
            </p>
        </div>

    </div>

</section>
