<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'H1 Heading Tag', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show H1 tag on', 'elgreco'),'home_h1_visible','',$data);
            cb_input(__( 'Homepage H1 tag', 'elgreco'),'home_h1','',$data,'', '', '', '');
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
        <h4><?php _e( 'Banner Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable Homepage slider', 'elgreco'),'tp_home_slider_enable','',$data);
            cb_checkbox(__( 'Use full-width slider', 'elgreco'),'tp_home_slider_full','',$data);
            cb_checkbox(__( 'Auto-rotate slides', 'elgreco'),'tp_home_slider_rotating','',$data);
            cb_checkbox(__( 'Enable autorotation on mobile', 'elgreco'),'tp_home_slider_rotating_mob','',$data);
            cb_input(__( 'Change slides every', 'elgreco'),'tp_home_slider_rotating_time','',$data,'', '', __('Auto-rotation time in seconds', 'elgreco'), '');

            cb_color_picker(__( 'Button color', 'elgreco' ),'tp_home_buttons_color','',$data,'');
            cb_color_picker(__( 'Button color (hover)', 'elgreco' ),'tp_home_buttons_color_hover','',$data,'');
            cb_color_picker(__( 'Button text color', 'elgreco' ),'tp_home_buttons_text_color','',$data,'');
            cb_color_picker(__( 'Button text color (hover)', 'elgreco' ),'tp_home_buttons_text_color_hover','',$data,'');
            cb_color_picker(__( "'View video' button color", 'elgreco' ),'tp_home_video_btn_color','',$data,'');
            cb_color_picker(__( "'View video' button color (hover)", 'elgreco' ),'tp_home_video_btn_color_hover','',$data,'');

            cb_input(__('YouTube Video ID (first banner button)', 'elgreco'),'id_video_youtube_home','',$data,'', '', __('YouTube Video opens in a lightbox', 'elgreco'), '');
            cb_input(__( 'Text font size (Desktop)', 'elgreco'),'slider_home_fs_desk','',$data,'', '', '', '');
            cb_input(__( 'Text font size (Mobile)', 'elgreco'),'slider_home_fs_mob','',$data,'', '', '', '');

            cb_select(__( 'Choose slider font', 'elgreco' ),'add_fonts_slider3', $data, $data)


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
        <h4><?php _e( 'Banner Elements', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <div class="add_list">
                <?php
                foreach ($data['slider_home'] as $key => $val){
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_image_crop(__( 'Banner (desktop)', 'elgreco' ),'img',$key,$val, 'slider_home['.$key.']',__( 'Recommended size: 1920*570px', 'elgreco' ),0,'mainslider',1920,570);
                    cb_image_crop(__( 'Banner (mobile)', 'elgreco' ),'img_adap',$key,$val, 'slider_home['.$key.']',__( 'Recommended size: 500*500px', 'elgreco' ),0,'mainslider',500,500);
                    cb_input(__( 'Heading', 'elgreco' ),'text',$key,$val,'slider_home['.$key.']', '', '', '');
                    cb_select(__( 'Text position (Desktop)', 'elgreco' ),'home_position', $data,$val,'','slider_home['.$key.']');
                    cb_select(__( 'Text position (Mobile)', 'elgreco' ),'home_position_mob', $data,$val,'','slider_home['.$key.']');
                    cb_color_picker(__( 'Text color', 'elgreco' ),'text_color',$key,$val,'slider_home['.$key.']');
                    cb_checkbox(__( 'Show button', 'elgreco'),'shop_now_enabled',$key,$val,'slider_home['.$key.']','');
                    cb_input(__( 'Button link', 'elgreco' ),'shop_now_link',$key,$val,'slider_home['.$key.']', '', '', '');
                    cb_input(__( 'Button label', 'elgreco' ),'button_text',$key,$val,'slider_home['.$key.']', '', '', '');

                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="slider_home" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="slider_home" data-key="<?php echo $key; ?>">Add</div>
            </div>
            <div class="data_source">
                <i data-type="cb_image_crop" data-name="<?php _e( 'Banner (desktop)', 'elgreco' ); ?>" data-var="img" data-tip="<?php _e( 'Recommended size: 1920*570px', 'elgreco' ); ?>" data-width="1920" data-height="570"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Banner (mobile)', 'elgreco' ); ?>" data-var="img_adap" data-tip="<?php _e( 'Recommended size: 500*500px', 'elgreco' ); ?>" data-width="500" data-height="500"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Heading', 'elgreco' ); ?>" data-var="text"></i>
                <i data-type="cb_select" data-name="<?php _e( 'Text position (Desktop)', 'elgreco' ); ?>" data-var="home_position"></i>
                <i data-type="cb_select" data-name="<?php _e( 'Text position (Mobile)', 'elgreco' ); ?>" data-var="home_position_mob"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Text color', 'elgreco' ); ?>" data-var="text_color"></i>
                <i data-type="cb_checkbox" data-name="<?php _e( 'Show button', 'elgreco' ); ?>" data-var="shop_now_enabled"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Button link', 'elgreco' ); ?>" data-var="button_link"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Button label', 'elgreco' ); ?>" data-var="button_text"></i>
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
        <h4><?php _e( 'Most popular categories', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__('Show featured categories', 'elgreco'), 'tp_most_popular_enable', '', $data);
            cb_input(__( 'Most popular categories', 'elgreco'), 'tp_most_popular_heading', '', $data, '', '', '', '');
            ?>
            <div class="add_list">
                <?php
                foreach ($data['most_popular_items'] as $key => $val) {
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_image_crop(__( 'Category', 'elgreco' ),'image',$key,$val, 'most_popular_items['.$key.']',__( 'Recommended size: 600*600px', 'elgreco' ),0,'most',600,600);
                    cb_input(__( 'Text', 'elgreco' ),'name',$key,$val,'most_popular_items['.$key.']', '', '', '');
                    cb_input(__( 'Description', 'elgreco' ),'desc',$key,$val,'most_popular_items['.$key.']', '', '', '');
                    cb_color_picker(__( 'Overlay color', 'elgreco' ),'bg_color',$key,$val,'most_popular_items['.$key.']');
                    cb_input(__( 'Link', 'elgreco' ),'link',$key,$val,'most_popular_items['.$key.']', '', '', '');

                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="most_popular_items" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="slider_home" data-key="<?php echo $key; ?>">Add</div>
            </div>
            <div class="data_source">
                <i data-type="cb_image_crop" data-name="<?php _e( 'Category', 'elgreco' ); ?>" data-var="image" data-tip="<?php _e( 'Recommended size: 600*600px', 'elgreco' ); ?>" data-width="600" data-height="600"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Text', 'elgreco' ); ?>" data-var="text"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Description', 'elgreco' ); ?>" data-var="desc"></i>
                <i data-type="cb_color_picker" data-name="<?php _e( 'Overlay color', 'elgreco' ); ?>" data-var="bg_color"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Link', 'elgreco' ); ?>" data-var="link"></i>


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
        <h4><?php _e( 'Product Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Add underlay to product background', 'elgreco'),'home_underlay','',$data);


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
        <h4><?php _e( 'Featured Products', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show featured products', 'elgreco'),'home_featured_ones','',$data);
            cb_input(__( 'Heading', 'elgreco' ),'home_featured_title','',$data,'', '', '', '');
            cb_color_picker(__( "Featured product background color", 'elgreco' ),'home_bgr_featured','',$data,'');
            ?>
            <div>
                <h4>Product</h4>
                <div data-adstm_action="general" data-adstm_template="#ads-choose" data-new="<?php echo _e('Products','elgreco') ;?>" data-value="<?php echo cz_ar('home_featured_list',$data); ?>" data-name="<?php echo 'home_featured_list'; ?>"></div>
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
        <h4><?php _e( 'Best Deals', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show Best deals', 'elgreco'),'home_top_deals','',$data);
            cb_input(__( 'Best deals', 'elgreco' ),'home_top_deals_title','',$data,'', '', '', '');
            cb_select(__( 'Number of products shown in Best deals', 'elgreco' ),'home_deals', $data, $data,'','');
            cb_color_picker(__( 'Best deals background color', 'elgreco' ),'home_bgr_deals','',$data,'');
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
        <h4><?php _e( 'Just Arrived', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show Just arrived', 'elgreco'),'home_new_in','',$data);
            cb_input(__( 'Just arrived', 'elgreco' ),'home_new_in_title','',$data,'', '', '', '');
            cb_select(__( 'Number of products shown in Just arrived', 'elgreco' ),'home_newin', $data, $data,'','');
            cb_color_picker(__( 'Just arrived background color', 'elgreco' ),'home_bgr_arrived','',$data,'');
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
        <h4><?php _e( 'Trending Now', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show Trending now', 'elgreco'),'home_most_liked','',$data);
            cb_input(__( 'Trending now', 'elgreco' ),'home_most_liked_title','',$data,'', '', '', '');
            cb_select(__( 'Number of products shown in Trending now', 'elgreco' ),'home_liked', $data, $data,'','');
            cb_color_picker(__( 'Trending now background color', 'elgreco' ),'home_bgr_trending','',$data,'');
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
        <h4><?php _e( 'Testimonials', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show testimonials', 'elgreco'),'testimonials_enabled','',$data);
            cb_checkbox(__( 'Auto-rotate testimonials', 'elgreco'),'testimonials_rotating','',$data);
            cb_input(__( 'Change testimonials every', 'elgreco' ),'testimonials_rotating_time','',$data,'','','',__('Auto-rotation time in seconds', 'elgreco'));
            cb_input(__( 'Testimonials block title', 'elgreco' ),'testimonials_title','',$data);

            cb_separate(__( 'Elements', 'elgreco' ));
            ?>
            <div class="add_list">
                <?php
                foreach ($data['testimonials'] as $key => $val){
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_image_crop(__( 'Review photo', 'elgreco' ),'image',$key,$val, 'testimonials['.$key.']',__( 'Recommended size: 1000*500px', 'elgreco' ),'0','testimonials',1000,500);
                    cb_image_crop(__( 'Customer photo', 'elgreco' ),'image_man',$key,$val, 'testimonials['.$key.']',__( 'Recommended size: 180*180px', 'elgreco' ),'0','testimonials',180,180);
                    cb_input(__( 'Customer name', 'elgreco' ),'name',$key,$val,'testimonials['.$key.']', '', '', '');
                    cb_input(__( 'Text', 'elgreco' ),'text',$key,$val,'testimonials['.$key.']', '', '', '');
                    cb_select(__( 'Stars', 'elgreco' ),'stars', $data,$val,'','testimonials['.$key.']');

                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="home_video" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="home_video">Add</div>
            </div>
            <div class="data_source">
                <i data-type="cb_image_crop" data-name="<?php _e( 'Review photo', 'elgreco' ); ?>" data-var="image" data-tip="<?php _e( 'Recommended size: 1000*500px', 'elgreco' ); ?>" data-width="1000" data-height="500"></i>
                <i data-type="cb_image_crop" data-name="<?php _e( 'Customer photo', 'elgreco' ); ?>" data-var="image_man" data-tip="<?php _e( 'Recommended size: 180*180px', 'elgreco' ); ?>" data-width="180" data-height="180"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Video link', 'elgreco' ); ?>" data-var="name"></i>
                <i data-type="cb_input" data-name="<?php _e( 'Text', 'elgreco' ); ?>" data-var="text"></i>
                <i data-type="cb_select" data-name="<?php _e( 'Stars', 'elgreco' ); ?>" data-var="stars"></i>
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
        <h4><?php _e( 'Blog Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show Blog', 'elgreco'),'home_blog_enable','',$data);
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
        <h4><?php _e( 'Article', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_textarea_big(__( 'Add an article to your Homepage. Recommended content length: 300-500 words.', 'elgreco' ),'tp_home_article','',$data,'', '', '', '');
            cb_checkbox(__( "Show 'Read more' link on mobile", 'elgreco'),'tp_home_article_more','',$data);
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>