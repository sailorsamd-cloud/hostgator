<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Store features', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable store features', 'elgreco' ),'features_enable','',$data);
            cb_color_picker(__( 'Features background color', 'elgreco' ),'features_bgr_color','',$data);
            cb_color_picker(__( 'Features titles color', 'elgreco' ),'features_title_color','',$data);
            cb_color_picker(__( 'Features text color', 'elgreco' ),'features_text_color','',$data);

            cb_separate(__( 'Elements', 'elgreco' ));


            ?>
            <div class="add_list">
                <?php
                foreach ($data['features']['item'] as $key => $val){
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_input(__( 'Title', 'elgreco' ),'head',$key,$val,'features[item]['.$key.']', '', '', '');
                    cb_input(__( 'Description', 'elgreco' ),'text',$key,$val,'features[item]['.$key.']', '', '', '');
                    cb_image(__( 'Image', 'elgreco' ),'img',$key,$val, 'features[item]['.$key.']','','','features_item');
                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="features[item]" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="features[item]" data-key="<?php echo $key; ?>">Add</div>
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
        <h4><?php _e( 'Trustpilot', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__('Enable Trustpilot widget','elgreco'),'tp_trustbox_enable','',$data);
            cb_textarea(__( 'Trustpilot code', 'elgreco' ),'tp_trustbox_code','',$data,'', '');

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
        <h4><?php _e( 'Stock settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
                cb_select(__( 'Stock display format', 'elgreco' ),'tp_stock_display', $data, $data,'','');
                cb_color_picker(__( 'In stock text color', 'elgreco' ),'tp_instock_color','',$data,'');
                cb_color_picker(__( 'Out of stock text color', 'elgreco' ),'tp_outofstock_color','',$data,'');
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
        <h4><?php _e( 'Single product page badges', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__('Show benefits','elgreco'),'tp_bens_show','',$data);
            cb_input(__( 'Free shipping worldwide', 'elgreco' ),'tp_shipping_tip','',$data,'', '', '', '');
            cb_image(__( 'Free shipping worldwide image', 'elgreco' ),'tp_shipping_tip_img','',$data,'','');
            cb_input(__( 'Returns', 'elgreco' ),'tp_returns_tip','',$data,'', '', '', '');
            cb_image(__( 'Returns image', 'elgreco' ),'tp_returns_tip_img','',$data,'','');

            cb_checkbox(__('Show sales badge','elgreco'),'tp_sale_badge2_enable','',$data);
            cb_color_picker(__( 'Sales badge color', 'elgreco' ),'tp_sale_badge_color','',$data,'');
            cb_checkbox(__('Show \'I recommend this product\' badge in product reviews','elgreco'),'tp_irecommend_enable','',$data);
            cb_color_picker(__( '\'I recommend this product\' badge color', 'elgreco' ),'tp_irecommend_color','',$data,'');



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
        <h4><?php _e( 'Single product page store benefits', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show store benefits on Single product page', 'elgreco' ),'store_benefits_enable','',$data);
            cb_input(__( 'Delivery time', 'elgreco' ),'store_benefits_days','',$data,'', '', '', __( 'Number of days required to ship products. ‘Estimated Delivery Date\' field is populated automatically. You don’t need to add any dates manually in the field below.', 'elgreco' ));
            cb_select(__( 'Select delivery date language', 'elgreco' ),'store_benefits_days_lang2', $data, $data,'','');


            cb_separate(__( 'Elements', 'elgreco' ));


            ?>
            <div class="add_list">
                <?php
                foreach ($data['store_benefits']['item'] as $key => $val){
                    ?><div class="add_list_one" data-key="<?php echo $key ;?>" ><?php
                    cb_input(__( 'Title', 'elgreco' ),'head',$key,$val,'store_benefits[item]['.$key.']', '', '', '');
                    cb_input(__( 'Description', 'elgreco' ),'text',$key,$val,'store_benefits[item]['.$key.']', '', '', '');
                    cb_image(__( 'Image', 'elgreco' ),'img',$key,$val, 'store_benefits[item]['.$key.']','','','store_benefits');
                    ?>
                    <div class="remove_block">
                        <div class="btn btn-default remove_item" data-field="store_benefits[item]" data-key="<?php echo $key; ?>">Delete</div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
            <div class="add_block">
                <div class="btn btn-blue add_item" data-field="store_benefits[item]" data-key="<?php echo $key; ?>">Add</div>
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
        <h4><?php _e( 'Single product page additional information', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show \'Reasons to buy from us\' block in Product description tab', 'elgreco' ),'tp_desc_add_enable','',$data);
            cb_input(__( '\'Reasons to buy from us\' block title', 'elgreco' ),'tp_desc_add_title','',$data,'', '', '', '');
            cb_textarea(__( '\'Reasons to buy from us\' block description', 'elgreco' ),'tp_desc_add_text','',$data,'', '');
            cb_image(__( 'Image', 'elgreco' ),'tp_desc_add_img','',$data,'','');


            cb_checkbox(__('Show \'Buy with confidence\' block in Product description tab','elgreco'),'tp_desc_add_enable2','',$data);
            cb_input(__( '\'Buy with confidence\' block title', 'elgreco' ),'tp_desc_add_title2','',$data,'', '', '', '');
            cb_textarea(__( '\'Buy with confidence\' block description', 'elgreco' ),'tp_desc_add_text2','',$data,'', '');
            cb_image(__( 'Image', 'elgreco' ),'tp_desc_add_img2','',$data,'','');



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
        <h4><?php _e( 'Checkout Countdown Timer', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable Checkout Countdown Timer banner', 'elgreco'),'tp_opc_timer_enable','',$data);
            cb_input(__( 'Countdown Timer banner text', 'elgreco'),'tp_opc_timer_text','',$data,'', '', '', '');
            cb_checkbox(__( 'Enable Checkout Countdown Timer', 'elgreco'),'tp_opc_timer_only','',$data);
            cb_color_picker(__( 'Countdown Timer banner background color', 'elgreco' ),'tp_opc_timer_bgr','',$data);
            cb_color_picker(__( 'Countdown Timer banner text color', 'elgreco' ),'tp_opc_timer_color','',$data);
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
        <h4><?php _e( 'Checkout Trust box', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable trust box', 'elgreco'),'tp_trust_box_enable','',$data);
            cb_input(__( 'Trust block title', 'elgreco'),'tp_trust_box_title','',$data,'', '', '', '');
            cb_textarea('Trust block description','tp_trust_box_desc','',$data,'', '');
            cb_image('Trust block image','trust_box_img','',$data,'','');
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
        <h4><?php _e( 'Checkout Why buy from us box', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable Why buy from us box', 'elgreco'),'tp_whybuy_box_enable','',$data);

            cb_input(__( 'Reason #1', 'elgreco'),'tp_whybuy_reason1_title','',$data,'', '', '', '');
            cb_textarea('Reason #1 description','tp_whybuy_reason1_desc','',$data,'', '');
            cb_image('Reason #1 image','tp_whybuy_reason1_img','',$data,'','');

            cb_input(__( 'Reason #2', 'elgreco'),'tp_whybuy_reason2_title','',$data,'', '', '', '');
            cb_textarea('Reason #2 description','tp_whybuy_reason2_desc','',$data,'', '');
            cb_image('Reason #2 image','tp_whybuy_reason2_img','',$data,'','');
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>