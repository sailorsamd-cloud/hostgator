<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Logo (recommended size: 262*64px)', 'rap' ), 'name' => 'tp_footer_logo_img', 'width'=> 262, 'height'=> 64, 'crop_name'=> 'logo'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-footer-logo',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #1', 'rap' ), 'name' => 'tp_footer_menu_title_1' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #2', 'rap' ), 'name' => 'tp_footer_menu_title_2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #3', 'rap' ), 'name' => 'tp_footer_menu_title_3' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Footer title #4', 'rap' ), 'name' => 'tp_footer_menu_title_4' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'rap' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'rap' ) ] );
$tmpl->template('footer-menu',$tmpl->renderItems());

$tmpl->addItem( 'switcher', array( 'label' => __( 'Show payment methods icons', 'rap' ), 'name' => 'tp_footer_payment_methods'));
$tmpl->addItem( 'text', array(  'name' => 'tp_payment_methods'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image 1 (recommended size: 45*30px)', 'rap' ), 'name' => 'tp_footer_payment_methods_1', 'width'=> 45, 'height'=> 30));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image 2 (recommended size: 45*30px)', 'rap' ), 'name' => 'tp_footer_payment_methods_2', 'width'=> 45, 'height'=> 30));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image 3 (recommended size: 45*30px)', 'rap' ), 'name' => 'tp_footer_payment_methods_3', 'width'=> 45, 'height'=> 30));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image 4 (recommended size: 45*30px)', 'rap' ), 'name' => 'tp_footer_payment_methods_4', 'width'=> 45, 'height'=> 30));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image 5 (recommended size: 45*30px)', 'rap' ), 'name' => 'tp_footer_payment_methods_5', 'width'=> 45, 'height'=> 30));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image 6 (recommended size: 45*30px)', 'rap' ), 'name' => 'tp_footer_payment_methods_6', 'width'=> 45, 'height'=> 30));

//$tmpl->addItem( 'switcher', array( 'label' => __( 'Delivery methods', 'rap' ), 'name' => 'tp_footer_delivery_methods'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-methods',$tmpl->renderItems());



$tmpl->addItem( 'text', array( 'label' => __( 'Description', 'rap' ), 'name' => 'tp_confidence'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Trust seal #1 (recommended size: 300*120px)', 'rap' ), 'name' => 'tp_confidence_img_1', 'width'=> 300, 'height'=> 120, 'crop_name'=> 'confidence1'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Trust seal #1 (recommended size: 300*120px)', 'rap' ), 'name' => 'tp_confidence_img_2', 'width'=> 300, 'height'=> 120, 'crop_name'=> 'confidence2'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Trust seal #1 (recommended size: 300*120px)', 'rap' ), 'name' => 'tp_confidence_img_3', 'width'=> 300, 'height'=> 120, 'crop_name'=> 'confidence3'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-confidence',$tmpl->renderItems());


$tmpl->addItem( 'text', array(  'name' => 'tp_copyright'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-copyright',$tmpl->renderItems());

$tmpl->addItem( 'text', array( 'label' => __( 'Contact phone', 'rap' ), 'name' => 'tp_header_phone'));
$tmpl->addItem( 'text', array( 'label' => __( 'Contact email', 'rap' ), 'name' => 'tp_header_email'));
$tmpl->addItem( 'text', array(  'label' => __( 'Address', 'rap' ), 'name' => 'tp_address'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-contact-details',$tmpl->renderItems());

$tmpl->addItem( 'textarea', array( 'help'=>__('Use this section to add or edit scripts that will be placed between tags <footer></footer> on your site.', 'rap'), 'name' => 'tp_footer_script'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-script',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
/*				$tmpl->renderPanel( array(
					'panel_title'   => __('Footer Page Settings', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-footer-logo"></div>'
				) );*/

				$tmpl->renderPanel( array(
					'panel_title'   => __('Payment methods', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-methods"></div>'
				) );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Footer menu settings', 'rap'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#footer-menu"></div>'
                ] );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Trust seals', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-confidence"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Copyright', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-copyright"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Contact details', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-contact-details"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Footer Tag Container', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-script"></div>'
				) );

				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
			</form>

		</div>
	</div>
</div>