<?php get_header();

    global $wp_query;

    if(cz( 'tp_item_imgs_lazy_load' )){
        $src =  'data-src';
        $src_swiper = 'data-lazy';
    }else{
        $src = 'src';
        $src_swiper = 'src';
    }

    $tp_home_slider_full = cz('tp_home_slider_full');


?>
<div class="main">
    <?php if(cz('tp_home_slider_enable')){ ?>
        <style>
            <?php foreach( cz( 'slider_home' ) as $key => $item ) { ?>
            :root{
                --text-color-key<?php echo $key; ?>:<?php echo $item[ 'text_color' ]; ?>;
            <?php
        if ($item[ 'img_adap' ]){
            echo '--mainslider-img-key'.$key.':url('.$item[ 'img' ].');';
            echo '--mainslider-img-adap-key'.$key.':url('.$item[ 'img_adap' ].');';
        }else{
            echo '--mainslider-img-key'.$key.':url('.$item[ 'img' ].');';
        }
             ?>
            }
            .mainslider .scene<?php echo $key; ?> h2{color:var(--text-color-key<?php echo $key; ?>);}
            <?php

                $loaded = $key>0 ? '.tt_inited .loaded' : '';


                if ($item[ 'img_adap' ]){

                    printf('@media(min-width:768px){ %2$s .scene%1$s {background: var(--mainslider-img-key%1$s) no-repeat center center transparent;background-size:cover;} }
                        @media(max-width:767px){ %2$s .scene%1$s {background: var(--mainslider-img-adap-key%1$s) no-repeat center center transparent;background-size:cover;} }
                        ',$key
                        ,$loaded
                        );
                }else{

                    echo sprintf('%2$s .scene%1$s {background: var(--mainslider-img-key%1$s) no-repeat center center transparent;background-size:cover;}'
                        ,$key
                        ,$loaded
                        );
                }


            } ?>
        </style>

        <div class="mainowl <?php if(!$tp_home_slider_full){ echo "mainowl_wrap";}?>"
             data-auto="<?php echo cz( 'tp_home_slider_rotating' ) ? 'true' : 'false' ?>"
             data-automob="<?php echo cz( 'tp_home_slider_rotating_mob' ) ? 'true' : 'false' ?>"
             data-time="<?php echo cz( 'tp_home_slider_rotating_time' ) ?
                 cz( 'tp_home_slider_rotating_time' ) . '000' : '4000' ?>" >
                <?php
                $btmVideo = '';
                if( cz( 'id_video_youtube_home' ) ) {
                    $btmVideo = sprintf(
                        '<div %1$s href="https://youtu.be/%2$s" rel="%2$s" class="view_video youtube"><i class="icon-play"></i> %3$s</div>',
                        czhref('id_video_youtube_home'),
                        cz( 'id_video_youtube_home' ),
                        __('View video','elgreco')
                    );
                }

                $btmVideo_one_slider = true;
                foreach( cz( 'slider_home' ) as $key => $item ) {
                    $emptyTextClass   = ! $item[ 'text' ] ? 'emptyText' : '';
                    $shop_now_enabled = isset( $item[ 'shop_now_enabled' ] ) ? $item[ 'shop_now_enabled' ] : true;
                    if ( ! $item[ 'img' ] )
                        continue;
                    printf(
                        '<div class="item swiper-slide">
                                <div class="bgr_block scene_block scene'.$key.' %4$s %8$s %9$s">
                                    <div class="container">
                                        %5$s
                                        <div class="prime_block">
                                            
                                            %6$s class="prime_block_header">
                                                <h2 %10$s style="color:'.$item[ 'text_color' ].'">%1$s</h2>
                                            %7$s
                                            <div class="prime_block_cta">
                                                %2$s %3$s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
                        trim($item[ 'text' ]),
                        $shop_now_enabled ? '<a '.czhref('slider_home['.$key.'][shop_now_link]').'  '.cztxt('slider_home['.$key.'][button_text]').' class="btn btn-prime" style="" href="'.$item[ 'shop_now_link' ].'">'.$item[ 'button_text' ].'</a>' : '',
                        $btmVideo_one_slider ? $btmVideo : '',
                        $shop_now_enabled ? '' : 'full_a_link_cont',
                        $shop_now_enabled ? '' : '<a '.czhref('slider_home['.$key.'][shop_now_link]').' class="full_a_link" href="'.$item[ 'shop_now_link' ].'"></a>',
                        $item[ 'shop_now_link' ] ? '<a '.czhref('slider_home['.$key.'][shop_now_link]').' href="'.$item[ 'shop_now_link' ].'"' : '<div',
                        $item[ 'shop_now_link' ] ? '</a>' : '</div>',
                        isset($item[ 'home_position' ]) ? $item[ 'home_position' ] : 'left_block',
                        isset($item[ 'home_position_mob' ]) ? $item[ 'home_position_mob' ] : 'left_block_mob',
                        cztxt('slider_home['.$key.'][text]')

                    );
                    $btmVideo_one_slider = false;
                } ?>
        </div>
    <?php } ?>

    <?php if(cz('home_h1')){ ?>
        <div class="home_h1 <?php if(!cz('home_h1_visible')){?>sr_only<?php } ?>">
            <div class="container">
                <h1 <?php _cztxt('home_h1'); ?>><?php _cz('home_h1'); ?></h1>
            </div>
        </div>
    <?php } ?>

    <?php if(cz('tp_most_popular_enable')){ ?>

        <div class="most_popular_cats">

            <h2 <?php _cztxt('tp_most_popular_heading'); ?>><?php _cz('tp_most_popular_heading'); ?></h2>
            <div class="container">
                <?php if(cz('most_popular_items')){ ?>
                <div class="most_popular_slider" >
                    <?php foreach( cz( 'most_popular_items' ) as $key => $item ) {
                        printf(
                            '<div class="item %s">
                                    %s
                                    <a %s href="%s" style="%s">
                                        %s %s                      
                                    </a>
                                </div>',
                            $item['desc'] ? 'with_desc' : '',
                                $item['image'] ? '<div class="most_image_cont"><img '.$src_swiper.'="'.$item['image'].'" alt=""></div>' : '',
                                czhref('most_popular_items['.$key.'][link]'),
                                $item['link'],
                                $item['bg_color'] ? ' background:'.$item['bg_color'] : '',

                                $item['name'] ? '<span '.cztxt('most_popular_items['.$key.'][name]').' class="most_name">'.$item['name'].'</span>  ' : '',
                                $item['desc'] ? '<span '.cztxt('most_popular_items['.$key.'][desc]').' class="most_desc">'.$item['desc'].'</span>  ' : ''


                        );
                    } ?>
                </div>
                <?php }; ?>
            </div>
        </div>
    <?php } ?>

        <div class="main_catalog">
            <div class="catalogs">

                <?php if(cz('home_featured_ones')):?>
                    <div class="catalog_one_cont aship-box-products" id="featuredones">
                        <div class="container">
                            <div class="cat_one ">
                                <span <?php _cztxt('home_featured_title'); ?>><?php _cz('home_featured_title'); ?></span>
                            </div>
                            <div class="catalog_one products_cont" >
                                <?php

                                do_action('adstm_start_loop_featured_product', 12);
                                get_template_part('template/loop/home/loop'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php if(cz('home_top_deals')):?>
                    <div class="catalog_one_cont aship-box-products" id="topdeals">
                        <div class="container">
                            <div class="cat_one ">
                                <a <?php _cztxt('home_top_deals_title'); ?> class="aship-title" href="<?php echo adstm_home_url( 'product' ) ?>?orderby=discount" data-id="topdeals"><?php _cz('home_top_deals_title'); ?></a>
                            </div>
                            <div class="catalog_one products_cont" >
                                <?php
                                do_action('adstm_start_loop_bestdials_product', intval(cz('home_deals')));
                                get_template_part('template/loop/home/loop'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php if(cz('home_new_in')):?>

                    <div class="catalog_one_cont aship-box-products" id="newin">
                        <div class="container">
                            <div class="cat_one container">
                                <a <?php _cztxt('home_new_in_title'); ?> class="aship-title" href="<?php echo adstm_home_url( 'product' ) ?>?orderby=newest"  data-id="newin"><?php _cz('home_new_in_title'); ?></a>
                            </div>
                            <div class="catalog_one products_cont">
                                <?php do_action('adstm_start_loop_arrivals_product', intval(cz('home_newin')));
                                get_template_part('template/loop/home/loop'); ?>
                            </div>
                        </div>
                    </div>

                <?php endif;?>
                <?php if(cz('home_most_liked')):?>
                    <div class="catalog_one_cont aship-box-products" id="mostliked">
                        <div class="container">
                            <div class="cat_one container">
                                <a <?php _cztxt('home_most_liked_title'); ?> class="aship-title" href="<?php echo adstm_home_url( 'product' ) ?>?orderby=orders" data-id="mostliked"><?php _cz('home_most_liked_title'); ?></a>
                            </div>
                            <div class="catalog_one products_cont">
                                <?php do_action('adstm_start_loop_topselling_product', intval(cz('home_liked')));
                                get_template_part('template/loop/home/loop'); ?>
                            </div>
                        </div>
                    </div>

                <?php endif;?>
            </div>
        </div>


    <?php if(cz('testimonials_enabled')){ ?>
    <div class="why_us_cont">



        <div class="why_slider" data-rotation="<?php _cz('testimonials_rotating'); ?>" data-time="<?php _cz('testimonials_rotating_time'); ?>000">
            <?php foreach( cz( 'testimonials' ) as $key => $item ) { ?>
                <div class="item">
                    <div class="why_one">
                        <div class="why_img"><img <?php _czsrc('testimonials_image_key'.$key); ?> <?php echo $src; ?>="<?php echo $item['image'] ?>" alt=""></div>
                        <div class="why_info">
                            <h4 <?php _cztxt('testimonials_title'); ?>><?php _cz('testimonials_title'); ?></h4>
                            <div class="why_plate">
                                <div class="why_img_author"><img <?php _czsrc('testimonials_image_man_key'.$key); ?> <?php echo $src; ?>="<?php echo $item['image_man'] ?>" alt=""></div>
                                <div class="why_author">
                                    <div class="stars">
                                        <?php for($i=1;$i<=5;$i++){
                                            printf('<span class="star %1$s"></span>', $item['stars'] >= $i ? 'star-full' : 'star-no');
                                        }?>

                                    </div>
                                    <div class="name" <?php _cztxt('testimonials['.$key.'][name]'); ?>><?php echo $item['name'] ?></div>
                                </div>
                            </div>
                            <div class="text" <?php _cztxt('testimonials['.$key.'][text]'); ?>><?php echo $item['text'] ?></div>
                        </div>
                    </div>

                </div>
            <?php } ?>

        </div>



    </div>
    <?php }; ?>

<!--    --><?php //get_template_part( 'template/social' ); ?>

    <?php if(cz('tp_home_article')):?>
        <?php do_action( 'adstm_home_article' ) ?>
    <?php endif;?>

    <?php if(cz('home_blog_enable')){
        query_posts( [
            'post_type'      => 'post',
            'posts_per_page' => 2,
        ] );

        if ( have_posts() ){ ?>
        <div class="stories">
            <div class="container">
                <h2 class="big_link"><a href="<?php echo adstm_home_url( 'blog' )?>"><?php _e( 'Blog', 'elgreco' ) ?></a></h2>
                <?php while( have_posts() ) : the_post(); ?>
                    <div class="story_one">
                        <a href="<?php the_permalink() ?>">
                            <span class="story_img"><img <?php echo $src; ?>="<?php echo theme_thumb_photo_url( $post->ID, 'large' ) ?>" alt=""/></span>

                            <span class="story_text"><b><?php the_title(); ?></b> <i><?php echo date_i18n( 'M j, Y', strtotime( get_the_date() ) )?></i>
                                <u><?php echo get_the_excerpt(); ?></u>
                            </span>
                        </a>
                    </div>
                <?php endwhile ?>
            </div>
        </div>

        <?php }
        wp_reset_query();
    }
    ?>
</div>

<?php
if(cz( 'tp_subscribe_show' )){
    ?>
    <div <?php _cztxt( 'tp_subscribe' ); ?>><?php _cz( 'tp_subscribe' ); ?></div>
    <?php

}
?>


<?php if(cz('tp_trustbox_enable') && cz('tp_trustbox_code')){ ?>
    <div class="pilot_cont">
        <div class="container" <?php _cztxt('tp_trustbox_code'); ?>>
            <?php _cz('tp_trustbox_code'); ?>
        </div>
    </div>
    <?php
}?>
<?php get_template_part( 'template/widget/_features' ); ?>

<?php get_footer() ?>