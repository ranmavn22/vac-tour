<?php
if (!defined('ABSPATH')) {
    die();
}
$loop = new WP_Query(array(
        'post_type' => 'temoignages',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    )
);
$html .= "<div class='listPost'>";
while ($loop->have_posts()) : $loop->the_post();
    $html .= '<div class="item">';
    $html .= get_the_title();
    $html .= "</div>";

endwhile;
$html .= "</div>";

$html .= '<div id="wz_pagination">';
$html .= '<div class="content_pagination">';
$big = 999999999; // need an unlikely integer
$html .= paginate_links(array(
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'mid_size' => 1,
    'current' => max(1, get_query_var('paged')),
    'total' => $loop->max_num_pages,
    'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
    'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
));
$html .= '</div>';
$html .= '</div>';




























