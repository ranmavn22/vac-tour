<?php
if (!defined('ABSPATH')) {
    die();
}
$loop = new WP_Query(array(
        'post_type' => 'temoignages',
        'posts_per_page' => 9,
        'post_status' => 'publish',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    )
);
$html .= "<div class='listPost'>";
while ($loop->have_posts()) : $loop->the_post();
    $infor = get_post_meta(get_the_ID(),'wz_infor_temoignages', true);
    $html .= '<div class="item">';
    $html .= '<div class="img">';
    $html .= '<a href="'.get_permalink(get_the_ID()).'" title="'.get_the_title().'">';
    $html .= get_the_post_thumbnail(get_the_ID(), 'custom-medium');
    $html .= '</a>';
    $html .= '</div>';
    $html .= '<div class="desc">';
    $html .= '<h3><a href="'.get_permalink(get_the_ID()).'" title="'.get_the_title().'">' .get_the_title(). '</a></h3>';
    if($infor['name'])
    $html .= '<p class="name">'. $infor['name'] .'</p>';
    $html .= '<p>'.wp_trim_words(get_the_excerpt(),'30').'</p>';
    $html .= '<div class="inforCustomer">';
    if($infor['date'])
        $html .= '<span><i class="fa fa-calendar" aria-hidden="true"></i>'.$infor['date'].'</span>';
    if($infor['country'])
        $html .= '<span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$infor['country'].'</span>';
    $html .= '</div>';
    $html .= '</div>';
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




























