<?php
/**
 * raypathsklep functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package raypathsklep
 */

if ( ! defined( 'RAYPATHSKLEP_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'RAYPATHSKLEP_VERSION', '0.1.0' );
}

if ( ! defined( 'RAYPATHSKLEP_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `raypathsklep_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'RAYPATHSKLEP_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'raypathsklep_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function raypathsklep_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on raypathsklep, use a find and replace
		 * to change 'raypathsklep' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'raypathsklep', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'raypathsklep' ),
				'menu-2' => __( 'Footer Menu', 'raypathsklep' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'raypathsklep_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function raypathsklep_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'raypathsklep' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'raypathsklep' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'raypathsklep_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function raypathsklep_scripts() {
	wp_enqueue_style( 'raypathsklep-style', get_stylesheet_uri(), array(), RAYPATHSKLEP_VERSION );
	wp_enqueue_script( 'raypathsklep-script', get_template_directory_uri() . '/js/script.min.js', array(), RAYPATHSKLEP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'raypathsklep_scripts' );

/**
 * Enqueue the block editor script.
 */
function raypathsklep_enqueue_block_editor_script() {
	$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	if (
		$current_screen &&
		$current_screen->is_block_editor() &&
		'widgets' !== $current_screen->id
	) {
		wp_enqueue_script(
			'raypathsklep-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			RAYPATHSKLEP_VERSION,
			true
		);
		wp_add_inline_script( 'raypathsklep-editor', "tailwindTypographyClasses = '" . esc_attr( RAYPATHSKLEP_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'raypathsklep_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function raypathsklep_tinymce_add_class( $settings ) {
	$settings['body_class'] = RAYPATHSKLEP_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'raypathsklep_tinymce_add_class' );

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function raypathsklep_modify_heading_levels( $args, $block_type ) {
	if ( 'core/heading' !== $block_type ) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array( 2, 3, 4 );

	return $args;
}
add_filter( 'register_block_type_args', 'raypathsklep_modify_heading_levels', 10, 2 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


// SVG upload (tylko dla adminów). Zalecany zewnętrzny sanitizer (np. Safe SVG).
add_filter(
	'upload_mimes',
	function( $mimes ) {
		if ( current_user_can( 'manage_options' ) ) {
			$mimes['svg'] = 'image/svg+xml';
		}
		return $mimes;
	}
);

// Nie wymuszaj MIME – bazuj na wp_check_filetype i ogranicz do SVG.
add_filter(
	'wp_check_filetype_and_ext',
	function( $data, $file, $filename, $mimes ) {
		$ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
		if ( 'svg' !== $ext ) {
			return $data;
		}

		$filetype    = wp_check_filetype( $filename, $mimes );
		$data['ext'] = $filetype['ext'];
		$data['type'] = $filetype['type'];

		return $data;
	},
	10,
	4
);


/**
 * Contact Form 7
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// disable WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_action( 'wp_enqueue_scripts', 'remove_wc_block_styles', 100 );
function remove_wc_block_styles() {
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-vendors-style' );
}

// edit woocommerce
add_theme_support('woocommerce');

//login form
add_action( 'template_redirect', function() {
    if ( isset($_POST['login']) ) {
        $GLOBALS['custom_login_errors'] = [];

        $creds = [
            'user_login'    => sanitize_text_field( $_POST['username'] ?? '' ),
            'user_password' => $_POST['password'] ?? '',
            'remember'      => false,
        ];

        if ( empty($creds['user_login']) || empty($creds['user_password']) ) {
            $GLOBALS['custom_login_errors'][] = 'Podaj adres e-mail i hasło.';
            return;
        }

        $user = wp_signon( $creds, is_ssl() );

        if ( is_wp_error($user) ) {
            $GLOBALS['custom_login_errors'][] = $user->get_error_message();
            return;
        }

        wp_set_current_user( $user->ID );
        wc_set_customer_auth_cookie( $user->ID );

        wp_redirect( wc_get_page_permalink('myaccount') );
        exit;
    }
});


add_action( 'template_redirect', function() {
    if ( ! is_user_logged_in() && is_page(66) ) {
        // Zachowaj notice'y na endpointach resetu hasła.
        if ( function_exists( 'is_wc_endpoint_url' ) && ( is_wc_endpoint_url( 'lost-password' ) || is_wc_endpoint_url( 'reset-password' ) ) ) {
            return;
        }
        // Zachowaj notice po rejestracji (param registered)
        if ( isset( $_GET['registered'] ) ) {
            return;
        }
        // usuwa zdublowane notice'y tylko na stronie customowego logowania
        remove_action( 'woocommerce_before_customer_login_form', 'woocommerce_output_all_notices', 10 );
        remove_action( 'woocommerce_account_content', 'woocommerce_output_all_notices', 5 );
    }
});

// Usuwanie konta z poziomu "Moje konto"
add_action( 'template_redirect', function() {
    if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
        return;
    }

    $action = isset( $_POST['delete_account_action'] ) ? sanitize_text_field( wp_unslash( $_POST['delete_account_action'] ) ) : '';
    if ( 'delete_account' !== $action ) {
        return;
    }

    if ( ! is_user_logged_in() ) {
        wc_add_notice( __( 'Musisz być zalogowany, aby usunąć konto.', 'raypathsklep' ), 'error' );
        return;
    }

    $nonce = isset( $_POST['delete-account-nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['delete-account-nonce'] ) ) : '';
    if ( ! wp_verify_nonce( $nonce, 'delete_account_action' ) ) {
        wc_add_notice( __( 'Nie udało się zweryfikować żądania.', 'raypathsklep' ), 'error' );
        return;
    }

    $user_id = get_current_user_id();
    if ( ! $user_id ) {
        wc_add_notice( __( 'Nie udało się odnaleźć konta.', 'raypathsklep' ), 'error' );
        return;
    }

    require_once ABSPATH . 'wp-admin/includes/user.php';

    $deleted = wp_delete_user( $user_id );

    if ( ! $deleted ) {
        wc_add_notice( __( 'Nie udało się usunąć konta.', 'raypathsklep' ), 'error' );
        return;
    }

    // Proste wylogowanie po usunięciu konta.
    wp_logout();

    wp_safe_redirect( home_url() );
    exit;
});

// Przekieruj bazowy widok "Moje konto" na "Moje dane" (adresy) tylko dla zalogowanych i bez parametru "registered"
add_action( 'template_redirect', function() {
    if ( ! is_account_page() ) {
        return;
    }

    // Jeśli dopiero co zarejestrowano (param registered) lub użytkownik nie jest zalogowany → nie przekierowuj
    if ( isset( $_GET['registered'] ) || ! is_user_logged_in() ) {
        return;
    }

    if ( function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url() ) {
        return;
    }

    wp_safe_redirect( wc_get_endpoint_url( 'edit-address', '', wc_get_page_permalink( 'myaccount' ) ) );
    exit;
});

// Nie loguj automatycznie po rejestracji – chcemy odesłać do logowania z komunikatem
add_filter( 'woocommerce_registration_auth_new_customer', '__return_false' );

// Po rejestracji: dodaj parametr do adresu, by pokazać komunikat
add_filter( 'woocommerce_registration_redirect', function( $redirect ) {
    return add_query_arg( 'registered', '1', wc_get_page_permalink( 'myaccount' ) );
});

// Wyświetl komunikat po rejestracji i nie przekierowuj dalej
add_action( 'template_redirect', function() {
    if ( ! is_account_page() ) {
        return;
    }

    if ( isset( $_GET['registered'] ) ) {
        wc_add_notice( __( 'Konto zostało zarejestrowane. Sprawdź skrzynkę mailową.', 'raypathsklep' ), 'success' );

        if ( is_user_logged_in() ) {
            wp_logout();
        }

        // Zostajemy na stronie logowania
        wp_safe_redirect( remove_query_arg( 'registered' ) );
        exit;
    }
}, 5 );

// remove register form text
remove_action( 'woocommerce_register_form', 'wc_registration_privacy_policy_text', 20 );
add_filter( 'woocommerce_registration_privacy_policy_text', function( $text ) {
    return ''; 
}, 9999 );




// quantity input
add_action( 'wp_footer', function() { ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.quantity').forEach(function(qty) {

        // Pomijamy jeśli już przetworzone
        if (qty.classList.contains('qty-enhanced')) return;
        qty.classList.add('qty-enhanced');

        const input = qty.querySelector('input.qty');
        if (!input) return;

		input.addEventListener('change', () => {
			const updateBtn = document.querySelector('button[name="update_cart"]');
			if(updateBtn) updateBtn.disabled = false;
		});

        // Tworzymy wrapper
        const wrapper = document.createElement('div');
        wrapper.className = 'qty-wrapper';

        // Tworzymy minus
        const btnMinus = document.createElement('button');
        btnMinus.type = 'button';
        btnMinus.className = 'qty-minus';
        btnMinus.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_2697_1935)">
			<path d="M3.125 10H16.875" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</g>
			<defs>
			<clipPath id="clip0_2697_1935">
			<rect width="20" height="20" fill="white"/>
			</clipPath>
			</defs>
			</svg>
        `;

        // Tworzymy plus
        const btnPlus = document.createElement('button');
        btnPlus.type = 'button';
        btnPlus.className = 'qty-plus';
        btnPlus.innerHTML = `
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_2697_1939)">
			<path d="M5 10H15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			<path d="M10 5V15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</g>
			<defs>
			<clipPath id="clip0_2697_1939">
			<rect width="20" height="20" fill="white"/>
			</clipPath>
			</defs>
			</svg>
        `;

        // Wstawiamy nową strukturę
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(btnMinus);
        wrapper.appendChild(input);
        wrapper.appendChild(btnPlus);

        // Funkcje zwiększania / zmniejszania
        btnMinus.addEventListener('click', () => {
            let v = parseInt(input.value);
            let min = parseInt(input.min) || 1;
            if (v > min) input.value = v - 1;
            input.dispatchEvent(new Event('change'));
        });

        btnPlus.addEventListener('click', () => {
            let v = parseInt(input.value);
            let max = parseInt(input.max) || 999999;
            if (v < max) input.value = v + 1;
            input.dispatchEvent(new Event('change'));
        });
    });
});
</script>
<?php });

// cart button
add_action('wp', function() {
    remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
});

add_action('woocommerce_proceed_to_checkout', function() {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="checkout-button button alt wc-forward">Przejdź do zamówienia</a>';
}, 20);

// products - hide counter and breadrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// single product - related products
add_filter( 'woocommerce_product_related_products_heading', function() {
    return 'Inni kupili';
});





function theme_enqueue_swiper() {
    // Ładuj tylko tam, gdzie faktycznie używamy sliderów (home i pojedynczy produkt)
    if ( ! is_page_template( 'template-pages/homepage.php' ) && ! is_singular( 'product' ) ) {
        return;
    }

    wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null );
    wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_swiper' );

// Odblokuj render: async CSS onload i defer JS dla Swiper
add_filter( 'style_loader_tag', function( $html, $handle ) {
    if ( 'swiper-css' === $handle ) {
        $html = str_replace( "rel='stylesheet'", "rel='stylesheet' media='print' onload=\"this.media='all'\"", $html );
    }
    return $html;
}, 10, 2 );

add_filter( 'script_loader_tag', function( $tag, $handle ) {
    if ( 'swiper-js' === $handle ) {
        // wstaw defer, pozostaw src i id
        if ( false === strpos( $tag, 'defer' ) ) {
            $tag = str_replace( '<script ', '<script defer ', $tag );
        }
    }
    return $tag;
}, 10, 2 );

// products variables
add_filter( 'woocommerce_variable_price_html', 'show_default_variation_price', 10, 2 );
function show_default_variation_price( $price, $product ) {
    // Pobierz domyślne atrybuty produktu
    $default_attributes = $product->get_default_attributes();

    if ( ! empty( $default_attributes ) ) {
        foreach ( $product->get_children() as $child_id ) {
            $variation = wc_get_product( $child_id );
            $match = true;

            foreach ( $default_attributes as $attr_name => $attr_value ) {
                $variation_attr = $variation->get_attribute( $attr_name );
                if ( $variation_attr !== $attr_value ) {
                    $match = false;
                    break;
                }
            }

            if ( $match ) {
                return $variation->get_price_html();
            }
        }
    }

    return $price; // fallback: zakres cen
}

// hide variable price
add_filter( 'woocommerce_variable_price_html', function( $price, $product ) {
    return ''; // nie pokazuj "od–do"
}, 10, 2 );


// Usuń standardowy button
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );

// Dodaj własny button
add_action( 'woocommerce_single_variation', function() {
    global $product;
    ?>
    <div class="woocommerce-variation-add-to-cart custom-variation-button">
        <?php woocommerce_quantity_input(); ?>
        <button type="submit" class="single_add_to_cart_button btn-transparent w-full mt-4">
        	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									<g clip-path="url(#clip0_4075_1856)">
										<path d="M14.6875 14.375H7.12266C6.82992 14.375 6.54649 14.2722 6.32177 14.0846C6.09705 13.897 5.94529 13.6365 5.89297 13.3484L3.80703 1.875H1.875" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M7.1875 17.5C8.05044 17.5 8.75 16.8004 8.75 15.9375C8.75 15.0746 8.05044 14.375 7.1875 14.375C6.32456 14.375 5.625 15.0746 5.625 15.9375C5.625 16.8004 6.32456 17.5 7.1875 17.5Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M14.6875 17.5C15.5504 17.5 16.25 16.8004 16.25 15.9375C16.25 15.0746 15.5504 14.375 14.6875 14.375C13.8246 14.375 13.125 15.0746 13.125 15.9375C13.125 16.8004 13.8246 17.5 14.6875 17.5Z" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M5.51172 11.25H15.3203C15.613 11.25 15.8965 11.1472 16.1212 10.9596C16.3459 10.772 16.4977 10.5115 16.55 10.2234L17.5 5H4.375" stroke="#3CB64A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</g>
									<defs>
										<clipPath id="clip0_4075_1856">
										<rect width="20" height="20" fill="white"/>
										</clipPath>
									</defs>
        	</svg>
            <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
        </button>
        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo esc_attr( $product->get_id() ); ?>" />
        <input type="hidden" name="variation_id" class="variation_id" value="0" />
    </div>
    <?php
}, 20 );


// Change account navigation 
add_filter( 'woocommerce_account_menu_items', function( $items ) {
    return [
        'edit-address'     => 'Moje dane',
        'orders'           => 'Zamówienia',
        'edit-account'     => 'Ustawienia konta',
        'customer-logout'  => 'Wyloguj się',
    ];
} );

// Dodaj endpoint dla danych do faktury
add_action( 'init', function() {
    add_rewrite_endpoint( 'edytuj-faktura', EP_PAGES );
} );

// Zarejestruj endpoint w WooCommerce (żeby był rozpoznawany w zapytaniach)
add_filter( 'woocommerce_get_query_vars', function( $vars ) {
    $vars['edytuj-faktura'] = 'edytuj-faktura';
    return $vars;
} );

// Flush rewrite rules po aktywacji (jednorazowo)
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

// Dodaj endpoint do menu (opcjonalnie, jeśli chcesz mieć w menu)
// add_filter( 'woocommerce_account_menu_items', function( $items ) {
//     $items['edytuj-faktura'] = 'Dane do faktury';
//     return $items;
// } );

// Obsługa zapisu danych faktury
add_action( 'template_redirect', function() {
    if ( ! is_user_logged_in() ) {
        return;
    }

    // Sprawdź czy formularz został wysłany (niezależnie od endpointu)
    if ( isset( $_POST['save_invoice_address'] ) && $_POST['save_invoice_address'] === '1' ) {
        // Sprawdź nonce
        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'woocommerce-edit-invoice-address' ) ) {
            wc_add_notice( 'Błąd bezpieczeństwa. Spróbuj ponownie.', 'error' );
            return;
        }

        $user_id = get_current_user_id();

        // Lista pól do zapisania (tylko: company, NIP, adres)
        $invoice_fields = array(
            'invoice_company',
            'invoice_nip',
            'invoice_address_1',
            'invoice_postcode',
            'invoice_city',
            'invoice_country',
        );

        // Zapisz wszystkie pola
        foreach ( $invoice_fields as $field ) {
            if ( isset( $_POST[ $field ] ) && ! empty( trim( $_POST[ $field ] ) ) ) {
                $value = sanitize_text_field( $_POST[ $field ] );
                update_user_meta( $user_id, $field, $value );
            } else {
                // Jeśli pole nie zostało przesłane lub jest puste, usuń je (dla opcjonalnych pól)
                if ( in_array( $field, array( 'invoice_company', 'invoice_nip' ) ) ) {
                    delete_user_meta( $user_id, $field );
                }
            }
        }

        wc_add_notice( 'Dane do faktury zostały zaktualizowane.', 'success' );
        // Przekieruj do głównego widoku adresów (tak jak WooCommerce domyślnie)
        wp_safe_redirect( wc_get_endpoint_url( 'edit-address' ) );
        exit;
    }
} );

// Wyświetl formularz faktury
add_action( 'woocommerce_account_edytuj-faktura_endpoint', function() {
    wc_get_template( 'myaccount/form-edit-invoice.php' );
} );

// JavaScript do pokazywania/ukrywania pól faktury w checkout
add_action( 'wp_footer', function() {
    if ( ! is_checkout() ) {
        return;
    }
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const invoiceCheckbox = document.getElementById('want_invoice');
        const invoiceFields = document.getElementById('invoice-fields');
        
        if ( invoiceCheckbox && invoiceFields ) {
            // Funkcja pokazująca/ukrywająca pola
            function toggleInvoiceFields() {
                if ( invoiceCheckbox.checked ) {
                    invoiceFields.style.display = 'block';
                    // Ustaw wymagane pola
                    invoiceFields.querySelectorAll('input[required], select[required]').forEach(function(field) {
                        field.setAttribute('required', 'required');
                    });
                } else {
                    invoiceFields.style.display = 'none';
                    // Usuń wymagane pola
                    invoiceFields.querySelectorAll('input[required], select[required]').forEach(function(field) {
                        field.removeAttribute('required');
                    });
                }
            }
            
            // Nasłuchuj zmian checkboxa
            invoiceCheckbox.addEventListener('change', toggleInvoiceFields);
            
            // Sprawdź stan początkowy
            toggleInvoiceFields();
        }
    });
    </script>
    <?php
} );

// Zapisz dane faktury do zamówienia
add_action( 'woocommerce_checkout_update_order_meta', function( $order_id ) {
    if ( isset( $_POST['want_invoice'] ) && $_POST['want_invoice'] === '1' ) {
        // Zapisz checkbox
        update_post_meta( $order_id, '_want_invoice', 'yes' );
        
        // Zapisz dane faktury
        $invoice_fields = array(
            'invoice_company',
            'invoice_nip',
            'invoice_address_1',
            'invoice_postcode',
            'invoice_city',
            'invoice_country',
        );
        
        foreach ( $invoice_fields as $field ) {
            if ( isset( $_POST[ $field ] ) && ! empty( trim( $_POST[ $field ] ) ) ) {
                update_post_meta( $order_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
            }
        }
    }
} );

// Zmień nagłówek "Dane rozliczeniowe" na "Dane płatności" w widoku zamówienia
add_filter( 'gettext', function( $translated_text, $text, $domain ) {
    // Zmień tylko w kontekście WooCommerce i tylko dla "Billing address"
    if ( $domain === 'woocommerce' && $text === 'Billing address' ) {
        // Sprawdź czy jesteśmy w widoku zamówienia (myaccount/view-order)
        if ( is_account_page() && isset( $_GET['view-order'] ) ) {
            return 'Dane płatności';
        }
        // Zmień też w innych miejscach WooCommerce związanych z billingiem
        if ( is_account_page() || is_checkout() ) {
            return 'Dane płatności';
        }
    }
    // Zmień też "Billing details" na "Dane płatności"
    if ( $domain === 'woocommerce' && $text === 'Billing details' ) {
        if ( is_account_page() || is_checkout() ) {
            return 'Dane płatności';
        }
    }
    return $translated_text;
}, 20, 3 );

// Usuń tekst "Wysyłka" przed listą metod dostawy (pakiet shipping package title)
add_filter( 'woocommerce_shipping_package_name', function( $package_name, $i, $package ) {
	return '';
}, 10, 3 );

/**
 * Pobiera listę ID produktów z ulubionych.
 *
 * @param int|null $user_id Opcjonalnie, ID użytkownika (domyślnie bieżący).
 * @return array
 */
function raypath_get_wishlist_ids( $user_id = null ) {
	$user_id  = $user_id ? absint( $user_id ) : get_current_user_id();
	$wishlist = array();

	if ( $user_id ) {
		$wishlist = get_user_meta( $user_id, 'raypath_wishlist', true );
	} elseif ( isset( $_COOKIE['raypath_wishlist'] ) ) {
		$decoded = json_decode( wp_unslash( $_COOKIE['raypath_wishlist'] ), true );
		if ( is_array( $decoded ) ) {
			$wishlist = $decoded;
		}
	}

	if ( ! is_array( $wishlist ) ) {
		$wishlist = array();
	}

	$wishlist = array_filter( array_map( 'absint', $wishlist ) );

	return array_values( array_unique( $wishlist ) );
}

/**
 * Zapisuje listę ulubionych do meta użytkownika.
 *
 * @param array    $wishlist Lista ID produktów.
 * @param int|null $user_id  Opcjonalnie, ID użytkownika (domyślnie bieżący).
 * @return void
 */
function raypath_set_wishlist_ids( $wishlist, $user_id = null ) {
	$user_id  = $user_id ? absint( $user_id ) : get_current_user_id();
	$wishlist = array_values( array_unique( array_filter( array_map( 'absint', (array) $wishlist ) ) ) );

	if ( ! $user_id ) {
		return;
	}

	update_user_meta( $user_id, 'raypath_wishlist', $wishlist );
}

/**
 * AJAX: dodawanie/usuwanie ulubionych (dla zalogowanych).
 */
function raypath_update_wishlist() {
	check_ajax_referer( 'raypath_wishlist', 'nonce' );

	if ( ! is_user_logged_in() ) {
		wp_send_json_error(
			array(
				'message' => __( 'Zaloguj się, aby zapisać ulubione na koncie.', 'raypathsklep' ),
			),
			401
		);
	}

	$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
	$intent     = isset( $_POST['intent'] ) ? sanitize_text_field( wp_unslash( $_POST['intent'] ) ) : 'add';

	if ( ! $product_id || 'product' !== get_post_type( $product_id ) ) {
		wp_send_json_error(
			array(
				'message' => __( 'Nie znaleziono produktu.', 'raypathsklep' ),
			),
			400
		);
	}

	$wishlist    = raypath_get_wishlist_ids( get_current_user_id() );
	$is_in_list  = in_array( $product_id, $wishlist, true );
	$current_uid = get_current_user_id();

	if ( 'remove' === $intent ) {
		$wishlist = array_values( array_diff( $wishlist, array( $product_id ) ) );
		raypath_set_wishlist_ids( $wishlist, $current_uid );

		wp_send_json_success(
			array(
				'wishlist' => $wishlist,
				'removed'  => true,
				'message'  => __( 'Produkt usunięto z ulubionych.', 'raypathsklep' ),
			)
		);
	}

	if ( $is_in_list ) {
		wp_send_json_success(
			array(
				'wishlist' => $wishlist,
				'added'    => false,
				'message'  => __( 'Produkt jest już na liście ulubionych.', 'raypathsklep' ),
			)
		);
	}

	$wishlist[] = $product_id;
	$wishlist   = array_values( array_unique( $wishlist ) );

	raypath_set_wishlist_ids( $wishlist, $current_uid );

	wp_send_json_success(
		array(
			'wishlist' => $wishlist,
			'added'    => true,
			'message'  => __( 'Dodano produkt do ulubionych.', 'raypathsklep' ),
		)
	);
}
add_action( 'wp_ajax_raypath_update_wishlist', 'raypath_update_wishlist' );

if ( ! function_exists( 'raypath_get_product_badges' ) ) {
	/**
	 * Zwraca listę znaczników badge dla produktu (promocja, bestseller).
	 *
	 * @param WC_Product|int $product Produkt lub ID produktu.
	 * @return array<string> Lista gotowych do wstawienia elementów HTML.
	 */
	function raypath_get_product_badges( $product ) {
		if ( ! $product instanceof WC_Product ) {
			$product = wc_get_product( $product );
		}

		if ( ! $product ) {
			return array();
		}

		$badges = array();

		if ( $product->is_on_sale() ) {
			$badges[] = '<div class="p-1.5 rounded bg-red text-xs text-center text-[#ececec]">Promocja</div>';
		}

		if ( has_term( 'bestsellery', 'product_tag', $product->get_id() ) ) {
			$badges[] = '<div class="p-1.5 rounded bg-typo text-xs text-center text-[#ececec]">Bestseller</div>';
		}

		return $badges;
	}
}