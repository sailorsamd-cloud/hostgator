<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImg', [ 'label' => __( 'This image will be shown when you share a link to your store on social media. Recommended size: 1200*630px.', 'elgreco' ), 'name' => 'social_sharing', 'width' => 500 ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-social-sharing',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Social media section title', 'elgreco' ), 'name' => 's_title_social_box' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-social',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Feed title', 'elgreco' ), 'name' => 's_in_name_group' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Username', 'elgreco' ), 'name' => 's_in_name_api' ] );
$tmpl->addItem( 'custom', array('value' => '<a class="ads-button btn btn-blue ads-no" id="update_instagram_images">'.__( 'Update Instagram images', 'elgreco' ).'</a><span class="help-block">'.__( 'Use this button to update your Instagram images in Homepage widget', 'elgreco' ).'</span>'));
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-social-in',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Fan page link', 'elgreco' ), 'name' => 's_link_fb' ] );
$tmpl->addItem( 'switcher', array( 'label' => __( "Show 'Facebook like box' on Single product page", 'elgreco' ), 'help' => __( 'This like box will replace other social share icons', 'elgreco' ), 'name' => 'tp_share_fb'));
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-social-fb',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Facebook link', 'elgreco' ), 'name' => 's_link_fb_page' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Instagram link', 'elgreco' ), 'name' => 's_link_in_page' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Twitter link', 'elgreco' ), 'name' => 's_link_tw' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Pinterest link', 'elgreco' ), 'name' => 's_link_pt' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'YouTube link', 'elgreco' ), 'name' => 's_link_yt' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-social-link',$tmpl->renderItems());
?>

<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Social Sharing', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-sharing"></div>'
                ) );

//                $tmpl->renderPanel( array(
//                    'panel_title'   => __('Instagram Widget', 'elgreco'),
//                    'panel_class'   => 'success',
//                    'panel_description'   =>  '',
//                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-in"></div>'
//                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Facebook Widget', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-fb"></div>'
                ) );

				$tmpl->renderPanel( [
					'panel_title'   => __('Social Pages Links', 'elgreco'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-link"></div>'
				] );
				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
            </form>

        </div>
    </div>
</div>