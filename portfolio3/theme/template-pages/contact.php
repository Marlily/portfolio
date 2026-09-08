<?php /**
 * Template Name: Kontakt
 *
 *
 * @package raypathsklep
 */

get_header();

$contact_hero   = get_field( 'contact_hero' );
$contact_intro  = get_field( 'contact_intro' );
$contact_phone  = get_field( 'contact_phone' );
$contact_email  = get_field( 'contact_email' );
$contact_addr   = get_field( 'contact_address' );

$hero_title       = $contact_hero['title'] ?? 'Kontakt';
$hero_image       = $contact_hero['image'] ?? null;
$hero_image_url   = is_array( $hero_image ) ? ( $hero_image['url'] ?? '' ) : '';
$hero_image_alt   = is_array( $hero_image ) ? ( $hero_image['alt'] ?? $hero_title ) : $hero_title;
$hero_heading_col = $contact_hero['heading_color'] ?? 'text-white';

echo get_template_part(
	'template-parts/layout/hero',
	'',
	array(
		'title'        => esc_html( $hero_title ),
		'img'          => $hero_image_url ? esc_url( $hero_image_url ) : get_template_directory_uri() . '/img/temp/recykling-hero.jpg',
		'headingColor' => esc_attr( $hero_heading_col ),
		'alt'          => esc_attr( $hero_image_alt ),
	)
);
?>

