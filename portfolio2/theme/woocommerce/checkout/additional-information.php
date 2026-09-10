<?php
/**
 * Additional information (order notes)
 *
 * This template is loaded from the theme to provide the order notes block
 * inside the checkout form.
 *
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_order_notes', $checkout );

if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

	<div class="woocommerce-additional-fields__field-wrapper">
		<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
		<?php endforeach; ?>
	</div>

<?php endif;

do_action( 'woocommerce_after_order_notes', $checkout );

