<?php
/*
 * Template Name: Opieka zdrowotna
 */
?>

<?php get_header(); ?>

<?php
$hero_title      = get_field( 'hero_title' )      ?: 'Najpierw zdrowie.<br><b>Potem wynik</b>.';
$hero_btn_text   = get_field( 'hero_btn_text' )   ?: 'Dowiedz się więcej';
$hero_btn_url    = get_field( 'hero_btn_url' )    ?: '#';
$section_label   = get_field( 'section_label' )   ?: 'Opieka zdrowotna';
$section_heading = get_field( 'section_heading' ) ?: 'Zdrowie jako element<br>treningu';

$opieka = [];
for ( $i = 1; $i <= 5; $i++ ) {
    $heading = get_field( "opieka_{$i}_heading" );
    if ( ! $heading ) continue;
    $opieka[] = [
        'image'   => get_field( "opieka_{$i}_image" ) ?: '',
        'heading' => $heading,
        'desc'    => get_field( "opieka_{$i}_desc" )  ?: '',
    ];
}
?>

<!-- hero -->
<?php get_template_part( 'template-parts/hero', null, [
    'title'    => $hero_title,
    'btn_text' => $hero_btn_text,
    'btn_url'  => $hero_btn_url,
    'image'        => get_the_post_thumbnail_url( null, 'full' ) ?: get_template_directory_uri() . '/img/opieka/hero.jpg',
    'image_mobile' => get_field( 'hero_image_mobile' ) ?: '',
] ); ?>

<!-- Opieka zdrowotna -->
<section id="opieka" class="py-10 lg:py-36">
    <div class="container-content">
        <span class="bullet-title" data-aos="fade-up"><?php echo esc_html( $section_label ); ?></span>
        <h2 class="mb-4 lg:mb-8" data-aos="fade-up"><?php echo wp_kses_post( $section_heading ); ?></h2>

        <div class="flex flex-col gap-8 lg:gap-18 mt-8 lg:mt-16">
            <?php foreach ( $opieka as $idx => $item ) :
                $reverse = ( $idx % 2 !== 0 ) ? 'lg:order-last' : '';
            ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center <?php echo ( $idx < 4 ) ? 'mb-4 lg:mb-0' : ''; ?>">
                <img src="<?php echo esc_url( $item['image'] ); ?>"
                     alt="<?php echo esc_attr( $item['heading'] ); ?>"
                     class="w-full h-72 lg:h-120 object-cover rounded-2xl <?php echo $reverse; ?>" />
                <div class="flex flex-col gap-4 lg:gap-8 lg:pl-18" data-aos="fade-up">
                    <h3 class="font-gabarito font-medium text-[1.5rem]/[1] lg:text-[2rem]/[1] tracking-[-0.04rem] text-white/80 max-w-127 pr-8"><?php echo esc_html( $item['heading'] ); ?></h3>
                    <div class="wysiwyg text-white/50 max-w-127 pr-8"><?php echo wp_kses_post( $item['desc'] ); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
