<style rel="stylesheet">
    <?php
    $tp_color = cz('tp_color');
    if($tp_color){ ?>
        .btn-bord {height: 40px;border: 1px solid <?php echo $tp_color;?>;border-radius: 3px;color: <?php echo $tp_color;?>;
            font-size: 14px;font-weight: 400;line-height: 25px;}
        .btn-bord:hover {color: #fff;background-color: <?php echo $tp_color;?>;border-color: <?php echo $tp_color;?>;}
        @media (min-width: 768px){
            .desc-header .text-shipping i {background-color: <?php echo $tp_color; ?>;}
            .desc-header .text-shipping {color: <?php echo $tp_color; ?>;}
            .desc-header .search-post input:focus+button, .desc-header .search-post input:valid+button{background: <?php echo $tp_color; ?>;}
            .desktop-top-panel .login-button:before{border-bottom: 1px solid <?php echo $tp_color; ?>;}
            .desktop-top-panel .pages-menu>ul>li>a{border-bottom: 1px solid <?php echo $tp_color; ?>;}
            .desc-header .search-post button:before {color: <?php echo $tp_color; ?>;}
            .desc-header .search-post.is-focus input+button:hover:before,
            .desc-header .search-post input:valid+button:hover:before{color: <?php echo $tp_color; ?>!important;}
            .desc-header .search-post.is-focus input+button:hover,
            .desc-header .search-post input:focus+button:hover,
            .desc-header .search-post input:valid+button:hover {
                background: #fff;
            }
            .desktop-top-panel .login-button:hover:before{border-color: <?php  echo cz('tp_color_additional');?>;}
            .desktop-top-panel .dropdown_currency span:before,
            .desktop-top-panel .dropdown_currency span,
            .desktop-top-panel .login-button{color: <?php  echo cz('tp_color_additional');?>;}
        }
        .product-sku .sku-row .value .meta-item-img.active {box-shadow: 0 0 0 2px <?php echo $tp_color; ?>;}
        .item_slider_minis .curr_active .item_sqr {border-color: <?php echo $tp_color; ?>!important;}
        .product-sku .sku-row .value .meta-item-text.active {box-shadow: 0 0 0 2px <?php echo $tp_color; ?>;}
        .footer-copyright,
        .box-partners .name,
        .footer-head, .footer-head a, .head-social, .head-social a{color: <?php  echo cz('tp_color_additional');?>;}
        .top-panel {background-color: <?php echo $tp_color; ?>;}
        .footer {background-color: <?php echo $tp_color; ?>;}

        body.account nav.navbar a,
        body.account nav.navbar a:hover,
        body.orders nav.navbar a,
        body.orders nav.navbar a:hover {color: <?php echo $tp_color; ?>;}


        .shipping-page-content-with-icons .h1:after,
        .shipping-page-content-with-icons .h2:after,
        .shipping-page-content-with-icons .h3:after,
        .shipping-page-content-with-icons h1:after,
        .shipping-page-content-with-icons h2:after,
        .shipping-page-content-with-icons h3:after {background-color: <?php echo $tp_color; ?>;}

        .sharePopup .jssocials-shares .jssocials-share-link:hover {color: <?php echo $tp_color; ?>;}

        .mobile-menu .category-menu .menu-list li.current-menu-item > a span,
        .mobile-menu .category-menu .menu-list li.current-cat > a span {color: <?php echo $tp_color; ?>;}
        .mobile-menu .category-menu .menu-list li a:focus, .mobile-menu .category-menu .menu-list li a:active {
            color: <?php echo $tp_color; ?>;
        }

        .contact-form .item .btn {background: <?php echo $tp_color; ?>;border: 1px solid <?php echo $tp_color; ?>;}
        .contact-form .item .btn:hover {color: <?php echo $tp_color; ?>;background: #fff;}
        #tracking-form .btn {background: <?php echo $tp_color; ?>!important;
            border: 1px solid <?php echo $tp_color; ?>!important;color: #fff!important;}
        #tracking-form .btn:hover, #tracking-form .btn:focus, #tracking-form .btn:active {
            background: #fff!important;
            color: <?php echo $tp_color; ?>!important;
        }
        .b-pagination a:hover{color: <?php echo $tp_color; ?>;}
        .size_chart_table tr+tr:hover{background: <?php echo $tp_color; ?>!important; }
        .desc-header .cart .cart__icon svg {fill: <?php echo cz('cart_color'); ?>;}

        .desc-header .cart:hover .cart__icon svg {
            fill:  <?php echo cz('cart_color_hover'); ?>;
        }
    <?php } ?>

    /* Menu hover color */

    <?php
     $menu_hover_color = cz('tp_menu_hover_color');
     if($menu_hover_color){
    ?>
    .categories-menu-line > li:hover > a span {
        box-shadow: inset 0px -1px 0 0 <?php echo $menu_hover_color; ?>;
    }

    .box-menu .menu ul li a:hover,
    .categories-menu-line>li.active>a,
    .categories-menu-line>li.current-cat-ancestor>a,
    .categories-menu-line>li.current-cat-parent>a,
    .categories-menu-line>li.current-cat>a,
    .categories-menu-line>li.current-menu-ancestor>a,
    .categories-menu-line>li.current-menu-item>a,
    .categories-menu-line>li.current-menu-parent>a,
    .categories-menu-line>li:hover>a,
    .categories-menu-line>li>a:hover,
    .categories-menu-line>li.more.active:before,
    .categories-menu-line>li.more:hover:before,
    .sort-select .dropdown-menu>li>a:focus,
    .sort-select .dropdown-menu>li>a:hover,
    .desktop-top-panel .dropdown-menu a:hover {
        color: <?php echo $menu_hover_color; ?>;
    }

    <?php } ?>

    /* Discount bg-color */

    <?php
     $disc_bg = cz('tp_discount_bg_color');
     if($disc_bg){ ?>
    .product-item .discount,
    .single-product .savePercent {background-color: <?php echo $disc_bg; ?>!important;}
    <?php } ?>

    /* Prices color */

    <?php
     $tp_price_color = cz('tp_price_color');
     if($tp_price_color){ ?>
        .product-item .wrap-price .salePrice,
        .product-meta .salePrice .value {color: <?php echo $tp_price_color; ?>;}
    <?php } ?>

    /* Cart button colors */

    <?php
     $tp_cart_pay_btn_color = cz('tp_cart_pay_btn_color');
     if($tp_cart_pay_btn_color){ ?>
        body.cart .b-cart-btn_active #process-checkout {background-color: <?php echo $tp_cart_pay_btn_color; ?>;}
    <?php } ?>

    <?php
     $tp_cart_pay_btn_color_hover = cz('tp_cart_pay_btn_color_hover');
     if($tp_cart_pay_btn_color_hover){ ?>

        body.cart .b-cart-btn_active #process-checkout:hover,
        body.cart .b-coupon .b-coupon__btn:hover,
        .single-active-btn .btn_add-cart:hover{
            background-color: <?php echo $tp_cart_pay_btn_color_hover; ?>;
        }

        .single-active-btn .btn_add-cart {
            background-color: <?php echo $tp_cart_pay_btn_color; ?>;
            border-color: <?php echo $tp_cart_pay_btn_color; ?>;
        }

    <?php } ?>

    /*Home*/

    <?php
     $fsd = intval(cz('slider_home_fs_desk'));
    $fsd = $fsd > 0 ? $fsd : 50;

    $fsm = intval(cz('slider_home_fs_mob'));
    $fsm = $fsm > 0 ? $fsm : 34;
    ?>
    .home-slider .info .text {
        font-size: <?php echo $fsm;?>px;
        line-height: 1.2;
    }
    @media (min-width: 1200px){
        .home-slider .info .text {
            font-size: <?php echo $fsd;?>px;
            line-height: 1.2;
        }
    }


    .home-slider .info .ft .btn.shop_now {
        background-color: <?php echo cz('tp_home_buttons_color');?>
    }

    .home-slider .info .ft .btn.shop_now:hover {
        background-color: <?php echo cz('tp_home_buttons_color_hover');?>;
        color: <?php echo cz('tp_home_buttons_color');?>;
    }

    .home-slider .info .text {
        color: <?php echo cz('tp_color_text_countdown');?>;
    }

    #prHome_video .btn_model_video{
        background: <?php echo cz('tp_home_buttons_color');?>;
        border: 1px solid <?php echo cz('tp_home_buttons_color');?>;
    }

    #prHome_video .btn_model_video:active, #prHome_video .btn_model_video:focus, #prHome_video .btn_model_video:hover {
        color: <?php echo cz('tp_home_buttons_color');?>;
        text-decoration: none;
        background: #fff;
    }

    /*Features*/
    .features-main-text{
        color: <?php echo cz('features_title_color');?>;
    }

    .features .text-feat p {
        color: <?php echo cz('features_text_color');?>;
    }

    /*About*/
    .abous_b1 {
        background: url( "<?php echo cz('tp_bg1_about');?>") center center no-repeat;
    }

    /*blog*/
    .blog-subscribe__btn {
        background-color: <?php echo cz('blog_buttons');?>;
        border: 1px solid <?php echo cz('blog_buttons');?>;
    }

    .blog-subscribe__btn:hover {
        background-color: #fff;
        color: <?php echo cz('blog_buttons');?>;
    }

    .blog-footer__btn {
        background-color: <?php echo cz('blog_buttons');?>;
        color: #fff;
    }
    .blog-footer__btn:active, .blog-footer__btn:hover {
        background-color: #fff;
        color: <?php echo cz('blog_buttons');?>;
    }

    .blog-page__btn {
        color: <?php echo cz('blog_more');?>;
        border: 1px solid <?php echo cz('blog_more');?>;
    }
    .blog-page__btn:active, .blog-page__btn:hover {
        background-color: <?php echo cz('blog_more');?>;
        color: #fff;
    }
    #comments .submit {
        border: 1px solid <?php echo cz('blog_more');?>;
        color: <?php echo cz('blog_more');?>;
    }

    #comments .submit:hover {
        background-color: <?php echo cz('blog_more');?>;
    }

    .btn_shopping{
        background-color: <?php echo cz('about_review_color');?>;
        border: 1px solid <?php echo cz('about_review_color');?>;
        color:#fff;
    }

    .btn_shopping:hover{
        background-color: <?php echo cz('about_review_color_hover');?>;
        border: 1px solid <?php echo cz('about_review_color_hover');?>;
    }

    .btn_contact{
        border: 1px solid <?php echo cz('about_review_color');?>;
        color: <?php echo cz('about_review_color');?>;
    }
    .btn_contact:hover{
        border-color: <?php echo cz('about_review_color_hover');?>;
        background:<?php echo cz('about_review_color_hover');?>!important;
        color:#fff;
    }

    .addReviewForm .submit-review{
        border: 1px solid <?php echo cz('about_review_color');?>;
        color: <?php echo cz('about_review_color');?>;
    }

    .addReviewForm .submit-review:hover {
        color: #fff;
        border: 1px solid <?php echo cz('about_review_color_hover');?>;
        background-color: <?php echo cz('about_review_color_hover');?>;
    }

    .addReviewForm .fileinput-button {
        border-color: <?php echo cz('about_review_color');?>;
    }

    .addReviewForm .fileinput-button i:before {
        border-color: <?php echo cz('about_review_color');?>;
        color: <?php echo cz('about_review_color');?>;
    }
    .addReviewForm .fileinput-button:hover {
        border: 1px solid  <?php echo cz('about_review_color_hover');?>;
    }
    .addReviewForm .fileinput-button:hover i:before {
        color: <?php echo cz('about_review_color_hover');?>;
    }
    .btn-guest,
    .btn-account,
    .btn-default,
    .btn-login{
        background: transparent;
        color: <?php echo cz('login_subscription_color');?>!important;
        border: 1px solid <?php echo cz('login_subscription_color');?>!important;
    }

    .btn-default:active,
    .btn-default:focus,
    .btn-default:hover,

    .btn-guest:active,
    .btn-guest:focus,
    .btn-guest:hover,

    .btn-account:active,
    .btn-account:focus,
    .btn-account:hover,

    .btn-login:active,
    .btn-login:focus,
    .btn-login:hover{
        background: <?php echo cz('login_subscription_color');?>!important;
        color: #fff!important;
    }

    .page-subscribe button{
        color: <?php echo cz('login_subscription_color');?>;
        border: 1px solid <?php echo cz('login_subscription_color');?>;
    }

    .page-subscribe button:hover {
        background-color: <?php echo cz('login_subscription_color');?>;
        color: #fff;
    }

    <?php
     foreach( cz( 'slider_home' ) as $key => $item ) {

        if ( ! $item[ 'img' ] ){
        continue;
        }

        $loaded = $key>0 ? '.tt_inited .loaded' : '';
        if (isset($item[ 'img_adap' ])){
            printf('@media(min-width:1024px){ %4$s .scene%1$s {background: url(%2$s) no-repeat center center transparent;background-size:cover;} }
            @media(max-width:1023px){ %4$s .scene%1$s {background: url(%3$s) no-repeat center center transparent;background-size:cover;} }
            ',$key
            ,$item[ 'img' ]
            ,$item[ 'img_adap' ]
            ,$loaded
            );
        }else{
            echo sprintf('%3$s .scene%1$s {background: url(%2$s) no-repeat center center transparent;background-size:cover;}'
            ,$key
            ,$item[ 'img' ]
            ,$loaded


            );
        }

     }
     ?>

    <?php if(cz('tp_404_bgr')){ ?>
    .error404 .page-content{background: url(<?php _cz( 'tp_404_bgr' );?>) no-repeat center center transparent; background-size: cover;margin:0;padding:20px 0 0;}
    <?php } ?>

    .page-404__text,.page-404__text h3{color:<?php _cz( 'tp_404_text_color' );?>}

    .list-product.best-deals{background:<?php _cz( 'home_bgr_deals' );?>;}

    <?php
        if(!cz('home_top_deals_outline')){ ?>
            .product-item .wrap-img{outline: 0;}
        <?php }
    ?>




</style>