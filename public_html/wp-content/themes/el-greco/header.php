<!doctype html>
<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" href="<?php _cz( 'tp_favicon' ); ?>"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no, minimal-ui">
    <?php get_template_part('template/add_fonts');

    if(strripos($_SERVER['REQUEST_URI'],'/page/')){
        echo '<link rel="canonical" href="' . esc_url( stristr($_SERVER['REQUEST_URI'],'page/',true) ) . "\" />\n";
    }

    if(is_front_page()){
        get_template_part('template/add_fonts_slider');
    }

    global $ADSTM;
    if(isset($ADSTM[ 'product' ])){
        $product = $ADSTM[ 'product' ];
        if(isset($product[ 'gallery' ][0]['full'])){?>
            <meta property="og:image" content="<?php echo $product[ 'gallery' ][0]['full']; ?>"/>
            <meta property="og:image:width" content="768" />
            <meta property="og:image:height" content="768" />
        <?php }
    }

    \ads\adsTmpl::meta();
    wp_head();
    ?>
    <style><?php echo cz('tp_style') ?></style>
    <?php echo cz( 'tp_head' );

    $body_classes         = [];
    $current_post_type    = get_post_type( get_the_ID() );
    $post_type_is_product = $current_post_type === 'product';
    array_push( $body_classes, 'flash' );

    if(!cz( 'tp_sticky_header' ))
        array_push( $body_classes, 'non_sticky_header' );

    if(!cz( 'tp_sticky_header_mob' ))
        array_push( $body_classes, 'non_sticky_header_mob' );

    if( cz( 'tp_item_imgs_lazy_load' ))
        array_push( $body_classes, 'js-items-lazy-load' );

    if( cz( 'tp_direct_to_checkout' ))
        array_push( $body_classes, 'js-direct-checkout' );

    if( cz( 'home_underlay' ))
        array_push( $body_classes, 'underlay' );

    if( cz( 'single_underlay' ))
        array_push( $body_classes, 'single_underlay' );




    array_push( $body_classes, cz( 'tp_paging_type' ) );

    if(!cz( 'tp_2_per_row_mob' )){
        array_push( $body_classes, 'mob_2_per_row' );
    }

    if(!cz( 'tp_add_btn_sticky' )){
        array_push( $body_classes, 'non_add_btn_sticky' );
    }else{
        array_push( $body_classes, 'is_add_btn_sticky' );
    }





    array_push( $body_classes, cz( 'header_behavior' ) );

    if( cz( 'tp_single_enable_pre_selected_variation') && $post_type_is_product )
        array_push( $body_classes, 'js-show-pre-selected-variation' );

    include "adstm/customization/cz_styles.php";
    do_action('ads_head_addons');

    if(!cz('image_clean')){
        do_action('init_image_clean');
    }

    if("RUB"===ADS_CUR){
        array_push( $body_classes, 'rub_currency_body');
    };

    $adstm_home_url = adstm_home_url();
    $template_dir = get_template_directory_uri();
    if(cz('add_fonts3')=='none'){ ?>
        <link rel="preload" href="<?php echo $template_dir; ?>/webfonts/Roboto-Regular-webfont.woff" as="font" type="font/woff" crossorigin>
        <link rel="preload" href="<?php echo $template_dir; ?>/webfonts/Roboto-Medium-webfont.woff" as="font" type="font/woff" crossorigin>
        <link rel="preload" href="<?php echo $template_dir; ?>/webfonts/Roboto-Bold-webfont.woff" as="font" type="font/woff" crossorigin>
    <?php } ?>


    <script>
        ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
    </script>
    <?php if(cz('social_sharing') && (is_front_page() || is_home())){ ?>
        <meta property="og:image" content="<?php _cz('social_sharing') ?>" />
    <?php } ?>

