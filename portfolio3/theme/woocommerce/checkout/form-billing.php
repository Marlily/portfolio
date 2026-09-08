<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-billing-fields">
	<h3><?php esc_html_e( 'Dane płatności', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<?php $billing_fields = $checkout->get_checkout_fields( 'billing' ); ?>

	<?php if ( is_user_logged_in() ) : ?>
		<?php
		$billing_address_display = wc_get_account_formatted_address( 'billing' );
		$billing_has_data        = ! empty( $billing_address_display );
		?>

		<div class="billing-summary-view space-y-4 mb-6">
			<?php if ( $billing_has_data ) : ?>
				<div class="text-base/[160%]">
					<?php echo wp_kses_post( $billing_address_display ); ?>
				</div>
				<button type="button" class="btn-link billing-edit-toggle">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_4092_2414)">
					<path d="M7.24141 16.875H3.75C3.58424 16.875 3.42527 16.8091 3.30806 16.6919C3.19085 16.5747 3.125 16.4157 3.125 16.25V12.7586C3.12508 12.593 3.19082 12.4343 3.30781 12.3172L12.9422 2.68279C13.0594 2.56567 13.2183 2.49988 13.384 2.49988C13.5497 2.49988 13.7086 2.56567 13.8258 2.68279L17.3172 6.17185C17.4343 6.28905 17.5001 6.44796 17.5001 6.61365C17.5001 6.77934 17.4343 6.93825 17.3172 7.05545L7.68281 16.6922C7.56569 16.8092 7.40695 16.8749 7.24141 16.875Z" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M10.625 5L15 9.375" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</g>
					<defs>
					<clipPath id="clip0_4092_2414">
					<rect width="20" height="20" fill="white"/>
					</clipPath>
					</defs>
					</svg>
					<?php esc_html_e( 'Edytuj', 'woocommerce' ); ?>
				</button>
			<?php else : ?>
				<p class="text-base/[160%] text-typo"><?php esc_html_e( 'Dane nie zostały jeszcze wprowadzone.', 'woocommerce' ); ?></p>
				<button type="button" class="btn-link billing-edit-toggle"><?php esc_html_e( 'Wprowadź dane', 'woocommerce' ); ?></button>
			<?php endif; ?>
		</div>

		<div class="woocommerce-billing-fields__field-wrapper billing-fields-edit" style="<?php echo $billing_has_data ? 'display: none;' : ''; ?>">
			<?php
			foreach ( $billing_fields as $key => $field ) {
				woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
			}
			?>
		</div>
	<?php else : ?>
		<div class="woocommerce-billing-fields__field-wrapper">
			<?php
			foreach ( $billing_fields as $key => $field ) {
				woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
			}
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>

	<!-- Checkbox: Chcę otrzymać fakturę -->
	<p class="form-row form-row-wide">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
			<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="want_invoice" name="want_invoice" value="1" />
			<span><?php esc_html_e( 'Chcę otrzymać fakturę', 'woocommerce' ); ?></span>
		</label>
	</p>

	<!-- Pola faktury (ukryte domyślnie) -->
	<div id="invoice-fields" class="invoice-fields-wrapper" style="display: none;">
		<h4 class="mb-4"><?php esc_html_e( 'Dane do faktury', 'woocommerce' ); ?></h4>
		
		<?php
		// Pobierz dane faktury z konta użytkownika (jeśli zalogowany)
		$customer_id = get_current_user_id();
		$invoice_company = $customer_id ? get_user_meta( $customer_id, 'invoice_company', true ) : '';
		$invoice_nip = $customer_id ? get_user_meta( $customer_id, 'invoice_nip', true ) : '';
		$invoice_address_1 = $customer_id ? get_user_meta( $customer_id, 'invoice_address_1', true ) : '';
		$invoice_postcode = $customer_id ? get_user_meta( $customer_id, 'invoice_postcode', true ) : '';
		$invoice_city = $customer_id ? get_user_meta( $customer_id, 'invoice_city', true ) : '';
		$invoice_country = $customer_id ? get_user_meta( $customer_id, 'invoice_country', true ) : WC()->countries->get_base_country();
		?>

		<p class="form-row form-row-wide">
			<label for="invoice_company"><?php esc_html_e( 'Nazwa firmy', 'woocommerce' ); ?></label>
			<input type="text" class="input-text" name="invoice_company" id="invoice_company" value="<?php echo esc_attr( $invoice_company ); ?>" />
		</p>

		<p class="form-row form-row-wide">
			<label for="invoice_nip"><?php esc_html_e( 'NIP', 'woocommerce' ); ?></label>
			<input type="text" class="input-text" name="invoice_nip" id="invoice_nip" value="<?php echo esc_attr( $invoice_nip ); ?>" />
		</p>

		<p class="form-row form-row-wide">
			<label for="invoice_country"><?php esc_html_e( 'Kraj', 'woocommerce' ); ?> <span class="required">*</span></label>
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

		<p class="form-row form-row-wide">
			<label for="invoice_address_1"><?php esc_html_e( 'Ulica i numer', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="invoice_address_1" id="invoice_address_1" value="<?php echo esc_attr( $invoice_address_1 ); ?>" required />
		</p>

		<p class="form-row form-row-first">
			<label for="invoice_postcode"><?php esc_html_e( 'Kod pocztowy', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="invoice_postcode" id="invoice_postcode" value="<?php echo esc_attr( $invoice_postcode ); ?>" required />
		</p>

		<p class="form-row form-row-last">
			<label for="invoice_city"><?php esc_html_e( 'Miasto', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="invoice_city" id="invoice_city" value="<?php echo esc_attr( $invoice_city ); ?>" required />
		</p>
	</div>
</div>

<?php if ( is_user_logged_in() ) : ?>
	<script>
		(function($){
			$(function(){
				const $toggle = $('.billing-edit-toggle');
				const $view   = $('.billing-summary-view');
				const $fields = $('.billing-fields-edit');

				$toggle.on('click', function(e){
					e.preventDefault();
					$view.hide();
					$fields.slideDown();
				});
			});
		})(jQuery);
	</script>
<?php endif; ?>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields mt-4">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
