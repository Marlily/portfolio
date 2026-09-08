<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('template-parts/hero-post'); ?>

    <section>
        <div class="container-content flex justify-center py-12 lg:py-26">
            <div class="wysiwyg w-full max-w-[58rem]">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php
    $related = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'post__not_in'   => [get_the_ID()],
        'category__in'   => wp_list_pluck(get_the_category(), 'term_id') ?: null,
    ]);

    if (!$related) {
        $related = get_posts([
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'post__not_in'   => [get_the_ID()],
        ]);
    }

    if ($related) :
    ?>
        <section class="overflow-hidden bg-blue-500">
            <div class="container-content flex flex-col gap-8 py-12 lg:gap-12 lg:py-26">

                <p class="reveal text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-white lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                    <span class="font-bold"><?php echo esc_html(mb_option('blog_related_heading_bold') ?: pll__('Zobacz')); ?></span> <?php echo esc_html(mb_option('blog_related_heading_regular') ?: pll__('także')); ?>
                </p>

                <div class="related-posts-slider glide w-full min-w-0">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php foreach ($related as $i => $related_post) : ?>
                                <li class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i % 3]; ?> glide__slide pt-2">
                                    <?php get_template_part('template-parts/blog-card', null, ['post' => $related_post]); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <?php if (count($related) > 1) : ?>
                        <div class="glide__bullets mt-8 flex items-center justify-center gap-4" data-glide-el="controls[nav]">
                            <?php foreach ($related as $i => $related_post) : ?>
                                <button type="button" class="glide__bullet h-2 w-2 shrink-0 rounded-full bg-blue-gray-50 transition-all [&.glide\_\_bullet--active]:w-12 [&.glide\_\_bullet--active]:bg-orange-500" data-glide-dir="=<?php echo (int) $i; ?>"></button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </section>
    <?php endif; ?>

    <?php
    get_template_part('template-parts/cta', null, [
        'heading_after' => mb_option('blog_post_cta_heading_after') ?: pll__(' swojego produktu?'),
        'description'   => mb_option('blog_post_cta_description') ?: pll__('Prześlij link, zdjęcie lub krótki opis produktu, a przygotujemy wstępną analizę możliwości importu.'),
        'cta_text'      => mb_option('blog_post_cta_button_text') ?: pll__('Wyceń produkt'),
    ]);
    ?>

<?php endwhile; ?>

<?php get_footer(); ?>
