<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
    <?php do_action('adstm_init_product');
    $product = adsTmpl::product();
    $review = adsTmpl::review();
    $info = adsTmpl::singleProduct();

    $this_url = get_permalink();
    ?>

    <?php get_template_part( 'template/single-product/str_data' ); ?>

    <div class="breadcrumbs">
        <div class="container">
            <?php adsTmpl::breadcrumbs() ?>
        </div>
    </div>
    <div class="product-content"
        <?php if(isset($product[ 'gallery' ][0]['full'])){?>
            data-mediaimg="<?php echo $product[ 'gallery' ][0]['full']?>"
        <?php } ?>
    >
        <div class="container">

            <?php do_action('adstm_start_form_product'); ?>

            <div class="row">
                <div class="col-xs-60 product-content-left">

                    <div class="product-main">
                        <div class="wrap-tumb wrap-swim">
                            <div class="js-swim">
                                <?php if(cz('tp_show_discount')):?>
                                    <div class="youSave" data-singleProductBox="savePercent" style="display:none;">
                                        <span class="savePercent">-<span data-singleProduct="savePercent"></span>%</span>
                                    </div>
                                <?php endif;?>
                                <?php do_action('adstm_single_gallery', $product['gallery'] ,$product[ 'video' ] ); ?>

                            </div>
                        </div>

                        <div class="wrap-meta">
                            <div class="box-padding">
                                <h1 class="title-product"><?php the_title() ?></h1>

                                <div class="rate-price">
		                            <?php if(cz( 'tp_share' ) || cz('tp_tab_item_review')):?>
                                        <div class="box-rate-share">
				                            <?php if(cz('tp_tab_item_review')):?>
                                                <div class="rate toreview">
						                            <?php if ( $product['rate'] > 0 && $review->countFeedback() > 0 ):
							                            echo $info->starRating(false);
							                            printf('<div class="countFeedback"><span class="rate-info">%2$s</span> ('._n( '%s Review', '%s Reviews', $review->countFeedback(), 'rap' ).')</div>', $review->countFeedback(), $product['rate']);
							                            ?>
						                            <?php else: ?>

                                                        <div class="no-reviews">
                                                            <a title="<?php _e( 'Add review', 'rap' ); ?>" href="#box-feedback">
									                            <?php _e( 'There are no reviews yet', 'rap' ); ?>
                                                            </a>
                                                        </div>

						                            <?php endif; ?>
                                                </div>
				                            <?php endif; ?>
                                            <div class="hidden-xs">
					                            <?php do_action('adstm_single_share') ?>
                                            </div>
                                        </div>
		                            <?php endif; ?>

                                    <div class="price-rate">

                                        <div class="product-meta">
                                            <div class="price" data-singleProductBox="price" style="display:none;">
                                                <span class="value" data-singleProduct="price"></span>
                                            </div>

                                            <div class="salePrice" data-singleProductBox="salePrice" style="display:none;">
                                                <span class="value" data-singleProduct="savePrice"></span>
                                            </div>

                                            <div class="box-stock-desc hidden-xs">
                                                <span style="display: none;" data-singleProduct="stock"><?php echo $product[ 'stock' ]; ?></span>

					                            <?php if ($product['stock'] <= 0) : ?>
                                                    <input class="js-single-quantity" data-singleProductInput="quantity" name="quantity" type="hidden" value="1" min="1" max="999" maxlength="3" autocomplete="off" />
                                                    <div class="stock" data-singleProductBox="stock" itemprop="availability" href="http://schema.org/InStock">
							                            <?php _e('Out of stock', 'rap'); ?>
                                                    </div>
					                            <?php elseif(cz('tp_single_stock_enabled')):?>
                                                    <div style="display: none" class="stock" data-singleProductBox="stock" itemprop="availability" href="http://schema.org/InStock"><?php _e( 'Only', 'rap' ); ?>
                                                        <span data-singleProduct="stock"><?php echo $product['stock']; ?></span> <?php _e( 'left in stock', 'rap' ); ?>
                                                    </div>
					                            <?php endif; ?>
                                            </div>


                                            <div class="shipping" style="display:none;">
                                                <div class="name"><?php _e( 'Shipping', 'rap' ); ?>:</div>
					                            <?php echo $product[ 'renderShipping' ]; ?>
                                            </div>

                                        </div>


                                    </div>

                                </div>

                                <?php do_action('after_meta_info');?>

		                        <?php do_action('adstm_single_sku', $product[ 'sku' ], $product[ 'skuAttr' ]) ?>

                                <?php if(cz('tp_size_chart') && isset($product['sizeAttr']) && is_array($product['sizeAttr'])){ ?>
                                    <div class="size_chart_cont">
                                        <a href="" class="size_chart_btn"><?php _e( 'Size Guide', 'rap' ); ?></a>
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
                                <?php } ?>
                                
                                <?php do_action('ads_template_single_sku_after', $post->ID);?>
                                
                                <div class="box-input_quantity-mobile visible-xs" style="display: none">
	                                <?php get_template_part( 'template/single-product/meta/_input_quantity'); ?>
                                </div>

                                <div class="box-stock-mobile visible-xs">
		                            <?php if ($product['stock'] <= 0) : ?>
                                        <div class="stock" data-singleProductBox="stock">
				                            <?php _e('Out of stock', 'rap'); ?>
                                        </div>
		                            <?php elseif(cz('tp_single_stock_enabled')):?>
                                        <div style="display: none" class="stock" data-singleProductBox="stock"><?php _e( 'Only', 'rap' ); ?>
                                            <span data-singleProduct="stock"><?php echo $product['stock']; ?></span> <?php _e( 'left in stock', 'rap' ); ?>
                                        </div>
		                            <?php endif; ?>
                                </div>

                                <div class="single-totalOrder">
                                    <div class="box-total_price" style="display: none">
				                        <?php get_template_part( 'template/single-product/meta/_total_price'); ?>
                                    </div>

                                    <?php do_action('ads_single_product_before_product_actions', $post->ID);?>

                                    <?php if(cz('tp_single_shipping_description')):?>
                                    <div class="info-sipping"><img src="<?php echo get_template_directory_uri(); ?>/images/single/check.svg?1000" alt=""><?php echo cz('tp_single_shipping_description'); ?></div>
                                    <?php endif;?>

                                    <div class="box-input_quantity hidden-xs">
		                                <?php get_template_part( 'template/single-product/meta/_input_quantity'); ?>
                                    </div>

                                    <?php do_action('ads_countdown_timer', adsTmpl::product('post_id'));?>

			                        <?php $class = cz('add_fix') ? 'hidden-xs': ''; ?>
                                    <div class="box-btn">
                                        <div class=">">
		                                    <?php //TODO mobile in footer
		                                    if ($product[ 'stock' ] != 0 ) : ?>
                                                <div class="single-active-btn <?php echo $class;?>">
                                                <?php

                                                do_action('adstm_single_btn_add_to_cart') ?>
                                                </div>
		                                    <?php endif; ?>
                                            <div class="view_cart"><?php _e('View cart', 'rap');?></div>
		                                    <?php if(cz('tp_single_enable_payment_icons')):?>
                                                <div class="info-secure">
                                                    <div class="head"><span><?php echo cz('tp_single_enable_payment_text');?></span></div>
                                                    <ul>
	                                                    <?php
                                                        $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
                                                        $tmp = '<li><img '.$src.'="%s" alt=""></li>';
	                                                    tmpCz('single_payment_icons_1', $tmp);
	                                                    tmpCz('single_payment_icons_2', $tmp);
	                                                    tmpCz('single_payment_icons_3', $tmp);
	                                                    tmpCz('single_payment_icons_4', $tmp);
	                                                    tmpCz('single_payment_icons_5', $tmp);
	                                                    tmpCz('single_payment_icons_6', $tmp);
	                                                    ?>
                                                    </ul>
                                                </div>
		                                    <?php endif;?>




                                        </div>

                                    </div>
                                    <div class=""><?php do_action('adstm_single_btn_express_checkout_enabled');?></div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <?php do_action('adstm_end_form_product'); ?>
            <?php do_action('ads_single_product_before_content'); ?>
            <div class="row">

                <div class="col-xs-60">
                    <?php get_template_part( 'template/single-product/content' ); ?>
                </div>

                <div class="col-xs-60 single_share-mobile visible-xs">
                    <?php do_action('adstm_single_share') ?>
                </div>

            </div>

        </div>

        <div class="single_reverse">
            <?php if(cz('tp_tab_item_review')):?>
                <div class="container">

                    <div class="row">

                        <?php if(comments_open()):?>
                            <div class="col-xs-60">
                                <div id="box-feedback" class="feedback-title">
                                    <?php _cz('tp_tab_item_review_label');?>
                                </div>
                                <?php if($review->countFeedback() > 0):?>
                                    <div class="reviews-text"><img src="<?php echo get_template_directory_uri(); ?>/images/single/verified.svg" alt=""><?php _e('Our reviews are verified for authenticity', 'rap');?></div>
                                <?php else:;?>
                                    <div class="reviews-text"><?php _e('There are no reviews yet', 'rap');?></div>
                                    <span class="reviews-no starRating">
                                <div class="stars">
                                    <span class="star star-no"></span>
                                    <span class="star star-no"></span>
                                    <span class="star star-no"></span>
                                    <span class="star star-no"></span>
                                    <span class="star star-no"></span>
                                </div>
                            </span>
                                <?php endif; ?>
                                <?php get_template_part( 'template/single-product/tab/_feedback' ) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                </div>
            <?php endif; ?>
            <?php do_action('adstm_start_loop_related_product', 6);

            if ( have_posts() ) : ?>

                <div class="aship-box-products list-product recommended">
                    <div class="aship-title head">
                        <?php _e( 'You may also love', 'rap' );?>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <div class="js-slider-related">
                                    <?php while ( have_posts() ) :	the_post();

                                        do_action('adstm_iterator_loop_product');

                                        echo '<div class="">';

                                        echo '<div class="wrap_product">';

                                        do_action('adstm_product_item',  'ads-big', true);

                                        echo '</div>';
                                        echo '</div>';

                                    endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif;
            do_action('adstm_end_loop_product');?>


        </div>

    </div>

    <?php endwhile; endif; ?>


<?php get_footer(); ?>
