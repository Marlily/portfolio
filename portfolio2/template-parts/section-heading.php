<?php
extract($args);
$break_after_bold = $break_after_bold ?? false;
?>

<div class="flex flex-col items-center gap-4 text-center lg:mx-auto lg:max-w-[46.5rem] lg:gap-8">
    <p class="reveal text-[1.875rem]/[1.2] tracking-[-0.05625rem] text-blue-500 lg:text-[2.375rem]/[1.15] lg:tracking-[-0.07125rem]">
        <span class="font-bold"><?php echo esc_html($heading_bold); ?></span><?php echo $break_after_bold ? '<br>' : ' '; ?><span class="font-normal lg:font-medium"><?php echo esc_html($heading_regular); ?></span>
    </p>
    <p class="reveal delay-150 text-base/[1.5] font-medium tracking-[-0.01rem] text-blue-gray-300 lg:text-lg/[1.5] lg:tracking-[-0.01125rem]">
        <?php echo esc_html($description); ?>
    </p>
</div>
