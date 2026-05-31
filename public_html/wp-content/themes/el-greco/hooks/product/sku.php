<?php

if( ! function_exists( 'ads_getImages' ) ) {

	function ads_getImages( $img, $size = 'full' ) {

		if ( $img && function_exists( 'ads_is_url' ) && ads_is_url( $img ) ) {
			return $img;
		} elseif ( $img && is_numeric( $img ) ) {
			return function_exists( 'ads_get_image_by_id' ) ? ads_get_image_by_id( $img , $size ) : false;
		}
		
		return false;
	}
}
/**
 * Show SKU parameters from product
 *
 * @param $sku
 */
function adstm_single_sku( $sku, $skuAttr ) {

	if( ! $sku || !$skuAttr ) {
		return;
	}
	
	$foo = [];
	foreach( $sku as $key => $value ) {
		$foo[ $value[ 'prop_id' ] ][ 'title' ]          = $value[ 'prop_title' ];
		$foo[ $value[ 'prop_id' ] ][ 'params' ][ $key ] = $value;
	}

    foreach( $skuAttr as $key => $value ) {
        $skuAttr[ $key ]['quantity'] = rand(cz( 'tp_single_stock_min' ), cz( 'tp_single_stock_max' ));
    }


	echo '<script type="text/javascript">
			window.skuAttr = ' . json_encode( $skuAttr ) . ';
			window.sku = ' . json_encode( $sku ) . ';
		</script>';

	$skuBox = '';
    $url_sku = '';
    $force_url_sku = '';
    $is_get = 0;
    $is_get_index = 0;

    $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';

    if( isset( $_GET[ 'sku' ] ) ) {
        $url_sku = esc_attr( $_GET[ 'sku' ] );

        $force_url_sku = 'force_url_sku';
        $is_get = 1;
        $value_arr = explode(';',$url_sku);
    }

	foreach( $foo as $i => $v ) {
		if( ! empty( $v[ 'params' ] ) ) {

			$items = '';
			$value = '';
			$type  = 'text';
			$p     = 0;

			
			foreach( $v[ 'params' ] as $keySku => $val ) {
				
				$p ++;
				
				if( ! empty( $val ) ) {

					$class = '';
					if ( $p == 1 && cz('tp_single_enable_pre_selected_variation')) {
						$class = 'active';
					}

					$title   = isset( $val[ 'title' ] ) ? trim( $val[ 'title' ] ) : '';
					$img     = ads_getImages( $val[ 'img' ],'ads-thumb' );
					$img     = ( $img != '' && ads_is_url( $img ) ) ? $img : '';
					$img_big = isset( $val[ 'img_big' ] ) && $val[ 'img_big' ] != '' ? ads_getImages( $val[ 'img_big' ] ): false;
					$img_big = $img_big && ads_is_url( $val[ 'img_big' ] ) ? $img_big : $img;

                    if( $img ) {

                        $is_aliexpress_path = strripos( $img, 'alicdn.com' );

                        if( $is_aliexpress_path === false ) {
                            $img_big = ads_getImages( $val[ 'img' ], 'full' );
                        } else {
                            $img_big = ads_get_size_img( $img, 'ads-large' );
                            $img     = ads_get_size_img( $img, 'ads-small' );
                        }
                    }

					if ( $img != '' ) {
						$type   = 'img';
						$items .= sprintf(
							'<span class="js-sku-set meta-item meta-item-img %7$s" data-set="%4$d" data-meta="%5$d" data-title="%3$s">
                                     <img %8$s="%1$s" data-img="%2$s" class="img-responsive" title="%3$s">
                                    <input type="hidden" name="sku-meta" value="%6$s" id="check-%4$d-%5$d">
                                </span>',
							$img, $img_big, $title, $i, $p, $keySku, $class, $src
						);
					} else {
						$items .= sprintf(
							'<span class="js-sku-set meta-item meta-item-text %5$s" data-set="%2$d" data-meta="%3$d" data-title="%1$s">%1$s
                            <input type="hidden" name="sku-meta" value="%4$s" id="check-%2$d-%3$d">
                            </span>',
							$title,
							$i,
							$p,
							$keySku,
							$class
						);
					}

					if ( $p == 1 ) {
						$value = $keySku;

					}
				}
			}

            if($is_get){
                $value = $value_arr[$is_get_index];
            }



			if ( $items != '' ) {
				$skuBox .= sprintf(
					'<div class="js-item-sku sku-row sku-%6$s">
                        <div class="name">%1$s</div><div class="value_cont"><div class="value">%2$s</div></div>
                        <div class="sku-warning" style="display:none">%4$s: %1$s</div>
                        <span class="sku_view_all">View All</span>
                        <span class="sku_view_less">View Less</span>
                        <input type="hidden" id="js-set-%3$d" name="sku-meta-set[]" value="%5$s">
                    </div>',
					$v[ 'title' ].":",
					$items,
					$i,
					__( 'Please select', 'elgreco' ),
					$value,
					$type
				);
			}
		}

        $is_get_index++;
	}

	printf('<div class="js-product-sku product-sku js-empty-sku-view %2$s" style="display: none">%1$s</div>', $skuBox, $force_url_sku);
}
add_action( 'adstm_single_sku', 'adstm_single_sku', 10, 2 );