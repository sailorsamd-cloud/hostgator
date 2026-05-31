<?php
$tmpl = new ads\adsTemplate();


$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$btn = 	$tmpl->renderItems();

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-add','name'=>'add', 'value' => __( 'Add', 'elgreco' ) ) );
$btnAdd = $tmpl->renderItems();


$tmpl->addItem( 'switcher', array( 'label' => __('Enable trust box','elgreco') , 'name' => 'tp_trust_box_enable'));
$tmpl->addItem( 'text', array( 'label' => __( 'Trust block title', 'elgreco' ), 'name' => 'tp_trust_box_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Trust block description', 'elgreco' ), 'name' => 'tp_trust_box_desc'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Trust block image', 'elgreco' ), 'name' => 'trust_box_img'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-trust-box',$tmpl->renderItems());



$tmpl->addItem( 'switcher', array( 'label' => __('Enable Why buy from us box ','elgreco') , 'name' => 'tp_whybuy_box_enable'));

$tmpl->addItem( 'text', array( 'label' => __( 'Reason #1', 'elgreco' ), 'name' => 'tp_whybuy_reason1_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Reason #1 description', 'elgreco' ), 'name' => 'tp_whybuy_reason1_desc'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Reason #1 image', 'elgreco' ), 'name' => 'tp_whybuy_reason1_img'));

$tmpl->addItem( 'text', array( 'label' => __( 'Reason #2', 'elgreco' ), 'name' => 'tp_whybuy_reason2_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Reason #2 description', 'elgreco' ), 'name' => 'tp_whybuy_reason2_desc'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Reason #2 image', 'elgreco' ), 'name' => 'tp_whybuy_reason2_img'));




$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-why-buy-boost',$tmpl->renderItems());





$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-tips',$tmpl->renderItems());







$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-irecommend',$tmpl->renderItems());


$tmpl->addItem( 'select', [ 'label' => __( 'Stock display format', 'elgreco' ), 'name' => 'tp_stock_display' ] );
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'In stock text color', 'elgreco' ), 'name' => 'tp_instock_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Out of stock text color', 'elgreco' ), 'name' => 'tp_outofstock_color'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-stock-settings',$tmpl->renderItems());



