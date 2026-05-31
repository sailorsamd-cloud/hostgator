<?php
$tmpl = new ads\adsTemplate();

//$tmpl->addItem( 'custom', [
//	'value' =>sprintf('<div class="form-group"><label style="display: block" for="tp_create">%1$s</label><button class="btn btn-blue" name="tp_create" value="true">%2$s</button></div>',
//    __('Add default pages and menus', 'elgreco'),
//    __('Create', 'elgreco')
//)
//] );

$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Favicon png, gif (recommended size: 32*32px)', 'elgreco' ), 'name' => 'tp_favicon', 'width' => 32, 'height' => 32, 'crop_name' => 'favicon' ] );


//$tmpl->addItem( 'switcher', [ 'name' => 'tp_infinite', 'value' => 1, 'label' => __( "Enable infinite scroll", 'elgreco') ] );



$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable currency switcher', 'elgreco' ), 'name' => 'tp_currency_switcher'));
$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable one-page checkout', 'elgreco' ), 'name' => 'sc_one_page_enable'));




//$tmpl->addItem( 'switcher', [ 'name' => 'tp_show_reviews', 'value' => 1, 'label' => __( 'Show number of reviews on Homepage and Category page', 'elgreco') ] );



$tmpl->addItem( 'switcher', [ 'label' => __( 'Show breadcrumbs', 'elgreco' ), 'name' => 'tp_show_breadcrumbs' ] );



$tmpl->template('ads-general', $tmpl->renderItems() );



$tmpl->addItem( 'switcher', [ 'name' => 'tp_show_discount', 'value' => 1, 'label' => __( 'Show discount badges on products', 'elgreco') ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show star rating on Homepage and Category page', 'elgreco' ), 'name' => 'tp_show_stars' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Additional product details on Homepage and Category page', 'elgreco' ), 'name' => 'tp_show_reviews_orders1' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show one product per row on Homepage and Category page (mobile)', 'elgreco' ), 'name' => 'tp_2_per_row_mob' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable \'sort by discount\' option', 'elgreco' ), 'name' => 'tp_show_sort_discount' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Load more products on Category page', 'elgreco' ), 'name' => 'tp_paging_type' ] );
$tmpl->addItem( 'switcher', [ 'name' => 'tp_classic_pager_mode', 'label' => __( 'Use classic pagination', 'elgreco') ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show image title', 'elgreco' ), 'name' => 'tp_image_title' ] );



$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-product-settings', $tmpl->renderItems());

//$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Template color', 'elgreco' ), 'name' => 'tp_color' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Main menu hover color (desktop)', 'elgreco' ), 'name' => 'main_menu_hover' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Buttons color', 'elgreco' ), 'name' => 'buttons_default' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Buttons color (hover)', 'elgreco' ), 'name' => 'buttons_default_hover' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Link color', 'elgreco' ), 'name' => 'link_default' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Link color (hover)', 'elgreco' ), 'name' => 'link_default_hover' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Discount badges color', 'elgreco' ), 'name' => 'tp_discount_bg_color' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Prices color', 'elgreco' ), 'name' => 'tp_price_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Cart/Payment buttons color', 'elgreco' ), 'name' => 'tp_cart_pay_btn_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Cart/Payment buttons color (hover)', 'elgreco' ), 'name' => 'tp_cart_pay_btn_color_hover' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Star rating color', 'elgreco' ), 'name' => 'tp_star_color' ] );







$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-color', $tmpl->renderItems());


$tmpl->addItem( 'switcher', [ 'name' => 'tp_do_rtl', 'value' => 1, 'label' => __( 'Enable RTL layout', 'elgreco') ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-rtl', $tmpl->renderItems());

$tmpl->addItem( 'select', [ 'label' => __( 'Choose a font', 'elgreco' ), 'name' => 'add_fonts3' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-fonts', $tmpl->renderItems());


$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Image LazyLoad', 'elgreco' ), 'name' => 'tp_item_imgs_lazy_load', 'help' => __( 'Load images only on some user interactions (i.e. scrolling)', 'elgreco' )] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Gutenberg block library CSS', 'elgreco' ), 'name' => 'tp_gutenberg_block_library', 'help' => __( 'Remove Gutenberg code library to make your website load faster if you don\'t use this editor', 'elgreco' ) ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable jQuery Migrate', 'elgreco' ), 'name' => 'tp_jquery_migrate', 'help' => __( 'Most plugins use the latest versions of jQuery and don\'t require compatibility with older versions (i.e. migration)', 'elgreco' ) ] );


$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );


$tmpl->template('ads-performance', $tmpl->renderItems() );


?>

<div class="wrap">
	<div class="row">
		<div class="col-md-29">
            <form id="custom_form" method="POST">
                <?php
                wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
                <?php
                $tmpl->renderPanel( [
	                'panel_title'   => __('General Settings', 'elgreco'),
	                'panel_class'   => 'success',
	                'panel_description'   =>  '',
	                'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-general"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __( 'Product Settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-product-settings"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __( 'Template Colors', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-color"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __( 'Right-to-Left layout', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-rtl"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __( 'Font Settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-fonts"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Performance', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-performance"></div>'
                ] );
                ?>
                <button form="custom_form" class="btn btn-save btn-green no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default no-ads" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
            </form>

		</div>
	</div>
</div>