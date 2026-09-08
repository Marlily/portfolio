<?php
$post_obj = get_post($args['post'] ?? null);

if (!$post_obj) {
    return;
}

$categories  = get_the_category($post_obj);
$badge       = $categories ? $categories[0]->name : '';
$placeholder = get_template_directory_uri() . '/img/blog-1.jpg';
$image_url   = get_the_post_thumbnail_url($post_obj, 'large') ?: $placeholder;
?>

<a href="<?php echo esc_url(get_permalink($post_obj)); ?>" class="flex h-full flex-col bg-white shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)]">
    <div class="relative h-[13.5rem] shrink-0 overflow-hidden lg:h-[20.208rem]">
        <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
        <?php if ($badge) : ?>
            <span class="absolute top-6 left-6 rounded-full border border-blue-500/10 bg-white/80 px-3 py-1.5 text-xs font-semibold text-blue-500 uppercase backdrop-blur-[5px]">
                <?php echo esc_html($badge); ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="flex flex-1 flex-col gap-6 p-6 lg:p-8">
        <div class="flex flex-1 flex-col gap-4">
            <div class="flex items-center gap-2">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-calendar.svg'); ?>" alt="" class="size-4">
                <span class="text-sm tracking-[-0.00875rem] text-blue-gray-300"><?php echo esc_html(get_the_date('j F Y', $post_obj)); ?></span>
            </div>
            <p class="text-lg/[1.3] font-semibold tracking-[-0.015rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.024rem]">
                <?php echo esc_html(get_the_title($post_obj)); ?>
            </p>
            <p class="text-[0.9375rem]/[1.5] tracking-[-0.009375rem] text-blue-gray-300">
                <?php echo esc_html(get_the_excerpt($post_obj)); ?>
            </p>
        </div>
        <span class="inline-flex h-12 w-fit items-center justify-center bg-orange-500 px-6 text-[0.9375rem] font-semibold text-white transition hover:bg-orange-700">
            <?php echo esc_html(mb_option('blogarchive_card_button_text') ?: pll__('Czytaj więcej')); ?>
        </span>
    </div>
</a>
