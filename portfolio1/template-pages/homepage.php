<?php
/*
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<?php
$hero_title      = get_field( 'hero_title' )      ?: '<b>Najpierw zdrowie.</b><br>Potem wynik.';
$hero_video_url    = get_field( 'hero_video_url' )    ?: get_template_directory_uri() . '/img/homepage/hero-video.mp4';
$hero_video_poster = get_field( 'hero_video_poster' ) ?: '';
$hero_video_mobile_url    = get_field( 'hero_video_mobile_url' )    ?: '';
$hero_video_mobile_poster = get_field( 'hero_video_mobile_poster' ) ?: '';

$hero_btn_1_text = get_field( 'hero_btn_1_text' ) ?: 'Poznaj Akademię';
$hero_btn_1_url  = get_field( 'hero_btn_1_url' )  ?: '#';
$hero_btn_2_text = get_field( 'hero_btn_2_text' ) ?: 'Skontaktuj się z nami';
$hero_btn_2_url  = get_field( 'hero_btn_2_url' )  ?: '#';

$stat_1_value = get_field( 'stat_1_value' ) ?: '30';
$stat_1_label = get_field( 'stat_1_label' ) ?: 'Zawodników w programie';
$stat_2_value = get_field( 'stat_2_value' ) ?: '5';
$stat_2_label = get_field( 'stat_2_label' ) ?: 'Filarów przygotowania';
$stat_3_value = get_field( 'stat_3_value' ) ?: '24/7';
$stat_3_label = get_field( 'stat_3_label' ) ?: 'Opieka medyczna';
$stat_4_value = get_field( 'stat_4_value' ) ?: '100%';
$stat_4_label = get_field( 'stat_4_label' ) ?: 'Indywidualne podejście';

$miejsce_image_1 = get_field( 'miejsce_image_1' ) ?: get_template_directory_uri() . '/img/homepage/miejsce-1.png';
$miejsce_image_2 = get_field( 'miejsce_image_2' ) ?: get_template_directory_uri() . '/img/homepage/miejsce-2.png';
$miejsce_image_3 = get_field( 'miejsce_image_3' ) ?: get_template_directory_uri() . '/img/homepage/miejsce-3.png';
$miejsce_image_4 = get_field( 'miejsce_image_4' ) ?: get_template_directory_uri() . '/img/homepage/miejsce-4.png';

$miejsce_heading = get_field( 'miejsce_heading' ) ?: 'Nowoczesne<br>centrum sportowe<br><b>w Przeźmierowie</b>';
$miejsce_text_1  = get_field( 'miejsce_text_1' )  ?: 'Od 1,5 roku budujemy w Przeźmierowie pod Poznaniem nowoczesne centrum sportowe z kortami zewnętrznymi oraz całoroczną halą tenisową w najnowszej technologii.';
$miejsce_text_2  = get_field( 'miejsce_text_2' )  ?: 'Tworzymy kompleksowe zaplecze o powierzchni ponad 4 500 m², obejmujące strefy przygotowania motorycznego, fitness, siłownię oraz centrum regeneracji sportowej.';
$miejsce_text_3  = get_field( 'miejsce_text_3' )  ?: 'Równolegle rozwijamy infrastrukturę towarzyszącą – część hotelową i restauracyjną, sale konferencyjne i wykładowe oraz pełne zaplecze medyczne z diagnostyką i specjalistyczną opieką.';

$wizja_video_url    = get_field( 'wizja_video_url' )    ?: get_template_directory_uri() . '/img/homepage/wizja-video.mp4';
$wizja_video_poster = get_field( 'wizja_video_poster' ) ?: get_template_directory_uri() . '/img/homepage/wizja-cover.jpg';
$wizja_image_1      = get_field( 'wizja_image_1' )      ?: get_template_directory_uri() . '/img/homepage/wizja-1.png';
$wizja_image_2      = get_field( 'wizja_image_2' )      ?: get_template_directory_uri() . '/img/homepage/wizja-2.png';

$wizja_heading      = get_field( 'wizja_heading' )      ?: 'Filozofia akademii';
$wizja_intro        = get_field( 'wizja_intro' )        ?: 'W QORT Tennis Academy wierzymy, że prawdziwy sukces sportowy buduje się na fundamencie zdrowia i kompleksowego podejścia do rozwoju zawodnika.';
$wizja_pillar_1_title = get_field( 'wizja_pillar_1_title' ) ?: 'Zdrowie na pierwszym miejscu';
$wizja_pillar_1_desc  = get_field( 'wizja_pillar_1_desc' )  ?: 'Prewencja urazów i holistyczna opieka medyczna stanowią podstawę naszego programu.';
$wizja_pillar_2_title = get_field( 'wizja_pillar_2_title' ) ?: 'Selekcjonowany rozwój';
$wizja_pillar_2_desc  = get_field( 'wizja_pillar_2_desc' )  ?: 'Ograniczona liczba miejsc pozwala na prawdziwie indywidualne podejście do każdego zawodnika.';
$wizja_pillar_3_title = get_field( 'wizja_pillar_3_title' ) ?: 'Kompleksowość';
$wizja_pillar_3_desc  = get_field( 'wizja_pillar_3_desc' )  ?: 'Integracja wszystkich aspektów przygotowania – od techniki po psychikę.';

$kadra_heading = get_field( 'kadra_heading' ) ?: 'Za każdym zawodnikiem stoi zespół';
$kadra_intro   = get_field( 'kadra_intro' )   ?: 'W QORT Tennis Academy za rozwój zawodnika odpowiadają trenerzy, specjaliści zdrowia oraz eksperci wspierający przygotowanie fizyczne i mentalne. Wierzymy, że najlepsze wyniki są efektem współpracy całego zespołu.';

$opieka_heading = get_field( 'opieka_heading' ) ?: 'Zdrowie <b>jako fundament sukcesu</b>';
$opieka_intro   = get_field( 'opieka_intro' )   ?: 'W QORT Tennis Academy opieka zdrowotna to nie dodatek – to absolutny priorytet. Nasza metodologia opiera się na trzech filarach.';
$opieka_pillar_1_title = get_field( 'opieka_pillar_1_title' ) ?: 'Diagnostyka i profilaktyka';
$opieka_pillar_1_desc  = get_field( 'opieka_pillar_1_desc' )  ?: 'Regularne badania i monitoring pozwalają wcześnie wykrywać ryzyko kontuzji i reagować, zanim się pojawią.';
$opieka_pillar_2_title = get_field( 'opieka_pillar_2_title' ) ?: 'Rehabilitacja i szybki powrót do gry';
$opieka_pillar_2_desc  = get_field( 'opieka_pillar_2_desc' )  ?: 'Zespół fizjoterapeutów i osteopatów wspiera regenerację i pełny powrót do sprawności.';
$opieka_pillar_3_title = get_field( 'opieka_pillar_3_title' ) ?: 'Kompleksowa opieka';
$opieka_pillar_3_desc  = get_field( 'opieka_pillar_3_desc' )  ?: 'Dietetyka, psychologia sportu i opieka medyczna tworzą spójny system troski o zawodnika.';
$opieka_pillar_1_icon  = get_field( 'opieka_pillar_1_icon' );
$opieka_pillar_2_icon  = get_field( 'opieka_pillar_2_icon' );
$opieka_pillar_3_icon  = get_field( 'opieka_pillar_3_icon' );
$opieka_image   = get_field( 'opieka_image' )   ?: get_template_directory_uri() . '/img/homepage/opieka.png';
$opieka_items   = array_filter( array_map( 'trim', explode( "\n", get_field( 'opieka_items' ) ?: "Badania diagnostyczne i screeningowe\nFizjoterapia i terapia manualna\nOsteopatia sportowa\nPoradnictwo dietetyczne\nMonitoring stanu zdrowia\nWsparcie w trakcie turniejów" ) ) );

$rekrutacja_bg_image       = get_field( 'rekrutacja_bg_image' )       ?: get_template_directory_uri() . '/img/homepage/rekrutacja-bg.png';
$rekrutacja_banner_heading = get_field( 'rekrutacja_banner_heading' ) ?: 'Opieka zdrowotna i rozwój zawodników';
$rekr_banner_items = array_filter( [
    get_field( 'rekrutacja_banner_text' )   ?: 'Wsparcie medyczne, ortopedyczne',
    get_field( 'rekrutacja_banner_text_2' ) ?: '',
    get_field( 'rekrutacja_banner_text_3' ) ?: '',
    get_field( 'rekrutacja_banner_text_4' ) ?: '',
    get_field( 'rekrutacja_banner_text_5' ) ?: '',
    get_field( 'rekrutacja_banner_text_6' ) ?: '',
    get_field( 'rekrutacja_banner_text_7' ) ?: '',
    get_field( 'rekrutacja_banner_text_8' ) ?: '',
] );

$kontakt_heading = get_field( 'kontakt_heading' ) ?: 'Jeśli Cię zainteresowaliśmy, <br><b>napisz do nas</b>';
$kontakt_intro   = get_field( 'kontakt_intro' )   ?: 'Skontaktujemy się z Tobą, aby omówić szczegóły i odpowiedzieć na pytania.';

$rekr_heading = get_field( 'rekr_heading' ) ?: 'Proces rekrutacji';
$rekr_intro   = get_field( 'rekr_intro' )   ?: 'Przyszłość sportu wyczynowego opiera się na integracji edukacji, zdrowia i treningu.';
$process_steps = [];
for ( $s = 1; $s <= 5; $s++ ) {
    $defaults_step = [
        1 => [ 'num' => '01', 'title' => 'Zgłoszenie',             'desc' => 'Wypełnienie formularza kontaktowego' ],
        2 => [ 'num' => '02', 'title' => 'Rozmowa kwalifikacyjna', 'desc' => 'Poznanie zawodnika i jego celów' ],
        3 => [ 'num' => '03', 'title' => 'Diagnostyka medyczna',   'desc' => 'Kompleksowe badania zdrowotne' ],
        4 => [ 'num' => '04', 'title' => 'Ocena sportowa',         'desc' => 'Analiza umiejętności tenisowych' ],
        5 => [ 'num' => '05', 'title' => 'Indywidualna oferta',    'desc' => 'Spersonalizowany program rozwoju' ],
    ];
    $process_steps[] = [
        'num'   => get_field( "rekr_step_{$s}_num" )   ?: $defaults_step[ $s ]['num'],
        'title' => get_field( "rekr_step_{$s}_title" ) ?: $defaults_step[ $s ]['title'],
        'desc'  => get_field( "rekr_step_{$s}_desc" )  ?: $defaults_step[ $s ]['desc'],
    ];
}
?>

<!-- hero -->
<section class="relative flex md:block items-end h-[93vh] md:h-auto">
    <figure class="w-full h-full absolute left-0 top-0 z-10">
        <?php if ( $hero_video_mobile_url ) : ?>
        <video src="<?php echo esc_url( $hero_video_mobile_url ); ?>"
               <?php if ( $hero_video_mobile_poster ) : ?>poster="<?php echo esc_url( $hero_video_mobile_poster ); ?>"<?php endif; ?>
               class="md:hidden w-full h-full object-cover"
               autoplay muted loop playsinline preload="auto"></video>
        <?php elseif ( $hero_video_mobile_poster ) : ?>
        <img src="<?php echo esc_url( $hero_video_mobile_poster ); ?>"
             alt=""
             class="md:hidden w-full h-full object-cover"
             loading="eager" fetchpriority="high" />
        <?php elseif ( $hero_video_poster ) : ?>
        <img src="<?php echo esc_url( $hero_video_poster ); ?>"
             alt=""
             class="md:hidden w-full h-full object-cover"
             loading="eager" fetchpriority="high" />
        <?php endif; ?>
        <video src="<?php echo esc_url( $hero_video_url ); ?>"
               <?php if ( $hero_video_poster ) : ?>poster="<?php echo esc_url( $hero_video_poster ); ?>"<?php endif; ?>
               class="hidden md:block w-full h-full object-cover"
               autoplay muted loop playsinline preload="auto"></video>
        <div class="hero-gradient absolute top-0 left-0 w-full h-full z-20"></div>
    </figure>
    <div class="container-content z-20 relative pt-32 lg:pt-[26.63rem] pb-6 lg:pb-34" data-aos="fade-up">
        <h1 class="mb-9 lg:mb-18"><?php echo wp_kses_post( $hero_title ); ?></h1>
        <a href="<?php echo esc_url( $hero_btn_1_url ); ?>" class="btn mr-2 mb-2">
            <?php echo esc_html( $hero_btn_1_text ); ?>
            <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.33333 3.99386C9.33009 3.64313 9.18877 3.30779 8.94 3.06053L6.08 0.193862C5.95509 0.0696947 5.78612 0 5.61 0C5.43388 0 5.26491 0.0696947 5.14 0.193862C5.07751 0.255837 5.02792 0.329571 4.99407 0.410811C4.96023 0.49205 4.9428 0.579187 4.9428 0.667195C4.9428 0.755203 4.96023 0.84234 4.99407 0.92358C5.02792 1.00482 5.07751 1.07855 5.14 1.14053L7.33333 3.3272H0.666667C0.489856 3.3272 0.320287 3.39743 0.195262 3.52246C0.070238 3.64748 0 3.81705 0 3.99386C0 4.17067 0.070238 4.34024 0.195262 4.46527C0.320287 4.59029 0.489856 4.66053 0.666667 4.66053H7.33333L5.14 6.85386C5.01446 6.97851 4.94359 7.14793 4.94296 7.32484C4.94234 7.50175 5.01201 7.67166 5.13667 7.7972C5.26132 7.92273 5.43073 7.99361 5.60764 7.99423C5.78455 7.99486 5.95446 7.92518 6.08 7.80053L8.94 4.93386C9.19039 4.68496 9.33185 4.34691 9.33333 3.99386Z" fill="white"/>
            </svg>
        </a>
        <a href="<?php echo esc_url( $hero_btn_2_url ); ?>" class="btn-light mb-2">
            <?php echo esc_html( $hero_btn_2_text ); ?>
        </a>
    </div>
</section>

<!-- numbers -->
<section class="border-b border-white/10">
    <div class="grid grid-cols-2 lg:grid-cols-4 text-center">

        <div class="flex flex-col gap-2 lg:gap-4 items-center py-6 lg:py-10 border-b border-white/10 lg:border-b-0 border-r">
            <span class="font-gabarito text-[2.5rem] lg:text-[3.5rem] leading-none tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_1_value ); ?></span>
            <p class="text-white/80"><?php echo esc_html( $stat_1_label ); ?></p>
        </div>

        <div class="flex flex-col gap-2 lg:gap-4 items-center py-6 lg:py-10 border-b border-white/10 lg:border-b-0 lg:border-r">
            <span class="font-gabarito text-[2.5rem] lg:text-[3.5rem] leading-none tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_2_value ); ?></span>
            <p class="text-white/80"><?php echo esc_html( $stat_2_label ); ?></p>
        </div>

        <div class="flex flex-col gap-2 lg:gap-4 items-center py-6 lg:py-10 border-r border-white/10 ">
            <span class="font-gabarito text-[2.5rem] lg:text-[3.5rem] leading-none tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_3_value ); ?></span>
            <p class="text-white/80"><?php echo esc_html( $stat_3_label ); ?></p>
        </div>

        <div class="flex flex-col gap-2 lg:gap-4 items-center py-6 lg:py-10">
            <span class="font-gabarito text-[2.5rem] lg:text-[3.5rem] leading-none tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $stat_4_value ); ?></span>
            <p class="text-white/80"><?php echo esc_html( $stat_4_label ); ?></p>
        </div>

    </div>
</section>

<!-- Wizja -->
<section id="wizja" class="section-bg-gradient py-10 lg:py-36">
    <div class="container-content">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:items-start">

            <div class="xl:pr-18 lg:sticky lg:top-23">
                <span class="bullet-title" data-aos="fade-up">Wizja</span>
                <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo esc_html( $wizja_heading ); ?></h2>
                <p class="text-[0.9rem]/[150%] lg:text-[1.188rem]/[150%] tracking-[-0.02375rem] mb-8" data-aos="fade-up"><?php echo esc_html( $wizja_intro ); ?></p>

                <div class="flex flex-col gap-4 lg:pt-12">

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0" >
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
                        </div>
                        <div class="flex flex-col gap-4 lg:not-last:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $wizja_pillar_1_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $wizja_pillar_1_desc ); ?></p>
                        </div>
                    </div>

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-color-fill" d="M30.667 14.6667V16H24.2897L20.8603 10.3027C20.8243 10.2427 20.7843 10.1853 20.7417 10.1293L16.667 19.6587L15.515 18.9293L19.6017 9.38667C19.4537 9.352 19.3017 9.332 19.147 9.332H15.7043L12.2203 17.6573C11.8537 18.5533 12.1817 19.5827 13.003 20.1013L20.0003 24.2867V31.9987H18.667V25.044L12.3043 21.2387C10.9203 20.364 10.3737 18.648 10.9883 17.148L14.2577 9.33333H9.07899L6.59633 14.2987L5.40299 13.7027L8.25366 8.00133H19.147C20.3097 8.00133 21.403 8.62 22.003 9.616L25.0443 14.668H30.667V14.6667ZM16.0003 3.33333C16.0003 1.496 17.4963 0 19.3337 0C21.171 0 22.667 1.496 22.667 3.33333C22.667 5.17067 21.171 6.66667 19.3337 6.66667C17.4963 6.66667 16.0003 5.17067 16.0003 3.33333ZM17.3337 3.33333C17.3337 4.436 18.231 5.33333 19.3337 5.33333C20.4363 5.33333 21.3337 4.436 21.3337 3.33333C21.3337 2.23067 20.4363 1.33333 19.3337 1.33333C18.231 1.33333 17.3337 2.23067 17.3337 3.33333ZM10.483 23.1827L9.56166 25.3333H2.66699V26.6667H10.4403L11.6123 23.932L10.9363 23.528C10.7723 23.4253 10.6337 23.2987 10.483 23.184V23.1827Z" fill="#BF6E2E"/>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $wizja_pillar_2_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $wizja_pillar_2_desc ); ?></p>
                        </div>
                    </div>

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
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
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $wizja_pillar_3_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $wizja_pillar_3_desc ); ?></p>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <video class="rounded-2xl object-cover h-auto xl:h-250 w-full mb-4 md:mb-8"
                       src="<?php echo esc_url( $wizja_video_url ); ?>"
                       poster="<?php echo esc_url( $wizja_video_poster ); ?>"
                       autoplay muted loop playsinline preload="metadata"></video>

                <div class="grid grid-cols-2 gap-4 md:gap-8">
                    <img src="<?php echo esc_url( $wizja_image_1 ); ?>" alt="" class="h-40 md:h-60 lg:h-120 w-full rounded-2xl object-cover">
                    <img src="<?php echo esc_url( $wizja_image_2 ); ?>" alt="" class="h-40 md:h-60 lg:h-120 w-full rounded-2xl object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kadra -->
<section id="kadra" class="bg-bark-bg pt-10 pb-10 lg:pt-36 lg:pb-18">
    <div class="container-content flex flex-col gap-12 lg:gap-18">

        <!-- Nagłówek -->
        <div class="flex flex-col items-start" data-aos="fade-up">
            <span class="bullet-title">Kadra</span>
            <h2 class="mb-4 lg:mb-8"><?php echo esc_html( $kadra_heading ); ?></h2>
            <p class="text-[0.9rem]/[140%] lg:text-[1.1875rem]/[1.5] tracking-[-0.02375rem] opacity-80 max-w-3xl"><?php echo esc_html( $kadra_intro ); ?></p>
        </div>

        <!-- Zakładki -->
        <div class="flex items-end gap-2 lg:gap-8 border-b border-white/10 overflow-x-auto overflow-y-hidden no-scrollbar">
            <?php
            $kadra_tabs = ['Trenerzy tenisa', 'Sztab medyczny', 'Motoryka', 'Mental', 'Dietetyka'];
            foreach ($kadra_tabs as $ti => $tab_label) :
                $tab_active = ($ti === 0);
            ?>
            <button type="button"
                    class="kadra-tab-btn shrink-0 h-12 px-2 -mb-px border-b-2 font-inter font-semibold text-[1.0625rem]/[1.5] tracking-[-0.02125rem] whitespace-nowrap transition-colors <?php echo $tab_active ? 'text-orange-500 border-orange-500' : 'text-white border-transparent'; ?>">
                <?php echo esc_html($tab_label); ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Panele zakładek -->
        <div data-aos="fade-up">
            <?php
            $kadra_panels = qorttheme_get_kadra_panels();
            foreach ($kadra_panels as $pi => $panel) :
                $panel_first = ($pi === 0);
            ?>
            <div class="kadra-tab-panel <?php echo $panel_first ? '' : 'hidden'; ?>">
                <?php if ( ! empty( $panel['people'] ) ) : ?>
                <div class="glide kadra-slider" id="kadra-slider-<?php echo $pi; ?>">
                    <div class="glide__track pb-1" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php foreach ( $panel['people'] as $person ) : ?>
                            <li class="glide__slide">
                                <div class="border border-white/10 rounded-2xl overflow-hidden flex flex-col md:flex-row">
                                    <!-- Zdjęcie -->
                                    <div class="relative h-120 md:min-h-100 md:flex-1 min-w-0">
                                        <img src="<?php echo esc_url( $person['img'] ); ?>"
                                             alt="<?php echo esc_attr( $person['name'] ); ?>"
                                             class="absolute inset-0 w-full h-full object-cover object-top" />
                                        <div class="absolute inset-0"
                                             style="background: linear-gradient(161deg, rgba(191,110,46,0) 65%, rgba(191,110,46,1) 144%)"></div>
                                    </div>
                                    <!-- Dane -->
                                    <div class="md:flex-1 p-8 lg:p-12 flex flex-col gap-8 self-stretch">
                                        <div class="flex flex-col gap-4">
                                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $person['name'] ); ?></p>
                                            <p class="font-gabarito text-[0.75rem] tracking-[0.225rem] uppercase text-orange-500 leading-none"><?php echo $person['role']; ?></p>
                                        </div>
                                        <div class="flex flex-col gap-3">
                                            <p class="text-white/50 bio-text line-clamp-6"><?php echo esc_html( $person['bio'] ); ?></p>
                                            <button type="button" class="bio-toggle-btn hidden self-start text-orange-500 font-inter font-semibold text-[0.8125rem]/[150%] tracking-[-0.01625rem] transition-colors hover:text-orange-700">Czytaj więcej</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Paginacja -->
                    <div class="mt-8 lg:mt-12 flex gap-4" data-glide-el="controls[nav]">
                        <?php for ( $bi = 0; $bi < count( $panel['people'] ); $bi++ ) : ?>
                        <button class="glide__bullet" data-glide-dir="=<?php echo $bi; ?>" type="button"
                                aria-label="Slajd <?php echo $bi + 1; ?>"></button>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php else : ?>
                <p class="text-white/40 py-16 text-center">Wkrótce</p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Partnerzy -->
        <div class="border-t border-white/10 pt-12 lg:pt-18 flex flex-col sm:flex-row gap-8 lg:gap-18 items-center justify-center flex-wrap">
            <p class="text-[1.25rem]/[1.6] tracking-[-0.025rem] text-white/80 whitespace-nowrap shrink-0">Współpracujemy z</p>
            <div class="flex flex-wrap gap-8 lg:gap-18 items-center justify-center">
                <img src="<?php echo get_template_directory_uri(); ?>/img/homepage/wspolpracujemy-1.svg"
                     alt="QORT Sport Health Center"
                     class="h-10 w-auto" data-aos="fade-up" />
                <img src="<?php echo get_template_directory_uri(); ?>/img/homepage/wspolpracujemy-2.png"
                     alt="Akademia Osteopatii"
                     class="size-26 object-contain" data-aos="fade-up" />
                <img src="<?php echo get_template_directory_uri(); ?>/img/homepage/wspolpracujemy-3.png"
                     alt="ASGO Centrum Zdrowia"
                     class="h-16 w-auto" data-aos="fade-up" />
            </div>
        </div>

    </div>
</section>


<!-- Miejsce -->
<section id="miejsce" class="py-10 lg:py-20">
    <div class="container-content">

        <span class="bullet-title" data-aos="fade-up">Miejsce</span>
        <h2 class="mb-4 lg:mb-8 lg:mb-16" data-aos="fade-up"><?php echo wp_kses_post( $miejsce_heading ); ?></h2>

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Lewa kolumna: 3 zdjęcia -->
            <div class="flex-1 flex flex-col gap-8 min-w-0">

                <div class="h-72 lg:h-133.25 rounded-2xl overflow-hidden">
                    <img src="<?php echo esc_url( $miejsce_image_1 ); ?>"
                         alt="Korty QORT Tennis Academy"
                         class="w-full h-full object-cover" />
                </div>

                <div class="flex gap-8 h-48 lg:h-120">
                    <div class="flex-1 rounded-2xl overflow-hidden min-w-0">
                        <img src="<?php echo esc_url( $miejsce_image_2 ); ?>"
                             alt="Trening tenisowy"
                             class="w-full h-full object-cover" />
                    </div>
                    <div class="flex-1 rounded-2xl overflow-hidden min-w-0">
                        <img src="<?php echo esc_url( $miejsce_image_3 ); ?>"
                             alt="QORT Sport Health Center"
                             class="w-full h-full object-cover" />
                    </div>
                </div>

            </div>

            <!-- Prawa kolumna: tekst + zdjęcie -->
            <div class="flex-1 flex flex-col lg:justify-end gap-8 min-w-0">

                <div class="flex flex-col gap-8 lg:pb-18 lg:pl-18 max-w-152" data-aos="fade-up">
                    <p class="text-[0.9rem]/[140%] lg:text-[1.1875rem] leading-normal tracking-[-0.02375rem] text-white/80"><?php echo esc_html( $miejsce_text_1 ); ?></p>
                    <div class="flex flex-col gap-4">
                        <p class="text-white/50"><?php echo esc_html( $miejsce_text_2 ); ?></p>
                        <p class="text-white/50"><?php echo esc_html( $miejsce_text_3 ); ?></p>
                    </div>
                </div>

                <div class="h-64 lg:h-96 rounded-2xl overflow-hidden shrink-0">
                    <img src="<?php echo esc_url( $miejsce_image_4 ); ?>"
                         alt="Korty tenisowe QORT"
                         class="w-full h-full object-cover" />
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Opieka zdrowotna -->
<section id="opieka-zdrowotna" class="bg-blue-800 py-10 lg:py-36">
    <div class="container-content">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:items-start">

            <div class="xl:pr-18 lg:sticky lg:top-23">
                <span class="bullet-title" data-aos="fade-up">Opieka zdrowotna</span>
                <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo wp_kses_post( $opieka_heading ); ?></h2>
                <p class="text-[0.9rem]/[150%] lg:text-[1.188rem]/[150%] tracking-[-0.02375rem] mb-8" data-aos="fade-up"><?php echo esc_html( $opieka_intro ); ?></p>

                <div class="flex flex-col gap-4 lg:pt-12">

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <?php if ( $opieka_pillar_1_icon ) : ?>
                            <?php echo $opieka_pillar_1_icon; ?>
                            <?php else : ?>
                            <svg width="32" height="28" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.036 27.576L15.9373 4.70933L10.028 22.956L6.22 13.688H0V12.3547H7.11333L9.88 19.0867L16.0627 0L22.0547 22.4667L24.824 12.3547H32V13.688H25.8427L22.036 27.576Z" fill="#BF6E2E"/>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $opieka_pillar_1_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $opieka_pillar_1_desc ); ?></p>
                        </div>
                    </div>

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <?php if ( $opieka_pillar_2_icon ) : ?>
                            <?php echo $opieka_pillar_2_icon; ?>
                            <?php else : ?>
                            <svg width="32" height="28" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.0733 10.6667C26.236 10.6667 24.74 12.1627 24.74 14C24.74 15.8373 26.236 17.3333 28.0733 17.3333C29.9107 17.3333 31.4067 15.8387 31.4067 14C31.4067 12.1613 29.9107 10.6667 28.0733 10.6667ZM28.0733 16C26.9707 16 26.0733 15.1027 26.0733 14C26.0733 12.8973 26.9707 12 28.0733 12C29.176 12 30.0733 12.8973 30.0733 14C30.0733 15.1027 29.176 16 28.0733 16ZM22.1133 10.6667H10.74C9.01333 10.6667 7.43467 11.6133 6.62133 13.1373L0 28H1.60667L6.244 17.3333H11.664L15.7853 28H17.4067L13.1387 17.3333H22.1133V28H23.4467V0H22.1133V10.6667ZM6.824 16L7.744 13.8853C8.372 12.692 9.48533 12 10.7413 12H22.1147V16H6.824Z" fill="#BF6E2E"/>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $opieka_pillar_2_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $opieka_pillar_2_desc ); ?></p>
                        </div>
                    </div>

                    <div class="border border-white/10 rounded-2xl p-4 lg:p-12 flex gap-4 lg:gap-8 items-start" data-aos="fade-up">
                        <div class="size-16 rounded-2xl bg-white/2 border border-white/10 flex items-center justify-center shrink-0">
                            <?php if ( $opieka_pillar_3_icon ) : ?>
                            <?php echo $opieka_pillar_3_icon; ?>
                            <?php else : ?>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M31.9536 18.5613C30.9629 24.3893 27.1482 29.2627 21.4869 31.936L21.3509 32L10.5122 31.936C4.85355 29.264 1.03755 24.3893 0.0468843 18.5627C-0.117116 17.5933 0.153551 16.608 0.789551 15.8547C1.31088 15.2373 2.02688 14.836 2.80955 14.7093C2.71488 14.26 2.66688 13.7987 2.66688 13.3333C2.66688 11.1267 3.70022 9.12533 5.35755 7.91067C5.36422 7.91733 5.36155 7.91467 5.35755 7.91067C3.55222 6.104 3.55222 3.164 5.35755 1.35733C6.25888 0.454667 7.44288 0.00133333 8.62822 0.00133333C10.8202 0.00133333 11.9709 1.41867 12.0002 1.44933C12.0296 1.41867 13.1535 0.00133333 15.3589 0.00133333C16.5469 0.00133333 17.7362 0.452 18.6429 1.35733C19.6896 2.404 20.1642 3.84933 19.9722 5.24267C21.1535 4.488 22.6669 2.94667 22.6669 0H24.0002C24.0002 2.18933 23.2816 3.748 22.3856 4.84C25.4389 4.15733 28.4242 4.01067 28.6376 4.00133L29.3696 3.968L29.3336 4.69867C29.3229 4.94533 29.0402 10.344 27.0976 14.6667H28.6562C29.6429 14.6667 30.5736 15.1 31.2122 15.8547C31.8482 16.6067 32.1176 17.5933 31.9536 18.5613ZM18.4629 7.62667C18.1295 7.90267 17.7882 8.16 17.5136 8.35733C16.0989 9.796 15.6295 11.8707 16.2895 13.7827C16.3935 14.0067 16.6322 14.428 16.8402 14.6667H17.7255L22.1976 10.1947L23.1402 11.1373L19.6122 14.6653H25.6242C27.2536 11.3933 27.7895 7.09333 27.9469 5.38133C26.0535 5.52933 21.0722 6.05733 18.4655 7.62533L18.4629 7.62667ZM6.30022 6.968C6.39622 7.06267 6.50288 7.15467 6.62288 7.244C7.45222 6.87333 8.36955 6.66667 9.33355 6.66667C11.7442 6.66667 13.8602 7.95333 15.0322 9.876C15.3536 8.95467 15.8815 8.10267 16.6029 7.38133C16.8895 7.09467 17.2336 6.83067 17.6176 6.58933C18.0616 6.21867 18.4015 5.89067 18.4735 5.748C18.9282 4.58267 18.6255 3.22533 17.7002 2.3C16.4135 1.01333 14.3189 1.01333 13.0322 2.3C12.5829 2.74933 12.0002 3.812 12.0002 3.812C12.0002 3.812 11.3802 2.712 10.9682 2.3C9.68022 1.012 7.58555 1.01333 6.30022 2.3C5.01355 3.58667 5.01355 5.68267 6.30022 6.968ZM4.00022 13.3333C4.00022 13.7867 4.05622 14.236 4.16822 14.6667H14.4989C14.6109 14.236 14.6669 13.7867 14.6669 13.3333C14.6669 10.392 12.2749 8 9.33355 8C6.39222 8 4.00022 10.392 4.00022 13.3333ZM30.1936 16.716C29.8096 16.2613 29.2482 16 28.6562 16H3.34555C2.75355 16 2.19222 16.26 1.80822 16.716C1.42688 17.168 1.26422 17.76 1.36288 18.34C2.27222 23.6853 5.76288 28.1707 10.9495 30.668H21.0509C26.2389 28.1707 29.7296 23.6853 30.6376 18.34C30.7362 17.76 30.5735 17.1693 30.1922 16.7173L30.1936 16.716Z" fill="#BF6E2E"/>
                            </svg>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-6">
                            <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $opieka_pillar_3_title ); ?></p>
                            <p class="text-white/50 pr-2 md:pr-8"><?php echo esc_html( $opieka_pillar_3_desc ); ?></p>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <img class="rounded-2xl object-cover h-auto xl:h-138 w-full mb-8" src="<?php echo esc_url( $opieka_image ); ?>" alt="">

                <div class="bg-blue-950 rounded-2xl p-8 lg:p-12 flex flex-col gap-5 lg:gap-10">
                    <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white" data-aos="fade-up">Zakres opieki medycznej</p>
                    <ul class="flex flex-col gap-2 lg:gap-6">
                        <?php
                        $med_total = count( $opieka_items );
                        $med_i = 0;
                        foreach ( $opieka_items as $med_item ) :
                            $med_last = ( $med_i === $med_total - 1 );
                            $med_i++;
                        ?>
                        <li data-aos="fade-up" class="flex gap-2 lg:gap-5 items-center <?php echo ! $med_last ? 'pb-[1.5625rem] border-b border-white/5' : ''; ?>">
                            <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-color-fill" d="M5.14267 10.856C4.88008 10.8565 4.61999 10.8051 4.37733 10.7047C4.13467 10.6044 3.91423 10.4571 3.72867 10.2713L0 6.54333L0.942667 5.6L4.67133 9.32867C4.79635 9.45365 4.96589 9.52386 5.14267 9.52386C5.31944 9.52386 5.48898 9.45365 5.614 9.32867L14.9427 0L15.8853 0.942667L6.55667 10.2713C6.3711 10.4571 6.15066 10.6044 5.908 10.7047C5.66534 10.8051 5.40525 10.8565 5.14267 10.856Z" fill="#BF6E2E"></path>
                            </svg>
                            <p class="text-white/70"><?php echo esc_html( $med_item ); ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rekrutacja -->
<section id="rekrutacja" class="pt-10 pb-14 lg:py-36">
    <div class="container-content">
        <div class="text-center" data-aos="fade-up">
            <span class="bullet-title">Rekrutacja</span>
            <h2 class="mb-3 lg:mb-6"><?php echo esc_html( $rekr_heading ); ?></h2>
            <p class="text-[0.9rem]/[140%] lg:text-[1.1875rem]/[1.5] tracking-[-0.02375rem] mb-12 lg:mb-18 opacity-80 max-w-2xl mx-auto"><?php echo esc_html( $rekr_intro ); ?></p>
        </div>

        <!-- Slider kroków -->
        <div class="overflow-hidden">
            <div class="glide rekrutacja-slider slider-bullets-simple">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php foreach ( $process_steps as $step ) : ?>
                        <li class="glide__slide" data-aos="fade-up">
                            <div class="border border-white/15 rounded-2xl p-8 lg:p-12 flex flex-col gap-8 justify-end h-64 lg:h-80">
                                <p class="font-gabarito text-[3.5rem] leading-12 tracking-[-0.075rem] text-orange-500"><?php echo esc_html( $step['num'] ); ?></p>
                                <div class="flex flex-col gap-2 lg:gap-6">
                                    <p class="font-gabarito font-normal text-[1.4rem]/[100%] lg:text-[2rem]/[100%] leading-none tracking-[-0.04rem] text-white"><?php echo esc_html( $step['title'] ); ?></p>
                                    <p class="text-[1rem]/[1.6] tracking-[-0.02rem] text-white/50"><?php echo esc_html( $step['desc'] ); ?></p>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="glide__bullets flex justify-center gap-2 mt-8" data-glide-el="controls[nav]">
                    <?php foreach ( $process_steps as $i => $step ) : ?>
                    <button class="glide__bullet" data-glide-dir="=<?php echo $i; ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="rounded-2xl relative mt-6 lg:mt-18 overflow-hidden">

            <img src="<?php echo esc_url( $rekrutacja_bg_image ); ?>" alt="" class="w-full h-full absolute top-0 left-0 object-cover border-l-[2rem] border-black">
            <div class="inline-flex flex-col relative p-4 md:p-6 xl:p-18 lg:max-w-139">
                <div class="bg-linear-to-r from-black to-transparent absolute left-0 top-0 w-full h-full backdrop-blur-[1.55rem]"
                     style="-webkit-mask-image: linear-gradient(to right, black 45%, transparent 90%); mask-image: linear-gradient(to right, black 45%, transparent 90%);"></div>
                <h3 class="mb-12 z-10"><?php echo esc_html( $rekrutacja_banner_heading ); ?></h3>
                <ul class="list-none flex flex-col gap-4 xl:gap-6 z-10">
                    <?php foreach ( $rekr_banner_items as $rekr_item ) : ?>
                    <li class="list-none flex gap-5 pb-6 border-b border-white/5">
                        <svg class="shrink-0 mt-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-color-fill" d="M5.20028 13.6871C4.9377 13.6875 4.67761 13.6361 4.43495 13.5358C4.19229 13.4355 3.97185 13.2882 3.78628 13.1024L0.0576172 9.37439L1.00028 8.43106L4.72895 12.1597C4.85397 12.2847 5.02351 12.3549 5.20028 12.3549C5.37706 12.3549 5.5466 12.2847 5.67162 12.1597L15.0003 2.83105L15.943 3.77372L6.61428 13.1024C6.42872 13.2882 6.20828 13.4355 5.96562 13.5358C5.72296 13.6361 5.46287 13.6875 5.20028 13.6871Z" fill="#BF6E2E"/>
                        </svg>
                        <span class="text-white text-base/[160%] tracking-[-0.02rem] opacity-50"><?php echo esc_html( $rekr_item ); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>

    </div>
</section>

<!-- Kontakt -->
<section id="kontakt" class="bg-blue-800 py-10 lg:py-36">
    <div class="container-content">
        <div class="text-center" data-aos="fade-up">
            <span class="bullet-title">Kontakt</span>
            <h2 class="mb-3 lg:mb-6"><?php echo wp_kses_post( $kontakt_heading ); ?></h2>
            <p class="text-[0.9rem]/[140%] lg:text-[1.1875rem]/[1.5] tracking-[-0.02375rem] mb-12 lg:mb-16 opacity-80 mx-auto"><?php echo esc_html( $kontakt_intro ); ?></p>
        </div>

        <!-- form -->
        <div class="max-w-312 mx-auto p-4 md:p-6 lg:p-12 border border-white/10 rounded-2xl">
         <?php echo do_shortcode('[contact-form-7 id="a77cf6a" title="Kontakt"]') ?>
        </div>

    </div>
</section>


<?php get_footer(); ?>
