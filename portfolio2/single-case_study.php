<?php get_header(); ?>

<?php while (have_posts()) : the_post();

$challenge_intro    = get_field('challenge_intro');
$challenge_body     = get_field('challenge_body');
$client_description = get_field('client_description');
$actions_intro      = get_field('actions_intro');
$actions_body       = get_field('actions_body');
$results_intro      = get_field('results_intro');
$results_body       = get_field('results_body');
$key_effects        = get_field('key_effects');

$cs_label_challenge          = mb_option('cs_label_challenge') ?: pll__('Wyzwanie');
$cs_label_client             = mb_option('cs_label_client') ?: pll__('O kliencie');
$cs_label_actions_regular    = mb_option('cs_label_actions_regular') ?: pll__('Nasze');
$cs_label_actions_bold       = mb_option('cs_label_actions_bold') ?: pll__('działania');
$cs_label_results            = mb_option('cs_label_results') ?: pll__('Rezultaty');
$cs_label_key_effects_regular = mb_option('cs_label_key_effects_regular') ?: pll__('Kluczowe');
$cs_label_key_effects_bold    = mb_option('cs_label_key_effects_bold') ?: pll__('efekty');
$cs_label_related_regular    = mb_option('cs_label_related_regular') ?: pll__('Zobacz');
$cs_label_related_bold       = mb_option('cs_label_related_bold') ?: pll__('także');

get_template_part('template-parts/hero-page', null, [
    'heading'     => esc_html(get_the_title()),
    'description' => get_the_excerpt(),
    'crumbs'      => [
        ['title' => pll__('O nas'), 'url' => null],
        ['title' => pll__('Case study'), 'url' => get_post_type_archive_link('case_study')],
        ['title' => get_the_title(), 'url' => null],
    ],
]);
?>

<section class="overflow-hidden">
    <div class="container-content grid grid-cols-1 gap-6 py-12 lg:grid-cols-[30.3125rem_1fr] lg:gap-8 lg:py-26">

        <div class="flex flex-col gap-12 lg:gap-18 lg:pr-12">

            <?php if ($challenge_intro || $challenge_body) : ?>
                <div class="flex flex-col gap-6 lg:gap-8">
                    <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                        <?php echo esc_html($cs_label_challenge); ?>
                    </p>
                    <div class="flex flex-col gap-6 text-blue-gray-500 lg:gap-8">
                        <?php if ($challenge_intro) : ?>
                            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                                <?php echo esc_html($challenge_intro); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($challenge_body) : ?>
                            <p class="reveal delay-150 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                                <?php echo wp_kses_post($challenge_body); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($client_description) : ?>
                <div class="reveal delay-200 flex flex-col gap-4 border-l-2 border-orange-500 py-4 pl-6 lg:gap-8 lg:pl-12">
                    <p class="text-xs font-semibold tracking-[0.18rem] text-blue-500 uppercase">
                        <?php echo esc_html($cs_label_client); ?>
                    </p>
                    <p class="text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                        <?php echo esc_html($client_description); ?>
                    </p>
                </div>
            <?php endif; ?>

        </div>

        <div class="flex flex-col gap-6 lg:gap-8">

            <?php if ($actions_intro || $actions_body) : ?>
                <div class="flex flex-col gap-6 bg-white p-8 shadow-[0_0.625rem_1.25rem_rgba(33,40,53,0.04)] lg:gap-8 lg:p-12">
                    <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                        <?php echo esc_html($cs_label_actions_regular); ?> <span class="font-bold"><?php echo esc_html($cs_label_actions_bold); ?></span>
                    </p>
                    <div class="flex flex-col gap-6 text-blue-gray-500 lg:gap-8">
                        <?php if ($actions_intro) : ?>
                            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                                <?php echo esc_html($actions_intro); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($actions_body) : ?>
                            <p class="reveal delay-150 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                                <?php echo wp_kses_post($actions_body); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($results_intro || $results_body) : ?>
                <div class="flex flex-col gap-6 bg-white p-8 shadow-[0_0.625rem_1.25rem_rgba(33,40,53,0.04)] lg:gap-8 lg:p-12">
                    <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                        <?php echo esc_html($cs_label_results); ?>
                    </p>
                    <div class="flex flex-col gap-6 text-blue-gray-500 lg:gap-8">
                        <?php if ($results_intro) : ?>
                            <p class="reveal delay-100 text-base/[1.5] font-medium tracking-[-0.01rem] lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                                <?php echo esc_html($results_intro); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($results_body) : ?>
                            <p class="reveal delay-150 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                                <?php echo wp_kses_post($results_body); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($key_effects) : ?>
                <div class="flex flex-col gap-6 bg-white p-8 shadow-[0_0.625rem_1.25rem_rgba(33,40,53,0.04)] lg:gap-8 lg:p-12">
                    <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                        <?php echo esc_html($cs_label_key_effects_regular); ?> <span class="font-bold"><?php echo esc_html($cs_label_key_effects_bold); ?></span>
                    </p>
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                        <?php foreach ($key_effects as $key => $effect) :
                            $delay = ['', 'delay-100', 'delay-200', 'delay-300'][$key % 4];
                        ?>
                            <div class="reveal <?php echo $delay; ?> flex items-center gap-4">
                                <div class="flex size-10 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                                    <?php echo importio_get_icon('check', 'size-5 lg:size-6'); ?>
                                </div>
                                <p class="flex-1 text-sm/[1.5] tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem]/[1.5] lg:tracking-[-0.009375rem]">
                                    <?php echo esc_html($effect['label']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>

<?php
$related = get_posts([
    'post_type'      => 'case_study',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'post__not_in'   => [get_the_ID()],
]);

if ($related) :
?>
    <section class="overflow-hidden bg-blue-500">
        <div class="container-content flex flex-col gap-8 py-12 lg:gap-18 lg:py-26">

            <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-white lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                <?php echo esc_html($cs_label_related_regular); ?> <?php echo esc_html($cs_label_related_bold); ?>
            </p>

            <div class="casestudies-slider glide w-full min-w-0">
                <div class="glide__track !overflow-visible" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php foreach ($related as $i => $related_post) : ?>
                            <li class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i % 3]; ?> glide__slide pt-2">
                                <?php get_template_part('template-parts/casestudy-card', null, ['post' => $related_post]); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

            <?php if (count($related) > 1) : ?>
                <div class="glide__bullets mt-8 flex items-center justify-end gap-4" data-glide-el="controls[nav]">
                    <?php foreach ($related as $i => $related_post) : ?>
                        <button type="button" class="glide__bullet h-2 w-2 shrink-0 rounded-full bg-blue-gray-50 transition-all [&.glide\_\_bullet--active]:w-12 [&.glide\_\_bullet--active]:bg-orange-500" data-glide-dir="=<?php echo (int) $i; ?>"></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<?php get_template_part('template-parts/cta'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
