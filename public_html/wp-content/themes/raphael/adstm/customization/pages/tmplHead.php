<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'textarea', array( 'label' => __( '< head > tag container for head elements', 'rap' ),'help' => __('Use this section to add or edit scripts that will be placed between tags <head></head> on your site.', 'rap'), 'name' => 'tp_head'));
$tmpl->addItem( 'textarea', array( 'label' => __( 'CSS style', 'rap' ), 'help' => __('Use this section to add or edit CSS for different objects.', 'rap'). $tmpl->tooltip(__('This CSS will be applied to objects instead of default.', 'rap')), 'name' => 'tp_style'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-head',$tmpl->renderItems());
?>

<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( array(
					'panel_title'   => __('CSS and Scripts Customization', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-head"></div>'
				) );

				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
            </form>

        </div>
    </div>
</div>