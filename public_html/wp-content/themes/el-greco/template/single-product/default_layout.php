<?php
do_action( 'adstm_init_product' );

global $ADSTM;

$product = $ADSTM[ 'product' ];
$review  = $ADSTM[ 'review' ];
$info    = $ADSTM[ 'info' ];


if ( have_posts() ) : while ( have_posts() ) : the_post();

    $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';

    get_header(null,[$product]);

    get_template_part( 'template/single-product/review_count' );
    get_template_part( 'template/single-product/str_data' );

    ?>

    <div class="single">
        <div class="container">
            <div class="breadcrumbs">
                <?php adsTmpl::breadcrumbs() ?>
            </div>
            <div class="single_split"  data-id="<?php echo $post->ID; ?>" <?php if(isset($product[ 'gallery' ][0]['full'])){
                echo 'data-mediaimg="'.$product[ 'gallery' ][0]['full'].'"';
            } ?>>
                <div class="single_splitL">
                    <?php do_action( 'adstm_single_gallery', $product[ 'gallery' ],$product[ 'video' ]) ?>
                </div>
                <div class="single_splitR">
                    <?php do_action( 'adstm_start_form_product' ) ?>
                    <?php do_action( 'adstm_single_gallery_adap', $product[ 'gallery' ],$product[ 'video' ]) ?>
                    <h1 class="h4" itemprop="name"><?php the_title() ?></h1>
                    <div class="rate_flex">
                        <?php
                        if ( cz( 'tp_tab_reviews' ) ) {
                            if ($product['rate'] > 0 && $review->countFeedback() > 0) {
                                printf('<div class="rate"><div class="starscont">%s <div class="call-item toreview"> <span class=""><u>%s %s</u></span></div></div></div>',
                                    $info->starRating(false),
                                    $review->countFeedback(),
                                    $review->countFeedback() > 1 ? __('Reviews', 'elgreco') : __('Review', 'elgreco')
                                );
                            }
                        }else{
                            if ($product['rate'] > 0) {
                                printf('<div class="rate"><div class="starscont">%s </div></div>',
                                    $info->starRating(false)
                                );
                            }
                        }
                        if(cz( 'tp_share_fb') && cz('s_link_fb')){ ?>
                            <div class="fb_cont">
                                <div class="fb-like" data-href="<?php _cz('s_link_fb'); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                            </div>
                        <?php }else{
                            if( cz( 'tp_share' )){ ?>
                                <div class="single-socs">
                                    <div class="sharePopup"><div class="share-btn socs whitesocs"></div></div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <div class="meta">
                        <div class="price_save_flex">
                            <div class="priceflex">
                                <div class="newprice" data-productPriceBox="salePrice">
                                    <span data-singleProduct="savePrice" class="price color-orange color-custom cz_price_text_color"></span>
                                </div>
                                <div class="oldprice" data-singleProductBox="price">
                                    <span data-singleProduct="price"></span>
                                </div>
                            </div>
                            <?php if(cz( 'tp_sale_badge2_enable' )){ ?>
                                <div class="yousave_block" data-singleProductBox="savePercent" style="display:none;">
                                    <?php _e( 'You save', 'elgreco' ); ?>
                                    <span data-singleproduct="savePercent"></span> (<span data-singleproduct="save"></span>)
                                </div>
                            <?php }?>
                        </div>
                        <div style="display:none;">
                            <?php echo $product[ 'renderShipping' ]; ?>
                        </div>
                        <?php do_action('after_meta_info');?>
                        <div class="sku-listing js-empty-sku-view scroll_x_sku" data-select="Please select">
                            <?php do_action( 'adstm_single_sku', $product[ 'sku' ], $product[ 'skuAttr' ] ) ?>
                        </div>

                        <?php if(cz('tp_size_chart') && isset($product['sizeAttr']) && is_array($product['sizeAttr']) && isset($product['sizeAttr']['title']) && isset($product['sizeAttr']['list'])){ ?>
                            <div class="size_chart_cont">
                                <a href="" class="size_chart_btn"><?php _e( 'Size Guide', 'elgreco' ); ?></a>
                            </div>
                            <div class="chart_modal">
                                <div class="chart_modal_inner">
                                    <div class="chart_modal_block">
                                        <span class="chart_close"></span>
                                        <div class="chart_table_block">
                                            <table class="size_chart_table">
                                                <tr>
                                                    <?php foreach ($product['sizeAttr']['title'] as $k => $v){
                                                        echo '<th>'.$v.'</th>';
                                                    } ?>
                                                </tr>
                                                <?php foreach ($product['sizeAttr']['list'] as $k => $v){ ?>
                                                    <tr>
                                                        <?php foreach ($v as $v2){
                                                            echo '<td>'.$v2.'</td>';
                                                        } ?>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        do_action('ads_template_single_sku_after', $post->ID); ?>
                        <div class="unite_border">
                            <div class="box-input_quantity">
                                <?php if ( adsTmpl::product('stock' ) != 0 ){ ?>
                                    <div class="input_quantity">
                                        <div class="name"><?php _e( 'Quantity', 'elgreco' ); ?>:</div>
                                        <div class="value with_stock_flex">
                                            <div class="select_quantity js-select_quantity">
                                                <button type="button" class="select_quantity__btn js-quantity_remove">&minus;</button>
                                                <input class="js-single-quantity" data-singleProductInput="quantity" name="quantity" type="number" value="1" min="1" max="999" maxlength="3" autocomplete="off" />
                                                <button type="button" class="select_quantity__btn js-quantity_add">&plus;</button>
                                            </div>
                                            <?php
                                            if(cz('tp_stock_display')=='badge'){ ?>
                                                <div class="instockone">
                                                    <div class="stock" data-singleProductBox="stock">
                                                        <?php _e( 'In Stock', 'elgreco' ); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if(cz('tp_stock_display')=='count'){ ?>
                                                <div class="instockone">
                                                    <div class="stock">
                                                        <span data-singleProduct="stock"></span> <?php _e( 'in Stock', 'elgreco' ); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <input class="js-single-quantity" data-singleProductInput="quantity" name="quantity" type="hidden" value="1" min="1" max="999" maxlength="3" autocomplete="off" />
                                    <div class="stock outofstock" data-singleProductBox="stock">
                                        <?php _e('Out of stock', 'elgreco'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $tp_shipping_tip = cz('tp_shipping_tip');
                    $tp_shipping_tip_img = cz('tp_shipping_tip_img');
                    $tp_returns_tip = cz('tp_returns_tip');
                    $tp_returns_tip_img = cz('tp_returns_tip_img');

                    if(cz('tp_bens_show')){ ?>
                        <div class="info-shipping-cont">
                            <?php
                            if($tp_shipping_tip || $tp_shipping_tip_img){?>
                                <div class="info-shipping"><?php
                                    if($tp_shipping_tip_img){ ?><img <?php _czsrc('tp_shipping_tip_img'); ?> <?php echo $src; ?>="<?php echo $tp_shipping_tip_img; ?>" alt=""><?php }
                                    ?>
                                    <span <?php _cztxt('tp_shipping_tip'); ?>><?php echo $tp_shipping_tip; ?></span>

                                </div>
                            <?php }
                            if($tp_returns_tip || $tp_returns_tip_img){?>
                                <div class="info-returns"><?php
                                    if($tp_returns_tip_img){ ?><img <?php _czsrc('tp_returns_tip_img'); ?> <?php echo $src; ?>="<?php echo $tp_returns_tip_img; ?>" alt=""><?php } ?>
                                    <span <?php _cztxt('tp_returns_tip'); ?>><?php echo $tp_returns_tip; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }
                    do_action('ads_single_product_before_product_actions', $post->ID);?>

                    <div class="singlecartplate">
                        <div class="add_btn">
                            <div class="adap_prices">
                                <div class="newprice" data-productpricebox="salePrice">
                                    <span data-singleproduct="savePrice" class="price"></span>
                                </div>
                                <?php if ( $product[ '_price' ] > 0 && $product[ '_price' ] !== $product[ '_salePrice' ] ){ ?>
                                    <div class="oldprice" data-productpricebox="price">
                                        <span data-singleproduct="price"></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <input type="hidden" name="post_id" value="<?php echo $product['post_id']; ?>"/>
                            <button type="button" id="addToCart"
                                    class="btn btn-primary btn-lg b-add_order__btn_addcart js-addToCart">
                                <?php _e( 'Add to Cart', 'elgreco' ) ?>
                            </button>
                        </div>

                        <div class="view_cart_cont"><span class="view_cart"><?php _e( 'View Cart', 'elgreco' ) ?></span></div>
                        <?php if(function_exists('isExpressCheckoutEnabled') && isExpressCheckoutEnabled()){
                            echo apply_filters(
                                'ads_paypal_button',
                                '<div class="buynow_btn">
                                        <button type="submit" id="buyNow" class="btn btn-lg b-add_order__btn" name="pay_express_checkout">'.__( 'Buy with', 'elgreco' ).' <i class="ico-paypal"></i></button>
                                    </div>'
                            );
                        }

                        if(cz( 'tp_show_payment_methods' )){ ?>
                            <div class="info-secure">
                                <div class="head"><span <?php _cztxt( 'tp_guarantee_safe' ); ?>><?php _cz( 'tp_guarantee_safe' ); ?></span></div>
                                <ul>
                                    <li><img <?php _czsrc('single_payment_icons_1'); ?> <?php echo $src; ?>="<?php _cz('single_payment_icons_1'); ?>" alt=""></li>
                                    <li><img <?php _czsrc('single_payment_icons_2'); ?> <?php echo $src; ?>="<?php _cz('single_payment_icons_2'); ?>" alt=""></li>
                                    <li><img <?php _czsrc('single_payment_icons_3'); ?> <?php echo $src; ?>="<?php _cz('single_payment_icons_3'); ?>" alt=""></li>
                                    <li><img <?php _czsrc('single_payment_icons_4'); ?> <?php echo $src; ?>="<?php _cz('single_payment_icons_4'); ?>" alt=""></li>
                                    <li><img <?php _czsrc('single_payment_icons_5'); ?> <?php echo $src; ?>="<?php _cz('single_payment_icons_5'); ?>" alt=""></li>
                                    <li><img <?php _czsrc('single_payment_icons_6'); ?> <?php echo $src; ?>="<?php _cz('single_payment_icons_6'); ?>" alt=""></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                    <?php do_action( 'adstm_end_form_product' );
                    if(defined( 'SLV_ERROR' ) || defined( 'SELLVIA_ERROR' )){ ?>
                        <div class="excerpt_cont">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
            $store_benefits = cz( 'store_benefits' );
            if ( cz('store_benefits_enable') ){ ?>
                <!-- FEATURES -->
                <div class="wrap-features store_benefits">
                    <div class="features">
                        <?php if($store_benefits['item'][0]['img'] || $store_benefits['item'][0]['head']|| $store_benefits['item'][0]['text']){ ?>
                            <div class="">
                                <?php if($store_benefits['item'][0]['img']){ ?>
                                    <div class="img-feat">
                                        <img <?php _czsrc('store_benefits_img_key0'); ?> <?php echo $src; ?>="<?php echo $store_benefits['item'][0]['img']; ?>" alt="">
                                    </div>
                                <?php } ?>
                                <div class="text-feat">
                                    <div class="features-main-text">
                                        <span <?php _cztxt('store_benefits[item][0][head]'); ?>><?php echo $store_benefits['item'][0]['head']; ?></span>
                                        <?php
                                        setlocale(LC_ALL, cz('store_benefits_days_lang2'));
                                        define("CHARSET", "iso-8859-1");
                                        echo date('l, d F',
                                            apply_filters( 'store_benefits_days', strtotime('today + '.cz('store_benefits_days').' days') )
                                        );
                                        ?>
                                    </div>
                                    <p <?php _cztxt('store_benefits[item][0][text]'); ?>><?php echo $store_benefits['item'][0]['text']; ?></p>
                                </div>
                            </div>
                        <?php }
                        if($store_benefits['item'][1]['img'] || $store_benefits['item'][1]['head']|| $store_benefits['item'][1]['text']){ ?>
                            <div class="">
                                <?php if($store_benefits['item'][1]['img']){ ?>
                                    <div class="img-feat">
                                        <img <?php _czsrc('store_benefits_img_key1'); ?> <?php echo $src; ?>="<?php echo $store_benefits['item'][1]['img']; ?>" alt="">
                                    </div>
                                <?php } ?>
                                <div class="text-feat">
                                    <div class="features-main-text" <?php _cztxt('store_benefits[item][1][head]'); ?>>
                                        <?php echo $store_benefits['item'][1]['head']; ?>
                                    </div>
                                    <p <?php _cztxt('store_benefits[item][1][text]'); ?>><?php echo $store_benefits['item'][1]['text']; ?></p>
                                </div>
                            </div>
                        <?php }
                        if($store_benefits['item'][2]['img'] || $store_benefits['item'][2]['head']|| $store_benefits['item'][2]['text']){ ?>
                            <div class="">
                                <?php if($store_benefits['item'][2]['img']){ ?>
                                    <div class="img-feat">
                                        <img <?php _czsrc('store_benefits_img_key2'); ?> <?php echo $src; ?>="<?php echo $store_benefits['item'][2]['img']; ?>" alt="">
                                    </div>
                                <?php } ?>
                                <div class="text-feat">
                                    <div class="features-main-text" <?php _cztxt('store_benefits[item][2][head]'); ?>>
                                        <?php echo $store_benefits['item'][2]['head']; ?>
                                    </div>
                                    <p <?php _cztxt('store_benefits[item][2][text]'); ?>><?php echo $store_benefits['item'][2]['text']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }

            do_action('ads_single_product_before_content'); ?>

            <div class="single_item_content">
                <?php get_template_part( 'template/single-product/content' ); ?>
            </div>

            <?php if ( cz( 'tp_tab_reviews' ) ) comments_template( '/template/single-product/_review.php' ); ?>

        </div>

        <?php if( cz( 'tp_related' ) ){
            do_action('adstm_start_loop_related_product', 8);
            if ( have_posts() ){ ?>
                <div class="recs_slider_cont">
                    <div class="container">
                        <h3><?php _e( 'You may also like', 'elgreco' ) ?></h3>
                        <div class="recs_slider">
                            <?php while ( have_posts() ) :	the_post();
                                echo '<div class="item">';
                                do_action('adstm_product_item', 'ads-large', true);
                                echo '</div>';
                            endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php }
            do_action('adstm_end_loop_product');

        }
        if( cz( 'tp_recently' ) ){
            get_template_part( 'template/product/main-recently' );
        } ?>
    </div>
    <?php if(cz('tp_trustbox_enable') && cz('tp_trustbox_code')){ ?>
        <div class="pilot_cont">
            <div class="container">
                <?php _cz('tp_trustbox_code'); ?>
            </div>
        </div>
    <?php }

    get_template_part( 'template/widget/_features' );

endwhile;
endif;
get_footer();