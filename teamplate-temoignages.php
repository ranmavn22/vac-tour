<?php
/**
 * Template Name: Đánh giá
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-section gdlr-core-container">
            <div class="contentPage padding-top-90">
                <h1><?php the_title() ?></h1>
                <div class="gdlr-core-divider-item-with-icon-inner gdlr-core-js">
                    <div class="gdlr-core-divider-line gdlr-core-left gdlr-core-skin-divider"
                         style="border-color: rgb(255, 204, 0); border-bottom-width: 2px; width: 522px; margin-top: -1px;"></div>
                    <i class="fa fa-tripadvisor" style="color: #ffcc00 ;font-size: 20px ;"></i>
                    <div class="gdlr-core-divider-line gdlr-core-skin-divider gdlr-core-right"
                         style="border-color: rgb(255, 204, 0); border-bottom-width: 2px; width: 522px; margin-top: -1px;"></div>
                </div>
                <?php the_content() ?>
                <?php
                $loop = new WP_Query(array(
                        'post_type' => 'temoignages',
                        'posts_per_page' => 12,
                        'post_status' => 'publish',
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    )
                );
                echo "<div class='listPost'>";
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div class="item">

                    </div>
                <?php
                endwhile;
                echo "</div>";
                ?>
                <div id="wz_pagination">
                    <div class="content_pagination">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                            'format' => '?paged=%#%',
                            'mid_size' => 1,
                            'current' => max(1, get_query_var('paged')),
                            'total' => $loop->max_num_pages,
                            'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
                            'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
