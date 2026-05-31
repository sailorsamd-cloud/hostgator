<?php

if( ! function_exists( '_cz' ) || ! function_exists( 'cz' ) ) {
 
	function cz( $name ) {
        echo '';
    }

    function _cz( $name ) {
        echo '';
    }
}

if( ! defined( 'ADSTM_HOME' ) )	define( 'ADSTM_HOME', home_url() );
if( ! defined( 'ADSTM_T_DOMAIN' ) )	define( 'ADSTM_T_DOMAIN', 'elgreco' );

include( __DIR__ . '/core.php' );
include( __DIR__ . '/adsTmpl.php' );
include( __DIR__ . '/widget/countdown.php' );
include( __DIR__ . '/account.php' );
include( __DIR__ . '/blog.php' );
include( __DIR__ . '/handler_contact_form.php' );
include( __DIR__ . '/shortcodes/theme_shortcodes.php' );

if( defined( 'ADS_ERROR' ) && ! ADS_ERROR ) {
    include( __DIR__ . '/alids.php' );
    if(file_exists(ADS_PATH . 'includes/live/live_core.php')){
        include( ADS_PATH . 'includes/live/live_core.php' );
    }

}

if( defined( 'SLV_ERROR' ) && ! SLV_ERROR ) {
    include( __DIR__ . '/alids.php' );
    if(file_exists(SLV_PATH . 'includes/live/live_core.php')){
        include( SLV_PATH . 'includes/live/live_core.php' );
    }
}

if( is_admin() ) {
	include( __DIR__ . '/setup/create_page_template.php' );
}

function adstm_lang_init() {
    load_theme_textdomain( 'elgreco' );
}
add_action( 'init', 'adstm_lang_init' );

/**
 * Add theme support for Featured Images
 */
add_theme_support( 'post-thumbnails' );

/**
 * Register primary menu
 */
register_nav_menus( [
    'category'        => 'Main Menu',
    'footer-purchase' => 'Purchase info',
    'footer-company' => 'Company info',

] );

/**
 * Filter to name pages
 *
 * @param $pagename
 *
 * @return string
 */
add_filter( 'ads_template_pagename', function ( $pagename ) {
	return str_replace( 'page.', 'page-', $pagename );
}, 1000 );


/**
 * Enqueue script
 */
function adstm_enqueue_script() {
	
	$adstm_theme = wp_get_theme();
	$version = $adstm_theme->get( 'Version' );
    $elgreco_version = wp_get_theme('el-greco')->get( 'Version' );
    if(!$elgreco_version){
        $elgreco_version = $version;
    }

	// Facebook SDK
	wp_register_script( 'facebook', sprintf( '//connect.facebook.net/%1$s/sdk.js#xfbml=1&version=v2.5&appId=1049899748393568', get_bloginfo( 'language' ) ), array(), $version, true );
    wp_register_script( 'front-recaptcha-script', 'https://www.google.com/recaptcha/api.js', $elgreco_version );

    wp_register_script( 'adstm', get_template_directory_uri() . '/assets/js/allmin.js', [
        'front-cart',
        //'vnc2_libs'
    ], $elgreco_version, true );


	wp_localize_script( 'adstm', 'alidAjax', array(
	    'ajaxurl' => admin_url( 'admin-ajax.php' )
    ) );

    wp_localize_script( 'adstm', 'alids_params', array(
        'home_url' => adstm_home_url(),
    ) );




    $pageName = get_query_var( 'pagename' );

    if($pageName === 'cart'){
        wp_enqueue_script( 'bootstrap-tmpl' );
    }

	wp_localize_script( 'adstm', 'adstmCustomize',
		adsTmpl::customizeJsParams( ) );

	wp_enqueue_script( 'adstm' );

	if( cz( 's_link_fb' ) && cz('tp_share_fb') ) {
        wp_enqueue_script( 'facebook');
    }

    if($pageName === 'contact-us'){
        wp_enqueue_script( 'front-recaptcha-script');
    }
    wp_enqueue_script( 'front-cart');
}

