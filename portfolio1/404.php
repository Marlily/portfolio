<?php get_header(); ?>

<section class="min-h-screen flex items-center justify-center py-36">
    <div class="container-content text-center flex flex-col items-center gap-6">
        <p class="font-gabarito text-[8rem]/[1] lg:text-[12rem]/[1] tracking-[-0.3rem] text-orange-500 font-medium">404</p>
        <h1 class="text-2xl lg:text-4xl tracking-normal">Strona nie istnieje</h1>
        <p class="text-white/60 max-w-md">Strona, której szukasz, nie została znaleziona lub została przeniesiona pod inny adres.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn mt-4">
            Wróć do strony głównej
            <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.33333 3.99386C9.33009 3.64313 9.18877 3.30779 8.94 3.06053L6.08 0.193862C5.95509 0.0696947 5.78612 0 5.61 0C5.43388 0 5.26491 0.0696947 5.14 0.193862C5.07751 0.255837 5.02792 0.329571 4.99407 0.410811C4.96023 0.49205 4.9428 0.579187 4.9428 0.667195C4.9428 0.755203 4.96023 0.84234 4.99407 0.92358C5.02792 1.00482 5.07751 1.07855 5.14 1.14053L7.33333 3.3272H0.666667C0.489856 3.3272 0.320287 3.39743 0.195262 3.52246C0.070238 3.64748 0 3.81705 0 3.99386C0 4.17067 0.070238 4.34024 0.195262 4.46527C0.320287 4.59029 0.489856 4.66053 0.666667 4.66053H7.33333L5.14 6.85386C5.01446 6.97851 4.94359 7.14793 4.94296 7.32484C4.94234 7.50175 5.01201 7.67166 5.13667 7.7972C5.26132 7.92273 5.43073 7.99361 5.60764 7.99423C5.78455 7.99486 5.95446 7.92518 6.08 7.80053L8.94 4.93386C9.19039 4.68496 9.33185 4.34691 9.33333 3.99386Z" fill="white"/>
            </svg>
        </a>
    </div>
</section>

<?php get_footer(); ?>
