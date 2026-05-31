<?php get_header() ?>
<?php $home_url = home_url();
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
?>

    <?php if(cz('tp_home_slider_enable')){ ?>
        <div class="home-slider" style="opacity: 0"
             data-auto="<?php echo cz( 'tp_home_slider_rotating' ) ? 'true' : 'false' ?>"
             data-time="<?php echo cz( 'tp_home_slider_rotating_time' ) ?
                 cz( 'tp_home_slider_rotating_time' ) . '000' : '4000' ?>"
        >
            <?php do_action( 'ads_top_category' ) ?>
        </div>
    <?php } ?>

    <!-- MOST POPULAR CATEGORIES -->
    <?php if(cz('most_popular_enable')){?>
    <div id="most-popular-categories" class="most-popular-categories">
        <div class="container">
            <div class="p-heading">
                <h3 class="p-title">
                    <a href="<?php echo  cz('most_popular_link_head'); ?>"><?php echo  cz('most_popular_head'); ?></a>
                </h3>
            </div>
            <div class="row wrap-slider-most">
                    <?php $mp = cz('most_popular_list');
                     $class_bg = cz('most_popular_fix') ? 'active' : '';
                     ?>
                <div class="slider-most <?php if(count($mp)<4){ ?>few<?php } ?>">
                    <?php foreach ($mp as $item){
                        printf('<div class="wrap-item"><a href="%1$s"> <div class="bg %4$s"> <div class="bg-img"> <img %7$s="%2$s?1000" alt=""> <div style="background: %6$s;" class="bg-over"></div> </div> <div style="color: %5$s"> <div class="text">%3$s</div> </div> </div> </a></div>',
                            $item['link'],
                            $item['image'],
                            $item['name'],
                            $class_bg,
                            isset($item['color']) ? $item['color'] : '#fff',
                            isset($item['bg_color']) ? $item['bg_color'] : 'rgba(0,0,0,.3)',
                            'src'
                        );
                    } ?>
                    </div>

            </div>
        </div>
    </div>
    <?php } ?>

<?php
if( cz( 'home_featured_ones' ) ){ ?>
    <div id="home-featured-ones" class="aship-box-products list-product home-featured-ones">
        <div class="container">
            <div class="p-heading">
                <h3 class="aship-title p-title">
                    <span><?php _cz( 'home_featured_title' ); ?></span>
                </h3>
            </div>
            <div class="row">
                <?php do_action('adstm_start_loop_featured_product', 8);
                get_template_part('template/loop/home/loop'); ?>
            </div>
        </div>
    </div>
<?php }
if( cz( 'tp_top_selling' ) ){ ?>
    <div id="top-selling-product" class="aship-box-products list-product top-selling-product">
        <div class="container">
            <div class="p-heading">
                <h3 class="aship-title p-title">
                    <a href="<?php echo $home_url?>/product/?orderby=orders"><?php _cz( 'tp_top_selling_label' ); ?></a>
                </h3>
            </div>
            <div class="row">
				<?php get_template_part( 'template/loop/home/_topselling' ); ?>
            </div>
        </div>
    </div>
<?php }
if( cz( 'tp_best_deals' ) ){ ?>
    <div id="best-deals" class="aship-box-products list-product best-deals">
        <div class="container">
            <div class="p-heading">
                <h3 class="aship-title p-title">
                    <a href="<?php echo $home_url?>/product/?orderby=discount"><?php _cz( 'tp_best_deals_label' ); ?></a>
                </h3>
            </div>
            <div class="row">
				<?php get_template_part( 'template/loop/home/_bestdials' ); ?>
            </div>
        </div>
    </div>
<?php }
if( cz( 'tp_new_arrivals' ) ){ ?>
    <div id="new-arrivals" class="aship-box-products list-product new-arrivals">
        <div class="container">
            <div class="p-heading">
                <h3 class="aship-title p-title">
                    <a href="<?php echo $home_url?>/product/?orderby=newest"><?php _cz( 'tp_new_arrivals_label' ); ?></a>
                </h3>
            </div>
            <div class="row">
				<?php get_template_part( 'template/loop/home/_arrivals' ); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if(cz('testimonials_enabled')):?>

    <div id="review-home" class="review-home">
        <div class="container">
            <div class="slider-review"
                 data-auto="<?php echo cz( 'testimonials_rotating' ) ? 'true' : 'false' ?>"
                 data-time="<?php echo cz( 'testimonials_rotating_time' ) ?
                     cz( 'tp_home_slider_rotating_time' ) . '000' : '4000' ?>">
                <?php foreach (cz('testimonials') as $item):?>
                <div class="">
                    <div class="user"><img <?php echo $src ?>="<?php echo $item['image'] ?>?1000" alt=""></div>
                    <div class="name"><?php echo $item['country'] ?></div>
                    <div class="text"><?php echo $item['text'] ?></div>
                    <div class="star">
                        <span class="starRating">
                            <div class="stars">
                                <?php for($i=1;$i<=5;$i++){
	                                printf('<span class="star %1$s"></span>', $item['stars'] >= $i ? 'star-full' : 'star-no');
                                }?>

                            </div>
                        </span>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php endif;?>

<?php if ( cz('s_in_name_api') ): ?>

    <div id="instagram-home">
        <div class="p-heading">
            <h3 class="p-title">
                <a target="_blank" href="https://www.instagram.com/<?php echo cz('s_in_name_api'); ?>"><?php echo cz('s_in_name_group'); ?></a>
            </h3>
        </div>
        <div class="instagram-user">#<?php echo cz('s_in_name_api'); ?></div>
        <div class="">
            <div class="slider-instagram">
                <?php get_template_part( 'template/social' ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(cz('home_blog_enable')):?>
    <?php get_template_part( 'template/home/blog' ); ?>
<?php endif;?>


<?php if(cz('tp_home_article')):?>
    <div class="home_article">
        <div class="container">
            <?php do_action( 'adstm_home_article' ) ?>
        </div>
    </div>
<?php endif;?>

<?php
if(cz( 'tp_subscribe_show' )){
    _cz( 'tp_subscribe' );
}
get_template_part( 'template/widget/_features' );
get_footer() ?>