<?php $nav_cta_text = mb_option('nav_cta_text') ?: pll__('Bezpłatna wycena produktów'); ?>
<header class="header-menu sticky top-0 z-50 border-b border-blue-gray-50 bg-white shadow-[0_10px_20px_rgba(33,40,53,0.04)] transition">

    <div class="container-content menu-padding flex items-center justify-between py-6 lg:h-24 lg:py-0">

        <a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/img/logo.svg'); ?>"
                    width="106"
                    height="60"
                    alt="<?php bloginfo('name'); ?>"
                    class="h-10 w-auto lg:h-[3.75rem]"
                >
            <?php endif; ?>
        </a>

        <nav class="hidden items-center gap-10 lg:flex">
            <ul class="flex items-center gap-10">
                <?php foreach (importio_get_menu_items() as $item) : ?>
                    <li class="group relative shrink-0">
                        <a
                            href="<?php echo esc_url($item['url']); ?>"
                            class="flex h-12 items-center justify-center gap-2 border-b-2 border-transparent py-2 text-[0.9375rem] font-semibold text-blue-gray-500 transition group-hover:border-orange-500 group-hover:text-orange-500 group-focus-within:border-orange-500 group-focus-within:text-orange-500"
                        >
                            <?php echo esc_html($item['label']); ?>
                            <?php if ($item['caret']) : ?>
                                <?php echo importio_get_icon('caret-down', 'size-4 shrink-0 transition group-hover:-scale-y-100 group-focus-within:-scale-y-100'); ?>
                            <?php endif; ?>
                        </a>

                        <?php if (!empty($item['children'])) : ?>
                            <div class="invisible absolute left-0 top-full z-20 w-64 pt-3 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
                                <ul class="flex flex-col overflow-hidden rounded-2xl bg-white py-2 shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.1)]">
                                    <?php foreach ($item['children'] as $child) : ?>
                                        <li class="border-b border-blue-500/5 last:border-b-0">
                                            <a
                                                href="<?php echo esc_url($child['url']); ?>"
                                                class="flex h-10 items-center px-4 text-base text-blue-gray-500 transition hover:bg-orange-50 hover:text-orange-700"
                                            >
                                                <?php echo esc_html($child['label']); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="<?php echo esc_url(importio_get_quote_page_url()); ?>" class="btn btn-primary shrink-0">
                <?php echo esc_html($nav_cta_text); ?>
                <?php echo importio_get_icon('arrow-right', 'size-4 shrink-0'); ?>
            </a>

            <?php if (function_exists('pll_the_languages')) :
                $importio_flag_icons = ['pl' => 'flag-pl', 'en' => 'flag-gb'];
                $importio_languages  = pll_the_languages(['raw' => 1, 'hide_if_empty' => 0]);
                $importio_current    = wp_list_filter($importio_languages, ['current_lang' => true]);
                $importio_current    = $importio_current ? reset($importio_current) : reset($importio_languages);
            ?>
                <div class="group relative shrink-0">
                    <button
                        type="button"
                        class="flex h-12 items-center justify-center gap-2 border-b-2 border-transparent py-2 transition group-hover:border-orange-500 group-focus-within:border-orange-500"
                        aria-label="<?php pll_esc_attr_e('Zmień język'); ?>"
                    >
                        <?php echo importio_get_icon($importio_flag_icons[$importio_current['slug']] ?? 'flag-pl', 'size-8 shrink-0'); ?>
                        <?php echo importio_get_icon('caret-down', 'size-4 shrink-0 text-blue-gray-500 transition group-hover:-scale-y-100 group-focus-within:-scale-y-100'); ?>
                    </button>

                    <div class="invisible absolute right-0 top-full z-20 w-40 pt-3 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
                        <ul class="flex flex-col overflow-hidden rounded-2xl bg-white py-2 shadow-[0_0.625rem_2.5rem_-0.1875rem_rgba(33,40,53,0.1)]">
                            <?php foreach ($importio_languages as $importio_language) : ?>
                                <li class="border-b border-blue-500/5 last:border-b-0">
                                    <a
                                        href="<?php echo esc_url($importio_language['url']); ?>"
                                        class="flex h-10 items-center gap-2 px-4 text-base text-blue-gray-500 transition hover:bg-orange-50 hover:text-orange-700"
                                    >
                                        <?php echo importio_get_icon($importio_flag_icons[$importio_language['slug']] ?? 'flag-pl', 'size-6 shrink-0'); ?>
                                        <?php echo esc_html($importio_language['name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </nav>

        <button
            id="nav-toggle"
            type="button"
            class="btn btn-secondary-dark btn-icon lg:hidden"
            aria-expanded="false"
            aria-controls="mobile-nav"
            aria-label="Menu"
        >
            <?php echo importio_get_icon('burger', 'size-4'); ?>
        </button>

    </div>

    <div id="mobile-nav" class="hidden border-t border-blue-gray-50 bg-white lg:hidden">
        <div class="container-content flex flex-col gap-1 py-6">
            <?php foreach (importio_get_menu_items() as $item) : ?>
                <?php if (!empty($item['children'])) : ?>
                    <div>
                        <button
                            type="button"
                            data-mobile-submenu-toggle
                            aria-expanded="false"
                            class="flex w-full items-center justify-between gap-2 rounded-lg px-3 py-3 text-[0.9375rem] font-semibold text-blue-gray-500 transition hover:bg-orange-50 hover:text-orange-700"
                        >
                            <?php echo esc_html($item['label']); ?>
                            <?php echo importio_get_icon('caret-down', 'size-4 shrink-0 transition'); ?>
                        </button>
                        <div data-mobile-submenu-panel class="hidden flex-col gap-1 py-1 pl-3">
                            <?php foreach ($item['children'] as $child) : ?>
                                <a
                                    href="<?php echo esc_url($child['url']); ?>"
                                    class="rounded-lg px-3 py-2 text-sm font-medium text-blue-gray-500 transition hover:bg-orange-50 hover:text-orange-700"
                                >
                                    <?php echo esc_html($child['label']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <a
                        href="<?php echo esc_url($item['url']); ?>"
                        class="flex items-center justify-between gap-2 rounded-lg px-3 py-3 text-[0.9375rem] font-semibold text-blue-gray-500 transition hover:bg-orange-50 hover:text-orange-700"
                    >
                        <?php echo esc_html($item['label']); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <a href="<?php echo esc_url(importio_get_quote_page_url()); ?>" class="btn btn-primary mt-2 w-full">
                <?php echo esc_html($nav_cta_text); ?>
                <?php echo importio_get_icon('arrow-right', 'size-4 shrink-0'); ?>
            </a>

            <?php if (function_exists('pll_the_languages')) :
                $importio_flag_icons_m = ['pl' => 'flag-pl', 'en' => 'flag-gb'];
                $importio_languages_m  = pll_the_languages(['raw' => 1, 'hide_if_empty' => 0]);
            ?>
                <div class="mt-2 flex items-center gap-1 border-t border-blue-gray-50 pt-4">
                    <?php foreach ($importio_languages_m as $importio_language_m) : ?>
                        <a
                            href="<?php echo esc_url($importio_language_m['url']); ?>"
                            class="flex items-center gap-2 rounded-lg px-3 py-2 text-[0.9375rem] font-semibold text-blue-gray-500 transition hover:bg-orange-50 hover:text-orange-700 <?php echo !empty($importio_language_m['current_lang']) ? 'bg-orange-50 text-orange-700' : ''; ?>"
                        >
                            <?php echo importio_get_icon($importio_flag_icons_m[$importio_language_m['slug']] ?? 'flag-pl', 'size-6 shrink-0'); ?>
                            <?php echo esc_html($importio_language_m['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</header>
