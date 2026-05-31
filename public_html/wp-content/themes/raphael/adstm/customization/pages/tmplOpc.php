<?php
$tmpl = new ads\adsTemplate();


$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$btn = 	$tmpl->renderItems();

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-add','name'=>'add', 'value' => __( 'Add', 'rap' ) ) );
$btnAdd = $tmpl->renderItems();


$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable one-page checkout', 'rap' ), 'name' => 'sc_one_page_enable'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('sc_enable',$tmpl->renderItems());


$tmpl->addItem( 'switcher', array( 'label' => __('Enable trust box','rap') , 'name' => 'tp_trust_box_enable'));
$tmpl->addItem( 'text', array( 'label' => __( 'Trust block title', 'rap' ), 'name' => 'tp_trust_box_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Trust block description', 'rap' ), 'name' => 'tp_trust_box_desc'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Trust block image', 'rap' ), 'name' => 'trust_box_img'));

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('sc-trust-box',$tmpl->renderItems());



$tmpl->addItem( 'switcher', array( 'label' => __('Enable Why buy from us box ','rap') , 'name' => 'tp_whybuy_box_enable'));

$tmpl->addItem( 'text', array( 'label' => __( 'Reason #1', 'rap' ), 'name' => 'tp_whybuy_reason1_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Reason #1 description', 'rap' ), 'name' => 'tp_whybuy_reason1_desc'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Reason #1 image', 'rap' ), 'name' => 'tp_whybuy_reason1_img'));

$tmpl->addItem( 'text', array( 'label' => __( 'Reason #2', 'rap' ), 'name' => 'tp_whybuy_reason2_title'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'Reason #2 description', 'rap' ), 'name' => 'tp_whybuy_reason2_desc'));
$tmpl->addItem( 'uploadImg', array( 'label' => __( 'Reason #2 image', 'rap' ), 'name' => 'tp_whybuy_reason2_img'));


$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('sc-why-buy-boost',$tmpl->renderItems());




$tmpl->addItem( 'switcher', array( 'label' => __('Enable Checkout Countdown Timer banner','rap') , 'name' => 'tp_opc_timer_enable'));
$tmpl->addItem( 'text', array( 'label' => __( 'Countdown Timer banner text', 'rap' ), 'name' => 'tp_opc_timer_text'));
$tmpl->addItem( 'switcher', array( 'label' => __('Enable Checkout Countdown Timer','rap') , 'name' => 'tp_opc_timer_only'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Countdown Timer banner background color', 'rap' ), 'name' => 'tp_opc_timer_bgr'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Countdown Timer banner text color', 'rap' ), 'name' => 'tp_opc_timer_color'));


$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('sc-countdown-timer',$tmpl->renderItems());







?>

<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
                <?php
                wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
                <?php


                $tmpl->renderPanel( array(
                    'panel_title'   => __('One-page checkout', 'rap'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#sc_enable"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Countdown Timer', 'rap'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#sc-countdown-timer"></div>'
                ) );


                $tmpl->renderPanel( array(
                    'panel_title'   => __('Trust box', 'rap'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#sc-trust-box"></div>'
                ) );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Why buy from us box', 'rap'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#sc-why-buy-boost"></div>'
                ) );
















                ?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
            </form>

        </div>
    </div>
</div>