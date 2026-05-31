<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Website Logo (recommended size: 250*50px)', 'elgreco' ), 'name' => 'tp_logo_img', 'width' => 250, 'height' => 50, 'crop_name' => 'logo' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable sticky header (desktop)', 'elgreco' ), 'name' => 'tp_sticky_header' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable sticky header (mobile and tablet)', 'elgreco' ), 'name' => 'tp_sticky_header_mob' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Header behavior', 'elgreco' ), 'name' => 'header_behavior' ] );


$tmpl->addItem( 'text', [ 'label' => __( 'Website wordmark (optional)', 'elgreco' ), 'name' => 'tp_logo_text' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Choose a Logo font', 'elgreco' ), 'name' => 'custom_font' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable bold text Logo', 'elgreco' ), 'name' => 'tp_bold_logo_text' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Website wordmark color (optional)', 'elgreco' ), 'name' => 'tp_logo_text_color' ] );



$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-header',$tmpl->renderItems());


$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Header background color', 'elgreco' ), 'name' => 'tp_header_bgr' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Header elements color', 'elgreco' ), 'name' => 'tp_header_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Header elements hover color', 'elgreco' ), 'name' => 'tp_header_color_hover' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Main menu background color', 'elgreco' ), 'name' => 'tp_menu_bgr' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Main menu items color', 'elgreco' ), 'name' => 'tp_menu_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Main menu items hover color', 'elgreco' ), 'name' => 'tp_menu_color_hover' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-headercolor',$tmpl->renderItems());





?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( [
					'panel_title'   => '',
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-header"></div>'
				] );

                $tmpl->renderPanel( [
                    'panel_title'   => 'Color Settings',
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-headercolor"></div>'
                ] );



				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>