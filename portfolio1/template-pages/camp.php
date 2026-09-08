<?php
/*
 * Template Name: Camp
 */
?>

<?php get_header(); ?>

<?php
$hero_title    = get_field( 'hero_title' )    ?: 'High performance.<br><b>Tennis Camp</b>.';
$hero_btn_text = get_field( 'hero_btn_text' ) ?: 'Dowiedz się więcej';
$hero_btn_url  = get_field( 'hero_btn_url' )  ?: '#';

$stat_1_value  = get_field( 'stat_1_value' )  ?: '3 dni';
$stat_1_label  = get_field( 'stat_1_label' )  ?: 'Intensywny program';
$stat_2_value  = get_field( 'stat_2_value' )  ?: '2 terminy';
$stat_2_label  = get_field( 'stat_2_label' )  ?: 'Wybierz dogodną datę';
$stat_3_value  = get_field( 'stat_3_value' )  ?: '2 300 zł';
$stat_3_label  = get_field( 'stat_3_label' )  ?: 'Koszt campu';

$program_intro   = get_field( 'program_intro' )   ?: 'W QORT Tennis Academy opieka zdrowotna to nie dodatek – to absolutny priorytet. Nasza metodologia opiera się na trzech filarach.';
$pillar_1_title  = get_field( 'pillar_1_title' )  ?: 'Zdrowie na pierwszym miejscu';
$pillar_1_desc   = get_field( 'pillar_1_desc' )   ?: 'Prewencja urazów i holistyczna opieka medyczna stanowią podstawę naszego programu.';
$pillar_2_title  = get_field( 'pillar_2_title' )  ?: 'Selekcjonowany rozwój';
$pillar_2_desc   = get_field( 'pillar_2_desc' )   ?: 'Ograniczona liczba miejsc pozwala na prawdziwie indywidualne podejście do każdego zawodnika.';
$pillar_3_title  = get_field( 'pillar_3_title' )  ?: 'Kompleksowość';
$pillar_3_desc   = get_field( 'pillar_3_desc' )   ?: 'Integracja wszystkich aspektów przygotowania – od techniki po psychikę.';
$pillar_1_icon   = get_field( 'pillar_1_icon' );
$pillar_2_icon   = get_field( 'pillar_2_icon' );
$pillar_3_icon   = get_field( 'pillar_3_icon' );

$program_image       = get_field( 'program_image' )       ?: get_template_directory_uri() . '/img/homepage/opieka.png';
$med_section_heading = get_field( 'med_section_heading' ) ?: 'Zakres opieki medycznej';
$med_group_1_label = get_field( 'med_group_1_label' ) ?: 'Diagnostyka i badania';
$med_group_2_label = get_field( 'med_group_2_label' ) ?: 'Terapia i rehabilitacja';
$med_group_3_label = get_field( 'med_group_3_label' ) ?: 'Wsparcie specjalistyczne';
$med_group_1_items = array_filter( array_map( 'trim', explode( "\n", get_field( 'med_group_1_items' ) ?: "Badania diagnostyczne i screeningowe\nMonitoring stanu zdrowia\nOcena wydolności i biomechaniki" ) ) );
$med_group_2_items = array_filter( array_map( 'trim', explode( "\n", get_field( 'med_group_2_items' ) ?: "Fizjoterapia i terapia manualna\nOsteopatia sportowa\nKinesiotaping i masaż sportowy" ) ) );
$med_group_3_items = array_filter( array_map( 'trim', explode( "\n", get_field( 'med_group_3_items' ) ?: "Poradnictwo dietetyczne\nWsparcie w trakcie turniejów\nPrewencja urazów" ) ) );

$medical_groups = [
    [ 'label' => $med_group_1_label, 'items' => $med_group_1_items ],
    [ 'label' => $med_group_2_label, 'items' => $med_group_2_items ],
    [ 'label' => $med_group_3_label, 'items' => $med_group_3_items ],
];

