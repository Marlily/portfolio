<?php
$title = $args['title'] ?? '';
$img   = $args['img'] ?? '';
$headingColor = $args['headingColor'] ?? '';
?>

<section class="pt-[4.63rem] pb-[4.56rem] bg-position-[50%] bg-no-repeat bg-cover" style="background-image: url('<?php echo esc_url($img); ?>'">
    <div class="container-content">
        <h1 class="<?php echo $headingColor ?>"><?php echo esc_html($title); ?></h1>
    </div>
</section>