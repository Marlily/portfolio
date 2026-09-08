<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 */

defined( 'ABSPATH' ) || exit;

$allowed_svg = array(
	'svg'  => array(
		'xmlns'    => true,
		'viewBox'  => true,
		'fill'     => true,
		'width'    => true,
		'height'   => true,
		'aria-hidden' => true,
	),
	'path' => array(
		'd'    => true,
		'fill' => true,
	),
);

$back_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$back_url = wc_get_endpoint_url( 'orders' );

$created            = $order->get_date_created();
$order_date_display = $created ? wp_date( 'j F Y', $created->getTimestamp() ) : '';

$billing_address  = $order->get_formatted_billing_address( esc_html_x( 'Brak danych', 'order billing address empty', 'woocommerce' ) );
$shipping_address = $order->get_formatted_shipping_address( esc_html_x( 'Brak danych', 'order shipping address empty', 'woocommerce' ) );

$invoice_company   = $order->get_meta( '_invoice_company' );
$invoice_nip       = $order->get_meta( '_invoice_nip' );
$invoice_address_1 = $order->get_meta( '_invoice_address_1' );
$invoice_postcode  = $order->get_meta( '_invoice_postcode' );
$invoice_city      = $order->get_meta( '_invoice_city' );
$invoice_country   = $order->get_meta( '_invoice_country' );

$invoice_address_parts = array();
if ( ! empty( $invoice_address_1 ) ) {
	$invoice_address_parts[] = $invoice_address_1;
}
if ( ! empty( $invoice_city ) || ! empty( $invoice_postcode ) ) {
	$invoice_address_parts[] = trim( $invoice_postcode . ' ' . $invoice_city );
}
if ( ! empty( $invoice_country ) ) {
	$countries = WC()->countries->get_countries();
	$invoice_address_parts[] = isset( $countries[ $invoice_country ] ) ? $countries[ $invoice_country ] : $invoice_country;
}
$invoice_address = ! empty( $invoice_address_parts ) ? implode( '<br/>', array_filter( $invoice_address_parts ) ) : '';
$has_invoice     = $invoice_company || $invoice_nip || $invoice_address;

$shipping_method        = $order->get_shipping_method();
$shipping_cost_raw      = (float) $order->get_shipping_total() + (float) $order->get_shipping_tax();
$shipping_cost_display  = $shipping_cost_raw > 0 ? wc_price( $shipping_cost_raw, array( 'currency' => $order->get_currency() ) ) : esc_html__( 'Darmowa', 'woocommerce' );
$payment_method_title   = $order->get_payment_method_title();

$items_total_raw = max( 0, (float) $order->get_subtotal() - (float) $order->get_discount_total() );
$items_total     = wc_price( $items_total_raw, array( 'currency' => $order->get_currency() ) );
$order_total     = wc_price( $order->get_total(), array( 'currency' => $order->get_currency() ) );

?>