$kadra_heading  = get_field( 'kadra_heading' )  ?: 'Selekcjonowany<br><b>sztab specjalistów</b>';
$kadra_intro    = get_field( 'kadra_intro' )    ?: 'Cały program jest nadzorowany przez sztab szkoleniowy QORT Tennis Academy, który odpowiada za spójność metodyki, kontrolę procesu treningowego oraz utrzymanie najwyższych standardów szkolenia.';
$camp_image_1   = get_field( 'camp_image_1' )   ?: get_template_directory_uri() . '/img/camp/camp-1.png';
$trenerzy_title = get_field( 'trenerzy_title' ) ?: 'Trenerzy tenisowi';
$trenerzy_desc  = get_field( 'trenerzy_desc' )  ?: 'Doświadczeni szkoleniowcy z międzynarodowymi certyfikatami i udokumentowanymi sukcesami.';
$trenerzy_tag   = get_field( 'trenerzy_tag' )   ?: 'Indywidualne podejście do każdego zawodnika';
$camp_image_2   = get_field( 'camp_image_2' )   ?: get_template_directory_uri() . '/img/camp/camp-2.png';
$medyczna_title = get_field( 'medyczna_title' ) ?: 'Sztab medyczny';
$medyczna_desc  = get_field( 'medyczna_desc' )  ?: 'Fizjoterapeuci, osteopaci i lekarz sportowy zapewniają kompleksową opiekę.';
$medyczna_tag   = get_field( 'medyczna_tag' )   ?: 'Dostępność 24/7';
$mentalne_title = get_field( 'mentalne_title' ) ?: 'Wsparcie mentalne';
$mentalne_desc  = get_field( 'mentalne_desc' )  ?: 'Psychologowie sportowi pracują nad odpornością psychiczną i koncentracją.';
$mentalne_tag   = get_field( 'mentalne_tag' )   ?: 'Regularne sesje indywidualne';

$termin_1_label = get_field( 'termin_1_label' ) ?: 'Termin I';
$termin_1_date  = get_field( 'termin_1_date' )  ?: '24–26.06.2026';
$termin_2_label = get_field( 'termin_2_label' ) ?: 'Termin II';
$termin_2_date  = get_field( 'termin_2_date' )  ?: '15–17.07.2026';
?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => $hero_title,
    'btn_text' => $hero_btn_text,
    'btn_url'  => $hero_btn_url,
    'image'        => get_the_post_thumbnail_url( null, 'full' ) ?: get_template_directory_uri() . '/img/miejsce/hero.jpg',
    'image_mobile' => get_field( 'hero_image_mobile' ) ?: '',
] ); ?>


<!-- Liczby -->
<section class="py-10 lg:py-36">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up">Info</span>
        <h2 class="mb-8 lg:mb-20" data-aos="fade-up">Camp w liczbach</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div data-aos="fade-up" class="border border-white/15 rounded-2xl p-12 flex flex-col gap-8 items-center justify-center h-64.5 text-center">
                <p class="font-gabarito text-[3.5rem]/[1] tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_1_value ); ?></p>
                <p class="text-white/80"><?php echo esc_html( $stat_1_label ); ?></p>
            </div>

            <div data-aos="fade-up" class="border border-white/15 rounded-2xl p-12 flex flex-col gap-8 items-center justify-center h-64.5 text-center">
                <p class="font-gabarito text-[3.5rem]/[1] tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_2_value ); ?></p>
                <p class="text-white/80"><?php echo esc_html( $stat_2_label ); ?></p>
            </div>

            <di data-aos="fade-up" class="border border-white/15 rounded-2xl p-12 flex flex-col gap-8 items-center justify-center h-64.5 text-center">
                <p class="font-gabarito text-[3.5rem]/[1] tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_3_value ); ?></p>
                <p class="text-white/80"><?php echo esc_html( $stat_3_label ); ?></p>
            </div>

        </div>

    </div>
