<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( '404 Page Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_textarea(__( '404 Page Text', 'elgreco' ),'tp_404_text','',$data,'', '');
            cb_image(__( 'Background image (recommended size: 1920x1080)', 'elgreco' ),'tp_404_bgr','',$data,'','');
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>