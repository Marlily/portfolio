<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">

	<div class="checkout-wrapper flex flex-col lg:flex-row gap-8 lg:items-start">
		
		<!-- Lewa kolumna: Formularz -->
		<div class="checkout-form-column grow flex flex-col gap-6">
			<?php if ( $checkout->get_checkout_fields() ) : ?>

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<!-- 1. Blok danych płatności -->
				<div class="checkout-block border border-medium-grey p-10 rounded-3xl relative">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>

				<!-- 2. Blok dane do wysyłki (przełącznik + adres) -->
				<?php if ( WC()->cart->needs_shipping_address() ) : ?>
				<div class="checkout-block border border-medium-grey p-10 rounded-3xl relative">
					<h3 class="text-[2rem]/[120%] font-medium mb-6 text-typo"><?php esc_html_e( 'Dane do wysyłki', 'woocommerce' ); ?></h3>
					<?php wc_get_template( 'checkout/ship-to-different-address.php', array( 'checkout' => $checkout ) ); ?>
					<div class="mt-4">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>
				<?php endif; ?>

				<!-- 2. Blok metody dostawy -->
				<div class="checkout-block border border-medium-grey p-10 rounded-3xl relative">
					
					<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
						<h3 class="text-[2rem]/[120%] font-medium mb-6 text-typo"><?php esc_html_e( 'Metoda dostawy', 'woocommerce' ); ?></h3>
						<?php wc_cart_totals_shipping_html(); ?>
					<?php endif; ?>
				</div>

				<!-- 3. Blok metody płatności -->
				<div class="checkout-block border border-medium-grey p-10 rounded-3xl relative">
					<h3 class="text-[2rem]/[120%] font-medium mb-6 text-typo"><?php esc_html_e( 'Metoda płatności', 'woocommerce' ); ?></h3>
					<?php
					$available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
					wc_get_template( 'checkout/payment.php', array( 'checkout' => $checkout, 'available_gateways' => $available_gateways, 'order_button_text' => apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) ) ) );
					?>
				</div>

				<!-- 4. Blok uwagi do zamówienia -->
				<div class="checkout-block border border-medium-grey p-10 rounded-3xl relative">
					<h3 class="text-[2rem]/[120%] font-medium mb-6 text-typo"><?php esc_html_e( 'Uwagi do zamówienia', 'woocommerce' ); ?></h3>
					<?php wc_get_template( 'checkout/additional-information.php', array( 'checkout' => $checkout ) ); ?>
				</div>

			<?php endif; ?>
		</div>

		<!-- Prawa kolumna: Podsumowanie -->
		<div class="checkout-summary-column w-full lg:w-101.25 shrink-0 border border-medium-grey p-10 rounded-3xl">
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			
			<h2>Podsumowanie</h2>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php wc_get_template( 'checkout/review-order.php' ); ?>
			</div>

			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>

	</div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
