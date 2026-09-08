<?php /**
 * Template Name: Strona główna
 *
 *
 * @package raypathsklep
 */

get_header();

$hero_slides         = get_field( 'hero_slider' );
$infoboxes           = get_field( 'infoboxes' );
$categories          = get_field( 'categories' );
$original_products   = get_field( 'original_products_section' );
$sets_section        = get_field( 'sets_section' );
$why_us_section      = get_field( 'why_us_section' );
$social_section      = get_field( 'social_section' );
?>

<!-- hero -->
<section class="">
    <div class="container-content">
    
        <div class="flex gap-4 flex-wrap lg:flex-nowrap">
                <div class="w-full lg:w-[calc(100%-26.5rem-1rem)] lg:min-w-[calc(100%-31.25rem-1rem)]">
                    <div class="swiper swiper-hero">
                        <div class="swiper-wrapper">
							<?php if ( ! empty( $hero_slides ) ) : ?>
								<?php foreach ( $hero_slides as $slide ) :
									$image        = $slide['image'] ?? null;
									$title        = $slide['title'] ?? '';
									$subtitle     = $slide['subtitle'] ?? '';
									$description  = $slide['description'] ?? '';
									$button_label = $slide['button_label'] ?? '';
									$button_url   = $slide['button_url'] ?? '';
									$image_url    = is_array( $image ) ? ( $image['url'] ?? '' ) : '';
									$image_alt    = is_array( $image ) ? ( $image['alt'] ?? $title ) : $title;
									?>
									<div class="swiper-slide rounded-3xl overflow-hidden">
										<div class="flex gap-4 flex-wrap lg:flex-nowrap h-125 relative items-center">
											<div class="flex-col w-full h-full rounded-3xl overflow-hidden relative before:top-0 before:left-0 before:bg-black/20 before:w-full before:h-full before:absolute before:block">
												<?php if ( $image_url ) : ?>
													<img class="rounded-3xl overflow-hidden w-full h-full object-cover" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
												<?php endif; ?>
											</div>
											<div class="w-full lg:w-auto flex-col flex justify-center items-start absolute z-20 px-6 lg:px-26.5 py-10">
												<?php if ( $title ) : ?>
													<h1 class="mb-2 text-white"><?php echo esc_html( $title ); ?></h1>
												<?php endif; ?>
												<?php if ( $subtitle ) : ?>
													<p class="mb-4 text-[2rem]/[120%] font-medium text-white"><?php echo esc_html( $subtitle ); ?></p>
												<?php endif; ?>
												<?php if ( $description ) : ?>
													<p class="mb-8 text-white"><?php echo esc_html( $description ); ?></p>
												<?php endif; ?>
												<?php if ( $button_url && $button_label ) : ?>
													<a class="btn" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_label ); ?></a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
                        </div>
                    
                    <!-- Arrows -->
                    <div class="swiper-button-prev !z-[99999] !left-4">
                        <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.78122 15.2198C8.8509 15.2895 8.90617 15.3722 8.94388 15.4632C8.9816 15.5543 9.00101 15.6519 9.00101 15.7504C9.00101 15.849 8.9816 15.9465 8.94388 16.0376C8.90617 16.1286 8.8509 16.2114 8.78122 16.281C8.71153 16.3507 8.62881 16.406 8.53776 16.4437C8.44672 16.4814 8.34914 16.5008 8.25059 16.5008C8.15204 16.5008 8.05446 16.4814 7.96342 16.4437C7.87237 16.406 7.78965 16.3507 7.71996 16.281L0.219965 8.78104C0.150232 8.71139 0.0949136 8.62867 0.0571704 8.53762C0.0194272 8.44657 0 8.34898 0 8.25042C0 8.15186 0.0194272 8.05426 0.0571704 7.96321C0.0949136 7.87216 0.150232 7.78945 0.219965 7.71979L7.71996 0.219792C7.8607 0.0790615 8.05157 -3.92322e-09 8.25059 0C8.44961 3.92322e-09 8.64048 0.0790615 8.78122 0.219792C8.92195 0.360523 9.00101 0.551394 9.00101 0.750417C9.00101 0.94944 8.92195 1.14031 8.78122 1.28104L1.8109 8.25042L8.78122 15.2198Z" fill="#286D2E"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next !z-[99999] !right-4">
                        <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.78104 8.78104L1.28104 16.281C1.21136 16.3507 1.12863 16.406 1.03759 16.4437C0.946545 16.4814 0.848963 16.5008 0.750417 16.5008C0.651871 16.5008 0.554289 16.4814 0.463245 16.4437C0.3722 16.406 0.289474 16.3507 0.219792 16.281C0.150109 16.2114 0.0948337 16.1286 0.0571218 16.0376C0.0194098 15.9465 0 15.849 0 15.7504C0 15.6519 0.0194098 15.5543 0.0571218 15.4632C0.0948337 15.3722 0.150109 15.2895 0.219792 15.2198L7.1901 8.25042L0.219792 1.28104C0.0790612 1.14031 -1.48284e-09 0.94944 0 0.750417C1.48284e-09 0.551394 0.0790612 0.360523 0.219792 0.219792C0.360522 0.0790615 0.551394 1.48284e-09 0.750417 0C0.94944 -1.48284e-09 1.14031 0.0790615 1.28104 0.219792L8.78104 7.71979C8.85077 7.78945 8.90609 7.87216 8.94384 7.96321C8.98158 8.05426 9.00101 8.15186 9.00101 8.25042C9.00101 8.34898 8.98158 8.44657 8.94384 8.53762C8.90609 8.62867 8.85077 8.71139 8.78104 8.78104Z" fill="#286D2E"/>
                        </svg>
                    </div>
        </div>
        </div>
    
        <div class="w-full lg:w-106 lg:min-w-106 flex flex-col md:flex-row lg:flex-col gap-4">
            <div class="rounded-3xl p-10 bg-light-green flex-1 relative flex flex-col justify-center ">
                <h2 class="text-accent-dark text-[2.5rem]/none mb-2 max-w-60">Wysyłka tego samego dnia!</h2>
                <p class="text-typo text-lg/[140%] font-semibold">Jeśli zrobisz zakupy do godziny 16.00</p>
                   <svg class="absolute top-4 right-4" width="115" height="115" viewBox="0 0 115 115" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.2" clip-path="url(#clip0_2688_8249)">
                         <path d="M57.5 57.9896V104.205" stroke="#286D2E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.6875 34.554L57.498 57.9852L100.309 34.554" stroke="#286D2E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M98.7562 82.1352L59.225 103.779C58.6961 104.068 58.1029 104.22 57.5 104.22C56.8971 104.22 56.3039 104.068 55.775 103.779L16.2437 82.1352C15.6793 81.8263 15.2081 81.3716 14.8794 80.8185C14.5506 80.2653 14.3765 79.6341 14.375 78.9907V36.0184C14.3765 35.3749 14.5506 34.7437 14.8794 34.1906C15.2081 33.6374 15.6793 33.1827 16.2437 32.8739L55.775 11.2305C56.3039 10.9411 56.8971 10.7894 57.5 10.7894C58.1029 10.7894 58.6961 10.9411 59.225 11.2305L98.7562 32.8739C99.3207 33.1827 99.7919 33.6374 100.121 34.1906C100.449 34.7437 100.624 35.3749 100.625 36.0184V78.9817C100.625 79.6266 100.452 80.2598 100.123 80.8146C99.7941 81.3695 99.3221 81.8256 98.7562 82.1352Z" stroke="#286D2E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M36.6367 21.7018L79.0609 44.9219V68.2813" stroke="#286D2E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_2688_8249">
                        <rect width="115" height="115" fill="white"/>
                        </clipPath>
                        </defs>
                </svg>
            </div>
            <div class="rounded-3xl p-10 bg-accent-dark flex-1 relative flex flex-col justify-center ">
                <h2 class="text-white text-[2.5rem]/none mb-2 max-w-60">Zrób zakupy na raty</h2>
                 <p class="text-light-green text-lg/[140%] font-semibold">Przekonaj się jakie to proste!</p>
                <svg class="absolute top-4 right-4" width="105" height="105" viewBox="0 0 105 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2688_8256)">
                        <path d="M83.6719 45.9375C90.0145 45.9375 95.1562 40.7958 95.1562 34.4531C95.1562 28.1105 90.0145 22.9688 83.6719 22.9688C77.3292 22.9688 72.1875 28.1105 72.1875 34.4531C72.1875 40.7958 77.3292 45.9375 83.6719 45.9375Z" stroke="#3CB64A" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.6875 85.3125H6.5625C5.69226 85.3125 4.85766 84.9668 4.24231 84.3514C3.62695 83.7361 3.28125 82.9015 3.28125 82.0312V65.625C3.28125 64.7548 3.62695 63.9202 4.24231 63.3048C4.85766 62.6894 5.69226 62.3438 6.5625 62.3438H19.6875" stroke="#3CB64A" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M45.9375 65.625H59.0625L86.543 59.3045C87.5533 59.0276 88.6139 58.9875 89.6422 59.1872C90.6706 59.3869 91.6391 59.821 92.4723 60.4559C93.3056 61.0908 93.9813 61.9093 94.4468 62.8478C94.9122 63.7863 95.155 64.8194 95.1562 65.867C95.1568 67.1319 94.8047 68.3719 94.1396 69.4478C93.4745 70.5237 92.5227 71.3929 91.391 71.9578L75.4688 78.75L49.2188 85.3125H19.6875V62.3438L29.9414 52.0899C30.8579 51.1765 31.9455 50.4529 33.1419 49.9602C34.3384 49.4676 35.6202 49.2156 36.9141 49.2188H57.4219C59.5975 49.2188 61.684 50.083 63.2224 51.6214C64.7607 53.1598 65.625 55.2463 65.625 57.4219C65.625 59.5975 64.7607 61.684 63.2224 63.2224C61.684 64.7608 59.5975 65.625 57.4219 65.625H45.9375Z" stroke="#3CB64A" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M72.1874 34.9822C69.9585 36.0364 67.4495 36.3452 65.0314 35.863C62.6134 35.3808 60.4147 34.1332 58.7606 32.3047C57.1066 30.4762 56.0849 28.1639 55.8467 25.7098C55.6085 23.2557 56.1665 20.7901 57.4381 18.6776C58.7097 16.5651 60.6274 14.918 62.9076 13.9799C65.1878 13.0417 67.7094 12.8623 70.0994 13.4682C72.4895 14.0741 74.6211 15.4331 76.179 17.3442C77.7368 19.2554 78.6383 21.6171 78.7499 24.0803" stroke="#3CB64A" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_2688_8256">
                        <rect width="105" height="105" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
     </div>
</section>
<!-- end hero -->

<!-- infoboxes -->
<section class="">
    <div class="container-content">
        <div class="self-stretch lg:h-56 py-20 flex justify-center items-center gap-2 [&::-webkit-scrollbar]:hidden scroll-smooth snap-x snap-mandatory overflow-x-auto lg:overflow-visible flex-wrap">
			<?php if ( ! empty( $infoboxes ) && is_array( $infoboxes ) ) : ?>
				<?php foreach ( $infoboxes as $infobox ) :
					$icon      = $infobox['icon'] ?? null;
					$icon_url  = is_array( $icon ) ? ( $icon['url'] ?? '' ) : '';
					$icon_alt  = is_array( $icon ) ? ( $icon['alt'] ?? ( $infobox['title'] ?? '' ) ) : ( $infobox['title'] ?? '' );
					$title     = $infobox['title'] ?? '';
					$text      = $infobox['text'] ?? '';
					?>
					<div class="size- flex justify-start items-center w-[85%] sm:w-[70%] snap-center lg:w-auto">
						<div data-filled="True" data-shape="Circle" data-size="Large" class="size-16 bg-white rounded-full outline outline-1 outline-offset-[-1px] outline-white backdrop-blur-[20.55px] inline-flex flex-col justify-center items-center gap-2">
							<div class="size-6 relative overflow-hidden">
								<?php if ( $icon_url ) : ?>
									<img class="size-6 object-contain" src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( $icon_alt ); ?>">
								<?php endif; ?>
							</div>
						</div>
						<div class="w-60 inline-flex flex-col justify-start items-start gap-1">
							<?php if ( $title ) : ?>
								<div class="self-stretch justify-start text-black text-base font-medium leading-6"><?php echo esc_html( $title ); ?></div>
							<?php endif; ?>
							<?php if ( $text ) : ?>
								<div class="self-stretch justify-start text-black text-sm font-normal leading-5"><?php echo esc_html( $text ); ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
        </div>
    </div>
</section>

<!-- Categories - desktop -->
<section class="overflow-hidden">
    <div class="container-content">
        <div class="self-stretch relative inline-flex flex-col justify-center items-center gap-10">
            <h2 class="w-full text-typo text-5xl font-semibold">Kategorie</h2>
        </div>
    </div>
    <!-- desktop -->
    <div class="self-stretch relative hidden lg:block">
         <div class="swiper categories-swiper before:block before:absolute before:top-0 before:right-0 before:h-full before:bg-linear-to-r before:w-64 before:from-transparent before:via-80% before:to-white before:z-40">
            <div class="swiper-wrapper relative ">
				<?php if ( ! empty( $categories ) && is_array( $categories ) ) : ?>
					<?php foreach ( $categories as $category ) :
						$category_title = $category['title'] ?? '';
						$category_link  = $category['link'] ?? '';
						$category_image = $category['image'] ?? null;
						$category_img   = is_array( $category_image ) ? ( $category_image['url'] ?? '' ) : '';
						$category_alt   = is_array( $category_image ) ? ( $category_image['alt'] ?? $category_title ) : $category_title;

						if ( ! $category_title || ! $category_img ) {
							continue;
						}
						?>
						<div class="swiper-slide !h-75 !w-[20rem]">
							<a href="<?php echo esc_url( $category_link ); ?>" class="w-full h-full relative block rounded-3xl overflow-hidden group">
								<img src="<?php echo esc_url( $category_img ); ?>" alt="<?php echo esc_attr( $category_alt ); ?>" class="object-cover w-full h-full group-hover:scale-120 transition-all duration-300 ease-in">
								<div class="w-full h-full absolute top-0 left-0 bg-linear-to-b from-transparent to-black/60 z-10"></div>
								<div class="p-4 bottom-8 left-1/2 -translate-x-1/2 absolute bg-white rounded-lg inline-flex justify-center items-center gap-2 z-20">
									<p class="text-center justify-start text-sm lg:text-lg/[140%] font-medium leading-6 text-nowrap"><?php echo esc_html( $category_title ); ?></p>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
            </div>
            
            <!-- Arrows -->
            <div class="swiper-button-prev !z-[99999]">
                <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.78122 15.2198C8.8509 15.2895 8.90617 15.3722 8.94388 15.4632C8.9816 15.5543 9.00101 15.6519 9.00101 15.7504C9.00101 15.849 8.9816 15.9465 8.94388 16.0376C8.90617 16.1286 8.8509 16.2114 8.78122 16.281C8.71153 16.3507 8.62881 16.406 8.53776 16.4437C8.44672 16.4814 8.34914 16.5008 8.25059 16.5008C8.15204 16.5008 8.05446 16.4814 7.96342 16.4437C7.87237 16.406 7.78965 16.3507 7.71996 16.281L0.219965 8.78104C0.150232 8.71139 0.0949136 8.62867 0.0571704 8.53762C0.0194272 8.44657 0 8.34898 0 8.25042C0 8.15186 0.0194272 8.05426 0.0571704 7.96321C0.0949136 7.87216 0.150232 7.78945 0.219965 7.71979L7.71996 0.219792C7.8607 0.0790615 8.05157 -3.92322e-09 8.25059 0C8.44961 3.92322e-09 8.64048 0.0790615 8.78122 0.219792C8.92195 0.360523 9.00101 0.551394 9.00101 0.750417C9.00101 0.94944 8.92195 1.14031 8.78122 1.28104L1.8109 8.25042L8.78122 15.2198Z" fill="#286D2E"/>
                </svg>
            </div>
            <div class="swiper-button-next !z-[99999]">
                <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.78104 8.78104L1.28104 16.281C1.21136 16.3507 1.12863 16.406 1.03759 16.4437C0.946545 16.4814 0.848963 16.5008 0.750417 16.5008C0.651871 16.5008 0.554289 16.4814 0.463245 16.4437C0.3722 16.406 0.289474 16.3507 0.219792 16.281C0.150109 16.2114 0.0948337 16.1286 0.0571218 16.0376C0.0194098 15.9465 0 15.849 0 15.7504C0 15.6519 0.0194098 15.5543 0.0571218 15.4632C0.0948337 15.3722 0.150109 15.2895 0.219792 15.2198L7.1901 8.25042L0.219792 1.28104C0.0790612 1.14031 -1.48284e-09 0.94944 0 0.750417C1.48284e-09 0.551394 0.0790612 0.360523 0.219792 0.219792C0.360522 0.0790615 0.551394 1.48284e-09 0.750417 0C0.94944 -1.48284e-09 1.14031 0.0790615 1.28104 0.219792L8.78104 7.71979C8.85077 7.78945 8.90609 7.87216 8.94384 7.96321C8.98158 8.05426 9.00101 8.15186 9.00101 8.25042C9.00101 8.34898 8.98158 8.44657 8.94384 8.53762C8.90609 8.62867 8.85077 8.71139 8.78104 8.78104Z" fill="#286D2E"/>
                </svg>
            </div>
        </div>

    </div>

    <!-- mobile -->
    <div class="container-content flex lg:hidden flex-col gap-6">
		<?php if ( ! empty( $categories ) && is_array( $categories ) ) : ?>
			<?php foreach ( $categories as $category ) :
				$category_title = $category['title'] ?? '';
				$category_link  = $category['link'] ?? '';
				$category_image = $category['image'] ?? null;
				$category_img   = is_array( $category_image ) ? ( $category_image['url'] ?? '' ) : '';
				$category_alt   = is_array( $category_image ) ? ( $category_image['alt'] ?? $category_title ) : $category_title;

				if ( ! $category_title || ! $category_img ) {
					continue;
				}
				?>
			<div class="h-33">
					<a href="<?php echo esc_url( $category_link ); ?>" class="w-full h-full relative block rounded-3xl overflow-hidden">   
						<img src="<?php echo esc_url( $category_img ); ?>" alt="<?php echo esc_attr( $category_alt ); ?>" class="object-cover w-full h-full ">
						<div class="w-full h-full absolute top-0 left-0 bg-linear-to-b from-transparent to-black/60 z-10"></div>
							
						<div class="px-4 py-2 top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 absolute bg-white rounded-lg inline-flex justify-center items-center gap-2 z-20">
							<p class="text-center justify-start text-lg/[140%] font-medium text-nowrap"><?php echo esc_html( $category_title ); ?></p>
						</div>
					</a>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>

</section>

<!-- slider products -->
<section id="poznaj-nasze-produkty" class="pb-6 lg:pb-26 relative">
    <div class="container-content">
        <div class="self-stretch pt-10 lg:pt-30 pb-10 inline-flex flex-col justify-start items-center overflow-hidden w-full">
            <div class="self-stretch flex flex-col justify-start items-center gap-8 w-full">
                <div class="self-stretch flex flex-col justify-start items-center gap-10">
                    <div class="inline-flex justify-between items-center w-full">
                        <h2 class="justify-start text-black text-5xl font-semibold leading-[52.80px] mb-0">Poznaj nasze produkty</h2>

                        <div id="products-tabs" class="justify-start items-start gap-10 absolute lg:static -bottom-4 hidden lg:flex">
                            <div class="p-2 flex justify-start items-center gap-2">
                                <button class="products-tabs-item justify-start text-accent-dark text-lg font-medium leading-6 cursor-pointer transition" data-target="promocje">Promocje</button>
                            </div>

                            <div class="p-2 flex justify-start items-center gap-2">
                                <button class="products-tabs-item justify-start text-black text-lg font-medium leading-6 cursor-pointer transition" data-target="polecane">Polecane</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products-slider-item active" id="promocje">        
            <?php
            $sale_products = wc_get_product_ids_on_sale();
            $sale_products = !empty($sale_products) ? $sale_products : array(0);

            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'post__in'       => $sale_products,
                'orderby'        => 'date',
                'order'          => 'DESC',
				'meta_query'     => array(
					array(
						'key'     => '_stock_status',
						'value'   => 'instock',
					),
				),
            );
            $loop = new WP_Query($args);
            ?>

            <div class="swiper products-swiper self-stretch px-6 relative inline-flex justify-start items-center gap-8 !pb-4">
                <div class="swiper-wrapper relative ">
                    <?php while ($loop->have_posts()) : $loop->the_post(); 
                        global $product;
                        $product = wc_get_product( get_the_ID() );
                        if ( ! $product || ! $product->is_in_stock() ) {
                            continue;
                        }

                        $is_variable    = $product->is_type( 'variable' );
                        $button_url     = $is_variable ? get_permalink( $product->get_id() ) : $product->add_to_cart_url();
                        $button_classes = $is_variable ? 'btn w-full' : 'btn w-full add_to_cart_button ajax_add_to_cart';
                        $button_attrs   = $is_variable ? '' : sprintf(
                            ' data-quantity="1" data-product_id="%s" data-product_sku="%s" rel="nofollow"',
                            esc_attr( $product->get_id() ),
                            esc_attr( $product->get_sku() )
                        );
                        $button_label   = $is_variable ? 'Zobacz produkt' : 'Dodaj do koszyka';

                        $price_html = $product->get_price_html();
                        if ( $is_variable ) {
                            $min_price = $product->get_variation_price( 'min', true );
                            $max_price = $product->get_variation_price( 'max', true );
                            $price_html = ( $min_price !== $max_price )
                                ? wc_price( $min_price ) . ' - ' . wc_price( $max_price )
                                : wc_price( $min_price );
                        }
                    ?>

                        <div class="swiper-slide !w-72 !h-90 p-6 relative bg-white rounded-3xl shadow-[0px_0px_10px_0px_RGBA(0,0,0,0.08)] inline-flex flex-col justify-center items-start gap-4 group" data-wishlist-item>
							<?php
							$badges = function_exists( 'raypath_get_product_badges' ) ? raypath_get_product_badges( $product ) : array();

							if ( ! empty( $badges ) ) :
								?>
								<div class="product-badges flex flex-col gap-2 absolute top-6 left-6 z-10">
									<?php echo implode( '', $badges ); ?>
								</div>
							<?php endif; ?>

							<button class="add-to-wishlist-btn absolute top-6 right-6 cursor-pointer" type="button" data-wishlist-product-id="<?php echo esc_attr( $product->get_id() ); ?>" data-wishlist-intent="add" aria-pressed="false" aria-label="Dodaj do ulubionych">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<foreignObject x="-4" y="-4" width="40" height="40"><div xmlns="http://www.w3.org/1999/xhtml" style="backdrop-filter:blur(2px);clip-path:url(#bgblur_0_4092_3604_clip_path);height:100%;width:100%"></div></foreignObject><g data-figma-bg-blur-radius="4">
									<rect width="32" height="32" rx="4" fill="white" fill-opacity="0.8"/>
									<path d="M20.4643 8C18.6205 8 17.0063 8.74017 16 9.9913C14.9938 8.74017 13.3795 8 11.5357 8C10.0681 8.00154 8.66099 8.54651 7.6232 9.51534C6.58541 10.4842 6.00165 11.7978 6 13.1679C6 19.0026 15.267 23.7254 15.6616 23.9204C15.7656 23.9727 15.8819 24 16 24C16.1181 24 16.2344 23.9727 16.3384 23.9204C16.733 23.7254 26 19.0026 26 13.1679C25.9983 11.7978 25.4146 10.4842 24.3768 9.51534C23.339 8.54651 21.9319 8.00154 20.4643 8ZM16 22.5701C14.3696 21.6832 7.42857 17.6431 7.42857 13.1679C7.42999 12.1514 7.86316 11.1769 8.63309 10.4581C9.40302 9.73936 10.4469 9.33497 11.5357 9.33365C13.2723 9.33365 14.7304 10.1972 15.3393 11.5842C15.3931 11.7065 15.4846 11.8111 15.6023 11.8847C15.7199 11.9583 15.8584 11.9976 16 11.9976C16.1416 11.9976 16.2801 11.9583 16.3977 11.8847C16.5154 11.8111 16.6069 11.7065 16.6607 11.5842C17.2696 10.1947 18.7277 9.33365 20.4643 9.33365C21.5531 9.33497 22.597 9.73936 23.3669 10.4581C24.1368 11.1769 24.57 12.1514 24.5714 13.1679C24.5714 17.6364 17.6286 21.6824 16 22.5701Z" fill="black"/>
									</g>
									<defs>
									<clipPath id="bgblur_0_4092_3604_clip_path" transform="translate(4 4)"><rect width="32" height="32" rx="4"/>
									</clipPath></defs>
								</svg>
							</button>

                            <a href="<?php the_permalink(); ?>" class="self-stretch h-42 rounded-2xl overflow-hidden mb-4 duration-500 transition-all group-hover:h-24 block">
                                <img class="w-full h-full object-contain" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                            </a>

                            <a href="<?php the_permalink(); ?>" class="self-stretch flex flex-col justify-start items-start gap-4">

                                <div class="self-stretch h-12 justify-start text-accent-dark text-base font-normal font-['Barlow'] leading-6 mb-4">
                                    <h3 class="text-base/[160%] font-normal"><?php echo get_the_title(); ?></h3>
                                </div>

                                <div class="product-price self-stretch justify-start text-black text-2xl font-medium font-['Barlow'] leading-7">
                                    <?php echo wp_kses_post( $price_html ); ?>
                                </div>
                            </a>

                            <div class="absolute bottom-6 left-0 right-0 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 px-6">
                                <a href="<?php echo esc_url( $button_url ); ?>" class="<?php echo esc_attr( $button_classes ); ?>"<?php echo $button_attrs; ?>>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4100_7280)">
                                    <path d="M14.6875 14.375H7.12266C6.82992 14.375 6.54649 14.2722 6.32177 14.0846C6.09705 13.897 5.94529 13.6365 5.89297 13.3484L3.80703 1.875H1.875" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.1875 17.5C8.05044 17.5 8.75 16.8004 8.75 15.9375C8.75 15.0746 8.05044 14.375 7.1875 14.375C6.32456 14.375 5.625 15.0746 5.625 15.9375C5.625 16.8004 6.32456 17.5 7.1875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.6875 17.5C15.5504 17.5 16.25 16.8004 16.25 15.9375C16.25 15.0746 15.5504 14.375 14.6875 14.375C13.8246 14.375 13.125 15.0746 13.125 15.9375C13.125 16.8004 13.8246 17.5 14.6875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.51172 11.25H15.3203C15.613 11.25 15.8965 11.1472 16.1212 10.9596C16.3459 10.772 16.4977 10.5115 16.55 10.2234L17.5 5H4.375" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_4100_7280">
                                    <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                    <?php echo esc_html( $button_label ); ?>
                                </a>
                            </div>
                        </div>

                    <?php endwhile;  wp_reset_postdata(); ?>
            </div>
                
            <!-- Arrows -->
            <div class="swiper-button-prev !z-[99999]">
                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.78122 15.2198C8.8509 15.2895 8.90617 15.3722 8.94388 15.4632C8.9816 15.5543 9.00101 15.6519 9.00101 15.7504C9.00101 15.849 8.9816 15.9465 8.94388 16.0376C8.90617 16.1286 8.8509 16.2114 8.78122 16.281C8.71153 16.3507 8.62881 16.406 8.53776 16.4437C8.44672 16.4814 8.34914 16.5008 8.25059 16.5008C8.15204 16.5008 8.05446 16.4814 7.96342 16.4437C7.87237 16.406 7.78965 16.3507 7.71996 16.281L0.219965 8.78104C0.150232 8.71139 0.0949136 8.62867 0.0571704 8.53762C0.0194272 8.44657 0 8.34898 0 8.25042C0 8.15186 0.0194272 8.05426 0.0571704 7.96321C0.0949136 7.87216 0.150232 7.78945 0.219965 7.71979L7.71996 0.219792C7.8607 0.0790615 8.05157 -3.92322e-09 8.25059 0C8.44961 3.92322e-09 8.64048 0.0790615 8.78122 0.219792C8.92195 0.360523 9.00101 0.551394 9.00101 0.750417C9.00101 0.94944 8.92195 1.14031 8.78122 1.28104L1.8109 8.25042L8.78122 15.2198Z" fill="#286D2E"/>
                    </svg>
                </div>
                <div class="swiper-button-next !z-[99999]">
                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.78104 8.78104L1.28104 16.281C1.21136 16.3507 1.12863 16.406 1.03759 16.4437C0.946545 16.4814 0.848963 16.5008 0.750417 16.5008C0.651871 16.5008 0.554289 16.4814 0.463245 16.4437C0.3722 16.406 0.289474 16.3507 0.219792 16.281C0.150109 16.2114 0.0948337 16.1286 0.0571218 16.0376C0.0194098 15.9465 0 15.849 0 15.7504C0 15.6519 0.0194098 15.5543 0.0571218 15.4632C0.0948337 15.3722 0.150109 15.2895 0.219792 15.2198L7.1901 8.25042L0.219792 1.28104C0.0790612 1.14031 -1.48284e-09 0.94944 0 0.750417C1.48284e-09 0.551394 0.0790612 0.360523 0.219792 0.219792C0.360522 0.0790615 0.551394 1.48284e-09 0.750417 0C0.94944 -1.48284e-09 1.14031 0.0790615 1.28104 0.219792L8.78104 7.71979C8.85077 7.78945 8.90609 7.87216 8.94384 7.96321C8.98158 8.05426 9.00101 8.15186 9.00101 8.25042C9.00101 8.34898 8.98158 8.44657 8.94384 8.53762C8.90609 8.62867 8.85077 8.71139 8.78104 8.78104Z" fill="#286D2E"/>
                    </svg>
            </div>
        </div>
    </div>

    <div class="products-slider-item hidden opacity-0 transition" id="polecane">        
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_tag',
                        'field'    => 'slug',
                        'terms'    => 'polecane',
                    ),
                ),
				'meta_query'     => array(
					array(
						'key'     => '_stock_status',
						'value'   => 'instock',
					),
				),
            );
            $loop = new WP_Query($args);
            ?>

            <div class="swiper products-swiper self-stretch px-6 relative inline-flex justify-start items-center gap-8 !pb-4">
                <div class="swiper-wrapper relative duration-500">
                    <?php while ($loop->have_posts()) : $loop->the_post(); 
                        global $product;
                        $product = wc_get_product( get_the_ID() );
                        if ( ! $product || ! $product->is_in_stock() ) {
                            continue;
                        }

                        $is_variable    = $product->is_type( 'variable' );
                        $button_url     = $is_variable ? get_permalink( $product->get_id() ) : $product->add_to_cart_url();
                        $button_classes = $is_variable ? 'btn w-full' : 'btn w-full add_to_cart_button ajax_add_to_cart';
                        $button_attrs   = $is_variable ? '' : sprintf(
                            ' data-quantity="1" data-product_id="%s" data-product_sku="%s" rel="nofollow"',
                            esc_attr( $product->get_id() ),
                            esc_attr( $product->get_sku() )
                        );
                        $button_label   = $is_variable ? 'Zobacz produkt' : 'Dodaj do koszyka';

                        $price_html = $product->get_price_html();
                        if ( $is_variable ) {
                            $min_price = $product->get_variation_price( 'min', true );
                            $max_price = $product->get_variation_price( 'max', true );
                            $price_html = ( $min_price !== $max_price )
                                ? wc_price( $min_price ) . ' - ' . wc_price( $max_price )
                                : wc_price( $min_price );
                        }
                    ?>

                        <div class="swiper-slide !w-72 !h-90 p-6 relative bg-white rounded-3xl shadow-[0px_0px_10px_0px_RGBA(0,0,0,0.08)] inline-flex flex-col justify-center items-start gap-4 group" data-wishlist-item>
							<?php
							$badges = function_exists( 'raypath_get_product_badges' ) ? raypath_get_product_badges( $product ) : array();

							if ( ! empty( $badges ) ) :
								?>
								<div class="product-badges flex flex-col gap-2 absolute top-6 left-6 z-10">
									<?php echo implode( '', $badges ); ?>
								</div>
							<?php endif; ?>

							<button class="add-to-wishlist-btn absolute top-6 right-6 cursor-pointer" type="button" data-wishlist-product-id="<?php echo esc_attr( $product->get_id() ); ?>" data-wishlist-intent="add" aria-pressed="false" aria-label="Dodaj do ulubionych">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<foreignObject x="-4" y="-4" width="40" height="40"><div xmlns="http://www.w3.org/1999/xhtml" style="backdrop-filter:blur(2px);clip-path:url(#bgblur_0_4092_3604_clip_path);height:100%;width:100%"></div></foreignObject><g data-figma-bg-blur-radius="4">
									<rect width="32" height="32" rx="4" fill="white" fill-opacity="0.8"/>
									<path d="M20.4643 8C18.6205 8 17.0063 8.74017 16 9.9913C14.9938 8.74017 13.3795 8 11.5357 8C10.0681 8.00154 8.66099 8.54651 7.6232 9.51534C6.58541 10.4842 6.00165 11.7978 6 13.1679C6 19.0026 15.267 23.7254 15.6616 23.9204C15.7656 23.9727 15.8819 24 16 24C16.1181 24 16.2344 23.9727 16.3384 23.9204C16.733 23.7254 26 19.0026 26 13.1679C25.9983 11.7978 25.4146 10.4842 24.3768 9.51534C23.339 8.54651 21.9319 8.00154 20.4643 8ZM16 22.5701C14.3696 21.6832 7.42857 17.6431 7.42857 13.1679C7.42999 12.1514 7.86316 11.1769 8.63309 10.4581C9.40302 9.73936 10.4469 9.33497 11.5357 9.33365C13.2723 9.33365 14.7304 10.1972 15.3393 11.5842C15.3931 11.7065 15.4846 11.8111 15.6023 11.8847C15.7199 11.9583 15.8584 11.9976 16 11.9976C16.1416 11.9976 16.2801 11.9583 16.3977 11.8847C16.5154 11.8111 16.6069 11.7065 16.6607 11.5842C17.2696 10.1947 18.7277 9.33365 20.4643 9.33365C21.5531 9.33497 22.597 9.73936 23.3669 10.4581C24.1368 11.1769 24.57 12.1514 24.5714 13.1679C24.5714 17.6364 17.6286 21.6824 16 22.5701Z" fill="black"/>
									</g>
									<defs>
									<clipPath id="bgblur_0_4092_3604_clip_path" transform="translate(4 4)"><rect width="32" height="32" rx="4"/>
									</clipPath></defs>
								</svg>
							</button>

                            <a href="<?php the_permalink(); ?>" class="self-stretch h-42 rounded-2xl overflow-hidden mb-4 duration-500 transition-all group-hover:h-24 block duration-500">
                                <img class="w-full h-full object-contain" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                            </a>

                            <a href="<?php the_permalink(); ?>" class="self-stretch flex flex-col justify-start items-start gap-4">

                                <div class="self-stretch h-12 justify-start text-black text-base font-normal font-['Barlow'] leading-6 mb-4">
                                    <h3 class="text-base/[160%] font-normal"><?php echo get_the_title(); ?></h3>
                                </div>

                                <div class="product-price self-stretch justify-start text-black text-2xl font-medium font-['Barlow'] leading-7">
                                    <?php echo wp_kses_post( $price_html ); ?>
                                </div>

                            </a>

                            <div class="absolute bottom-6 left-0 right-0 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 px-6">
                            <a href="<?php echo esc_url( $button_url ); ?>" class="<?php echo esc_attr( $button_classes ); ?>"<?php echo $button_attrs; ?>>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4100_7280)">
                                    <path d="M14.6875 14.375H7.12266C6.82992 14.375 6.54649 14.2722 6.32177 14.0846C6.09705 13.897 5.94529 13.6365 5.89297 13.3484L3.80703 1.875H1.875" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.1875 17.5C8.05044 17.5 8.75 16.8004 8.75 15.9375C8.75 15.0746 8.05044 14.375 7.1875 14.375C6.32456 14.375 5.625 15.0746 5.625 15.9375C5.625 16.8004 6.32456 17.5 7.1875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.6875 17.5C15.5504 17.5 16.25 16.8004 16.25 15.9375C16.25 15.0746 15.5504 14.375 14.6875 14.375C13.8246 14.375 13.125 15.0746 13.125 15.9375C13.125 16.8004 13.8246 17.5 14.6875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.51172 11.25H15.3203C15.613 11.25 15.8965 11.1472 16.1212 10.9596C16.3459 10.772 16.4977 10.5115 16.55 10.2234L17.5 5H4.375" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_4100_7280">
                                    <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                    <?php echo esc_html( $button_label ); ?>
                                </a>
                            </div>
                        </div>

                    <?php endwhile;  wp_reset_postdata(); ?>
         </div>
                
        <!-- Arrows -->
        <div class="swiper-button-prev !z-[99999]">
                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.78122 15.2198C8.8509 15.2895 8.90617 15.3722 8.94388 15.4632C8.9816 15.5543 9.00101 15.6519 9.00101 15.7504C9.00101 15.849 8.9816 15.9465 8.94388 16.0376C8.90617 16.1286 8.8509 16.2114 8.78122 16.281C8.71153 16.3507 8.62881 16.406 8.53776 16.4437C8.44672 16.4814 8.34914 16.5008 8.25059 16.5008C8.15204 16.5008 8.05446 16.4814 7.96342 16.4437C7.87237 16.406 7.78965 16.3507 7.71996 16.281L0.219965 8.78104C0.150232 8.71139 0.0949136 8.62867 0.0571704 8.53762C0.0194272 8.44657 0 8.34898 0 8.25042C0 8.15186 0.0194272 8.05426 0.0571704 7.96321C0.0949136 7.87216 0.150232 7.78945 0.219965 7.71979L7.71996 0.219792C7.8607 0.0790615 8.05157 -3.92322e-09 8.25059 0C8.44961 3.92322e-09 8.64048 0.0790615 8.78122 0.219792C8.92195 0.360523 9.00101 0.551394 9.00101 0.750417C9.00101 0.94944 8.92195 1.14031 8.78122 1.28104L1.8109 8.25042L8.78122 15.2198Z" fill="#286D2E"/>
                    </svg>
                </div>
                <div class="swiper-button-next !z-[99999]">
                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.78104 8.78104L1.28104 16.281C1.21136 16.3507 1.12863 16.406 1.03759 16.4437C0.946545 16.4814 0.848963 16.5008 0.750417 16.5008C0.651871 16.5008 0.554289 16.4814 0.463245 16.4437C0.3722 16.406 0.289474 16.3507 0.219792 16.281C0.150109 16.2114 0.0948337 16.1286 0.0571218 16.0376C0.0194098 15.9465 0 15.849 0 15.7504C0 15.6519 0.0194098 15.5543 0.0571218 15.4632C0.0948337 15.3722 0.150109 15.2895 0.219792 15.2198L7.1901 8.25042L0.219792 1.28104C0.0790612 1.14031 -1.48284e-09 0.94944 0 0.750417C1.48284e-09 0.551394 0.0790612 0.360523 0.219792 0.219792C0.360522 0.0790615 0.551394 1.48284e-09 0.750417 0C0.94944 -1.48284e-09 1.14031 0.0790615 1.28104 0.219792L8.78104 7.71979C8.85077 7.78945 8.90609 7.87216 8.94384 7.96321C8.98158 8.05426 9.00101 8.15186 9.00101 8.25042C9.00101 8.34898 8.98158 8.44657 8.94384 8.53762C8.90609 8.62867 8.85077 8.71139 8.78104 8.78104Z" fill="#286D2E"/>
                    </svg>
            </div>


        </div>

    </div>

    <div class="container-content lg:hidden w-full flex justify-end">
        <a href="<?php echo get_home_url() ?>/sklep" class="btn-link mt-8">
            Zobacz wszystkie
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_4004_5424)">
                    <path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_4004_5424">
                    <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
        </a>
    </div>
