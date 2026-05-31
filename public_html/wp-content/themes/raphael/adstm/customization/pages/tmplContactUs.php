<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'text', array( 'label' => __( 'Contact email', 'rap' ), 'name' => 's_mail'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Paste your ‘Autoresponder’ code here', 'rap' ), 'name' => 'tp_contactUs_text'));
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Terms & Conditions checkbox', 'rap' ), 'name' => 'cm_readonly2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Terms & Conditions', 'rap' ), 'name' => 'tp_readonly_read_required_text2' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Error text', 'rap' ), 'name' => 'cm_readonly_notify2' ] );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-contact-us',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( array(
					'panel_title'   => __('Contact Us Page Settings', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-contact-us"></div>'
				) );

				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
			</form>

		</div>
	</div>
</div>