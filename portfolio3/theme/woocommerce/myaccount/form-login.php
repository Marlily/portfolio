<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_customer_login_form' );

$is_registration_enabled = 'yes' === get_option( 'woocommerce_enable_myaccount_registration' );
$action                  = isset( $_GET['action'] ) ? sanitize_key( wp_unslash( $_GET['action'] ) ) : '';
$is_register_view        = $is_registration_enabled && 'register' === $action;
?>

<div class="login-page-wrapper flex justify-between gap-8 flex-col lg:flex-row pb-20">
	<div class="w-full max-w-full lg:w-auto lg:max-w-[33.06rem]">
		<h1 class="mb-10">
			<?php echo $is_register_view ? esc_html__( 'Załóż konto', 'raypathsklep' ) : esc_html__( 'Witaj!', 'raypathsklep' ); ?>
		</h1>

		<div class="woo-notice-wrapper mb-8">
			<?php wc_print_notices(); ?>
		</div>

		<?php if ( $is_register_view ) : ?>
			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> novalidate>
				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email"><?php esc_html_e( 'Adres e-mail', 'raypathsklep' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" />
				</p>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e( 'Hasło', 'raypathsklep' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
					</p>
				<?php else : ?>
					<p class="text-base/[160%] text-grey mb-4">
					Na adres e-mail zostanie wysłany odnośnik do ustawienia hasła. Twoje dane osobowe zostaną użyte do obsługi Twojej wizyty na naszej stronie, zarządzania dostępem do Twojego konta i dla innych celów, o których mówi nasza <a class="text-accent-dark" href="/polityka-prywatnosci">polityka prywatności</a>.
					</p>
				<?php endif; ?>

				<?php do_action( 'woocommerce_register_form' ); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="woocommerce-Button woocommerce-button button w-full btn woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
						<?php esc_html_e( 'Zarejestruj się', 'raypathsklep' ); ?>
					</button>
				</p>

				<?php do_action( 'woocommerce_register_form_end' ); ?>
			</form>

			<div class="bg-light-grey text-grey rounded-2xl p-6 mt-6">
				<p class="text-lg/[140%] text-grey font-semibold mb-2"><?php esc_html_e( 'Masz już konto?', 'raypathsklep' ); ?></p>
				<p class="mb-4">
					<?php esc_html_e( 'Wróć do logowania, aby śledzić zamówienia i korzystać z ofert.', 'raypathsklep' ); ?>
				</p>
				<a class="btn-transparent w-full" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
					<?php esc_html_e( 'Zaloguj się', 'raypathsklep' ); ?>
				</a>
			</div>
		<?php else : ?>
			<form class="woocommerce-form woocommerce-form-login custom-woo-login" method="post" novalidate>
				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<div class="form-row">
					<label for="username"><?php esc_html_e( 'Adres e-mail', 'raypathsklep' ); ?></label>
					<input type="text" name="username" id="username" autocomplete="username" required />
				</div>

				<div class="form-row">
					<label for="password"><?php esc_html_e( 'Hasło', 'raypathsklep' ); ?></label>
					<input type="password" name="password" id="password" autocomplete="current-password" required />
				</div>

				<a class="text-accent-dark mt-4 mb-6 font-medium text-base/[140%] block" href="<?php echo esc_url( wc_lostpassword_url() ); ?>">
					<?php esc_html_e( 'Nie pamiętasz hasła?', 'raypathsklep' ); ?>
				</a>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<button type="submit" class="woocommerce-button button w-full btn" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
					<?php esc_html_e( 'Zaloguj', 'raypathsklep' ); ?>
				</button>

				<input type="hidden" name="redirect" value="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

				<?php do_action( 'woocommerce_login_form_end' ); ?>
			</form>

			<?php if ( $is_registration_enabled ) : ?>
				<div class="bg-light-grey text-grey rounded-2xl p-6 mt-6">
					<p class="text-lg/[140%] text-grey font-semibold mb-2"><?php esc_html_e( 'Nie masz konta?', 'raypathsklep' ); ?></p>
					<p class="mb-4">
						<?php esc_html_e( 'Załóż je, aby zyskać szybki dostęp do sprawdzonych artykułów, śledzić zamówienia i korzystać z ofert dla zarejestrowanych klientów.', 'raypathsklep' ); ?>
					</p>
					<a class="btn-transparent w-full" href="<?php echo esc_url( add_query_arg( 'action', 'register', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
						<?php esc_html_e( 'Zarejestruj się', 'raypathsklep' ); ?>
					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<img class="rounded-3xl max-w-[39.94rem] w-full lg:w-auto" src="<?php echo esc_url( get_template_directory_uri() . '/img/raypath-logowanie.jpg' ); ?>" alt="<?php esc_attr_e( 'Logowanie', 'raypathsklep' ); ?>">
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
