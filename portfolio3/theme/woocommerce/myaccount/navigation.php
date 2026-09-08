<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation lg:pb-10" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">

	<ul class="space-y-6">

		<li>
			<?php
			$endpoint = 'edit-address';
			$url      = wc_get_endpoint_url( $endpoint, '', wc_get_page_permalink( 'myaccount' ) );
			$is_active = wc_is_current_account_menu_item( $endpoint );
			?>
			<a href="<?php echo esc_url( $url ); ?>" class="account-nav-link flex items-center gap-2 text-typo hover:text-accent-dark transition<?php echo $is_active ? ' active' : ''; ?>" <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
				<span class="account-nav-icon text-typo w-5 h-5 inline-flex ">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_2430_3204)"><path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.5 16.875C4.01328 14.2602 6.76172 12.5 10 12.5C13.2383 12.5 15.9867 14.2602 17.5 16.875" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_2430_3204"><rect width="20" height="20" fill="white"/></clipPath></defs></svg>
				</span>
				<span class="account-nav-label text-lg/[140%] font-medium ">Moje dane</span>
			</a>
		</li>
		<li>
			<?php
			$endpoint = 'orders';
			$url      = wc_get_endpoint_url( $endpoint, '', wc_get_page_permalink( 'myaccount' ) );
			$is_active = wc_is_current_account_menu_item( $endpoint );
			?>
			<a href="<?php echo esc_url( $url ); ?>" class="account-nav-link flex items-center gap-2 text-typo hover:text-accent-dark transition<?php echo $is_active ? ' active' : ''; ?>" <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
				<span class="account-nav-icon text-typo w-5 h-5 inline-flex ">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_2430_3208)"><path d="M6.875 5H16.875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.875 10H16.875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.875 15H16.875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.4375 5.9375C3.95527 5.9375 4.375 5.51777 4.375 5C4.375 4.48223 3.95527 4.0625 3.4375 4.0625C2.91973 4.0625 2.5 4.48223 2.5 5C2.5 5.51777 2.91973 5.9375 3.4375 5.9375Z" fill="black"/><path d="M3.4375 10.9375C3.95527 10.9375 4.375 10.5178 4.375 10C4.375 9.48223 3.95527 9.0625 3.4375 9.0625C2.91973 9.0625 2.5 9.48223 2.5 10C2.5 10.5178 2.91973 10.9375 3.4375 10.9375Z" fill="black"/><path d="M3.4375 15.9375C3.95527 15.9375 4.375 15.5178 4.375 15C4.375 14.4822 3.95527 14.0625 3.4375 14.0625C2.91973 14.0625 2.5 14.4822 2.5 15C2.5 15.5178 2.91973 15.9375 3.4375 15.9375Z" fill="black"/></g><defs><clipPath id="clip0_2430_3208"><rect width="20" height="20" fill="white"/></clipPath></defs></svg>
				</span>
				<span class="account-nav-label text-lg/[140%] font-medium">Zamówienia</span>
			</a>
		</li>

		<li>
			<?php
			$endpoint = 'edit-account';
			$url      = wc_get_endpoint_url( $endpoint, '', wc_get_page_permalink( 'myaccount' ) );
			$is_active = wc_is_current_account_menu_item( $endpoint );
			?>
			<a href="<?php echo esc_url( $url ); ?>" class="account-nav-link flex items-center gap-2 text-typo hover:text-accent-dark transition<?php echo $is_active ? ' active' : ''; ?>" <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
				<span class="account-nav-icon text-typo w-5 h-5 inline-flex">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_2430_3216)"><path d="M15.625 5.625C16.3154 5.625 16.875 5.06536 16.875 4.375C16.875 3.68464 16.3154 3.125 15.625 3.125C14.9346 3.125 14.375 3.68464 14.375 4.375C14.375 5.06536 14.9346 5.625 15.625 5.625Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.625 3.125V2.1875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.5422 3.75L13.7305 3.28125" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.5422 5L13.7305 5.46875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.625 5.625V6.5625" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.707 5L17.5187 5.46875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.707 3.75L17.5187 3.28125" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 12.5C11.7259 12.5 13.125 11.1009 13.125 9.375C13.125 7.64911 11.7259 6.25 10 6.25C8.27411 6.25 6.875 7.64911 6.875 9.375C6.875 11.1009 8.27411 12.5 10 12.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.98438 15.5757C5.45462 14.6494 6.17216 13.8715 7.05745 13.3281C7.94275 12.7847 8.96123 12.4971 10 12.4971C11.0388 12.4971 12.0572 12.7847 12.9425 13.3281C13.8278 13.8715 14.5454 14.6494 15.0156 15.5757" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M17.3953 8.75003C17.659 10.3167 17.4179 11.9266 16.7069 13.3474C15.9959 14.7681 14.8518 15.9261 13.4398 16.6542C12.0277 17.3823 10.4208 17.6428 8.85108 17.3981C7.28133 17.1533 5.82998 16.416 4.7066 15.2926C3.58321 14.1693 2.84592 12.7179 2.60118 11.1482C2.35644 9.57841 2.61692 7.9715 3.34501 6.55945C4.0731 5.1474 5.23111 4.00329 6.65185 3.2923C8.07259 2.58132 9.68253 2.34026 11.2492 2.60394" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_2430_3216"><rect width="20" height="20" fill="white"/></clipPath></defs></svg>
				</span>
				<span class="account-nav-label text-lg/[140%] font-medium">Ustawienia konta</span>
			</a>
		</li>

		<li class="mt-10">
			<?php
			$logout_url = wp_logout_url( wc_get_page_permalink( 'myaccount' ) );
			?>
			<a href="<?php echo esc_url( $logout_url ); ?>" class="btn-transparent">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_4092_3705)">
				<path d="M3.125 10H16.875" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_4092_3705">
				<rect width="20" height="20" fill="white"/>
				</clipPath>
				</defs>
				</svg>
				Wyloguj się
			</a>
		</li>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
