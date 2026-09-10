<?php
/**
 * Ship to a different address toggle (separate block)
 *
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

if ( true !== WC()->cart->needs_shipping_address() ) {
	return;
}
?>

<h3 id="ship-to-different-address">
	<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
		<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( 'Ship to a different address?', 'woocommerce' ); ?></span>
	</label>
</h3>

