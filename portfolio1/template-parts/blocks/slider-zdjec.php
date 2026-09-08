<?php
// Variables injected by qorttheme_render_slider_zdjec(): $images (array), $block_id (string)
if ( empty( $images ) ) {
    return;
}
?>
<div class="foto-slider 2xl:-mx-[calc((100vw-104rem)/2)] 3xl:-mx-36 my-8">
    <div class="glide" id="<?php echo esc_attr( $block_id ); ?>">

        <div class="glide__track overflow-hidden" data-glide-el="track">
            <ul class="glide__slides">
                <?php foreach ( $images as $img ) : ?>
                <li class="glide__slide rounded-2xl overflow-hidden">
                    <img src="<?php echo esc_url( $img['url'] ); ?>"
                         alt="<?php echo esc_attr( $img['alt'] ); ?>"
                         class="w-full h-64 md:h-120 xl:h-180 object-cover">
                </li>
                <?php endforeach; ?>
            </ul>
        </div>


</div>
</div>