</section>

<!-- image section -->
<?php
$op_main_image  = $original_products['image_main'] ?? null;
$op_badge_image = $original_products['image_badge'] ?? null;
$op_side_image  = $original_products['image_side'] ?? null;
$op_top_title   = $original_products['top_title'] ?? '';
$op_title       = $original_products['title'] ?? '';
$op_text        = $original_products['text'] ?? '';
$op_btn_label   = $original_products['button_label'] ?? '';
$op_btn_url     = $original_products['button_url'] ?? '';
$op_main_url    = is_array( $op_main_image ) ? ( $op_main_image['url'] ?? '' ) : '';
$op_main_alt    = is_array( $op_main_image ) ? ( $op_main_image['alt'] ?? $op_title ) : $op_title;
$op_badge_url   = is_array( $op_badge_image ) ? ( $op_badge_image['url'] ?? '' ) : '';
$op_badge_alt   = is_array( $op_badge_image ) ? ( $op_badge_image['alt'] ?? $op_title ) : $op_title;
$op_side_url    = is_array( $op_side_image ) ? ( $op_side_image['url'] ?? '' ) : '';
$op_side_alt    = is_array( $op_side_image ) ? ( $op_side_image['alt'] ?? $op_title ) : $op_title;
?>
<?php if ( ! empty( $original_products ) ) : ?>
<section class="pt-10 pb-40 lg:py-30">
    <div class="container-content">
        <div class="flex gap-10 items-start flex-wrap lg:flex-nowrap">

            <div class="w-full lg:w-127 lg:min-w-127 relative h-125 lg:h-auto order-1 lg:order-0">
				<?php if ( $op_main_url ) : ?>
					<img class="rounded-3xl w-full h-full lg:h-auto object-cover lg:object-contain" src="<?php echo esc_url( $op_main_url ); ?>" alt="<?php echo esc_attr( $op_main_alt ); ?>">
				<?php endif; ?>
				<?php if ( $op_badge_url ) : ?>
					<img class="absolute w-[13.31rem] bottom-0 -right-6 lg:right-[unset] lg:left-0 translate-y-[calc(100%-2.2rem)] lg:translate-y-1/2 lg:-translate-x-1/3" src="<?php echo esc_url( $op_badge_url ); ?>" alt="<?php echo esc_attr( $op_badge_alt ); ?>" >
				<?php endif; ?>
            </div>

            <div class="">
                <?php if ( $op_top_title ) : ?>
					<p class="top-title"><?php echo esc_html( $op_top_title ); ?></p>
				<?php endif; ?>
				<?php if ( $op_title ) : ?>
					<h2 class="mb-6"><?php echo esc_html( $op_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $op_text ) : ?>
					<p class="mb-8"><?php echo esc_html( $op_text ); ?></p>
				<?php endif; ?>
				<?php if ( $op_btn_label && $op_btn_url ) : ?>
					<a href="<?php echo esc_url( $op_btn_url ); ?>" class="btn lg:mb-10"><?php echo esc_html( $op_btn_label ); ?></a>
				<?php endif; ?>
				<?php if ( $op_side_url ) : ?>
					<img class="rounded-3xl hidden lg:block" src="<?php echo esc_url( $op_side_url ); ?>" alt="<?php echo esc_attr( $op_side_alt ); ?>" >
				<?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>





