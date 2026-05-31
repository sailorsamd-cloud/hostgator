<?php
$tmpl = new ads\adsTemplate();

$panel_one   = 'ads-panel_1';
$panel_two   = 'ads-panel_2';
$panel_three = 'ads-panel_3';
$panel_four  = 'ads-panel_4';
$panel_five  = 'ads-panel_5';
$panel_six   = 'ads-panel_6';

$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Subscription buttons color', 'rap' ), 'name' => 'blog_buttons'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Read more buttons color', 'rap' ), 'name' => 'blog_more'));

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Top full screen block background image (recommended size: 1920*300px)', 'rap' ), 'name' => 'blog_top_full_screen_block_img', 'width'=> 1920, 'height'=> 300));
$tmpl->addItem( 'textarea', array('label'=> __(' Top block title', 'rap'),'name' => 'blog_top_full_screen_block_title'));
$tmpl->addItem( 'textarea', array('label'=> __('Top block text', 'rap'),'name' => 'blog_top_full_screen_block_text'));
$tmpl->addItem( 'textarea', array('label'=> __('Subscription form settings for collecting users’ emails', 'rap'),'name' => 'blog_top_subscribe_form'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template( $panel_one, $tmpl->renderItems() );

$tmpl->addItem( 'switcher', array( 'label' => __('Show banner 1 on mobile','rap') , 'name' => 'blog_banner_mobile_show_1'));
$tmpl->addItem( 'textarea', array('label'=> __('banner 1 link', 'rap'),'name' => 'blog_banner_1'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template( $panel_two, $tmpl->renderItems() );

$tmpl->addItem( 'switcher', array( 'label' => __('Show banner 2 on mobile','rap') , 'name' => 'blog_banner_mobile_show_2'));
$tmpl->addItem( 'textarea', array('label'=> __('banner 2 link', 'rap'),'name' => 'blog_banner_2'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template( $panel_three, $tmpl->renderItems() );

$tmpl->addItem( 'switcher', array( 'label' => __('Show page separator 1','rap') , 'name' => 'blog_show_page_separator_1'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Background image of page separator 1 ( for desktop ) (recommended size: 1920*490px)', 'rap' ), 'name' => 'blog_page_separator_1_img_desktop', 'width'=> 1920, 'height'=> 490));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Background image of page separator 1 ( for mobile ) (recommended size: 640*600px)', 'rap' ), 'name' => 'blog_page_separator_1_img_mobile', 'width'=> 640, 'height'=> 600));
$tmpl->addItem( 'textarea', array('label'=> __('Title of page separator 1', 'rap'),'name' => 'blog_page_separator_1_title'));
$tmpl->addItem( 'textarea', array('label'=> __('Text of page separator 1', 'rap'),'name' => 'blog_page_separator_1_text'));
$tmpl->addItem( 'textarea', array('label'=> __('Button text of page separator 1', 'rap'),'name' => 'blog_page_separator_1_btn_text'));
$tmpl->addItem( 'textarea', array('label'=> __('Button link of page separator 1', 'rap'),'name' => 'blog_page_separator_1_btn_link'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template( $panel_four, $tmpl->renderItems() );

$tmpl->addItem( 'switcher', array( 'label' => __('Show page separator 2','rap') , 'name' => 'blog_show_page_separator_2'));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Background image of page separator 2 ( for desktop ) (recommended size: 1920*490px)', 'rap' ), 'name' => 'blog_page_separator_2_img_desktop', 'width'=> 1920, 'height'=> 490));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Background image of page separator 2 ( for mobile ) (recommended size: 640*600px)', 'rap' ), 'name' => 'blog_page_separator_2_img_mobile', 'width'=> 640, 'height'=> 600));
$tmpl->addItem( 'textarea', array('label'=> __('Title of page separator 2', 'rap'),'name' => 'blog_page_separator_2_title'));
$tmpl->addItem( 'textarea', array('label'=> __('Text of page separator 2', 'rap'),'name' => 'blog_page_separator_2_text'));
$tmpl->addItem( 'textarea', array('label'=> __('Button text of page separator 2', 'rap'),'name' => 'blog_page_separator_2_btn_text'));
$tmpl->addItem( 'textarea', array('label'=> __('Button link of page separator 2', 'rap'),'name' => 'blog_page_separator_2_btn_link'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template( $panel_five, $tmpl->renderItems() );

$tmpl->addItem( 'switcher', array( 'label' => __('Show bottom subscribe block','rap') , 'name' => 'blog_show_bottom_subscribe'));
$tmpl->addItem( 'textarea', array('label'=> __('Title of bottom subscribe block', 'rap'),'name' => 'blog_bottom_subscribe_title'));
$tmpl->addItem( 'textarea', array('label'=> __('Text of bottom subscribe block', 'rap'),'name' => 'blog_bottom_subscribe_text'));
$tmpl->addItem( 'textarea', array('label'=> __('Button text of bottom subscribe block', 'rap'),'name' => 'blog_bottom_subscribe_btn_text'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template( $panel_six, $tmpl->renderItems() );

?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( array(
					'panel_title'   => __('Top block', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_one . '"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Banner 1', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_two . '"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Banner 2', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_three . '"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Page separator 1', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_four . '"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Page separator 2', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_five . '"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Bottom subscribe block', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#' . $panel_six . '"></div>'
				) );
				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
			</form>

		</div>
	</div>
</div>