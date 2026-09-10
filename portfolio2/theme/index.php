<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raypathsklep
 */

get_header();
?>

<?php echo get_template_part('template-parts/layout/hero', '', array(
    'title' => 'Blog',
    'img' => get_template_directory_uri() . '/img/temp/blog-hero.jpg',
)) ?>


<main id="main" class="py-15">

	<div class="container-content">

		<h2 class="mb-10">Ostatnie dodane</h2>

		<?php
		$latest_posts = new WP_Query([
			'posts_per_page' => 3,
			'post_status' => 'publish',
		]);
		?>

		<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">

			<?php if ($latest_posts->have_posts()) : ?>
				
				<?php $i = 0; ?>
				
				<?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>

					<?php if ($i === 0): ?>
						<!-- left column -->
						<article class="md:col-span-1" id="post-<?php the_ID(); ?>">

							<a href="#" class="block group">
								<?php the_post_thumbnail('large', ['class' => 'w-full mb-6 rounded-3xl object-cover transition group-hover:brightness-90']); ?>

								<p class="text-base/[140%]  uppercase mb-2">
									<?php echo get_the_date('j F Y'); ?>
								</p>

								<h3 class="text-[1.5rem]/[120%] font-medium text-typo mb-2 group-hover:text-accent-dark transition">
									<?php the_title(); ?>
								</h3>

								<div class="text-base/[160%] font-normal text-typo mb-0">
									<?php echo wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 10, '...' ); ?>
								</div>
							</a>
						</article>

						<!-- right column start -->
						<div class="flex flex-col gap-8">

					<?php else: ?>
						
						<!-- right column -->
						<article id="post-<?php the_ID(); ?>" class="grow">

							<a href="<?php the_permalink(); ?>" class="flex flex-col lg:flex-row gap-6 grow h-full group">
								
								<?php the_post_thumbnail('large', ['class' => 'w-full lg:w-[calc(50%-1rem)] rounded-3xl object-cover transition group-hover:brightness-90']); ?>

								<div class="w-full lg:w-[calc(50%-1rem)]  lg:flex-1">
									<p class="text-base/[140%]  uppercase mb-2">
										<?php echo get_the_date('j F Y'); ?>
									</p>

									<h3 class="text-[1.5rem]/[120%] font-medium text-typo mb-2 group-hover:text-accent-dark transition">
										<?php the_title(); ?>
									</h3>

									<p class="text-base/[160%] font-normal text-typo mb-2">
										<?php echo wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 10, '...' ); ?>
									</p>
								</div>
							</a>
						</article>

					<?php endif; ?>

					<?php $i++; ?>
				<?php endwhile; ?>

						</div> <!-- koniec prawej kolumny -->

			<?php wp_reset_postdata(); endif; ?>

		</div>


		<section class="">

			<h2 class="mb-10">Wszystkie artykuły</h2>

			<?php
				$paged = max( 1, get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? (int) get_query_var( 'page' ) : 1 ) );
				$ppp   = (int) get_option( 'posts_per_page' );
				$offset = 3 + ( ( $paged - 1 ) * $ppp );

				$posts_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'posts_per_page' => $ppp,
						'offset'         => $offset,
						'paged'          => $paged,
					)
				);

				if ( $posts_query->have_posts() ) { ?>
					<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">

				<?php 
					while ( $posts_query->have_posts() ) {
						$posts_query->the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<a href="<?php the_permalink(); ?>" class="w-full group">
								
								<?php the_post_thumbnail('large', ['class' => 'w-full rounded-3xl object-cover transition group-hover:brightness-90 mb-6']); ?>

									<p class="text-base/[140%]  uppercase mb-2">
										<?php echo get_the_date('j F Y'); ?>
									</p>

									<h3 class="text-[1.5rem]/[120%] font-medium text-typo mb-2 group-hover:text-accent-dark transition">
										<?php the_title(); ?>
									</h3>

									<p class="text-base/[160%] font-normal text-typo mb-2">
										<?php echo wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 10, '...' ); ?>
									</p>
							</a>

							
						</article>
					<?php }

					wp_reset_postdata();

					} ?>
					</div>

					<nav class="border-t border-medium-grey w-full mt-10 pt-5 w-full">
						<?php
						$total_posts = max( 0, (int) $posts_query->found_posts - 3 );
						$total_pages = $ppp > 0 ? (int) ceil( $total_posts / $ppp ) : 0;
						$big = 999999999;

						$pagination = paginate_links([
							'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format'    => '?paged=%#%',
							'current'   => $paged,
							'total'     => $total_pages,
							'prev_text' => '← Poprzednia',
							'next_text' => 'Następna →',
							'type'      => 'array',
							'mid_size'  => 2,
							'end_size'  => 1,
						]);

						if (!empty($pagination)) :
						?>
							<ul class="gap-2 grid grid-cols-3 items-center">

								<!-- Poprzednia -->
								<li class="flex justify-start">
									<?php if (get_previous_posts_link()) : ?>
										<?php previous_posts_link('<span class="flex items-center gap-[0.6rem] text-accent-dark font-medium text-base/[140%]"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><g clip-path="url(#clip0_4032_1471)">
											<path d="M16.875 10H3.125" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M8.75 4.375L3.125 10L8.75 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<defs>
											<clipPath id="clip0_4032_1471">
											<rect width="20" height="20" fill="white"/>
											</clipPath>
										</defs>
										</svg> Poprzednia</span>'); ?>
									<?php endif; ?>
								</li>

								<!-- Numery stron -->
								<li class="flex justify-center gap-[0.12rem]">

									<?php foreach ($pagination as $page) :

										if (strpos($page, 'prev') !== false || strpos($page, 'next') !== false) {
											continue;
										}
									?>
										<span class="pagination-item">
											<?php echo $page; ?>
										</span>
									<?php endforeach; ?>

								</li>

								<!-- Następna -->
								<li class="flex justify-end">
									<?php if (get_next_posts_link()) : ?>
										<?php next_posts_link('<span class="flex items-center gap-[0.6rem] text-accent-dark font-medium text-base/[140%]">Następna <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<g clip-path="url(#clip0_4032_1502)">
											<path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<defs>
											<clipPath id="clip0_4032_1502">
											<rect width="20" height="20" fill="white"/>
											</clipPath>
										</defs>
										</svg></span>'); ?>
									<?php endif; ?>
								</li>

							</ul>
						<?php endif; ?>
					</nav>

		</section>
	</div>
</main>


<?php get_footer(); ?>