<!-- bestsellers -->
<section id="poznaj-nasz-produkty" class="pb-6 lg:pb-26">
    <div class="container-content">
        <div class="self-stretch pb-10 relative inline-flex flex-col justify-start items-center overflow-hidden w-full">
            <div class="self-stretch flex flex-col justify-start items-center gap-8 w-full">
                <div class="self-stretch flex flex-col justify-start items-center gap-10">
                    <div class="inline-flex justify-between items-center w-full">
                        <h2 class="justify-start text-black text-5xl font-semibold font-['Barlow'] leading-[52.80px] mb-0">Bestsellery</h2>

                         <a href="<?php echo get_home_url() ?>/sklep" class="btn-link py-4 hidden lg:flex">
                                Zobacz wszystkie
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <g clip-path="url(#clip0_4004_5424)">
                                        <path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4004_5424">
                                        <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="bestsellers-slider" id="bestsellery">        
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_tag',
                        'field'    => 'slug',
                        'terms'    => 'bestsellery',
                    ),
                ),
				'meta_query'     => array(
					array(
						'key'     => '_stock_status',
						'value'   => 'instock',
					),
				),
            );
            $loop = new WP_Query($args);
            ?>

            <div class="swiper products-swiper self-stretch px-6 relative inline-flex justify-start items-center gap-8 !pb-4">
                <div class="swiper-wrapper relative duration-500">
                    <?php while ($loop->have_posts()) : $loop->the_post(); 
                        global $product;
                        $product = wc_get_product( get_the_ID() );
                        if ( ! $product || ! $product->is_in_stock() ) {
                            continue;
                        }

                        $is_variable    = $product->is_type( 'variable' );
                        $button_url     = $is_variable ? get_permalink( $product->get_id() ) : $product->add_to_cart_url();
                        $button_classes = $is_variable ? 'btn w-full' : 'btn w-full add_to_cart_button ajax_add_to_cart';
                        $button_attrs   = $is_variable ? '' : sprintf(
                            ' data-quantity="1" data-product_id="%s" data-product_sku="%s" rel="nofollow"',
                            esc_attr( $product->get_id() ),
                            esc_attr( $product->get_sku() )
                        );
                        $button_label   = $is_variable ? 'Zobacz produkt' : 'Dodaj do koszyka';

                        $price_html = $product->get_price_html();
                        if ( $is_variable ) {
                            $min_price = $product->get_variation_price( 'min', true );
                            $max_price = $product->get_variation_price( 'max', true );
                            $price_html = ( $min_price !== $max_price )
                                ? wc_price( $min_price ) . ' - ' . wc_price( $max_price )
                                : wc_price( $min_price );
                        }
                    ?>

                        <div class="swiper-slide !w-72 !h-90 p-6 relative bg-white rounded-3xl shadow-[0px_0px_10px_0px_RGBA(0,0,0,0.08)] inline-flex flex-col justify-center items-start gap-4 group duration-500" data-wishlist-item>
							<?php
							$badges = function_exists( 'raypath_get_product_badges' ) ? raypath_get_product_badges( $product ) : array();

							if ( ! empty( $badges ) ) :
								?>
								<div class="product-badges flex flex-col gap-2 absolute top-6 left-6 z-10">
									<?php echo implode( '', $badges ); ?>
								</div>
							<?php endif; ?>

							<button class="add-to-wishlist-btn absolute top-6 right-6 cursor-pointer" type="button" data-wishlist-product-id="<?php echo esc_attr( $product->get_id() ); ?>" data-wishlist-intent="add" aria-pressed="false" aria-label="Dodaj do ulubionych">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.4643 0C12.6205 0 11.0063 0.740174 10 1.9913C8.99375 0.740174 7.37946 0 5.53571 0C4.06806 0.00154431 2.66099 0.546512 1.6232 1.51534C0.585411 2.48418 0.00165423 3.79775 0 5.16789C0 11.0026 9.26696 15.7254 9.66161 15.9204C9.76562 15.9727 9.88189 16 10 16C10.1181 16 10.2344 15.9727 10.3384 15.9204C10.733 15.7254 20 11.0026 20 5.16789C19.9983 3.79775 19.4146 2.48418 18.3768 1.51534C17.339 0.546512 15.9319 0.00154431 14.4643 0ZM10 14.5701C8.36964 13.6832 1.42857 9.64311 1.42857 5.16789C1.42999 4.15139 1.86316 3.1769 2.63309 2.45813C3.40302 1.73936 4.44687 1.33497 5.53571 1.33365C7.27232 1.33365 8.73036 2.19718 9.33929 3.58418C9.3931 3.70648 9.48465 3.81109 9.60229 3.88471C9.71994 3.95832 9.85837 3.99763 10 3.99763C10.1416 3.99763 10.2801 3.95832 10.3977 3.88471C10.5154 3.81109 10.6069 3.70648 10.6607 3.58418C11.2696 2.19468 12.7277 1.33365 14.4643 1.33365C15.5531 1.33497 16.597 1.73936 17.3669 2.45813C18.1368 3.1769 18.57 4.15139 18.5714 5.16789C18.5714 9.63644 11.6286 13.6824 10 14.5701Z" fill="black"/>
                                </svg>

							</button>

                            <a href="<?php the_permalink(); ?>" class="self-stretch h-42 rounded-2xl overflow-hidden mb-4 transition-all group-hover:h-24 block duration-500">
                                <img class="w-full h-full object-contain" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                            </a>

                            <a href="<?php the_permalink(); ?>" class="self-stretch flex flex-col justify-start items-start gap-4">

                                <div class="self-stretch h-12 justify-start text-black text-base font-normal font-['Barlow'] leading-6 mb-4">
                                    <h3 class="text-base/[160%] font-normal"><?php echo get_the_title(); ?></h3>
                                </div>

                                <div class="product-price self-stretch justify-start text-black text-2xl font-medium font-['Barlow'] leading-7">
                                    <?php echo wp_kses_post( $price_html ); ?>
                                </div>

                            </a>

                            <div class="absolute bottom-6 left-0 right-0 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 px-6">
                                <a href="<?php echo esc_url( $button_url ); ?>" class="<?php echo esc_attr( $button_classes ); ?>"<?php echo $button_attrs; ?>>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4100_7280)">
                                    <path d="M14.6875 14.375H7.12266C6.82992 14.375 6.54649 14.2722 6.32177 14.0846C6.09705 13.897 5.94529 13.6365 5.89297 13.3484L3.80703 1.875H1.875" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.1875 17.5C8.05044 17.5 8.75 16.8004 8.75 15.9375C8.75 15.0746 8.05044 14.375 7.1875 14.375C6.32456 14.375 5.625 15.0746 5.625 15.9375C5.625 16.8004 6.32456 17.5 7.1875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.6875 17.5C15.5504 17.5 16.25 16.8004 16.25 15.9375C16.25 15.0746 15.5504 14.375 14.6875 14.375C13.8246 14.375 13.125 15.0746 13.125 15.9375C13.125 16.8004 13.8246 17.5 14.6875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.51172 11.25H15.3203C15.613 11.25 15.8965 11.1472 16.1212 10.9596C16.3459 10.772 16.4977 10.5115 16.55 10.2234L17.5 5H4.375" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_4100_7280">
                                    <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                    <?php echo esc_html( $button_label ); ?>
                                </a>
                            </div>
                        </div>

                    <?php endwhile;  wp_reset_postdata(); ?>
         </div>
                
        <!-- Arrows -->
        <div class="swiper-button-prev !z-[99999]">
                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.78122 15.2198C8.8509 15.2895 8.90617 15.3722 8.94388 15.4632C8.9816 15.5543 9.00101 15.6519 9.00101 15.7504C9.00101 15.849 8.9816 15.9465 8.94388 16.0376C8.90617 16.1286 8.8509 16.2114 8.78122 16.281C8.71153 16.3507 8.62881 16.406 8.53776 16.4437C8.44672 16.4814 8.34914 16.5008 8.25059 16.5008C8.15204 16.5008 8.05446 16.4814 7.96342 16.4437C7.87237 16.406 7.78965 16.3507 7.71996 16.281L0.219965 8.78104C0.150232 8.71139 0.0949136 8.62867 0.0571704 8.53762C0.0194272 8.44657 0 8.34898 0 8.25042C0 8.15186 0.0194272 8.05426 0.0571704 7.96321C0.0949136 7.87216 0.150232 7.78945 0.219965 7.71979L7.71996 0.219792C7.8607 0.0790615 8.05157 -3.92322e-09 8.25059 0C8.44961 3.92322e-09 8.64048 0.0790615 8.78122 0.219792C8.92195 0.360523 9.00101 0.551394 9.00101 0.750417C9.00101 0.94944 8.92195 1.14031 8.78122 1.28104L1.8109 8.25042L8.78122 15.2198Z" fill="#286D2E"/>
                    </svg>
                </div>
                <div class="swiper-button-next !z-[99999]">
                    <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.78104 8.78104L1.28104 16.281C1.21136 16.3507 1.12863 16.406 1.03759 16.4437C0.946545 16.4814 0.848963 16.5008 0.750417 16.5008C0.651871 16.5008 0.554289 16.4814 0.463245 16.4437C0.3722 16.406 0.289474 16.3507 0.219792 16.281C0.150109 16.2114 0.0948337 16.1286 0.0571218 16.0376C0.0194098 15.9465 0 15.849 0 15.7504C0 15.6519 0.0194098 15.5543 0.0571218 15.4632C0.0948337 15.3722 0.150109 15.2895 0.219792 15.2198L7.1901 8.25042L0.219792 1.28104C0.0790612 1.14031 -1.48284e-09 0.94944 0 0.750417C1.48284e-09 0.551394 0.0790612 0.360523 0.219792 0.219792C0.360522 0.0790615 0.551394 1.48284e-09 0.750417 0C0.94944 -1.48284e-09 1.14031 0.0790615 1.28104 0.219792L8.78104 7.71979C8.85077 7.78945 8.90609 7.87216 8.94384 7.96321C8.98158 8.05426 9.00101 8.15186 9.00101 8.25042C9.00101 8.34898 8.98158 8.44657 8.94384 8.53762C8.90609 8.62867 8.85077 8.71139 8.78104 8.78104Z" fill="#286D2E"/>
                    </svg>
            </div>


        </div>

    </div>

    <div class="container-content lg:hidden w-full flex justify-end">
        <a href="<?php echo get_home_url() ?>/sklep" class="btn-link mt-8">
            Zobacz wszystkie
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_4004_5424)">
                    <path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_4004_5424">
                    <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
        </a>
    </div>
    
