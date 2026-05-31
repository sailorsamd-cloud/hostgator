<?php

class adsProductTM extends \ads\adsProduct {

	public  $is_free_shipping = false;
	public  $price_shipping   = false;
	private $product          = '';

	private $currentSku;

	public function __construct( $args = [] ) {

		global $post;

		parent::__construct( '', $args );

		if( $post ) {
			$this->setData( $post );
		}

		if( isset( $_GET[ 'sku' ] ) ) {
			$this->currentSku = esc_attr( $_GET[ 'sku' ] );
		}
	}

	public function getPostId() {

		return $this->post_id;
	}

	public function getLink() {

		return get_permalink( $this->post_id );
	}

	public function getTitle() {

		return get_the_title( $this->post_id );
	}

	public function starRating( $count = false, $text = '' ) {
		$method = $count ? '<span class="call-item"> (' . $count .' '. $text . ')</span>' : '';


        $rating = floatval( $this->getRate() );
        if($rating > 5){
            $rating = 5;
        }
        $full_stars  = floor( $rating );
        $half_stars  = ceil( $rating - $full_stars );
        $empty_stars = 5 - $full_stars - $half_stars;
        $half_percent = ( $rating - $full_stars )*100;

        $stars = str_repeat( '<span class="star star-full"></span>', $full_stars ) .
            str_repeat( '<span class="star star-half"><u style="width:'.$half_percent.'%"></u></span>', $half_stars ) .
            str_repeat( '<span class="star star-no"></span>', $empty_stars );

		return '<div class="stars">'.$stars.$method.'</div>';
	}

	public function ratingPercentage() {

		$number = floatval( $this->getRate() );
		$max    = 5;

		return ( $number * 100 ) / $max;
	}

	private function getSave( $_salePrice, $_price ) {

		$savePercent = $_price > 0 && $_salePrice > 0 ? round( ( ( $_price - $_salePrice ) / $_price ) * 100 ) : false;
		if ( $savePercent && $savePercent > 0 ) {
			$_save = $_price - $_salePrice;
			$save  = ads_price_out_current_front( $_save );
		} else {
			$savePercent = '';
			$save        = '';
			$_save       = false;
		}

		return [
			'savePercent' => $savePercent,
			'save'        => $save,
			'_save'       => $_save
		];
	}

	function getCurrentAttr( $skuAttr ) {

		if( $this->currentSku && isset( $skuAttr[ $this->currentSku ] ) ) {
			return $skuAttr[ $this->currentSku ];
		}

		return array_shift( $skuAttr );
	}

