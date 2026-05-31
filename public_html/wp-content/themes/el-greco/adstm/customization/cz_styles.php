<style rel="stylesheet">
:root{
    --main-menu-hover:<?php _cz( 'main_menu_hover' ); ?>;
    --buttons-default:<?php _cz( 'buttons_default' ); ?>;
    --buttons-default-hover:<?php _cz( 'buttons_default_hover' ); ?>;
    --link-default:<?php _cz( 'link_default' ); ?>;
    --link-default-hover:<?php _cz( 'link_default_hover' ); ?>;
    --tp-cart-pay-btn-color:<?php _cz( 'tp_cart_pay_btn_color' ); ?>;
    --tp-cart-pay-btn-color-hover:<?php _cz( 'tp_cart_pay_btn_color_hover' ); ?>;
    --tp-price-color:<?php _cz( 'tp_price_color' ); ?>;
    --tp-discount-bg-color:<?php _cz( 'tp_discount_bg_color' ); ?>;
    --tp-last-chance-color:<?php _cz( 'tp_last_chance_color' ); ?>;
    --tp-sale-badge-color:<?php _cz( 'tp_sale_badge_color' ); ?>;
    --tp-star-color:<?php _cz( 'tp_star_color' ); ?>;
    <?php
    $tp_404_bgr = cz( 'tp_404_bgr' );
    if($tp_404_bgr == ''){
        $tp_404_bgr = 'images/404.jpg';
        }
    ?>
    --tp-404-bgr:url(<?php echo $tp_404_bgr; ?>);
    --footer-background-color:<?php _cz( 'footer_background_color' ); ?>;
    --footer-text-color:<?php _cz( 'footer_text_color' ); ?>;
    --footer-title-color:<?php _cz( 'footer_title_color' ); ?>;
    --footer-links-color:<?php _cz( 'footer_links_color' ); ?>;
    --footer-links-color-hover:<?php _cz( 'footer_links_color_hover' ); ?>;
    --footer-copyright-color:<?php _cz( 'footer_copyright_color' ); ?>;
    --tp-irecommend-color:<?php _cz( 'tp_irecommend_color' ); ?>;
    --slider-home-fs-desk:<?php _cz( 'slider_home_fs_desk' ); ?>px;
    --slider-home-fs-mob:<?php _cz( 'slider_home_fs_mob' ); ?>px;
    --tp-home-buttons-color:<?php _cz( 'tp_home_buttons_color' ); ?>;
    --tp-home-buttons-color-hover:<?php _cz( 'tp_home_buttons_color_hover' ); ?>;
    --tp-home-buttons-text-color:<?php _cz( 'tp_home_buttons_text_color' ); ?>;
    --tp-home-buttons-text-color-hover:<?php _cz( 'tp_home_buttons_text_color_hover' ); ?>;
    --tp-home-video-btn-color:<?php _cz( 'tp_home_video_btn_color' ); ?>;
    --tp-instock-color:<?php _cz( 'tp_instock_color' ); ?>;
    --tp-outofstock-color:<?php _cz( 'tp_outofstock_color' ); ?>;
    --tp-home-video-btn-color-hover:<?php _cz( 'tp_home_video_btn_color_hover' ); ?>;
    --features-bgr-color:<?php _cz( 'features_bgr_color' ); ?>;
    --features-title-color:<?php _cz( 'features_title_color' ); ?>;
    --features-text-color:<?php _cz( 'features_text_color' ); ?>;
    --tp-header-bgr:<?php _cz( 'tp_header_bgr' ); ?>;
    --tp-header-color:<?php _cz( 'tp_header_color' ); ?>;
    --tp-header-color-hover:<?php _cz( 'tp_header_color_hover' ); ?>;
    --tp-menu-bgr:<?php _cz( 'tp_menu_bgr' ); ?>;
    --tp-menu-color:<?php _cz( 'tp_menu_color' ); ?>;
    --tp-menu-color-hover:<?php _cz( 'tp_menu_color_hover' ); ?>;
    --home-bgr-deals:<?php _cz( 'home_bgr_deals' ); ?>;
    --home-bgr-arrived:<?php _cz( 'home_bgr_arrived' ); ?>;
    --home-bgr-trending:<?php _cz( 'home_bgr_trending' ); ?>;
    --home-bgr-featured:<?php _cz( 'home_bgr_featured' ); ?>;
    --single-bgr-recs:<?php _cz( 'single_bgr_recs' ); ?>;
}

.logo span,.mainhead.fixed_header .logo span,.fixed_header .logo span,.menu_hovered .mainhead .logo span {color: <?php echo cz( 'tp_logo_text_color' )?>!important;}
<?php
if(cz('tp_bold_logo_text')){ ?>
.logo span{font-weight:700!important;}
<?php }
?>
</style>