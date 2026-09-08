<?php /**
 * Template Name: Współpraca
 *
 *
 * @package raypathsklep
 */

get_header();

$coop_hero     = get_field( 'coop_hero' );
$coop_intro    = get_field( 'coop_intro' );
$coop_benefits = get_field( 'coop_benefits' );
$coop_contact  = get_field( 'coop_contact' );

$hero_title     = $coop_hero['title'] ?? 'Współpraca';
$hero_image     = $coop_hero['image'] ?? null;
$hero_image_url = is_array( $hero_image ) ? ( $hero_image['url'] ?? '' ) : '';
$hero_image_alt = is_array( $hero_image ) ? ( $hero_image['alt'] ?? $hero_title ) : $hero_title;
?>

<?php echo get_template_part(
	'template-parts/layout/hero',
	'',
	array(
		'title' => esc_html( $hero_title ),
		'img'   => $hero_image_url ? esc_url( $hero_image_url ) : get_template_directory_uri() . '/img/temp/hero.jpg',
		'alt'   => esc_attr( $hero_image_alt ),
	)
) ?>

<main>
    <section>
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

                <span class="text-typo text-[0.875rem]/[140%] font-normal">Współpraca</span>
            </nav>

            <div class="flex flex-col lg:flex-row gap-6 mb-16">
				<?php
				$intro_title = $coop_intro['title'] ?? '';
				$intro_text  = $coop_intro['text'] ?? '';
				?>
                <?php if ( $intro_title ) : ?>
                	<h2 class="lg:max-w-1/2 lg:w-[37.2rem] lg:min-w-[37.2rem] mb-0"><?php echo esc_html( $intro_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $intro_text ) : ?>
                	<p class="grow"><?php echo esc_html( $intro_text ); ?></p>
				<?php endif; ?>
            </div>

            <div class="flex flex-col justify-start items-start gap-10 mb-30">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">
					<?php if ( ! empty( $coop_benefits ) && is_array( $coop_benefits ) ) : ?>
						<?php foreach ( $coop_benefits as $benefit ) :
							$benefit_icon     = $benefit['icon'] ?? null;
							$benefit_icon_url = is_array( $benefit_icon ) ? ( $benefit_icon['url'] ?? '' ) : '';
							$benefit_icon_alt = is_array( $benefit_icon ) ? ( $benefit_icon['alt'] ?? ( $benefit['title'] ?? '' ) ) : ( $benefit['title'] ?? '' );
							$benefit_title    = $benefit['title'] ?? '';
							$benefit_text     = $benefit['text'] ?? '';

							if ( ! $benefit_title && ! $benefit_text && ! $benefit_icon_url ) {
								continue;
							}
							?>
                    <div class="flex justify-start items-start gap-6">
                        <div class="size-24 bg-white shadow-lg rounded-2xl outline outline-1 outline-offset-[-1px] outline-medium-grey inline-flex flex-col justify-center items-center gap-2">
                            <div class="size-6 relative overflow-hidden">
								<?php if ( $benefit_icon_url ) : ?>
	                            	<img src="<?php echo esc_url( $benefit_icon_url ); ?>" alt="<?php echo esc_attr( $benefit_icon_alt ); ?>" class="w-6 h-6 object-contain">
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
							<?php if ( $benefit_title ) : ?>
                            <h3 class="self-stretch justify-start text-typo text-2xl font-medium"><?php echo esc_html( $benefit_title ); ?></h3>
							<?php endif; ?>
							<?php if ( $benefit_text ) : ?>
                            <p class="self-stretch justify-start text-grey text-base font-normal"><?php echo esc_html( $benefit_text ); ?></p>
							<?php endif; ?>
                        </div>
                    </div>
						<?php endforeach; ?>
					<?php endif; ?>
                </div>
            </div>

        </div>
    </section>

    <section class="pb-30">
        <div class="container-content">
            <div class="flex gap-14 flex-col lg:flex-row">
                <div class="flex-1 lg:max-w-1/2 lg:w-157 lg:min-w-157">
					<?php
					$contact_left_title = $coop_contact['left_title'] ?? '';
					$contact_left_text  = $coop_contact['left_text'] ?? '';
					$contact_right      = $coop_contact['right'] ?? array();
					?>
                    <?php if ( $contact_left_title ) : ?>
                    	<h2 class="mb-4"><?php echo esc_html( $contact_left_title ); ?></h2>
					<?php endif; ?>
                    <?php if ( $contact_left_text ) : ?>
                    	<p class="mb-10"><?php echo esc_html( $contact_left_text ); ?></p>
					<?php endif; ?>

                    <!-- form -->
                    <div class="form-wrapper">
                        <?php echo do_shortcode('[contact-form-7 id="108c7d6" title="Współpraca"]'); ?>
                    </div>

                </div>

                <div class="flex-1 flex flex-col">
					<?php
					$contact_right_title = $contact_right['title'] ?? '';
					$contact_right_text1 = $contact_right['text_primary'] ?? '';
					$contact_right_text2 = $contact_right['text_secondary'] ?? '';
					$contact_right_image = $contact_right['image'] ?? null;
					$contact_img_url     = is_array( $contact_right_image ) ? ( $contact_right_image['url'] ?? '' ) : '';
					$contact_img_alt     = is_array( $contact_right_image ) ? ( $contact_right_image['alt'] ?? $contact_right_title ) : $contact_right_title;
					?>
                    <?php if ( $contact_right_title ) : ?>
                    	<h2 class=""><?php echo esc_html( $contact_right_title ); ?></h2>
					<?php endif; ?>
                    <?php if ( $contact_right_text1 ) : ?>
                    	<p class="mb-6"><?php echo esc_html( $contact_right_text1 ); ?></p>
					<?php endif; ?>
                    <?php if ( $contact_right_text2 ) : ?>
                    	<p class="mb-16"><?php echo esc_html( $contact_right_text2 ); ?></p>
					<?php endif; ?>
					<?php if ( $contact_img_url ) : ?>
                    	<img src="<?php echo esc_url( $contact_img_url ); ?>" alt="<?php echo esc_attr( $contact_img_alt ); ?>" class="rounded-3xl w-full grow mt-auto object-cover h-80.75">
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>