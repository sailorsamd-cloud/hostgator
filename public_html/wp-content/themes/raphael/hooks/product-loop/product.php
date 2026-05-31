<?php

function adstm_product_item($img_size = 'ads-big',$no_scheme = false){

$info = new adsProductTM( array(
	'attributes' => true,
	'alimeta'    => true
) );

$product = $info->singleProductMin($img_size);

$discount = '';
if ( $product[ 'discount' ] && cz('tp_show_discount')) {
	$discount = sprintf( '<div class="discount"><div class="wrap-discount"><span class="percnt">-%1$d&percnt;</span></div></div>',
					$product[ 'discount' ],
					__('off', 'rap')
				);
}

$price = "<div class='price'></div>";
 if ( $product[ '_price' ] > 0 && $product[ '_price' ] !== $product[ '_salePrice' ]){
	 $price = "<div class='price js-price'></div>";
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








    if($no_scheme == false){
        echo "<div itemscope itemtype=\"http://schema.org/Product\" class='product-item' {$info->getHiddenData()} >
    <meta itemprop='image' content='{$product[ 'thumb' ]}'>
    <meta itemprop='mpn' content='{$product['post_id']}'>
    {$aggregateRating}
	<a href='{$info->getLink()}'>
		<div class='wrap-img'>
		
		<div class='box-img'>";
        do_action('ads_product_item_thumb_box', $product['post_id']);
        echo "<div class='img_content'>";
        if( cz( 'tp_item_imgs_lazy_load' ) ) { ?>
            <img data-src="<?php echo $product[ 'thumb' ]; ?>?10000">
        <?php }else{ ?>
            <img src="<?php echo $product[ 'thumb' ]; ?>?10000">
        <?php }

        echo "</div>";
                do_action('ads_product_item_thumb_box_after', $info);
                echo "</div>
		{$discount}
		</div>
		<div class='wrap-content'>
			<div class='title'><div class='text' itemprop=\"name\">{$info->getTitle()}</div></div>
			<span class='starRating'>{$info->starRating($info->getCommentCount(), $info->getCommentCount() > 1 ? __('reviews', 'rap') : __('review', 'rap'))}</span>
			<div class='wrap-price' itemprop='offers' itemscope itemtype='http://schema.org/Offer'>
				<meta itemprop='price' content='{$product[ '_salePrice_nc' ]}'>
				<meta itemprop='priceCurrency' content='{$product[ 'currency' ]}'/>
                <meta itemprop='url' content='{$info->getLink()}'>
                <meta itemprop='availability' content='{$availability}'>
                <meta itemprop='priceValidUntil' content='{$priceValidUntil}'>
				<div class='salePrice js-salePrice'></div>
				{$price}
			</div>
		</div>
		<div itemprop='brand' itemscope='' itemtype='http://schema.org/Organization'>
    <meta itemprop='name' content='{$_SERVER['SERVER_NAME']}'/>
</div>
	</a>
</div>";
    }else{
        echo "<div class='product-item' {$info->getHiddenData()}>
	<a href='{$info->getLink()}'>
		<div class='wrap-img'>
		
		<div class='box-img'>";
        do_action('ads_product_item_thumb_box', $product['post_id']);
        echo "<div class='img_content'>";
        if( cz( 'tp_item_imgs_lazy_load' ) ) { ?>
            <img data-src="<?php echo $product[ 'thumb' ]; ?>?10000">
        <?php }else{ ?>
            <img src="<?php echo $product[ 'thumb' ]; ?>?10000">
        <?php }
        echo "</div>";
        do_action('ads_product_item_thumb_box_after', $info);
        echo "</div>
		{$discount}
		</div>
		<div class='wrap-content'>
			<div class='title'><div class='text'>{$info->getTitle()}</div></div>
			<span class='starRating'>{$info->starRating($info->getCommentCount(), $info->getCommentCount() > 1 ? __('reviews', 'rap') : __('review', 'rap'))}</span>
			<div class='wrap-price'>
				<meta itemprop='price' content='{$product[ '_salePrice_nc' ]}'>
				<meta itemprop='priceCurrency' content='{$product[ 'currency' ]}'/>
				<div class='salePrice js-salePrice'></div>
				{$price}
			</div>
		</div>
	</a>
</div>";
    }



}


add_action('adstm_product_item', 'adstm_product_item', 10 , 2);