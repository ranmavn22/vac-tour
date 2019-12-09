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
                <?php the_content() ?>

            </div>
        </div>
    </div>

<?php
get_footer();
