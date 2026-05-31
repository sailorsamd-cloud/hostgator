<?php

function adstm_link_product_category() {

	$link = adsTmpl::singleProduct()->linkCategoryProduct();

	return printf('<a class="link-black_to_category" href="%1$s">%2$s</a>',
		$link,
		__( 'Back to category', 'elgreco' )
	);
}
add_action( 'adstm_link_product_category', 'adstm_link_product_category' );

function adstm_init_product() {

	global $ADSTM;

	$ADSTM[ 'review' ]  = new adsFeedBackTM();
	$ADSTM[ 'info' ]    = new adsProductTM( [
		'attributes' => true,
		'alimeta'    => true
	] );
	$ADSTM[ 'product' ] = $ADSTM[ 'info' ]->singleProduct();
}
add_action( 'adstm_init_product', 'adstm_init_product' );

function adstm_start_form_product() {

	global $ADSTM;

	echo '<form id="form_singleProduct" action=""  method="POST" class="cart-form">' . $ADSTM[ 'info' ]->getHiddenFields();
}
add_action('adstm_start_form_product', 'adstm_start_form_product');

function adstm_end_form_product() {

	echo '</form>';
}
add_action( 'adstm_end_form_product', 'adstm_end_form_product' );