	function singleProduct() {
        if (!is_singular( 'product' ) ) {
            global $post;
            $this->getById( $post->ID );
        }

		$currency       = $this->getCurrency();
		$_price_nc      = $this->getPrice();
		$_salePrice_nc  = $this->getSalePrice();

		$_price     = function_exists( 'ads_price_convert' ) ? ads_price_convert( $_price_nc, $currency ) : 0;
		$_salePrice = function_exists( 'ads_price_convert' ) ? ads_price_convert( $_salePrice_nc, $currency ) : 0;

		$price = false;

		if( $_salePrice < $_price ) {
			$price = ads_price_out_current_front( $_price );
		}

		$salePrice = ads_price_out_current_front( $_salePrice );

		$skuAttr = $this->getSkuAttr();
		if( $skuAttr ) {
			foreach( $skuAttr as $k => $v ) {

				$skuAttr[$k][ '_price_nc' ]     = $skuAttr[$k][ 'price' ];
				$skuAttr[$k][ '_salePrice_nc' ] = $skuAttr[$k][ 'salePrice' ];

				$skuAttr[$k][ 'price' ]     = ads_price_convert( $v[ 'price' ], $currency );
				$skuAttr[$k][ 'salePrice' ] = ads_price_convert( $v[ 'salePrice' ], $currency );


				$skuAttr[$k][ 'discount' ] = '';
				$skuAttr[$k][ 'save' ]     = '';

				if ( $skuAttr[$k][ 'price' ] > 0 ) {
					$skuAttr[$k][ '_save_nc' ] = $skuAttr[$k][ '_price_nc' ] - $skuAttr[$k][ '_salePrice_nc' ];
					$skuAttr[$k][ 'save' ]     = ads_price_out_current_front( $skuAttr[$k][ 'price' ] - $skuAttr[$k][ 'salePrice' ] );
					$skuAttr[$k][ 'discount' ] = round( ( ( $skuAttr[$k][ 'price' ] - $skuAttr[$k][ 'salePrice' ] ) / $skuAttr[$k][ 'price' ] ) * 100 );
				}
				$skuAttr[$k][ '_price' ]     = $skuAttr[$k][ 'price' ];
				$skuAttr[$k][ 'price' ]      = ads_price_out_current_front( $skuAttr[$k][ 'price' ] );
				$skuAttr[$k][ '_salePrice' ] = $skuAttr[$k][ 'salePrice' ];
				$skuAttr[$k][ 'salePrice' ]  = ads_price_out_current_front( $skuAttr[$k][ 'salePrice' ] );
			}
		}

		$sku = $this->getSku();

		if ( ! empty( $sku ) && $skuAttr ) {

			$attrPrice     = $this->getCurrentAttr( $skuAttr );
			$_salePrice    = $attrPrice[ '_salePrice' ];
			$_salePrice_nc = $attrPrice[ '_salePrice_nc' ];
			$salePrice     = $attrPrice[ 'salePrice' ];
			$_price        = $attrPrice[ '_price' ];
			$_price_nc     = $attrPrice[ '_price_nc' ];
			$price         = $attrPrice[ 'price' ];
		}

		$saveInfo    = $this->getSave( $_salePrice, $_price );
		$saveInfo_nc = $this->getSave( $_salePrice_nc, $_price_nc );

        $getVariationDefault = 'lowest_price';
        if(method_exists($this,'getVariationDefault')){
            $getVariationDefault = $this->getVariationDefault();
        }

		$shipping      = $this->getShipping();
        $thumb = $this->getImageUrl( 'ads-large' );
		$this->product = $foo = [
			'post_id'       => $this->getPostId(),
			'price'         => $price,
			'salePrice'     => $salePrice,
			'_price'        => $_price,
			'_price_nc'     => $_price_nc,
			'_salePrice'    => $_salePrice,
			'_salePrice_nc' => $_salePrice_nc,
			'savePercent'   => $saveInfo[ 'savePercent' ],
			'save'          => $saveInfo[ 'save' ],
			'_save'         => $saveInfo[ '_save' ],
			'_save_nc'      => $saveInfo_nc[ '_save' ],
			'currency'      => $currency,
			'stock'         => $this->getQuantity(),

			'shipping'          => $shipping,
			'renderShipping'    => $this->renderShipping( $shipping ),
			'currency_shipping' => ADS_MAIN_CUR,
			'is_free_shipping'  => $this->is_free_shipping,
			'price_shipping'    => $this->price_shipping,

			'rate'            => $this->getRate(),
			'promotionVolume' => $this->getPromotionVolume(),

			'pack'   => $this->getPack(),
			'attrib' => $this->getAttributes(),

			'gallery' => $this->getGallery(),
            'video' => $this->getVideo(),
			'sku'     => $sku,
			'skuAttr' => $skuAttr,
            'sizeAttr' => $this->getSizeAttr(),
            'variation_default' => $getVariationDefault,
            'thumb'             => $thumb,
		];

		return $foo;
	}

	public function getHiddenFields() {

		$foo = [
			'post_id',
			'currency',
			'_price',
			'_price_nc',
			'_save',
			'_save_nc',
			'stock',
			'savePercent',
			'_salePrice',
			'_salePrice_nc',
			'price',
			'salePrice',
			'save',
			'currency_shipping',
            'variation_default'
		];

		$hidden  = '';
		$product = $this->product;
		foreach ( $foo as $v ) {
			if( isset( $product[ $v ] ) ) {
				$hidden .= sprintf( '<input type="hidden" name="%1$s" value="%2$s">', $v, $product[ $v ] );
			}
		}

		return $hidden;
	}

    public function getHiddenData() {

        $foo = [
            'post_id',
            'currency',
            '_price',
            '_price_nc',
            '_save',
            '_save_nc',
            'stock',
            'savePercent',
            '_salePrice',
            '_salePrice_nc',
            'price',
            'salePrice',
            'save',
            'currency_shipping',
            'variation_default'
        ];

        $hidden  = '';
        $product = $this->product;
        foreach ( $foo as $v ) {
            if( isset( $product[ $v ] ) ) {
                $hidden .= sprintf( 'data-%1$s="%2$s" ', $v, $product[ $v ] );
            }
        }

        return $hidden;
    }

