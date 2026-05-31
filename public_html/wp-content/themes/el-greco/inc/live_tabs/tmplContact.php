<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Contact Us Page Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_input(__( 'Contact email', 'elgreco' ),'s_mail','',$data,'', '', '', '');
            cb_textarea(__( 'Contact information', 'elgreco' ),'tp_contactUs_text','',$data,'', '');
            cb_checkbox(__( 'Show Terms & Conditions checkbox', 'elgreco' ),'cm_readonly2','',$data);
            cb_textarea(__( 'Terms & Conditions', 'elgreco' ),'tp_readonly_read_required_text2','',$data);
            cb_input(__( 'Error text', 'elgreco' ),'cm_readonly_notify2','',$data);

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>