<?php get_header(); ?>

<?php while (have_posts()) : the_post();

get_template_part('template-parts/hero-page', null, [
    'heading'     => esc_html(get_the_title()),
    'description' => get_the_excerpt(),
    'image_url'   => get_the_post_thumbnail_url() ?: null,
    'crumbs'      => [
        ['title' => pll__('Usługi'), 'url' => null],
        ['title' => get_the_title(), 'url' => null],
    ],
]);

$story_blocks       = get_field('story_blocks') ?: [];
$story_blocks_intro = array_slice($story_blocks, 0, 2, true);
$story_blocks_rest  = array_slice($story_blocks, 2, null, true);

foreach ($story_blocks_intro as $i => $block) {
    get_template_part('template-parts/story-block', null, ['block' => $block, 'index' => $i]);
}

$services_heading_bold    = get_field('services_heading_bold');
$services_heading_regular = get_field('services_heading_regular');
$services_items           = get_field('services_items');

if ($services_heading_bold || $services_heading_regular || $services_items) :
?>
    <section>
        <div class="container-content flex flex-col gap-8 py-12 lg:gap-18 lg:py-26">

            <?php if ($services_heading_bold || $services_heading_regular) : ?>
                <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:w-[46.5rem] lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                    <?php if ($services_heading_bold) : ?><span class="font-bold"><?php echo esc_html($services_heading_bold); ?></span><?php endif; ?>
                    <?php echo esc_html($services_heading_regular); ?>
                </p>
            <?php endif; ?>

            <?php if ($services_items) : ?>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                    <?php foreach ($services_items as $key => $item) :
                        $icon        = $item['icon'] ?? null;
                        $icon_url    = $icon['url'] ?? '';
                        $title       = $item['title'] ?? '';
                        $description = $item['description'] ?? '';

                        if (!$icon_url && !$title && !$description) {
                            continue;
                        }

                        $delay = ['', 'delay-100', 'delay-200', 'delay-300'][$key % 4];
                    ?>
                        <div class="reveal <?php echo $delay; ?> flex flex-col gap-8 border border-blue-500/10 bg-[linear-gradient(124deg,rgba(3,42,74,0.05),rgba(3,42,74,0.005))] p-6 backdrop-blur-[10px] lg:p-12">
                            <?php if ($icon_url) : ?>
                                <div class="flex size-10 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="" class="size-5 lg:size-6">
                                </div>
                            <?php endif; ?>
                            <div class="flex flex-col gap-3">
                                <?php if ($title) : ?>
                                    <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.015rem]">
                                        <?php echo esc_html($title); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <p class="text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                                        <?php echo esc_html($description); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<?php get_template_part('template-parts/steps'); ?>

<?php foreach ($story_blocks_rest as $i => $block) : ?>
    <?php get_template_part('template-parts/story-block', null, ['block' => $block, 'index' => $i]); ?>
<?php endforeach; ?>

<?php get_template_part('template-parts/cta'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
