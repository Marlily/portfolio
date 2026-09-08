<section>
    <div class="container-content flex flex-col gap-8 pt-12 lg:gap-12 lg:pt-26">

        <?php get_template_part('template-parts/knowledge-base-badges'); ?>

        <?php if (have_posts()) : ?>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <?php $i = 0; while (have_posts()) : the_post(); ?>
                    <div class="reveal <?php echo ['', 'delay-100', 'delay-200'][$i++ % 3]; ?> pt-2">
                        <?php get_template_part('template-parts/blog-card', null, ['post' => get_post()]); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php get_template_part('template-parts/pagination', null, ['aria_label' => mb_option('blogarchive_pagination_aria_label') ?: pll__('Nawigacja po wpisach')]); ?>

        <?php else : ?>

            <p class="text-base text-blue-gray-300"><?php echo esc_html(mb_option('blogarchive_empty_text') ?: pll__('Brak artykułów do wyświetlenia.')); ?></p>

        <?php endif; ?>

    </div>
</section>
