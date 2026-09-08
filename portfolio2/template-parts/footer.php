<?php
$footer_description = mb_option('footer_description') ?: pll__('Kompleksowa obsługa importu z Chin. Weryfikacja dostawców, logistyka i wsparcie na każdym etapie współpracy.');

$col_services_label = mb_option('footer_col_services_label') ?: pll__('Usługi');
$col_company_label  = mb_option('footer_col_company_label') ?: pll__('Firma');
$col_contact_label  = mb_option('footer_col_contact_label') ?: pll__('Kontakt');

$raw_services_links = get_field('footer_services_items', 'option') ?: [
    ['label' => pll__('Import hurtowy z Chin'), 'url' => '#'],
    ['label' => pll__('Import maszyn'), 'url' => '#'],
    ['label' => pll__('Dla sklepów e-commerce'), 'url' => '#'],
    ['label' => pll__('Dla firm produkcyjnych'), 'url' => '#'],
    ['label' => pll__('Dla hurtowników'), 'url' => '#'],
    ['label' => pll__('Dla usługodawców'), 'url' => '#'],
];
$services_links = array_map('mb_option_localize_row', $raw_services_links);

$company_links = [
    ['label' => mb_option('footer_link_about') ?: pll__('O firmie'), 'url' => importio_translated_page_url('o-firmie')],
    ['label' => mb_option('footer_link_references') ?: pll__('Referencje'), 'url' => importio_translated_page_url('referencje')],
    ['label' => mb_option('footer_link_casestudies') ?: pll__('Case study'), 'url' => get_post_type_archive_link('case_study') ?: '#'],
    ['label' => mb_option('footer_link_blog') ?: pll__('Baza wiedzy'), 'url' => get_permalink(get_option('page_for_posts')) ?: '#'],
    ['label' => mb_option('footer_link_career') ?: pll__('Praca'), 'url' => importio_translated_page_url('praca')],
    ['label' => mb_option('footer_link_quote') ?: pll__('Wyceń produkt'), 'url' => '#'],
];

$phone   = get_field('footer_phone', 'option') ?: '+48 123 456 789';
$email   = get_field('footer_email', 'option') ?: 'kontakt@importio.pl';
$address = get_field('footer_address', 'option') ?: "ul. Przykładowa 123\n00-000 Warszawa";

$copyright_text     = mb_option('footer_copyright_text') ?: pll__('Wszelkie prawa zastrzeżone.');
$privacy_link_text  = mb_option('footer_privacy_link_text') ?: pll__('Polityka prywatności i cookies');
$privacy_link_url   = mb_option('footer_privacy_link_url') ?: '#';

$img = get_template_directory_uri() . '/img/';
?>

<footer class="bg-blue-500">
    <div class="container-content flex flex-col gap-12 pt-12 pb-8 lg:gap-22 lg:pt-26 lg:pb-10">

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12">

            <div class="flex flex-col items-start gap-6 sm:col-span-2 lg:col-span-1">
                <img src="<?php echo esc_url($img . 'logo-white.svg'); ?>" alt="<?php bloginfo('name'); ?>" class="h-6 w-auto">
                <p class="max-w-[16.75rem] text-sm/[1.5] tracking-[-0.009375rem] text-blue-200">
                    <?php echo esc_html($footer_description); ?>
                </p>
            </div>

            <div class="flex flex-col gap-6">
                <p class="text-lg/[1.5] font-medium tracking-[-0.01125rem] text-white"><?php echo esc_html($col_services_label); ?></p>
                <ul class="flex flex-col gap-3">
                    <?php foreach ($services_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>" class="text-sm/[1.5] tracking-[-0.009375rem] text-blue-200 underline decoration-current/50 transition hover:text-white">
                                <?php echo esc_html($link['label']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="flex flex-col gap-6">
                <p class="text-lg/[1.5] font-medium tracking-[-0.01125rem] text-white"><?php echo esc_html($col_company_label); ?></p>
                <ul class="flex flex-col gap-3">
                    <?php foreach ($company_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>" class="text-sm/[1.5] tracking-[-0.009375rem] text-blue-200 underline decoration-current/50 transition hover:text-white">
                                <?php echo esc_html($link['label']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="flex flex-col gap-6">
                <p class="text-lg/[1.5] font-medium tracking-[-0.01125rem] text-white"><?php echo esc_html($col_contact_label); ?></p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <?php echo importio_get_icon('contact-phone', 'size-5 shrink-0', '#E38032'); ?>
                        <a href="<?php echo esc_url('tel:' . preg_replace('/[^+\d]/', '', $phone)); ?>" class="text-sm/[1.5] tracking-[-0.009375rem] text-blue-200 transition hover:text-white"><?php echo esc_html($phone); ?></a>
                    </div>
                    <div class="flex items-center gap-3">
                        <?php echo importio_get_icon('contact-email', 'size-5 shrink-0', '#E38032'); ?>
                        <a href="<?php echo esc_url('mailto:' . $email); ?>" class="text-sm/[1.5] tracking-[-0.009375rem] text-blue-200 transition hover:text-white"><?php echo esc_html($email); ?></a>
                    </div>
                    <div class="flex items-start gap-3">
                        <?php echo importio_get_icon('contact-marker', 'size-5 shrink-0', '#E38032'); ?>
                        <p class="text-sm/[1.5] tracking-[-0.009375rem] text-blue-200"><?php echo nl2br(esc_html($address)); ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col items-start gap-4 border-t border-white/10 pt-8 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs/[1.4] tracking-[-0.00875rem] text-blue-200">
                © <?php echo esc_html(date('Y')); ?> Importio. <?php echo esc_html($copyright_text); ?>
            </p>
            <a href="<?php echo esc_url($privacy_link_url); ?>" class="text-xs/[1.4] tracking-[-0.00875rem] text-blue-200 underline decoration-current/50 transition hover:text-white">
                <?php echo esc_html($privacy_link_text); ?>
            </a>
        </div>

    </div>
</footer>
