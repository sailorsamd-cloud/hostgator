<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable pre-selected variation', 'elgreco' ), 'name' => 'tp_single_enable_pre_selected_variation' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable social share icons', 'elgreco' ), 'name' => 'tp_share' ] );
$tmpl->addItem( 'switcher', [ 'name' => 'tp_add_btn_sticky', 'label' => __( 'Enable sticky Add to cart button (mobile)', 'elgreco') ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Recommended products', 'elgreco' ), 'name' => 'tp_related' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Recently viewed products', 'elgreco' ), 'name' => 'tp_recently' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Size guide', 'elgreco' ), 'name' => 'tp_size_chart' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Image gallery under the main product image', 'elgreco' ), 'name' => 'tp_single_gallery_minis_bottom' ] );

$tmpl->addItem( 'switcher', [ 'label' => __( 'Redirect to Checkout when a product is added to cart', 'elgreco' ), 'name' => 'tp_direct_to_checkout', 'help' => __("Your customers will be redirected to Checkout when clicking 'Add to cart' if Side Shopping cart and Shopping cart (page) are disabled.", 'elgreco') ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Video display order in Gallery', 'elgreco' ), 'name' => 'video_order' ] );

$tmpl->addItem( 'switcher', [ 'label' => __( 'Add Featured Image to the Product Gallery', 'elgreco' ), 'name' => 'tp_single_feat_img' ] );





$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-single-product',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Tiled layout style', 'elgreco' ), 'name' => 'tp_single_tiled' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-single-product-style',$tmpl->renderItems());



$tmpl->addItem( 'select', [ 'label' => __( 'Product tab open by default', 'elgreco' ), 'name' => 'tp_tab_opened2' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Product details tab', 'elgreco' ), 'name' => 'tp_tab_item_details' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Product details tab label', 'elgreco' ), 'name' => 'tp_tab_item_details_label' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Item specifics tab', 'elgreco' ), 'name' => 'tp_tab_item_specifics' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Item specifics tab label', 'elgreco' ), 'name' => 'tp_tab_item_specifics_label' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Shipping and Payment tab', 'elgreco' ), 'name' => 'tp_tab_shipping' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Shipping and Payment tab label', 'elgreco' ), 'name' => 'tp_tab_shipping_label' ] );
$tmpl->addItem( 'textarea', [ 'label' => __( 'Shipping and Payment description', 'elgreco' ), 'name' => 'tp_single_shipping_payment_content' ] );

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Customer reviews block', 'elgreco' ), 'name' => 'tp_tab_reviews' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Customer reviews block label', 'elgreco' ), 'name' => 'tp_tab_reviews_label' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Write a review option', 'elgreco' ), 'name' => 'tp_enable_leave_review_box' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Terms & Conditions checkbox', 'elgreco' ), 'name' => 'cm_readonly' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Terms & Conditions', 'elgreco' ), 'name' => 'tp_readonly_read_required_text' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Error text', 'elgreco' ), 'name' => 'cm_readonly_notify' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Review date', 'elgreco' ), 'name' => 'tp_revdate' ] );

$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable Frequently Asked Questions tab', 'elgreco' ), 'name' => 'tp_tab_item_faqs'));
$tmpl->addItem( 'text', array( 'label' => __( 'Frequently Asked Questions tab', 'elgreco' ), 'name' => 'tp_faqs_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Frequently Asked Questions tab description', 'elgreco' ), 'name' => 'tp_faqs_text'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-faqs',$tmpl->renderItems());





$tmpl->addItem( 'switcher', [ 'label' => __( 'Show payment methods icons', 'elgreco' ), 'name' => 'tp_show_payment_methods' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Guaranteed safe checkout', 'elgreco' ), 'name' => 'tp_guarantee_safe' ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 1 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'single_payment_icons_1', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 2 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'single_payment_icons_2', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 3 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'single_payment_icons_3', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 4 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'single_payment_icons_4', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 5 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'single_payment_icons_5', 'width' => 45, 'height' => 30 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Image 6 (recommended size: 45*30px)', 'elgreco' ), 'name' => 'single_payment_icons_6', 'width' => 45, 'height' => 30 ] );


$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-methods',$tmpl->renderItems());







$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-add', 'name' =>'add', 'value' => __( 'Add', 'elgreco' ) ] );
$btnAdd = $tmpl->renderItems();

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$btn = $tmpl->renderItems();


/*about_us_tab*/
$tmpl->addItem( 'switcher', array( 'label' => __( 'Show About us tab', 'elgreco' ), 'name' => 'about_us_tab_enable', 'value'=>1));
$tmpl->addItem( 'text', array( 'label' => __( 'About us tab', 'elgreco' ), 'name' => 'about_us_tab_title'));

$t = $tmpl->renderItems();

$tmpl->addItem( 'text', array( 'label' => __( 'Title', 'elgreco' ).' #{{math @index "+" 1}} ' , 'name' => 'about_us_tab[item][{{@index}}][head]', 'value'=>'{{head}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Description', 'elgreco' ).' #{{math @index "+" 1}} ', 'name' => 'about_us_tab[item][{{@index}}][text]', 'value'=>'{{text}}'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image', 'elgreco' ).' #{{math @index "+" 1}} ', 'name' => 'about_us_tab[item][{{@index}}][img]', 'value'=>'{{img}}'));

$template = sprintf(
    '%2$s{{#each about_us_tab.item}}
	<div class="panel panel-success">
	<div class="panel-body">    
	%1$s
	</div> 
	</div> 
	{{/each}}%3$s',
    $tmpl->renderItems(),
    $t,
    $btn
);

$tmpl->template('ads-about_us_tab',$template);


$tmpl->addItem( 'switcher', [ 'label' => __( 'Add underlay to product background', 'elgreco' ), 'name' => 'single_underlay', 'value' =>1 ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Recommended products background color', 'elgreco' ), 'name' => 'single_bgr_recs' ] );


$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-undelay_single',$tmpl->renderItems());







?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php

                $tmpl->renderPanel( [
                    'panel_title'   => __('Single Product Page Style', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-single-product-style"></div>'
                ] );


				$tmpl->renderPanel( [
					'panel_title'   => __('Single Product Page Settings', 'elgreco'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-single-product"></div>'
				] );



                $tmpl->renderPanel( array(
                    'panel_title'   => __('Product Tabs Settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-faqs"></div>'
                ) );


                $tmpl->renderPanel( [
                    'panel_title'   => __('Payment Methods', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-methods"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('About Us tab', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-about_us_tab"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Underlay', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-undelay_single"></div>'
                ] );




                ?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>