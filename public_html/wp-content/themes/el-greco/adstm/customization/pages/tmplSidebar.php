<?php
$tmpl = new ads\adsTemplate();



$tmpl->addItem( 'text', [ 'name' => 'tp_copyright' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-copyright',$tmpl->renderItems());

$tmpl->addItem( 'text', [ 'label' => __( 'Contact phone', 'elgreco' ), 'name' => 'tp_header_phone' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Contact email', 'elgreco' ), 'name' => 'tp_header_email' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Address', 'elgreco' ), 'name' => 'tp_address' ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-contact-details',$tmpl->renderItems());

?>

<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
                <?php
                wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
                <?php




                $tmpl->renderPanel( [
                    'panel_title'   => __('Copyright', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-copyright"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Contact details', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-contact-details"></div>'
                ] );

                ?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
            </form>

        </div>
    </div>
</div>