</section>

<!-- products sets -->
<?php
$sets_bg_image = $sets_section['background_image'] ?? null;
$sets_bg_url   = is_array( $sets_bg_image ) ? ( $sets_bg_image['url'] ?? '' ) : '';
$sets_style    = $sets_bg_url ? "background: url('{$sets_bg_url}') #F5F5F5 50% / cover no-repeat;" : "background: #F5F5F5;";
$sets_title    = $sets_section['title'] ?? '';
$sets_desc     = $sets_section['description'] ?? '';
$sets_links    = $sets_section['links'] ?? array();
$sets_image    = $sets_section['image'] ?? null;
$sets_img_url  = is_array( $sets_image ) ? ( $sets_image['url'] ?? '' ) : '';
$sets_img_alt  = is_array( $sets_image ) ? ( $sets_image['alt'] ?? $sets_title ) : $sets_title;
?>
<?php if ( ! empty( $sets_section ) ) : ?>
<section class="pt-8 pb-[1.94rem] lg:pt-[8.31rem] lg:pb-25 bg-cover bg-right" style="<?php echo esc_attr( $sets_style ); ?>">
    <div class="container-content">
        <div class="flex justify-between items-center flex-col lg:flex-row">
            <div class="lg:w-124 shrink-0">
                <?php if ( $sets_title ) : ?>
					<h2 class="mb-4"><?php echo esc_html( $sets_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $sets_desc ) : ?>
					<p class="mb-6 lg:mb-10"><?php echo esc_html( $sets_desc ); ?></p>
				<?php endif; ?>
                <div class="flex flex-wrap gap-10">
					<?php if ( ! empty( $sets_links ) && is_array( $sets_links ) ) : ?>
						<?php foreach ( $sets_links as $link ) :
							$link_label = $link['label'] ?? '';
							$link_url   = $link['url'] ?? '';
							if ( ! $link_label || ! $link_url ) {
								continue;
							}
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="transition hover:text-accent hover:underline font-normal text-xl/[140%] uppercase"><?php echo esc_html( $link_label ); ?></a>
						<?php endforeach; ?>
					<?php endif; ?>
                </div>
            </div>
			<?php if ( $sets_img_url ) : ?>
            	<img class="w-full lg:w-[calc(100%-31rem)]" src="<?php echo esc_url( $sets_img_url ); ?>" alt="<?php echo esc_attr( $sets_img_alt ); ?>">
			<?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- blog -->