$tmpl->addItem( 'switcher', array( 'label' => __('Show benefits','elgreco') , 'name' => 'tp_bens_show'));
$tmpl->addItem( 'text', array( 'label' => __( 'Free shipping worldwide', 'elgreco' ), 'name' => 'tp_shipping_tip'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Free shipping worldwide image', 'elgreco' ), 'name' => 'tp_shipping_tip_img'));

$tmpl->addItem( 'text', array( 'label' => __( 'Returns', 'elgreco' ), 'name' => 'tp_returns_tip'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Returns image', 'elgreco' ), 'name' => 'tp_returns_tip_img'));


$tmpl->addItem( 'switcher', array( 'label' => __('Show sales badge','elgreco') , 'name' => 'tp_sale_badge2_enable'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Sales badge color', 'elgreco' ), 'name' => 'tp_sale_badge_color'));


$tmpl->addItem( 'switcher', array( 'label' => __('Show \'I recommend this product\' badge in product reviews','elgreco') , 'name' => 'tp_irecommend_enable'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( '\'I recommend this product\' badge color', 'elgreco' ), 'name' => 'tp_irecommend_color'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-sale-badge',$tmpl->renderItems());



$tmpl->addItem( 'switcher', array( 'label' => __('Enable Trustpilot widget','elgreco') , 'name' => 'tp_trustbox_enable'));
$tmpl->addItem( 'select', [ 'label' => __( 'Trustpilot star rating', 'elgreco' ), 'name' => 'tp_trustbox_main_star' ] );
$tmpl->addItem( 'text', array( 'label' => __( 'Number of reviews', 'elgreco' ), 'name' => 'tp_trustbox_reviews_count'));
$tmpl->addItem( 'text', array( 'label' => __( 'Trustpilot link', 'elgreco' ), 'name' => 'tp_trustbox_link'));
$trustpilot = $tmpl->renderItems();


$tmpl->addItem( 'text', array( 'label' => __( 'Review title', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'text', 'elgreco' ), 'name' => 'trust_reviews[{{@index}}][title]','value'=>'{{title}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Review text', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'button text', 'elgreco' ), 'name' => 'trust_reviews[{{@index}}][text]','value'=>'{{text}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Author', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'link', 'elgreco' ), 'name' => 'trust_reviews[{{@index}}][author]','value'=>'{{author}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Date', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'link', 'elgreco' ), 'name' => 'trust_reviews[{{@index}}][date]','value'=>'{{date}}'));
$tmpl->addItem( 'select', array( 'label' => __( 'Stars', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'trust_reviews[{{@index}}][stars]', 'value'=>'{{stars}}', 'values'=>'../values_tp_trustbox_main_star'));
$tmpl->addItem( 'button', array( 'class'=>'btn btn-blue ads-no js-adstm-delete','name'=>'delete', 'value' => __( 'Delete', 'elgreco' ) ) );

$template = sprintf(
    '%3$s {{#each trust_reviews}}
	<div class="panel panel-success">
	<div class="panel-body">    
	%1$s 
	</div> 
	</div>
	{{/each}}%2$s',
    $tmpl->renderItems(),
    $btnAdd,
    $trustpilot
);
$tmpl->template('ads-trustpilot',$template);


$tmpl->addItem( 'switcher', array( 'label' => __('Enable Trustpilot widget','elgreco') , 'name' => 'tp_trustbox_enable'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Trustpilot code', 'elgreco' ), 'name' => 'tp_trustbox_code'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-trustpilot-default',$tmpl->renderItems());



/*features*/
$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable store features', 'elgreco' ), 'name' => 'features_enable', 'value'=>1));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Features background color', 'elgreco' ), 'name' => 'features_bgr_color', 'value'=>'{{features_bgr_color}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Features titles color', 'elgreco' ), 'name' => 'features_title_color', 'value'=>'{{features_title_color}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Features text color', 'elgreco' ), 'name' => 'features_text_color', 'value'=>'{{features_text_color}}'));


$t = $tmpl->renderItems();

$tmpl->addItem( 'text', array( 'label' => __( 'Title', 'elgreco' ), 'name' => 'features[item][{{@index}}][head]', 'value'=>'{{head}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Description', 'elgreco' ), 'name' => 'features[item][{{@index}}][text]', 'value'=>'{{text}}'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image', 'elgreco' ), 'name' => 'features[item][{{@index}}][img]', 'value'=>'{{img}}'));

$template = sprintf(
    '%2$s{{#each features.item}}
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

$tmpl->template('ads-features',$template);




/*store benefits*/
$tmpl->addItem( 'switcher', array( 'label' => __( 'Show store benefits on Single product page', 'elgreco' ), 'name' => 'store_benefits_enable', 'value'=>1));
$tmpl->addItem( 'text', array( 'label' => __( 'Delivery time', 'elgreco' ), 'name' => 'store_benefits_days', 'help' => 'Number of days required to ship products. ‘Estimated Delivery Date\' field is populated automatically. You don’t need to add any dates manually in the field below.'));
$tmpl->addItem( 'select', [ 'label' => __( 'Select delivery date language', 'elgreco' ), 'name' => 'store_benefits_days_lang2' ] );

$t = $tmpl->renderItems();

$tmpl->addItem( 'text', array( 'label' => __( 'Title', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'store_benefits[item][{{@index}}][head]', 'value'=>'{{head}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Description', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'store_benefits[item][{{@index}}][text]', 'value'=>'{{text}}'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'store_benefits[item][{{@index}}][img]', 'value'=>'{{img}}'));

$template2 = sprintf(
    '%2$s{{#each store_benefits.item}}
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

$tmpl->template('ads-store-benefits',$template2);










$tmpl->addItem( 'switcher', array( 'label' => __('Show \'Reasons to buy from us\' block in Product description tab','elgreco') , 'name' => 'tp_desc_add_enable'));
$tmpl->addItem( 'text', array( 'label' => __( '\'Reasons to buy from us\' block title', 'elgreco' ), 'name' => 'tp_desc_add_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( '\'Reasons to buy from us\' block description', 'elgreco' ), 'name' => 'tp_desc_add_text'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image', 'elgreco' ), 'name' => 'tp_desc_add_img'));


$tmpl->addItem( 'switcher', array( 'label' => __('Show \'Buy with confidence\' block in Product description tab','elgreco') , 'name' => 'tp_desc_add_enable2'));
$tmpl->addItem( 'text', array( 'label' => __( '\'Buy with confidence\' block title', 'elgreco' ), 'name' => 'tp_desc_add_title2'));
$tmpl->addItem( 'textarea', array( 'label' => __( '\'Buy with confidence\' block description', 'elgreco' ), 'name' => 'tp_desc_add_text2'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Image', 'elgreco' ), 'name' => 'tp_desc_add_img2'));


$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-desc-addition',$tmpl->renderItems());




$tmpl->addItem( 'switcher', array( 'label' => __('Enable Checkout Countdown Timer banner','elgreco') , 'name' => 'tp_opc_timer_enable'));
$tmpl->addItem( 'text', array( 'label' => __( 'Countdown Timer banner text', 'elgreco' ), 'name' => 'tp_opc_timer_text'));
$tmpl->addItem( 'switcher', array( 'label' => __('Enable Checkout Countdown Timer','elgreco') , 'name' => 'tp_opc_timer_only'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Countdown Timer banner background color', 'elgreco' ), 'name' => 'tp_opc_timer_bgr'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Countdown Timer banner text color', 'elgreco' ), 'name' => 'tp_opc_timer_color'));


$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'elgreco' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'elgreco' ) ) );
$tmpl->template('ads-countdown-timer',$tmpl->renderItems());







?>

<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
                <?php
                wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
                <?php

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Store features', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-features"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Trustpilot', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-trustpilot-default"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Stock settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-stock-settings"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Single product page badges', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-sale-badge"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Single product page store benefits', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-store-benefits"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Single product page additional information', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-desc-addition"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Checkout Countdown Timer', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-countdown-timer"></div>'
                ) );


                $tmpl->renderPanel( array(
                    'panel_title'   => __('Checkout Trust box', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-trust-box"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Checkout Why buy from us box', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-why-buy-boost"></div>'
                ) );
















                ?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
            </form>

        </div>
    </div>
</div>