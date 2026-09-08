<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raypathsklep
 */

$menu_links  = get_field( 'menu_glowne_linki', 'option' );
$mega_menu   = get_field( 'mega_menu', 'option' );

$nav_defaults = array(
	'produkty'   => array(
		'label' => __( 'Produkty', 'raypathsklep' ),
		'url'   => home_url( '/sklep' ),
	),
	'wspolpraca' => array(
		'label' => __( 'Współpraca', 'raypathsklep' ),
		'url'   => home_url( '/wspolpraca' ),
	),
	'blog'       => array(
		'label' => __( 'Blog', 'raypathsklep' ),
		'url'   => home_url( '/blog' ),
	),
	'recykling'  => array(
		'label' => __( 'Recykling', 'raypathsklep' ),
		'url'   => home_url( '/recykling' ),
	),
	'kontakt'    => array(
		'label' => __( 'Kontakt', 'raypathsklep' ),
		'url'   => home_url( '/kontakt' ),
	),
);

$nav_items = array();
foreach ( $nav_defaults as $key => $default ) {
	$field_data = isset( $menu_links[ $key ] ) && is_array( $menu_links[ $key ] ) ? $menu_links[ $key ] : array();
	$nav_items[ $key ] = array(
		'label' => ! empty( $field_data['label'] ) ? $field_data['label'] : $default['label'],
		'url'   => ! empty( $field_data['url'] ) ? $field_data['url'] : $default['url'],
	);
}

$mega_categories = isset( $mega_menu['kategorie'] ) && is_array( $mega_menu['kategorie'] ) ? $mega_menu['kategorie'] : array();
$mega_mobile_links = isset( $mega_menu['mobile_links'] ) && is_array( $mega_menu['mobile_links'] ) ? $mega_menu['mobile_links'] : array();
$mega_bestsellers = isset( $mega_menu['bestsellery'] ) && is_array( $mega_menu['bestsellery'] ) ? $mega_menu['bestsellery'] : array();
$mega_cta = isset( $mega_menu['cta'] ) && is_array( $mega_menu['cta'] ) ? $mega_menu['cta'] : array();
?>

<!-- page loader -->
<div id="page-loader" class="page-loader">
	<div class="page-loader__content">
		<img src="<?php echo get_template_directory_uri() ?>/img/logo-raypath-sklep.svg" alt="Raypath" class="page-loader__logo">
	</div>
</div>

<style>
.page-loader {
    align-items: center;
    background: #fff;
    display: flex;
    height: 100%;
    justify-content: center;
    left: 0;
    opacity: 1;
    position: fixed;
    top: 0;
    transition: opacity .5s ease,visibility .5s ease;
    visibility: visible;
    width: 100%;
    z-index: 9999
}

.page-loader.hidden {
    opacity: 0;
    visibility: hidden
}

.page-loader__content {
    align-items: center;
    animation: fadeInScale .6s ease-in-out;
    display: flex;
    justify-content: center
}

.page-loader__logo {
    animation: pulse 1.5s ease-in-out infinite;
    height: 3rem
}

@keyframes fadeInScale {
    0% {
        opacity: 0;
        transform: scale(.8)
    }

    to {
        opacity: 1;
        transform: scale(1)
    }
}
</style>
<!-- end page loader -->