<section class="pt-10 lg:pt-20">
    <div class="container-content">
        <div class="inline-flex justify-between items-center w-full mb-6 lg:mb-10">
            <div>
                <p class="top-title">Informacje z życia firmy</p>
                <h2 class="justify-start text-black text-5xl font-semibold font-['Barlow'] leading-[52.80px] mb-0">Aktualności</h2>
            </div>
            <a href="<?php echo get_home_url() ?>/blog" class="btn-link py-4 hidden lg:flex">
                Zobacz wszystkie
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_4004_5424)">
                    <path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_4004_5424">
                    <rect width="20" height="20" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
            </a>

         </div>

         <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
            ?>
            <div class="flex justify-start items-start gap-10">
                <div class="flex-1 self-stretch inline-flex flex-col justify-start items-start gap-6">
                    <div class="flex flex-col justify-start items-start gap-5 w-full">
                        <img class="relative rounded-3xl h-[15.6rem] object-cover w-full" src="<?php echo the_post_thumbnail_url('large') ?>" />
                    </div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        <div class="self-stretch flex flex-col justify-start items-center gap-2">
                            <div class="self-stretch justify-start text-black text-base font-normal uppercase leading-6"><?php echo get_the_date('d F Y') ?></div>
                            <h3 class="self-stretch justify-start text-black text-2xl font-medium mb-2"><?php echo get_the_title() ?></h3>
                        </div>
                        <div class="self-stretch justify-start text-black text-base font-normal leading-6"><?php echo get_the_excerpt() ?></div>
                    </div>
                </div>
            </div>
            <?php };
            }  wp_reset_postdata(); ?>
        </div>

        <div class="w-full flex justify-end lg:hidden mt-6">
            <a href="<?php echo get_home_url() ?>/blog" class="btn-link py-4">
                    Zobacz wszystkie
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <g clip-path="url(#clip0_4004_5424)">
                        <path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_4004_5424">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
            </a>
        </div>
    </div>
