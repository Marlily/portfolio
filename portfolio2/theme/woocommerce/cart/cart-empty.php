<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */


if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	
<main class="container-content py-20">

    <nav class="breadcrumbs flex gap-4 pt-0 pb-8 items-center w-full">
        <a class="text-typo text-[0.875rem]/[140%] font-normal transition hover:text-accent-dark" href="<?php echo home_url() ?>">Strona główna</a>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2456_4866)">
            <path d="M6 3L11 8L6 13" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2456_4866">
            <rect width="16" height="16" fill="white"/>
            </clipPath>
            </defs>
        </svg>
        <span class="text-typo text-[0.875rem]/[140%] font-normal">Koszyk</span>
    </nav>

	<section class="bg-light-grey rounded-3xl p-5 lg:p-10">
		<div class="flex flex-col justify- items-center self-stretch flex-grow-0 flex-shrink-0">
	
			<svg
			width="40"
			height="40"
			viewBox="0 0 40 40"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
			class="flex-grow-0 flex-shrink-0 w-10 h-10 relative"
			preserveAspectRatio="xMidYMid meet"
			>
			<g clip-path="url(#clip0_2470_9390)">
				<path
				d="M13.75 36.25C15.1307 36.25 16.25 35.1307 16.25 33.75C16.25 32.3693 15.1307 31.25 13.75 31.25C12.3693 31.25 11.25 32.3693 11.25 33.75C11.25 35.1307 12.3693 36.25 13.75 36.25Z"
				fill="#3CB64A"
				></path>
				<path
				d="M30 36.25C31.3807 36.25 32.5 35.1307 32.5 33.75C32.5 32.3693 31.3807 31.25 30 31.25C28.6193 31.25 27.5 32.3693 27.5 33.75C27.5 35.1307 28.6193 36.25 30 36.25Z"
				fill="#3CB64A"
				></path>
				<path
				d="M2.5 5H6.25L11.9922 25.6687C12.1383 26.1951 12.4529 26.6592 12.8877 26.9899C13.3225 27.3206 13.8537 27.4998 14.4 27.5H29.8438C30.3903 27.5001 30.9219 27.3211 31.357 26.9904C31.7921 26.6596 32.1069 26.1954 32.2531 25.6687L36.25 11.25H7.98594"
				stroke="#3CB64A"
				stroke-width="2"
				stroke-linecap="round"
				stroke-linejoin="round"
				></path>
			</g>
			<defs>
				<clipPath id="clip0_2470_9390"><rect width="40" height="40" fill="white"></rect></clipPath>
			</defs>
			</svg>

			<h1 class="self-stretch flex-grow-0 flex-shrink-0 text-[2rem]/[120%] font-medium text-center text-typo mb-2">
				Twój koszyk jest pusty
			</h1>

			<p class="self-stretch flex-grow-0 flex-shrink-0 text-base text-center text-grey mb-8">
				Sprawdź nasze oferty. Jesteśmy pewni, że coś Cię zainteresuje!
			</p>


			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-transparent">
				Sprawdź oferty
			</a>

		</div>
	</section>

</main>


<?php endif; ?>
