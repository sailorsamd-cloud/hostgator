<?php
$product = adsTmpl::product();
$pack = $product['pack'];

if (cz('tp_pack') && $pack ) : ?>
	<h2 class="colored"><?php _e( 'Packaging Details', 'rap' ) ?></h2>
	<div class="packaging_details ">
        <div class="pack">
            <div class="name"><?php _e( 'Type', 'rap' ) ?>:</div>
            <div class="value">&nbsp;<?php echo $pack[ 'type' ] ?></div>
        </div>
        <div class="pack">
            <div class="name"><?php _e( 'Weight', 'rap' ) ?>:</div>
            <div class="value"><?php echo $pack[ 'weight' ] ?></div>
        </div>
        <div class="pack">
            <div class="name"><?php _e( 'Size', 'rap' ) ?>:</div>
            <div class="value"><?php echo $pack[ 'size' ];?></div>
        </div>
	</div>

<?php endif; ?>

<?php echo cz( 'tp_single_shipping_payment_content' ) ?>