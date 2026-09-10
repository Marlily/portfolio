<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package raypathsklep
 */

?>

<!-- newsletter -->
<?php get_template_part('template-parts/layout/newsletter'); ?>

<?php
$footer_email      = get_field( 'footer_email', 'option' );
$footer_phone      = get_field( 'footer_phone', 'option' );
$footer_facebook   = get_field( 'footer_facebook_url', 'option' );
$footer_instagram  = get_field( 'footer_instagram_url', 'option' );
$footer_columns    = get_field( 'footer_columns', 'option' );
$footer_copy       = get_field( 'footer_copy_text', 'option' );

$tel_href = $footer_phone ? 'tel:' . preg_replace( '/[^0-9+]/', '', $footer_phone ) : '';
?>

<footer id="footer" class="pt-16">
    <div class="container-content">
        <div class="flex flex-wrap lg:flex-nowrap justify-start items-start gap-8 lg:gap-16 mb-6">
            <div class="w-full lg:flex-1 flex flex-col justify-start items-center gap-8">
                <div class="lg:w-32">
                    <img src="<?php echo get_template_directory_uri() ?>/img/logo-small.svg" alt="Raypath">
                </div>
                <div class="">
                    <?php if ( $footer_email ) : ?>
                        <a class="block text-base/[180%] text-typo font-semibold" href="<?php echo esc_url( 'mailto:' . $footer_email ); ?>"><?php echo esc_html( $footer_email ); ?></a>
                    <?php endif; ?>
                    <?php if ( $footer_phone ) : ?>
                        <a class="block text-base/[180%] text-typo font-semibold" href="<?php echo esc_url( $tel_href ); ?>"><?php echo esc_html( $footer_phone ); ?></a>
                    <?php endif; ?>
                </div>
                <div class="size- inline-flex justify-start items-center gap-2">
                    <?php if ( $footer_facebook ) : ?>
                        <a href="<?php echo esc_url( $footer_facebook ); ?>" class="size-14 bg-accent rounded-full flex justify-center items-center" target="_blank" rel="noreferrer noopener">
                            <div class="size-6 flex justify-center lg:justify-start items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM12.75 20.2153V14.25H15C15.1989 14.25 15.3897 14.171 15.5303 14.0303C15.671 13.8897 15.75 13.6989 15.75 13.5C15.75 13.3011 15.671 13.1103 15.5303 12.9697C15.3897 12.829 15.1989 12.75 15 12.75H12.75V10.5C12.75 10.1022 12.908 9.72064 13.1893 9.43934C13.4706 9.15804 13.8522 9 14.25 9H15.75C15.9489 9 16.1397 8.92098 16.2803 8.78033C16.421 8.63968 16.5 8.44891 16.5 8.25C16.5 8.05109 16.421 7.86032 16.2803 7.71967C16.1397 7.57902 15.9489 7.5 15.75 7.5H14.25C13.4544 7.5 12.6913 7.81607 12.1287 8.37868C11.5661 8.94129 11.25 9.70435 11.25 10.5V12.75H9C8.80109 12.75 8.61033 12.829 8.46967 12.9697C8.32902 13.1103 8.25 13.3011 8.25 13.5C8.25 13.6989 8.32902 13.8897 8.46967 14.0303C8.61033 14.171 8.80109 14.25 9 14.25H11.25V20.2153C9.13575 20.0223 7.17728 19.0217 5.78198 17.4215C4.38667 15.8214 3.66195 13.7449 3.75855 11.6241C3.85515 9.50324 4.76564 7.50127 6.30064 6.0346C7.83563 4.56793 9.87696 3.74947 12 3.74947C14.1231 3.74947 16.1644 4.56793 17.6994 6.0346C19.2344 7.50127 20.1449 9.50324 20.2415 11.6241C20.3381 13.7449 19.6133 15.8214 18.218 17.4215C16.8227 19.0217 14.8643 20.0223 12.75 20.2153Z" fill="white"/>
                                </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if ( $footer_instagram ) : ?>
                        <a href="<?php echo esc_url( $footer_instagram ); ?>" class="size-14 bg-accent rounded-full flex justify-center items-center" target="_blank" rel="noreferrer noopener">
                            <div class="size-6 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M9.75 5.25C8.85998 5.25 7.98995 5.51392 7.24993 6.00839C6.50991 6.50285 5.93314 7.20566 5.59254 8.02792C5.25195 8.85019 5.16283 9.75499 5.33647 10.6279C5.5101 11.5008 5.93868 12.3026 6.56802 12.932C7.19736 13.5613 7.99918 13.9899 8.87209 14.1635C9.74501 14.3372 10.6498 14.2481 11.4721 13.9075C12.2943 13.5669 12.9971 12.9901 13.4916 12.2501C13.9861 11.51 14.25 10.64 14.25 9.75C14.2488 8.55691 13.7743 7.41303 12.9306 6.56939C12.087 5.72575 10.9431 5.25124 9.75 5.25ZM9.75 12.75C9.15666 12.75 8.57664 12.5741 8.08329 12.2444C7.58994 11.9148 7.20542 11.4462 6.97836 10.8981C6.7513 10.3499 6.69189 9.74667 6.80764 9.16473C6.9234 8.58279 7.20912 8.04824 7.62868 7.62868C8.04824 7.20912 8.58279 6.9234 9.16473 6.80764C9.74667 6.69189 10.3499 6.7513 10.8981 6.97836C11.4462 7.20542 11.9148 7.58994 12.2444 8.08329C12.5741 8.57664 12.75 9.15666 12.75 9.75C12.75 10.5456 12.4339 11.3087 11.8713 11.8713C11.3087 12.4339 10.5456 12.75 9.75 12.75ZM14.25 0H5.25C3.85807 0.00148896 2.52358 0.555091 1.53933 1.53933C0.555091 2.52358 0.00148896 3.85807 0 5.25V14.25C0.00148896 15.6419 0.555091 16.9764 1.53933 17.9607C2.52358 18.9449 3.85807 19.4985 5.25 19.5H14.25C15.6419 19.4985 16.9764 18.9449 17.9607 17.9607C18.9449 16.9764 19.4985 15.6419 19.5 14.25V5.25C19.4985 3.85807 18.9449 2.52358 17.9607 1.53933C16.9764 0.555091 15.6419 0.00148896 14.25 0ZM18 14.25C18 15.2446 17.6049 16.1984 16.9016 16.9016C16.1984 17.6049 15.2446 18 14.25 18H5.25C4.25544 18 3.30161 17.6049 2.59835 16.9016C1.89509 16.1984 1.5 15.2446 1.5 14.25V5.25C1.5 4.25544 1.89509 3.30161 2.59835 2.59835C3.30161 1.89509 4.25544 1.5 5.25 1.5H14.25C15.2446 1.5 16.1984 1.89509 16.9016 2.59835C17.6049 3.30161 18 4.25544 18 5.25V14.25ZM15.75 4.875C15.75 5.0975 15.684 5.31501 15.5604 5.50002C15.4368 5.68502 15.2611 5.82922 15.0555 5.91436C14.85 5.99951 14.6238 6.02179 14.4055 5.97838C14.1873 5.93498 13.9868 5.82783 13.8295 5.6705C13.6722 5.51316 13.565 5.31271 13.5216 5.09448C13.4782 4.87625 13.5005 4.65005 13.5856 4.44448C13.6708 4.23891 13.815 4.06321 14 3.9396C14.185 3.81598 14.4025 3.75 14.625 3.75C14.9234 3.75 15.2095 3.86853 15.4205 4.0795C15.6315 4.29048 15.75 4.57663 15.75 4.875Z" fill="white"/>
                                </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ( $footer_columns ) : ?>
                <?php foreach ( $footer_columns as $column ) : ?>
                    <div class="w-full text-center lg:text-start lg:w-auto lg:flex-1 inline-flex flex-col justify-start items-start gap-6">
                        <?php if ( ! empty( $column['heading'] ) ) : ?>
                            <h3 class="self-stretch justify-start text-xl font-semibold"><?php echo esc_html( $column['heading'] ); ?></h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $column['links'] ) ) : ?>
                            <ul class="self-stretch flex flex-col justify-start items-center lg:items-start gap-2 lg:gap-4">
                                <?php foreach ( $column['links'] as $link ) : ?>
                                    <?php if ( empty( $link['url'] ) || empty( $link['label'] ) ) : ?>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <li class="size- inline-flex justify-start items-center gap-2">
                                        <a href="<?php echo esc_url( $link['url'] ); ?>" class="justify-start text-base font-medium text-typo transition hover:text-accent-dark">
                                            <?php echo esc_html( $link['label'] ); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="flex justify-center items-end mb-12">
            <p class="text-typo text-[0.875rem]/[140%]  font-medium"><?php echo esc_html( $footer_copy ?: '© 2025 sklep-raypath.pl' ); ?></p>
        </div>
    </div>
	
</footer><!-- #colophon -->
