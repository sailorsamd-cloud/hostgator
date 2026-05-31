<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?>                <div>
    <div class="fields_block">
        <h4><?php _e( 'Featured Products', 'elgreco' ); ?></h4>
        <div class="fields_cont elemenu_menu_cont">
            <div class="elemenu_menu"></div>
            <div class="menu_back"><span class="csh_back"></span><span><?php _e( 'Back', 'elgreco' ); ?></span></div>
            <div class="add_list">
                <?php
                foreach ($data['featured'] as $key => $val){
                    ?><form action="live_cstm_save_featured" class="live_cstm_save_featured add_list_one" data-key="<?php echo $key ;?>" ><?php
                    ?>
                    <div class="save_item_block">
                        <div class="btn btn-green save_item" data-field="featured" data-key="<?php echo $key; ?>">Save Featured Product Item</div>
                    </div>
                    <div>
                        <h4>Product</h4>
                        <div data-adstm_action="general" data-adstm_template="#ads-choose" data-new="<?php echo _e('New product','elgreco') ;?>" data-value="<?php echo cz_ar('product',$val); ?>" data-name="<?php echo 'featured['.$key.'][product]'; ?>"></div>
                    </div>
                    <?php
                    cb_color_picker(__( 'Background color', 'elgreco' ),'clr_single_bgr',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Sale price color', 'elgreco' ),'clr_price',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Sale badge color', 'elgreco' ),'clr_sale_badge_bgr',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Sale badge text color', 'elgreco' ),'clr_sale_badge_text',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Star rating color', 'elgreco' ),'clr_stars',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Element color', 'elgreco' ),'clr_vars',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( '‘Add to cart’ button color', 'elgreco' ),'clr_atc_bgr',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( '‘Add to cart’ button color (hover)', 'elgreco' ),'clr_atc_bgr_hover',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( '‘Add to cart’ button label color', 'elgreco' ),'clr_atc_text',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( '‘Add to cart’ button label color (hover)', 'elgreco' ),'clr_atc_text_hover',$key,$val,'featured['.$key.']',1);
                    cb_input(__( 'Shipping message', 'elgreco' ),'tp_shipping_tip',$key,$val,'featured['.$key.']');
                    cb_color_picker(__( 'Shipping message color', 'elgreco' ),'clr_shipping_tip',$key,$val,'featured['.$key.']',1);

                    cb_separate(__( 'Short Description', 'elgreco' ));
                    cb_textarea(__( 'Short Description', 'elgreco' ),'tp_short_desc',$key,$val,'featured['.$key.']', '');
                    cb_color_picker(__( 'Short description color', 'elgreco' ),'clr_short_desc',$key,$val,'featured['.$key.']',1);

                    cb_separate(__( 'Featured On', 'elgreco' ));
                    cb_checkbox(__( 'Show Featured On block', 'elgreco'),'tp_featured_on',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Featured on text', 'elgreco' ),'tp_featured_on_text',$key,$val,'featured['.$key.']');
                    cb_image(__( 'Partner logo 1', 'elgreco' ),'tp_fo_1',$key,$val, 'featured['.$key.']',__( 'Recommended height: 60px', 'elgreco' ),'0','partner');
                    cb_image(__( 'Partner logo 2', 'elgreco' ),'tp_fo_2',$key,$val, 'featured['.$key.']',__( 'Recommended height: 60px', 'elgreco' ),'0','partner');
                    cb_image(__( 'Partner logo 3', 'elgreco' ),'tp_fo_3',$key,$val, 'featured['.$key.']',__( 'Recommended height: 60px', 'elgreco' ),'0','partner');
                    cb_image(__( 'Partner logo 4', 'elgreco' ),'tp_fo_4',$key,$val, 'featured['.$key.']',__( 'Recommended height: 60px', 'elgreco' ),'0','partner');
                    cb_image(__( 'Partner logo 5', 'elgreco' ),'tp_fo_5',$key,$val, 'featured['.$key.']',__( 'Recommended height: 60px', 'elgreco' ),'0','partner');
                    cb_image(__( 'Partner logo 6', 'elgreco' ),'tp_fo_6',$key,$val, 'featured['.$key.']',__( 'Recommended height: 60px', 'elgreco' ),'0','partner');

                    cb_separate(__( 'Video', 'elgreco' ));
                    cb_image_crop(__( 'Cover image', 'elgreco' ),'video_img',$key,$val, 'featured['.$key.']',__( 'Recommended size: 1820*728px', 'elgreco' ),1,'sb',1820,728);
                    cb_input(__( 'Video link', 'elgreco' ),'video_link',$key,$val,'featured['.$key.']', '', '', '');
                    cb_input(__( 'Heading', 'elgreco' ),'video_head',$key,$val,'featured['.$key.']', '', '', '');
                    cb_input(__( 'Text', 'elgreco' ),'video_text',$key,$val,'featured['.$key.']', '', '', '');
                    cb_input(__( 'Video button text', 'elgreco' ),'video_btn_text',$key,$val,'featured['.$key.']', '', '', '');

                    cb_color_picker(__( 'Button color', 'elgreco' ),'clr_video_btn_bgr',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Button color (hover)', 'elgreco' ),'clr_video_btn_bgr_hover',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Button label color', 'elgreco' ),'clr_video_btn_text',$key,$val,'featured['.$key.']',1);
                    cb_color_picker(__( 'Button label color (hover)', 'elgreco' ),'clr_video_btn_text_hover',$key,$val,'featured['.$key.']',1);

                    cb_separate(__( 'Comparison', 'elgreco' ));
                    cb_checkbox(__( 'Show Comparison block', 'elgreco'),'tp_comp_on',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Heading', 'elgreco' ),'tp_comp_head',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Description', 'elgreco' ),'tp_comp_text',$key,$val,'featured['.$key.']');
                    cb_image_crop(__( 'Featured product image', 'elgreco' ),'tp_comp_1_img',$key,$val, 'featured['.$key.']',__( 'Recommended size: 748*550px', 'elgreco' ),0,'',748,550);
                    cb_input(__( 'Featured product title', 'elgreco' ),'tp_comp_1_title',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Benefit 1', 'elgreco' ),'tp_comp_1_1',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Benefit 2', 'elgreco' ),'tp_comp_1_2',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Benefit 3', 'elgreco' ),'tp_comp_1_3',$key,$val,'featured['.$key.']');
                    cb_image_crop(__( 'Competitor’s product image', 'elgreco' ),'tp_comp_2_img',$key,$val, 'featured['.$key.']',__( 'Recommended size: 748*550px', 'elgreco' ),0,'',748,550);
                    cb_input(__( 'Competitor’s product title', 'elgreco' ),'tp_comp_2_title',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Drawback 1', 'elgreco' ),'tp_comp_2_1',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Drawback 2', 'elgreco' ),'tp_comp_2_2',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Drawback 3', 'elgreco' ),'tp_comp_2_3',$key,$val,'featured['.$key.']');

                    cb_separate(__( 'Featured Reviews', 'elgreco' ));
                    cb_checkbox(__( 'Show featured reviews', 'elgreco'),'tp_rev_show',$key,$val,'featured['.$key.']');
                    cb_image_crop(__( 'Customer photo 1', 'elgreco' ),'tp_rev_1_img',$key,$val, 'featured['.$key.']',__( 'Recommended size: 133*133px', 'elgreco' ),0,'',133,133);
                    cb_input(__( 'Customer name 1', 'elgreco' ),'tp_rev_1_name',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Review text 1', 'elgreco' ),'tp_rev_1_text',$key,$val,'featured['.$key.']');
                    cb_image_crop(__( 'Customer photo 2', 'elgreco' ),'tp_rev_2_img',$key,$val, 'featured['.$key.']',__( 'Recommended size: 133*133px', 'elgreco' ),0,'',133,133);
                    cb_input(__( 'Customer name 2', 'elgreco' ),'tp_rev_2_name',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Review text 2', 'elgreco' ),'tp_rev_2_text',$key,$val,'featured['.$key.']');
                    cb_image_crop(__( 'Customer photo 3', 'elgreco' ),'tp_rev_3_img',$key,$val, 'featured['.$key.']',__( 'Recommended size: 133*133px', 'elgreco' ),0,'',133,133);
                    cb_input(__( 'Customer name 3', 'elgreco' ),'tp_rev_3_name',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Review text 3', 'elgreco' ),'tp_rev_3_text',$key,$val,'featured['.$key.']');

                    cb_separate(__( 'Image Gallery', 'elgreco' ));
                    cb_checkbox(__( 'Show Image Gallery', 'elgreco'),'tp_img_gal_show',$key,$val,'featured['.$key.']');
                    cb_image_crop(__( 'Customer photo 1 (small)', 'elgreco' ),'tp_img_gal_1',$key,$val, 'featured['.$key.']',__( 'Recommended size: 440*300px', 'elgreco' ),0,'',440,300);
                    cb_image_crop(__( 'Customer photo 2 (small)', 'elgreco' ),'tp_img_gal_2',$key,$val, 'featured['.$key.']',__( 'Recommended size: 440*300px', 'elgreco' ),0,'',440,300);
                    cb_image_crop(__( 'Customer photo 3 (big)', 'elgreco' ),'tp_img_gal_3',$key,$val, 'featured['.$key.']',__( 'Recommended size: 900*620px', 'elgreco' ),0,'',900,620);
                    cb_image_crop(__( 'Customer photo 4 (big)', 'elgreco' ),'tp_img_gal_4',$key,$val, 'featured['.$key.']',__( 'Recommended size: 900*620px', 'elgreco' ),0,'',900,620);
                    cb_image_crop(__( 'Customer photo 5 (small)', 'elgreco' ),'tp_img_gal_5',$key,$val, 'featured['.$key.']',__( 'Recommended size: 440*300px', 'elgreco' ),0,'',440,300);
                    cb_image_crop(__( 'Customer photo 6 (small)', 'elgreco' ),'tp_img_gal_6',$key,$val, 'featured['.$key.']',__( 'Recommended size: 440*300px', 'elgreco' ),0,'',440,300);

                    cb_separate(__( 'Reviews', 'elgreco' ));
                    cb_input(__( 'Heading', 'elgreco' ),'tp_revs_head',$key,$val,'featured['.$key.']');
                    cb_input(__( 'Text', 'elgreco' ),'tp_revs_text',$key,$val,'featured['.$key.']');
                    cb_color_picker(__( 'Background color', 'elgreco' ),'clr_revs_bgr',$key,$val,'featured['.$key.']',1);

                    cb_separate(__( 'Recommended Products', 'elgreco' ));
                    cb_checkbox(__( 'Show recommended products', 'elgreco'),'tp_related',$key,$val, 'featured['.$key.']');
                    cb_input(__( 'Heading', 'elgreco' ),'tp_related_head',$key,$val, 'featured['.$key.']', '', '', '');
                    cb_input(__( 'Text', 'elgreco' ),'tp_related_text',$key,$val, 'featured['.$key.']', '', '', '');
                    ?>
                    <div class="service_flex">
                        <div class="save_item_block">
                            <div class="btn btn-green save_item" data-field="featured" data-key="<?php echo $key; ?>"><?php _e( 'Save Featured Product Item', 'elgreco' ); ?></div>
                        </div>
                        <div class="remove_block">
                            <div class="btn btn-danger open_sdf"><?php _e( 'Delete Item', 'elgreco' ); ?></div>
                            <div class="sure_delete_fixed">
                                <div class="sure_delete_fixed_inner">
                                    <p><?php _e( 'Are you sure to delete this item? It won\'t be restored', 'elgreco' ); ?></p>
                                    <div class="sdf_flex">
                                        <div class="btn btn-danger remove_item_featured" data-field="featured" data-key="<?php echo $key; ?>"><?php _e( 'Sure, Delete Item', 'elgreco' ); ?></div>
                                        <div class="btn btn-green close_sdf"><?php _e( 'Cancel', 'elgreco' ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    </form><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="featured" data-key="<?php echo $key; ?>" data-isform="1" >Add</div>
            </div>
            <div class="data_source">

                <i data-type="cb_save_block"></i>
                <i data-type="cb_product" data-var="product"></i>

                <i data-type="cb_color_picker" data-name="<?php _e( 'Background color', 'elgreco' ); ?>" data-var="clr_single_bgr"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Sale price color', 'elgreco' ); ?>" data-var="clr_price"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Sale badge color', 'elgreco' ); ?>" data-var="clr_sale_badge_bgr"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Sale badge text color', 'elgreco' ); ?>" data-var="clr_sale_badge_text"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Star rating color', 'elgreco' ); ?>" data-var="clr_stars"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Element color', 'elgreco' ); ?>" data-var="clr_vars"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( '‘Add to cart’ button color', 'elgreco' ); ?>" data-var="clr_atc_bgr"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( '‘Add to cart’ button color (hover)', 'elgreco' ); ?>" data-var="clr_atc_bgr_hover"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( '‘Add to cart’ button label color', 'elgreco' ); ?>" data-var="clr_atc_text"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( '‘Add to cart’ button label color (hover)', 'elgreco' ); ?>" data-var="clr_atc_text_hover"></i>

                <i data-type="cb_input" data-name="<?php _e( 'Shipping message', 'elgreco' ); ?>" data-var="tp_shipping_tip"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Shipping message color', 'elgreco' ); ?>" data-var="clr_shipping_tip"></i>

                <i data-type="cb_separate" data-name="<?php _e( 'Short Description', 'elgreco' ); ?>"></i>
                <i data-type="cb_textarea" data-name="<?php _e( 'Short Description', 'elgreco' ); ?>" data-var="tp_short_desc"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Short description color', 'elgreco' ); ?>" data-var="clr_short_desc"></i>

                <i data-type="cb_separate" data-name="<?php _e( 'Featured On', 'elgreco' ); ?>"></i>
                <i data-type="cb_checkbox" data-name="<?php _e( 'Show Featured On block', 'elgreco' ); ?>" data-var="tp_featured_on"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Featured on text', 'elgreco' ); ?>" data-var="tp_featured_on_text"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Partner logo 1', 'elgreco' ); ?>" data-var="tp_fo_1" data-tip="<?php _e( 'Recommended size: 60px', 'elgreco' ); ?>"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Partner logo 2', 'elgreco' ); ?>" data-var="tp_fo_2" data-tip="<?php _e( 'Recommended size: 60px', 'elgreco' ); ?>"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Partner logo 3', 'elgreco' ); ?>" data-var="tp_fo_3" data-tip="<?php _e( 'Recommended size: 60px', 'elgreco' ); ?>"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Partner logo 4', 'elgreco' ); ?>" data-var="tp_fo_4" data-tip="<?php _e( 'Recommended size: 60px', 'elgreco' ); ?>"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Partner logo 5', 'elgreco' ); ?>" data-var="tp_fo_5" data-tip="<?php _e( 'Recommended size: 60px', 'elgreco' ); ?>"></i>
                <i data-type="cb_image" data-name="<?php _e( 'Partner logo 6', 'elgreco' ); ?>" data-var="tp_fo_6" data-tip="<?php _e( 'Recommended size: 60px', 'elgreco' ); ?>"></i>


                <i data-type="cb_separate" data-name="<?php _e( 'Video', 'elgreco' ); ?>"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Cover image', 'elgreco' ); ?>" data-var="video_img" data-tip="<?php _e( 'Recommended size: 1820*728px', 'elgreco' ); ?>" data-width="1820" data-height="728"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Video link', 'elgreco' ); ?>" data-var="video_link"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Heading', 'elgreco' ); ?>" data-var="video_head"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Text', 'elgreco' ); ?>" data-var="video_text"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Video button text', 'elgreco' ); ?>" data-var="video_btn_text"></i>

                <i data-type="cb_color_picker" data-name="<?php _e( 'Button color', 'elgreco' ); ?>" data-var="clr_video_btn_bgr"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Button color (hover)', 'elgreco' ); ?>" data-var="clr_video_btn_bgr_hover"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Button label color', 'elgreco' ); ?>" data-var="clr_video_btn_text"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Button label color (hover)', 'elgreco' ); ?>" data-var="clr_video_btn_text_hover"></i>


                <i data-type="cb_separate" data-name="<?php _e( 'Comparison', 'elgreco' ); ?>"></i>
                <i data-type="cb_checkbox" data-name="<?php _e( 'Show Comparison block', 'elgreco' ); ?>" data-var="tp_comp_on"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Heading', 'elgreco' ); ?>" data-var="tp_comp_head"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Description', 'elgreco' ); ?>" data-var="tp_comp_text"></i>

                <i data-type="cb_image_crop" data-name="<?php _e( 'Featured product image', 'elgreco' ); ?>" data-var="tp_comp_1_img" data-tip="<?php _e( 'Recommended size: 748*550px', 'elgreco' ); ?>" data-width="748" data-height="550"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Featured product title', 'elgreco' ); ?>" data-var="tp_comp_1_title"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Benefit 1', 'elgreco' ); ?>" data-var="tp_comp_1_1"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Benefit 2', 'elgreco' ); ?>" data-var="tp_comp_1_2"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Benefit 3', 'elgreco' ); ?>" data-var="tp_comp_1_3"></i>

                <i data-type="cb_image_crop" data-name="<?php _e( 'Competitor’s product image', 'elgreco' ); ?>" data-var="tp_comp_2_img" data-tip="<?php _e( 'Recommended size: 748*550px', 'elgreco' ); ?>" data-width="748" data-height="550"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Competitor’s product title', 'elgreco' ); ?>" data-var="tp_comp_2_title"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Drawback 1', 'elgreco' ); ?>" data-var="tp_comp_2_1"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Drawback 2', 'elgreco' ); ?>" data-var="tp_comp_2_2"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Drawback 3', 'elgreco' ); ?>" data-var="tp_comp_2_3"></i>


                <i data-type="cb_separate" data-name="<?php _e( 'Featured Reviews', 'elgreco' ); ?>"></i>
                <i data-type="cb_checkbox" data-name="<?php _e( 'Show featured reviews', 'elgreco' ); ?>" data-var="tp_rev_show"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 1', 'elgreco' ); ?>" data-var="tp_rev_1_img" data-tip="<?php _e( 'Recommended size: 133*133px', 'elgreco' ); ?>" data-width="133" data-height="133"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Customer name 1', 'elgreco' ); ?>" data-var="tp_rev_1_name"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Review text 1', 'elgreco' ); ?>" data-var="tp_rev_1_text"></i>

                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 2', 'elgreco' ); ?>" data-var="tp_rev_2_img" data-tip="<?php _e( 'Recommended size: 133*133px', 'elgreco' ); ?>" data-width="133" data-height="133"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Customer name 2', 'elgreco' ); ?>" data-var="tp_rev_2_name"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Review text 2', 'elgreco' ); ?>" data-var="tp_rev_2_text"></i>

                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 3', 'elgreco' ); ?>" data-var="tp_rev_3_img" data-tip="<?php _e( 'Recommended size: 133*133px', 'elgreco' ); ?>" data-width="133" data-height="133"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Customer name 3', 'elgreco' ); ?>" data-var="tp_rev_3_name"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Review text 3', 'elgreco' ); ?>" data-var="tp_rev_3_text"></i>


                <i data-type="cb_separate" data-name="<?php _e( 'Image Gallery', 'elgreco' ); ?>"></i>
                <i data-type="cb_checkbox" data-name="<?php _e( 'Show Image Gallery', 'elgreco' ); ?>" data-var="tp_img_gal_show"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 1 (small)', 'elgreco' ); ?>" data-var="tp_img_gal_1" data-tip="<?php _e( 'Recommended size: 440*300px', 'elgreco' ); ?>" data-width="440" data-height="300"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 2 (small)', 'elgreco' ); ?>" data-var="tp_img_gal_2" data-tip="<?php _e( 'Recommended size: 440*300px', 'elgreco' ); ?>" data-width="440" data-height="300"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 3 (big)', 'elgreco' ); ?>" data-var="tp_img_gal_3" data-tip="<?php _e( 'Recommended size: 900*620px', 'elgreco' ); ?>" data-width="900" data-height="620"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 4 (big)', 'elgreco' ); ?>" data-var="tp_img_gal_4" data-tip="<?php _e( 'Recommended size: 900*620px', 'elgreco' ); ?>" data-width="900" data-height="620"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 5 (small)', 'elgreco' ); ?>" data-var="tp_img_gal_5" data-tip="<?php _e( 'Recommended size: 440*300px', 'elgreco' ); ?>" data-width="440" data-height="300"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo 6 (small)', 'elgreco' ); ?>" data-var="tp_img_gal_6" data-tip="<?php _e( 'Recommended size: 440*300px', 'elgreco' ); ?>" data-width="440" data-height="300"></i>


                <i data-type="cb_separate" data-name="<?php _e( 'Reviews', 'elgreco' ); ?>"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Heading', 'elgreco' ); ?>" data-var="tp_revs_head"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Text', 'elgreco' ); ?>" data-var="tp_revs_text"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Background color', 'elgreco' ); ?>" data-var="clr_revs_bgr"></i>

                <i data-type="cb_separate" data-name="<?php _e( 'Recommended Products', 'elgreco' ); ?>"></i>
                <i data-type="cb_checkbox" data-name="<?php _e( 'Show recommended products', 'elgreco' ); ?>" data-var="tp_related"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Heading', 'elgreco' ); ?>" data-var="tp_related_head"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Text', 'elgreco' ); ?>" data-var="tp_related_text"></i>

                <i data-type="cb_save_remove_block"></i>






            </div>
            <!--                            <div class="save_block">-->
            <!--                                <input type="submit" value="--><?php //_e( 'Save Settings', 'elgreco' ); ?><!--" class="btn btn-green">-->
            <!--                                <div class="btn btn-blue get_default">--><?php //_e( 'Default', 'elgreco' ); ?><!--</div>-->
            <!--                            </div>-->
        </div>
    </div>
</div>