function adstm_enqueue_style_header() {

    $adstm_theme = wp_get_theme();
    $version     = $adstm_theme->get( 'Version' );
    $elgreco_version = wp_get_theme('el-greco')->get( 'Version' );

    wp_register_style( 'vnc2_allstyle', get_template_directory_uri() .'/assets/css/allstyle.css','' ,$elgreco_version );
    if(cz( 'tp_do_rtl' )){
        wp_enqueue_style( 'adstm', get_template_directory_uri() .'/assets/css/style_rtl.css', [
            'vnc2_allstyle',
        ] ,$elgreco_version );
    }else{
        wp_enqueue_style( 'adstm', get_template_directory_uri() .'/style.css', [
            'vnc2_allstyle',
        ] ,$elgreco_version );
    }
};
add_action( 'get_header', 'adstm_enqueue_style_header', 10 );

function enabledJsCurrentPage(){

	$pageName = get_query_var( 'pagename' );

	if( $pageName == 'account' ) {
		wp_enqueue_script( 'front-account');
	} elseif( $pageName == 'userlogin' ) {
		wp_enqueue_script( 'front-userlogin' );
	} elseif( $pageName == 'orders' ) {
		wp_enqueue_script( 'front-pagination' );
		wp_enqueue_script( 'front-orders' );
	} elseif ( $pageName == 'register' ) {
		wp_enqueue_script( 'front-register-account' , '', '', '', true );
	}
}
add_action( 'wp_enqueue_scripts', 'adstm_enqueue_script' );

/**
 * Filter to excerpt
 *
 * @param $length
 *
 * @return int
 */
function adstm_excerpt_length( $length ) {
	
	return 50;
}
add_filter( 'excerpt_length', 'adstm_excerpt_length' );

/**
 * Excerpt after text
 *
 * @param $more
 *
 * @return string
 */
function adstm_excerpt_more( $more ) {
	
	return '...';
}
add_filter( 'excerpt_more', 'adstm_excerpt_more' );

/**
 * @param $classes
 *
 * @return array
 */
function adstm_body_classes( $classes ) {
	
	$pagename  = get_query_var( 'pagename' );
	$classes[] = $pagename;
	
	return $classes;
}
add_filter( 'body_class', 'adstm_body_classes' );

add_filter( 'get_the_archive_title', function ( $title ) {
	
	if ( is_category() || is_tax() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_search() ) {
		$title = sprintf( '%1$s: "%2$s"', __( 'Search', 'elgreco'), get_search_query() );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = sprintf( '<span class="vcard">%s</span>', get_the_author() );
	}

	return $title;
} );

/**
 * Disable the emoji's
 */
function disable_emojis() {
	
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 
	if ( is_array( $plugins ) ) {
        return array_diff( $plugins, [ 'wpemoji' ] );
    }
    
    return [];
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 
	if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, [ $emoji_svg_url ] );
    }

    return $urls;
}

function my_menu_notitle( $menu ){
    return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}
add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );

add_filter( 'comment_form_defaults', function( $fields ) {
	
    $fields[ 'label_submit' ] = __( 'Post Comment', 'elgreco' );
    
    return $fields;
});

function adstm_blog_og() {

    if( ! is_single() || get_post_type() !== 'post' ) {
        return;
    }

    $url = get_the_post_thumbnail_url();

    if( ! $url ) {
        return;
    }

    printf( '<meta property="og:image" content="%s" />', $url );
}
add_action( 'wp_head', 'adstm_blog_og' );

function custom_theme_assets() {
    if(!cz('tp_gutenberg_block_library')){
        wp_dequeue_style( 'wp-block-library' );
    }

    if(!cz('tp_jquery_migrate')){


        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', '', '', true );
        wp_enqueue_script( 'jquery' );
    }
}



add_action( 'wp_enqueue_scripts', 'custom_theme_assets',10 );

