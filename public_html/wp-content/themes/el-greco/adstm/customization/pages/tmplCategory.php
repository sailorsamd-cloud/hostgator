<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$btn = 	$tmpl->renderItems();





$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Category page banner', 'elgreco' ), 'name' => 'cat_banner_enable', 'value' =>1 ] );
$tmpl->addItem( 'uploadImg', [ 'label' => __( 'Category page banner', 'elgreco' ), 'name' => 'cat_banner_img' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Category page banner link', 'elgreco'), 'name' => 'cat_banner_href' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );

$tmpl->template('ads-promoblock',$tmpl->renderItems());

$tmpl->addItem( 'product', [ 'label' => __( 'Exclude products from Top selling, Best deals and New arrivals tabs (they will appear only on Category page)', 'elgreco' ), 'name' => 'tp_products_not_in' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );

$tmpl->template('ads-exclude',$tmpl->renderItems());



?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
                /*$tmpl->renderPanel( [
                    'panel_title'   => __('Promo Banner', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-promoblock"></div>'
                ] );*/
                $tmpl->renderPanel( [
                    'panel_title'   => __('Product Display Settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-exclude"></div>'
                ] );
				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
                <button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>