<?php
$args         = $args ?? [];
$show_heading = !array_key_exists('show_heading', $args) || $args['show_heading'];

$heading     = get_field('contact_heading') ?: pll__('<b>Skontaktuj się</b> z zespołem Importio');
$description = get_field('contact_description') ?: pll__('Masz pytania dotyczące importu, dostawców lub logistyki? Napisz do nas, a wspólnie omówimy możliwości współpracy i dalsze kroki.');

$info_heading = get_field('contact_info_heading') ?: pll__('Dane kontaktowe');
$phone        = get_field('contact_phone') ?: '+48 123 456 789';
$email        = get_field('contact_email') ?: 'kontakt@importio.pl';
$address      = get_field('contact_address') ?: "ul. Przykładowa 123\n00-000 Warszawa";

$img = get_template_directory_uri() . '/img/';
?>

<section class="relative overflow-hidden bg-bg">

    <img src="<?php echo esc_url($img . 'map-world.svg'); ?>" alt="" class="pointer-events-none absolute top-1/2 left-1/2 hidden w-[56rem] max-w-none -translate-x-1/2 -translate-y-1/2 opacity-[0.06] lg:block">

    <div class="container-content relative flex flex-col gap-8 pb-12 lg:gap-18 lg:pb-26 <?php echo $show_heading ? '' : 'pt-12 lg:pt-26'; ?>">

        <?php if ($show_heading) : ?>
            <div class="flex flex-col gap-4 lg:gap-8">
                <p class="[&_b]:font-bold text-[1.875rem]/[1.2] font-medium tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
                    <?php echo wp_kses_post($heading); ?>
                </p>
                <p class="text-base/[1.5] font-medium tracking-[-0.01rem] text-blue-gray-300 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
                    <?php echo esc_html($description); ?>
                </p>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-8">

            <div class="flex flex-col gap-6 lg:gap-10 lg:pr-16">
                <p class="reveal text-xl/[1.25] font-medium tracking-[-0.02rem] text-blue-500 lg:text-[1.75rem]/[1.25] lg:tracking-[-0.0175rem]">
                    <?php echo esc_html($info_heading); ?>
                </p>

                <div class="flex flex-col gap-6 lg:gap-10">
                    <div class="reveal flex items-start gap-4 lg:gap-6">
                        <div class="flex size-12 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                            <img src="<?php echo esc_url($img . 'icon-contact-phone.svg'); ?>" alt="" class="size-5 lg:size-6">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem] lg:tracking-[-0.009375rem]"><?php pll_e('Telefon'); ?></p>
                            <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.015rem]"><a href="<?php echo esc_attr('tel:' . preg_replace('/[^+0-9]/', '', $phone)); ?>" class="hover:underline"><?php echo esc_html($phone); ?></a></p>
                        </div>
                    </div>

                    <div class="reveal delay-100 flex items-start gap-4 lg:gap-6">
                        <div class="flex size-12 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                            <img src="<?php echo esc_url($img . 'icon-contact-email.svg'); ?>" alt="" class="size-5 lg:size-6">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem] lg:tracking-[-0.009375rem]"><?php pll_e('E-mail'); ?></p>
                            <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.015rem]"><a href="<?php echo esc_attr('mailto:' . $email); ?>" class="hover:underline"><?php echo esc_html($email); ?></a></p>
                        </div>
                    </div>

                    <div class="reveal delay-200 flex items-start gap-4 lg:gap-6">
                        <div class="flex size-12 shrink-0 items-center justify-center bg-orange-500 lg:size-14">
                            <img src="<?php echo esc_url($img . 'icon-contact-marker.svg'); ?>" alt="" class="size-5 lg:size-6">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm tracking-[-0.00875rem] text-blue-gray-300 lg:text-[0.9375rem] lg:tracking-[-0.009375rem]"><?php pll_e('Adres'); ?></p>
                            <p class="text-lg/[1.3] font-semibold tracking-[-0.01125rem] text-blue-500 lg:text-2xl/[1.3] lg:tracking-[-0.015rem]"><?php echo nl2br(esc_html($address)); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 shadow-[0_0.625rem_1.25rem_rgba(33,40,53,0.04)] lg:p-12">
                <?php echo do_shortcode('[contact-form-7 id="' . (int) importio_get_contact_form_id() . '" title="' . esc_attr(pll__('Formularz kontaktowy')) . '"]'); ?>
            </div>

        </div>

    </div>
</section>
