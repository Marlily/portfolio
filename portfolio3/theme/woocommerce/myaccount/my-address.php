<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();
$customer    = new WC_Customer( $customer_id );

// Pobierz dane billingowe (dla danych płatności)
$billing_address  = wc_get_account_formatted_address( 'billing' );

// Pobierz dane shippingowe
$shipping_address = wc_get_account_formatted_address( 'shipping' );

// Pobierz dane faktury z osobnych pól invoice_*
$invoice_company = get_user_meta( $customer_id, 'invoice_company', true );
$invoice_nip     = get_user_meta( $customer_id, 'invoice_nip', true );

// Utwórz sformatowany adres faktury z pól invoice_* (tylko: company, NIP, adres)
$invoice_address_parts = array();
$invoice_address_1  = get_user_meta( $customer_id, 'invoice_address_1', true );
$invoice_city       = get_user_meta( $customer_id, 'invoice_city', true );
$invoice_postcode   = get_user_meta( $customer_id, 'invoice_postcode', true );
$invoice_country    = get_user_meta( $customer_id, 'invoice_country', true );

if ( ! empty( $invoice_company ) ) {
    $invoice_address_parts[] = $invoice_company;
}
// NIP jest wyświetlany osobno, nie dodajemy go do adresu
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
?>

<?php wc_print_notices(); ?>

