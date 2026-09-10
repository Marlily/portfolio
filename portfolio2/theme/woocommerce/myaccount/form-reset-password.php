<?php
/**
 * Lost password reset form (custom layout).
 *
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>
<div class="login-page-wrapper flex justify-between gap-8 flex-col lg:flex-row pb-20">
	<div class="w-full max-w-full lg:w-auto lg:max-w-[33.06rem]">
		<h1 class="mb-4"><?php esc_html_e( 'Ustaw hasło', 'raypathsklep' ); ?></h1>
		<p class="text-base/[160%] text-grey mb-8">
			<?php esc_html_e( 'Witaj w naszym sklepie! Poniżej ustaw hasło do swojego konta.', 'raypathsklep' ); ?>
		</p>

		<form method="post" class="woocommerce-ResetPassword lost_reset_password">
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" required aria-required="true" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
				<label for="password_2"><?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" required aria-required="true" />
			</p>

			<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
			<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

			<div class="clear"></div>

			<?php do_action( 'woocommerce_resetpassword_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="woocommerce-Button button w-full btn<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>">
					<?php esc_html_e( 'Save', 'woocommerce' ); ?>
				</button>
			</p>

			<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
		</form>
	</div>

	<img class="rounded-3xl max-w-[39.94rem] w-full lg:w-auto" src="<?php echo esc_url( get_template_directory_uri() . '/img/raypath-logowanie.jpg' ); ?>" alt="<?php esc_attr_e( 'Reset hasła', 'raypathsklep' ); ?>">
</div>

<?php
do_action( 'woocommerce_after_reset_password_form' );

