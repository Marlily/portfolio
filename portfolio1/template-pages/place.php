<?php
/*
 * Template Name: Miejsce
 */
?>

<?php get_header(); ?>

<?php
$hero_title    = get_field( 'hero_title' )    ?: 'Miejsce, które<br><b>wspiera proces</b>.';
$hero_btn_text = get_field( 'hero_btn_text' ) ?: 'Poznaj Obiekt';
$hero_btn_url  = get_field( 'hero_btn_url' )  ?: '#';

$qorty_heading = get_field( 'qorty_heading' ) ?: 'Budujemy przyszłość sportu';

$current_stage = (int) ( get_field( 'current_stage' ) ?: 2 );
$current_stage = max( 1, min( 5, $current_stage ) );

$stages = [
    [ 'label' => get_field( 'stage_1_label' ) ?: 'I etap',   'desc' => get_field( 'stage_1_desc' ) ?: 'Otwarcie 4 kortów ziemnych maj 2026' ],
    [ 'label' => get_field( 'stage_2_label' ) ?: 'II etap',  'desc' => get_field( 'stage_2_desc' ) ?: 'Oddanie hali z 4 kortami hard wrzesień 2026' ],
    [ 'label' => get_field( 'stage_3_label' ) ?: 'III etap', 'desc' => '' ],
    [ 'label' => get_field( 'stage_4_label' ) ?: 'IV etap',  'desc' => '' ],
    [ 'label' => get_field( 'stage_5_label' ) ?: 'V etap',   'desc' => '' ],
];

foreach ( $stages as $stage_i => &$stage_ref ) {
    $stage_ref['active'] = ( $stage_i + 1 ) <= $current_stage;
}
unset( $stage_ref );

$stages_progress_percent = ( $current_stage - 1 ) / count( $stages ) * 100;

$wiecej_heading = get_field( 'wiecej_heading' ) ?: 'Więcej niż ośrodek tenisowy';
$wiecej_text_1  = get_field( 'wiecej_text_1' )  ?: '<p>Powstający w Przeźmierowie pod Poznaniem kompleks QORT został zaprojektowany z myślą o jednym celu — stworzeniu środowiska, w którym każdy element infrastruktury wspiera rozwój zawodnika.</p>';
$wiecej_text_2  = get_field( 'wiecej_text_2' )  ?: '<p>Korty, przygotowanie motoryczne, regeneracja, diagnostyka i zaplecze medyczne funkcjonują w jednym ekosystemie. Dzięki temu proces treningowy nie kończy się po zejściu z kortu, lecz jest kontynuowany w każdym obszarze wpływającym na zdrowie i wynik sportowy.</p>';

$bloki = [
    [ 'value' => get_field( 'blok_1_value' ) ?: '4 500+ m²',             'desc' => get_field( 'blok_1_desc' ) ?: 'powierzchni sportowej i treningowej' ],
    [ 'value' => get_field( 'blok_2_value' ) ?: 'Korty zewnętrzne',      'desc' => get_field( 'blok_2_desc' ) ?: 'przystosowane do treningu i rywalizacji' ],
    [ 'value' => get_field( 'blok_3_value' ) ?: 'Całoroczna hala tenisowa', 'desc' => get_field( 'blok_3_desc' ) ?: 'wykonana w nowoczesnej technologii' ],
    [ 'value' => get_field( 'blok_4_value' ) ?: 'Jedna lokalizacja',     'desc' => get_field( 'blok_4_desc' ) ?: 'łącząca trening, przygotowanie motoryczne i regenerację' ],
];

$qorty_slides = array_filter( [
    get_field( 'qorty_slide_1' ) ?: get_template_directory_uri() . '/img/miejsce/qorty-1.jpg',
    get_field( 'qorty_slide_2' ) ?: get_template_directory_uri() . '/img/miejsce/qorty-2.jpg',
    get_field( 'qorty_slide_3' ) ?: get_template_directory_uri() . '/img/miejsce/qorty-3.jpg',
    get_field( 'qorty_slide_4' ),
    get_field( 'qorty_slide_5' ),
] );