</section>

<!-- Program -->
 <section id="program" class="bg-blue-800 py-10 lg:py-36">
    <div class="container-content">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:items-start">

            <div class="xl:pr-18 lg:sticky lg:top-23">
                <span class="bullet-title" data-aos="fade-up">Czego się spodziewać</span>
                <h2 class="mb-4 lg:mb-8" data-aos="fade-up">Program campu</h2>
                <p class="text-[0.9rem]/[150%] lg:text-[1.188rem]/[150%] -tracking-[0.02375rem] mb-8" data-aos="fade-up"><?php echo esc_html( $program_intro ); ?></p>

                <div class="flex flex-col gap-4 lg:pt-12">

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <?php if ( $pillar_1_icon ) : ?>
                            <?php echo $pillar_1_icon; ?>
                            <?php else : ?>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_143_670)">
                                <path class="svg-color-fill" d="M0.170667 16C0.0626667 15.444 0 14.888 0 14.3333C0 10.1067 3.44 6.66667 7.66667 6.66667C11.8933 6.66667 15.3333 10.1067 15.3333 14.3333H14C14 10.8413 11.1587 8 7.66667 8C4.17467 8 1.33333 10.8413 1.33333 14.3333C1.33333 14.8853 1.42267 15.4413 1.548 16H0.170667ZM9.676 17.2147L13.12 24.104L15.856 20H19.9987V18.6667H15.1413L13.284 21.452L9.84 14.5627L7.104 18.6667H0V20H7.82L9.676 17.2147ZM20.3507 25.156C17.6907 27.7373 14.968 29.7 14.0013 30.3707C12.7467 29.4987 8.54267 26.44 5.316 22.668H3.57067C7.48667 27.644 13.2667 31.4947 13.6333 31.7347L14 31.976C14.6973 31.4947 17.484 29.744 21.2787 26.1133C23.4747 23.984 25.132 21.9427 26.2547 20.0013H24.668C23.6213 21.6453 22.1893 23.3707 20.3507 25.156ZM24 0C19.588 0 16 3.588 16 8C16 11.2213 17.9173 13.996 20.6667 15.2627V13.7387C18.684 12.5827 17.3333 10.456 17.3333 8C17.3333 4.324 20.324 1.33333 24 1.33333C27.676 1.33333 30.6667 4.324 30.6667 8C30.6667 10.456 29.316 12.5827 27.3333 13.7387V15.2627C30.0827 13.996 32 11.22 32 8C32 3.588 28.412 0 24 0ZM26.6667 8C26.6667 9.47067 25.4707 10.6667 24 10.6667C22.5293 10.6667 21.3333 9.47067 21.3333 8C21.3333 6.52933 22.5293 5.33333 24 5.33333C25.4707 5.33333 26.6667 6.52933 26.6667 8ZM25.3333 8C25.3333 7.26533 24.736 6.66667 24 6.66667C23.264 6.66667 22.6667 7.26533 22.6667 8C22.6667 8.73467 23.264 9.33333 24 9.33333C24.736 9.33333 25.3333 8.73467 25.3333 8ZM23.3333 12V17.3333H24.6667V12H23.3333Z" fill="#BF6E2E"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_143_670">
                                <rect width="32" height="32" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $pillar_1_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $pillar_1_desc ); ?></p>
                        </div>
                    </div>

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <?php if ( $pillar_2_icon ) : ?>
                            <?php echo $pillar_2_icon; ?>
                            <?php else : ?>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-color-fill" d="M30.667 14.6667V16H24.2897L20.8603 10.3027C20.8243 10.2427 20.7843 10.1853 20.7417 10.1293L16.667 19.6587L15.515 18.9293L19.6017 9.38667C19.4537 9.352 19.3017 9.332 19.147 9.332H15.7043L12.2203 17.6573C11.8537 18.5533 12.1817 19.5827 13.003 20.1013L20.0003 24.2867V31.9987H18.667V25.044L12.3043 21.2387C10.9203 20.364 10.3737 18.648 10.9883 17.148L14.2577 9.33333H9.07899L6.59633 14.2987L5.40299 13.7027L8.25366 8.00133H19.147C20.3097 8.00133 21.403 8.62 22.003 9.616L25.0443 14.668H30.667V14.6667ZM16.0003 3.33333C16.0003 1.496 17.4963 0 19.3337 0C21.171 0 22.667 1.496 22.667 3.33333C22.667 5.17067 21.171 6.66667 19.3337 6.66667C17.4963 6.66667 16.0003 5.17067 16.0003 3.33333ZM17.3337 3.33333C17.3337 4.436 18.231 5.33333 19.3337 5.33333C20.4363 5.33333 21.3337 4.436 21.3337 3.33333C21.3337 2.23067 20.4363 1.33333 19.3337 1.33333C18.231 1.33333 17.3337 2.23067 17.3337 3.33333ZM10.483 23.1827L9.56166 25.3333H2.66699V26.6667H10.4403L11.6123 23.932L10.9363 23.528C10.7723 23.4253 10.6337 23.2987 10.483 23.184V23.1827Z" fill="#BF6E2E"/>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $pillar_2_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $pillar_2_desc ); ?></p>
                        </div>
                    </div>

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <?php if ( $pillar_3_icon ) : ?>
                            <?php echo $pillar_3_icon; ?>
                            <?php else : ?>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_143_682)">
                                <path class="svg-color-fill" d="M27.1384 26.1946C25.333 24.3892 25.333 17.3253 25.333 14.6666C25.2224 11.3733 23.5597 7.91058 20.4864 4.84792C14.8384 -0.820082 7.83036 -1.55341 3.04236 3.02125C-0.928303 7.14925 -0.91897 12.9519 2.80903 18.0999C3.10236 17.7599 3.42503 17.4506 3.7877 17.1839C3.5077 16.7919 3.2597 16.3973 3.0277 16.0013H14.6664V23.9666C14.1264 23.9466 13.5824 23.8959 13.033 23.7826C12.8984 24.2133 12.721 24.6213 12.4984 25.0053C13.2264 25.1719 13.949 25.3092 14.6664 25.3346C17.5757 25.3346 24.3904 25.3346 26.1944 27.1399L31.0144 31.9599L31.957 31.0173L27.137 26.1973L27.1384 26.1946ZM15.9997 3.01858C17.2064 3.72525 18.3984 4.64258 19.5437 5.79059C20.2664 6.51058 20.893 7.25059 21.441 7.99992H15.9997V3.01858ZM15.9997 9.33325H22.3144C23.3544 11.1093 23.9144 12.9173 23.9784 14.6666H15.9997V9.33325ZM7.9997 14.6666H2.33303C1.5277 12.8666 1.21036 11.0573 1.3997 9.33325H7.9997V14.6666ZM7.9997 7.99992H1.6597C2.0517 6.55458 2.8157 5.19058 3.9757 3.97458C5.19036 2.81592 6.5557 2.05458 8.00103 1.65992L7.9997 7.99992ZM14.6664 14.6666H9.33303V9.33325H14.6664V14.6666ZM14.6664 7.99992H9.33303V1.39725C11.057 1.20525 12.8664 1.52125 14.6664 2.32525V7.99992ZM15.9997 15.9999H23.9357C23.7197 17.9413 22.8677 19.7746 21.3584 21.3586C19.7744 22.8679 17.941 23.7053 15.9997 23.9199V15.9999ZM19.765 24.1399C20.6597 23.6653 21.5317 23.0573 22.3077 22.2879L22.3117 22.2919C23.073 21.4946 23.6744 20.6319 24.1437 19.7292C24.277 21.6986 24.497 23.5439 24.9584 24.9613C23.5624 24.5013 21.749 24.2733 19.765 24.1413V24.1399ZM7.33303 18.6666C5.4957 18.6666 3.9997 20.1626 3.9997 21.9999C3.9997 23.8372 5.4957 25.3333 7.33303 25.3333C9.17036 25.3333 10.6664 23.8372 10.6664 21.9999C10.6664 20.1626 9.17036 18.6666 7.33303 18.6666ZM7.33303 23.9999C6.23036 23.9999 5.33303 23.1026 5.33303 21.9999C5.33303 20.8973 6.23036 19.9999 7.33303 19.9999C8.4357 19.9999 9.33303 20.8973 9.33303 21.9999C9.33303 23.1026 8.4357 23.9999 7.33303 23.9999Z" fill="#BF6E2E"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_143_682">
                                <rect width="32" height="32" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $pillar_3_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $pillar_3_desc ); ?></p>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <img class="rounded-2xl object-cover h-auto xl:h-138 w-full mb-8" src="<?php echo esc_url( $program_image ); ?>" alt="">

                <div class="bg-blue-950 rounded-2xl p-8 lg:p-12 flex flex-col gap-10">
                    <h3 data-aos="fade-up"><?php echo esc_html( $med_section_heading ); ?></h3>
                    <?php
                    $group_total = count( $medical_groups );
                    foreach ( $medical_groups as $gi => $group ) :
                        $group_last = ( $gi === $group_total - 1 );
                    ?>
                    <div data-aos="fade-up" class="flex flex-col gap-6 <?php echo ! $group_last ? 'pb-6 border-b border-white/5' : ''; ?>">
                        <div class="flex gap-5 items-center">
                            <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-color-fill" d="M5.14267 10.856C4.88008 10.8565 4.61999 10.8051 4.37733 10.7047C4.13467 10.6044 3.91423 10.4571 3.72867 10.2713L0 6.54333L0.942667 5.6L4.67133 9.32867C4.79635 9.45365 4.96589 9.52386 5.14267 9.52386C5.31944 9.52386 5.48898 9.45365 5.614 9.32867L14.9427 0L15.8853 0.942667L6.55667 10.2713C6.3711 10.4571 6.15066 10.6044 5.908 10.7047C5.66534 10.8051 5.40525 10.8565 5.14267 10.856Z" fill="#BF6E2E"/>
                            </svg>
                            <p class="text-white/70"><?php echo esc_html( $group['label'] ); ?></p>
                        </div>
                        <ul class="list-disc pl-16 flex flex-col gap-1 text-[0.875rem]/[140%] lg:text-[1.0625rem] tracking-[-0.02125rem] text-white/70 marker:text-white/40">
                            <?php foreach ( $group['items'] as $sub_item ) : ?>
                            <li><?php echo esc_html( $sub_item ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kadra -->
 <section class="py-10 lg:py-36">
    <div class="container-content">
        <span class="bullet-title " data-aos="fade-up">Kadra</span>
        <h2 class="mb-4 lg:mb-8 max-w-172" data-aos="fade-up"><?php echo wp_kses_post( $kadra_heading ); ?></h2>
        <p class="max-w-172" data-aos="fade-up"><?php echo esc_html( $kadra_intro ); ?></p>

        <div class="mt-10 lg:mt-18 flex flex-col gap-8">

            <!-- Row 1: Image + Card -->
            <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8 lg:h-140">

                <div class="h-72 lg:h-full overflow-hidden rounded-2xl">
                    <img src="<?php echo esc_url( $camp_image_1 ); ?>"
                         alt="Trenerzy QORT Tennis Academy"
                         class="w-full h-full object-cover">
                </div>

                <div class="bg-blue-900 rounded-2xl p-8 lg:px-12 lg:py-18 flex flex-col gap-8 justify-end">
                    <div class="size-16 border border-white/10 bg-white/2 rounded-2xl flex items-center justify-center shrink-0">
                        <svg width="24" height="32" viewBox="0 0 24 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 16C16.412 16 20 12.412 20 8C20 7.54533 19.9533 7.10133 19.88 6.66667H23.3333V5.33333H19.5333C18.432 2.23067 15.476 0 12 0C7.588 0 4 3.588 4 8C4 12.412 7.588 16 12 16ZM12 1.33333C14.7267 1.33333 17.0693 2.98267 18.1013 5.33333H5.89867C6.93067 2.98267 9.27333 1.33333 12 1.33333ZM5.468 6.66667H18.532C18.62 7.09733 18.6667 7.544 18.6667 8C18.6667 11.676 15.676 14.6667 12 14.6667C8.324 14.6667 5.33333 11.676 5.33333 8C5.33333 7.544 5.38 7.09733 5.468 6.66667ZM18 18.6667H6C2.692 18.6667 0 21.3587 0 24.6667V32H1.33333V24.6667C1.33333 22.6213 2.66533 20.8973 4.5 20.2693L8.56267 26.1933L11.948 22.132L15.3267 26.1853L19.4907 20.2667C21.3307 20.8933 22.6667 22.6187 22.6667 24.6667V32H24V24.6667C24 21.3587 21.308 18.6667 18 18.6667ZM15.2373 23.9947L11.9493 20.048L8.668 23.9867L5.93733 20.0067C5.95867 20.0067 18.0307 20.0053 18.0467 20.0053L15.2373 23.9947Z" fill="#BF6E2E"/>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-6" data-aos="fade-up">
                        <p class="font-gabarito font-normal text-[2rem]/[1] tracking-[-0.04rem] text-white" data-aos="fade-up"><?php echo esc_html( $trenerzy_title ); ?></p>
                        <p class="text-white/50" data-aos="fade-up"><?php echo esc_html( $trenerzy_desc ); ?></p>
                    </div>
                    <div class="flex items-center gap-2" data-aos="fade-up">
                        <span class="size-1.5 rounded-full bg-[#EAE3D2] shrink-0"></span>
                        <p class="font-inter font-normal text-[0.875rem]/[1.2] text-[#EAE3D2]"><?php echo esc_html( $trenerzy_tag ); ?></p>
                    </div>
                </div>

            </div>

            <!-- Row 2: Card + Image + Card -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:h-140">

                <div class="bg-blue-900 rounded-2xl p-8 lg:px-12 lg:py-18 flex flex-col gap-8 justify-end">
                    <div class="size-16 border border-white/10 bg-white/2 rounded-2xl flex items-center justify-center shrink-0">
                        <svg width="24" height="32" viewBox="0 0 24 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.028 16C16.44 16 20.028 12.412 20.028 8C20.028 3.588 16.44 0 12.028 0C7.616 0 4.028 3.588 4.028 8C4.028 12.412 7.616 16 12.028 16ZM12.028 1.33333C15.704 1.33333 18.6947 4.324 18.6947 8C18.6947 11.676 15.704 14.6667 12.028 14.6667C8.352 14.6667 5.36133 11.676 5.36133 8C5.36133 4.324 8.35333 1.33333 12.028 1.33333ZM18 18.6667H6C2.692 18.6667 0 21.3587 0 24.6667V32H1.33333V24.6667C1.33333 22.0933 3.42667 20 6 20H6.66667V24.0853C5.50533 24.3733 4.63867 25.4173 4.63867 26.6667C4.63867 28.1373 5.83467 29.3333 7.30533 29.3333C8.776 29.3333 9.972 28.1373 9.972 26.6667C9.972 25.4387 9.132 24.412 8 24.104V20H16V24.7347C14.48 25.044 13.3333 26.3907 13.3333 28V32H14.6667V28C14.6667 26.8973 15.564 26 16.6667 26C17.7693 26 18.6667 26.8973 18.6667 28V32H20V28C20 26.3893 18.8533 25.044 17.3333 24.7347V20H18C20.5733 20 22.6667 22.0933 22.6667 24.6667V32H24V24.6667C24 21.3587 21.308 18.6667 18 18.6667ZM8.63867 26.6667C8.63867 27.4027 8.04133 28 7.30533 28C6.56933 28 5.972 27.4027 5.972 26.6667C5.972 25.9307 6.56933 25.3333 7.30533 25.3333C8.04133 25.3333 8.63867 25.9307 8.63867 26.6667Z" fill="#BF6E2E"/>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-6">
                        <p class="font-gabarito font-normal text-[2rem]/[1] tracking-[-0.04rem] text-white" data-aos="fade-up"><?php echo esc_html( $medyczna_title ); ?></p>
                        <p class="tracking-[-0.02125rem] text-white/50"><?php echo esc_html( $medyczna_desc ); ?></p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="size-1.5 rounded-full bg-[#EAE3D2] shrink-0" data-aos="fade-up"></span>
                        <p class="font-inter font-normal text-[0.875rem]/[1.2] text-[#EAE3D2]" data-aos="fade-up"><?php echo esc_html( $medyczna_tag ); ?></p>
                    </div>
                </div>

                <div class="h-72 lg:h-full overflow-hidden rounded-2xl">
                    <img src="<?php echo esc_url( $camp_image_2 ); ?>"
                         alt="Kadra QORT Tennis Academy"
                         class="w-full h-full object-cover">
                </div>

                <div class="bg-blue-900 rounded-2xl p-8 lg:px-12 lg:py-18 flex flex-col gap-8 justify-end">
                    <div class="size-16 border border-white/10 bg-white/2 rounded-2xl flex items-center justify-center shrink-0">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2242_288)">
                            <path d="M32.0016 14.6C32.0016 12.52 30.935 10.5733 29.1883 9.41333C29.1883 9.28 29.215 9.14667 29.215 9.02667C29.215 6.42667 27.5083 4.34667 25.215 4.04C24.7616 1.73333 22.7216 0 20.335 0C18.4816 0 16.8683 1.01333 16.0016 2.50667C15.135 1.01333 13.5216 0 11.6683 0C9.28162 0 7.24162 1.73333 6.78828 4.04C4.50828 4.33333 2.78828 6.42667 2.78828 9.04C2.78828 9.17333 2.78828 9.30667 2.80161 9.42667C1.05495 10.5867 -0.0117188 12.5333 -0.0117188 14.6133C-0.0117188 15.8667 0.361615 17.0533 1.08161 18.0933C0.361615 19.1333 -0.0117188 20.3333 -0.0117188 21.5733C-0.0117188 23.76 1.14828 25.7867 3.04161 26.9067C3.86828 29.92 6.57495 32 9.72162 32C12.4816 32 14.8816 30.3733 15.9883 28.0267C17.1083 30.3733 19.495 32 22.255 32C25.4016 32 28.095 29.92 28.935 26.9067C30.8283 25.7733 31.9883 23.76 31.9883 21.5733C31.9883 20.3333 31.615 19.1333 30.895 18.0933C31.615 17.0533 31.9883 15.8533 31.9883 14.6133L32.0016 14.6ZM9.73495 30.6667C7.12162 30.6667 4.88162 28.88 4.28162 26.32L4.21495 26.0267L3.94828 25.88C2.33495 25.0133 1.33495 23.3733 1.33495 21.5733C1.33495 20.4667 1.72161 19.4 2.44161 18.5067L2.77495 18.0933L2.44161 17.68C1.72161 16.7867 1.33495 15.72 1.33495 14.6133C1.33495 12.8533 2.29495 11.2267 3.85495 10.3467L4.26828 10.12C4.26828 10.12 4.12161 9.25333 4.12161 9.04C4.12161 7.22667 5.32162 5.34667 7.36162 5.34667H7.97495L8.02828 4.73333C8.17495 2.84 9.77495 1.34667 11.6683 1.34667C13.6949 1.34667 15.335 2.98667 15.335 5.01333V25.08C15.335 28.1733 12.8149 30.68 9.73495 30.68V30.6667ZM29.5616 18.5067C30.2816 19.4 30.6683 20.4667 30.6683 21.5733C30.6683 23.3733 29.6683 25.0133 28.055 25.88L27.7883 26.0267L27.7216 26.32C27.135 28.88 24.895 30.6667 22.2683 30.6667C19.175 30.6667 16.6683 28.1467 16.6683 25.0667V5C16.6683 2.97333 18.3083 1.33333 20.335 1.33333C22.2283 1.33333 23.8283 2.82667 23.975 4.72L24.055 5.33333H24.6683C26.6816 5.33333 27.8816 7.21333 27.8816 9.02667C27.8816 9.24 27.735 10.1067 27.735 10.1067L28.1483 10.3333C29.7083 11.2133 30.6683 12.84 30.6683 14.6C30.6683 15.7067 30.2816 16.7733 29.5616 17.6667L29.2283 18.08L29.5616 18.4933V18.5067Z" fill="#BF6E2E"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2242_288">
                            <rect width="32" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-6">
                        <p class="font-gabarito font-normal text-[2rem]/[1] tracking-[-0.04rem] text-white" data-aos="fade-up"><?php echo esc_html( $mentalne_title ); ?></p>
                        <p class="text-white/50" data-aos="fade-up"><?php echo esc_html( $mentalne_desc ); ?></p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="size-1.5 rounded-full bg-[#EAE3D2] shrink-0" data-aos="fade-up"></span>
                        <p class="font-inter font-normal text-[0.875rem]/[1.2] text-[#EAE3D2]" data-aos="fade-up"><?php echo esc_html( $mentalne_tag ); ?></p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- Terminy -->
