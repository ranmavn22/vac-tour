<?php
include_once __DIR__. '/posttype/temoignages.php';
include_once __DIR__. '/metabox/temoignages/metabox_field_infor.php';
include_once __DIR__. '/metabox/tour/urlAttachment.php';

function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'app_style', get_stylesheet_directory_uri() . '/assets/css/style.css');
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

if (!function_exists('enquiryFormCallback')):
    function enquiryFormCallback()
    {
        return tourmaster_get_enquiry_form();
    }
    add_shortcode('enquiry_form', 'enquiryFormCallback');
endif;

if (!function_exists('attachmentDownLoadFormCallback')):
    function attachmentDownLoadFormCallback()
    {
        global $post;
        $value = get_post_meta($post->ID,'infor_tour',true);
        $html = '';
        if($value){
            $html .= "<div class='btnOpenContact'>";
            $html .= '<a class="openContact" href="#" title="Télécharger le circuit">Télécharger le circuit</a>';
            $html .= '</div>';
            $html .= '<input type="hidden" class="tourAttachment" value="'.$value.'">';
            $html .= "<div class='formModal'>";
            $html .= "<div class='diaLog'>";
            $html .= '<div class="headerModal"><p>Programme complet à télécharger</p><h3>'.$post->post_title.'</h3><i class="fa fa-times" aria-hidden="true"></i></div>';
            $html .= '<div class="contentModal"><p>Pour recevoir maintenant ce programme au format PDF, veuillez saisir votre email adresse :';
            $html .= do_shortcode('[contact-form-7 id="7981" title="Contact form footer"]');
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        return $html;
    }
    add_shortcode('attachment_downLoad', 'attachmentDownLoadFormCallback');
endif;

