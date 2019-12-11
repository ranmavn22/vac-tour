<?php
if (!defined('ABSPATH')) {
    die();
}

if(!function_exists("metaboxTourInfor")):
    function metaboxTourInfor(){
        add_meta_box("attachment","URL attachment","metaboxTourInforCallback","tour",'side');
    }
endif;
add_action("add_meta_boxes","metaboxTourInfor");

if(!function_exists("metaboxTourInforCallback")){
    function metaboxTourInforCallback($post){
        $value = get_post_meta($post->ID,'infor_tour',true);
        ?>
        <p><span>Thông tin tour (URL):</span> <input type="text" name="infor_tour" value="<?php echo !empty($value) ?  $value : ''?>"></p>
        <?php
    }
}

if(!function_exists("save_meta_fields_tour")):
    function save_meta_fields_tour($post_id,$post){
        if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'tour') return;
        $value = $_POST["infor_tour"];
        update_post_meta($post_id,"infor_tour",$value);
    }
endif;
add_action('save_post', 'save_meta_fields_tour', 10, 2);