</section>

<!-- why us -->
<?php if ( ! empty( $why_us_section ) ) :
	$why_top_title = $why_us_section['top_title'] ?? '';
	$why_title     = $why_us_section['title'] ?? '';
	$why_text      = $why_us_section['text'] ?? '';
	$why_btn_label = $why_us_section['button_label'] ?? '';
	$why_btn_url   = $why_us_section['button_url'] ?? '';
	$why_image     = $why_us_section['image'] ?? null;
	$why_image_url = is_array( $why_image ) ? ( $why_image['url'] ?? '' ) : '';
	$why_image_alt = is_array( $why_image ) ? ( $why_image['alt'] ?? $why_title ) : $why_title;
	$why_tiles     = $why_us_section['tiles'] ?? array();
	?>
<section class="py-10 lg:py-30">
    <div class="container-content">
        <div class="flex flex-wrap lg:flex-nowrap gap-10">
			<?php if ( $why_image_url ) : ?>
            	<img src="<?php echo esc_url( $why_image_url ); ?>" alt="<?php echo esc_attr( $why_image_alt ); ?>" class="grow">
			<?php endif; ?>
            <div class="w-full lg:w-[36.69rem] lg:min-w-[36.69rem] flex flex-col justify-center items-start">
				<?php if ( $why_top_title ) : ?>
					<p class="top-title mb-0"><?php echo esc_html( $why_top_title ); ?></p>
				<?php endif; ?>
				<?php if ( $why_title ) : ?>
					<h2 class="mb-4"><?php echo esc_html( $why_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $why_text ) : ?>
					<p class="mb-8"><?php echo esc_html( $why_text ); ?></p>
				<?php endif; ?>
				<?php if ( $why_btn_label && $why_btn_url ) : ?>
					<a href="<?php echo esc_url( $why_btn_url ); ?>" class="btn"><?php echo esc_html( $why_btn_label ); ?></a>
				<?php endif; ?>
            </div>
        </div>

		<?php if ( ! empty( $why_tiles ) && is_array( $why_tiles ) ) : ?>
        <div class="flex justify-center items-center lg:flex-wrap gap-4 pt-8 lg:pt-16 flex-col lg:flex-row">
			<?php foreach ( $why_tiles as $tile ) :
				$tile_icon     = $tile['icon'] ?? null;
				$tile_icon_url = is_array( $tile_icon ) ? ( $tile_icon['url'] ?? '' ) : '';
				$tile_icon_alt = is_array( $tile_icon ) ? ( $tile_icon['alt'] ?? ( $tile['title'] ?? '' ) ) : ( $tile['title'] ?? '' );
				$tile_title    = $tile['title'] ?? '';
				$tile_text     = $tile['text'] ?? '';

				if ( ! $tile_title && ! $tile_text && ! $tile_icon_url ) {
					continue;
				}
				?>
            <div class="flex-1 self-stretch p-8 bg-neutral-100 rounded-tl-[4.5rem] rounded-br-[4.5rem] inline-flex flex-col justify-start items-center gap-4 overflow-hidden lg:min-w-61.5 lg:max-w-64">
				<?php if ( $tile_icon_url ) : ?>
					<img src="<?php echo esc_url( $tile_icon_url ); ?>" alt="<?php echo esc_attr( $tile_icon_alt ); ?>" class="w-8 h-8 object-contain">
				<?php endif; ?>

                <div class="self-stretch flex flex-col justify-start items-center gap-2">
					<?php if ( $tile_title ) : ?>
						<div class="self-stretch text-center justify-start text-black text-2xl font-medium font-['Barlow'] leading-7"><?php echo esc_html( $tile_title ); ?></div>
					<?php endif; ?>
					<?php if ( $tile_text ) : ?>
						<div class="self-stretch text-center justify-start text-black text-sm font-normal font-['Barlow'] leading-5"><?php echo esc_html( $tile_text ); ?></div>
					<?php endif; ?>
                </div>
            </div>
			<?php endforeach; ?>
        </div>
		<?php endif; ?>

    </div>
