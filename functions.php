<?php
include_once __DIR__. '/posttype/temoignages.php';
include_once __DIR__. '/metabox/temoignages/metabox_field_infor.php';
include_once __DIR__. '/metabox/tour/urlAttachment.php';

function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

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

if (!function_exists('attachmentUrlCallback')):
    function attachmentUrlCallback()
    {
        global $post;
        $value = get_post_meta($post->ID,'infor_tour',true);
        return $value;
    }
    add_shortcode('attachment_url', 'attachmentUrlCallback');
endif;

add_action( 'wpcf7_before_send_mail', 'my_dynamic_attachments' );
function my_dynamic_attachments($cf7)
{
    if ($cf7->id == 7981)
    {
        $submission = WPCF7_Submission::get_instance();
        $uploads = wp_upload_dir();
        $submission->add_uploaded_file('jpg', 'D:\xampp\htdocs\wordpress/wp-content/uploads/2019/12/asia2.jpg');
    }
}

add_filter('wpcf7_mail_components', function($components, $form) {
    if ($form->id == 7981)
    {
        $uploads = wp_upload_dir();
        $filename = 'D:\xampp\htdocs\wordpress/wp-content/uploads/2019/12/asia2.jpg';
        $components['attachments'] = array($filename);
    }
    return $components;
}, 10, 2);
/*echo "<pre>";
print_r($uploads = wp_upload_dir());
echo "</pre>";
die();*/