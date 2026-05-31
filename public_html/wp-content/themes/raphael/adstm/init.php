<?php

if(!function_exists('_cz') ||  !function_exists('cz')){
    function cz($name){
        echo '';
    }

    function _cz($name){
        echo '';
    }
}


if(!defined('ADSTM_HOME')){
	define('ADSTM_HOME', home_url());
}

if(!defined('ADSTM_T_DOMAIN')){
	define('ADSTM_T_DOMAIN', 'rap');
}

include( __DIR__ . '/update.php' );
include( __DIR__ . '/core.php' );

include( __DIR__ . '/adsTmpl.php' );

include( __DIR__ . '/widget/countdown.php' );

include( __DIR__ . '/account.php' );
include( __DIR__ . '/blog.php' );
include( __DIR__ . '/handler_contact_form.php' );

include( __DIR__ . '/shortcodes/theme_shortcodes.php' );

if ( defined( 'ADS_ERROR' ) && ! ADS_ERROR ) {
	include( __DIR__ . '/alids.php' );
}

if( defined( 'SLV_ERROR' ) && ! SLV_ERROR ) {
    include( __DIR__ . '/alids.php' );
}

if ( is_admin() ) {
	include( __DIR__ . '/setup/create_page_template.php' );
}

function adstm_lang_init() {
    load_theme_textdomain( 'rap' );
}

add_action( 'init', 'adstm_lang_init' );

/**
 * Add theme support for Featured Images
 */
add_theme_support( 'post-thumbnails' );

/**
 * Register primary menu
 */
register_nav_menus( array(
	'top_menu' => 'Top Menu',
	'category' => 'Category menu',
	'footer-company'  => 'Company Info',
	'footer-help'  => 'Need Some Help?',
) );


/**
 * Filter to name pages
 *
 * @param $pagename
 *
 * @return string
 */
add_filter( 'ads_template_pagename', function ( $pagename ) {
	return str_replace('page.', 'page-', $pagename);
}, 1000 );


/**
 * Enqueue script
 */
function adstm_enqueue_script() {
	$adstm_theme = wp_get_theme();
	$version = $adstm_theme->get( 'Version' );

	wp_register_script( 'socials', get_template_directory_uri() . '/assets/js/socials.js', array( 'jquery' ), $version, true );
	// Facebook SDK
	wp_register_script( 'facebook', sprintf( '//connect.facebook.net/%1$s/sdk.js#xfbml=1&version=v2.5&appId=1049899748393568', get_bloginfo( 'language' ) ), array(), $version, true );

    wp_register_script( 'bootstrap-tmpl', get_template_directory_uri() . '/frontend-libs/bootstrap.min.js', array( 'jquery' ), '1.12.4', true );

    wp_register_script( 'ttgallery', get_template_directory_uri() . '/assets/js/ttgallery.js', array( 'jquery' ), $version, true );
    wp_register_script( 'selects', get_template_directory_uri() . '/assets/js/selects.js', array( 'jquery' ), $version, true );

	wp_register_script('baguetteBox', get_template_directory_uri() . '/assets/js/baguetteBox.js', array(), $version, true);

    wp_register_script( 'slideout', get_template_directory_uri() . '/frontend-libs/slideout/dist/slideout.min.js', array( 'jquery' ), '1.0.1', true );

    wp_register_script( 'ttlazy', get_template_directory_uri() . '/assets/js/ttlazy.min.js', array( 'jquery' ), $version, true );

    wp_register_script('common-tmpl', get_template_directory_uri() . '/assets/js/common.js', array('jquery', 'common'),$version, true);
    wp_register_script('home-tmpl', get_template_directory_uri() . '/js/home.js',array('jquery', 'common','ttgallery'), $version, true);
    wp_register_script('header-tmpl', get_template_directory_uri() . '/js/header.js',array('jquery', 'slideout', 'front-cart', 'common'), $version, true);
    wp_register_script('single-product-tmpl', get_template_directory_uri() . '/js/single_product.js',array('jquery', 'common', 'front-cart','ttgallery','baguetteBox'), $version, true);
    wp_register_script('blog-tmpl', get_template_directory_uri() . '/js/blog.js',array('jquery'), $version, true);
    wp_register_script( 'rap_lity', get_template_directory_uri() . '/assets/js/lity.min.js','' , $version, true );

    /**/
	wp_register_script( 'adstm', get_template_directory_uri() . '/js/script.js', array(
		'jquery',
        'ttlazy',
        'bootstrap-tmpl',
		'common-tmpl',
		'front-cart',
        'selects',
		'header-tmpl',

	), $version, true );

	wp_localize_script( 'adstm', 'tmplLang',
		array(
			'readonly_checkbox' => __('Please tick on Terms & Conditions box', 'rap')
		));

	wp_localize_script( 'adstm', 'adstmCustomize',
		adsTmpl::customizeJsParams( ) );



	if(cz('s_link_fb')){
        wp_enqueue_script( 'facebook');
    }

    $pageName = get_query_var( 'pagename' );

	if($pageName !== 'cart'){
        wp_enqueue_script( 'slideout' );
        wp_enqueue_script( 'adstm' );
    }else{
		wp_enqueue_script( 'bootstrap-tmpl' );
	}

	enabledJsCurrentPage();
}

