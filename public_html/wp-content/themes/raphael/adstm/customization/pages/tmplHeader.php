<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Website logo (recommended size: 262*64px)', 'rap' ), 'name' => 'tp_logo_img', 'width'=> 262, 'height'=> 64, 'crop_name'=> 'logo'));
//->addItem( 'uploadImgCrop', array( 'label' => __( 'Customize an additional image (recommended size 91*29px)', 'rap' ),'help'=>__('Usually used for trusted seals, payment system logos, etc.', 'rap'), 'name' => 'tp_img_left_cart', 'width'=> 91, 'height'=> 29, 'crop_name'=> 'secured'));
$tmpl->addItem( 'text', array( 'label' => __( 'Custom text', 'rap' ), 'name' => 'tp_text_top_header'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Custom icon (recommended size: 20*20px)', 'rap' ), 'name' => 'shipping_icon'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-header',$tmpl->renderItems());
?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( array(
					'panel_title'   => '',
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-header"></div>'
				) );

				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
			</form>

		</div>
	</div>
</div>