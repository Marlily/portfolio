<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook - woocommerce_before_edit_account_form.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_before_edit_account_form' );
?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<fieldset class="account-settings-block border border-medium-grey rounded-2xl p-10">
		<h2><?php echo esc_html__( 'Ustawienia konta', 'raypathsklep' ); ?></h2>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first lg:w-[calc(50%-1rem)] inline-block">
			<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" aria-required="true" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last lg:w-[calc(50%-1rem)] inline-block ml-7">
			<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" aria-required="true" />
		</p>
		<div class="clear"></div>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" aria-required="true" />
		</p>

		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<input type="hidden" name="action" value="save_account_details" />

		<?php
			/**
			 * Hook where additional fields should be rendered.
			 *
			 * @since 8.7.0
			 */
			do_action( 'woocommerce_edit_account_form_fields' );
		?>

		<p>
			<button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		</p>
	</fieldset>

	<fieldset class="account-password-block border border-medium-grey rounded-2xl p-10 mt-4">
		<h2><?php echo esc_html__( 'Zmiana hasła', 'raypathsklep' ); ?></h2>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_current">Aktualne hasło</label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_1">Nowe hasło</label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_2">Powtórz nowe hasło</label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
		</p>

		<p>
			<button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		</p>
	</fieldset>

	<div class="clear"></div>

	<?php
		/**
		 * My Account edit account form.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_edit_account_form' );
	?>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<section class="account-delete-block border border-medium-grey rounded-2xl p-10 mt-4">
	<h2><?php echo esc_html__( 'Usuwanie konta', 'raypathsklep' ); ?></h2>
	<p><?php echo esc_html__( 'Jeśli klikniesz w ten przycisk, usuniesz swoje konto w naszym sklepie. Upewnij się, że na pewno chcesz to zrobić, ponieważ nie będziemy mogli przywrócić Twojego konta.', 'raypathsklep' ); ?></p>
	
	<button type="button" class="btn-transparent button account-delete-trigger text-red border-red hover:bg-red mt-6 !flex lg:ml-auto">
		
	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_4092_1915)">
	<path d="M16.875 4.375H3.125" stroke="#D50000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	<path d="M8.125 8.125V13.125" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	<path d="M11.875 8.125V13.125" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	<path d="M15.625 4.375V16.25C15.625 16.4158 15.5592 16.5747 15.4419 16.6919C15.3247 16.8092 15.1658 16.875 15 16.875H5C4.83424 16.875 4.67527 16.8092 4.55806 16.6919C4.44085 16.5747 4.375 16.4158 4.375 16.25V4.375" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	<path d="M13.125 4.375V3.125C13.125 2.79348 12.9933 2.47554 12.7589 2.24112C12.5245 2.0067 12.2065 1.875 11.875 1.875H8.125C7.79348 1.875 7.47554 2.0067 7.24112 2.24112C7.0067 2.47554 6.875 2.79348 6.875 3.125V4.375" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</g>
	<defs>
	<clipPath id="clip0_4092_1915">
	<rect width="20" height="20" fill="white"/>
	</clipPath>
	</defs>
	</svg>
	Usuń konto

</button>

	<div class="account-delete-modal hidden fixed inset-0 bg-black/20 justify-center items-center z-99999">
		<div class="account-delete-modal__dialog bg-white rounded-2xl p-4 lg:p-10 max-w-[calc(100%-2rem)]">
			<h2><?php echo esc_html__( 'Usunąć konto?', 'raypathsklep' ); ?></h2>
			<p><?php echo esc_html__( 'Potwierdź usuwanie konta', 'raypathsklep' ); ?></p>
			<form method="post" class="account-delete-form mt-6">
				<?php wp_nonce_field( 'delete_account_action', 'delete-account-nonce' ); ?>
				<input type="hidden" name="delete_account_action" value="delete_account" />
				<button type="submit" class="woocommerce-Button button button--danger btn bg-red border border-red hover:border-red hover:bg-transparent hover:text-red"><?php echo esc_html__( 'Usuń konto', 'raypathsklep' ); ?></button>
				<button type="button" class="woocommerce-Button button account-delete-cancel btn-transparent ml-4"><?php echo esc_html__( 'Anuluj', 'raypathsklep' ); ?></button>
			</form>
		</div>
	</div>
</section>

<script>
	(function() {
		const openBtn = document.querySelector('.account-delete-trigger');
		const modal = document.querySelector('.account-delete-modal');
		if (!openBtn || !modal) {
			return;
		}

		const backdrop = modal.querySelector('.account-delete-modal__backdrop');
		const cancelBtn = modal.querySelector('.account-delete-cancel');

		const closeModal = () => {
			modal.classList.add('hidden');
		};

		openBtn.addEventListener('click', () => {
			modal.classList.remove('hidden');
			modal.classList.add('flex');
		});

		[backdrop, cancelBtn].forEach((el) => {
			if (el) {
				el.addEventListener('click', closeModal);
			}
		});
	})();
</script>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
