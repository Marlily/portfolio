<?php /**
 * Template Name: Zamówienie
 *
 *
 * @package raypathsklep
 */

get_header(); ?>


<main>
    <section class="pb-30">
        <div class="container-content">
            <nav class="breadcrumbs flex gap-4 py-15 items-center">
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

                <span class="text-typo text-[0.875rem]/[140%] font-normal">Zamówienie</span>
            </nav>

            <div class="checkout-wrapper">
                <?php the_content(); ?>
            </div>

        </div>
    </section>
</main>


<?php get_footer(); ?>