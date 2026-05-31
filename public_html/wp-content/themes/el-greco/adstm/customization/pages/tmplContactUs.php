<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'text', [ 'label' => __( 'Contact email', 'elgreco' ), 'name' => 's_mail' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Contact information', 'elgreco' ), 'name' => 'tp_contactUs_text' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Terms & Conditions checkbox', 'elgreco' ), 'name' => 'cm_readonly2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Terms & Conditions', 'elgreco' ), 'name' => 'tp_readonly_read_required_text2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Error text', 'elgreco' ), 'name' => 'cm_readonly_notify2' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-contact-us',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( [
					'panel_title'   => __('Contact Us Page Settings', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-contact-us"></div>'
				] );

				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>

			</form>

		</div>
	</div>
</div>