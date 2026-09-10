<?php
/**
 * Review order table
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="checkout-review-order-wrapper woocommerce-checkout-review-order-table">

	<!-- Miniatury produktów -->
	<div class="checkout-products-preview mb-6">
		<div class="flex gap-2">
			<?php
			$cart_items = WC()->cart->get_cart();
			$items_count = count( $cart_items );
			$displayed_items = 0;
			
			foreach ( $cart_items as $cart_item_key => $cart_item ) {
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
					$displayed_items++;
					
					if ( $displayed_items <= 2 ) {
						// Pokaż miniatury pierwszych 2 produktów
						$thumbnail = $_product->get_image( array( 100, 100 ) );
						?>
						<div class="w-[100px] h-[100px] rounded-lg overflow-hidden border border-medium-grey shrink-0">
							<?php echo wp_kses_post( $thumbnail ); ?>
						</div>
						<?php
					} elseif ( $displayed_items === 3 && $items_count > 2 ) {
						// Pokaż kwadrat z +X dla pozostałych produktów
						$remaining = $items_count - 2;
						?>
						<div class="w-[100px] h-[100px] rounded-lg border border-medium-grey flex items-center justify-center bg-light-grey shrink-0">
							<span class="text-typo font-semibold text-lg">+<?php echo esc_html( $remaining ); ?></span>
						</div>
						<?php
						break; // Nie pokazuj więcej
					}
				}
			}
			?>
		</div>
	</div>

	<!-- Podsumowanie cen -->
	<div class="checkout-totals mb-6">
		<div class="flex justify-between items-center mb-3">
			<span class="text-typo"><?php esc_html_e( 'Wartość koszyka', 'woocommerce' ); ?></span>
			<span class="summary-amount text-accent-dark font-medium"><?php wc_cart_totals_subtotal_html(); ?></span>
		</div>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			<div class="flex justify-between items-center mb-3">
				<span class="text-typo"><?php esc_html_e( 'Koszt dostawy', 'woocommerce' ); ?></span>
				<?php
				$shipping_total = WC()->cart->get_cart_shipping_total(); // formatted with currency
				?>
				<span class="summary-amount text-accent-dark font-medium"><?php echo wp_kses_post( $shipping_total ); ?></span>
			</div>
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		<?php endif; ?>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="flex justify-between items-center mb-3">
				<span class="text-typo"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
				<span class="summary-amount text-accent-dark font-medium"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
			</div>
		<?php endforeach; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="flex justify-between items-center mb-3">
				<span class="text-typo"><?php echo esc_html( $fee->name ); ?></span>
				<span class="summary-amount text-accent-dark font-medium"><?php wc_cart_totals_fee_html( $fee ); ?></span>
			</div>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<div class="flex justify-between items-center mb-3">
						<span class="text-typo"><?php echo esc_html( $tax->label ); ?></span>
						<span class="summary-amount"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="flex justify-between items-center mb-3">
					<span class="text-typo text-xl/[140%] font-medium"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></span>
					<span class="font-medium text-accent-dark text-[2rem]/[120%]"><?php wc_cart_totals_taxes_total_html(); ?></span>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="flex justify-between items-center pt-4 border-t border-medium-grey">
			<span class="text-typo font-semibold text-lg"><?php esc_html_e( 'Razem', 'woocommerce' ); ?></span>
			<span class="font-bold text-2xl"><?php wc_cart_totals_order_total_html(); ?></span>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
	</div>

	<!-- Polityka prywatności -->
	<div class="checkout-privacy mb-6">
		<p class="text-sm text-grey">
			<?php
			$privacy_page_id = get_option( 'wp_page_for_privacy_policy' );
			if ( $privacy_page_id ) {
				$privacy_link = get_permalink( $privacy_page_id );
				printf(
					esc_html__( 'Twoje dane osobowe zostaną użyte do obsługi Twojej wizyty na naszej stronie, zarządzania dostępem do Twojego konta i dla innych celów, o których mówi nasza %s.', 'woocommerce' ),
					'<a href="' . esc_url( $privacy_link ) . '" class="text-accent-dark underline">' . esc_html__( 'polityka prywatności', 'woocommerce' ) . '</a>'
				);
			} else {
				esc_html_e( 'Twoje dane osobowe zostaną użyte do obsługi Twojej wizyty na naszej stronie.', 'woocommerce' );
			}
			?>
		</p>
	</div>

	<!-- Checkbox akceptuję regulamin -->
	<?php if ( wc_terms_and_conditions_checkbox_enabled() ) : ?>
		<?php
		$terms_page_id = wc_terms_and_conditions_page_id();
		$terms_link    = $terms_page_id ? get_permalink( $terms_page_id ) : '';
		?>
		<div class="checkout-terms mb-6">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox flex items-start gap-2">
				<input
					type="checkbox"
					class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
					name="terms"
					id="terms"
					value="1"
					required
				/>
				<span class="text-sm">
					<?php
					printf(
						esc_html__( 'Akceptuję %s', 'woocommerce' ),
						'<a href="' . esc_url( $terms_link ) . '" class="text-accent-dark underline" target="_blank">' . esc_html__( 'regulamin', 'woocommerce' ) . '</a>'
					);
					?>
					<span class="required">*</span>
				</span>
			</label>
			<input type="hidden" name="terms-field" value="1" />
		</div>
	<?php endif; ?>

	<!-- Przycisk Kupuję i płacę -->
	<div class="checkout-submit">
		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
		
		<?php
		$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );
		$custom_button_text = __( 'Kupuję i płacę', 'woocommerce' );
		?>
		
		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt w-full' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $custom_button_text ) . '" data-value="' . esc_attr( $custom_button_text ) . '">' . esc_html( $custom_button_text ) . '</button>' ); ?>
		
		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>
		
		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>

</div>
