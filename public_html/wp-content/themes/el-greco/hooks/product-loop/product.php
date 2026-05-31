<?php

function adstm_product_item( $img_size = 'ads-big', $no_scheme = false ) {

	$info = new adsProductTM( [
		'attributes' => true,
		'alimeta'    => true
	] );
    $info->getById();
	$product  = $info->singleProductMin($img_size);
	$discount = '';
	$countReviews='';

//	$reviews = new adsFeedBackTM();
//	$review_list = $reviews->getLisReview();
//	$review_choosen = [];
//	$max_review = 3;
//	if(is_array($review_list) && !empty($review_list)){
//	    foreach ($review_list as $review_one){
//	        if(isset($review_one['star'])){
//
//	            if($review_one['star']==5){
//                    $review_choosen = $review_one;
//                    break;
//                }
//                if($review_one['star']==4){
//                    $review_choosen = $review_one;
//                }
//
//            }
//        }
//    }




	if( $product[ 'discount' ] && cz( 'tp_show_discount' ) ) {
		$discount = sprintf(
			'<div class="discount"><span><b>-%s</b></span></div>',
            $product[ 'discount' ].'%'
		);
	}

	$price = '';
    $price .= "<span class='sale js-salePrice'></span>";
	if( $product[ '_price' ] > 0 && $product[ '_price' ] !== $product[ '_salePrice' ] ) {
	    $price .= "<small class='old js-price'></small>";
	}

    if( $product[ 'countReview' ] && cz( 'tp_show_reviews_orders1' ) == 'reviews' ) {
        $countReviews = sprintf(
            '<div class="orders_count"> (%s %s)</div>',
            $product[ 'countReview' ],
            $product[ 'countReview' ] > 1 ? __( 'reviews', 'elgreco' ) : __( 'review', 'elgreco' )
        );
    }

    if( $product[ 'promotionVolume' ] && cz( 'tp_show_reviews_orders1' )=='orders' ) {
        $countReviews = sprintf(
            '<div class="orders_count">%s %s</div>',
            $product[ 'promotionVolume' ],
            __( 'orders', 'elgreco' )
        );
    }

    $availability = $product[ 'stock' ] > 0  ? "https://schema.org/InStock" : "https://schema.org/OutOfStock";
    $priceValidUntil = date('Y-m-d',
        strToTime('today + 30 days')
    );

    $getCountReview = $info->getCountReview();
    $aggregateRating = '';
    if($getCountReview){
        $aggregateRating = "<div style='display:none;' itemprop='aggregateRating' itemscope itemtype='http://schema.org/AggregateRating'><span itemprop='ratingValue'>{$info->getRate()}</span><span itemprop='reviewCount'>".$getCountReview."</span></div>";
    }

    $getPostId = $info->getPostId();
    get_post_status($getPostId);
    $title = $info->getTitle();
    if(wp_doing_ajax()){
        if( current_user_can('editor') || current_user_can('administrator') ) {
            $status = get_post_status( $getPostId );
            if( ads_check_status_access( $status ) ){
                $title = '<strong>' . ads_name_status_access( $status ) . ':</strong> ' . $title;
            }
        }
    }

    $get_sku = $info->getSku();
    $sku='';
    if(is_array($get_sku) && !empty($get_sku)){
        foreach ($get_sku as $key=>$val){
            if($sku==''){
                $sku=$key;
            }
        }
    }
    if($sku==''){
        $sku = $product['post_id'];
    }

    $seo_desc = $info->getSeo();
    $seo_desc_text = $seo_desc['seo_description'];


    if(isset($product['promotionVolume']) && $product['promotionVolume']==0){
        if(defined( 'SLV_ERROR' )){
            global $wpdb;
            $wpdb->update($wpdb->slv_products,
                array(
                    'promotionVolume' => mt_rand(8000, 12000),
                ),
                array('post_id' => $getPostId)
            );
        }
    }

    if($no_scheme == false){
        echo "<div class='product-item item-sp' itemscope='' itemtype='http://schema.org/Product' {$info->getHiddenData()} >
				<meta itemprop='image' content='{$product[ 'thumb' ]}'>
				<meta itemprop='mpn' content='{$product['post_id']}'>
				<meta itemprop='sku' content='{$sku}'>
				<meta itemprop='description' content='{$seo_desc_text}'>
				{$aggregateRating}
				<a href='{$info->getLink()}'>
                    <div class='thumb-wrap'>";
        do_action('ads_product_item_thumb_box', $product['post_id']);
        if( cz( 'tp_item_imgs_lazy_load' ) ) { ?>
            <img data-src="<?php echo $product[ 'thumb' ]; ?>" sizes="50vw" data-lazy="<?php echo $product[ 'thumb' ]; ?>">
        <?php }else{ ?>
            <img src="<?php echo $product[ 'thumb' ]; ?>">
        <?php }
        do_action('ads_product_item_thumb_box_after', $info);
        echo "</div>
					<div class='product_list_info'>
					    <h4 itemprop='name'>{$title}</h4>
                        
                        ";
        if(cz( 'tp_show_stars' )){
            echo "<span class='starscont'>{$info->starRating()}</span>";
        }
        echo "{$countReviews}
            {$discount}
            <div class='price' itemprop='offers' itemscope='' itemtype='http://schema.org/Offer'>
                <meta itemprop='price' content='{$product[ '_salePrice_nc' ]}'/>
                <meta itemprop='priceCurrency' content='{$product[ 'currency' ]}'/>
                <meta itemprop='url' content='{$info->getLink()}'/>
                <meta itemprop='availability' content='{$availability}'/>
                <meta itemprop='priceValidUntil' content='{$priceValidUntil}'/>
                {$price}
            </div>";
//        if(!empty($review_choosen)){
//            if(isset($review_choosen['feedback'])){
//                $review_choosen['feedback'] = strip_tags($review_choosen['feedback']);
//            }
//
//            ?><!--<div itemprop='review' itemscope='' itemtype='http://schema.org/Review'>-->
<!--                <meta itemprop='reviewBody' content="--><?php //echo str_replace('"',"'",strip_tags($review_choosen['feedback'])); ?><!--">-->
<!--                <div itemprop="author" itemtype="https://schema.org/Person" itemscope>-->
<!--                    <meta itemprop="name" content="--><?php //echo strip_tags($review_choosen['name']); ?><!--" />-->
<!--                </div>-->
<!---->
<!--            </div>--><?php
//        }

                        echo "
<div itemprop='brand' itemscope='' itemtype='http://schema.org/Organization'>
    <meta itemprop='name' content='{$_SERVER['SERVER_NAME']}'/>
</div>

                    </div>
				</a>
		</div>";
    }else{
        echo "<div class='product-item item-sp' {$info->getHiddenData()} >
				<a href='{$info->getLink()}'>
                    <div class='thumb-wrap'>";
        do_action('ads_product_item_thumb_box', $product['post_id']);
        if( cz( 'tp_item_imgs_lazy_load' ) ) { ?>
            <img data-src="<?php echo $product[ 'thumb' ]; ?>">
        <?php }else{ ?>
            <img src="<?php echo $product[ 'thumb' ]; ?>">
        <?php }
        do_action('ads_product_item_thumb_box_after', $info);
        echo "</div>
					<div class='product_list_info'>
					    <h4>{$title}</h4>
                        
                        ";
        if(cz( 'tp_show_stars' )){
            echo "<span class='starscont'>{$info->starRating()}</span>";
        }
        echo "{$countReviews}
                        {$discount}
                        <div class='price'>
                            {$price}
                        </div>
                        
                    </div>
				</a>
		</div>";
    }




}
add_action( 'adstm_product_item', 'adstm_product_item', 10 , 2 );