<section class="py-10 lg:py-36 bg-blue-800">
    <div class="container-content">
        <div class="flex flex-col items-center" data-aos="fade-up">
            <span class="bullet-title">2 Turnusy</span>
            <h2 class="mb-10 lg:mb-18">Terminy</h2>
        </div>
        <div class="border border-white/15 rounded-2xl p-8 lg:p-12 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">

            <div class="flex flex-col text-center lg:text-left gap-3 lg:gap-6" data-aos="fade-up">
                <p class="font-gabarito font-normal text-[1.2rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white"><?php echo esc_html( $termin_1_label ); ?></p>
                <p class="font-gabarito text-[2rem]/[1] lg:text-[3.5rem]/[1] lg:tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $termin_1_date ); ?></p>
            </div>

            <div class="flex flex-col text-center lg:text-left gap-3 lg:gap-6" data-aos="fade-up">
                <p class="font-gabarito font-normal text-[1.2rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white"><?php echo esc_html( $termin_2_label ); ?></p>
                <p class="font-gabarito text-[2rem]/[1] lg:text-[3.5rem]/[1] lg:tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $termin_2_date ); ?></p>
            </div>

        </div>

    </div>
</section>

<!-- Kontakt -->
<section class="py-10 lg:py-36">
    <div class="container-content">
        <div class="text-center" data-aos="fade-up">
            <span class="bullet-title">Kontakt</span>
            <h2 class="mb-3 lg:mb-6">Jeśli Cię zainteresowaliśmy, <br><b>napisz do nas</b></h2>
            <p class="text-[0.9rem]/[140%] lg:text-[1.1875rem]/[1.5] -tracking-[0.02375rem] mb-12 lg:mb-16 opacity-80 mx-auto">Skontaktujemy się z Tobą, aby omówić szczegóły i odpowiedzieć na pytania.</p>
        </div>

        <!-- form -->
        <div class="max-w-312 mx-auto p-4 md:p-6 lg:p-12 border border-white/10 rounded-2xl">
         <?php echo do_shortcode('[contact-form-7 id="c422aa4" title="Camp"]') ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