<div class="border border-medium-grey rounded-xl p-5 md:p-8">
	<div class="flex items-center gap-2 mb-2">
		<a class="text-typo flex items-center gap-2" href="<?php echo esc_url( $back_url ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
			<g clip-path="url(#clip0_2448_5324)">
				<path d="M27 16H5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M14 7L5 16L14 25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</g>
			<defs>
				<clipPath id="clip0_2448_5324">
				<rect width="32" height="32" fill="white"/>
				</clipPath>
			</defs>
			</svg>
		</a>
		<h2 class="text-[2rem]/[120%] font-medium text-typo !mb-0">
			<?php
			printf(
				/* translators: %s: order number */
				esc_html__( 'Zamówienie nr %s', 'woocommerce' ),
				esc_html( $order->get_order_number() )
			);
			?>
		</h2>
	</div>

	<?php if ( $order_date_display ) : ?>
		<p class="text-lg text-typo font-medium mb-10"><?php printf( esc_html__( 'z dnia %s', 'woocommerce' ), esc_html( $order_date_display ) ); ?></p>
	<?php endif; ?>

	<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
		<div class="border-r border-medium-grey pb-4 lg:pb-[2.56rem]">
			<p class="text-2xl/[120%] font-medium text-typo mb-4"><?php esc_html_e( 'Dane płatności', 'woocommerce' ); ?></p>
			<div class="text-base/[160%] text-typo"><?php echo wp_kses_post( $billing_address ); ?></div>
			<?php if ( $order->get_billing_phone() ) : ?>
				<p class="text-base/[160%] text-typo mb-0"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
			<?php endif; ?>
			<?php if ( $order->get_billing_email() ) : ?>
				<p class="text-base/[160%] text-typo mb-0"><?php echo esc_html( $order->get_billing_email() ); ?></p>
			<?php endif; ?>
		</div>

		<div class="">
			<p class="text-2xl/[120%] font-medium text-typo mb-4"><?php esc_html_e( 'Dane wysyłki', 'woocommerce' ); ?></p>
			<div class="text-base/[160%] text-typo"><?php echo wp_kses_post( $shipping_address ); ?></div>
		</div>

		<div class="border-r border-medium-grey pb-4 lg:pb-[2.56rem]">
			<p class="text-2xl/[120%] font-medium text-typo mb-4"><?php esc_html_e( 'Dane do faktury', 'woocommerce' ); ?></p>
			<?php if ( $has_invoice ) : ?>
				<?php if ( $invoice_company ) : ?>
					<p class="text-base/[160%] text-typo mb-0"><?php echo esc_html( $invoice_company ); ?></p>
				<?php endif; ?>
				<?php if ( $invoice_nip ) : ?>
					<p class="text-base/[160%] text-typo mb-0"><?php echo esc_html( $invoice_nip ); ?></p>
				<?php endif; ?>
				<?php if ( $invoice_address ) : ?>
					<div class="text-base/[160%] text-typo"><?php echo wp_kses_post( $invoice_address ); ?></div>
				<?php endif; ?>
			<?php else : ?>
				<div class="text-base/[160%] text-typo">-</div>
			<?php endif; ?>
		</div>

		<div class="pb-4 lg:pb-[2.56rem]">
			<p class="text-2xl/[120%] font-medium text-typo mb-4"><?php esc_html_e( 'Dostawa i płatność', 'woocommerce' ); ?></p>
			<div class="flex items-center justify-between ">
				<span class="text-base/[160%] font-semibold text-typo"><?php echo $shipping_method ? esc_html( $shipping_method ) : esc_html__( 'Dostawa', 'woocommerce' ); ?></span>
				<span class="font-medium text-2xl/[120%] text-accent-dark"><?php echo wp_kses_post( $shipping_cost_display ); ?></span>
			</div>
			<?php if ( $payment_method_title ) : ?>
				<div class="font-semibold text-base/[180%]">
					<?php echo esc_html( $payment_method_title ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="py-8">
		<div class="flex flex-col gap-4">
			<?php foreach ( $order->get_items() as $item_id => $item ) :
				$product     = $item->get_product();
				$thumbnail   = $product ? $product->get_image( 'woocommerce_thumbnail' ) : wc_placeholder_img( 'woocommerce_thumbnail' );
				$qty         = $item->get_quantity();
				$unit_price  = $order->get_item_subtotal( $item, true, true );
				$line_total  = wc_price( $order->get_line_total( $item, true, true ), array( 'currency' => $order->get_currency() ) );
				?>
				<div class="flex items-center justify-between gap-4">
					<div class="flex items-center gap-6 min-w-0">
						<div class="w-25 h-25 overflow-hidden rounded-lg border border-medium-grey bg-white shrink-0 flex items-center justify-center">
							<?php echo wp_kses_post( $thumbnail ); ?>
						</div>
						<div class="flex flex-col gap-1 min-w-0 pr-4">
							<p class="text-2xl/[120%] font-medium text-typo truncate mb-2"><?php echo esc_html( $item->get_name() ); ?></p>
							<p class="text-base/[140%] text-accent-dark font-medium"><?php echo wp_kses_post( wc_price( $unit_price, array( 'currency' => $order->get_currency() ) ) ); ?></p>
						</div>
					</div>
					<div class="flex lg:w-40 items-center">
						<div class="w-1/2 text-base/[140%] font-medium text-typo"><?php printf( esc_html__( '%s szt.', 'woocommerce' ), esc_html( $qty ) ); ?></div>
						<div class="w-1/2 text-end text-base/[140%] font-medium text-accent-dark"><?php echo wp_kses_post( $line_total ); ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="">
		<div class="border-t border-medium-grey py-6">
			<div class="flex items-center justify-between text-base text-typo mb-[0.69rem]">
				<span class="text-typo font-normal text-base/[140%]"><?php esc_html_e( 'Wartość zamówienia', 'woocommerce' ); ?></span>
				<span class="font-medium text-accent-dark text-2xl/[120%]"><?php echo wp_kses_post( $items_total ); ?></span>
			</div>
			<div class="flex items-center justify-between text-base text-typo mt-2">
				<span class="text-typo font-normal text-base/[140%]"><?php esc_html_e( 'Koszt dostawy', 'woocommerce' ); ?></span>
				<span class="font-medium text-accent-dark text-2xl/[120%]"><?php echo wp_kses_post( $shipping_cost_display ); ?></span>
			</div>
		</div>

		<div class="border-t border-medium-grey pt-3">
			<div class="flex items-center justify-between text-lg font-semibold text-typo">
				<span class="font-medium text-typo text-lg/[140%]"><?php esc_html_e( 'Razem', 'woocommerce' ); ?></span>
				<span class="font-medium text-accent-dark text-[2rem]/[120%]"><?php echo wp_kses_post( $order_total ); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="flex flex-col lg:flex-row justify-start items-center gap-4 p-10 rounded-2xl bg-light-grey mt-6">
  <div class="flex flex-col justify-start items-start grow relative gap-2">
    <p class="text-lg font-semibold text-left text-[#3a3a3a]">
      Masz problem z tym zamówieniem?
    </p>
  </div>
  <a href="<?php echo home_url() ?>/kontakt" class="btn-transparent">
	Skontaktuj się z nami
  </a>
</div>