</section>
<?php endif; ?>

<!-- social media -->
<?php if ( ! empty( $social_section ) ) :
	$social_top_title = $social_section['top_title'] ?? '';
	$social_title     = $social_section['title'] ?? '';
	$social_desc      = $social_section['description'] ?? '';
	$social_links     = $social_section['links'] ?? array();
	$social_grid      = $social_section['grid'] ?? array();
	?>
<section class="py-10 lg:py-30 bg-light-grey">
    <div class="container-content">
        <div class="grid grid-cols-1 lg:grid-cols-2 mb-10">
            <div class="">
				<?php if ( $social_top_title ) : ?>
	                <p class="top-title"><?php echo esc_html( $social_top_title ); ?></p>
				<?php endif; ?>
				<?php if ( $social_title ) : ?>
	                <h2 class=""><?php echo esc_html( $social_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $social_desc ) : ?>
	                <p><?php echo esc_html( $social_desc ); ?></p>
				<?php endif; ?>
            </div>

			<?php if ( ! empty( $social_links ) && is_array( $social_links ) ) : ?>
                <div class="inline-flex flex-wrap lg:flex-nowrap lg:justify-end items-end gap-2 lg:gap-6 mt-8 lg:mt-0">
					<?php foreach ( $social_links as $link ) :
						$link_label    = $link['label'] ?? '';
						$link_url      = $link['url'] ?? '';
						$link_icon     = $link['icon'] ?? null;
						$link_icon_url = is_array( $link_icon ) ? ( $link_icon['url'] ?? '' ) : '';
						$link_icon_alt = is_array( $link_icon ) ? ( $link_icon['alt'] ?? $link_label ) : $link_label;

						if ( ! $link_label || ! $link_url ) {
							continue;
						}
						?>
                    <a href="<?php echo esc_url( $link_url ); ?>" class="h-10 pl-4 pr-2 flex justify-center items-center gap-2">
                        <div class="justify-start text-accent-dark text-base font-medium leading-6"><?php echo esc_html( $link_label ); ?></div>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5004 0.75V10.5C13.5004 10.6989 13.4214 10.8897 13.2807 11.0303C13.1401 11.171 12.9493 11.25 12.7504 11.25C12.5515 11.25 12.3607 11.171 12.2201 11.0303C12.0794 10.8897 12.0004 10.6989 12.0004 10.5V2.56031L1.28104 13.2806C1.14031 13.4214 0.94944 13.5004 0.750417 13.5004C0.551394 13.5004 0.360523 13.4214 0.219792 13.2806C0.0790615 13.1399 0 12.949 0 12.75C0 12.551 0.0790615 12.3601 0.219792 12.2194L10.9401 1.5H3.00042C2.8015 1.5 2.61074 1.42098 2.47009 1.28033C2.32943 1.13968 2.25042 0.948912 2.25042 0.75C2.25042 0.551088 2.32943 0.360322 2.47009 0.21967C2.61074 0.0790178 2.8015 0 3.00042 0H12.7504C12.9493 0 13.1401 0.0790178 13.2807 0.21967C13.4214 0.360322 13.5004 0.551088 13.5004 0.75Z" fill="#2F8A37"/>
                            </svg>
                    </a>
					<?php endforeach; ?>
                </div>
			<?php endif; ?>
        </div>
 
		<?php if ( ! empty( $social_grid ) && is_array( $social_grid ) ) : ?>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2">
			<?php foreach ( $social_grid as $grid_item ) :
				$grid_image     = $grid_item['image'] ?? null;
				$grid_image_url = is_array( $grid_image ) ? ( $grid_image['url'] ?? '' ) : '';
				$grid_image_alt = is_array( $grid_image ) ? ( $grid_image['alt'] ?? '' ) : '';
				$grid_url       = $grid_item['url'] ?? '';
				$grid_icon      = $grid_item['icon'] ?? null;
				$grid_icon_url  = is_array( $grid_icon ) ? ( $grid_icon['url'] ?? '' ) : '';
				$grid_icon_alt  = is_array( $grid_icon ) ? ( $grid_icon['alt'] ?? $grid_image_alt ) : $grid_image_alt;

				if ( ! $grid_image_url ) {
					continue;
				}
				?>
            <a href="<?php echo esc_url( $grid_url ? $grid_url : '#' ); ?>" class="relative h-54 lg:h-79">
                <img class="w-full h-full left-0 top-0 absolute rounded-3xl object-cover" src="<?php echo esc_url( $grid_image_url ); ?>" alt="<?php echo esc_attr( $grid_image_alt ); ?>" />
				<?php if ( $grid_icon_url ) : ?>
                <div class="size-20 left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 absolute bg-white rounded-3xl flex items-center justify-center">
                    <img src="<?php echo esc_url( $grid_icon_url ); ?>" alt="<?php echo esc_attr( $grid_icon_alt ); ?>" class="w-8 h-8 object-contain">
                </div>
				<?php endif; ?>
            </a>
			<?php endforeach; ?>
        </div>
		<?php endif; ?>

    </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>