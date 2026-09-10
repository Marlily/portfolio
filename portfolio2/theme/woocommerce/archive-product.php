<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<?php
if ( is_shop() ) {
    $hero_title = 'Sklep';
} elseif ( is_product_category() ) {
    $hero_title = single_cat_title( '', false );
} else {
    $hero_title = woocommerce_page_title( false );
}
?>

<?php echo get_template_part(
    'template-parts/layout/hero',
    '',
    array(
        'title' => $hero_title,
        'img'   => get_template_directory_uri() . '/img/temp/shop-hero.jpg'
    )
); ?>

<div class="container-content mb-30">
     <nav class="breadcrumbs flex gap-4 pt-6 lg:pt-10 pb-6 items-center">
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

        <span class="text-typo text-[0.875rem]/[140%] font-medium">Sklep</span>
    </nav>


	<div class="shop-wrapper flex gap-8 flex-col lg:flex-row">

		<button id="filters-btn" class="btn-transparent w-full inline-flex lg:hidden mt-6">Filtry i sortowanie</button>

		<!-- LEWA KOLUMNA → FILTRY -->
		<aside class="w-full lg:w-[17.6rem] lg:max-w-[17.6rem] shrink-0 px-[3.06rem] lg:px-0 hidden lg:block">

			<div class="hidden lg:flex gap-4 justify-between items-center py-[1.06rem] border-b border-medium-grey mb-4 order-2">
				<h3 class="text-lg/[140%] font-semibold text-typo">Filtry</h3>
				<button class="my-reset-button bapf_reset text-base/[140%] font-medium text-accent-dark cursor-pointer">Wyczyść wszystkie</button>
			</div>

			<!-- filter plugin -->
			<?php echo do_shortcode( '[br_filter_single filter_id=161]' ); ?>

			<!-- mobile sorting -->
			<div id="mobile-sorting"></div>
		
		</aside>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const filtersBtn = document.querySelector('#filters-btn');

				filtersBtn.addEventListener('click', () => {
					const aside = document.querySelector('aside');
					aside.classList.toggle('hidden');
				})

			})
		</script>

		<!-- PRAWA KOLUMNA → PRODUKTY -->
		<main class="shop-products lg:w-[calc(100%-17.6rem-2rem)]">
			<?php
				do_action( 'woocommerce_before_main_content' );


				do_action( 'woocommerce_before_shop_loop' ); ?>

				<div class="my-8">
					<p>Jeśli szukasz rozwiązań, które nie tylko skutecznie usuwają zanieczyszczenia, ale także dbają o planetę, to trafiłeś we właściwe miejsce. Środki czyszczące Raypath z nanocząsteczkami srebra to rewolucyjne produkty, które nie tylko spełniają oczekiwania dotyczące wydajności, ale są również przyjazne dla środowiska.</p>
				</div>

				<?php woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) { ?>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php
					while ( have_posts() ) {
						the_post(); 

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
						
							<div class="product-card p-6 text-start h-90 relative bg-white rounded-3xl shadow-[0px_0px_10px_0px_rgba(0,0,0,0.08)] flex flex-col justify-start items-start gap-4 group" data-wishlist-item>
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
							
								<a href="<?php the_permalink(); ?>" class="product-card-img-wrapper self-stretch h-42 rounded-2xl overflow-hidden mb-4 transition-all group-hover:h-24 block">
            						<?php echo $product->get_image('large'); ?>
								</a>
								<a href="<?php the_permalink(); ?>"><h3 class="text-base/[160%] font-normal mb-2 line-clamp-2"><?php the_title(); ?></h3></a>
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
						
					<?php } ?>
					</div>

					<!-- navigation -->

					<?php
						global $wp_query;

						$big = 999999999; 
						$pagination = paginate_links( array(
							'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'    => '?paged=%#%',
							'current'   => max( 1, get_query_var('paged') ),
							'total'     => $wp_query->max_num_pages,
							'type'      => 'array',
							'prev_text' => __('&laquo; Previous'),
							'next_text' => __('Next &raquo;'),
						) );

						if ( $pagination ) : ?>
							<ul class="gap-2 grid grid-cols-3 items-center pt-5 border-t border-medium-grey mt-8">

								<!-- Poprzednia -->
								<li class="flex justify-start">
									<?php if ( get_previous_posts_link() ) : ?>
										<?php previous_posts_link('<span class="flex items-center gap-[0.6rem] text-accent-dark font-medium text-base/[140%]"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><g clip-path="url(#clip0_prev)"><path d="M16.875 10H3.125" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.75 4.375L3.125 10L8.75 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_prev"><rect width="20" height="20" fill="white"/></clipPath></defs></svg> Poprzednia</span>'); ?>
									<?php endif; ?>
								</li>

								<!-- Numery stron -->
								<li class="flex justify-center gap-[0.12rem]">
									<?php foreach ( $pagination as $page ) : 
										if ( strpos($page,'prev') !== false || strpos($page,'next') !== false ) continue; ?>
										<span class="pagination-item"><?php echo $page; ?></span>
									<?php endforeach; ?>
								</li>

								<!-- Następna -->
								<li class="flex justify-end">
									<?php if ( get_next_posts_link() ) : ?>
										<?php next_posts_link('<span class="flex items-center gap-[0.6rem] text-accent-dark font-medium text-base/[140%]">Następna <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><g clip-path="url(#clip0_next)"><path d="M3.125 10H16.875" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_next"><rect width="20" height="20" fill="white"/></clipPath></defs></svg></span>'); ?>
									<?php endif; ?>
								</li>

							</ul>
						<?php endif; ?>


				<?php }

				
				do_action( 'woocommerce_after_main_content' );
			?>
		</main>

	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const orderby = document.querySelector('.woocommerce-ordering');
			const sorting = document.querySelector('#mobile-sorting');

			if (!orderby || !sorting) {
				return;
			}

			const originalParent = orderby.parentElement;
			const originalNextSibling = orderby.nextElementSibling;

			const moveToMobile = () => {
				if (sorting.contains(orderby)) return;
				orderby.remove();
				sorting.innerHTML = '';
				sorting.appendChild(orderby);
			};

			const moveToDesktop = () => {
				if (originalParent.contains(orderby)) return;
				orderby.remove();
				if (originalNextSibling && originalParent.contains(originalNextSibling)) {
					originalParent.insertBefore(orderby, originalNextSibling);
				} else {
					originalParent.appendChild(orderby);
				}
			};

			const syncOrderbyPosition = () => {
				if (window.innerWidth < 1024) {
					moveToMobile();
				} else {
					moveToDesktop();
				}
			};

			syncOrderbyPosition();
			window.addEventListener('resize', syncOrderbyPosition);
		});
	</script>

</div>



<?php get_footer( 'shop' ); ?>
