<?php get_header(); ?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => 'Aktualności.',
    'btn_text' => 'Dowiedz się więcej',
    'btn_url'  => '#najnowsze-artykuly',
    'image'    => get_template_directory_uri() . '/img/blog/hero.jpg',
] ); ?>

<!-- Najnowsze artykuły -->
 <section class="py-10 lg:py-36" id="najnowsze-artykuly">
    <div class="container-content">
        <h2 class="text-[1.2rem]/[1] lg:text-[2rem]/[1] font-medium mb-6 lg:mb-14 tracking-[-0.04rem]">Najnowsze artykuły</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <?php
        $blog_query = new WP_Query( [
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'no_found_rows'  => true,
        ] );

        $p = 0; 

        while ( $blog_query->have_posts() ) :
            $blog_query->the_post();
            $thumb = get_the_post_thumbnail_url( null, 'large' );
        ?>
        <a href="<?php the_permalink(); ?>" class="flex gap-8 items-center min-w-0 group" data-aos="fade-up" data-aos-delay="<?php echo $p* 300; $p++; ?>">
            <?php if ( $thumb ) : ?>
            <div class="size-20 lg:size-75 rounded-2xl shrink-0 overflow-hidden">
                <img src="<?php echo esc_url( $thumb ); ?>"
                     alt="<?php the_title_attribute(); ?>"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <?php else : ?>
            <div class="size-20 lg:size-75 rounded-2xl shrink-0 bg-white/5"></div>
            <?php endif; ?>
            <div class="flex flex-col lg:gap-14 min-w-0 flex-1">
                <div class="flex flex-col gap-3 lg:gap-4">
                    <p class="font-gabarito font-normal text-[1.25rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 group-hover:text-white transition-colors"><?php the_title(); ?></p>
                    <p class="text-[0.9375rem]/[1.5] lg:text-[1.063rem]/[1.5] tracking-[-0.02375rem] text-white/50 line-clamp-3"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                </div>
                <p class="text-[0.9375rem]/[1.5] lg:text-[1.063rem]/[1.5] tracking-[-0.02375rem] text-orange-500">Dodano: <?php echo get_the_date( 'd.m.Y' ); ?></p>
            </div>
        </a>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </div>

    </div>
 </section>

 <!-- Wszystkie artykuły -->
 <section class="py-10 lg:py-36">
    <div class="container-content">
        <h2 class="text-[1.2rem]/[1] lg:text-[2rem]/[1] font-medium mb-6 lg:mb-14 tracking-[-0.04rem]" data-aos="fade-up">Wszystkie artykuły</h2>

        
        <?php
        $latest_ids = get_posts( [
            'posts_per_page' => 4,
            'fields'         => 'ids',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ] );

        $paged     = get_query_var( 'paged' ) ?: 1;
        $all_query = new WP_Query( [
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'paged'          => $paged,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post__not_in'   => $latest_ids,
        ] );
        ?>

        <div class="flex flex-col gap-14">

        <?php while ( $all_query->have_posts() ) :
            $all_query->the_post();
            $thumb = get_the_post_thumbnail_url( null, 'full' );
        ?>
        <a href="<?php the_permalink(); ?>" class="flex flex-col gap-12 group" data-aos="fade-up">
            <?php if ( $thumb ) : ?>
            <div class="w-full h-64 lg:h-180 rounded-2xl overflow-hidden">
                <img src="<?php echo esc_url( $thumb ); ?>"
                     alt="<?php the_title_attribute(); ?>"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            </div>
            <?php else : ?>
            <div class="w-full h-64 lg:h-180 rounded-2xl bg-white/5"></div>
            <?php endif; ?>
            <div class="flex flex-col gap-4">
                <p class="font-gabarito font-normal text-[1.25rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 group-hover:text-white transition-colors"><?php the_title(); ?></p>
                <p class="text-[0.9375rem]/[1.5] lg:text-[1.063rem]/[1.5] tracking-[-0.02375rem] text-white/50"><?php echo wp_trim_words( get_the_excerpt(), 35 ); ?></p>
                <p class="text-[0.9375rem]/[1.5] lg:text-[1.063rem]/[1.5] tracking-[-0.02375rem] text-orange-500">Dodano: <?php echo get_the_date( 'd.m.Y' ); ?></p>
            </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
        $pagination = paginate_links( [
            'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => $all_query->max_num_pages,
            'prev_text' => '←',
            'next_text' => '→',
            'type'      => 'plain',
        ] );
        if ( $pagination ) :
        ?>
        <nav class="blog-pagination mt-16 flex items-center justify-center gap-1" aria-label="Paginacja">
            <?php echo $pagination; ?>
        </nav>
        <?php endif; ?>

    </div>
 </section>


<?php get_footer(); ?>
