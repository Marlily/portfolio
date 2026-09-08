<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package raypathsklep
 */

get_header();
?>

	<section id="primary">
		<main id="main">
			<div class="container-content pt-3 pb-15">

				<?php

				while ( have_posts() ) :
					the_post(); ?>

					<nav class="breadcrumbs breadcrumbs-single-blog flex gap-4 py-15 items-center">
						<a class="text-typo text-[0.875rem]/[140%] font-normal transition hover:text-accent-dark" href="<?php echo home_url() ?>">Strona główna</a>

							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_2456_4866)">
									<path d="M6 3L11 8L6 13" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
									</g>
									<defs>
									<clipPath id="clip0_2456_4866">
									<rect width="16" height="16" fill="white"/>
									</clipPath>
									</defs>
							</svg>

							<a href="<?php echo home_url() ?>/blog" class="text-typo text-[0.875rem]/[140%] font-normal transition hover:text-accent-dark">Blog</a>
							
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_2456_4866)">
									<path d="M6 3L11 8L6 13" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
									</g>
									<defs>
									<clipPath id="clip0_2456_4866">
									<rect width="16" height="16" fill="white"/>
									</clipPath>
									</defs>
							</svg>

							<span class="text-typo text-[0.875rem]/[140%] font-normal"><?php echo wp_html_excerpt( get_the_title(), 17 ) . '...'; ?></span>
					</nav>

					<a href="http://raypath-sklep.local/blog" class="flex justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2">
						<svg
								width="20"
								height="20"
								viewBox="0 0 20 20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
								class="flex-grow-0 flex-shrink-0 w-5 h-5 relative"
								preserveAspectRatio="xMidYMid meet"
							>
								<g clip-path="url(#clip0_4035_7078)">
								<path
									d="M16.875 10H3.125"
									stroke="#286D2E"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
								></path>
								<path
									d="M8.75 4.375L3.125 10L8.75 15.625"
									stroke="#286D2E"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
								></path>
								</g>
								<defs>
								<clipPath id="clip0_4035_7078"><rect width="20" height="20" fill="white"></rect></clipPath>
								</defs>
						</svg>
						<span class="flex-grow-0 flex-shrink-0 text-base font-medium text-left text-[#286d2e]">
							Wróć do listy
						</span>
					</a>

					<article class="lg:px-37 mt-6">
						<p class="text-base/[140%]  uppercase mb-2 text-center mb-2">
							<?php echo get_the_date('j F Y'); ?>
						</p>
						<h1 class="article-h1 text-center"><?php the_title(); ?></h1>
						<div class="single-post-content"><?php the_content(); ?></div>
					</article>

				<?php endwhile;
				?>

			</div>
		</main>
	</section>



<?php
get_footer();
