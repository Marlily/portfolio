<?php
/**
 * Template Name: Ulubione produkty
 *
 * @package raypathsklep
 */

get_header();

$wishlist_ids = function_exists( 'raypath_get_wishlist_ids' ) ? raypath_get_wishlist_ids() : array();

echo get_template_part(
	'template-parts/layout/hero',
	'',
	array(
		'title'        => 'Ulubione produkty',
		'img'          => get_template_directory_uri() . '/img/temp/shop-hero.jpg'
	)
);
?>

<main class="py-10 lg:py-30">
	<div class="container-content">
		<?php if ( empty( $wishlist_ids ) ) : ?>
			<p class="text-typo text-base/[160%] lg:text-lg/[160%] font-medium">
				Nie masz jeszcze ulubionych produktów. Dodaj coś z listy produktów, a pojawi się tutaj.
			</p>
		<?php else : ?>
			<?php
			$query = new WP_Query(
				array(
					'post_type'      => 'product',
					'post__in'       => $wishlist_ids,
					'orderby'        => 'post__in',
					'posts_per_page' => -1,
				)
			);
			?>

			<?php if ( $query->have_posts() ) : ?>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();

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
							$min_price  = $product->get_variation_price( 'min', true );
							$max_price  = $product->get_variation_price( 'max', true );
							$price_html = ( $min_price !== $max_price )
								? wc_price( $min_price ) . ' - ' . wc_price( $max_price )
								: wc_price( $min_price );
						}
						?>

						<div class="product-card p-6 text-start h-full relative bg-white rounded-3xl shadow-[0px_0px_10px_0px_rgba(0,0,0,0.08)] flex flex-col justify-start items-start gap-4 group !h-90" data-wishlist-item>
							<?php
							$badges = function_exists( 'raypath_get_product_badges' ) ? raypath_get_product_badges( $product ) : array();

							if ( ! empty( $badges ) ) :
								?>
								<div class="product-badges flex flex-col gap-2 absolute top-6 left-6 z-10">
									<?php echo implode( '', $badges ); ?>
								</div>
							<?php endif; ?>

							<button class="wishlist-remove-btn absolute top-6 right-6 cursor-pointer" type="button" data-wishlist-product-id="<?php echo esc_attr( $product->get_id() ); ?>" data-wishlist-intent="remove" aria-label="Usuń z ulubionych">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/img/trash.svg' ); ?>" alt="">
							</button>

							<a href="<?php the_permalink(); ?>" class="product-card-img-wrapper self-stretch h-42 rounded-2xl overflow-hidden mb-4 transition-all group-hover:h-24 block">
								<?php echo $product->get_image( 'large' ); ?>
							</a>
							<a href="<?php the_permalink(); ?>"><h3 class="text-base/[160%] font-normal mb-2"><?php the_title(); ?></h3></a>
							<a href="<?php the_permalink(); ?>" class="product-price text-black text-2xl font-medium">
								<?php echo wp_kses_post( $price_html ); ?>
							</a>
							<div class="absolute bottom-6 left-0 right-0 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 px-6">
								<a href="<?php echo esc_url( $button_url ); ?>" class="<?php echo esc_attr( $button_classes ); ?>"<?php echo $button_attrs; ?>>
									<svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
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
					<?php endwhile; ?>
				</div>
				<div id="wishlist-empty-state" class="hidden text-typo text-base/[160%] lg:text-lg/[160%] mt-6">
					Nie masz jeszcze ulubionych produktów. Dodaj coś z listy produktów, a pojawi się tutaj.
				</div>
			<?php else : ?>
				<p class="text-typo text-base/[160%] lg:text-lg/[160%]">
					Nie znaleziono produktów.
				</p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
