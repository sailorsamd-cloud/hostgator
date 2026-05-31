<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Footer color settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_color_picker(__( 'Footer background color', 'elgreco' ),'footer_background_color','',$data,'');
            cb_color_picker(__( 'Footer titles color', 'elgreco' ),'footer_title_color','',$data,'');
            cb_color_picker(__( 'Footer text color', 'elgreco' ),'footer_text_color','',$data,'');
            cb_color_picker(__( 'Footer links color', 'elgreco' ),'footer_links_color','',$data,'');
            cb_color_picker(__( 'Footer links color (hover)', 'elgreco' ),'footer_links_color_hover','',$data,'');
            cb_color_picker(__( 'Footer copyright color', 'elgreco' ),'footer_copyright_color','',$data,'');

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
        <h4><?php _e( 'Footer menu settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_input(__( 'Footer title #1', 'elgreco' ),'tp_footer_menu_title_1','',$data,'', '', '', '');
            cb_input(__( 'Footer title #2', 'elgreco' ),'tp_footer_menu_title_2','',$data,'', '', '', '');
            cb_input(__( 'Footer title #3', 'elgreco' ),'tp_footer_menu_title_3','',$data,'', '', '', '');
            cb_input(__( 'Footer title #4', 'elgreco' ),'tp_footer_menu_title_4','',$data,'', '', '', '');

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
        <h4><?php _e( 'Back-to-top', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show back-to-top button', 'elgreco' ),'tp_enable_upbutton','',$data);

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
        <h4><?php _e( 'Copyright', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_input('','tp_copyright','',$data,'', '', '', '');

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
        <h4><?php _e( 'Contact details', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_input(__( 'Contact phone', 'elgreco' ),'tp_header_phone','',$data,'', '', '', '');
            cb_input(__( 'Contact email', 'elgreco' ),'tp_header_email','',$data,'', '', '', '');
            cb_input(__( 'Address', 'elgreco' ),'tp_address','',$data,'', '', '', '');

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
        <h4><?php _e( 'Payment methods', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show payment methods icons', 'elgreco' ),'tp_footer_payment_methods','',$data);
            cb_image(__( 'Image 1', 'elgreco' ),'tp_footer_1','',$data,'',__( 'Recommended size: 45*30px', 'elgreco' ));
            cb_image(__( 'Image 2', 'elgreco' ),'tp_footer_2','',$data,'',__( 'Recommended size: 45*30px', 'elgreco' ));
            cb_image(__( 'Image 3', 'elgreco' ),'tp_footer_3','',$data,'',__( 'Recommended size: 45*30px', 'elgreco' ));
            cb_image(__( 'Image 4', 'elgreco' ),'tp_footer_4','',$data,'',__( 'Recommended size: 45*30px', 'elgreco' ));
            cb_image(__( 'Image 5', 'elgreco' ),'tp_footer_5','',$data,'',__( 'Recommended size: 45*30px', 'elgreco' ));
            cb_image(__( 'Image 6', 'elgreco' ),'tp_footer_6','',$data,'',__( 'Recommended size: 45*30px', 'elgreco' ));

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
        <h4><?php _e( 'Trust seals', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show Trust seals', 'elgreco' ),'tp_footer_trust_seals','',$data);
            cb_input(__( 'Description', 'elgreco' ),'tp_confidence','',$data,'', '', '', '');
            cb_image(__( 'Trust seal 1', 'elgreco' ),'tp_confidence_img_1','',$data,'',__( 'Recommended size: 150*60px', 'elgreco' ));
            cb_image(__( 'Trust seal 2', 'elgreco' ),'tp_confidence_img_2','',$data,'',__( 'Recommended size: 150*60px', 'elgreco' ));
            cb_image(__( 'Trust seal 3', 'elgreco' ),'tp_confidence_img_3','',$data,'',__( 'Recommended size: 150*60px', 'elgreco' ));

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
        <h4><?php _e( 'Footer Tag Container', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_textarea('','tp_footer_script','',$data,'', __('Use this section to add or edit scripts that will be placed between tags <footer></footer> on your site.', 'elgreco'));

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>