function adstm_enqueue_style_header() {

	if ( adsTmpl::is_home() ) {
		wp_enqueue_style( 'home-css-tmpl', get_template_directory_uri() . '/assets/css/home.css' );
        wp_enqueue_style( 'rap_lity_css', get_template_directory_uri() . '/assets/css/lity.min.css' );
        wp_enqueue_style( 'ttgallery', get_template_directory_uri() . '/assets/css/ttgallery.css' );
	}  

	/*category*/
	if ( is_post_type_archive('product') || is_tax( 'product_cat' ) ){
		wp_enqueue_style( 'category-css-tmpl', get_template_directory_uri() . '/assets/css/category.css' );
	}elseif( is_archive() ){
		wp_enqueue_style( 'blog-css-tmpl', get_template_directory_uri() . '/assets/css/blog.css' );
	}

	/*search*/
	if(is_search()){
		/*blog*/
		if(isset( $_GET[ 'post_type' ] ) && $_GET[ 'post_type' ] == 'post'){
			wp_enqueue_style( 'blog-css-tmpl', get_template_directory_uri() . '/assets/css/blog.css' );
		}else{
			wp_enqueue_style( 'category-css-tmpl', get_template_directory_uri() . '/assets/css/category.css' );
		}
	}

	/*single*/
	if ( is_singular( 'product' ) ) {
        wp_enqueue_style( 'ttgallery', get_template_directory_uri() . '/assets/css/ttgallery.css' );
		wp_enqueue_style( 'single-product-tmpl', get_template_directory_uri() . '/assets/css/single-product.css' );
        wp_enqueue_style( 'rap_lity_css', get_template_directory_uri() . '/assets/css/lity.min.css' );
		/*blog*/
	}elseif(is_singular('post')|| is_home()){
		wp_enqueue_style( 'blog-css-tmpl', get_template_directory_uri() . '/assets/css/blog.css' );
	}

	$foo = array(
		'cart'=> array('cart' ),
	);

	$pageName = get_query_var( 'pagename' );
	if(isset($foo[$pageName])){

		$script = $foo[$pageName];

		foreach ($script as $value){
			wp_enqueue_style( 'style-tmpl-'.$value, get_template_directory_uri() . '/assets/css/'.$value.'.css' );
		}
	}

	if(!isset($_GET['redirect']) && in_array($pageName, array('account','confirmation', 'userlogin', 'register', 'orders'))){
		wp_enqueue_style( 'style-tmpl-account', get_template_directory_uri() . '/assets/css/account.css' );
	}

	if(isset($_GET['redirect']) && in_array($pageName, array('account','confirmation', 'userlogin', 'register', 'orders'))){
		wp_enqueue_style( 'style-tmpl-account-cart', get_template_directory_uri() . '/assets/css/account-cart.css' );
	}

};
add_action( 'get_header', 'adstm_enqueue_style_header', 10);

