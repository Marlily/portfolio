<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order container-content py-12 px-0">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<div class="border border-medium-grey rounded-3xl p-8 bg-white">
				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed mb-4">
					<?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
				</p>

				<div class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions flex flex-wrap gap-3">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="btn"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="btn-transparent"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</div>
			</div>

		<?php else : ?>

			<div class="space-y-6">
				<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>

				<div class="border border-medium-grey rounded-3xl p-8 bg-white">
					<h2 class="text-[2rem]/[120%] font-medium text-typo mb-4"><?php esc_html_e( 'Szczegóły zamówienia', 'woocommerce' ); ?></h2>
					<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details space-y-3 text-base/[150%] text-typo">

						<li class="woocommerce-order-overview__order order flex justify-between gap-4">
							<span class="text-grey"><?php esc_html_e( 'Order number:', 'woocommerce' ); ?></span>
							<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</li>

						<li class="woocommerce-order-overview__date date flex justify-between gap-4">
							<span class="text-grey"><?php esc_html_e( 'Date:', 'woocommerce' ); ?></span>
							<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</li>

						<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
							<li class="woocommerce-order-overview__email email flex justify-between gap-4">
								<span class="text-grey"><?php esc_html_e( 'Email:', 'woocommerce' ); ?></span>
								<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
							</li>
						<?php endif; ?>

						<li class="woocommerce-order-overview__total total flex justify-between gap-4">
							<span class="text-grey"><?php esc_html_e( 'Total:', 'woocommerce' ); ?></span>
							<strong class="text-accent-dark text-xl"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</li>

						<?php if ( $order->get_payment_method_title() ) : ?>
							<li class="woocommerce-order-overview__payment-method method flex justify-between gap-4">
								<span class="text-grey"><?php esc_html_e( 'Payment method:', 'woocommerce' ); ?></span>
								<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
							</li>
						<?php endif; ?>

					</ul>
				</div>

				<div class="flex flex-wrap gap-3">
					<a class="btn" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ?: home_url( '/' ) ); ?>">
						<?php esc_html_e( 'Continue shopping', 'woocommerce' ); ?>
					</a>
					<?php if ( is_user_logged_in() ) : ?>
						<a class="btn-transparent" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
							<?php esc_html_e( 'My account', 'woocommerce' ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

		<?php endif; ?>

	<?php else : ?>

		<div class="border border-medium-grey rounded-3xl p-8 bg-white">
			<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>
		</div>

	<?php endif; ?>

</div>
