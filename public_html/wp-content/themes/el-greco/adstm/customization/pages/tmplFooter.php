<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Footer background color', 'elgreco' ), 'name' => 'footer_background_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Footer titles color', 'elgreco' ), 'name' => 'footer_title_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Footer text color', 'elgreco' ), 'name' => 'footer_text_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Footer links color', 'elgreco' ), 'name' => 'footer_links_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Footer links color (hover)', 'elgreco' ), 'name' => 'footer_links_color_hover' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Footer copyright color', 'elgreco' ), 'name' => 'footer_copyright_color' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('footer-color',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show back-to-top button', 'elgreco' ), 'name' => 'tp_enable_upbutton' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('back-to-top',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #1', 'elgreco' ), 'name' => 'tp_footer_menu_title_1' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #2', 'elgreco' ), 'name' => 'tp_footer_menu_title_2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #3', 'elgreco' ), 'name' => 'tp_footer_menu_title_3' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #4', 'elgreco' ), 'name' => 'tp_footer_menu_title_4' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('footer-menu',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'name' => 'tp_copyright' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-copyright',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Contact phone', 'elgreco' ), 'name' => 'tp_header_phone' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Contact email', 'elgreco' ), 'name' => 'tp_header_email' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Address', 'elgreco' ), 'name' => 'tp_address' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-contact-details',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show payment methods icons', 'elgreco' ), 'name' => 'tp_footer_payment_methods' ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 1 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'tp_footer_1', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 2 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'tp_footer_2', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 3 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'tp_footer_3', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 4 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'tp_footer_4', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 5 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'tp_footer_5', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 6 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'tp_footer_6', 'width' => 45, 'height' => 30 ] );


$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-methods',$tmpl->renderItems());



$tmpl->addItem( 'textarea', [ 'help' =>__('Use this section to add or edit scripts that will be placed between tags <footer></footer> on your site.', 'elgreco'), 'name' => 'tp_footer_script' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-script',$tmpl->renderItems());


$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Trust seals', 'elgreco' ), 'name' => 'tp_footer_trust_seals' ] );
$tmpl->addItem( 'text', array( 'label' => __( 'Description', 'elgreco' ), 'name' => 'tp_confidence'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Trust seal #1 (recommended size: 150*60px)', 'elgreco' ), 'name' => 'tp_confidence_img_1'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Trust seal #2 (recommended size: 150*60px)', 'elgreco' ), 'name' => 'tp_confidence_img_2'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Trust seal #3 (recommended size: 150*60px)', 'elgreco' ), 'name' => 'tp_confidence_img_3'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-confidence',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php

                $tmpl->renderPanel( [
                    'panel_title'   => __('Footer color settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#footer-color"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Footer menu settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#footer-menu"></div>'
                ] );


                $tmpl->renderPanel( [
                    'panel_title'   => __('Back-to-top', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#back-to-top"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Copyright', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-copyright"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Contact details', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-contact-details"></div>'
                ] );


                $tmpl->renderPanel( [
                    'panel_title'   => __('Payment methods', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-methods"></div>'
                ] );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Trust seals', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-confidence"></div>'
                ) );


				$tmpl->renderPanel( [
					'panel_title'   => __('Footer Tag Container', 'elgreco'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-script"></div>'
				] );

				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>