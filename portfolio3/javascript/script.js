/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

// import Swiffy Slider JS
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

window.addEventListener("load", () => {

    // Hero Slider Initialization
    if( document.querySelector(".swiper-hero") ) {
        const heroSlider = new Swiper('.swiper-hero', {
            modules: [Navigation],
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: false,
            effect: 'fade',
            spaceBetween: 32,
            fadeEffect: {
                crossFade: true
            },
            navigation: {
                nextEl: '.swiper-hero .swiper-button-next',
                prevEl: '.swiper-hero .swiper-button-prev',
            },
        });
    }

    // Categories Slider Initialization
    if( document.querySelector(".categories-swiper") ) {
        const categoriesSlider = new Swiper('.categories-swiper', {
            modules: [Navigation],
            slidesPerView: 5,
            slidesPerGroup: 1,
            spaceBetween: 32,
            loop: false,
            navigation: {
                nextEl: '.categories-swiper .swiper-button-next',
                prevEl: '.categories-swiper .swiper-button-prev',
            },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 16 },
                640: { slidesPerView: 2, spaceBetween: 16 },
                1024: { slidesPerView: 'auto', spaceBetween: 32 },
            }
        });
    }

    // Products Slider Initialization
    if( document.querySelectorAll('.products-swiper').length > 0 ) {
        document.querySelectorAll('.products-swiper').forEach(function (slider) {
            const productsSlider = new Swiper(slider, {
                modules: [Navigation],
                slidesPerView: 5,
                slidesPerGroup: 1,
                spaceBetween: 32,
                loop: false,
                navigation: {
                    nextEl: slider.querySelector('.swiper-button-next'),
                    prevEl: slider.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
                    0: { slidesPerView: 1.3, spaceBetween: 16 },
                    640: { slidesPerView: 2.3, spaceBetween: 16 },
                    1024: { slidesPerView: 'auto', spaceBetween: 32 },
                }
            });
        });
    }


    // Products tabs
    if( document.querySelector("#products-tabs") ) {
        const tabs = document.querySelectorAll(".products-tabs-item");

        const showBestProducts = () => {
            document.querySelector("#promocje").classList.remove("active");
            document.querySelector("#promocje").classList.add("opacity-0");
            document.querySelector("#promocje").classList.add("hidden");
            document.querySelector("#polecane").classList.add("active");
            document.querySelector("#polecane").classList.remove("hidden");
            document.querySelector("#polecane").classList.remove("opacity-0");

            document.querySelector("button[data-target='polecane']").classList.add("text-accent-dark");
            document.querySelector("button[data-target='polecane']").classList.remove("text-black");
            document.querySelector("button[data-target='promocje']").classList.remove("text-accent-dark");
            document.querySelector("button[data-target='polecane']").classList.add("active");
        }

        if(window.innerWidth < 1024) {
            showBestProducts();
        }

        window.addEventListener("resize", () => {
            if(window.innerWidth < 1024) {
                showBestProducts();
            }
        })

        tabs.forEach((tab) => {
            tab.addEventListener("click", (e) => {

                if(window.innerWidth < 1024) {
                    return;
                }

                if(e.currentTarget.classList.contains("active")) {
                    return;
                }

                tabs.forEach((tab) => {
                    tab.classList.remove("text-accent-dark");
                    tab.classList.add("text-black");
                    tab.classList.remove("active");
                })
                
                let clickedTab = e.currentTarget.dataset.target;
                e.currentTarget.classList.remove("text-black");
                e.currentTarget.classList.add("text-accent-dark");
                e.currentTarget.classList.add("active");

                document.querySelectorAll(".products-slider-item").forEach((tabItem) => {
                    tabItem.classList.add("hidden");
                    tabItem.classList.add("opacity-0");
                });

                document.querySelector(`#${clickedTab}`).classList.remove("hidden");

                setTimeout( () => {
                    document.querySelector(`#${clickedTab}`).classList.remove("opacity-0");
                }, 100);
            });
        });
    }

    if(document.querySelector('.mega-menu-btn')) {
        document.querySelectorAll('.mega-menu-btn').forEach((btn) => {
            btn.addEventListener('mouseenter', () => {
                btn.querySelector('.mega-menu-wrapper').classList.remove('hidden');
                btn.querySelector('.mega-menu-wrapper').classList.add('flex');

                setTimeout(() => {
                    btn.querySelector('.mega-menu-wrapper').classList.add('opacity-100');
                    btn.querySelector('.mega-menu-wrapper').classList.remove('opacity-0');
                }, 100)
                
            })

            document.querySelectorAll('.mega-menu-wrapper').forEach((wrapper) => {
                wrapper.addEventListener('mouseleave', () => {
                    wrapper.classList.remove('opacity-100');
                    wrapper.classList.add('opacity-0');
                    setTimeout(() => {
                        wrapper.classList.add('hidden');
                    }, 300)
                })
            })
        })
        
    }

    if(document.querySelector('#mobile-menu-btn')) {
        document.querySelector('#mobile-menu-btn').addEventListener('click', () => {
            document.querySelector('.mobile-menu').classList.toggle('hidden');

            if ( document.querySelector('.mobile-menu').classList.contains('hidden') ) {
                document.querySelector('#mobile-menu-btn').classList.remove( 'open' );
            }

            if ( !document.querySelector('.mobile-menu').classList.contains('hidden') ) {
                document.querySelector('#mobile-menu-btn').classList.add( 'open' );
            }

        })
    }

    if( document.querySelector('.mobile-menu-item-arrow')  ) {
        document.querySelectorAll('.mobile-menu-item-arrow').forEach((item) => {
            item.addEventListener('click', () => {
                item.querySelector('ul').classList.toggle('hidden');
                item.querySelector('svg').classList.toggle('rotate-180');
            })
        })
    }

    // Powiadomienie toast po dodaniu produktu do koszyka (AJAX)
    const createCartToast = (message) => {
        const containerId = 'raypath-cart-toast';
        let container = document.getElementById(containerId);

        if (!container) {
            container = document.createElement('div');
            container.id = containerId;
            Object.assign(container.style, {
                position: 'fixed',
                top: '24px',
                right: '24px',
                zIndex: '99999',
                display: 'flex',
                flexDirection: 'column',
                gap: '10px',
                pointerEvents: 'none',
            });
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.textContent = message;
        Object.assign(toast.style, {
            background: '#286D2E',
            color: '#fff',
            padding: '12px 16px',
            borderRadius: '12px',
            boxShadow: '0 10px 30px rgba(0, 0, 0, 0.12)',
            fontWeight: '600',
            opacity: '0',
            transform: 'translateY(-6px)',
            transition: 'opacity 0.3s ease, transform 0.3s ease',
            pointerEvents: 'auto',
        });

        container.appendChild(toast);

        requestAnimationFrame(() => {
            toast.style.opacity = '1';
            toast.style.transform = 'translateY(0)';
        });

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(-6px)';
            setTimeout(() => {
                toast.remove();
                if (!container.childElementCount) {
                    container.remove();
                }
            }, 350);
        }, 3000);
    };

    if (window.jQuery) {
        window.jQuery(document.body).on('added_to_cart', (event, fragments, cartHash, $button) => {
            if ($button && $button.length) {
                $button.siblings('.added_to_cart').remove();
            }
            createCartToast('Dodano do koszyka!');
        });
    }

});