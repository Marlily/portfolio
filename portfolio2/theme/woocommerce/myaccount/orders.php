<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.5.0
 */

defined( 'ABSPATH' ) || exit;

$wp_button_class = isset( $wp_button_class ) ? $wp_button_class : '';

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php
if ( $has_orders ) :
	$status_styles = array(
		'pending'    => array(
			'label' => __( 'Oczekujące', 'woocommerce' ),
			'class' => 'bg-[#FFECEC] text-[#D50000]',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_2448_4665)">
    <path d="M11.1246 3.14219L17.9575 15.007C18.4364 15.843 17.8176 16.875 16.8317 16.875H3.16605C2.18011 16.875 1.56136 15.843 2.04026 15.007L8.87308 3.14219C9.36526 2.28594 10.6325 2.28594 11.1246 3.14219Z" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10 11.25V8.125" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10 15C10.5178 15 10.9375 14.5803 10.9375 14.0625C10.9375 13.5447 10.5178 13.125 10 13.125C9.48223 13.125 9.0625 13.5447 9.0625 14.0625C9.0625 14.5803 9.48223 15 10 15Z" fill="#D50000"/>
  </g>
  <defs>
    <clipPath id="clip0_2448_4665">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>',
		),
		'processing' => array(
			'label' => __( 'W trakcie realizacji', 'woocommerce' ),
			'class' => 'bg-medium-grey text-grey',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_2448_4709)">
    <path d="M14.375 6.25H17.7016C17.8261 6.24994 17.9478 6.28709 18.0511 6.35669C18.1544 6.42629 18.2345 6.52517 18.2812 6.64063L19.375 9.375" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M1.875 11.25H14.375" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M15 16.875C16.0355 16.875 16.875 16.0355 16.875 15C16.875 13.9645 16.0355 13.125 15 13.125C13.9645 13.125 13.125 13.9645 13.125 15C13.125 16.0355 13.9645 16.875 15 16.875Z" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M6.25 16.875C7.28553 16.875 8.125 16.0355 8.125 15C8.125 13.9645 7.28553 13.125 6.25 13.125C5.21447 13.125 4.375 13.9645 4.375 15C4.375 16.0355 5.21447 16.875 6.25 16.875Z" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M13.125 15H8.125" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M14.375 9.375H19.375V14.375C19.375 14.5408 19.3092 14.6997 19.1919 14.8169C19.0747 14.9342 18.9158 15 18.75 15H16.875" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M4.375 15H2.5C2.33424 15 2.17527 14.9342 2.05806 14.8169C1.94085 14.6997 1.875 14.5408 1.875 14.375V5.625C1.875 5.45924 1.94085 5.30027 2.05806 5.18306C2.17527 5.06585 2.33424 5 2.5 5H14.375V13.232" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_2448_4709">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>',
		),
		'completed'  => array(
			'label' => __( 'Zrealizowane', 'woocommerce' ),
			'class' => 'bg-[#DFE9E0] text-[#3CB64A]',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
  <path d="M6.42833 13.57C6.1001 13.5706 5.77499 13.5064 5.47167 13.3809C5.16834 13.2555 4.89279 13.0714 4.66083 12.8392L0 8.17917L1.17833 7L5.83917 11.6608C5.99544 11.8171 6.20736 11.9048 6.42833 11.9048C6.6493 11.9048 6.86123 11.8171 7.0175 11.6608L18.6783 0L19.8567 1.17833L8.19583 12.8392C7.96388 13.0714 7.68832 13.2555 7.385 13.3809C7.08168 13.5064 6.75656 13.5706 6.42833 13.57Z" fill="#3CB64A"/>
</svg>',
		),
		'on-hold'    => array(
			'label' => __( 'Wstrzymane', 'woocommerce' ),
			'class' => 'bg-medium-grey text-grey',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_2448_4665)">
    <path d="M11.1246 3.14219L17.9575 15.007C18.4364 15.843 17.8176 16.875 16.8317 16.875H3.16605C2.18011 16.875 1.56136 15.843 2.04026 15.007L8.87308 3.14219C9.36526 2.28594 10.6325 2.28594 11.1246 3.14219Z" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10 11.25V8.125" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10 15C10.5178 15 10.9375 14.5803 10.9375 14.0625C10.9375 13.5447 10.5178 13.125 10 13.125C9.48223 13.125 9.0625 13.5447 9.0625 14.0625C9.0625 14.5803 9.48223 15 10 15Z" fill="#3A3A3A"/>
  </g>
  <defs>
    <clipPath id="clip0_2448_4665">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>',
		),
		'cancelled'  => array(
			'label' => __( 'Anulowane', 'woocommerce' ),
			'class' => 'bg-[#FFECEC] text-[#D50000]',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_2448_4610)">
    <path d="M15.625 4.375L4.375 15.625" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M15.625 15.625L4.375 4.375" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_2448_4610">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>',
		),
		'refunded'   => array(
			'label' => __( 'Zwrócone', 'woocommerce' ),
			'class' => 'bg-medium-grey text-grey',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.5 10a6.5 6.5 0 1111.553 3.743.75.75 0 101.292.744A8 8 0 102 10a.75.75 0 101.5 0z"/><path d="M9.28 6.72a.75.75 0 000 1.06L10.94 9.5H7.75a.75.75 0 000 1.5h3.19l-1.66 1.72a.75.75 0 001.08 1.04l3-3.1a.75.75 0 000-1.04l-3-3.1a.75.75 0 00-1.08 0z"/></svg>',
		),
		'failed'     => array(
			'label' => __( 'Nieudane', 'woocommerce' ),
			'class' => 'bg-[#FFECEC] text-[#D50000]',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_2448_4665)">
    <path d="M11.1246 3.14219L17.9575 15.007C18.4364 15.843 17.8176 16.875 16.8317 16.875H3.16605C2.18011 16.875 1.56136 15.843 2.04026 15.007L8.87308 3.14219C9.36526 2.28594 10.6325 2.28594 11.1246 3.14219Z" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10 11.25V8.125" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10 15C10.5178 15 10.9375 14.5803 10.9375 14.0625C10.9375 13.5447 10.5178 13.125 10 13.125C9.48223 13.125 9.0625 13.5447 9.0625 14.0625C9.0625 14.5803 9.48223 15 10 15Z" fill="#D50000"/>
  </g>
  <defs>
    <clipPath id="clip0_2448_4665">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>',
		),
		'default'    => array(
			'label' => __( 'W przygotowaniu', 'woocommerce' ),
			'class' => 'bg-medium-grey text-grey',
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_2448_4709)">
    <path d="M14.375 6.25H17.7016C17.8261 6.24994 17.9478 6.28709 18.0511 6.35669C18.1544 6.42629 18.2345 6.52517 18.2812 6.64063L19.375 9.375" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M1.875 11.25H14.375" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M15 16.875C16.0355 16.875 16.875 16.0355 16.875 15C16.875 13.9645 16.0355 13.125 15 13.125C13.9645 13.125 13.125 13.9645 13.125 15C13.125 16.0355 13.9645 16.875 15 16.875Z" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M6.25 16.875C7.28553 16.875 8.125 16.0355 8.125 15C8.125 13.9645 7.28553 13.125 6.25 13.125C5.21447 13.125 4.375 13.9645 4.375 15C4.375 16.0355 5.21447 16.875 6.25 16.875Z" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M13.125 15H8.125" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M14.375 9.375H19.375V14.375C19.375 14.5408 19.3092 14.6997 19.1919 14.8169C19.0747 14.9342 18.9158 15 18.75 15H16.875" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M4.375 15H2.5C2.33424 15 2.17527 14.9342 2.05806 14.8169C1.94085 14.6997 1.875 14.5408 1.875 14.375V5.625C1.875 5.45924 1.94085 5.30027 2.05806 5.18306C2.17527 5.06585 2.33424 5 2.5 5H14.375V13.232" stroke="#3A3A3A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_2448_4709">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>',
		),
	);

	$allowed_svg = array(
		'svg'  => array(
			'xmlns'        => true,
			'viewBox'      => true,
			'fill'         => true,
			'stroke'       => true,
			'stroke-width' => true,
			'stroke-linecap'   => true,
			'stroke-linejoin'  => true,
			'class'        => true,
			'width'        => true,
			'height'       => true,
			'aria-hidden'  => true,
		),
		'path' => array(
			'd'             => true,
			'fill'          => true,
			'stroke'        => true,
			'stroke-linecap'=> true,
			'stroke-linejoin'=> true,
			'stroke-width'  => true,
		),
	);
	?>

	<div class="woocommerce-orders-list flex flex-col gap-4">
		<?php foreach ( $customer_orders->orders as $customer_order ) :
			$order = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

			if ( ! $order ) {
				continue;
			}

			$created     = $order->get_date_created();
			$order_date  = $created ? wp_date( 'j F Y', $created->getTimestamp() ) : '';
			$status_key  = $order->get_status();
			$status_data = isset( $status_styles[ $status_key ] ) ? $status_styles[ $status_key ] : $status_styles['default'];

			$items_array  = array_values( $order->get_items() );
			$item_limit   = 3;
			$display_items = array_slice( $items_array, 0, $item_limit );
			$extra_items   = max( 0, count( $items_array ) - $item_limit );
			?>

			<div class="border border-medium-grey rounded-2xl p-4 md:p-6 flex flex-col gap-4">
				<div class="flex flex-col md:flex-row md:justify-between md:gap-8 gap-4">
					<div class="w-60 pr-6 border-r border-medium-grey">
						<?php if ( $order_date ) : ?>
							<p class="text-2xl/[120%] text-typo font-medium mb-0"><?php echo esc_html( $order_date ); ?></p>
						<?php endif; ?>

						<p class="text-base/[160%] text-typo font-normal mb-2">
							<?php
							printf(
								/* translators: %s: order number */
								esc_html__( 'Zamówienie nr %s', 'woocommerce' ),
								esc_html( $order->get_order_number() )
							);
							?>
						</p>

						<p class="text-lg/[140%] font-semibold mb-4 lg:mb-10 text-accent-dark"><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></p>

						<span class="inline-flex items-center gap-2 px-4 py-1 rounded-full text-base/[140%] font-medium <?php echo esc_attr( $status_data['class'] ); ?>">
							<?php if ( ! empty( $status_data['icon'] ) ) : ?>
								<span class="inline-block" aria-hidden="true">
									<?php echo wp_kses( $status_data['icon'], $allowed_svg ); ?>
								</span>
							<?php endif; ?>
							<span><?php echo esc_html( $status_data['label'] ); ?></span>
						</span>
					</div>

					<div class="flex-1">
						<div class="flex flex-col gap-4">
							<?php foreach ( $display_items as $item_id => $item ) :
								$product   = $item->get_product();
								$thumbnail = $product ? $product->get_image( 'woocommerce_thumbnail' ) : wc_placeholder_img( 'woocommerce_thumbnail' );
								?>
								<div class="flex items-center gap-6">
									<div class="w-25 h-25 shrink-0 overflow-hidden rounded-xl flex justify-center items-center border border-medium-grey bg-white">
										<?php echo wp_kses_post( $thumbnail ); ?>
									</div>
									<div class="flex flex-col gap-1">
										<p class="text-2xl/[120%] font-medium text-typo max-w-[20rem]"><?php echo esc_html( $item->get_name() ); ?></p>
										<p class="text-base/[140%] text-[#161616] font-medium">
											<?php
											$line_subtotal = $order->get_formatted_line_subtotal( $item );
											echo wp_kses(
												sprintf(
													/* translators: 1: quantity, 2: subtotal */
													__( '%1$s szt. x <span class="text-accent-dark">%2$s</span>', 'woocommerce' ),
													esc_html( $item->get_quantity() ),
													wp_kses_post( $line_subtotal )
												),
												array(
													'span' => array(
														'class' => true,
													),
												)
											);
											?>
										</p>
									</div>
								</div>
							<?php endforeach; ?>

							<?php if ( $extra_items > 0 ) : ?>
								<div class="w-25 h-25 flex items-center justify-center rounded-xl border border-medium-grey bg-white text-2xl font-medium text-grey">
									<?php echo esc_html( '+' . $extra_items ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="flex justify-end mt-4">
					<a class="woocommerce-button woocommerce-button--details woocommerce-Button button<?php echo esc_attr( $wp_button_class ); ?> btn-transparent" href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
						<?php esc_html_e( 'Szczegóły', 'woocommerce' ); ?>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<div class="flex flex-col justify-center items-center p-10 rounded-2xl bg-light-grey text-center">

      <svg
        width="40"
        height="40"
        viewBox="0 0 40 40"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        class="w-10 h-10 mb-2"
        preserveAspectRatio="xMidYMid meet"
      >
        <g clip-path="url(#clip0_2440_5461)">
          <path
            d="M20 33.75C27.5939 33.75 33.75 27.5939 33.75 20C33.75 12.4061 27.5939 6.25 20 6.25C12.4061 6.25 6.25 12.4061 6.25 20C6.25 27.5939 12.4061 33.75 20 33.75Z"
            stroke="#3CB64A"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
          <path
            d="M32.5 6.25L7.5 33.75"
            stroke="#3CB64A"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
        </g>
        <defs>
          <clipPath id="clip0_2440_5461">
            <rect width="40" height="40" fill="white"></rect>
          </clipPath>
        </defs>
      </svg>
      <h2 class="text-[32px] font-medium text-center text-black">
        Nic tutaj nie ma</h2>
      <p class="mb-8">
        Twoja lista zamówień jest pusta. Sprawdź nasze oferty. Jesteśmy pewni, że coś Cię
        zainteresuje!
      </p>
 
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-transparent">Sprawdź oferty</a>
    </div>
  </div>


<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
