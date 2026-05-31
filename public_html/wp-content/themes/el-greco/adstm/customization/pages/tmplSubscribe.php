<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'switcher', array( 'label' => __( 'Show subscription form', 'elgreco' ), 'name' => 'tp_subscribe_show'));
$tmpl->addItem( 'textarea', [ 'name' => 'tp_subscribe' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-subscription',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( [
					'panel_title'   => __('Subscription Form Settings', 'elgreco'),
					'panel_class'   => 'success',
					'panel_description'   =>  __('Subscription form settings for collecting users’ emails', 'elgreco'),
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-subscription"></div>'
				] );

				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>