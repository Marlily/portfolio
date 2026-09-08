<header class="header-menu border-b border-white/5 fixed w-full top-0 left-0 z-50 bg-linear-[180deg] from-transparent to-[rgba(10,10,10,0.16)]">

    <div class="bg-transparent absolute w-full h-full left-0 top-0 backdrop-blur-xs overflow-hidden -z-10"
         style="-webkit-mask-image: linear-gradient(to bottom, black 60%, transparent 100%); mask-image: linear-gradient(to bottom, black 60%, transparent 100%);"></div>
    <div class="flex items-center justify-between px-4 lg:pl-[3.84rem] lg:pr-[6.9rem] py-4 lg:py-6">

        <?php if ( qorttheme_logo_url() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0">
                <img data-no-lazy="1" src="<?php echo esc_url( qorttheme_logo_url() ); ?>"
                     alt="<?php bloginfo( 'name' ); ?>"
                     class="h-9 w-auto max-w-58" loading="eager" fetchpriority="high" />
            </a>
        <?php endif; ?>

        <!-- Hamburger / Close (tylko mobile) -->
        <button id="nav-toggle"
                class="lg:hidden p-2 -mr-2 text-white"
                aria-label="Otwórz menu"
                aria-expanded="false">
            <svg id="nav-icon-open" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
            <svg id="nav-icon-close" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"
                 class="hidden">
                <line x1="5" y1="5" x2="19" y2="19"/>
                <line x1="19" y1="5" x2="5" y2="19"/>
            </svg>
        </button>

        <!-- Nawigacja desktopowa -->
        <?php
        wp_nav_menu( [
            'theme_location'  => 'primary',
            'container'       => 'nav',
            'container_class' => 'hidden lg:flex',
            'menu_class'      => '',
            'items_wrap'      => '<ul class="flex items-center gap-8">%3$s</ul>',
            'walker'          => new QORT_Nav_Walker(),
        ] );
        ?>

    </div>

</header>

<!-- Pełnoekranowe menu mobilne -->
<div id="nav-overlay"
     class="fixed inset-0 z-40 bg-blue-950 flex-col px-8 pt-20 pb-12 hidden opacity-0 transition-opacity duration-300"
     aria-hidden="true">
    <div class="flex-1 flex flex-col justify-center">
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '<ul class="flex flex-col gap-1">%3$s</ul>',
            'walker'         => new QORT_Mobile_Walker(),
        ] );
        ?>
    </div>
</div>
