<?php
$fp_id = (int) get_option( 'page_on_front' );

$srodowisko_h1  = get_field( 'srodowisko_heading_1', $fp_id ) ?: 'Tworzymy środowisko';
$srodowisko_h2  = get_field( 'srodowisko_heading_2', $fp_id ) ?: 'nie tylko obiekt.';
$srodowisko_img = get_field( 'srodowisko_image',     $fp_id ) ?: get_template_directory_uri() . '/img/homepage/srodowisko.png';

$ft_description = get_field( 'footer_description', $fp_id ) ?: 'Elitarna akademia tenisowa dla maksymalnie 30 zawodników. Kompleksowy program przygotowania na najwyższym poziomie.';
$ft_address_1   = get_field( 'footer_address_1',   $fp_id ) ?: 'QORT Tennis Academy';
$ft_address_2   = get_field( 'footer_address_2',   $fp_id ) ?: 'ul. Przykładowa 123';
$ft_address_3   = get_field( 'footer_address_3',   $fp_id ) ?: '00-000 Przeźmierowo';
$ft_email       = get_field( 'footer_email',       $fp_id ) ?: 'kontakt@qort-academy.pl';
$ft_phone       = get_field( 'footer_phone',       $fp_id ) ?: '+48 123 456 789';
$ft_instagram   = get_field( 'footer_instagram',   $fp_id ) ?: '#';
$ft_facebook    = get_field( 'footer_facebook',    $fp_id ) ?: '#';
$ft_youtube     = get_field( 'footer_youtube',     $fp_id ) ?: '#';
$ft_privacy_url = get_field( 'footer_privacy_url', $fp_id ) ?: '#';
$ft_terms_url   = get_field( 'footer_terms_url',   $fp_id ) ?: '#';
?>

<!-- Środowisko -->
<section class="">
        <div class="relative rounded-2xl overflow-hidden flex items-center justify-center py-16 lg:py-60">

            <!-- Tło -->
            <img src="<?php echo esc_url( $srodowisko_img ); ?>"
                 alt=""
                 class="absolute inset-0 top-0 w-full h-full object-cover" />

            <div class="container-content" data-aos="fade-up">
                <!-- Tekst -->
                <p class="relative z-10 font-gabarito text-[2.5rem]/[100%] lg:text-[5rem]/[100%] -tracking-[0.02rem] lg:-tracking-[0.25rem] text-white text-center px-8">
                    <b><?php echo esc_html( $srodowisko_h1 ); ?></b><br><?php echo esc_html( $srodowisko_h2 ); ?>
                </p>
            </div>
    </div>
</section>

<footer class="bg-blue-950 pb-10">
    <div class="container-content pt-16 lg:pt-0">

        <!-- Główne kolumny -->
        <div class="flex flex-col gap-12 lg:flex-row lg:justify-between pb-16 lg:pb-20">

            <!-- Lewa: logo + opis + adres -->
            <div class="lg:max-w-[28rem]">

                <?php if ( qorttheme_logo_url() ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block shrink-0">
                    <img src="<?php echo esc_url( qorttheme_logo_url() ); ?>"
                         alt="<?php bloginfo( 'name' ); ?>"
                         class="h-9 w-auto" />
                </a>
                <?php endif; ?>

                <p class="mt-10 lg:mt-[3.75rem] text-white/50">
                    <?php echo esc_html( $ft_description ); ?>
                </p>

                <address class="not-italic flex flex-col gap-[0.25rem] mt-8 lg:mt-[3.125rem]">
                    <span class="text-sm lg:text-[1rem]/[1.5] text-white/40"><?php echo esc_html( $ft_address_1 ); ?></span>
                    <span class="text-sm lg:text-[1rem]/[1.5] text-white/40"><?php echo esc_html( $ft_address_2 ); ?></span>
                    <span class="text-sm lg:text-[1rem]/[1.5] text-white/40"><?php echo esc_html( $ft_address_3 ); ?></span>
                </address>

            </div>

            <!-- Prawa: Menu + Kontakt -->
            <div class="flex flex-col sm:flex-row gap-12 lg:gap-20 shrink-0 xl:mr-[16.81rem]">

                <!-- Menu -->
                <div class="xl:w-[17.54rem]">
                    <p class="font-gabarito text-[1.1875rem]/[1.5] tracking-[-0.02375rem] text-orange-500 mb-6">Menu</p>
                    <?php wp_nav_menu( [
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '<ul class="flex flex-col gap-4">%3$s</ul>',
                        'walker'         => new QORT_Footer_Walker(),
                    ] ); ?>
                </div>

                <!-- Kontakt + Social Media -->
                <div class="xl:w-[17.54rem]">
                    <p class="font-gabarito text-[1.1875rem]/[1.5] tracking-[-0.02375rem] text-orange-500 mb-6">Kontakt</p>
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="mailto:<?php echo esc_attr( $ft_email ); ?>"
                               class="text-[1.0625rem]/[1.5] tracking-[-0.02125rem] text-white/50 hover:text-white transition-colors">
                                <?php echo esc_html( $ft_email ); ?>
                            </a>
                        </li>
                        <li>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $ft_phone ) ); ?>"
                               class="text-[1.0625rem]/[1.5] tracking-[-0.02125rem] text-white/50 hover:text-white transition-colors">
                                <?php echo esc_html( $ft_phone ); ?>
                            </a>
                        </li>
                    </ul>

                    <p class="font-gabarito text-[1.1875rem]/[1.5] tracking-[-0.02375rem] text-orange-500 mt-[2.5rem] mb-6">Social Media</p>
                    <div class="flex gap-4">
                        <a href="<?php echo esc_url( $ft_instagram ); ?>" aria-label="Instagram" target="_blank" rel="noopener"
                           class="size-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white text-[0.875rem]/[1] hover:bg-white/10 transition-colors">
                            IG
                        </a>
                        <a href="<?php echo esc_url( $ft_facebook ); ?>" aria-label="Facebook" target="_blank" rel="noopener"
                           class="size-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white text-[0.875rem]/[1] hover:bg-white/10 transition-colors">
                            FB
                        </a>
                        <a href="<?php echo esc_url( $ft_youtube ); ?>" aria-label="YouTube" target="_blank" rel="noopener"
                           class="size-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white text-[0.875rem]/[1] hover:bg-white/10 transition-colors">
                            YT
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <!-- Dolny pasek -->
        <div class="border-t border-white/5 pt-[2.5625rem] flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <p class="text-white/40">
                © <?php echo esc_html( date( 'Y' ) ); ?> QORT Tennis Academy. Wszelkie prawa zastrzeżone.
            </p>
            <div class="flex gap-8 shrink-0">
                <a href="<?php echo esc_url( $ft_privacy_url ); ?>" class="text-white/40 hover:text-white/80 transition-colors">
                    Polityka prywatności
                </a>
                <a href="<?php echo esc_url( $ft_terms_url ); ?>" class="text-white/40 hover:text-white/80 transition-colors">
                    Regulamin
                </a>
            </div>
        </div>

    </div>
</footer>
