<?php /**
 * Template Name: O nas
 *
 *
 * @package raypathsklep
 */

get_header();

$about_hero      = get_field( 'about_hero' );
$about_intro     = get_field( 'about_intro' );
$about_research  = get_field( 'about_research' );
$about_downloads = get_field( 'about_downloads' );

$hero_title     = $about_hero['title'] ?? 'O nas';
$hero_image     = $about_hero['image'] ?? null;
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

                <span class="text-typo text-[0.875rem]/[140%] font-normal">O nas</span>
            </nav>
        </div>
    </section>

    <section>
        <div class="container-content">
			<?php
			$intro_title = $about_intro['title'] ?? '';
			$intro_lead  = $about_intro['lead'] ?? '';
			$intro_text  = $about_intro['text'] ?? '';
			?>
            <div class="flex justify-start items-start  gap-6 flex-wrap mb-8 lg:mb-16">

				<?php if ( $intro_title ) : ?>
                    <h2 class="grow text-5xl font-semibold text-left text-black">
                    <?php echo esc_html( $intro_title ); ?>
                    </h2>
				<?php endif; ?>

				<?php if ( $intro_lead ) : ?>
                    <p class="max-w-full lg:w-173.25 lg:min-w-173.25 text-lg font-medium text-left text-grey">
                    <?php echo esc_html( $intro_lead ); ?>
                    </p>
				<?php endif; ?>
             
            </div>

			<?php if ( $intro_text ) : ?>
            <p class="text-grey mb-8 lg:mb-16"><?php echo wp_kses_post( $intro_text ); ?></p>
			<?php endif; ?>
        </div>
    </section>

    <section class="mb-8 lg:mb-16">
        <div class="container-content">
            <div class="flex flex-col justify-start items-start gap-8">
                <div class="flex justify-start items-start relative gap-8 flex-col lg:flex-row w-full">
					<?php
					$research_title   = $about_research['title'] ?? '';
					$research_items   = $about_research['items'] ?? array();
					$research_image   = $about_research['image'] ?? null;
					$research_img_url = is_array( $research_image ) ? ( $research_image['url'] ?? '' ) : '';
					$research_img_alt = is_array( $research_image ) ? ( $research_image['alt'] ?? $research_title ) : $research_title;
					?>
                    <div class="flex flex-col justify-start items-start relative gap-6 max-w-full lg:w-162 lg:min-w-1/2">
						<?php if ( $research_title ) : ?>
                        <h2 class="text-[1.5rem]/[120%] text-typo font-medium mb-6"><?php echo esc_html( $research_title ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $research_items ) && is_array( $research_items ) ) : ?>
							<?php foreach ( $research_items as $item ) :
								$item_icon     = $item['icon'] ?? null;
								$item_icon_url = is_array( $item_icon ) ? ( $item_icon['url'] ?? '' ) : '';
								$item_icon_alt = is_array( $item_icon ) ? ( $item_icon['alt'] ?? ( $item['text'] ?? '' ) ) : ( $item['text'] ?? '' );
								$item_text     = $item['text'] ?? '';

								if ( ! $item_text && ! $item_icon_url ) {
									continue;
								}
								?>
                        <div class="flex justify-start items-center self-stretch  gap-6 rounded-3xl ">
                            <div class="flex flex-col justify-center items-center grow-0 shrink-0 h-[5.56rem] w-[5.56rem] relative gap-2 rounded-2xl bg-white border border-[#ececec] shadow-[0px_0px_18px_0px_rgba(0,0,0,0.1)]">
								<?php if ( $item_icon_url ) : ?>
                                <img class="max-h-6 max-w-6" src="<?php echo esc_url( $item_icon_url ); ?>" alt="<?php echo esc_attr( $item_icon_alt ); ?>">
								<?php endif; ?>
                            </div>
                            <div class="flex flex-col justify-start items-start flex-grow relative gap-2">
								<?php if ( $item_text ) : ?>
                                <p  class="text-base text-left text-[#3a3a3a]">
                                    <?php echo esc_html( $item_text ); ?>
                                </p>
								<?php endif; ?>
                            </div>
                        </div>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
					<?php if ( $research_img_url ) : ?>
                    <img src="<?php echo esc_url( $research_img_url ); ?>"
                    class="rounded-3xl object-cover max-w-full lg:max-w-158 w-full lg:w-auto" alt="<?php echo esc_attr( $research_img_alt ); ?>" >
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-20 lg:mb-30">
        <div class="container-content">
			<?php
			$downloads_title    = $about_downloads['title'] ?? 'Pliki do pobrania';
			$downloads_list     = $about_downloads['files'] ?? array();
			$download_icon_url  = get_template_directory_uri() . '/img/download.svg';
			$download_icon_alt  = $downloads_title;
			?>
			<?php if ( $downloads_title ) : ?>
            <h3 class="text-[1.5rem]/[120%] text-typo font-medium mb-8"><?php echo esc_html( $downloads_title ); ?></h3>
			<?php endif; ?>

			<?php if ( ! empty( $downloads_list ) && is_array( $downloads_list ) ) : ?>
            <ul class="grid grid-cols-2 lg:grid-cols-5 gap-x-6 gap-y-8">
				<?php foreach ( $downloads_list as $file ) :
					$file_label = $file['label'] ?? '';
					$file_url   = $file['url'] ?? '';

					if ( ! $file_label || ! $file_url ) {
						continue;
					}
					?>
                <li class="">
                    <a href="<?php echo esc_url( $file_url ); ?>" class="flex gap-2 underline text-grey items-start transition hover:text-accent-dark">
                        <img class="w-8" src="<?php echo esc_url( $download_icon_url ); ?>" alt="<?php echo esc_attr( $download_icon_alt ); ?>">
                        <?php echo esc_html( $file_label ); ?>
                    </a>
                </li>
				<?php endforeach; ?>
            </ul>
			<?php endif; ?>
        </div>
    </section>
</main>




<?php get_footer(); ?>