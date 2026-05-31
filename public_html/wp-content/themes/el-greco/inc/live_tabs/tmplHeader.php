<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Header', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_image('Logo','tp_logo_img','',$data,'','');
            cb_checkbox(__( 'Enable sticky header (desktop)', 'elgreco' ),'tp_sticky_header','',$data);
            cb_checkbox(__( 'Enable sticky header (mobile and tablet)', 'elgreco' ),'tp_sticky_header_mob','',$data);
            cb_select(__( 'Header behavior', 'elgreco' ),'header_behavior', $data, $data)
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
        <h4><?php _e( 'Color Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_color_picker(__( 'Header background color', 'elgreco' ),'tp_header_bgr','',$data,'');
            cb_color_picker(__( 'Header elements color', 'elgreco' ),'tp_header_color','',$data,'');
            cb_color_picker(__( 'Header elements hover color', 'elgreco' ),'tp_header_color_hover','',$data,'');
            cb_color_picker(__( 'Main menu background color', 'elgreco' ),'tp_menu_bgr','',$data,'');
            cb_color_picker(__( 'Main menu items color', 'elgreco' ),'tp_menu_color','',$data,'');
            cb_color_picker(__( 'Main menu items hover color', 'elgreco' ),'tp_menu_color_hover','',$data,'');
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>