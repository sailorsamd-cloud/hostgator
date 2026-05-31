<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Social Sharing', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_image(__( 'This image will be shown when you share a link to your store on social media.', 'elgreco' ),'social_sharing','',$data,'',__( ' Recommended size: 1200*630px.', 'elgreco' ),'');
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>

<!--<form action="live_cstm_save" class="live_cstm_save">-->
<!--    <div class="fields_block">-->
<!--        <h4>--><?php //_e( 'Instagram Widget', 'elgreco' ); ?><!--</h4>-->
<!--        <div class="fields_cont">-->
<!--            --><?php
//            cb_input(__( 'Heading', 'elgreco' ),'s_in_name_group','',$data,'', '', '', '');
//            cb_input(__( 'Username', 'elgreco' ),'s_in_name_api','',$data,'', '', '', '');
//            ?>
<!--            <div class="update_insta_block">-->
<!--                <div class="btn btn-blue" id="update_instagram_images">--><?php //_e( 'Update Instagram images', 'elgreco' ); ?><!--</div>-->
<!--            </div>-->
<!--            <div class="save_block">-->
<!--                <input type="submit" value="--><?php //_e( 'Save Settings', 'elgreco' ); ?><!--" class="btn btn-green">-->
<!--                <div class="btn btn-blue get_default">--><?php //_e( 'Default', 'elgreco' ); ?><!--</div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->

<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Facebook Widget', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( "Show 'Facebook like box' on Single product page", 'elgreco' ),'tp_share_fb','',$data,'',  __( 'This like box will replace other social share icons', 'elgreco' ));
            cb_input(__( 'Fan page link', 'elgreco' ),'s_link_fb','',$data);

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
        <h4><?php _e( 'Social Pages Links', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_input(__( 'Facebook link', 'elgreco' ),'s_link_fb_page','',$data,'', '', '', '');
            cb_input(__( 'Instagram link', 'elgreco' ),'s_link_in_page','',$data,'', '', '', '');
            cb_input(__( 'X link', 'elgreco' ),'s_link_tw','',$data,'', '', '', '');
            cb_input(__( 'Pinterest link', 'elgreco' ),'s_link_pt','',$data,'', '', '', '');
            cb_input(__( 'YouTube link', 'elgreco' ),'s_link_yt','',$data,'', '', '', '');

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>