<?php

add_filter( 'acf/settings/show_admin', '__return_false' );

require get_template_directory() . '/inc/acf-kadra.php';
require get_template_directory() . '/inc/acf-homepage.php';
require get_template_directory() . '/inc/acf-camp.php';
require get_template_directory() . '/inc/acf-healthcare.php';
require get_template_directory() . '/inc/acf-place.php';
require get_template_directory() . '/inc/acf-team.php';
require get_template_directory() . '/inc/acf-vision.php';
require get_template_directory() . '/inc/acf-footer.php';