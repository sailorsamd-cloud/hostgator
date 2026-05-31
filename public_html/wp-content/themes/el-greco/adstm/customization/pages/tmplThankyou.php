<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Customize background image (recommended size: 1920*550px)', 'elgreco' ), 'name' => 'tp_bg_thankyou', 'width' => 1920, 'height' => 550, 'crop_name' => 'thankyou' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Customize title', 'elgreco' ), 'name' => 'tp_thankyou_fail_no_head' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Customize text', 'elgreco' ), 'name' => 'tp_thankyou_fail_no_text' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Insert here a script to track your conversion rate', 'elgreco' ), 'name' => 'tp_thankyou_fail_no_head_tag' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-thank-success',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Customize title', 'elgreco' ), 'name' => 'tp_thankyou_fail_yes_head' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Customize text', 'elgreco' ), 'name' => 'tp_thankyou_fail_yes_text' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Insert here a script to track your conversion rate', 'elgreco' ), 'name' => 'tp_thankyou_fail_yes_head_tag' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-thank-fail',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( [
					'panel_title'   => __('Thank You Page Settings When Payment is Successful', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-thank-success"></div>'
				] );

				$tmpl->renderPanel( [
					'panel_title'   => __('Thank You Page Settings When Payment is Failed', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-thank-fail"></div>'
				] );

				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>