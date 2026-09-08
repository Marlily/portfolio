<?php
$heading_bold    = get_field('map_heading_bold') ?: pll__('Dostarczamy produkty regularnie');
$heading_regular = get_field('map_heading_regular') ?: pll__('do większości krajów europejskich');
$description     = get_field('map_description') ?: pll__('Możesz je znaleźć w sklepach internetowych jak i sieciach handlowych');
$image           = get_field('map_image');
$image_url       = $image['url'] ?? get_template_directory_uri() . '/img/map-world.svg';
?>

<section class="hidden bg-bg lg:block">
    <div class="container-content flex flex-col items-center gap-18 pt-26">

        <?php
        get_template_part('template-parts/section-heading', null, [
            'heading_bold'     => $heading_bold,
            'heading_regular'  => $heading_regular,
            'description'      => $description,
            'break_after_bold' => true,
        ]);
        ?>

        <div class="relative w-full max-w-[45.6rem]">
            <img src="<?php echo esc_url($image_url); ?>" alt="" class="h-auto w-full">
            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-[10.625rem] bg-gradient-to-t from-bg to-transparent"></div>
        </div>

    </div>
</section>
