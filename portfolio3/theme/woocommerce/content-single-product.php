<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="container-content mb-6">

		<nav class="breadcrumbs flex gap-4 py-4 lg:py-15 items-center w-full overflow-hidden">
			<a class="text-typo text-[0.875rem]/[140%] font-normal transition hover:text-accent-dark text-nowrap" href="<?php echo home_url() ?>">Strona główna</a>

			<svg class="shrink-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_2456_4866)">
				<path d="M6 3L11 8L6 13" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_2456_4866">
				<rect width="16" height="16" fill="white"/>
				</clipPath>
				</defs>
			</svg>

			<?php
			$terms = get_the_terms( $product->get_id(), 'product_cat' );

			if ( $terms && ! is_wp_error( $terms ) ) {

				$term = $terms[0];

				while ( $term->parent != 0 ) {
					$term = get_term( $term->parent, 'product_cat' );
				}

				echo '<a href="' . get_term_link( $term ) . '" class="text-typo text-[0.875rem]/[140%] font-normal transition hover:text-accent-dark text-nowrap">'
						. esc_html( $term->name ) .
					'</a>';
			}
			?>

			<svg class="shrink-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_2456_4866)">
				<path d="M6 3L11 8L6 13" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_2456_4866">
				<rect width="16" height="16" fill="white"/>
				</clipPath>
				</defs>
			</svg>

			<span class="text-typo text-[0.875rem]/[140%] font-normal text-nowrap"><?php the_title(); ?></span>
		</nav>

		<div class="flex flex-col lg:flex-row gap-8">

			<!-- product gallery -->
			<?php
				global $product;
				$attachment_ids  = $product->get_gallery_image_ids();
				$main_image_id   = $product->get_image_id();
				$main_image_alt  = $main_image_id ? get_post_meta( $main_image_id, '_wp_attachment_image_alt', true ) : '';

				if ( '' === $main_image_alt ) {
					$main_image_alt = get_the_title();
				}
			?>
			<div class="my-gallery-wrapper flex gap-4 w-full lg:w-1/2 shrink-0 max-h-[32.1875rem]">
				<div class="my-gallery-thumbs thumbs-scroll flex flex-col gap-4 max-h-128.75 overflow-y-auto w-18 lg:w-23.25 shrink-0">
					<?php if ( $main_image_id ) : ?>
						<img 
							class="my-gallery-thumb active w-full cursor-pointer border border-medium-grey rounded-lgl" 
							src="<?php echo wp_get_attachment_image_url( $main_image_id, 'thumbnail' ); ?>" 
							data-full="<?php echo wp_get_attachment_image_url( $main_image_id, 'full' ); ?>" 
						/>
					<?php endif; ?>

					<?php foreach ( $attachment_ids as $image_id ) : ?>
						<img 
							class="my-gallery-thumb w-full cursor-pointer border border-medium-grey rounded-lg" 
							src="<?php echo wp_get_attachment_image_url( $image_id, 'thumbnail' ); ?>" 
							data-full="<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?>" 
						/>
					<?php endforeach; ?>
				</div>

				<div class="my-gallery-main relative">
					<?php
					$badges = function_exists( 'raypath_get_product_badges' ) ? raypath_get_product_badges( $product ) : array();

					if ( ! empty( $badges ) ) :
						?>
						<div class="product-badges flex flex-col gap-2 absolute top-4 left-4 z-10">
							<?php echo implode( '', $badges ); ?>
						</div>
					<?php endif; ?>

					<img 
						class="w-full block rounded-2xl border border-medium-grey h-full object-contain cursor-zoom-in focus:outline-none focus:ring-2 focus:ring-accent-dark" 
						id="my-gallery-main-image" 
						src="<?php echo wp_get_attachment_image_url( $main_image_id, 'full' ); ?>" 
						alt="<?php echo esc_attr( $main_image_alt ); ?>"
						role="button"
						tabindex="0"
					/>
				</div>
			</div>

			<?php if ( $main_image_id ) : ?>
				<div id="product-lightbox" class="fixed inset-0 hidden items-center justify-center bg-black/75 z-99999 p-4 backdrop-blur-sm">
					<div class="absolute inset-0" data-lightbox-backdrop></div>
					<div class="relative z-10 max-w-[90vw] max-h-[90vh] flex items-center justify-center">
						<button type="button" class="absolute -top-4 -right-4 bg-white text-black rounded-full w-10 h-10 flex items-center justify-center shadow-lg" aria-label="Zamknij podgląd" data-lightbox-close>&times;</button>
						<img 
							id="product-lightbox-image" 
							src="<?php echo esc_url( wp_get_attachment_image_url( $main_image_id, 'full' ) ); ?>" 
							alt="<?php echo esc_attr( $main_image_alt ); ?>" 
							class="max-h-[90vh] max-w-[90vw] object-contain rounded-2xl shadow-2xl bg-white" 
						/>
					</div>
				</div>
			<?php endif; ?>

			<script>
				const mainImageEl = document.getElementById('my-gallery-main-image');
				const lightboxEl = document.getElementById('product-lightbox');
				const lightboxImageEl = document.getElementById('product-lightbox-image');
				const lightboxCloseEl = document.querySelector('[data-lightbox-close]');
				const lightboxBackdropEl = document.querySelector('[data-lightbox-backdrop]');

				const toggleLightbox = (show) => {
					if (!lightboxEl) return;
					lightboxEl.classList.toggle('hidden', !show);
					lightboxEl.classList.toggle('flex', show);
				};

				const setLightboxImage = (url) => {
					if (lightboxImageEl && url) {
						lightboxImageEl.src = url;
					}
				};

				document.addEventListener('click', function (e) {
					if (e.target.classList.contains('my-gallery-thumb')) {
						const url = e.target.dataset.full;
						const mainImg = document.getElementById('my-gallery-main-image');
						if (mainImg) {
							mainImg.src = url;
						}

						setLightboxImage(url);

						document.querySelectorAll('.my-gallery-thumb').forEach(t => t.classList.remove('active'));
						e.target.classList.add('active');
					}
				});

				if (mainImageEl) {
					const openLightbox = () => {
						setLightboxImage(mainImageEl.src);
						toggleLightbox(true);
					};

					mainImageEl.addEventListener('click', openLightbox);
					mainImageEl.addEventListener('keydown', (e) => {
						if (e.key === 'Enter' || e.key === ' ') {
							e.preventDefault();
							openLightbox();
						}
					});
				}

				if (lightboxCloseEl) {
					lightboxCloseEl.addEventListener('click', () => toggleLightbox(false));
				}

				if (lightboxBackdropEl) {
					lightboxBackdropEl.addEventListener('click', () => toggleLightbox(false));
				}

				document.addEventListener('keydown', (e) => {
					if (e.key === 'Escape') {
						toggleLightbox(false);
					}
				});
			</script>
			<style>
			/* Scrollbar niewidoczny, bez wpływu na szerokość; scroll działa normalnie */
			.thumbs-scroll {
				scrollbar-width: none; /* Firefox */
			}
			.thumbs-scroll::-webkit-scrollbar {
				width: 0;
				height: 0;
			}
			.thumbs-scroll::-webkit-scrollbar-thumb,
			.thumbs-scroll::-webkit-scrollbar-track,
			.thumbs-scroll::-webkit-scrollbar-button {
				display: none;
			}
			</style>
			<!-- end - product gallery -->

			<div class="product-summary w-full lg:max-w-118.25">

				<?php
				global $product;
				?>

					<!-- Product title-->
					<h1 class="product_title ">
						<?php the_title(); ?>
					</h1>

					<!-- SKU -->
					<?php if ( $product->get_sku() ) : ?>
						<p class="product-sku text-base/[140%] text-typo font-medium mb-4">Numer artykułu: <?php echo $product->get_sku(); ?></p>
					<?php endif; ?>

					<!-- Variable / simple price -->
					<?php
					$initial_price_html = $product->get_price_html();

					if ( $product->is_type( 'variable' ) ) {
						// pobierz domyślne atrybuty
						$default_attributes = $product->get_default_attributes();

						if ( ! empty( $default_attributes ) ) {
							foreach ( $product->get_children() as $child_id ) {
								$variation = wc_get_product( $child_id );
								$match     = true;

								foreach ( $default_attributes as $attr_name => $attr_value ) {
									if ( $variation->get_attribute( $attr_name ) !== $attr_value ) {
										$match = false;
										break;
									}
								}

								if ( $match ) {
									$initial_price_html = $variation->get_price_html();
									break;
								}
							}
						}
					}
					?>

					<div class="product-price text-typo mb-4 font-medium text-2xl/[120%]" id="js-product-price">
						<?php echo wp_kses_post( $initial_price_html ); ?>
						<div class="mt-2"><?php echo do_shortcode('[omnibus_price_message]'); ?></div>
					</div>
					<!-- VAT -->
					<p class="flex flex-col lg:flex-row gap-2 text-typo text-base/[140%] font-medium mb-4">
						z wliczonym podatkiem VAT
						<a class="text-accent-dark" href="/polityka-prywatnosci" class="privacy-link">Polityka prywatności</a>
					</p>

					<?php
					$raypath_can_purchase = $product && $product->is_purchasable() && ( $product->is_in_stock() || $product->backorders_allowed() );
					?>

					<?php if ( $raypath_can_purchase ) : ?>
						<!-- Variants -->
						<?php if ( $product->is_type( 'variable' ) ) : ?>
							<div class="product-variations">
								<?php woocommerce_variable_add_to_cart(); ?>
							</div>

							<script>
							document.addEventListener('DOMContentLoaded', function() {
								var form    = document.querySelector('.variations_form.cart');
								var priceEl = document.getElementById('js-product-price');

								if (!form || !priceEl || typeof jQuery === 'undefined') {
									return;
								}

								// Cena domyślna z PHP (np. domyślny wariant)
								var defaultPriceHtml = <?php echo wp_json_encode( $initial_price_html ); ?>;

								var $form = jQuery(form);

								// WooCommerce emituje jQuery event "found_variation" z obiektem variation jako drugim argumentem
								$form.on('found_variation', function(event, variation) {
									if (!variation || !variation.price_html) {
										return;
									}

									priceEl.innerHTML = variation.price_html;
								});

								// Reset (np. przy przywracaniu domyślnych wartości)
								$form.on('reset_data', function() {
									priceEl.innerHTML = defaultPriceHtml;
								});
							});
							</script>
						<?php endif; ?>

						<!-- Quantity and buttons -->
						<?php if ( ! $product->is_type( 'variable' ) ) : ?>
							<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
								
								<p class="mb-2 text-typo text-base/[160%]">Ilość</p>
								<?php woocommerce_quantity_input(); ?>

								<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

								<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class=" btn-transparent  single_add_to_cart_button button alt w-full mt-4">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<g clip-path="url(#clip0_4075_1856)">
											<path d="M14.6875 14.375H7.12266C6.82992 14.375 6.54649 14.2722 6.32177 14.0846C6.09705 13.897 5.94529 13.6365 5.89297 13.3484L3.80703 1.875H1.875" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M7.1875 17.5C8.05044 17.5 8.75 16.8004 8.75 15.9375C8.75 15.0746 8.05044 14.375 7.1875 14.375C6.32456 14.375 5.625 15.0746 5.625 15.9375C5.625 16.8004 6.32456 17.5 7.1875 17.5Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M14.6875 17.5C15.5504 17.5 16.25 16.8004 16.25 15.9375C16.25 15.0746 15.5504 14.375 14.6875 14.375C13.8246 14.375 13.125 15.0746 13.125 15.9375C13.125 16.8004 13.8246 17.5 14.6875 17.5Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M5.51172 11.25H15.3203C15.613 11.25 15.8965 11.1472 16.1212 10.9596C16.3459 10.772 16.4977 10.5115 16.55 10.2234L17.5 5H4.375" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<defs>
											<clipPath id="clip0_4075_1856">
											<rect width="20" height="20" fill="white"/>
											</clipPath>
										</defs>
									</svg>
									<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
								</button>

								<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
							</form>
						<?php endif; ?>

						
						<a 
							class="btn w-full mt-4 js-buy-now" 
							href="#"
							data-buy-now
							data-product-id="<?php echo esc_attr( $product->get_id() ); ?>"
							data-checkout-url="<?php echo esc_url( wc_get_checkout_url() ); ?>"
						>
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
								<g clip-path="url(#clip0_4075_4099)">
									<path d="M14.6875 14.375H7.12266C6.82992 14.375 6.54649 14.2722 6.32177 14.0846C6.09705 13.897 5.94529 13.6365 5.89297 13.3484L3.80703 1.875H1.875" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M7.1875 17.5C8.05044 17.5 8.75 16.8004 8.75 15.9375C8.75 15.0746 8.05044 14.375 7.1875 14.375C6.32456 14.375 5.625 15.0746 5.625 15.9375C5.625 16.8004 6.32456 17.5 7.1875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.6875 17.5C15.5504 17.5 16.25 16.8004 16.25 15.9375C16.25 15.0746 15.5504 14.375 14.6875 14.375C13.8246 14.375 13.125 15.0746 13.125 15.9375C13.125 16.8004 13.8246 17.5 14.6875 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M5.51172 11.25H15.3203C15.613 11.25 15.8965 11.1472 16.1212 10.9596C16.3459 10.772 16.4977 10.5115 16.55 10.2234L17.5 5H4.375" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</g>
								<defs>
									<clipPath id="clip0_4075_4099">
									<rect width="20" height="20" fill="white"/>
									</clipPath>
								</defs>
							</svg>
							Kup i zapłać
						</a>
					<?php else : ?>
						<p class="text-red text-base/[160%] font-medium my-8">Produkt aktualnie niedostępny</p>
					<?php endif; ?>

					<!-- Share link -->
					<?php $raypath_share_url = get_permalink( $product->get_id() ); ?>
					<p class="share-link mt-4">
						<button type="button" class="js-share-open flex items-center gap-2 text-accent-dark text-base/[140%] font-medium">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
								<g clip-path="url(#clip0_4075_3698)">
									<path d="M2.41485 15.525C3.70079 14.1555 7.07657 11.25 11.8734 11.25V15L18.1234 8.75L11.8734 2.5V6.25C7.74844 6.25 2.46016 10.1914 1.87344 15.2766C1.86532 15.3424 1.87837 15.4091 1.9107 15.4671C1.94303 15.525 1.99296 15.5712 2.05326 15.5988C2.11357 15.6265 2.18111 15.6343 2.24612 15.621C2.31113 15.6077 2.37022 15.5741 2.41485 15.525Z" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</g>
								<defs>
									<clipPath id="clip0_4075_3698">
									<rect width="20" height="20" fill="white"/>
									</clipPath>
								</defs>
							</svg>
							Udostępnij
						</button>
					</p>

					<div id="raypath-share-modal" class="fixed inset-0 hidden items-center justify-center z-[9999]">
						<div class="absolute inset-0 bg-black/50" data-share-close></div>
						<div class="relative bg-white rounded-2xl shadow-lg p-6 w-[90%] max-w-md z-10 flex flex-col gap-4" data-share-container data-url="<?php echo esc_url( $raypath_share_url ); ?>">
							<div class="flex justify-between items-center">
								<h3 class="text-lg font-semibold text-typo">Udostępnij produkt</h3>
								<button type="button" class="text-typo text-xl font-semibold" aria-label="Zamknij" data-share-close>&times;</button>
							</div>
							<p class="text-base text-typo break-all"><?php echo esc_url( $raypath_share_url ); ?></p>
							<div class="flex flex-col gap-2">
								<button type="button" class="btn w-full js-share-copy">Skopiuj link</button>
							</div>
						</div>
					</div>

						<script>
							document.addEventListener('DOMContentLoaded', function() {
								const modal      = document.getElementById('raypath-share-modal');
								const openBtn    = document.querySelector('.js-share-open');
								const closeEls   = modal ? modal.querySelectorAll('[data-share-close]') : [];
								const copyBtn    = modal ? modal.querySelector('.js-share-copy') : null;
								const nativeBtn  = modal ? modal.querySelector('.js-share-native') : null;
								const container  = modal ? modal.querySelector('[data-share-container]') : null;
								const shareUrl   = container ? container.getAttribute('data-url') : window.location.href;

								if (!modal || !openBtn) {
									return;
								}

								const toggleModal = (show) => {
									if (show) {
										modal.classList.remove('hidden');
										modal.classList.add('flex');
									} else {
										modal.classList.add('hidden');
										modal.classList.remove('flex');
									}
								};

								openBtn.addEventListener('click', function(e) {
									e.preventDefault();
									toggleModal(true);
								});

								closeEls.forEach((el) => {
									el.addEventListener('click', function() {
										toggleModal(false);
									});
								});

								if (copyBtn && navigator.clipboard) {
									copyBtn.addEventListener('click', async function() {
										try {
											await navigator.clipboard.writeText(shareUrl);
											copyBtn.textContent = 'Skopiowano!';
											setTimeout(() => copyBtn.textContent = 'Skopiuj link', 2000);
										} catch (err) {
											copyBtn.textContent = 'Błąd kopiowania';
											setTimeout(() => copyBtn.textContent = 'Skopiuj link', 2000);
										}
									});
								}

								if (nativeBtn) {
									if (!navigator.share) {
										nativeBtn.classList.add('hidden');
									} else {
										nativeBtn.addEventListener('click', async function() {
											try {
												await navigator.share({ title: document.title, url: shareUrl });
												toggleModal(false);
											} catch (err) {
												// użytkownik anulował lub błąd – pozostajemy w modalu
											}
										});
									}
								}

								document.addEventListener('keydown', function(e) {
									if (e.key === 'Escape') {
										toggleModal(false);
									}
								});
							});
						</script>

				</div>

		</div>

				<script>
					document.addEventListener('DOMContentLoaded', function() {
						const buyNowBtn    = document.querySelector('[data-buy-now]');
						const checkoutUrl  = buyNowBtn ? buyNowBtn.getAttribute('data-checkout-url') : '';
						const productForm  = document.querySelector('form.cart');

						if (!buyNowBtn || !checkoutUrl || !productForm) {
							return;
						}

						const validateVariation = () => {
							const variationField = productForm.querySelector('input[name="variation_id"]');
							if (!variationField) return true;
							return variationField.value && variationField.value !== '0';
						};

						const submitAndGo = () => {
							const formData = new FormData(productForm);
							// upewnij się, że add-to-cart jest ustawione (WooCommerce wymaga parametru)
							if (!formData.has('add-to-cart')) {
								formData.set('add-to-cart', buyNowBtn.getAttribute('data-product-id'));
							}

							fetch(productForm.action, {
								method: 'POST',
								body: formData,
								credentials: 'same-origin',
							}).finally(() => {
								window.location.href = checkoutUrl;
							});
						};

						buyNowBtn.addEventListener('click', function(e) {
							e.preventDefault();
							if (!validateVariation()) {
								// pokaż wbudowany komunikat Woocommerce / przeglądarki
								productForm.reportValidity ? productForm.reportValidity() : null;
								return;
							}
							submitAndGo();
						});
					});
				</script>
	</div>

	<?php
		$benefit_reusable        = (bool) get_field('product_benefit_reusable');
		$benefit_zero_waste      = (bool) get_field('product_benefit_zero_waste');
		$benefit_odor_absorption = (bool) get_field('product_benefit_odor_absorption');

		$has_benefits = $benefit_reusable || $benefit_zero_waste || $benefit_odor_absorption;
	?>

	<section>
		<div class="container-content">
			<div class="flex w-full flex-wrap lg:flex-nowrap">
				<div class="w-full lg:w-1/2">
					<h2 class="text-typo text-[1.5rem]/[120%] font-medium mb-6">Opis produktu</h2>
					<div class="product-content mb-8 lg:mb-15">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="w-full lg:w-1/2 lg:pl-8 mb-8 lg:mb-0">
					<?php if ( $has_benefits ) : ?>
					<div class="grid grid-cols-1 lg:grid-cols-3 justify-start items-center self-stretch grow gap-6 h-full">

						<?php if ( $benefit_reusable ) : ?>
						<div class="flex flex-col justify-center items-center self-stretch grow relative gap-4 p-3 xl2:p-6 rounded-lg border border-medium-grey max-h-56.25">
							<svg
							width="24"
							height="24"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							class="grow-0 shrink-0  w-6 h-6 relative"
							preserveAspectRatio="xMidYMid meet"
							>
							<g clip-path="url(#clip0_2370_1238)">
								<path
								d="M8.25 9H3.75V4.5"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M3.75 9L6.40125 6.34875C7.93666 4.8134 10.0154 3.94527 12.1868 3.93263C14.3581 3.92 16.4468 4.76388 18 6.28125"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M15.75 15H20.25V19.5"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M20.25 15L17.5988 17.6512C16.0633 19.1866 13.9846 20.0547 11.8132 20.0674C9.64193 20.08 7.55317 19.2361 6 17.7188"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
							</g>
							<defs>
								<clipPath id="clip0_2370_1238"><rect width="24" height="24" fill="white"></rect></clipPath>
							</defs>
							</svg>
							<p
							class="text-base font-medium text-center text-black"
							>
							Wielokrotnego użytku
							</p>
						</div>
						<?php endif; ?>

						<?php if ( $benefit_zero_waste ) : ?>
						<div class="flex flex-col justify-center items-center self-stretch grow relative gap-4 p-3 xl2:p-6 rounded-lg border border-medium-grey max-h-56.25" >
							<svg
							width="24"
							height="24"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							class="grow-0 shrink-0  w-6 h-6 relative"
							preserveAspectRatio="xMidYMid meet"
							>
							<g clip-path="url(#clip0_2370_1244)">
								<path
								d="M14.25 21.75L12 19.5L14.25 17.25"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M18.2448 7.04906L17.4208 10.1231L14.3477 9.29906"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M7.40109 13.1972L6.57609 10.125L3.50391 10.9472"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M6.57596 10.125L2.45096 17.25C2.31937 17.4779 2.25007 17.7364 2.25 17.9996C2.24993 18.2628 2.31911 18.5214 2.45058 18.7493C2.58205 18.9773 2.77119 19.1667 2.999 19.2985C3.22682 19.4302 3.48529 19.4997 3.74846 19.5H8.24846"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M12 19.5H20.25C20.5132 19.4997 20.7716 19.4302 20.9995 19.2985C21.2273 19.1667 21.4164 18.9773 21.5479 18.7493C21.6794 18.5214 21.7485 18.2628 21.7485 17.9996C21.7484 17.7364 21.6791 17.4779 21.5475 17.25L19.3781 13.5"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M17.4225 10.125L13.2975 3C13.1658 2.77225 12.9764 2.58316 12.7485 2.4517C12.5206 2.32024 12.2622 2.25104 11.9991 2.25104C11.736 2.25104 11.4775 2.32024 11.2496 2.4517C11.0217 2.58316 10.8324 2.77225 10.7006 3L8.53125 6.75"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
							</g>
							<defs>
								<clipPath id="clip0_2370_1244"><rect width="24" height="24" fill="white"></rect></clipPath>
							</defs>
							</svg>
							<p
							class="text-base font-medium text-center text-black"
							>
							0% odpadów
							</p>
						</div>
						<?php endif; ?>

						<?php if ( $benefit_odor_absorption ) : ?>
						<div class="flex flex-col justify-center items-center self-stretch grow relative gap-4 p-3 xl2:p-6 rounded-lg border border-medium-grey max-h-56.25" >
							<svg
							width="24"
							height="24"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							class="grow-0 shrink-0  w-6 h-6 relative"
							preserveAspectRatio="xMidYMid meet"
							>
							<g clip-path="url(#clip0_2370_1252)">
								<path
								d="M12 21.75V16.5"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M4.5 5.25C6.48912 5.25 8.39678 6.04018 9.8033 7.4467C11.2098 8.85322 12 10.7609 12 12.75V16.5C10.0109 16.5 8.10322 15.7098 6.6967 14.3033C5.29018 12.8968 4.5 10.9891 4.5 9V5.25Z"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M12 16.5V12.75C12 10.7609 12.7902 8.85322 14.1967 7.4467C15.6032 6.04018 17.5109 5.25 19.5 5.25V9C19.5 10.9891 18.7098 12.8968 17.3033 14.3033C15.8968 15.7098 13.9891 16.5 12 16.5Z"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M7.5 19.5L12 21.75L16.5 19.5"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
								<path
								d="M8.13281 6.1875C9.37312 3.5625 11.9981 2.25 11.9981 2.25C11.9981 2.25 14.6231 3.5625 15.8634 6.1875"
								stroke="#3CB64A"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								></path>
							</g>
							<defs>
								<clipPath id="clip0_2370_1252"><rect width="24" height="24" fill="white"></rect></clipPath>
							</defs>
							</svg>
							<p class="text-base font-medium text-center text-typo">Pochłania nieprzyjemne zapachy</p>
						</div>
						<?php endif; ?>

					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php
				$how_it_works = get_field('product-use');
				$advantages = get_field('product-advantage');
				$card = get_field('product-card');
			?>

			<div class="mb-15 flex gap-4 max-w-210 mx-auto flex-wrap lg:flex-nowrap">
				<div class="w-78 shrink-0">
					<div class="flex flex-col justify-start items-start grow-0 shrink-0 w-[312px] gap-4 lg:gap-6">
							
						<?php if( !empty($how_it_works) ): ?>
						<div class="product-content-tab cursor-pointer flex justify-start items-center self-stretch grow-0 shrink-0 relative gap-2 active" data-target="#product-use">
							<svg
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
									class="grow-0 shrink-0 w-6 h-6 relative"
									preserveAspectRatio="xMidYMid meet"
									>
									<g clip-path="url(#clip0_2370_2549)">
										<path 
										d="M3.75 12H20.25"
										stroke="black"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										></path>
										<path class="line hidden"
										d="M12 3.75V20.25"
										stroke="black"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										></path>
									</g>
									<defs>
										<clipPath id="clip0_2370_2549"><rect width="24" height="24" fill="white"></rect></clipPath>
									</defs>
							</svg>
							<p class="grow-0 shrink-0 text-xl lg:text-2xl font-medium text-left text-accent-dark">Sposób użycia</p>
						</div>
						<?php endif; ?>

						<?php if( !empty($advantages) ): ?>
						<div class="product-content-tab cursor-pointer flex justify-start items-center self-stretch grow-0 shrink-0 relative gap-2" data-target="#product-advantages">
							<svg
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
									class="grow-0 shrink-0 w-6 h-6 relative"
									preserveAspectRatio="xMidYMid meet"
									>
									<g clip-path="url(#clip0_2370_2554)">
										<path
										d="M3.75 12H20.25"
										stroke="black"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										></path>
										<path
										class="line" 
										d="M12 3.75V20.25"
										stroke="black"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										></path>
									</g>
									<defs>
										<clipPath id="clip0_2370_2554"><rect width="24" height="24" fill="white"></rect></clipPath>
									</defs>
							</svg>
							<p class="grow-0 shrink-0 text-xl lg:text-2xl font-medium text-left text-typo">Zalety produktu</p>
						</div>
						<?php endif; ?>

						<?php if( !empty($card) ): ?>
						<div class="product-content-tab cursor-pointer flex justify-start items-center self-stretch grow-0 shrink-0 relative gap-2" data-target="#product-card">
							<svg
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
									class="grow-0 shrink-0 w-6 h-6 relative"
									preserveAspectRatio="xMidYMid meet"
									>
									<g clip-path="url(#clip0_2370_2549)">
										<path
										d="M3.75 12H20.25"
										stroke="black"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										></path>
										<path
										class="line" 
										d="M12 3.75V20.25"
										stroke="black"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										></path>
									</g>
									<defs>
										<clipPath id="clip0_2370_2549"><rect width="24" height="24" fill="white"></rect></clipPath>
									</defs>
							</svg>
							<p class="grow-0 shrink-0 text-xl lg:text-2xl font-medium text-left text-typo">Karta produktu</p>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="products-tabs-content">
				
					<div id="product-use" class=""><?php echo $how_it_works ?? ''; ?></div>
					<div id="product-advantages" class="hidden"><?php echo $advantages ?? ''; ?></div>
					<div id="product-card" class="hidden"><?php echo $card ?? ''; ?></div>
				
				</div>

				<script>

					const productTabs = document.querySelectorAll('.product-content-tab');
					console.log(productTabs);

					if (productTabs) {
						productTabs.forEach((tab) => {
							tab.addEventListener('click', () => {
								productTabs.forEach((tab) => {
									tab.classList.remove('active');
									tab.querySelector('svg .line').classList.remove('hidden');
								});
								tab.classList.add('active');
								tab.querySelector('svg .line').classList.add('hidden');

								const target = tab.dataset.target;
								const content = document.querySelector(target);
								const contents = document.querySelectorAll('.products-tabs-content > div');
								contents.forEach((content) => {
									content.classList.add('hidden');
									
								});
								content.classList.remove('hidden');
								
							});
						});
					}
					




				</script>
			</div>
		</div>
	</section>

	
	<!-- Related products -->
	<section class="pb-10 lg:pb-30">
		<div class="container-content">
			<h2 class="justify-start text-black text-5xl font-semibold leading-[52.80px] mb-10">
				Inni kupili
			</h2>
		</div>

		<?php $related_ids = wc_get_related_products( $product->get_id(), 12 );

			if ( ! empty( $related_ids ) ) :
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => -1,
					'post__in'       => $related_ids,
					'orderby'        => 'rand'
				);

				$related_loop = new WP_Query($args);
			?>

			<div class="swiper products-swiper px-6 relative !pb-4">
				<div class="swiper-wrapper relative pt-1">
					<?php while ( $related_loop->have_posts() ) : $related_loop->the_post(); 
                        global $product;
                        $product = wc_get_product( get_the_ID() );
                        if ( ! $product ) {
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

						<div class="swiper-slide !w-72 !h-90 p-6 relative bg-white rounded-3xl shadow-[0px_0px_10px_0px_RGBA(0,0,0,0.08)] inline-flex flex-col justify-center items-start gap-4 group duration-500">
							<?php
							$badges = function_exists( 'raypath_get_product_badges' ) ? raypath_get_product_badges( $product ) : array();

							if ( ! empty( $badges ) ) :
								?>
								<div class="product-badges flex flex-col gap-2 absolute top-6 left-6 z-10">
									<?php echo implode( '', $badges ); ?>
								</div>
							<?php endif; ?>

							<div class="self-stretch h-42 rounded-2xl overflow-hidden mb-4 transition-all duration-500 group-hover:h-24 block">
								<a href="<?php the_permalink(); ?>">
									<img class="w-full h-full object-contain" src="<?php echo get_the_post_thumbnail_url(); ?>" />
								</a>
							</div>

							<a href="<?php the_permalink(); ?>" class="self-stretch flex flex-col justify-start items-start gap-4">

								<div class="self-stretch h-12 justify-start text-black text-base leading-6 mb-4">
									<h3 class="text-base/[160%] font-normal">
										<a href="<?php the_permalink(); ?>" class="line-clamp-2">
											<?php echo get_the_title(); ?>
										</a>
									</h3>
								</div>

								<div class="product-price self-stretch justify-start text-black text-2xl font-medium leading-7">
									<?php echo wp_kses_post( $price_html ); ?>
								</div>

							</a>

                            <div class="absolute bottom-6 left-0 right-0 transition-all duration-300 ease-in-out opacity-0 px-6 group-hover:opacity-100">
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

					<?php endwhile; wp_reset_postdata(); ?>
				</div>

				<!-- ARROWS -->
				<div class="swiper-button-prev !z-[99999]">
					<svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.78122 15.2198C8.8509 15.2895 8.90617 15.3722 8.94388 15.4632C8.9816 15.5543 9.00101 15.6519 9.00101 15.7504C9.00101 15.849 8.9816 15.9465 8.94388 16.0376C8.90617 16.1286 8.8509 16.2114 8.78122 16.281C8.71153 16.3507 8.62881 16.406 8.53776 16.4437C8.44672 16.4814 8.34914 16.5008 8.25059 16.5008C8.15204 16.5008 8.05446 16.4814 7.96342 16.4437C7.87237 16.406 7.78965 16.3507 7.71996 16.281L0.219965 8.78104C0.150232 8.71139 0.0949136 8.62867 0.0571704 8.53762C0.0194272 8.44657 0 8.34898 0 8.25042C0 8.15186 0.0194272 8.05426 0.0571704 7.96321C0.0949136 7.87216 0.150232 7.78945 0.219965 7.71979L7.71996 0.219792C7.8607 0.0790615 8.05157 0 8.25059 0C8.44961 0 8.64048 0.0790615 8.78122 0.219792C8.92195 0.360523 9.00101 0.551394 9.00101 0.750417C9.00101 0.94944 8.92195 1.14031 8.78122 1.28104L1.8109 8.25042L8.78122 15.2198Z" fill="#286D2E"/>
					</svg>
				</div>

				<div class="swiper-button-next !z-[99999]">
					<svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.78104 8.78104L1.28104 16.281C1.21136 16.3507 1.12863 16.406 1.03759 16.4437C0.946545 16.4814 0.848963 16.5008 0.750417 16.5008C0.651871 16.5008 0.554289 16.4814 0.463245 16.4437C0.3722 16.406 0.289474 16.3507 0.219792 16.281C0.150109 16.2114 0.0948337 16.1286 0.0571218 16.0376C0.0194098 15.9465 0 15.849 0 15.7504C0 15.6519 0.0194098 15.5543 0.0571218 15.4632C0.0948337 15.3722 0.150109 15.2895 0.219792 15.2198L7.1901 8.25042L0.219792 1.28104C0.0790612 1.14031 0 0.94944 0 0.750417C0 0.551394 0.0790612 0.360523 0.219792 0.219792C0.360522 0.0790615 0.551394 0 0.750417 0C0.94944 0 1.14031 0.0790615 1.28104 0.219792L8.78104 7.71979C8.85077 7.78945 8.90609 7.87216 8.94384 7.96321C8.98158 8.05426 9.00101 8.15186 9.00101 8.25042C9.00101 8.34898 8.98158 8.44657 8.94384 8.53762C8.90609 8.62867 8.85077 8.71139 8.78104 8.78104Z" fill="#286D2E"/>
					</svg>
				</div>

			</div>
		<?php endif; ?>


		</section>

	</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<script>

document.addEventListener('DOMContentLoaded', function () {
  const selects = document.querySelectorAll('.variation-field__select');

  selects.forEach(function (select) {
    // Ukryj natywny select (zrób do tego też CSS)
    select.classList.add('variation-field__select--hidden');

    const wrapper = document.createElement('div');
    wrapper.className = 'custom-dropdown';

    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'custom-dropdown__toggle';
    button.textContent = select.options[select.selectedIndex]?.text || select.getAttribute('data-placeholder') || 'Wybierz';

    const list = document.createElement('ul');
    list.className = 'custom-dropdown__list';

    Array.from(select.options).forEach(function (option) {
      const li = document.createElement('li');
      li.className = 'custom-dropdown__option';
      li.textContent = option.text;
      li.dataset.value = option.value;

      if (option.selected) {
        li.classList.add('is-selected');
      }

      li.addEventListener('click', function () {
        // ustaw wartość na ukrytym select
        select.value = li.dataset.value;
        select.dispatchEvent(new Event('change', { bubbles: true }));

        // update UI
        button.textContent = li.textContent;
        list.querySelectorAll('.custom-dropdown__option').forEach(function (el) {
          el.classList.toggle('is-selected', el === li);
        });

        wrapper.classList.remove('is-open');
      });

      list.appendChild(li);
    });

    button.addEventListener('click', function () {
      wrapper.classList.toggle('is-open');
    });

    // wstaw nowy dropdown przed selectem
    wrapper.appendChild(button);
    wrapper.appendChild(list);
    select.parentNode.insertBefore(wrapper, select);
  });
});

</script>
