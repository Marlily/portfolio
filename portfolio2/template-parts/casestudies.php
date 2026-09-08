<?php
$heading_bold    = get_field('casestudies_heading_bold') ?: pll__('Historie');
$heading_regular = get_field('casestudies_heading_regular') ?: pll__(' naszych realizacji');
$description     = get_field('casestudies_description') ?: pll__('Zobacz wybrane projekty importowe zrealizowane dla naszych klientów.');
$cta_text        = get_field('casestudies_cta_text') ?: pll__('Wszystkie case studies');
$cta_url         = get_field('casestudies_cta_url') ?: get_post_type_archive_link('case_study') ?: '#';

$posts = get_posts([
    'post_type'      => 'case_study',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);
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

        <?php if ($posts) : ?>
            <div class="casestudies-slider glide w-full min-w-0 overflow-hidden lg:pb-14">
                <div class="glide__track !overflow-visible" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php foreach ($posts as $i => $post) : ?>
                            <li class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i % 3]; ?> glide__slide pt-2">
                                <?php get_template_part('template-parts/casestudy-card', null, ['post' => $post]); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <?php if (count($posts) > 1) : ?>
                    <div class="glide__bullets mt-8 flex items-center justify-center gap-4 lg:absolute lg:bottom-0 lg:mt-0" data-glide-el="controls[nav]">
                        <?php foreach ($posts as $i => $post) : ?>
                            <button type="button" class="glide__bullet h-2 w-2 shrink-0 rounded-full bg-blue-gray-50 transition-all [&.glide\_\_bullet--active]:w-12 [&.glide\_\_bullet--active]:bg-orange-500" data-glide-dir="=<?php echo (int) $i; ?>"></button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
