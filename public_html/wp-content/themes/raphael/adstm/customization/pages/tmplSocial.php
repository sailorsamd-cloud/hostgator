<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImg', [ 'label' => __( 'This image will be shown when you share a link to your store on social media. Recommended size: 1200*630px.', 'rap' ), 'name' => 'social_sharing', 'width' => 500 ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'rap' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'rap' ) ] );
$tmpl->template('ads-social-sharing',$tmpl->renderItems());

$tmpl->addItem( 'text', array( 'label' => __( 'Social media section title', 'rap' ), 'name' => 's_title_social_box'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-social',$tmpl->renderItems());

$tmpl->addItem( 'text', array( 'label' => __( 'Widget title', 'rap' ), 'name' => 's_in_name_group'));
$tmpl->addItem( 'text', array( 'label' => __( 'Username', 'rap' ), 'name' => 's_in_name_api'));
$tmpl->addItem( 'custom', array('value' => '<a class="ads-button btn btn-blue ads-no" id="update_instagram_images">'.__( 'Update Instagram images', 'rap' ).'</a><span class="help-block">'.__( 'Use this button to update your Instagram images in Homepage widget', 'rap' ).'</span>'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-social-in',$tmpl->renderItems());

$tmpl->addItem( 'text', array( 'label' => __( 'Fan page link', 'rap' ), 'name' => 's_link_fb'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-social-fb',$tmpl->renderItems());

$tmpl->addItem( 'text', array( 'label' => __( 'Facebook link', 'rap' ), 'name' => 's_link_fb_page'));
$tmpl->addItem( 'text', array( 'label' => __( 'Instagram link', 'rap' ), 'name' => 's_link_in_page'));
$tmpl->addItem( 'text', array( 'label' => __( 'Twitter link', 'rap' ), 'name' => 's_link_tw'));
$tmpl->addItem( 'text', array( 'label' => __( 'Pinterest link', 'rap' ), 'name' => 's_link_pt'));
$tmpl->addItem( 'text', array( 'label' => __( 'YouTube link', 'rap' ), 'name' => 's_link_yt'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-social-link',$tmpl->renderItems());
?>

<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
/*				$tmpl->renderPanel( array(
					'panel_title'   => __('Social Media Settings', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social"></div>'
				) );*/

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Social Sharing', 'rap'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-sharing"></div>'
                ) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Instagram Widget', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-in"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Facebook Widget', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-fb"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Social Pages Links', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-social-link"></div>'
				) );
				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
            </form>

        </div>
    </div>
</div>