$infra_heading = get_field( 'infra_heading' ) ?: 'Kompleks zaprojektowany<br><b>wokół zawodnika</b>.';

$infra_defaults = [
    [ 'heading' => 'Korty tenisowe',                       'desc' => 'Sercem kompleksu są korty stanowiące podstawowe środowisko pracy zawodników QORT Tennis Academy. Infrastruktura została zaplanowana tak, aby umożliwiać realizację całorocznego procesu treningowego niezależnie od warunków atmosferycznych.' ],
    [ 'heading' => 'Przygotowanie motoryczne',             'desc' => 'Dedykowane strefy treningowe pozwolą prowadzić rozwój siły, szybkości, mobilności i wytrzymałości w ścisłej integracji z planem tenisowym.' ],
    [ 'heading' => 'Regeneracja i odnowa',                 'desc' => 'Proces odbudowy organizmu jest nieodłącznym elementem sportu wyczynowego. Dlatego w kompleksie powstaje przestrzeń wspierająca regenerację po treningach i zawodach.' ],
    [ 'heading' => 'Diagnostyka i opieka specjalistyczna', 'desc' => 'Zawodnicy będą mogli korzystać z wiedzy specjalistów oraz zaplecza medycznego wspierającego monitorowanie zdrowia i efektywności procesu treningowego.' ],
];
$infra = [];
for ( $i = 1; $i <= 4; $i++ ) {
    $infra[] = [
        'image'   => get_field( "infra_{$i}_image" )   ?: get_template_directory_uri() . "/img/miejsce/infrastruktura-{$i}.jpg",
        'heading' => get_field( "infra_{$i}_heading" ) ?: $infra_defaults[ $i - 1 ]['heading'],
        'desc'    => get_field( "infra_{$i}_desc" )    ?: $infra_defaults[ $i - 1 ]['desc'],
    ];
}
?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => $hero_title,
    'btn_text' => $hero_btn_text,
    'btn_url'  => $hero_btn_url,
    'image'        => get_the_post_thumbnail_url( null, 'full' ) ?: get_template_directory_uri() . '/img/miejsce/hero.jpg',
    'image_mobile' => get_field( 'hero_image_mobile' ) ?: '',
] ); ?>

<!-- Więcej niż ośrodek -->
 <section class="py-10 lg:py-36 bg-blue-800 overflow-hidden">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up">QORTY</span>
        <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo esc_html( $wiecej_heading ); ?></h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-8">
            <div class="wysiwyg text-white/80" data-aos="fade-up"><?php echo wp_kses_post( $wiecej_text_1 ); ?></div>
            <div class="wysiwyg text-white/80" data-aos="fade-up"><?php echo wp_kses_post( $wiecej_text_2 ); ?></div>
        </div>

        <!-- slider -->
        <div class="glide infrastruktura-slider mt-12 lg:mt-30">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ( $qorty_slides as $slide_url ) : ?>
                    <li class="glide__slide bg-blue-900 rounded-2xl">
                        <img src="<?php echo esc_url( $slide_url ); ?>"
                             alt=""
                             loading="eager"
                             decoding="async"
                             data-no-lazy="1"
                             class="w-full h-72 md:h-175 object-cover rounded-2xl block" />
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
 </section>

