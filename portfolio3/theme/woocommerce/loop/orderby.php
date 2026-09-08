<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id_suffix = wp_unique_id();

?>
<?php
$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
	'menu_order' => __( 'Sortowanie domyślne', 'woocommerce' ),
	'date'       => __( 'Sortuj wg najnowszych', 'woocommerce' ),
	'price'      => __( 'Sortuj wg ceny: od najniższej', 'woocommerce' ),
	'price-desc' => __( 'Sortuj wg ceny: od najwyższej', 'woocommerce' ),
) );

// Ukryj sortowanie wg oceny na widoku archiwum.
unset( $catalog_orderby_options['rating'] );

$orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : 'menu_order';
if ( 'rating' === $orderby ) {
	$orderby = 'menu_order';
}
?>

<form class="woocommerce-ordering custom-ordering relative max-w-[13rem] ml-auto" method="get">

    <!-- HIDDEN SELECT woo -->
    <select name="orderby" class="orderby hidden-select">
        <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
            <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>>
                <?php echo esc_html( $name ); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- CUSTOM DROPDOWN -->
    <div class="dropdown">
        <div class="dropdown-selected flex items-center justify-between transition bg-white rounded-lg py-0 px-0 cursor-pointer text-base/[140%] font-medium text-typo">
			<span class="mr-3">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<g clip-path="url(#clip0_4053_4847)">
						<path d="M10.5 16.5L7.5 19.5L4.5 16.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M7.5 4.5V19.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M13.5 7.5L16.5 4.5L19.5 7.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M16.5 19.5V4.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
					</g>
					<defs>
						<clipPath id="clip0_4053_4847">
						<rect width="24" height="24" fill="white"/>
						</clipPath>
					</defs>
				</svg>
			</span>
            <span class="dropdown-label"><?php echo esc_html( $catalog_orderby_options[$orderby] ); ?></span>
            <span class="icon-arrow ml-2 transition">
				<svg xmlns="http://www.w3.org/2000/svg" width="11" height="6" viewBox="0 0 11 6" fill="none">
				<path d="M10.854 0.854028L5.85403 5.85403C5.80759 5.90052 5.75245 5.9374 5.69175 5.96256C5.63105 5.98772 5.56599 6.00067 5.50028 6.00067C5.43457 6.00067 5.36951 5.98772 5.30881 5.96256C5.24811 5.9374 5.19296 5.90052 5.14653 5.85403L0.146528 0.854028C0.0527077 0.760208 0 0.63296 0 0.500278C0 0.367596 0.0527077 0.240348 0.146528 0.146528C0.240348 0.0527074 0.367596 0 0.500278 0C0.63296 0 0.760208 0.0527074 0.854028 0.146528L5.50028 4.7934L10.1465 0.146528C10.193 0.100073 10.2481 0.0632225 10.3088 0.0380812C10.3695 0.0129398 10.4346 0 10.5003 0C10.566 0 10.631 0.0129398 10.6917 0.0380812C10.7524 0.0632225 10.8076 0.100073 10.854 0.146528C10.9005 0.192983 10.9373 0.248133 10.9625 0.30883C10.9876 0.369526 11.0006 0.434581 11.0006 0.500278C11.0006 0.565975 10.9876 0.63103 10.9625 0.691726C10.9373 0.752423 10.9005 0.807573 10.854 0.854028Z" fill="#3A3A3A"/>
				</svg>
			</span>
        </div>

        <div class="dropdown-options hidden absolute left-0 right-0 bg-white rounded-lg mt-2 z-10">
            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                <div class="dropdown-option py-2 px-3 hover:bg-medium-grey transition cursor-pointer" data-value="<?php echo esc_attr($id); ?>">
                    <?php echo esc_html($name); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <input type="hidden" name="paged" value="1" />
    <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>

</form>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const dropdowns = document.querySelectorAll(".custom-ordering .dropdown");

    dropdowns.forEach(dropdown => {
        const selected = dropdown.querySelector(".dropdown-selected");
        const arrow = dropdown.querySelector(".dropdown-selected .icon-arrow");
        const options = dropdown.querySelector(".dropdown-options");
        const trueSelect = dropdown.parentElement.querySelector("select");
        const label = dropdown.querySelector(".dropdown-label");

        // Pokaz/ukryj
        selected.addEventListener("click", () => {
            options.style.display = options.style.display === "block" ? "none" : "block";
            arrow.style.transform = options.style.display === "block" ? "rotate(180deg)" : "";
        });

        options.querySelectorAll(".dropdown-option").forEach(opt => {
            opt.addEventListener("click", () => {
                const value = opt.getAttribute("data-value");

                trueSelect.value = value;

                if (label) {
                    label.textContent = opt.textContent.trim();
                }

                trueSelect.form.submit();
                options.style.display = "none";
                arrow.style.transform = "";
            });
        });

        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target)) {
                options.style.display = "none";
            }
        });
    });
});

</script>

<style>
.hidden-select {
    display: none !important;
}

.dropdown-option:hover {
    background: #f2f2f2;
}

.dropdown-option.active {
    background: #eaeaea;
    font-weight: 500;
}
</style>