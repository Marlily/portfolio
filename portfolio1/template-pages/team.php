<?php
/*
 * Template Name: Kadra
 */
?>

<?php get_header(); ?>

<?php
$hero_title        = get_field( 'hero_title' )        ?: 'Zespół pracujący<br><b>dla jednego celu</b>.';
$hero_btn_text     = get_field( 'hero_btn_text' )     ?: 'Poznaj Nas';
$hero_btn_url      = get_field( 'hero_btn_url' )      ?: '#';
$podejscie_heading = get_field( 'podejscie_heading' ) ?: 'Sport to gra zespołowa –<br>nawet w tenisie.';
$podejscie_text_1  = get_field( 'podejscie_text_1' )  ?: "Choć tenis jest dyscypliną indywidualną, za sukcesem zawodnika stoi zespół ludzi odpowiedzialnych za każdy aspekt jego rozwoju.\n\nW QORT nie funkcjonujemy w modelu niezależnych specjalistów pracujących obok siebie. Tworzymy środowisko, w którym wszystkie decyzje treningowe, zdrowotne i rozwojowe są częścią wspólnego procesu.";
$podejscie_text_2  = get_field( 'podejscie_text_2' )  ?: 'Dzięki temu zawodnik otrzymuje spójne wsparcie na każdym etapie swojej kariery.';
$kadra_heading     = get_field( 'kadra_heading' )     ?: 'Za każdym zawodnikiem stoi zespół';
?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => $hero_title,
    'btn_text' => $hero_btn_text,
    'btn_url'  => $hero_btn_url,
    'image'        => get_the_post_thumbnail_url( null, 'full' ) ?: get_template_directory_uri() . '/img/miejsce/hero.jpg',
    'image_mobile' => get_field( 'hero_image_mobile' ) ?: '',
] ); ?>


<!-- Podejście -->
 <section id="podejscie" class="py-10 lg:py-36 ">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up">Podejście</span>
        <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo wp_kses_post( $podejscie_heading ); ?></h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-8">
            <p class="text-white/80" data-aos="fade-up"><?php echo nl2br( esc_html( $podejscie_text_1 ) ); ?></p>
            <p class="text-white/80" data-aos="fade-up"><?php echo esc_html( $podejscie_text_2 ); ?></p>
        </div>
    </div>
 </section>


<!-- Team -->
<?php
$team_panels = array_values( array_filter( qorttheme_get_kadra_panels(), fn( $p ) => ! empty( $p['people'] ) ) );
?>
 <section class="py-10 lg:py-36 bg-blue-800" data-kadra-mode="scroll">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up">Kadra</span>
        <h2 class="mb-10 lg:mb-18" data-aos="fade-up"><?php echo esc_html( $kadra_heading ); ?></h2>
    </div>

    <!-- Zakładki – sticky pod menu -->
    <div class="sticky top-18 lg:top-24 bg-blue-800/50 mb-12 overflow-hidden z-10" data-kadra-tabs>
        <div class="container-content">
            <div class="flex items-end gap-2 lg:gap-8 border-b border-white/10 overflow-x-auto overflow-y-hidden no-scrollbar">
                <?php foreach ( $team_panels as $pi => $panel ) : ?>
                <button type="button"
                        data-target="kadra-<?php echo esc_attr( $panel['slug'] ); ?>"
                        class="kadra-tab-btn shrink-0 h-12 px-2 -mb-px border-b-2 font-inter font-semibold text-[1.0625rem]/[1.5] tracking-[-0.02125rem] whitespace-nowrap transition-colors <?php echo $pi === 0 ? 'text-orange-500 border-orange-500' : 'text-white border-transparent'; ?>">
                    <?php echo esc_html( $panel['label'] ); ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Jeden ciągły grid – anchor na pierwszej karcie każdej grupy -->
    <div class="container-content">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php foreach ( $team_panels as $panel ) :
                foreach ( $panel['people'] as $idx => $person ) :
                    $is_first = ( $idx === 0 );
            ?>
            <div <?php if ( $is_first ) echo 'id="kadra-' . esc_attr( $panel['slug'] ) . '" '; ?>class="<?php echo $is_first ? 'kadra-tab-panel ' : ''; ?>border border-white/10 rounded-2xl overflow-hidden flex flex-col md:flex-row">
                <div class="relative h-120 md:min-h-100 md:flex-1 min-w-0">
                    <img src="<?php echo esc_url( $person['img'] ); ?>"
                         alt="<?php echo esc_attr( $person['name'] ); ?>"
                         class="absolute inset-0 w-full h-full object-cover object-center" />
                    <div class="absolute inset-0"
                         style="background: linear-gradient(161deg, rgba(191,110,46,0) 65%, rgba(191,110,46,1) 144%)"></div>
                </div>
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
            <?php
                endforeach;
            endforeach;
            ?>
        </div>
    </div>
 </section>


<?php get_footer(); ?>
