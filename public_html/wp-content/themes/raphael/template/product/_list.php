<div class="list-order-head hidden-xs">
	<div class="head">
		<div class="col-sm-10"></div>
		<div class="head-product col-sm-30 col-lg-30"><?php _e( 'Product', 'rap' ); ?></div>
		<div class="head-quantity col-sm-9 col-lg-9"><?php _e( 'Quantity', 'rap' ); ?></div>
		<div class="head-amount col-sm-9 col-lg-9"><?php _e( 'Amount', 'rap' ); ?></div>
		<div class="col-sm-2"></div>
	</div>
</div>
<div class="list-product-cart js-cart_item-list">
	<script id="cart_item_template" type="text/template">
		<div class="js-cart-item cart-item" data-key="{{order_id}}" data-post="{{post_id}}">
			<div class="hidden-xs desc">
				<div class="col-sm-10 col-images">
					<div class="im-wrap">
						<div class="thumb-wrap">
							<div class="thumb"><img src="{{thumb}}" class="img-responsive"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-30 col-lg-30">
					<a href="{{link}}" class="title-link">{{title}}</a>
					<div class="shipping">
						<span class="head"><?php _e( 'Shipping', 'rap' ); ?>:</span>
						<span class="js-shipping method">{{shipping}}</span>
					</div>
                    <div class="details">{{details}}</div>
				</div>
				<div class="col-sm-9 col-lg-9">
                    <div class="select_quantity js-select_quantity">
                        <button class="_btn js-quantity_remove"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input name="quantity" type="text" value="{{quantity}}" min="1" max="9999" maxlength="5"
                               autocomplete="off">
                        <button class="_btn add js-quantity_add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
				</div>
				<div class="col-sm-9 col-lg-9">
					<div class="row-price">
                        <div><span class="price js-total_salePrice">{{total_salePrice}}</span></div>
                        <div><strike class="price__old js-total_price">{{total_price}}</strike></div>
					</div>
				</div>
				<div class="col-sm-2">
					<span class="remove-item js-remove-item"><i class="fa fa-fw" aria-hidden="true"></i></span>
				</div>
			</div>
			<!---->

			<div class="visible-xs mobile">
				<div class="row-item">
					<div class="col-img">
						<div class="wrap-img">
							<span class="remove-item js-remove-item" data-productActions="remove"><i class="fa fa-times" aria-hidden="true"></i></span>
							<div class="box-img">
								<div class="img_content">
									<img src="{{thumb}}" class="img-responsive">
								</div>
							</div>
						</div>
					</div>
					<div class="col-title">
						<a href="{{link}}" class="title-link">{{title}}</a>
					</div>
					<div class="col-total">
						<div class="row-quantity">
							<div class="select_quantity js-select_quantity">
								<button class="_btn remove js-quantity_remove"><i class="fa fa-minus" aria-hidden="true"></i></button>
								<input name="quantity" type="text" value="{{quantity}}" min="1" max="9999" maxlength="5"
								       autocomplete="off">
								<button class="_btn add js-quantity_add"><i class="fa fa-plus" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="row-price">
							<div>
								<span class="price js-total_salePrice" data-modalAddOrder="total_salePrice">{{total_salePrice}}</span>
							</div>
							<div>
								<strike class="price__old js-total_price" data-modalAddOrder="total_price">{{total_price}}</strike>
							</div>
						</div>
					</div>
				</div>
				<div class="col-meta">
					<div class="row-meta">
                        <div class="details">{{details}}</div>
                        <div class="shipping">
                            <span class="head"><?php _e( 'Shipping', 'rap' ); ?>:</span>
                            <span class="js-shipping method">{{shipping}}</span>
                        </div>
					</div>
				</div>
			</div>

			<!---->

		</div>
	</script>

	<script id="cart_item_details_img_template" type="text/template">
		<span class="img"><img src="{{url}}" class="img-responsive"></span>
	</script>
	<script id="cart_item_details_text_template" type="text/template">
		<span class="text">{{text}}</span>
	</script>
	<script id="cart_item_details_template" type="text/template">
		<div class="sku-item"><span class="sku-title">{{title}}:</span>{{variation}}</div>
	</script>
</div>
