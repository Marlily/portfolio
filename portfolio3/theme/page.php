<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raypathsklep
 */

get_header();
?>

<main id="main">

    <section>
        <div class="container-content">
            <nav class="breadcrumbs breadcrumbs-page flex gap-4 py-15 items-center">
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

                <span class="text-typo text-[0.875rem]/[140%] font-normal"><?php the_title();?></span>
            </nav>
        </div>
    </section>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>

				

				<div class="page-custom-content max-w-250 mx-auto pb-10 px-4">

					<h1 class="text-[3rem]/[110%] font-semibold text-typo mb-6 w-full"><?php the_title() ?></h1>

					<?php the_content();?>

				</div>

			<?php endwhile; // End of the loop.
			?>

</main>


<?php
get_footer();
