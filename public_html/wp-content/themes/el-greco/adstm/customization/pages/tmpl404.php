<?php
$tmpl = new ads\adsTemplate();

$panel_one   = 'ads-panel_1';



$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Background image (recommended size: 1920x1080)', 'elgreco' ), 'name' => 'tp_404_bgr' ] );

$tmpl->addItem( 'textarea', [ 'label' => __('Text','elgreco'),'name' => 'tp_404_text' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template( $panel_one, $tmpl->renderItems() );


?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( [
					'panel_title'   => __('Page settings', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_one . '"></div>'
				] );
				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save Settings', 'elgreco' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>