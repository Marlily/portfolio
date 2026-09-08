<?php get_header(); ?>

<?php
$notfound_heading_regular         = get_field('notfound_heading_regular') ?: pll__('Nie znaleźliśmy');
$notfound_heading_bold            = get_field('notfound_heading_bold') ?: pll__('szukanej strony');
$notfound_description             = get_field('notfound_description') ?: pll__('Strona, której szukasz, mogła zostać przeniesiona lub usunięta. Wróć na stronę główną albo skontaktuj się z nami, a chętnie pomożemy.');
$notfound_button_text             = get_field('notfound_button_text') ?: pll__('Wróć na stronę główną');
$notfound_button_secondary_text   = get_field('notfound_button_secondary_text') ?: pll__('Skontaktuj się z nami');
?>

<section class="relative overflow-hidden border-b-[3px] border-orange-500 bg-blue-500">

    <div class="hero-dots absolute inset-0"></div>

    <div class="container-content relative z-10 flex flex-col items-center gap-6 py-20 text-center lg:gap-8 lg:py-32">

        <div class="reveal flex flex-wrap items-center justify-center gap-4 text-xs font-semibold tracking-[0.18rem] text-white uppercase">
            <span class="text-orange-500">404</span>
        </div>

        <p class="reveal delay-100 text-[4rem]/[1] font-bold tracking-[-0.09rem] text-orange-500 lg:text-[6rem]/[1]">
            404
        </p>

        <div class="flex flex-col items-center gap-4 lg:gap-6">
            <p class="reveal delay-150 text-[2rem]/[1.2] font-normal tracking-[-0.06rem] text-white lg:text-[3rem]/[1.2] lg:tracking-[-0.09rem]">
                <?php echo esc_html($notfound_heading_regular); ?> <span class="font-bold"><?php echo esc_html($notfound_heading_bold); ?></span>
            </p>
            <p class="reveal delay-200 max-w-[40rem] text-base/[1.5] font-medium text-white/60 lg:text-lg/[1.5]">
                <?php echo esc_html($notfound_description); ?>
            </p>
        </div>

        <div class="reveal delay-300 flex w-full flex-col items-stretch gap-2 sm:w-auto sm:flex-row sm:items-center sm:gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                <?php echo esc_html($notfound_button_text); ?>
                <?php echo importio_get_icon('arrow-right', 'size-4 shrink-0'); ?>
            </a>
            <a href="<?php echo esc_url(importio_translated_page_url('kontakt')); ?>" class="btn btn-secondary-light">
                <?php echo esc_html($notfound_button_secondary_text); ?>
            </a>
        </div>

    </div>

</section>

<?php get_template_part('template-parts/cta'); ?>

<?php get_footer(); ?>