<!-- Bloki -->
<section class="py-10 lg:py-36">
    <div class="container-content">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ( $bloki as $blok ) : ?>
            <div class="border border-white/15 rounded-2xl p-12 flex flex-col gap-4 lg:gap-8 items-center justify-center lg:min-h-64.5 text-center" data-aos="fade-up">
                <p class="font-gabarito text-[2rem]/[1] lg:text-[3.5rem]/[1] tracking-[-0.175rem] text-orange-500"><?php echo esc_html( $blok['value'] ); ?></p>
                <p class="text-white/80"><?php echo esc_html( $blok['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- qorty etapy -->
<section id="etapy" class="section-bg-gradient py-14 lg:py-36">
    <div class="container-content">

        <span class="bullet-title" data-aos="fade-up">QORTY</span>
        <h2 class="mb-12 lg:mb-20"><?php echo esc_html( $qorty_heading ); ?></h2>

        <!-- oś czasu -->
        <div class="overflow-x-auto no-scrollbar drag-scroll cursor-grab active:cursor-grabbing select-none -mx-4 px-4 lg:mx-0 lg:px-0 etapy-timeline">
            <div class="relative min-w-160">

                <!-- linia bazowa -->
                <div class="absolute top-3 left-0 right-0 h-px bg-white/10"></div>
                <!-- postęp: wypełnia się do aktualnego etapu przy wejściu w viewport -->
                <div class="etapy-progress absolute top-3 left-0 w-0 h-px bg-orange-500 transition-[width] duration-1000 ease-out" data-progress="<?php echo esc_attr( $stages_progress_percent ); ?>"></div>

                <div class="grid grid-cols-5">
                    <?php foreach ( $stages as $stage ) : ?>
                    <div>
                        <?php if ( $stage['active'] ) : ?>
                        <div class="relative z-10 size-6 rounded-full bg-orange-500"></div>
                        <div class="mt-3 flex flex-col gap-2.25">
                            <p class="font-gabarito font-medium text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-orange-500/80"><?php echo esc_html( $stage['label'] ); ?></p>
                            <?php if ( $stage['desc'] ) : ?>
                            <p class="text-[0.875rem]/[1.3] lg:text-[1.1875rem]/[1.5] tracking-[-0.02375rem] text-white/80 pr-8"><?php echo esc_html( $stage['desc'] ); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php else : ?>
                        <div class="relative z-10 size-4 mt-1 rounded-full bg-white"></div>
                        <div class="mt-3.5">
                            <p class="font-gabarito font-medium text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80"><?php echo esc_html( $stage['label'] ); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Infrastruktura -->
<section class="py-10 lg:py-36 bg-blue-800">
    <div class="container-content">
        <span class="bullet-title">QORTY</span>
        <h2 class="mb-4 lg:mb-8"><?php echo wp_kses_post( $infra_heading ); ?></h2>

        <div class="flex flex-col gap-8 lg:gap-18 mt-8 lg:mt-16">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-4 lg:mb-0">
                <img src="<?php echo esc_url( $infra[0]['image'] ); ?>"
                     alt="<?php echo esc_attr( $infra[0]['heading'] ); ?>"
                     class="w-full h-72 lg:h-120 object-cover rounded-2xl" />
                <div class="flex flex-col gap-4 lg:gap-8 lg:pl-18">
                    <h3 class="font-gabarito font-normal text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[0]['heading'] ); ?></h3>
                    <p class="text-white/50 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[0]['desc'] ); ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-4 lg:mb-0">
                <img src="<?php echo esc_url( $infra[1]['image'] ); ?>"
                     alt="<?php echo esc_attr( $infra[1]['heading'] ); ?>"
                     class="w-full h-72 lg:h-120 object-cover rounded-2xl lg:order-last" />
                <div class="flex flex-col gap-4 lg:gap-8 lg:pl-18">
                    <h3 class="font-gabarito font-normal text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[1]['heading'] ); ?></h3>
                    <p class="text-white/50 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[1]['desc'] ); ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-4 lg:mb-0">
                <img src="<?php echo esc_url( $infra[2]['image'] ); ?>"
                     alt="<?php echo esc_attr( $infra[2]['heading'] ); ?>"
                     class="w-full h-72 lg:h-120 object-cover rounded-2xl" />
                <div class="flex flex-col gap-4 lg:gap-8 lg:pl-18">
                    <h3 class="font-gabarito font-medium text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[2]['heading'] ); ?></h3>
                    <p class="text-white/50 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[2]['desc'] ); ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <img src="<?php echo esc_url( $infra[3]['image'] ); ?>"
                     alt="<?php echo esc_attr( $infra[3]['heading'] ); ?>"
                     class="w-full h-72 lg:h-120 object-cover rounded-2xl lg:order-last" />
                <div class="flex flex-col gap-4 lg:gap-8 lg:pl-18">
                    <h3 class="font-gabarito font-medium text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[3]['heading'] ); ?></h3>
                    <p class="text-white/50 max-w-127 pr-8" data-aos="fade-up"><?php echo esc_html( $infra[3]['desc'] ); ?></p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