<main>
    <div class="container-content">
        <nav class="breadcrumbs flex gap-4 py-15 items-center">
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

                <span class="text-typo text-[0.875rem]/[140%] font-normal">Kontakt</span>
        </nav>

		<?php
		$intro_heading = $contact_intro['heading'] ?? '';
		$intro_text1   = $contact_intro['text_primary'] ?? '';
		$intro_text2   = $contact_intro['text_secondary'] ?? '';
		?>
        <?php if ( $intro_heading ) : ?>
        	<h1 class="text-[3rem]/[110%] font-semibold text-typo mb-4"><?php echo esc_html( $intro_heading ); ?></h1>
		<?php endif; ?>
        <?php if ( $intro_text1 ) : ?>
        	<p class="mb-4"><?php echo esc_html( $intro_text1 ); ?></p>
		<?php endif; ?>
        <?php if ( $intro_text2 ) : ?>
        	<p class="mb-6"><?php echo esc_html( $intro_text2 ); ?></p>
		<?php endif; ?>

        <div class="mb-12 lg:mb-6">
            <div class="flex justify-start items-start self-stretch flex-grow-0 flex-shrink-0 gap-6 flex-col lg:flex-row">
				<?php
				$phone_title = $contact_phone['title'] ?? '';
				$phone_number = $contact_phone['number'] ?? '';
				$phone_note   = $contact_phone['note'] ?? '';
				?>
                <div class="flex justify-start items-start flex-grow relative gap-2">
                    <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-6 h-6 relative"
                    preserveAspectRatio="none"
                    >
                    <path
                        d="M20.8472 14.8554L16.4306 12.8764L16.4184 12.8707C16.1892 12.7727 15.939 12.7333 15.6907 12.7562C15.4424 12.7792 15.2037 12.8636 14.9963 13.002C14.9718 13.0181 14.9484 13.0357 14.9259 13.0545L12.6441 14.9998C11.1984 14.2976 9.70595 12.8164 9.00376 11.3895L10.9519 9.07294C10.9706 9.0495 10.9884 9.02606 11.0053 9.00075C11.1407 8.79384 11.2229 8.55667 11.2445 8.31035C11.2661 8.06402 11.2264 7.81618 11.1291 7.58887V7.57762L9.14438 3.15356C9.0157 2.85662 8.79444 2.60926 8.51362 2.44841C8.2328 2.28756 7.9075 2.22184 7.58626 2.26106C6.31592 2.42822 5.14986 3.05209 4.30588 4.01615C3.4619 4.98021 2.99771 6.21852 3.00001 7.49981C3.00001 14.9436 9.05626 20.9998 16.5 20.9998C17.7813 21.0021 19.0196 20.5379 19.9837 19.6939C20.9477 18.85 21.5716 17.6839 21.7388 16.4136C21.7781 16.0924 21.7125 15.7672 21.5518 15.4864C21.3911 15.2056 21.144 14.9843 20.8472 14.8554ZM16.5 19.4998C13.3185 19.4963 10.2682 18.2309 8.01856 15.9813C5.76888 13.7316 4.50348 10.6813 4.50001 7.49981C4.49648 6.58433 4.82631 5.69887 5.42789 5.00879C6.02947 4.3187 6.86167 3.87118 7.76907 3.74981C7.7687 3.75355 7.7687 3.75732 7.76907 3.76106L9.73782 8.16731L7.80001 10.4867C7.78034 10.5093 7.76247 10.5335 7.74657 10.5589C7.60549 10.7754 7.52273 11.0246 7.5063 11.2825C7.48988 11.5404 7.54035 11.7981 7.65282 12.0307C8.5022 13.7679 10.2525 15.5051 12.0084 16.3536C12.2428 16.465 12.502 16.5137 12.7608 16.495C13.0196 16.4762 13.2692 16.3907 13.485 16.2467C13.5091 16.2305 13.5322 16.2129 13.5544 16.1942L15.8334 14.2498L20.2397 16.2232C20.2397 16.2232 20.2472 16.2232 20.25 16.2232C20.1301 17.1319 19.6833 17.9658 18.9931 18.5689C18.3028 19.172 17.4166 19.5029 16.5 19.4998Z"
                        fill="#3D3D3D"
                    ></path>
                    </svg>
                    <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2">
                    <?php if ( $phone_title ) : ?>
                    <p class="flex-grow-0 flex-shrink-0 text-lg font-semibold text-left text-typo-grey">
                        <?php echo esc_html( $phone_title ); ?>
                    </p>
					<?php endif; ?>
                    <p class="flex-grow-0 flex-shrink-0 w-96 text-base text-left text-typo-grey">
						<?php if ( $phone_number ) : ?>
                        <span class="flex-grow-0 flex-shrink-0 w-96 text-base font-medium text-left text-typo-grey"
                        ><?php echo esc_html( $phone_number ); ?></span>
						<?php endif; ?>
						<?php if ( $phone_note ) : ?>
                        <br /><span class="flex-grow-0 flex-shrink-0 w-96 text-base text-left text-typo-grey">
                        <?php echo esc_html( $phone_note ); ?></span>
						<?php endif; ?>
                    </p>
                    </div>
                </div>
				<?php
				$email_title   = $contact_email['title'] ?? '';
				$email_primary = $contact_email['email_primary'] ?? '';
				$email_second  = $contact_email['email_secondary'] ?? '';
				?>
                <div class="flex justify-start items-start flex-grow relative gap-2">
                    <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-6 h-6 relative"
                    preserveAspectRatio="none"
                    >
                    <path
                        d="M21 4.5H3C2.80109 4.5 2.61032 4.57902 2.46967 4.71967C2.32902 4.86032 2.25 5.05109 2.25 5.25V18C2.25 18.3978 2.40804 18.7794 2.68934 19.0607C2.97064 19.342 3.35218 19.5 3.75 19.5H20.25C20.6478 19.5 21.0294 19.342 21.3107 19.0607C21.592 18.7794 21.75 18.3978 21.75 18V5.25C21.75 5.05109 21.671 4.86032 21.5303 4.71967C21.3897 4.57902 21.1989 4.5 21 4.5ZM12 12.4828L4.92844 6H19.0716L12 12.4828ZM9.25406 12L3.75 17.0447V6.95531L9.25406 12ZM10.3641 13.0172L11.4891 14.0531C11.6274 14.1801 11.8084 14.2506 11.9963 14.2506C12.1841 14.2506 12.3651 14.1801 12.5034 14.0531L13.6284 13.0172L19.0659 18H4.92844L10.3641 13.0172ZM14.7459 12L20.25 6.95438V17.0456L14.7459 12Z"
                        fill="#3D3D3D"
                    ></path>
                    </svg>
                    <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2">
                        <?php if ( $email_title ) : ?>
                        <p class="flex-grow-0 flex-shrink-0 text-lg font-semibold text-left text-typo-grey"><?php echo esc_html( $email_title ); ?></p>
						<?php endif; ?>
                        <p class="flex-grow-0 flex-shrink-0 w-96 text-base font-medium text-left text-typo-grey">
							<?php if ( $email_primary ) : ?>
                            <a href="mailto:<?php echo esc_attr( $email_primary ); ?>" class="flex-grow-0 flex-shrink-0 w-96 text-base font-medium text-left text-typo-grey transition hover:text-accent-dark"><?php echo esc_html( $email_primary ); ?></a>
							<?php endif; ?>
							<?php if ( $email_second ) : ?>
							<br /><a class="flex-grow-0 flex-shrink-0 w-96 text-base font-medium text-left text-typo-grey transition hover:text-accent-dark" href="mailto:<?php echo esc_attr( $email_second ); ?>"><?php echo esc_html( $email_second ); ?></a>
							<?php endif; ?>
                        </p>
                    </div>
                </div>
				<?php
				$addr_title = $contact_addr['title'] ?? '';
				$addr_line1 = $contact_addr['line1'] ?? '';
				$addr_line2 = $contact_addr['line2'] ?? '';
				$addr_line3 = $contact_addr['line3'] ?? '';
				$addr_note  = $contact_addr['note'] ?? '';
				?>
                <div class="flex justify-start items-start flex-grow relative gap-2">
                    <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-6 h-6 relative"
                    preserveAspectRatio="none"
                    >
                    <path
                        d="M12 6C11.2583 6 10.5333 6.21993 9.91661 6.63199C9.29993 7.04404 8.81928 7.62971 8.53545 8.31494C8.25162 9.00016 8.17736 9.75416 8.32205 10.4816C8.46675 11.209 8.8239 11.8772 9.34835 12.4017C9.8728 12.9261 10.541 13.2833 11.2684 13.4279C11.9958 13.5726 12.7498 13.4984 13.4351 13.2145C14.1203 12.9307 14.706 12.4501 15.118 11.8334C15.5301 11.2167 15.75 10.4917 15.75 9.75C15.75 8.75544 15.3549 7.80161 14.6517 7.09835C13.9484 6.39509 12.9946 6 12 6ZM12 12C11.555 12 11.12 11.868 10.75 11.6208C10.38 11.3736 10.0916 11.0222 9.92127 10.611C9.75097 10.1999 9.70642 9.7475 9.79323 9.31105C9.88005 8.87459 10.0943 8.47368 10.409 8.15901C10.7237 7.84434 11.1246 7.63005 11.561 7.54323C11.9975 7.45642 12.4499 7.50097 12.861 7.67127C13.2722 7.84157 13.6236 8.12996 13.8708 8.49997C14.118 8.86998 14.25 9.30499 14.25 9.75C14.25 10.3467 14.0129 10.919 13.591 11.341C13.169 11.7629 12.5967 12 12 12ZM12 1.5C9.81273 1.50248 7.71575 2.37247 6.16911 3.91911C4.62247 5.46575 3.75248 7.56273 3.75 9.75C3.75 12.6938 5.11031 15.8138 7.6875 18.7734C8.84552 20.1108 10.1489 21.3151 11.5734 22.3641C11.6995 22.4524 11.8498 22.4998 12.0037 22.4998C12.1577 22.4998 12.308 22.4524 12.4341 22.3641C13.856 21.3147 15.1568 20.1104 16.3125 18.7734C18.8859 15.8138 20.25 12.6938 20.25 9.75C20.2475 7.56273 19.3775 5.46575 17.8309 3.91911C16.2843 2.37247 14.1873 1.50248 12 1.5ZM12 20.8125C10.4503 19.5938 5.25 15.1172 5.25 9.75C5.25 7.95979 5.96116 6.2429 7.22703 4.97703C8.4929 3.71116 10.2098 3 12 3C13.7902 3 15.5071 3.71116 16.773 4.97703C18.0388 6.2429 18.75 7.95979 18.75 9.75C18.75 15.1153 13.5497 19.5938 12 20.8125Z"
                        fill="#3D3D3D"
                    ></path>
                    </svg>
                    <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2">
                    <?php if ( $addr_title ) : ?>
                    <p class="flex-grow-0 flex-shrink-0 text-lg font-semibold text-left text-typo-grey">
                        <?php echo esc_html( $addr_title ); ?>
                    </p>
					<?php endif; ?>
                    <p class="flex-grow-0 flex-shrink-0 w-96 text-base text-left text-typo-grey">
						<?php if ( $addr_line1 ) : ?>
                        <span class="flex-grow-0 flex-shrink-0 w-96 text-base text-left text-typo-grey"><?php echo esc_html( $addr_line1 ); ?></span>
						<?php endif; ?>
						<?php if ( $addr_line2 ) : ?>
                        <br /><span class="flex-grow-0 flex-shrink-0 w-96 text-base text-left text-typo-grey"><?php echo esc_html( $addr_line2 ); ?></span>
						<?php endif; ?>
						<?php if ( $addr_line3 ) : ?>
                        <br /><span class="flex-grow-0 flex-shrink-0 w-96 text-base text-left text-typo-grey"><?php echo esc_html( $addr_line3 ); ?></span>
						<?php endif; ?>
						<?php if ( $addr_note ) : ?>
                        <br /><br /><span
                        class="flex-grow-0 flex-shrink-0 w-96 text-base font-medium text-left text-typo-grey"
                        ><?php echo esc_html( $addr_note ); ?></span>
						<?php endif; ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-contact pb-20">
            <h2 class="mb-6">Formularz kontaktowy</h2>

            <!-- form -->
            <?php echo do_shortcode('[contact-form-7 id="2dcf753" title="Kontakt"]'); ?>

        </div>

    </div>
</main>



<?php get_footer(); ?>