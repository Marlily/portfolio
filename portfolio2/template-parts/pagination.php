<?php
$args       = $args ?? [];
$aria_label = $args['aria_label'] ?? (mb_option('pagination_default_aria_label') ?: pll__('Nawigacja po stronach'));
$prev_text  = mb_option('pagination_prev_text') ?: pll__('Poprzednia');
$next_text  = mb_option('pagination_next_text') ?: pll__('Następna');

$page_links = paginate_links([
    'prev_text' => importio_get_icon('arrow-right', 'size-4 rotate-180') . esc_html($prev_text),
    'next_text' => esc_html($next_text) . importio_get_icon('arrow-right', 'size-4'),
    'type'      => 'array',
]);

if ($page_links) :
    $prev    = null;
    $next    = null;
    $numbers = [];

    foreach ($page_links as $link) {
        if (str_contains($link, 'prev')) {
            $prev = $link;
        } elseif (str_contains($link, 'next')) {
            $next = $link;
        } else {
            $numbers[] = $link;
        }
    }
    ?>
    <nav class="knowledge-pagination" aria-label="<?php echo esc_attr($aria_label); ?>">
        <?php echo $prev ?: '<span></span>'; ?>
        <div class="flex items-center gap-2">
            <?php echo implode('', $numbers); ?>
        </div>
        <?php echo $next ?: '<span></span>'; ?>
    </nav>
<?php endif; ?>
