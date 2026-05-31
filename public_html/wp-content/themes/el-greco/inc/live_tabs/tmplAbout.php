<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'About Us Page Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_image_crop(__( 'Background image', 'elgreco' ),'tp_bg1_about','',$data, '',__( 'Recommended size: 1920*440px', 'elgreco' ),0,'',1920,440);

            cb_input(__( 'Title', 'elgreco' ),'tp_about_b1_title','',$data);
            cb_textarea(__( 'Description', 'elgreco' ),'tp_about_b1_description','',$data,'', '');
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
        <h4><?php _e( 'Our Core Values', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php

            cb_checkbox(__( 'Enable this block', 'elgreco'),'tp_our_core_values','',$data);

            cb_input(__( 'Title', 'elgreco' ),'tp_our_core_values_title','',$data,'', '', '', '');
            cb_input(__( 'Value 1', 'elgreco' ),'tp_our_core_values_value1','',$data,'', '', '', '');
            cb_input(__( 'Value 2', 'elgreco' ),'tp_our_core_values_value2','',$data,'', '', '', '');
            cb_input(__( 'Value 3', 'elgreco' ),'tp_our_core_values_value3','',$data,'', '', '', '');
            cb_input(__( 'Value 4', 'elgreco' ),'tp_our_core_values_value4','',$data,'', '', '', '');
            cb_input(__( 'Value 5', 'elgreco' ),'tp_our_core_values_value5','',$data,'', '', '', '');


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
        <h4><?php _e( 'Keep In Contact With Us', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable this block', 'elgreco'),'tp_about_us_keep','',$data);

            cb_input(__( 'Title', 'elgreco' ),'tp_about_us_keep_in_contact_title','',$data);
            cb_textarea(__( 'Description', 'elgreco' ),'tp_about_us_keep_in_contact_description','',$data,'', '');

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
        <h4><?php _e( 'Our Partners', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php

            cb_checkbox(__( 'Enable this block', 'elgreco'),'tp_our_partners','',$data);
            cb_input(__( 'Title', 'elgreco' ),'tp_our_partners_title','',$data);
            cb_textarea(__( 'Description', 'elgreco' ),'tp_our_partners_description','',$data,'', '');

            cb_image_crop(__( 'Image 1', 'elgreco' ),'tp_about_delivery_1','',$data, '',__( 'Recommended size: 30px', 'elgreco' ),0,'','auto',30);
            cb_image_crop(__( 'Image 2', 'elgreco' ),'tp_about_delivery_2','',$data, '',__( 'Recommended size: 30px', 'elgreco' ),0,'','auto',30);
            cb_image_crop(__( 'Image 3', 'elgreco' ),'tp_about_delivery_3','',$data, '',__( 'Recommended size: 30px', 'elgreco' ),0,'','auto',30);
            cb_image_crop(__( 'Image 4', 'elgreco' ),'tp_about_delivery_4','',$data, '',__( 'Recommended size: 30px', 'elgreco' ),0,'','auto',30);
            cb_image_crop(__( 'Image 5', 'elgreco' ),'tp_about_delivery_5','',$data, '',__( 'Recommended size: 30px', 'elgreco' ),0,'','auto',30);


            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>