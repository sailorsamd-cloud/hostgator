<?php
do_action('cz_menu_init');

if (function_exists('init_cz')) {
    init_cz();
}

add_action( 'template_redirect', function(){

    if ( defined( 'ADS_ERROR' ) || defined( 'SLV_ERROR' )  ) {
        return;
    }

    get_template_part( 'empty' );
}, 1 );

remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);

add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);

include( __DIR__ . '/adstm/init.php' );

include( __DIR__ . '/hooks/init.hooks.php' );

include( __DIR__ . '/inc/breadcrumbs.php' );
include( __DIR__ . '/inc/review.php' );
include( __DIR__ . '/inc/instagram.php' );


add_action('cz_change_options', function (){
    //adstm_instagram::clearCache();
});


/**
 * Remove adminbar for subscribers
 */

if ( is_user_logged_in() && ! current_user_can( "level_2" ) ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

/**
 * Enable responsive video (bootstrap only)
 *
 * @param $html
 * @param $url
 * @param $attr
 * @param $post_ID
 *
 * @return string
 */
function adstm_oembed_filter( $html, $url, $attr, $post_ID ) {
	return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'adstm_oembed_filter', 10, 4 );


/**
 * Convert post_content \n
 *
 * @param $content
 *
 * @return mixed
 */
if ( ! function_exists( 'nl2br_content' ) ) {
	function nl2br_content( $content ) {
		$content = apply_filters( 'the_content', $content );

		return str_replace( ']]>', ']]>', $content );
	}
}

/* Lazy load of images for product's single page */

function getFullUrlImg_tm( $url ) {

    return preg_replace( '/_\d+x\d+\.jpg$/', '', $url );
}

function getFullUrlImgWebp_tm( $url ) {

    return preg_replace( '/_\d+x\d+q80\.webp$/', '', $url );
}

function getFullUrlImgJpgWebp_tm( $url ) {

    return preg_replace( '/_\d+x\d+q80\.jpg\.webp$/', '', $url );
}

/* Lazy load of images for product's single page */
$enable_single_page_optimize_content = cz( 'tp_item_imgs_lazy_load' );

// To edit single product's description's content for images lazy loading
function change_single_product_content_for_img_lazy_load( $content ) {

    global $post;

    $use_regex = false;

    // only edit specific post types
    $types = [ 'product' ];
    if ( $post && in_array( $post->post_type, $types, true ) ) {

        if( $use_regex ) {

            $content = preg_replace_callback(
                "|src=|",
                function ($match) {
                    return "data-src=";
                },
                $content
            );

            $content = preg_replace_callback(
                "|srcset=|",
                function ($match) {
                    return "data-srcset=";
                },
                $content
            );
        } else {

            $dom = new DOMDocument();
            @$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            foreach ($dom->getElementsByTagName('img') as $node) {
                $src_attr = $node->getAttribute('src');
                if(stristr($src_attr, 'alicdn.com')){
                    $src_attr = getFullUrlImg_tm( $src_attr );
                    $src_attr = getFullUrlImgWebp_tm( $src_attr );
                    $src_attr = getFullUrlImgJpgWebp_tm( $src_attr );
                    $src_attr = str_replace ('.jpg', '.jpg_.webp', $src_attr);
                }
                $node->setAttribute("data-src", $src_attr );
                $node->removeAttribute("src");
            }
            foreach ($dom->getElementsByTagName('iframe') as $node) {
                $src_attr = $node->getAttribute('src');
                $node->setAttribute("data-src", $src_attr );
                $node->removeAttribute("src");
            }
            $content = $dom->saveHtml();
            $content = preg_replace_callback(
                "|<body>|",
                function ($match) {
                    return "";
                },
                $content
            );
            $content = preg_replace_callback(
                "|</body>|",
                function ($match) {
                    return "";
                },
                $content
            );
            $content = preg_replace_callback(
                "|<html>|",
                function ($match) {
                    return "";
                },
                $content
            );
            $content = preg_replace_callback(
                "|</html>|",
                function ($match) {
                    return "";
                },
                $content
            );
            $content = preg_replace_callback(
                "|<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\" \"http://www.w3.org/TR/REC-html40/loose.dtd\">|",
                function ($match) {
                    return "";
                },
                $content
            );

        }
    }

    return $content;
}

function change_single_product_content_for_img_lazy_load_srcset( $content ) {

    global $post;


    // only edit specific post types
    $types = [ 'product' ];
    if ( $post && in_array( $post->post_type, $types, true ) ) {

        $content = preg_replace_callback(
            "|srcset=|",
            function ($match) {
                return "data-srcset=";
            },
            $content
        );
    }

    return $content;
}

if( $enable_single_page_optimize_content ) {

    // add the filter when main loop starts
    add_action( 'loop_start', function( WP_Query $query ) {
        if ( $query->is_main_query() ) {
            add_filter( 'the_content', 'change_single_product_content_for_img_lazy_load', -10 );
            add_filter( 'the_content', 'change_single_product_content_for_img_lazy_load_srcset', 11 );
        }
    } );

    // remove the filter when main loop ends
    add_action( 'loop_end', function( WP_Query $query ) {
        if ( has_filter( 'the_content', 'change_single_product_content_for_img_lazy_load' ) ) {
            remove_filter( 'the_content', 'change_single_product_content_for_img_lazy_load' );
            remove_filter( 'the_content', 'change_single_product_content_for_img_lazy_load_srcset' );
        }
    } );
}

/* END Lazy load of images for product's single page */


function theme_get_icon( $name, $color ) {

    $file = dirname( __FILE__ ) . '/images/svg-icons/' . $name . '.svg';

    if ( file_exists( $file ) ) {
        ob_start();
        include( $file );
        $text = ob_get_contents();
        ob_end_clean();

        return $text;
    }

    return '';

}

function tmpCz($name, $tmp){
	$value = cz($name);
	if(!$value){
		return;
	}

	printf( $tmp, $value );
}

// return title for img
function lcb_restore_image_title( $html, $id ) {

    $attachment = get_post($id);
    $mytitle = $attachment->post_title;
    return str_replace('<img', '<img title="' . $mytitle . '" ' , $html);
}
add_filter( 'media_send_to_editor', 'lcb_restore_image_title', 15, 2 );


function image_host_remove() {
    $theme               = wp_get_theme();
    $field_options = 'cz_' . $theme->get( 'Name' );
    $data = get_option( $field_options );
    $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
    $new_data = json_decode(str_replace([ 'http:\/\/'.$cur_website, 'https:\/\/'.$cur_website,'\/\/'.$cur_website], '', json_encode($data)), true);
    $new_data['image_clean'] = 1;
    $rez  = update_option( $field_options, $new_data );
}

add_action( 'after_switch_theme', 'image_host_remove',40  );

function ads_load_countries() {
    echo '<select name="Addreview[from]" id="ads_review_shipping_countries" data-ttselect data-search >';
    ads_get_list_contries();
    echo '</select>';
    die();
}
add_action( 'wp_ajax_load_countries', 'ads_load_countries' );
add_action( 'wp_ajax_nopriv_load_countries', 'ads_load_countries' );


function ads_select_currency_page() {

    if(isset($_POST['page'])){
        $ads_get_list_currency = ads_get_list_currency();
        $args = array_intersect_key(
            $ads_get_list_currency,
            array_flip( ads_list_currency() )
        );

        $template = '<li><a href="%1$s"><b class=""><img src="%3$s" alt=""></b>%2$s</a></li>';

        $template = apply_filters( 'ads_select_currency_template', $template );
        $args     = apply_filters( 'ads_select_currency', $args );

        $list = '';
        foreach ( $args as $key => $val ) {
            $list .= sprintf( $template, esc_url( add_query_arg( 'cur', $key, $_POST['page'] ) ), $val[ 'title' ] , pachFlag($ads_get_list_currency[$key]['flag']) );
        }

        echo $list;
    }else{
        echo '';
    }
    die;

}
add_action( 'wp_ajax_get_currency_select', 'ads_select_currency_page' );
add_action( 'wp_ajax_nopriv_get_currency_select', 'ads_select_currency_page' );


