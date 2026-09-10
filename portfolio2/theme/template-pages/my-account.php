<?php
/* Template Name: Moje konto */

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

				

				<div class="container-content">


					<?php the_content();?>

				</div>

			<?php endwhile; // End of the loop.
			?>

</main>


<?php
get_footer();
