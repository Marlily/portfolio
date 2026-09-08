<?php
/*
 * Template Name: Wizja
 */
?>

<?php get_header(); ?>

<?php
$hero_title      = get_field( 'hero_title' )      ?: 'Wynik to<br><b>efekt procesu</b>.';
$hero_btn_text   = get_field( 'hero_btn_text' )   ?: 'Poznaj Misję';
$hero_btn_url    = get_field( 'hero_btn_url' )    ?: '#';

$manifest_heading = get_field( 'manifest_heading' ) ?: 'Budujemy zawodników<br>zdolnych rozwijać się przez lata';
$manifest_text_1  = get_field( 'manifest_text_1' )  ?: '<p>QORT Tennis Academy powstała z przekonania, że rozwój zawodnika wymaga czegoś więcej niż dobrego treningu. Wymaga odpowiedniego otoczenia, zespołu specjalistów i konsekwentnie realizowanej strategii rozwoju.</p>';
$manifest_text_2  = get_field( 'manifest_text_2' )  ?: '<p>Dzisiaj o sukcesie nie decyduje wyłącznie jakość gry na korcie. Równie istotne są przygotowanie fizyczne, odporność mentalna, regeneracja, profilaktyka urazów oraz umiejętność funkcjonowania w wymagającym środowisku sportowym.</p>';
$manifest_image   = get_field( 'manifest_image' )   ?: get_template_directory_uri() . '/img/wizja/wizja-1.png';

$filary_heading = get_field( 'filary_heading' ) ?: '4 filary naszego podejścia';

$filary_defaults = [
    [ 'title' => 'Długoterminowy rozwój',  'desc' => 'Nie przygotowujemy zawodników na jeden sezon. Budujemy fundamenty, które pozwalają rozwijać się przez całą karierę sportową – od juniorów do seniorów.',                                     'img' => '/img/wizja/filar-1.png' ],
    [ 'title' => 'Indywidualne podejście', 'desc' => 'Każdy zawodnik jest inny. Dlatego programy treningowe w QORT są tworzone z myślą o konkretnej osobie – jej mocnych stronach, ograniczeniach i celach.',                                       'img' => '/img/wizja/filar-2.png' ],
    [ 'title' => 'Holistyczne wsparcie',   'desc' => 'Tenis to nie tylko uderzenia. W QORT łączymy trening techniczny z przygotowaniem motorycznym, opieką mentalną i regeneracją w jeden spójny system.',                                         'img' => '/img/wizja/filar-3.png' ],
    [ 'title' => 'Środowisko mistrzostwa', 'desc' => 'Otoczenie kształtuje zawodnika. Kompleks QORT został zaprojektowany tak, by każdy element – od kortów po diagnostykę – służył jednemu celowi.',                                              'img' => '/img/wizja/filar-4.png' ],
];
$filar_keys = [ 'filar_1', 'filar_2', 'filar_3', 'filar_4' ];
$filary = [];
foreach ( $filar_keys as $i => $key ) {
    $filary[] = [
        'num'   => '0' . ( $i + 1 ) . '.',
        'title' => get_field( "{$key}_title" ) ?: $filary_defaults[ $i ]['title'],
        'desc'  => get_field( "{$key}_desc" )  ?: $filary_defaults[ $i ]['desc'],
        'image' => get_field( "{$key}_image" ) ?: get_template_directory_uri() . $filary_defaults[ $i ]['img'],
    ];
}

$tenis_heading = get_field( 'tenis_heading' ) ?: 'Współczesny tenis';
$tenis_text    = get_field( 'tenis_text' )    ?: 'Dzisiaj o sukcesie nie decyduje wyłącznie jakość gry na korcie. Równie istotne są przygotowanie fizyczne, odporność mentalna, regeneracja, profilaktyka urazów oraz umiejętność funkcjonowania w wymagającym środowisku sportowym.';

$program_heading     = get_field( 'program_heading' )     ?: 'Jednostki treningowe';
$program_u10_label   = get_field( 'program_u10_label' )   ?: 'U10';
$program_u10_units   = get_field( 'program_u10_units' )   ?: '30 jednostek miesięcznie';
$program_u12_label   = get_field( 'program_u12_label' )   ?: 'U12';
$program_u12_units   = get_field( 'program_u12_units' )   ?: '40 jednostek miesięcznie';
$program_u14_label   = get_field( 'program_u14_label' )   ?: 'U14';
$program_u14_units   = get_field( 'program_u14_units' )   ?: '52 jednostki miesięcznie';
$program_u1618_label = get_field( 'program_u1618_label' ) ?: 'U16 i U18';
$program_u1618_units = get_field( 'program_u1618_units' ) ?: '68 jednostek miesięcznie';

