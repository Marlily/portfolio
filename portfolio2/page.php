<?php get_header(); ?>

<?php get_template_part('template-parts/hero-page'); ?>


<section>
    <div class="container-content flex justify-center py-12 lg:py-26">
        <div class="wysiwyg w-full">
            <?php echo the_content(); ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>