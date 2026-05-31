<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Favicon png, gif (recommended size: 32*32px)', 'rap' ), 'name' => 'tp_favicon'));
$tmpl->addItem( 'switcher', array( 'name' => 'tp_show_discount', 'value'=> 1, 'label' => __( 'Show discount badges on products', 'rap') ) );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Image LazyLoad', 'rap' ), 'name' => 'tp_item_imgs_lazy_load' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable \'sort by discount\' option', 'rap' ), 'name' => 'tp_show_sort_discount' ] );
$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable currency switcher', 'rap' ), 'name' => 'tp_currency_switcher'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-general', $tmpl->renderItems() );

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-contact', $tmpl->renderItems());

$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Template color', 'rap' ), 'name' => 'tp_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Additional headings', 'rap' ), 'name' => 'tp_color_additional'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Cart icon color', 'rap' ), 'name' => 'cart_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Cart icon color (hover)', 'rap' ), 'name' => 'cart_color_hover'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Menu hover color', 'rap' ), 'name' => 'tp_menu_hover_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Discount color', 'rap' ), 'name' => 'tp_discount_bg_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Prices color', 'rap' ), 'name' => 'tp_price_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Cart/Payment buttons color', 'rap' ), 'name' => 'tp_cart_pay_btn_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Cart/Payment buttons color (hover)', 'rap' ), 'name' => 'tp_cart_pay_btn_color_hover'));

$tmpl->addItem( 'colorpicker', array( 'label' => __( 'About us/Review buttons color', 'rap' ), 'name' => 'about_review_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'About us/Review buttons color (hover)', 'rap' ), 'name' => 'about_review_color_hover'));

$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Subscription buttons color', 'rap' ), 'name' => 'login_subscription_color'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-color', $tmpl->renderItems());
?>
<div class="wrap">
	<div class="row">
		<div class="col-md-29">
            <form id="custom_form" method="POST">
                <?php
                wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
                <?php
                $tmpl->renderPanel( array(
	                'panel_title'   => __('General Settings', 'rap'),
	                'panel_class'   => 'success',
	                'panel_description'   =>  '',
	                'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-general"></div>'
                ) );
                $tmpl->renderPanel( array(
                    'panel_title'   => 'Template Colors',
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-color"></div>'
                ) );

                ?>
                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
                <button form="custom_form" class="btn btn-default no-ads" name="default"><?php _e( 'Default', 'rap' ) ?></button>
            </form>

		</div>
	</div>
</div>