<header id="masthead" class="position-sticky top-0 z-50">

	<div class="container-content relative">

		<div class="flex gap-3 lg:gap-10 xl:gap-16 items-center py-6 lg:py-[2.31rem] w-full">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="shrink-0">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-raypath-sklep.svg" alt="Raypath Logo" class="h-7.5 hidden lg:block">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-raypath-sklep-icon.svg" alt="Raypath Logo" class="h-[1.83rem] lg:hidden">
			</a>

			<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'raypathsklep' ); ?>" class="grow hidden lg:block">

				<ul class="flex lg:gap-2 2xl:gap-4 justify-between items-center w-full">

					<li class="mega-menu-btn py-2 px-3 bg-transaprent rounded-lg hover:bg-[rgba(223,233,224,0.40)] ">
						<a href="<?php echo esc_url( $nav_items['produkty']['url'] ); ?>" class="flex items-center gap-2 text-base/[160%] font-semibold transition">
							<?php echo esc_html( $nav_items['produkty']['label'] ); ?>
							<svg class="rotate-180 transition" xmlns="http://www.w3.org/2000/svg" width="11" height="6" viewBox="0 0 11 6" fill="none">
							<path d="M0.5 5.5L5.5 0.5L10.5 5.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>

						<!-- megamenu -->
						<div class="mega-menu-wrapper hidden absolute left-4 2xl:-left-12 top-full w-[calc(100%-2rem)] 2xl:w-[calc(100%+6rem)] bg-light-gray rounded-3xl bg-light-grey gap-6 p-6 shadow-lg opacity-0 transition duration-300 z-9999">
							<div class="w-204"> 
								<div class="flex justify-between items-center gap-4 w-full mb-6">
									<h3 class="text-lg font-semibold">Kategorie</h3>
									<a href="<?php echo esc_url( $mega_cta['url'] ?? home_url( '/sklep' ) ); ?>" class="btn-link">
										<?php echo esc_html( $mega_cta['label'] ?? __( 'Zobacz wszystkie', 'raypathsklep' ) ); ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<g clip-path="url(#clip0_4002_1599)">
											<path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<defs>
											<clipPath id="clip0_4002_1599">
											<rect width="20" height="20" fill="white"/>
											</clipPath>
										</defs>
										</svg>	
									</a>
								</div>

								<div class="w-full">
									<ul class="grid grid-cols-4 gap-4 w-full">
										<?php if ( ! empty( $mega_categories ) ) : ?>
											<?php foreach ( $mega_categories as $category ) :
												$title     = ! empty( $category['title'] ) ? $category['title'] : '';
												$url       = ! empty( $category['url'] ) ? $category['url'] : '#';
												$image     = isset( $category['image'] ) ? $category['image'] : null;
												$image_id  = is_array( $image ) && isset( $image['ID'] ) ? (int) $image['ID'] : 0;
												$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : '';
												$image_alt = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';

												if ( ! $title && $image_id ) {
													$title = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
												}

												if ( ! $title ) {
													$title = __( 'Element menu', 'raypathsklep' );
												}
												?>
												<li class="bg-white pt-4 px-4 pb-5 rounded-3xl ">
													<a href="<?php echo esc_url( $url ); ?>" class="">
														<figure class="w-full h-[5rem] xl:h-[6.529rem] flex justify-center items-center mb-[1.35rem]">
															<?php if ( $image_url ) : ?>
																<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ?: $title ); ?>" class="w-full max-h-full max-w-full ">
															<?php else : ?>
																<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/temp/czysciki.png" alt="<?php echo esc_attr( $title ); ?>" class="w-full max-h-full max-w-full ">
															<?php endif; ?>
														</figure>
														<h4 class="text-center text-typo font-medium text-base/[140%] line-clamp-2"><?php echo esc_html( $title ); ?></h4>
													</a>
												</li>
											<?php endforeach; ?>
										<?php endif; ?>
									</ul>
								</div>

							</div>

							<div class="w-[33.495rem] flex flex-col">
								<div class="flex justify-between items-center gap-4 w-full mb-6">
										<h3 class="text-lg font-semibold pl-4">Bestsellery</h3>
										<a href="<?php echo esc_url( $mega_cta['url'] ?? '#' ); ?>" class="btn-link">
											<?php echo esc_html( $mega_cta['label'] ?? __( 'Zobacz wszystkie', 'raypathsklep' ) ); ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
											<g clip-path="url(#clip0_4002_1599)">
												<path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
												<clipPath id="clip0_4002_1599">
												<rect width="20" height="20" fill="white"/>
												</clipPath>
											</defs>
											</svg>	
										</a>
								</div>
								<div class="w-full">
									<ul class="grid grid-cols-2 gap-[0.87rem] w-full">
										<?php if ( ! empty( $mega_bestsellers ) && function_exists( 'wc_get_product' ) ) : ?>
											<?php foreach ( $mega_bestsellers as $bestseller ) :
												$product_id = isset( $bestseller['product'] ) ? (int) $bestseller['product'] : 0;
												if ( ! $product_id ) {
													continue;
												}
												$product_obj = wc_get_product( $product_id );
												if ( ! $product_obj ) {
													continue;
												}
												$product_url   = get_permalink( $product_id );
												$product_title = ! empty( $bestseller['custom_label'] ) ? $bestseller['custom_label'] : $product_obj->get_name();
												$image_id      = $product_obj->get_image_id();
												$image_url     = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : '';
												$image_alt     = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
												$price_html    = $product_obj->get_price_html();
												?>
												<li class="product-card">
													<a href="<?php echo esc_url( $product_url ); ?>" class="px-4 flex flex-col">
														<figure class="product-card__image-wrapper flex">
															<?php if ( $image_url ) : ?>
																<img class="h-48 w-full object-contain" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ?: $product_title ); ?>">
															<?php else : ?>
																<img class="h-48 w-full object-contain" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/temp/czysciki.png" alt="<?php echo esc_attr( $product_title ); ?>">
															<?php endif; ?>
														</figure>
														<h4 class="product-card-title"><?php echo esc_html( $product_title ); ?></h4>
														<div class="product-card-reviews mb-4">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
															<path d="M14.6431 7.17815L11.8306 9.60502L12.6875 13.2344C12.7347 13.4314 12.7226 13.638 12.6525 13.8281C12.5824 14.0182 12.4575 14.1833 12.2937 14.3025C12.1298 14.4217 11.9343 14.4896 11.7319 14.4977C11.5294 14.5059 11.3291 14.4538 11.1562 14.3481L7.99996 12.4056L4.84184 14.3481C4.66898 14.4532 4.4689 14.5048 4.2668 14.4963C4.06469 14.4879 3.8696 14.4199 3.70609 14.3008C3.54257 14.1817 3.41795 14.0169 3.3479 13.8272C3.27786 13.6374 3.26553 13.4312 3.31246 13.2344L4.17246 9.60502L1.35996 7.17815C1.20702 7.04597 1.09641 6.87166 1.04195 6.67699C0.987486 6.48232 0.99158 6.27592 1.05372 6.08356C1.11586 5.89121 1.23329 5.72142 1.39135 5.59541C1.54941 5.4694 1.7411 5.39274 1.94246 5.37502L5.62996 5.07752L7.05246 1.63502C7.12946 1.44741 7.2605 1.28693 7.42894 1.17398C7.59738 1.06104 7.7956 1.00073 7.9984 1.00073C8.2012 1.00073 8.39942 1.06104 8.56785 1.17398C8.73629 1.28693 8.86734 1.44741 8.94434 1.63502L10.3662 5.07752L14.0537 5.37502C14.2555 5.39209 14.4477 5.46831 14.6064 5.59415C14.765 5.71999 14.883 5.88984 14.9455 6.08243C15.008 6.27502 15.0123 6.48178 14.9579 6.6768C14.9034 6.87183 14.7926 7.04644 14.6393 7.17877L14.6431 7.17815Z" fill="#3CB64A"/>
															</svg>
														</div>
														<?php if ( $price_html ) : ?>
															<p class="product-card-price product-price mb-6 no-underline"><?php echo wp_kses_post( $price_html ); ?></p>
														<?php endif; ?>
													</a>
												</li>
											<?php endforeach; ?>
										<?php endif; ?>
									</ul>
								</div>


							</div>
						</div>
						<!-- end megamenu -->

					</li>

					<li class="py-2 px-3 bg-transaprent rounded-lg hover:bg-[rgba(223,233,224,0.40)]">
						<a href="<?php echo esc_url( $nav_items['wspolpraca']['url'] ); ?>" class="flex items-center gap-2 text-base/[160%] font-semibold transition"><?php echo esc_html( $nav_items['wspolpraca']['label'] ); ?></a>
					</li>
					<li class="py-2 px-3 bg-transaprent rounded-lg hover:bg-[rgba(223,233,224,0.40)]">
						<a href="<?php echo esc_url( $nav_items['blog']['url'] ); ?>" class="flex items-center gap-2 text-base/[160%] font-semibold transition"><?php echo esc_html( $nav_items['blog']['label'] ); ?></a>
					</li>
					<li class="py-2 px-3 bg-transaprent rounded-lg hover:bg-[rgba(223,233,224,0.40)]">
						<a href="<?php echo esc_url( $nav_items['recykling']['url'] ); ?>" class="flex items-center gap-2 text-base/[160%] font-semibold transition"><?php echo esc_html( $nav_items['recykling']['label'] ); ?></a>
					</li>
					<li class="py-2 px-3 bg-transaprent rounded-lg hover:bg-[rgba(223,233,224,0.40)]">
						<a href="<?php echo esc_url( $nav_items['kontakt']['url'] ); ?>" class="flex items-center gap-2 text-base/[160%] font-semibold transition"><?php echo esc_html( $nav_items['kontakt']['label'] ); ?></a>
					</li>
				</ul>
				
			</nav>

			<!-- language switcher -->

			<!-- end language switcher -->

			<div class="relative">

				<button id="search-btn" class="search p-2 hidden lg:block cursor-pointer">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M21.5318 20.4693L16.8378 15.7762C18.1983 14.1428 18.8767 12.0478 18.7319 9.92691C18.5871 7.80604 17.6302 5.82265 16.0603 4.38932C14.4904 2.95599 12.4284 2.18308 10.3031 2.23138C8.17785 2.27968 6.15303 3.14547 4.64986 4.64864C3.14669 6.15181 2.2809 8.17663 2.2326 10.3019C2.1843 12.4271 2.95721 14.4892 4.39054 16.0591C5.82387 17.629 7.80726 18.5859 9.92813 18.7307C12.049 18.8755 14.144 18.1971 15.7774 16.8365L20.4706 21.5306C20.5403 21.6003 20.623 21.6556 20.714 21.6933C20.8051 21.731 20.9026 21.7504 21.0012 21.7504C21.0997 21.7504 21.1973 21.731 21.2884 21.6933C21.3794 21.6556 21.4621 21.6003 21.5318 21.5306C21.6015 21.4609 21.6568 21.3782 21.6945 21.2871C21.7322 21.1961 21.7516 21.0985 21.7516 21C21.7516 20.9014 21.7322 20.8038 21.6945 20.7128C21.6568 20.6218 21.6015 20.539 21.5318 20.4693ZM3.75119 10.5C3.75119 9.16495 4.14707 7.8599 4.88877 6.74987C5.63047 5.63984 6.68468 4.77467 7.91808 4.26378C9.15148 3.75289 10.5087 3.61922 11.8181 3.87967C13.1274 4.14012 14.3302 4.78299 15.2742 5.727C16.2182 6.671 16.861 7.87374 17.1215 9.18311C17.3819 10.4925 17.2483 11.8497 16.7374 13.0831C16.2265 14.3165 15.3613 15.3707 14.2513 16.1124C13.1413 16.8541 11.8362 17.25 10.5012 17.25C8.71159 17.248 6.99585 16.5362 5.73041 15.2708C4.46497 14.0053 3.75318 12.2896 3.75119 10.5Z" fill="black"/>
					</svg>
				</button>

				<div id="search-results" class="absolute top-[calc(100%+1rem)] right-0 z-9999 w-120 hidden -translate-y-4 opacity-0 transition duration-300">
					<?php echo do_shortcode('[fibosearch]'); ?>
				</div>

				<script>
					document.getElementById('search-btn').addEventListener('click', () => {

						if ( document.getElementById('search-results').classList.contains('open') ) {
							document.getElementById('search-results').classList.remove('open');
							document.getElementById('search-results').classList.add('opacity-0');
							document.getElementById('search-results').classList.add('-translate-y-4');

							setTimeout(() => {
								document.getElementById('search-results').classList.add('hidden');
							}, 300);
						} else {
							document.getElementById('search-results').classList.add('open');
							document.getElementById('search-results').classList.remove('hidden');
							

							setTimeout(() => {
								document.getElementById('search-results').classList.remove('opacity-0');
								document.getElementById('search-results').classList.remove('-translate-y-4');
							}, 300);
						}
					});
				</script>
			</div>

			<!-- shop items -->
			<div class="flex items-center gap-2 ml-auto lg:ml-0">
				<?php
				$raypath_cart_count = function_exists( 'WC' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
				?>
				<a href="<?php echo home_url(); ?>/ulubione-produkty" class="p-2 w-12 h-12 flex items-center justify-center relative">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M16.6875 3.75C14.7516 3.75 13.0566 4.5825 12 5.98969C10.9434 4.5825 9.24844 3.75 7.3125 3.75C5.77146 3.75174 4.29404 4.36468 3.20436 5.45436C2.11468 6.54404 1.50174 8.02146 1.5 9.5625C1.5 16.125 11.2303 21.4369 11.6447 21.6562C11.7539 21.715 11.876 21.7458 12 21.7458C12.124 21.7458 12.2461 21.715 12.3553 21.6562C12.7697 21.4369 22.5 16.125 22.5 9.5625C22.4983 8.02146 21.8853 6.54404 20.7956 5.45436C19.706 4.36468 18.2285 3.75174 16.6875 3.75ZM12 20.1375C10.2881 19.14 3 14.5959 3 9.5625C3.00149 8.41921 3.45632 7.32317 4.26475 6.51475C5.07317 5.70632 6.16921 5.25149 7.3125 5.25C9.13594 5.25 10.6669 6.22125 11.3062 7.78125C11.3628 7.91881 11.4589 8.03646 11.5824 8.11926C11.7059 8.20207 11.8513 8.24627 12 8.24627C12.1487 8.24627 12.2941 8.20207 12.4176 8.11926C12.5411 8.03646 12.6372 7.91881 12.6937 7.78125C13.3331 6.21844 14.8641 5.25 16.6875 5.25C17.8308 5.25149 18.9268 5.70632 19.7353 6.51475C20.5437 7.32317 20.9985 8.41921 21 9.5625C21 14.5884 13.71 19.1391 12 20.1375Z" fill="black"/>
					</svg>
					<span id="wishlist-count-badge" class="wishlist-badge hidden">0</span>
				</a>
				<a href="<?php echo home_url(); ?>/moje-konto" class="p-2 w-12 h-12 flex items-center justify-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  					<path d="M21.6503 19.875C20.2225 17.4065 18.0222 15.6365 15.4544 14.7975C16.7246 14.0414 17.7114 12.8892 18.2634 11.5179C18.8153 10.1467 18.9019 8.63211 18.5098 7.20688C18.1177 5.78165 17.2685 4.52454 16.0928 3.6286C14.9171 2.73266 13.4798 2.24744 12.0016 2.24744C10.5234 2.24744 9.08609 2.73266 7.91037 3.6286C6.73465 4.52454 5.88553 5.78165 5.49342 7.20688C5.1013 8.63211 5.18787 10.1467 5.73983 11.5179C6.2918 12.8892 7.27863 14.0414 8.54878 14.7975C5.98097 15.6356 3.78066 17.4056 2.35285 19.875C2.30049 19.9604 2.26576 20.0554 2.2507 20.1544C2.23565 20.2534 2.24059 20.3544 2.26521 20.4515C2.28984 20.5486 2.33366 20.6397 2.39409 20.7196C2.45452 20.7995 2.53033 20.8664 2.61706 20.9165C2.70378 20.9666 2.79966 20.9988 2.89904 21.0113C2.99842 21.0237 3.09928 21.0161 3.19568 20.989C3.29208 20.9618 3.38205 20.9156 3.4603 20.8531C3.53855 20.7906 3.60349 20.713 3.65128 20.625C5.41753 17.5725 8.53941 15.75 12.0016 15.75C15.4638 15.75 18.5857 17.5725 20.3519 20.625C20.3997 20.713 20.4646 20.7906 20.5429 20.8531C20.6211 20.9156 20.7111 20.9618 20.8075 20.989C20.9039 21.0161 21.0048 21.0237 21.1042 21.0113C21.2035 20.9988 21.2994 20.9666 21.3861 20.9165C21.4729 20.8664 21.5487 20.7995 21.6091 20.7196C21.6695 20.6397 21.7134 20.5486 21.738 20.4515C21.7626 20.3544 21.7675 20.2534 21.7525 20.1544C21.7374 20.0554 21.7027 19.9604 21.6503 19.875ZM6.7516 8.99999C6.7516 7.96164 7.0595 6.9466 7.63638 6.08324C8.21326 5.21989 9.0332 4.54698 9.99251 4.14962C10.9518 3.75226 12.0074 3.64829 13.0258 3.85086C14.0442 4.05344 14.9797 4.55345 15.7139 5.28768C16.4481 6.0219 16.9481 6.95736 17.1507 7.97576C17.3533 8.99416 17.2493 10.0498 16.852 11.0091C16.4546 11.9684 15.7817 12.7883 14.9183 13.3652C14.055 13.9421 13.0399 14.25 12.0016 14.25C10.6097 14.2485 9.27517 13.6949 8.29093 12.7107C7.30669 11.7264 6.75309 10.3919 6.7516 8.99999Z" fill="black"/>
					</svg>
				</a>
				<a href="<?php echo home_url(); ?>/koszyk" class="p-2 w-12 h-12 flex items-center justify-center relative">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="none">
					<path d="M18 0H1.5C1.10218 0 0.720644 0.158035 0.43934 0.43934C0.158035 0.720644 0 1.10218 0 1.5V15C0 15.3978 0.158035 15.7794 0.43934 16.0607C0.720644 16.342 1.10218 16.5 1.5 16.5H18C18.3978 16.5 18.7794 16.342 19.0607 16.0607C19.342 15.7794 19.5 15.3978 19.5 15V1.5C19.5 1.10218 19.342 0.720644 19.0607 0.43934C18.7794 0.158035 18.3978 0 18 0ZM18 15H1.5V1.5H18V15ZM14.25 4.5C14.25 5.69347 13.7759 6.83807 12.932 7.68198C12.0881 8.52589 10.9435 9 9.75 9C8.55653 9 7.41193 8.52589 6.56802 7.68198C5.72411 6.83807 5.25 5.69347 5.25 4.5C5.25 4.30109 5.32902 4.11032 5.46967 3.96967C5.61032 3.82902 5.80109 3.75 6 3.75C6.19891 3.75 6.38968 3.82902 6.53033 3.96967C6.67098 4.11032 6.75 4.30109 6.75 4.5C6.75 5.29565 7.06607 6.05871 7.62868 6.62132C8.19129 7.18393 8.95435 7.5 9.75 7.5C10.5456 7.5 11.3087 7.18393 11.8713 6.62132C12.4339 6.05871 12.75 5.29565 12.75 4.5C12.75 4.30109 12.829 4.11032 12.9697 3.96967C13.1103 3.82902 13.3011 3.75 13.5 3.75C13.6989 3.75 13.8897 3.82902 14.0303 3.96967C14.171 4.11032 14.25 4.30109 14.25 4.5Z" fill="black"/>
					</svg>
					<span id="cart-count-badge" class="wishlist-badge <?php echo $raypath_cart_count ? '' : 'hidden'; ?>"><?php echo esc_html( $raypath_cart_count ); ?></span>
				</a>
			</div>
			<!-- end shop items -->

			<!-- mobile menu button -->
			<button id="mobile-menu-btn" class="flex lg:hidden flex-col gap-1 cursor-pointer px-0.75 py-1.25">
				<span class="h-0.5 w-4 bg-typo rounded-full"></span>
				<span class="h-0.5 w-4 bg-typo rounded-full"></span>
				<span class="h-0.5 w-4 bg-typo rounded-full"></span>
			</button>

		</div>

		<!-- mobile menu -->
			<div class="mobile-menu hidden lg:!hidden">
				<ul class="flex flex-col items-center gap-4 pb-6">
					<li class="mobile-menu-item-arrow">
						<a class="text-center text-xl text-typo font-medium flex gap-2 items-center justify-center" href="<?php echo esc_url( $nav_items['produkty']['url'] ); ?>">
							<?php echo esc_html( $nav_items['produkty']['label'] ); ?> 
							<svg class="transition" xmlns="http://www.w3.org/2000/svg" width="11" height="6" viewBox="0 0 11 6" fill="none">
							<path d="M10.5 0.5L5.5 5.5L0.5 0.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
						<ul class="flex flex-col gap-2 items-center py-4 hidden">
							<?php if ( ! empty( $mega_mobile_links ) ) : ?>
								<?php foreach ( $mega_mobile_links as $link ) :
									$title = $link['label'] ?? '';
									$url   = $link['url'] ?? '';
									if ( ! $title || ! $url ) {
										continue;
									}
									?>
									<li><a class="text-center text-lg text-typo font-medium" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $title ); ?></a></li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</li>
					<li><a class="text-center text-xl text-typo font-medium" href="<?php echo esc_url( $nav_items['wspolpraca']['url'] ); ?>"><?php echo esc_html( $nav_items['wspolpraca']['label'] ); ?></a></li>
					<li><a class="text-center text-xl text-typo font-medium" href="<?php echo esc_url( $nav_items['blog']['url'] ); ?>"><?php echo esc_html( $nav_items['blog']['label'] ); ?></a></li>
					<li><a class="text-center text-xl text-typo font-medium" href="<?php echo esc_url( $nav_items['recykling']['url'] ); ?>"><?php echo esc_html( $nav_items['recykling']['label'] ); ?></a></li>
					<li><a class="text-center text-xl text-typo font-medium" href="<?php echo esc_url( $nav_items['kontakt']['url'] ); ?>"><?php echo esc_html( $nav_items['kontakt']['label'] ); ?></a></li>
				</ul>
			</div>
		<!-- end mobile menu -->
	</div>
