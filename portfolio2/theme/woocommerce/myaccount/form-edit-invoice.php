<?php
/**
 * Edit invoice address form
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

// Pobierz dane faktury z osobnych pól invoice_*
$invoice_company = get_user_meta( $customer_id, 'invoice_company', true );
$invoice_nip     = get_user_meta( $customer_id, 'invoice_nip', true );
$invoice_address_1  = get_user_meta( $customer_id, 'invoice_address_1', true );
$invoice_postcode   = get_user_meta( $customer_id, 'invoice_postcode', true );
$invoice_city       = get_user_meta( $customer_id, 'invoice_city', true );
$invoice_country    = get_user_meta( $customer_id, 'invoice_country', true ) ?: WC()->countries->get_base_country();

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<form method="post" class="woocommerce-EditAccountForm edit-account" novalidate>

	<h2><?php esc_html_e( 'Dane do faktury', 'woocommerce' ); ?></h2>

	<?php wc_print_notices(); ?>

	<div class="woocommerce-address-fields">
		<?php do_action( 'woocommerce_before_edit_invoice_address_form' ); ?>

		<div class="woocommerce-address-fields__field-wrapper">
			
			<!-- Pole: Nazwa firmy -->
			<p class="form-row form-row-wide">
				<label for="invoice_company" class="form-label">
					<?php esc_html_e( 'Nazwa firmy', 'woocommerce' ); ?>
				</label>
				<input type="text" class="input-text" name="invoice_company" id="invoice_company" value="<?php echo esc_attr( $invoice_company ); ?>" />
			</p>

			<!-- Pole: NIP -->
			<p class="form-row form-row-wide">
				<label for="invoice_nip" class="form-label">
					<?php esc_html_e( 'NIP', 'woocommerce' ); ?>
				</label>
				<input type="text" class="input-text" name="invoice_nip" id="invoice_nip" value="<?php echo esc_attr( $invoice_nip ); ?>" />
			</p>

			<!-- Pole: Kraj -->
			<p class="form-row form-row-wide">
				<label for="invoice_country" class="form-label">
					<?php esc_html_e( 'Kraj', 'woocommerce' ); ?>
					<span class="required">*</span>
				</label>
				<select name="invoice_country" id="invoice_country" class="country_to_state country_select" required>
					<?php
					$countries = WC()->countries->get_countries();
					foreach ( $countries as $code => $name ) {
						printf(
							'<option value="%s" %s>%s</option>',
							esc_attr( $code ),
							selected( $invoice_country, $code, false ),
							esc_html( $name )
						);
					}
					?>
				</select>
			</p>

			<!-- Pole: Ulica -->
			<p class="form-row form-row-wide">
				<label for="invoice_address_1" class="form-label">
					<?php esc_html_e( 'Ulica i numer', 'woocommerce' ); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="invoice_address_1" id="invoice_address_1" value="<?php echo esc_attr( $invoice_address_1 ); ?>" required />
			</p>

			<!-- Pole: Kod pocztowy -->
			<p class="form-row form-row-first">
				<label for="invoice_postcode" class="form-label">
					<?php esc_html_e( 'Kod pocztowy', 'woocommerce' ); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="invoice_postcode" id="invoice_postcode" value="<?php echo esc_attr( $invoice_postcode ); ?>" required />
			</p>

			<!-- Pole: Miasto -->
			<p class="form-row form-row-last">
				<label for="invoice_city" class="form-label">
					<?php esc_html_e( 'Miasto', 'woocommerce' ); ?>
					<span class="required">*</span>
				</label>
				<input type="text" class="input-text" name="invoice_city" id="invoice_city" value="<?php echo esc_attr( $invoice_city ); ?>" required />
			</p>

		</div>

		<?php do_action( 'woocommerce_after_edit_invoice_address_form' ); ?>

		<p>
			<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_invoice_address" value="1">
				<?php esc_html_e( 'Zapisz dane do faktury', 'woocommerce' ); ?>
			</button>
			<?php wp_nonce_field( 'woocommerce-edit-invoice-address', '_wpnonce' ); ?>
		</p>
	</div>

</form>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