function enabledJsCurrentPage(){

	if (  adsTmpl::is_home() ) {
		wp_enqueue_script('home-tmpl');
        wp_enqueue_script('rap_lity');

	}

	if ( is_singular( 'product' ) ) {
        wp_enqueue_script('ttlazy');
		wp_enqueue_script('single-product-tmpl');
		wp_enqueue_script('socials');
        wp_enqueue_script('rap_lity');
		//wp_enqueue_script( 'front-add-review' );
		/*blog*/
	} elseif(is_singular('post') || is_home()) {
		wp_enqueue_script( 'blog-tmpl');
		wp_enqueue_script( 	'socials');
	}
	global $wp_query;

	if(is_post_type_archive('product') || is_tax( 'product_cat' ) ){

	}elseif(is_archive()){
		wp_enqueue_script( 'blog-tmpl');
	}


	$foo = array(
		'account'=> array('front-account' ),
		'userlogin'=> array('front-userlogin' ),
		'orders'=> array('front-pagination', 'front-orders' ),
		'register'=> array(array('name' => 'front-recaptcha-script'), array( 'name' => 'front-register-account', 'footer'=>true) ),
		'contact-us'=> ['front-recaptcha-script']
	);

	$pageName = get_query_var( 'pagename' );
	if(isset($foo[$pageName])){

		$script = $foo[$pageName];

		foreach ($script as $value){
			if(!is_array($value)){
				wp_enqueue_script( $value , '', '', '', true);
			}else{
                if (isset($value['footer'])) {
                    wp_enqueue_script( $value['name'] , '', '', '', $value['footer']);
                }
			}
		}
		do_action('adstm_enable_'.$pageName);
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
	return "...";
}

add_filter( 'excerpt_more', 'adstm_excerpt_more' );

/**
 * @param $classes
 *
 * @return array
 */
function adstm_body_classes( $classes ) {
	$pagename = get_query_var( 'pagename' );
	$classes[] = $pagename;
	return $classes;
}

add_filter( 'body_class', 'adstm_body_classes' );


add_filter( 'get_the_archive_title', function ( $title ) {
	if ( is_category() || is_tax() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_search() ) {
		$title = sprintf( '%1$s: "%2$s"', __( 'Search', 'rap'), get_search_query() );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = sprintf( '<span class="vcard">%s</span>', get_the_author() );
	}

	return $title;
} );

function top_product() {

    $category = intval($_POST[ 'category' ]);
	$link = isset($_POST[ 'link' ]) ? strip_tags($_POST[ 'link' ]) : false;

    $terms = basename(parse_url($link, PHP_URL_PATH));
    $terms = str_replace('#', '', $terms);

    $args = array(
        'post_type'      => 'product',
        '_orderby'       => 'promotionVolume',
        '_order'         => 'DESC',
        'posts_per_page'    => 4,
        'post_status'      => 'publish',
    );

	if($category > 0){
		$args['tax_query'] = [
			[
				'taxonomy' => 'product_cat',
				'field' => 'term_id',
				'terms' => $category
			]
		];
	}elseif($terms){
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $terms
            ]
        ];
    }

    $foo = [];

    query_posts( $args );

    if ( have_posts() ) : while ( have_posts() ) :
        the_post();

    $info = new adsProductTM();

    $product = $info->singleProductMin('ads-medium');

    $foo[] = [
        'thumb'    => $product['thumb'],
        'permalink' => $info->getLink(),
        'title' => stripslashes( html_entity_decode( $info->getTitle(), ENT_QUOTES ))
    ];

    endwhile; endif;

    wp_reset_query();

    wp_send_json( $foo );
}

add_action( 'wp_ajax_nopriv_top_product', 'top_product' );
add_action( 'wp_ajax_top_product', 'top_product' );


function top_product2() {

    $foo = [];
    foreach ($_POST['prepare_prod'] as $key => $prod_cat) {
        $category = intval($prod_cat[0]);
        $link = isset($prod_cat[1]) ? strip_tags($prod_cat[1]) : false;
        $foo[$key] = [];


        $terms = basename(parse_url($link, PHP_URL_PATH));
        $terms = str_replace('#', '', $terms);

        $args = array(
            'post_type'      => 'product',
            '_orderby'       => 'promotionVolume',
            '_order'         => 'DESC',
            'posts_per_page'    => 4,
            'post_status'      => 'publish',
        );

        if($category > 0){
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $category
                ]
            ];
        }elseif($terms){
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $terms
                ]
            ];
        }



        query_posts( $args );

        if ( have_posts() ) : while ( have_posts() ) :
            the_post();

            $info = new adsProductTM();

            $product = $info->singleProductMin('ads-medium');

            $foo[$key][] = [
                'thumb'    => $product['thumb'],
                'permalink' => $info->getLink(),
                'title' => stripslashes( html_entity_decode( $info->getTitle(), ENT_QUOTES ))
            ];

        endwhile; endif;

        wp_reset_query();

    }

    wp_send_json( $foo );
}

add_action( 'wp_ajax_nopriv_top_product2', 'top_product2' );
add_action( 'wp_ajax_top_product2', 'top_product2' );


/* Disable emoji icons */

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
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
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

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}


function my_menu_notitle( $menu ){
    return $menu = preg_replace('/title=\"(.*?)\"/Uui', '', $menu );

}
add_filter( 'wp_nav_menu', 'my_menu_notitle', 999 );
add_filter( 'wp_page_menu', 'my_menu_notitle', 999 );
add_filter( 'wp_list_categories', 'my_menu_notitle', 999 );

add_filter('comment_form_defaults', function ($fields){
    $fields['label_submit'] = __('Submit a review', 'rap');
    return $fields;
});

add_action('wp_head', 'adstm_blog_og');

function adstm_blog_og(){

    if(!is_single() || get_post_type() !== 'post'){
        return;
    }

    $url = get_the_post_thumbnail_url();

    if(!$url){
        return;
    }

    printf('<meta property="og:image" content="%s" />', $url);

}