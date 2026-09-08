<?php
$post_obj = get_post($args['post'] ?? null);

if (!$post_obj) {
    return;
}

$categories = get_the_terms($post_obj, 'case_study_category');
$badge      = ($categories && !is_wp_error($categories)) ? $categories[0]->name : '';
?>

<a href="<?php echo esc_url(get_permalink($post_obj)); ?>" class="flex h-full flex-col gap-6 bg-white p-8 shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] lg:gap-8 lg:p-12">
    <div class="flex flex-1 flex-col gap-4 lg:gap-8">
        <?php if ($badge) : ?>
            <p class="border-b border-blue-500/10 pb-6 text-xs font-semibold tracking-[0.18rem] text-blue-500 uppercase">
                <?php echo esc_html($badge); ?>
            </p>
        <?php endif; ?>
        <div class="flex flex-col gap-4">
            <p class="text-[1.75rem]/[1.25] font-medium tracking-[-0.0175rem] text-blue-500">
                <?php echo esc_html(get_the_title($post_obj)); ?>
            </p>
            <p class="text-[0.9375rem]/[1.5] tracking-[-0.009375rem] text-blue-gray-300">
                <?php echo esc_html(get_the_excerpt($post_obj)); ?>
            </p>
        </div>
    </div>
    <span class="mt-auto inline-flex h-12 w-fit items-center justify-center bg-orange-500 px-6 text-[0.9375rem] font-semibold text-white transition hover:bg-orange-700">
        <?php echo esc_html(mb_option('csarchive_card_button_text') ?: pll__('Zobacz szczegóły')); ?>
    </span>
</a>
