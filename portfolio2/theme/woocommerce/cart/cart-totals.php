<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals flex flex-col items-start h-full">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2>Podsumowanie</h2>

	<div class="flex justify-between gap-2 w-full mb-8">
		<div class="flex-1 text-base/[160%] text-typo font-normal">Wartość koszyka</div>
		<div class="flex-1 text-right text-accent-dark font-medium text-2xl/[120%]"><?php wc_cart_totals_subtotal_html(); ?></div>
	</div>

	<div class="wc-proceed-to-checkout w-full mt-auto">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
