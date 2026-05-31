<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Background image (recommended size: 1920*440px)', 'elgreco' ), 'name' => 'tp_bg1_about', 'width' => 1920, 'height' => 440, 'crop_name' => 'bgabout' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Title', 'elgreco' ), 'name' => 'tp_about_b1_title' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Description', 'elgreco' ), 'name' => 'tp_about_b1_description' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );

$tmpl->template('ads-block1',$tmpl->renderItems());


$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable this block', 'elgreco' ), 'name' => 'tp_about_us_keep' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Title', 'elgreco' ), 'name' => 'tp_about_us_keep_in_contact_title' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Description', 'elgreco' ), 'name' => 'tp_about_us_keep_in_contact_description' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-block2',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable this block', 'elgreco' ), 'name' => 'tp_our_core_values' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Title', 'elgreco' ), 'name' => 'tp_our_core_values_title' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Value 1', 'elgreco' ), 'name' => 'tp_our_core_values_value1' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Value 2', 'elgreco' ), 'name' => 'tp_our_core_values_value2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Value 3', 'elgreco' ), 'name' => 'tp_our_core_values_value3' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Value 4', 'elgreco' ), 'name' => 'tp_our_core_values_value4' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Value 5', 'elgreco' ), 'name' => 'tp_our_core_values_value5' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-block3',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable this block', 'elgreco' ), 'name' => 'tp_our_partners' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Title', 'elgreco' ), 'name' => 'tp_our_partners_title' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Description', 'elgreco' ), 'name' => 'tp_our_partners_description' ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 1 (recommended size: 30px)', 'elgreco' ), 'name' => 'tp_about_delivery_1', 'width' => 'auto', 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 2 (recommended size: 30px)', 'elgreco' ), 'name' => 'tp_about_delivery_2', 'width' => 'auto', 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 3 (recommended size: 30px)', 'elgreco' ), 'name' => 'tp_about_delivery_3', 'width' => 'auto', 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 4 (recommended size: 30px)', 'elgreco' ), 'name' => 'tp_about_delivery_4', 'width' => 'auto', 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 5 (recommended size: 30px)', 'elgreco' ), 'name' => 'tp_about_delivery_5', 'width' => 'auto', 'height' => 30 ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-block4',$tmpl->renderItems());

?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( [
					'panel_title'   => __('About Us Page Settings', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-block1"></div>'
				] );

				$tmpl->renderPanel( [
					'panel_title' => __('Our Core Values', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-block3"></div>'
				] );

				$tmpl->renderPanel( [
					'panel_title'   => __('Keep In Contact With Us', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-block2"></div>'
				] );

				$tmpl->renderPanel( [
                    'panel_title' => __('Our Partners', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-block4"></div>'
				] );

				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
				<button form="custom_form" class="btn js-save-default btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>