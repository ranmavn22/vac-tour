<?php
if (!defined('ABSPATH')) {
    die();
}

if(!function_exists("metabox_fields_infor")):
    function metabox_fields_infor(){
        add_meta_box("infor_temoignages","Thông tin khách hàng","metabox_fields_temoignages_callback","temoignages");
    }
endif;
add_action("add_meta_boxes","metabox_fields_infor");

if(!function_exists("metabox_fields_temoignages_callback")){
    function metabox_fields_temoignages_callback($post){
    $value = get_post_meta($post->ID,'wz_infor_temoignages',true);
        ?>
        <p><span>Tên:</span> <input type="text" name="infor_temoignages[name]" value="<?php echo !empty($value) ? $value['name'] : ''?>"></p>
        <p><span>Email:</span> <input type="text" name="infor_temoignages[email]" value="<?php echo !empty($value) ? $value['email'] : ''?>"></p>
        <p><span>Đất Nước:</span> <input type="text" name="infor_temoignages[country]" value="<?php echo !empty($value) ?  $value['country'] : ''?>"></p>
		<p><span>Ngày đi:</span> <input type="text" name="infor_temoignages[date]" value="<?php echo !empty($value) ?  $value['date'] : ''?>"></p>
		<p><span>Chuyến đi:</span> <input type="text" name="infor_temoignages[tour]" value="<?php echo !empty($value) ?  $value['tour'] : ''?>"></p>
        <?php
    }
}

if(!function_exists("save_meta_fields_temoignages")):
    function save_meta_fields_temoignages($post_id,$post){
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'temoignages') return;
        $value = $_POST["infor_temoignages"];
        update_post_meta($post_id,"wz_infor_temoignages",$value);
    }
endif;
add_action('save_post', 'save_meta_fields_temoignages', 10, 2);
