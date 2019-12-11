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
            <div class="contentPage">
                <?php $infor = get_post_meta(get_the_ID(),'wz_infor_temoignages', true); ?>
                <?php
                    if($infor['name'])
                        echo '<h2>'.$infor['name'].'</h2>';

                echo '<div class="inforCustomer">';
                if($infor['date'])
                    echo '<span><i class="fa fa-calendar" aria-hidden="true"></i>'.$infor['date'].'</span>';
                if($infor['country'])
                    echo '<span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$infor['country'].'</span>';
                echo '</div>';
                if($infor['tour'])
                    echo '<p class="tour"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Son itinéraire en bref: <br><span>'.$infor['tour'].'</span></p>';
                ?>

                <?php the_content() ?>

            </div>
        </div>
    </div>

<?php
get_footer();
