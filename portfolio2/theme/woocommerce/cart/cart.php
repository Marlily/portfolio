<?php
/**
 * Custom Cart Template - Kolumnowy div layout
 * Template dla WooCommerce 10+
 */

defined( 'ABSPATH' ) || exit;

get_header(); 
?>

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

    <?php wc_print_notices(); ?>


        <div class="flex flex-col xl:flex-row gap-8"> 

            <!-- LEWA KOLUMNA: Produkty w koszyku -->
             <form class="woocommerce-cart-form w-full xl:w-2/3 border border-medium-grey p-5 lg:p-10 rounded-3xl bg-white" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
                <div class="">
                <div class="shop_table shop_table_responsive cart">
                    <h1 class="text-[2rem]/[120%] font-medium text-typo mb-10">Koszyk</h1>

                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                        $_product   = $cart_item['data'];
                        $product_id = $cart_item['product_id'];

                        if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 ) continue;

                        $thumbnail = $_product->get_image( 'thumbnail' );
                        $name      = $_product->get_name();
                        $price     = wc_price( $_product->get_price() );
                        $subtotal  = wc_price( $_product->get_price() * $cart_item['quantity'] );
                    ?>

                    <div class="flex items-center mb-4">

                        <!-- Thumbnail -->
                        <a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>" class="block w-20 h-20 flex-shrink-0 border border-medium-grey rounded-lg mr-6">
                            <?php echo $thumbnail; ?>
                        </a>

                        <!-- Nazwa i cena jednostkowa -->
                        <div class="flex-1 mr-12">
                            <a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>" class="block font-medium text-base/[120%] xl:text-2xl/[120%] mb-2 typo-text hover:text-accent-dark transtion"><?php echo esc_html( $name ); ?></a>
                            <p class="text-base/[140%] text-accent-dark font-medium"><?php echo wp_kses_post( $price ); ?></p>
                        </div>

                        <!-- Ilość -->
                        <div class="flex mr-12 cart-quantity-input items-center gap-4">
                            <div class="">
                                <?php
                                echo woocommerce_quantity_input( [
                                    'input_name'  => "cart[{$cart_item_key}][qty]",
                                    'input_value' => $cart_item['quantity'],
                                    'min_value'   => 0,
                                    'max_value'   => $_product->get_max_purchase_quantity(),
                                ], $_product, false );
                                ?>
                            </div>
                            <span class="text-base/[140%] text-[#161616] font-medium">szt</span>
                        </div>

                        <!-- Cena całkowita -->
                        <div class="w-24 text-right mr-12 text-base/[140%] text-accent-dark font-medium">
                            <?php echo wp_kses_post( $subtotal ); ?>
                        </div>

                        <!-- Usuń -->
                        <div class="w-8 text-center">
                            <?php
                            echo sprintf(
                                '<a href="%s" class="text-red-500 hover:text-red-700 cart-remove-trigger" aria-label="Usuń produkt" data-product_id="%s" data-product_name="%s"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2470_10672)">
                                <path d="M16.875 4.375H3.125" stroke="#D50000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.125 8.125V13.125" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.875 8.125V13.125" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.625 4.375V16.25C15.625 16.4158 15.5592 16.5747 15.4419 16.6919C15.3247 16.8092 15.1658 16.875 15 16.875H5C4.83424 16.875 4.67527 16.8092 4.55806 16.6919C4.44085 16.5747 4.375 16.4158 4.375 16.25V4.375" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.125 4.375V3.125C13.125 2.79348 12.9933 2.47554 12.7589 2.24112C12.5245 2.0067 12.2065 1.875 11.875 1.875H8.125C7.79348 1.875 7.47554 2.0067 7.24112 2.24112C7.0067 2.47554 6.875 2.79348 6.875 3.125V4.375" stroke="#D50000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_2470_10672">
                                <rect width="20" height="20" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                                </a>',
                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                esc_attr( $product_id ),
                                esc_attr( wp_strip_all_tags( $name ) )
                            );
                            ?>
                        </div>

                </div>

                <?php endforeach; ?>
                

                <div class="text-right">
                    <button type="submit" class="btn-transparent" name="update_cart" value="Aktualizuj koszyk">Aktualizuj koszyk</button>
                    <input type="hidden" name="update_cart" value="1">
                </div>
            
                </div>
                
                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </div>
            </form>

            <!-- PRAWA KOLUMNA: Podsumowanie koszyka -->
            <div class="w-full lg:w-1/3 ml-auto border border-medium-grey p-10 rounded-3xl bg-white">
                <?php woocommerce_cart_totals(); ?>
            </div>

        </div>

        <!-- Modal potwierdzenia usunięcia pozycji z koszyka -->
        <div class="cart-remove-modal hidden fixed inset-0 bg-black/20 justify-center items-center z-99999 p-4">
            <div class="absolute inset-0 cart-remove-modal__backdrop"></div>
            <div class="relative bg-white rounded-2xl p-6 lg:p-8 max-w-[calc(100%-2rem)] w-140 shadow-xl">
                <h2 class="text-xl font-medium text-typo mb-2">Usunąć produkt z koszyka?</h2>
                <p class="text-base text-typo mb-6"><span data-cart-remove-name></span></p>
                <div class="flex gap-3 justify-end">
                    <button type="button" class="btn bg-red border border-red hover:border-red hover:bg-transparent hover:text-red cart-remove-confirm">Usuń</button>
                    <button type="button" class="btn-transparent cart-remove-cancel">Anuluj</button>
                </div>
            </div>
        </div>

</main>


<?php get_footer(); ?>

<script>
    (() => {
        const modal = document.querySelector('.cart-remove-modal');
        if (!modal) return;

        const modalName = modal.querySelector('[data-cart-remove-name]');
        const confirmBtn = modal.querySelector('.cart-remove-confirm');
        const cancelBtn = modal.querySelector('.cart-remove-cancel');
        const backdrop = modal.querySelector('.cart-remove-modal__backdrop');
        const triggers = document.querySelectorAll('.cart-remove-trigger');

        let pendingHref = '';

        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            pendingHref = '';
        };

        const openModal = (href, name) => {
            pendingHref = href;
            if (modalName) {
                modalName.textContent = name ? `Na pewno chcesz usunąć „${name}”?` : 'Na pewno chcesz usunąć ten produkt?';
            }
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        };

        triggers.forEach((trigger) => {
            trigger.addEventListener('click', (event) => {
                event.preventDefault();
                const href = trigger.getAttribute('href');
                const name = trigger.dataset.product_name || '';
                if (!href) return;
                openModal(href, name);
            });
        });

        confirmBtn?.addEventListener('click', () => {
            if (pendingHref) {
                window.location.href = pendingHref;
            } else {
                closeModal();
            }
        });

        [cancelBtn, backdrop].forEach((el) => {
            el?.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    })();
</script>
