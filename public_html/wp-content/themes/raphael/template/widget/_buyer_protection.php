<?php if ( cz( 'tp_single_buyer_protection' ) ): ?>
	<div class="hidden-xs col-sm-60">
        <div class="buyer_protection">
            <div class="item_1 col-sm-52 col-sm-offset-3 col-lg-offset-0 col-lg-34">
                <div class="cart">
                    <?php _e( 'Buyer Protection', 'rap' ) ?>
                </div>
                <div class="list">
                    <div class="list-i"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                        <strong><?php _e( "Full Refund", 'rap' ) ?></strong>
                        <?php _e( "if you don't receive your order.", 'rap' ) ?>
                    </div>
                    <div class="list-i"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                        <strong><?php _e( 'Refund & Keep', 'rap' ) ?></strong>
                        <?php _e( 'items, if not as described.', 'rap' ) ?>
                    </div>
                </div>
            </div>
            <div class="item_2 col-sm-34 col-sm-offset-13 col-lg-22 col-lg-offset-4">
                <div class="ship"><?php _e( 'Free Shipping Worldwide', 'rap' ) ?></div>
            </div>
        </div>
	</div>
<?php endif; ?>