$spojny_heading       = get_field( 'spojny_heading' )       ?: 'Jeden zawodnik pełny system rozwoju';
$spojny_subtitle      = get_field( 'spojny_subtitle' )      ?: '8 obszarów, które wspólnie tworzą kompletną opiekę nad zawodnikiem';
$spojny_image         = get_field( 'spojny_image' )         ?: get_template_directory_uri() . '/img/wizja/spojny-plan-dzialania.png';
$spojny_image_mobile  = get_field( 'spojny_image_mobile' )  ?: $spojny_image;
?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => $hero_title,
    'btn_text' => $hero_btn_text,
    'btn_url'  => $hero_btn_url,
    'image'        => get_the_post_thumbnail_url( null, 'full' ) ?: get_template_directory_uri() . '/img/miejsce/hero.jpg',
    'image_mobile' => get_field( 'hero_image_mobile' ) ?: '',
] ); ?>


<!-- Budujemy zawodników-->
 <section id="manifest" class="py-10 lg:pt-36 lg:pb-12">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up">Nasz manifest</span>
        <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo wp_kses_post( $manifest_heading ); ?></h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-8">
            <div class="wysiwyg text-white/80" data-aos="fade-up"><?php echo wp_kses_post( $manifest_text_1 ); ?></div>
            <div class="wysiwyg text-white/80" data-aos="fade-up"><?php echo wp_kses_post( $manifest_text_2 ); ?></div>
        </div>

        <div class="relative w-full max-w-310 mx-auto mt-10 lg:mt-36">
            <img src="<?php echo esc_url( $manifest_image ); ?>" alt="" class="w-full block h-auto">
            <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-[#0D0D0D] to-transparent pointer-events-none"></div>
        </div>
    </div>
 </section>


<!-- 4 filary -->
 <section class="py-10 lg:py-36 bg-blue-800 overflow-hidden">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up">Wizja</span>
        <h2 class="mb-10 lg:mb-18" data-aos="fade-up"><?php echo esc_html( $filary_heading ); ?></h2>

        <!-- slider -->
        <div class="glide wizja-slider">
            <div class="relative border border-white/15 rounded-2xl">

                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">

                        <?php foreach ( $filary as $fi => $filar ) : ?>
                        <li class="glide__slide px-8 py-8 lg:px-12 lg:py-12">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">
                                <div class="flex flex-col gap-6">
                                    <p class="font-gabarito text-[3.5rem]/[1] tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $filar['num'] ); ?></p>
                                    <div class="flex flex-col gap-4">
                                        <h3><?php echo esc_html( $filar['title'] ); ?></h3>
                                        <p class="text-white/80"><?php echo esc_html( $filar['desc'] ); ?></p>
                                    </div>
                                </div>
                                <img src="<?php echo esc_url( $filar['image'] ); ?>" alt="<?php echo esc_attr( $filar['title'] ); ?>" class="w-150 h-83.5 ml-auto object-cover rounded-2xl" />
                            </div>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <!-- Nawigacja: strzałki + punkty -->
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-4 w-full lg:absolute bottom-8 lg:bottom-12 left-8 lg:left-12 z-10 mb-8 lg:mb-0 slider-bullets-simple">
                    <div class="flex flex-col gap-4 lg:block items-center">
                        <div data-glide-el="controls" class="flex items-center gap-4">
                            <button data-glide-dir="<" class="size-10 lg:size-12 rounded-full border border-white/20 flex items-center justify-center hover:border-white/50 transition-colors" aria-label="Poprzedni slajd">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 7H1M1 7L7 1M1 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button data-glide-dir=">" class="size-10 lg:size-12 rounded-full bg-orange-500 flex items-center justify-center hover:bg-orange-700 transition-colors" aria-label="Następny slajd">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 7H15M15 7L9 1M15 7L9 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div data-glide-el="controls[nav]" class="flex items-center justify-end gap-3 lg:pr-24 -order-1">
                            <?php for ( $bi = 0; $bi < count( $filary ); $bi++ ) : ?>
                            <button class="glide__bullet" data-glide-dir="=<?php echo $bi; ?>" aria-label="Slajd <?php echo $bi + 1; ?>"></button>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
 </section>

 <section class="relative overflow-hidden">
    <img class="w-full h-full object-cover absolute top-0 left-0 -z-10" src="<?php echo get_template_directory_uri(); ?>/img/wizja/wizja-bg.png" alt="">

    <div class="container-content pt-10 pb-20 lg:pt-36 lg:pb-60">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div></div>
            <div>
                <div class="max-w-155">
                    <span class="bullet-title" data-aos="fade-up">Jak rozumiemy tenis</span>
                    <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo esc_html( $tenis_heading ); ?></h2>
                    <p class="text-[0.875rem]/[130%] lg:text-[1.1875rem]/[150%] tracking-[-0.0234rem]" data-aos="fade-up"><?php echo esc_html( $tenis_text ); ?></p>
                </div>
            </div>
        </div>
    </div>

    <span class="text-gabarito text-[3rem]/[0.9] md:text-[5rem]/[1] xl:text-[12.5rem]/[1] xl:tracking-[-0.625rem] font-semibold absolute -bottom-1 md:-bottom-3 xl:bottom-[-1.65rem] right-2 opacity-[0.06] text-nowrap">Tenis to system</span>
 </section>

<!-- Spójny plan działania -->
<section id="spojny-plan" class="bg-black overflow-hidden">

    <!-- Mobile: tekst nad zdjęciem -->
    <div class="lg:hidden flex flex-col">
        <div class="flex flex-col gap-4 px-6 pt-10 pb-6">
            <div class="self-start border border-orange-500 px-4 py-1.5 rounded-full">
                <span class="font-inter font-bold uppercase text-orange-500 text-[0.75rem] tracking-widest">program</span>
            </div>
            <p class="font-gabarito font-normal text-white leading-none text-[2rem] sm:text-[2.5rem] tracking-[-0.05rem]" data-aos="fade-up">
                <?php echo esc_html( $spojny_heading ); ?>
            </p>
            <p class="font-inter font-normal text-white/50 text-[0.9375rem] leading-[1.5]" data-aos="fade-up">
                <?php echo esc_html( $spojny_subtitle ); ?>
            </p>
        </div>
        <img src="<?php echo esc_url( $spojny_image_mobile ); ?>" alt="" class="w-full h-auto block " />
    </div>

    <!-- Desktop: zdjęcie z tekstem na wierzchu -->
    <div class="hidden lg:block relative w-full aspect-video">
        <img src="<?php echo esc_url( $spojny_image ); ?>"
             alt=""
             class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute top-0 left-0 z-10 flex flex-col gap-[1.25vw] pl-[7.5%] pt-[5rem]">
            <div class="self-start border border-orange-500 px-[0.833vw] py-[0.3125vw] rounded-full">
                <span class="font-inter font-bold uppercase text-orange-500 tracking-widest" style="font-size:0.625vw;">program</span>
            </div>
            <p class="font-gabarito font-normal text-white leading-none" style="font-size:4.167vw;letter-spacing:-0.078vw;max-width:42.66vw;" data-aos="fade-up">
                <?php echo esc_html( $spojny_heading ); ?>
            </p>
            <p class="font-inter font-normal text-white/50 leading-[1.5]" style="font-size:0.885vw;letter-spacing:-0.0177vw;" data-aos="fade-up">
                <?php echo esc_html( $spojny_subtitle ); ?>
            </p>
        </div>
    </div>

</section>

<!-- Program -->
<section class="bg-black pt-10 pb-18 lg:pt-[2.5rem] lg:pb-[9rem] overflow-hidden">
    <div class="container-content">

        <p class="font-gabarito font-medium text-[2rem] leading-none tracking-[-0.04rem] text-white mb-6 lg:mb-10" data-aos="fade-up">
            <?php echo esc_html( $program_heading ); ?>
        </p>

        <div class="glide program-slider" data-aos="fade-up">
            <div class="glide__track !overflow-visible" data-glide-el="track">
                <ul class="glide__slides">
                    <?php
                    $prog_cards = [
                        [ 'label' => $program_u10_label,   'units' => $program_u10_units ],
                        [ 'label' => $program_u12_label,   'units' => $program_u12_units ],
                        [ 'label' => $program_u14_label,   'units' => $program_u14_units ],
                        [ 'label' => $program_u1618_label, 'units' => $program_u1618_units ],
                    ];
                    foreach ( $prog_cards as $card ) :
                    ?>
                    <li class="glide__slide">
                        <div class="border border-white/15 rounded-2xl p-12 flex flex-col justify-between h-full">
                            <p class="font-gabarito font-medium text-[2rem] leading-none tracking-[-0.04rem] text-orange-500">
                                <?php echo esc_html( $card['label'] ); ?>
                            </p>
                            <p class="font-inter font-normal text-[1.1875rem] leading-[1.5] tracking-[-0.02375rem] text-white">
                                <?php echo esc_html( $card['units'] ); ?>
                            </p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