<div class="account-addresses-wrapper space-y-8">

	<!-- 1. Dane płatności -->
	<div class="account-address-block border border-medium-grey rounded-3xl p-6 md:p-10 mb-4 relative">
		<h2 class="account-address-heading text-[2rem]/[120%] font-medium mb-6 text-typo">Dane płatności</h2>

		<?php if ( ! empty( $billing_address ) ) : ?>
			<div class="account-address-content mb-4">
				<?php echo wp_kses_post( $billing_address ); ?>
			</div>
			<a class="absolute right-10 top-10 flex gap-2 items-center text-accent-dark text-base/[140%] font-medium hover:text-accent-hover transition" 
			   href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'billing', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4.86641 15.1251H1.375C1.20924 15.1251 1.05027 15.0593 0.933058 14.942C0.815848 14.8248 0.75 14.6659 0.75 14.5001V11.0087C0.750077 10.8432 0.815824 10.6844 0.932813 10.5673L10.5672 0.932913C10.6844 0.815792 10.8433 0.75 11.009 0.75C11.1747 0.75 11.3336 0.815792 11.4508 0.932913L14.9422 4.42198C15.0593 4.53917 15.1251 4.69808 15.1251 4.86377C15.1251 5.02946 15.0593 5.18837 14.9422 5.30557L5.30781 14.9423C5.19069 15.0593 5.03195 15.125 4.86641 15.1251Z" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			   Edytuj
			</a>
		<?php else : ?>
			<a class="btn-transparent " 
			   href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'billing', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			   <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_4092_1664)">
				<path d="M7.24141 16.8751H3.75C3.58424 16.8751 3.42527 16.8093 3.30806 16.692C3.19085 16.5748 3.125 16.4159 3.125 16.2501V12.7587C3.12508 12.5932 3.19082 12.4344 3.30781 12.3173L12.9422 2.68291C13.0594 2.56579 13.2183 2.5 13.384 2.5C13.5497 2.5 13.7086 2.56579 13.8258 2.68291L17.3172 6.17198C17.4343 6.28917 17.5001 6.44808 17.5001 6.61377C17.5001 6.77946 17.4343 6.93837 17.3172 7.05557L7.68281 16.6923C7.56569 16.8093 7.40695 16.875 7.24141 16.8751Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M10.625 5L15 9.375" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_4092_1664">
				<rect width="20" height="20" fill="white"/>
				</clipPath>
				</defs>
				</svg>
				Wprowadź dane
			</a>
		<?php endif; ?>
	</div>

	<!-- 2. Dane do wysyłki -->
	<div class="account-address-block border border-medium-grey rounded-3xl p-6 md:p-10 mb-4 relative">
		<h2 class="account-address-heading text-[2rem]/[120%] font-medium mb-6 text-typo">Dane do wysyłki</h2>

		<?php if ( ! empty( $shipping_address ) ) : ?>
			<div class="account-address-content mb-4">
				<?php echo wp_kses_post( $shipping_address ); ?>
			</div>
			<a class="absolute right-10 top-10 flex gap-2 items-center text-accent-dark text-base/[140%] font-medium hover:text-accent-hover transition" 
			   href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'shipping', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			   
			   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4.86641 15.1251H1.375C1.20924 15.1251 1.05027 15.0593 0.933058 14.942C0.815848 14.8248 0.75 14.6659 0.75 14.5001V11.0087C0.750077 10.8432 0.815824 10.6844 0.932813 10.5673L10.5672 0.932913C10.6844 0.815792 10.8433 0.75 11.009 0.75C11.1747 0.75 11.3336 0.815792 11.4508 0.932913L14.9422 4.42198C15.0593 4.53917 15.1251 4.69808 15.1251 4.86377C15.1251 5.02946 15.0593 5.18837 14.9422 5.30557L5.30781 14.9423C5.19069 15.0593 5.03195 15.125 4.86641 15.1251Z" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			   Edytuj
			</a>
		<?php else : ?>
			<a class="btn-transparent" 
			   href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'shipping', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			   <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_4092_1664)">
				<path d="M7.24141 16.8751H3.75C3.58424 16.8751 3.42527 16.8093 3.30806 16.692C3.19085 16.5748 3.125 16.4159 3.125 16.2501V12.7587C3.12508 12.5932 3.19082 12.4344 3.30781 12.3173L12.9422 2.68291C13.0594 2.56579 13.2183 2.5 13.384 2.5C13.5497 2.5 13.7086 2.56579 13.8258 2.68291L17.3172 6.17198C17.4343 6.28917 17.5001 6.44808 17.5001 6.61377C17.5001 6.77946 17.4343 6.93837 17.3172 7.05557L7.68281 16.6923C7.56569 16.8093 7.40695 16.875 7.24141 16.8751Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M10.625 5L15 9.375" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_4092_1664">
				<rect width="20" height="20" fill="white"/>
				</clipPath>
				</defs>
				</svg>
				Wprowadź dane
			</a>
		<?php endif; ?>
	</div>

	<!-- 3. Dane do faktury -->
	<div class="account-address-block border border-medium-grey rounded-3xl p-6 md:p-10 relative">
		<h2 class="account-address-heading text-[2rem]/[120%] font-medium mb-6 text-typo">Dane do faktury</h2>

		<?php 
		// Sprawdź czy są jakieś dane do faktury (osobne pola invoice_*)
		$has_invoice_data = ! empty( $invoice_address ) || ! empty( $invoice_company ) || ! empty( $invoice_nip );
		?>

		<?php if ( $has_invoice_data ) : ?>
			<div class="account-address-content mb-4">
				<?php if ( ! empty( $invoice_company ) ) : ?>
					<p class="font-semibold"><?php echo esc_html( $invoice_company ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $invoice_nip ) ) : ?>
					<p>NIP: <?php echo esc_html( $invoice_nip ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $invoice_address ) ) : ?>
					<div class="mt-2">
						<?php echo wp_kses_post( $invoice_address ); ?>
					</div>
				<?php endif; ?>
			</div>
			<a class="absolute right-10 top-10 flex gap-2 items-center text-accent-dark text-base/[140%] font-medium hover:text-accent-hover transition" 
			   href="<?php echo esc_url( wc_get_endpoint_url( 'edytuj-faktura', '', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4.86641 15.1251H1.375C1.20924 15.1251 1.05027 15.0593 0.933058 14.942C0.815848 14.8248 0.75 14.6659 0.75 14.5001V11.0087C0.750077 10.8432 0.815824 10.6844 0.932813 10.5673L10.5672 0.932913C10.6844 0.815792 10.8433 0.75 11.009 0.75C11.1747 0.75 11.3336 0.815792 11.4508 0.932913L14.9422 4.42198C15.0593 4.53917 15.1251 4.69808 15.1251 4.86377C15.1251 5.02946 15.0593 5.18837 14.9422 5.30557L5.30781 14.9423C5.19069 15.0593 5.03195 15.125 4.86641 15.1251Z" stroke="#286D2E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				Edytuj
			</a>
		<?php else : ?>
			<a class="btn-transparent " 
			   href="<?php echo esc_url( wc_get_endpoint_url( 'edytuj-faktura', '', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			   <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_4092_1664)">
				<path d="M7.24141 16.8751H3.75C3.58424 16.8751 3.42527 16.8093 3.30806 16.692C3.19085 16.5748 3.125 16.4159 3.125 16.2501V12.7587C3.12508 12.5932 3.19082 12.4344 3.30781 12.3173L12.9422 2.68291C13.0594 2.56579 13.2183 2.5 13.384 2.5C13.5497 2.5 13.7086 2.56579 13.8258 2.68291L17.3172 6.17198C17.4343 6.28917 17.5001 6.44808 17.5001 6.61377C17.5001 6.77946 17.4343 6.93837 17.3172 7.05557L7.68281 16.6923C7.56569 16.8093 7.40695 16.875 7.24141 16.8751Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M10.625 5L15 9.375" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_4092_1664">
				<rect width="20" height="20" fill="white"/>
				</clipPath>
				</defs>
				</svg>
				Wprowadź dane
			</a>
		<?php endif; ?>
	</div>

</div>
