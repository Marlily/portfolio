<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $_logo_url = qorttheme_logo_url();
    if ( $_logo_url ) :
    ?>
    <link rel="preload" as="image" href="<?php echo esc_url( $_logo_url ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-blue-950'); ?>>

<?php get_template_part('template-parts/nav'); ?>

<?php
$_fp_id      = (int) get_option( 'page_on_front' );
$_main_color = $_fp_id ? get_field( 'site_primary_color', $_fp_id ) : '';
if ( $_main_color ) :
?>
    <style>:root{--color-orange-500:<?php echo esc_attr( $_main_color ); ?>}</style>
<?php endif; ?>