</header><!-- #masthead -->



<?php
$raypath_wishlist_data = array(
	'isLoggedIn'       => is_user_logged_in(),
	'ajaxUrl'          => admin_url( 'admin-ajax.php' ),
	'nonce'            => wp_create_nonce( 'raypath_wishlist' ),
	'initialWishlist'  => function_exists( 'raypath_get_wishlist_ids' ) ? raypath_get_wishlist_ids() : array(),
	'messages'         => array(
		'added'   => 'Dodano produkt do ulubionych.',
		'exists'  => 'Produkt jest już na liście ulubionych.',
		'removed' => 'Usunięto produkt z ulubionych.',
		'error'   => 'Nie udało się zaktualizować ulubionych. Spróbuj ponownie.',
	),
);
?>

<style>
#raypath-wishlist-toast-container {
	position: fixed;
	top: 24px;
	right: 24px;
	z-index: 99999;
	display: flex;
	flex-direction: column;
	gap: 10px;
	pointer-events: none;
}

.wishlist-toast {
	background: #286D2E;
	color: #fff;
	padding: 12px 16px;
	border-radius: 12px;
	box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
	font-weight: 600;
	opacity: 0;
	transform: translateY(-6px);
	transition: opacity 0.3s ease, transform 0.3s ease;
	pointer-events: auto;
}

