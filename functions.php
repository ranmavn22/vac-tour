<?php
include_once __DIR__. '/posttype/temoignages.php';
include_once __DIR__. '/metabox/temoignages/metabox_field_infor.php';
include_once __DIR__. '/metabox/tour/urlAttachment.php';

// Register shortcode
if (!function_exists('temoignagesCallback')):
    function temoignagesCallback()
    {
        $html = '';
        include __DIR__.'/shortcode/temoignages.php';
        return $html;
    }
    add_shortcode('temoignages', 'temoignagesCallback');
endif;