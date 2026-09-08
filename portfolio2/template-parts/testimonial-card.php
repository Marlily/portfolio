<?php
$quote = $args['testimonial_quote'] ?? '';
$name  = $args['testimonial_name'] ?? '';
$title = $args['testimonial_title'] ?? '';
?>

<div class="relative flex h-full flex-col gap-6 border border-blue-gray-50 bg-white px-6 pt-11 pb-8 shadow-[0_0.625rem_1.25rem_rgba(33,40,53,0.04)] lg:gap-8 lg:px-12 lg:pt-22 lg:pb-14">
    <div class="absolute left-6 top-0 flex size-14 -translate-y-1/2 items-center justify-center bg-orange-500 lg:left-14">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-quote-right.svg'); ?>" alt="" class="size-6">
    </div>
    <p class="flex-1 text-[1.75rem]/[1.25] font-medium tracking-[-0.0175rem] text-blue-500 lg:min-h-44">
        <?php echo esc_html($quote); ?>
    </p>
    <div class="flex flex-col gap-1 border-t border-blue-gray-50 pt-8">
        <p class="text-base font-semibold tracking-[-0.0125rem] text-blue-500">
            <?php echo esc_html($name); ?>
        </p>
        <p class="text-[0.9375rem] tracking-[-0.009375rem] text-blue-gray-300">
            <?php echo esc_html($title); ?>
        </p>
    </div>
</div>