</head>
<body <?php body_class( $body_classes ); if(cz( 'tp_do_rtl' )){ ?>dir="rtl"<?php } ?> >
<div class="header">
    <div class="header_cont">
        <div class="container">
            <div class="header_flex">
                <div class="logo">
                    <a href="<?php echo ADSTM_HOME; ?>"><img src="<?php echo cz( 'tp_logo_img' ) ?>" alt=""/><?php
                        if(cz( 'tp_logo_text' ) ){
                            ?><span><?php _cz( 'tp_logo_text' ); ?></span><?php

                        }
                        ?></a>
                </div>
                <div class="search_form">
                    <form id="head_search_form" action="<?php echo ADSTM_HOME; ?>">
                        <div class="search_plate">
                            <div class="search_cont">
                                <input class="js-autocomplete-search" autocomplete="off" name="s"
                                       type="text" value="" placeholder="<?php _e( 'What are you looking for?', 'elgreco' ) ?>" />
                                <span class="search_cross">×</span>
                                <span class="search_submit"><i class="icon-scope"></i></span>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="upheader">

                    <?php if( ! get_option( 'users_can_register' ) == 0 ) : ?>
                        <?php if (get_current_user_id() == 0): ?>
                            <a class="img_link usericon_cont" href="<?php echo adstm_home_url( 'userlogin' ) ?>">
                                <i class="icon-user"></i> <?php _e( 'Log in', 'elgreco' ) ?>
                            </a>
                        <?php else : ?>
                            <a class="img_link usericon_cont" href="<?php echo adstm_home_url( 'account' ) ?>">
                                <i class="icon-user"></i> <?php _e( 'Account', 'elgreco' ) ?>
                            </a>
                        <?php endif; ?>
                    <?php endif;
                    if(cz('tp_currency_switcher')){ ?>
                        <div class="currency_chooser">
                            <?php do_action( 'adstm_dropdown_currency' ) ?>
                        </div>
                    <?php }
                    do_action( 'adstm_cart_quantity_link' ) ?>
                </div>
                <div class="fixed_burger">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>
        </div>

        <div class="mainmenu_cont">
            <div class="container">
                <div class="mainmenu" data-more="<?php _e( 'More', 'elgreco' ); ?>" data-home="<?php echo get_home_url(); ?>">
                    <?php

                    $locations = get_nav_menu_locations();

                    if( isset( $locations[ 'category' ] ) && $locations[ 'category' ] ) {

                        wp_nav_menu([
                            'theme_location' => 'category',
                            'container'      => 'ul',
                            'menu_class'     => '',
                            'depth'          => 5,
                            'items_wrap'     => '<ul>%3$s</ul>',
                            'walker'         => new WP_Bootstrap_Navwalker_simple
                        ] );
                    } else { ?>
                        <ul>
                            <?php
                            $menuProduct = wp_list_categories( [
                                'child_of'            => 0,
                                'current_category'    => 0,
                                'depth'               => 5,
                                'echo'                => 0,
                                'exclude'             => '',
                                'exclude_tree'        => '',
                                'feed'                => '',
                                'feed_image'          => '',
                                'feed_type'           => '',
                                'hide_empty'          => 1,
                                'hide_title_if_empty' => false,
                                'hierarchical'        => true,
                                'order'               => 'ASC',
                                'orderby'             => 'name',
                                'separator'           => '<br />',
                                'show_count'          => 0,
                                'show_option_all'     => '',
                                'show_option_none'    => '',
                                'style'               => 'list',
                                'taxonomy'            => 'product_cat',
                                'title_li'            => '',
                                'use_desc_for_title'  => 0
                            ] );

                            echo $menuProduct;
                            do_action('rubens_after_menu_categories'); ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="mainmenu_adap_cont" data-all="<?php _e( 'All', 'elgreco' ) ?>">
            <div class="to_search">
                <i class="icon-scope"></i> <span><?php _e( 'Search', 'elgreco' ) ?></span>
            </div>
            <div class="mainmenu_adap"></div>
            <span class="back_menu_level"></span>
            <span class="close_adap_menu ani_cross"></span>
            <div class="adap_menu_footer"></div>
        </div>
    </div>
</div>
<div id="sidebar">
    <div class="sidebar-wrapper" id="sidebar-wrapper" data-see="<?php _e( 'See All', 'elgreco' ) ?>" data-shop="<?php _e( 'Shop', 'elgreco' ) ?>">
        <div class="adap_menu_header"></div>
        <div class="sidebar-close">×</div>
    </div>
</div>
<?php get_template_part( 'template/str_data_common' ); ?>
