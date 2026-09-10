<?php /**
 * Template Name: Recykling
 *
 *
 * @package raypathsklep
 */

get_header();

$recycling_hero   = get_field( 'recycling_hero' );
$recycling_intro  = get_field( 'recycling_intro' );

$hero_title       = $recycling_hero['title'] ?? 'Recykling';
$hero_image       = $recycling_hero['image'] ?? null;
$hero_image_url   = is_array( $hero_image ) ? ( $hero_image['url'] ?? '' ) : '';
$hero_image_alt   = is_array( $hero_image ) ? ( $hero_image['alt'] ?? $hero_title ) : $hero_title;
$hero_heading_col = $recycling_hero['heading_color'] ?? 'text-white';

echo get_template_part(
	'template-parts/layout/hero',
	'',
	array(
		'title'        => esc_html( $hero_title ),
		'img'          => $hero_image_url ? esc_url( $hero_image_url ) : get_template_directory_uri() . '/img/temp/recykling-hero.jpg',
		'headingColor' => esc_attr( $hero_heading_col ),
		'alt'          => esc_attr( $hero_image_alt ),
	)
);
?>

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

                <span class="text-typo text-[0.875rem]/[140%] font-normal">Recykling</span>
            </nav>

			<?php
			$intro_image        = $recycling_intro['image'] ?? null;
			$intro_image_url    = is_array( $intro_image ) ? ( $intro_image['url'] ?? '' ) : '';
			$intro_image_alt    = is_array( $intro_image ) ? ( $intro_image['alt'] ?? ( $recycling_intro['title'] ?? '' ) ) : ( $recycling_intro['title'] ?? '' );
			$intro_top_title    = $recycling_intro['top_title'] ?? '';
			$intro_title        = $recycling_intro['title'] ?? '';
			$intro_text_primary = $recycling_intro['text_primary'] ?? '';
			$intro_text_second  = $recycling_intro['text_secondary'] ?? '';
			$intro_btn_label    = $recycling_intro['button_label'] ?? '';
			$intro_btn_url      = $recycling_intro['button_url'] ?? '';
			?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
				<?php if ( $intro_image_url ) : ?>
                	<img class="object-contain rounded-3xl" src="<?php echo esc_url( $intro_image_url ); ?>" alt="<?php echo esc_attr( $intro_image_alt ); ?>">
				<?php endif; ?>
                <div class="flex flex-col items-start">
					<?php if ( $intro_top_title ) : ?>
                    <p class="top-title"><?php echo esc_html( $intro_top_title ); ?></p>
					<?php endif; ?>
					<?php if ( $intro_title ) : ?>
                    <h2 class="mb-6"><?php echo esc_html( $intro_title ); ?></h2>
					<?php endif; ?>
					<?php if ( $intro_text_primary ) : ?>
                    <p class="mb-6"><?php echo esc_html( $intro_text_primary ); ?></p>
					<?php endif; ?>
					<?php if ( $intro_text_second ) : ?>
                    <p class="mb-10"><?php echo esc_html( $intro_text_second ); ?></p>
					<?php endif; ?>
					<?php if ( $intro_btn_label && $intro_btn_url ) : ?>
                    <a href="<?php echo esc_url( $intro_btn_url ); ?>" class="btn mt-auto"><?php echo esc_html( $intro_btn_label ); ?></a>
					<?php endif; ?>
                </div>
            </div>

        </div>
    </section>
</main>


<?php get_footer(); ?>