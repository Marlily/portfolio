<?php
$block = $args['block'] ?? [];
$i     = $args['index'] ?? 0;

$heading_bold    = $block['heading_bold'] ?? '';
$heading_regular = $block['heading_regular'] ?? '';
$intro           = $block['intro'] ?? '';
$body            = $block['body'] ?? '';
$image           = $block['image'] ?? null;
$image_url       = $image['url'] ?? '';

$has_text  = $heading_bold || $heading_regular || $intro || $body;
$has_image = (bool) $image_url;

if (!$has_text && !$has_image) {
    return;
}

$dark = $i % 2 === 1;
?>
<section class="<?php echo $dark ? 'bg-blue-500' : ''; ?>">
    <div class="container-content grid grid-cols-1 gap-8 py-12 lg:grid-cols-2 lg:gap-8 lg:py-32">

        <?php if ($has_text) : ?>
            <div class="flex flex-col gap-8 self-start <?php echo $dark ? 'lg:order-2 lg:pl-16' : 'lg:order-1 lg:pr-16'; ?> lg:gap-8 lg:pb-18">
                <?php if ($heading_bold || $heading_regular) : ?>
                    <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem] <?php echo $dark ? 'text-white' : 'text-blue-500'; ?>">
                        <?php if ($heading_bold) : ?><span class="font-bold"><?php echo esc_html($heading_bold); ?></span><?php endif; ?>
                        <?php echo esc_html($heading_regular); ?>
                    </p>
                <?php endif; ?>

                <?php if ($intro) : ?>
                    <p class="reveal delay-100 text-sm/[1.5] tracking-[-0.00875rem] lg:text-lg/[1.5] lg:tracking-[-0.01125rem] <?php echo $dark ? 'text-white' : 'text-blue-gray-500'; ?>">
                        <?php echo esc_html($intro); ?>
                    </p>
                <?php endif; ?>

                <?php if ($body) : ?>
                    <div class="reveal delay-200 flex flex-col gap-4 text-sm/[1.5] tracking-[-0.00875rem] lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem] <?php echo $dark ? 'text-white/60' : 'text-blue-gray-500/60'; ?>">
                        <?php echo wp_kses_post($body); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($has_image) : ?>
            <div class="relative h-[22.125rem] shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.04)] <?php echo $dark ? 'lg:order-1' : 'lg:order-2'; ?> lg:h-auto">
                <img src="<?php echo esc_url($image_url); ?>" alt="" class="absolute inset-0 h-full w-full object-cover">
            </div>
        <?php endif; ?>

    </div>
</section>