	public function singleProductMin( $imgSize = 'ads-big' ) {

		$currency      = $this->getCurrency();
		$_price_nc     = $this->getPrice();
		$_salePrice_nc = $this->getSalePrice();

		$_price     = ads_price_convert( $_price_nc, $currency );
		$_salePrice = ads_price_convert( $_salePrice_nc, $currency );

		$price     = $_price !== $_salePrice ? ads_price_out_current_front( $_price ) : false;
		$salePrice = ads_price_out_current_front( $_salePrice );

		$discount = $_price > 0 && $_salePrice > 0 ? round( ( ( $_price - $_salePrice ) / $_price ) * 100 ) : false;
        if($_price > 0 && $_salePrice == 0){
            $discount = 100;
        }
		$discount = ( $discount && $discount > 0 ) ? $discount : false;
		$thumb = $this->getImageUrl( $imgSize );
        $img_full = $this->getImageUrl( 'full' );
		$getVariationDefault = 'lowest_price';
		if(method_exists($this,'getVariationDefault')){
            $getVariationDefault = $this->getVariationDefault();
        }

        $skuAttr = $this->getSkuAttr();
        if( $skuAttr ) {
            foreach( $skuAttr as $k => $v ) {

                $skuAttr[$k][ '_price_nc' ]     = $skuAttr[$k][ 'price' ];
                $skuAttr[$k][ '_salePrice_nc' ] = $skuAttr[$k][ 'salePrice' ];

                $skuAttr[$k][ 'price' ]     = ads_price_convert( $v[ 'price' ], $currency );
                $skuAttr[$k][ 'salePrice' ] = ads_price_convert( $v[ 'salePrice' ], $currency );


                $skuAttr[$k][ 'discount' ] = '';
                $skuAttr[$k][ 'save' ]     = '';

                if ( $skuAttr[$k][ 'price' ] > 0 ) {
                    $skuAttr[$k][ '_save_nc' ] = $skuAttr[$k][ '_price_nc' ] - $skuAttr[$k][ '_salePrice_nc' ];
                    $skuAttr[$k][ 'save' ]     = ads_price_out_current_front( $skuAttr[$k][ 'price' ] - $skuAttr[$k][ 'salePrice' ] );
                    $skuAttr[$k][ 'discount' ] = round( ( ( $skuAttr[$k][ 'price' ] - $skuAttr[$k][ 'salePrice' ] ) / $skuAttr[$k][ 'price' ] ) * 100 );
                }
                $skuAttr[$k][ '_price' ]     = $skuAttr[$k][ 'price' ];
                $skuAttr[$k][ 'price' ]      = ads_price_out_current_front( $skuAttr[$k][ 'price' ] );
                $skuAttr[$k][ '_salePrice' ] = $skuAttr[$k][ 'salePrice' ];
                $skuAttr[$k][ 'salePrice' ]  = ads_price_out_current_front( $skuAttr[$k][ 'salePrice' ] );
            }
        }

        $sku = $this->getSku();

        $this->product =  [
            'post_id'         => $this->getPostId(),
            '_price_nc'       => $_price_nc,
            '_price'          => $_price,
            'price'           => $price,
            '_salePrice'      => $_salePrice,
            '_salePrice_nc'   => $_salePrice_nc,
            'salePrice'       => $salePrice,
            'currency'        => $currency,
            'discount'        => $discount,
            'thumb'           => $thumb,
            'countReview'     => $this->getCountReview(),
            'promotionVolume' => $this->getPromotionVolume(),
            'stock'           => $this->getQuantity(),
            'variation_default'         => $getVariationDefault,

            'sku'             => $sku,
            'skuAttr'         => $skuAttr,
            'img_full'           => $img_full,



        ];



		return $this->product;
	}

