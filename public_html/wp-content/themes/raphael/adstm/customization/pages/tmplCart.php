<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'switcher', array( 'label' => __( 'Make phone number field as required', 'rap' ), 'name' => 'tp_phone_number_required'));
$tmpl->addItem( 'switcher', array( 'label' => __( 'Make leave your comments field as required', 'rap' ), 'name' => 'tp_description_required'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-fields-options',$tmpl->renderItems());


$tmpl->addItem( 'switcher', array( 'label' => __( 'Show Terms & Conditions checkbox', 'rap' ), 'name' => 'tp_readonly_read_required'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Text', 'rap' ), 'name' => 'tp_readonly_read_required_text'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-conditions',$tmpl->renderItems());


$tmpl->addItem( 'switcher', array( 'label' => __( 'Show the message about PayPal payment method at checkout', 'rap' ), 'name' => 'tp_paypal_info_enable'));
$tmpl->addItem( 'text', array( 'label' => __( 'Additional information for PayPal payment method', 'rap' ), 'name' => 'tp_paypal_info_text'));

$tmpl->addItem( 'switcher', array( 'label' => __( 'Show the message about Credit Card payment method at checkout', 'rap' ), 'name' => 'tp_credit_card_info_enable'));
$tmpl->addItem( 'text', array( 'label' => __( 'Additional information for Credit Cards payment method', 'rap' ), 'name' => 'tp_credit_card_info_text'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-additional',$tmpl->renderItems());

$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable shop with confidence section', 'rap' ), 'name' => 'sidebar_safe_shopping_guarantee_show'));
$tmpl->addItem( 'text', array( 'label' => __( 'Title', 'rap' ), 'name' => 'sidebar_safe_shopping_guarantee'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Customize image #1 (recommended size: 123*53px)', 'rap' ), 'name' => 'sidebar_safe_shopping_guarantee_img_1','width'=> 123, 'height'=> 53, 'crop_name'=> 'safe1'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Customize image #2 (recommended size: 123*53px)', 'rap' ), 'name' => 'sidebar_safe_shopping_guarantee_img_2','width'=> 123, 'height'=> 53, 'crop_name'=> 'safe2'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Customize image #3 (recommended size: 123*53px)', 'rap' ), 'name' => 'sidebar_safe_shopping_guarantee_img_3','width'=> 123, 'height'=> 53, 'crop_name'=> 'safe3'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-sidebar',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( array(
					'panel_title'   => __('Required Fields', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-fields-options"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Terms & Conditions Checkbox Settings', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-conditions"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Additional Information', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-additional"></div>'
				) );

				$tmpl->renderPanel( array(
					'panel_title'   => __('Sidebar', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-sidebar"></div>'
				) );

				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
			</form>

		</div>
	</div>
</div>