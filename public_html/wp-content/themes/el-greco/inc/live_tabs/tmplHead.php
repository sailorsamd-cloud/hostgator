<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Scripts and CSS Styles', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_textarea('<head> tag container','tp_head','',$data,'', __('Use this section to add or edit scripts that will be placed between tags <head></head> on your site.', 'elgreco'));
            cb_textarea('Custom CSS snippets','tp_style','',$data,'', __('Use this section to add or edit CSS for different objects.', 'elgreco'));
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>