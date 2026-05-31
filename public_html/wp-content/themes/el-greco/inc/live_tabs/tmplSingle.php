<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Single Product Page Style', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable Tiled layout style', 'elgreco'),'tp_single_tiled','',$data);


            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>


<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Single Product Page', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable pre-selected variation', 'elgreco'),'tp_single_enable_pre_selected_variation','',$data);
            cb_checkbox(__( 'Show social sharing buttons', 'elgreco'),'tp_share','',$data);
            cb_checkbox(__( 'Enable sticky Add to cart button (mobile)', 'elgreco'),'tp_add_btn_sticky','',$data);
            cb_checkbox(__( 'Show recommended products', 'elgreco'),'tp_related','',$data);
            cb_checkbox(__( 'Show Recently viewed products', 'elgreco'),'tp_recently','',$data);
            cb_checkbox(__( 'Show size guide', 'elgreco'),'tp_size_chart','',$data);
            cb_checkbox(__( 'Show Image gallery under the main product image', 'elgreco'),'tp_single_gallery_minis_bottom','',$data);
            cb_checkbox(__( 'Redirect to Checkout when a product is added to cart', 'elgreco'),'tp_direct_to_checkout','', $data,'', __("Your customers will be redirected to Checkout when clicking 'Add to cart' if Side Shopping cart and Shopping cart (page) are disabled.", 'elgreco'));

            cb_select(__( 'Video display order in Gallery', 'elgreco' ),'video_order', $data, $data,'','');
            cb_checkbox(__( 'Add Featured Image to the Product Gallery', 'elgreco' ),'tp_single_feat_img','',$data);
















            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>

<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Product Tabs Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php


            cb_select(__( 'Product tab open by default', 'elgreco' ),'tp_tab_opened2', $data, $data,'','');
            cb_checkbox(__( 'Show Product details tab', 'elgreco' ),'tp_tab_item_details','',$data);
            cb_input(__( 'Product details tab label', 'elgreco' ),'tp_tab_item_details_label','',$data);

            cb_checkbox(__( 'Show ‘Item Specifics’ tab', 'elgreco'),'tp_tab_item_specifics','',$data);
            cb_input(__( '‘Item Specifics’ tab label', 'elgreco' ),'tp_tab_item_specifics_label','',$data);

            cb_checkbox(__( 'Show ‘Shipping & Payment’ tab', 'elgreco'),'tp_tab_shipping','',$data);
            cb_input(__( '‘Shipping & Payment’ tab label', 'elgreco' ),'tp_tab_shipping_label','',$data);

            cb_textarea(__( 'Shipping and Payment description', 'elgreco' ),'tp_single_shipping_payment_content','',$data);

            cb_checkbox(__( 'Show Customer reviews block', 'elgreco' ),'tp_tab_reviews','',$data);
            cb_input(__( 'Customer reviews block label', 'elgreco' ),'tp_tab_reviews_label','',$data);

            cb_checkbox(__( 'Show ‘Write a review’ option', 'elgreco'),'tp_enable_leave_review_box','',$data);

            cb_checkbox(__( 'Show Terms & Conditions checkbox', 'elgreco' ),'cm_readonly','',$data);
            cb_textarea(__( 'Terms & Conditions', 'elgreco' ),'tp_readonly_read_required_text','',$data);
            cb_input(__( 'Error text', 'elgreco' ),'cm_readonly_notify','',$data);
            cb_checkbox(__( 'Show review date', 'elgreco'),'tp_revdate','',$data);

            cb_checkbox(__( 'Enable Frequently Asked Questions tab', 'elgreco' ),'tp_tab_item_faqs','',$data);
            cb_input(__( 'Frequently Asked Questions tab', 'elgreco' ),'tp_faqs_title','',$data);
            cb_textarea(__( 'Frequently Asked Questions tab description', 'elgreco' ),'tp_faqs_text','',$data);














            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>

<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Payment Methods', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show payment methods icons', 'elgreco' ),'tp_show_payment_methods','',$data);
            cb_input(__( 'Guaranteed safe checkout', 'elgreco' ),'tp_guarantee_safe','',$data);
            cb_image(__( 'Image 1', 'elgreco' ),'single_payment_icons_1','',$data,'',__('recommended size: 45*30px','elgreco'));
            cb_image(__( 'Image 2', 'elgreco' ),'single_payment_icons_2','',$data,'',__('recommended size: 45*30px','elgreco'));
            cb_image(__( 'Image 3', 'elgreco' ),'single_payment_icons_3','',$data,'',__('recommended size: 45*30px','elgreco'));
            cb_image(__( 'Image 4', 'elgreco' ),'single_payment_icons_4','',$data,'',__('recommended size: 45*30px','elgreco'));
            cb_image(__( 'Image 5', 'elgreco' ),'single_payment_icons_5','',$data,'',__('recommended size: 45*30px','elgreco'));
            cb_image(__( 'Image 6', 'elgreco' ),'single_payment_icons_6','',$data,'',__('recommended size: 45*30px','elgreco'));

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>

<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'About Us tab', 'elgreco' ); ?></h4>
        <div class="fields_cont">
        <?php
        cb_checkbox(__( 'Show About us tab', 'elgreco' ),'about_us_tab_enable','',$data);
        cb_input(__( 'About us tab', 'elgreco' ),'about_us_tab_title','',$data);
?>

            <div class="add_list">
                <?php
                foreach ($data['about_us_tab']['item'] as $key => $val){
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_input(__( 'Title', 'elgreco' ),'head',$key,$val,'about_us_tab[item]['.$key.']', '', '', '');
                    cb_input(__( 'Description', 'elgreco' ),'text',$key,$val,'about_us_tab[item]['.$key.']', '', '', '');
                    cb_image(__( 'Image', 'elgreco' ),'img',$key,$val, 'about_us_tab[item]['.$key.']','','','about_us_tab');
                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="about_us_tab[item]" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="about_us_tab[item]" data-key="<?php echo $key; ?>">Add</div>
            </div>
            <div class="data_source">
                <i data-type="cb_input" data-name="<?php _e( 'Title', 'elgreco' ); ?>" data-var="head"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Description', 'elgreco' ); ?>" data-var="text"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Image', 'elgreco' ); ?>" data-var="img"></i>
            </div>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>

<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Underlay', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php

            cb_checkbox(__( 'Add underlay to product background', 'elgreco' ),'single_underlay','',$data);
            cb_color_picker(__( 'Recommended products background color', 'elgreco' ),'single_bgr_recs','',$data);

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>