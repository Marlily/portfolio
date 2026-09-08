<?php
$categories      = get_categories(['hide_empty' => false]);
$current_cat_id  = is_category() ? get_queried_object_id() : 0;
$all_url         = get_permalink(get_option('page_for_posts'));

$badge_class = 'flex h-8 shrink-0 items-center justify-center rounded-full border border-blue-500/10 px-[0.8125rem] py-1.5 text-xs font-semibold uppercase whitespace-nowrap transition';
?>

<div class="flex flex-wrap gap-2">
    <a href="<?php echo esc_url($all_url); ?>" class="<?php echo $badge_class; ?> <?php echo !$current_cat_id ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-orange-50'; ?>">
        <?php echo esc_html(mb_option('blogarchive_all_label') ?: pll__('Wszystkie')); ?>
    </a>
    <?php foreach ($categories as $cat) : ?>
        <a href="<?php echo esc_url(get_category_link($cat)); ?>" class="<?php echo $badge_class; ?> <?php echo $current_cat_id === $cat->term_id ? 'bg-blue-500 text-white' : 'text-blue-500 hover:bg-orange-50'; ?>">
            <?php echo esc_html($cat->name); ?>
        </a>
    <?php endforeach; ?>
</div>