	private function renderShipping( $shipping ) {

        if(empty($shipping)){
            return '';
        }

		$foo    = ads_get_shipping_titles();
		$render = '';

		if ( is_array( $shipping ) && count( $shipping ) > 1 ) {

			$key                  = key( $shipping );
			$time                 = $shipping[ $key ][ 'time' ];
			$this->price_shipping = $shipping[ $key ][ 'cost' ];

			$render .= '<div class="single-shipping-select single-shipping-multi">
				<select class="picker" data-singleProduct="single-shipping" name="shipping">';

			foreach ( $shipping as $k => $v ) {

				if ( $k == 'free' ) {
					$this->is_free_shipping = true;
				}
				
                $render .= sprintf(
                    '<option value="%1$s" data-info="%3$s" data-price="%5$s"
                    data-cost_nc="%6$s" data-template="{{price}} %2$s">%4$s %2$s</option>',
                    $k,
                    $v['title'],
                    $v['time'],
                    $v['cur_cost'],
                    $v['cost'],
                    $v['_cost_nc']
                );
			}

			$render .= '</select>';
			$render .= '<div class="shipping-info" data-singleProduct="shipping-info">' . $time . '</div>';

			$render .= '</div>';


		} else {

			$key      = 'free';
			$time     = '';
			$title    = '';
			$cur_cost = '';
			$_cost_nc = 0;

			if ( is_array( $shipping ) && count( $shipping ) == 1 ) {

				$key      = key( $shipping );
				$time     = $shipping[ $key ][ 'time' ];
                $title    = $shipping[ $key ][ 'title' ];
				$cur_cost = $shipping[ $key ][ 'cur_cost' ];
				$_cost_nc = $shipping[ $key ][ '_cost_nc' ];
			}

			if ( $key == 'free' && isset($foo[ $key ]) ) {
				$cur_cost               = '';
				$this->is_free_shipping = true;
			}

			$this->price_shipping = isset( $shipping[ $key ][ 'cost' ] ) ? $shipping[ $key ][ 'cost' ] : 0;
            
            $render .= sprintf(
                '<div class="single-shipping-select single-shipping-one">
                        <span class="single-shipping_title">
                            <span class="name">Shipping Time:</span> %3$s
                        </span>
                        <span class="single-shipping_value">
                            <span class="name">Shipping cost:</span> %4$s
                        </span>
                        <span data-singleproduct="single-shipping_value" style="display: none">%4$s</span>
				        <input
				            data-singleproduct="single-shipping"
				            data-template="{{price}} %1$s"
				            type="hidden"
				            name="shipping"
				            value="%2$s"
				            data-info="%4$s"
				            data-cost_nc="%5$s">
                    </div>',
                $title,
                $key,
                ! empty( $time ) ? $time : '',
                $cur_cost,
                $_cost_nc
            );
		}

		return $render;
	}

	public function linkCategoryProduct() {

		$category = get_the_terms($this->getPostId(), 'product_cat' );
		if( $category )
			return get_term_link( $category[0]->term_id, 'product_cat' );

		return adsTmpl::home_url( 'product' );
	}

    public function getSeo(){

        $options = \models\seo\Meta::getOptions();
        $enable = $options['auto_generate_product'] == 1;

        $getSeoTitle = $this->getSeoTitle();
        if($getSeoTitle && (!empty($getSeoTitle)) && $enable){
            $seo_title = stripcslashes(htmlspecialchars_decode($getSeoTitle));
        }else{
            $seo_title = \models\seo\Meta::generateTitle($this->getPostTitle());
        }

        $getSeoDescription = $this->getSeoDescription();
        if($getSeoDescription && (!empty($getSeoDescription)) && $enable){
            $seo_description = stripcslashes(htmlspecialchars_decode($this->getSeoDescription()));
        }else{
            $seo_description = \models\seo\Meta::generateDescription($this->getPostTitle());
        }

        $getSeoKeywords = $this->getSeoKeywords();
        if($getSeoKeywords && (!empty($getSeoKeywords)) && $enable){
            $seo_keywords = stripcslashes(htmlspecialchars_decode($this->getSeoKeywords()));
        }else{
            $seo_keywords = \models\seo\Meta::generateKeywords($this->getPostTitle());
        }


        return [
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            'seo_keywords' => $seo_keywords,
        ];
    }
}


class adsFeedBackTM extends \ads\adsFeedback {

	public function __construct() {

		global $wp_query, $post;

		$post_id = $post->ID;

		$cpage = max( 1, get_query_var( 'cpage' ) );

		$posts_per_page = ( isset( $wp_query->query_vars[ 'comments_per_page' ] ) &&
		                    intval( $wp_query->query_vars[ 'comments_per_page' ] ) ) ?
			$wp_query->query_vars[ 'comments_per_page' ] :
			intval( get_option( 'comments_per_page' ) );

		parent::__construct( $post_id, $cpage, $posts_per_page );
	}

	static public function renderStarRating( $rating ) {

		$full_stars  = floor( $rating );
		$half_stars  = ceil( $rating - $full_stars );
		$empty_stars = 5 - $full_stars - $half_stars;
		$half_percent = ( $rating - $full_stars )*100;

		echo str_repeat( '<span class="star star-full"></span>', $full_stars ) .
			 str_repeat( '<span class="star star-half"><u style="width:'.$half_percent.'%"></u></span>', $half_stars ) .
			 str_repeat( '<span class="star star-no"></span>', $empty_stars );
	}
}