.wishlist-toast.visible {
	opacity: 1;
	transform: translateY(0);
}

.wishlist-badge {
	position: absolute;
	top: 3px;
	right: 3px;
	min-width: 18px;
	height: 18px;
	padding: 0 5px;
	border-radius: 9999px;
	background: #286D2E;
	color: #fff;
	font-size: 11px;
	font-weight: 700;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	line-height: 1;
}

.add-to-wishlist-btn.is-wishlisted svg path {
	fill: #286D2E;
	stroke: #286D2E;
}

.add-to-wishlist-btn[aria-busy="true"],
.wishlist-remove-btn[aria-busy="true"] {
	opacity: 0.6;
	pointer-events: none;
}
</style>

<script>
(() => {
	const cfg = <?php echo wp_json_encode( $raypath_wishlist_data ); ?>;
	const storageKey = 'raypath_wishlist';
	const cookieName = 'raypath_wishlist';
	const cookieMaxAge = 60 * 60 * 24 * 30;
	const toastContainerId = 'raypath-wishlist-toast-container';

	const parseIds = (maybe) => {
		if (!Array.isArray(maybe)) return [];
		return maybe
			.map((value) => parseInt(value, 10))
			.filter((value) => Number.isInteger(value) && value > 0);
	};

	const readLocal = () => {
		try {
			const saved = window.localStorage.getItem(storageKey);
			return saved ? parseIds(JSON.parse(saved)) : [];
		} catch (e) {
			return [];
		}
	};

	const writeLocal = (ids) => {
		try {
			window.localStorage.setItem(storageKey, JSON.stringify(ids));
		} catch (e) {}
	};

	const readCookie = () => {
		const match = document.cookie.match(new RegExp('(?:^|; )' + cookieName.replace(/([.*+?^${}()|[\]\\])/g, '\\$1') + '=([^;]*)'));
		if (!match) return [];
		try {
			return parseIds(JSON.parse(decodeURIComponent(match[1])));
		} catch (e) {
			return [];
		}
	};

	const writeCookie = (ids) => {
		try {
			document.cookie = `${cookieName}=${encodeURIComponent(JSON.stringify(ids))};path=/;max-age=${cookieMaxAge};SameSite=Lax`;
		} catch (e) {}
	};

	const initial = (() => {
		const base = parseIds(cfg.initialWishlist || []);
		const fallback = cfg.isLoggedIn ? [] : [...readLocal(), ...readCookie()];
		return Array.from(new Set([...base, ...fallback]));
	})();

	let wishlist = new Set(initial);
	// Upewnij się, że stan początkowy jest zapisany w cookie/localStorage,
	// aby backend (PHP) widział te same ID co badge JS.
	writeLocal([...wishlist]);
	writeCookie([...wishlist]);

	const persist = (ids) => {
		const cleaned = parseIds(ids);
		wishlist = new Set(cleaned);
		writeLocal(cleaned);
		writeCookie(cleaned);
		syncButtons();
		updateWishlistBadge();
	};

	const showToast = (message) => {
		if (!message) return;

		let container = document.getElementById(toastContainerId);
		if (!container) {
			container = document.createElement('div');
			container.id = toastContainerId;
			container.setAttribute('aria-live', 'polite');
			document.body.appendChild(container);
		}

		const toast = document.createElement('div');
		toast.className = 'wishlist-toast';
		toast.textContent = message;
		container.appendChild(toast);

		requestAnimationFrame(() => {
			toast.classList.add('visible');
		});

		setTimeout(() => {
			toast.classList.remove('visible');
			setTimeout(() => toast.remove(), 350);
		}, 3000);
	};

	const syncButtons = () => {
		document.querySelectorAll('[data-wishlist-product-id]').forEach((btn) => {
			const id = parseInt(btn.dataset.wishlistProductId, 10);
			if (!id) return;

			const inList = wishlist.has(id);
			const intent = btn.dataset.wishlistIntent || 'add';

			if (intent === 'remove') {
				btn.classList.toggle('is-wishlisted', inList);
				return;
			}

			btn.classList.toggle('is-wishlisted', inList);
			btn.setAttribute('aria-pressed', inList ? 'true' : 'false');
		});
	};

	const removeCard = (btn) => {
		const card = btn.closest('[data-wishlist-item]');
		if (card) {
			card.remove();
		}

		if (!document.querySelector('[data-wishlist-item]')) {
			const empty = document.getElementById('wishlist-empty-state');
			if (empty) {
				empty.classList.remove('hidden');
			}
		}
	};

	const updateWishlistBadge = () => {
		const badge = document.getElementById('wishlist-count-badge');
		if (!badge) return;
		const count = wishlist.size;
		badge.textContent = count;
		badge.classList.toggle('hidden', count === 0);
	};

	const updateCartBadge = (delta = 0) => {
		const badge = document.getElementById('cart-count-badge');
		if (!badge) return;
		const current = parseInt(badge.textContent || '0', 10) || 0;
		const next = Math.max(0, current + delta);
		badge.textContent = next;
		badge.classList.toggle('hidden', next === 0);
	};

	const handleGuest = (id, intent, btn) => {
		if (intent === 'remove') {
			wishlist.delete(id);
			persist([...wishlist]);
			removeCard(btn);
			showToast(cfg.messages.removed);
			return;
		}

		if (wishlist.has(id)) {
			showToast(cfg.messages.exists);
			return;
		}

		wishlist.add(id);
		persist([...wishlist]);
		showToast(cfg.messages.added);
	};

	const handleLogged = (id, intent, btn) => {
		if (!cfg.ajaxUrl || !cfg.nonce) {
			showToast(cfg.messages.error);
			return;
		}

		const form = new FormData();
		form.append('action', 'raypath_update_wishlist');
		form.append('product_id', id);
		form.append('intent', intent || 'add');
		form.append('nonce', cfg.nonce);

		btn?.setAttribute('aria-busy', 'true');

		fetch(cfg.ajaxUrl, {
			method: 'POST',
			credentials: 'same-origin',
			body: form,
		})
			.then((res) => res.json())
			.then((res) => {
				btn?.removeAttribute('aria-busy');

				if (!res || !res.success) {
					throw new Error(res?.data?.message || cfg.messages.error);
				}

				const list = parseIds(res.data.wishlist || []);
				persist(list);

				showToast(res.data.message || (intent === 'remove' ? cfg.messages.removed : cfg.messages.added));

				if (intent === 'remove') {
					removeCard(btn);
				}
			})
			.catch((err) => {
				btn?.removeAttribute('aria-busy');
				showToast(err?.message || cfg.messages.error);
			});
	};

	const handleClick = (event) => {
		const btn = event.currentTarget;
		const id = parseInt(btn.dataset.wishlistProductId, 10);
		const intent = btn.dataset.wishlistIntent || 'add';

		if (!id) {
			return;
		}

		if (cfg.isLoggedIn) {
			handleLogged(id, intent, btn);
		} else {
			handleGuest(id, intent, btn);
		}
	};

	document.addEventListener('DOMContentLoaded', () => {
		syncButtons();
		updateWishlistBadge();
		document.querySelectorAll('[data-wishlist-product-id]').forEach((btn) => {
			btn.addEventListener('click', handleClick);
		});

		if (window.jQuery) {
			window.jQuery(document.body).on('added_to_cart', (event, fragments, cartHash, $button) => {
				updateCartBadge(1);
			});
		}
	});
})();
</script>
