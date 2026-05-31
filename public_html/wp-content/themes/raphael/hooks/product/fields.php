<?php


add_action('adstm_single_quantity',function (){
	printf('<input class="js-single-quantity" 
				data-singleProductInput="quantity" 
				name="quantity" 
				type="text" 
				value="1" min="1" max="9999"
				 maxlength="5" autocomplete="off" />');
});




add_action('adstm_single_btn_add_to_cart', function (){
    printf('<button type="button" data-singleProductEvent="addCart" id="addToCart"
            class="btn_add-cart js-addToCart"><span>%1$s</span></button>',
            __( 'Add to Cart', 'rap' )
    );
});



add_action('adstm_single_btn_express_checkout_enabled', function (){

    if(function_exists('isExpressCheckoutEnabled') && isExpressCheckoutEnabled()): ?>
        <?php echo apply_filters(
            'ads_paypal_button',
            '<div class="buynow_btn">
                                        <button type="submit" id="buyNow" class="btn btn-lg b-add_order__btn" name="pay_express_checkout">'.__( 'Buy with', 'rap' ).' <i class="ico-paypal"></i></button>
                                    </div>'
        ) ?>

    <?php endif;
});


add_action('adstm_single_total_price', function(){
	?>
	<div class="total_price" data-singleProductBox="totalPrice" style="display: none;">
		<div class="name"><?php _e( 'Total Price', 'rap' ); ?>:</div>
		<div class="value">
			<span class="total-price" data-singleProduct="totalPrice"></span>
		</div>
		<div class="info"><i class="fa fa-tags" aria-hidden="true"></i><?php _e( 'Best price guarantee', 'rap' ); ?></div>
	</div>
	<?php
});