<?php

do_action('cz_menu_init');

if( function_exists('init_cz') ) {
    init_cz();
}

add_action( 'template_redirect', function(){

    if ( defined( 'ADS_ERROR' ) || defined( 'SLV_ERROR' )  ) {
        return;
    }

    get_template_part( 'empty' );
}, 1 );

remove_action( 'wp_head', 'wp_print_scripts' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
//remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

add_action( 'wp_footer', 'wp_print_scripts', 5 );
add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

include( __DIR__ . '/inc/update.php' );
include( __DIR__ . '/adstm/init.php' );

include( __DIR__ . '/hooks/init.hooks.php' );

include( __DIR__ . '/inc/breadcrumbs.php' );
include( __DIR__ . '/inc/list_review.php' );
include( __DIR__ . '/inc/instagram.php' );


add_action( 'cz_change_options', function() {
    //adstm_instagram::clearCache();
} );

define( 'USER_CAN_OPTIONS_THEME', current_user_can( 'manage_options' ) );
function cztxt( $name ) {
    if(USER_CAN_OPTIONS_THEME){
        return ' data-cztxt="'.$name.'"';
    }
    return '';
}

function _cztxt( $name ) {
    if(USER_CAN_OPTIONS_THEME){
        echo ' data-cztxt="'.$name.'"';
    }
}

function czsrc( $name ) {
    if(USER_CAN_OPTIONS_THEME){
        return ' data-czsrc="'.$name.'"';
    }
    return '';
}

function _czsrc( $name ) {
    if(USER_CAN_OPTIONS_THEME){
        echo ' data-czsrc="'.$name.'"';
    }
}

function czhref( $name ) {
    if(USER_CAN_OPTIONS_THEME){
        return ' data-czhref="'.$name.'"';
    }
    return '';
}

function _czhref( $name ) {
    if(USER_CAN_OPTIONS_THEME){
        echo ' data-czhref="'.$name.'"';
    }
}

/**
 * Remove adminbar for subscribers
 */
if( is_user_logged_in() && ! current_user_can( "level_2" ) ) {
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
if( ! function_exists( 'nl2br_content' ) ) {

	function nl2br_content( $content ) {

		$content = apply_filters( 'the_content', $content );

		return str_replace( ']]>', ']]>', $content );
	}
}

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

    $use_regex = true;

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

function tmpCz( $name, $tmp ) {

	$value = cz( $name );
	if( ! $value )
		return;

	printf( $tmp, $value );
}

function selectSearchWordBlog( $search, $text ) {

    foreach( explode(' ', $search) as $v ) {
        $text = preg_replace( '/('.$v.')/uUi', '<span>$1</span>', $text );
    }

    return $text;
}

function ads_search_ImageUrlBlog( $post ) {

    $post_id = $post->ID;

    if ( has_post_thumbnail( $post_id ) ) {

        $thumb_id = get_post_thumbnail_id( $post_id );
        $url      = wp_get_attachment_image_src( $thumb_id, 'thumbnail' );

        return $url[ 0 ];
    }

    return $post->imageUrl;
}

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

	public $tree_type = [ 'post_type', 'taxonomy', 'custom' ];

	public $db_fields = [ 'parent' => 'menu_item_parent', 'id' => 'db_id' ];

	public function start_lvl( &$output, $depth = 0, $args = [] ) {

		$output .= "<div class='topnav'><ul>";
	}

	public function end_lvl( &$output, $depth = 0, $args = [] ) {

		$output .= "</ul></div>";
	}

	public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {

			$t = '';
			$n = '';
		} else {

			$t = "\t";
			$n = "\n";
		}

		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? [] : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = [];
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';

		foreach ( $atts as $attr => $value ) {

			if ( ! empty( $value ) ) {
				$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function end_el( &$output, $item, $depth = 0, $args = [] ) {

		$output .= "</li>";
	}
}

class WP_Bootstrap_Navwalker_simple extends Walker_Nav_Menu {

    public $tree_type = [ 'post_type', 'taxonomy', 'custom' ];

    public $db_fields = [ 'parent' => 'menu_item_parent', 'id' => 'db_id' ];

    public function start_lvl( &$output, $depth = 0, $args = [] ) {

        $output .= "<ul>";
    }

    public function end_lvl( &$output, $depth = 0, $args = [] ) {

        $output .= "</ul>";
    }

    public function start_el( &$output, $item, $depth = 0, $args=[], $id = 0 ) {

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {

            $t = '';
            $n = '';
        } else {

            $t = "\t";
            $n = "\n";
        }

        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';
//pr($item);
        $atts           = [];
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['href']   = ! empty( $item->url ) ? $item->url : (!empty( $item->guid ) ? $item->guid : '');

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $this_title='';
        if($item->title){
            $this_title = $item->title;
        }elseif($item->post_title){
            $this_title = $item->post_title;
        }

        $title = apply_filters( 'the_title', $this_title, $item->ID );

        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        if(is_array($args)){
            $item_output = $args['before'];
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args['link_before'].$title.$args['link_after'];
            $item_output .= '</a>';
            $item_output .= $args['after'];
        }else{
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before.$title.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        }



        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = [] ) {

        $output .= "</li>";
    }
}

function get_category_product_by_path( $category_path, $full_match = true, $output = OBJECT ) {

    $category_path  = rawurlencode( urldecode( $category_path ) );
    $category_path  = str_replace( '%2F', '/', $category_path );
    $category_path  = str_replace( '%20', ' ', $category_path );
    $category_paths = '/' . trim( $category_path, '/' );

    $leaf_path      = sanitize_title( basename( $category_paths ) );

    $full_path      = '';
    $category_paths = explode( '/', $category_paths );

    foreach ( (array) $category_paths as $pathdir ) {
        $full_path .= ( $pathdir != '' ? '/' : '' ) . sanitize_title( $pathdir );
    }

    $args = [
        'post_type'      => 'product',
        '_orderby'       => 'promotionVolume',
        '_order'         => 'DESC',
        'posts_per_page' => 2,
        'post_status'    => 'publish',
    ];

    $args['tax_query'] = [ [
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $leaf_path
    ] ];

    $text = '';

    query_posts( $args );

    if ( have_posts() ) : while ( have_posts() ) : the_post();

        ob_start();

        do_action( 'adstm_product_item', 'ads-large' );

        $text .= ob_get_contents();

        ob_end_clean();

    endwhile; endif;

    wp_reset_query();

    return $text;
}

function adstm_selectSearchWord( $search, $text ) {

    foreach( explode(' ', $search) as $v ) {

        $text = preg_replace( '/('.$v.')/uUi', '<ins>$1</ins>', $text );
    }

    return $text;
}

add_filter( 'ads_account_template_type', function( $type ) {

	return 'type2';
} );

function ads_true_load_products_admin() {
    $args = unserialize( base64_decode( stripslashes( $_POST['query'] ) ) );
    $args['paged']       = $_POST['page'] + 1;
    query_posts( $args );
    get_template_part( 'template/loop/home/loop' );
    die();
}

function ads_true_load_products() {
    $args = unserialize( base64_decode( stripslashes( $_POST['query'] ) ) );
    $args['paged']       = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    query_posts( $args );
    get_template_part( 'template/loop/home/loop' );
    die();
}
add_action( 'wp_ajax_loadproducts', 'ads_true_load_products_admin' );
add_action( 'wp_ajax_nopriv_loadproducts', 'ads_true_load_products' );

function ads_load_countries() {
//    echo '<label for="ads_review_shipping_countries">* '.__( 'Country', 'elgreco' ).'</label>';
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



function theme_clauses_product() {
    if( ! is_admin() || defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        add_filter( 'posts_clauses', 'theme_query_clauses', 40, cz('tp_products_not_in') );
    }
}

if(cz('tp_products_not_in') && isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] == '/product/'){
    add_action( 'init', 'theme_clauses_product',40, 1  );
}

function theme_query_clauses($pieces) {
    global $wpdb;
    $not_in = cz('tp_products_not_in');
    if( ! empty($not_in) )
        $pieces[ 'where' ] .= " AND {$wpdb->posts}.ID NOT IN({$not_in})";
    return $pieces;
}

function get_post_by_name($post_name, $output = OBJECT) {
    global $wpdb;
    $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type='post'", $post_name ));
    if ( $post )
        return get_post($post, $output);

    return null;
}

// return title for img
function lcb_restore_image_title( $html, $id ) {

    $attachment = get_post($id);
    $mytitle = $attachment->post_title;
    return str_replace('<img', '<img title="' . $mytitle . '" ' , $html);
}
if(cz('tp_image_title')){
    add_filter( 'media_send_to_editor', 'lcb_restore_image_title', 15, 2 );
}



function image_host_remove() {
    $theme               = wp_get_theme();
    $field_options = 'cz_' . $theme->get( 'Name' );
    $data = get_option( $field_options );
    $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
    $new_data = json_decode(str_replace([ 'http:\/\/'.$cur_website, 'https:\/\/'.$cur_website,'\/\/'.$cur_website,'https:','http:'], '', json_encode($data)), true);
    $new_data['image_clean'] = 1;
    $rez  = update_option( $field_options, $new_data );
}

add_action( 'after_switch_theme', 'image_host_remove',40  );


function do_webp_to_png() {
    $media_query = new WP_Query(
        array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'posts_per_page' => -1,
        )
    );
    $list = array();
    foreach ($media_query->posts as $post) {
        $list[] = wp_get_attachment_url($post->ID);
    }
    $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);

    foreach ($list as $list_one) {
        if(strpos($list_one, 'webp')){

            $local_list_one = str_replace([ 'http://'.$cur_website, 'https://'.$cur_website,'//'.$cur_website,'https:','http:'], '', $list_one);

            $min_50 = '-50x50';
            $min_150 = '-150x150';
            $min_220 = '-220x220';
            $min_300 = '-300x300';
            $min_350 = '-350x350';
            $min_640 = '-640x640';

            $normal_path = str_replace("//", "/", ABSPATH.$local_list_one);

            $normal_path_50 = str_replace(".webp", $min_50.".webp", $normal_path);
            $normal_path_150 = str_replace(".webp", $min_150.".webp", $normal_path);
            $normal_path_220 = str_replace(".webp", $min_220.".webp", $normal_path);
            $normal_path_300 = str_replace(".webp", $min_300.".webp", $normal_path);
            $normal_path_350 = str_replace(".webp", $min_350.".webp", $normal_path);
            $normal_path_640 = str_replace(".webp", $min_640.".webp", $normal_path);


            $new_png = str_replace("webp", "png", $normal_path);
            $new_png_50 = str_replace("webp", "png", $normal_path_50);
            $new_png_150 = str_replace("webp", "png", $normal_path_150);
            $new_png_220 = str_replace("webp", "png", $normal_path_220);
            $new_png_300 = str_replace("webp", "png", $normal_path_300);
            $new_png_350 = str_replace("webp", "png", $normal_path_350);
            $new_png_640 = str_replace("webp", "png", $normal_path_640);




            if (!file_exists( $new_png ) ) {
                $im = imagecreatefromwebp($normal_path);
                imagepng($im, $new_png);
                imagedestroy($im);

                $im_50 = imagecreatefromwebp($normal_path_50);
                imagepng($im_50, $new_png_50);
                imagedestroy($im_50);

                $im_150 = imagecreatefromwebp($normal_path_150);
                imagepng($im_150, $new_png_150);
                imagedestroy($im_150);

                $im_220 = imagecreatefromwebp($normal_path_220);
                imagepng($im_220, $new_png_220);
                imagedestroy($im_220);

                $im_300 = imagecreatefromwebp($normal_path_300);
                imagepng($im_300, $new_png_300);
                imagedestroy($im_300);

                $im_350 = imagecreatefromwebp($normal_path_350);
                imagepng($im_350, $new_png_350);
                imagedestroy($im_350);

                $im_640 = imagecreatefromwebp($normal_path_640);
                imagepng($im_640, $new_png_640);
                imagedestroy($im_640);
            }


        }
    }

    echo 'done';
    die;

}

add_action( 'wp_ajax_load_webp_png', 'do_webp_to_png' );
add_action( 'wp_ajax_nopriv_load_webp_png', 'do_webp_to_png' );


function live_btn_init() {
    ?>
    <span class="custom_sidebar_btn"><a href="/live_customization"></a></span>
    <span class="custom_sidebar_btn_reload"><i class="reload_icon"></i></span>
    <?php
}


if( current_user_can( 'manage_options' ) ){
    add_action( 'live_btn', 'live_btn_init');
}


function live_template() {

    if(isset($_POST['template'])){
        $file = __DIR__ . '/inc/live_tabs/'.$_POST['template'].'.php';
        if(defined( 'ADS_PATH' ) && file_exists(ADS_PATH . 'includes/live/settings_template.php')){
            include( ADS_PATH . 'includes/live/settings_template.php' );
        }elseif(defined( 'SLV_PATH' ) && file_exists(SLV_PATH . 'includes/live/settings_template.php')){
            include( SLV_PATH . 'includes/live/settings_template.php' );
        }

        if(file_exists( $file )){

            include($file);
        }else{
            echo '';
        }
    }else{
        echo '';
    }
    die;

}
add_action( 'wp_ajax_live_template', 'live_template' );


function ads_true_load_comments(){
    $feedback= new \ads\adsFeedback($_POST['post_id'], $_POST['page'], $_POST['perpage']);
    $comments = $feedback->comments;

    wp_list_comments( [
        'walker'            => null,
        'max_depth'         => '',
        'style'             => 'div',
        'callback'          => 'list_review',
        'end-callback'      => null,
        'type'              => 'all',
        'reply_text'        => 'Reply',
        'page'              => 1,
        'per_page'          => $_POST['perpage'],
        'avatar_size'       => 32,
        'reverse_top_level' => null,
        'reverse_children'  => '',
        'format'            => 'html5',
        'echo'              => true,
        'status'            => 'approve'
    ], $comments );

    die();
}


add_action('wp_ajax_loadcomments', 'ads_true_load_comments');
add_action('wp_ajax_nopriv_loadcomments', 'ads_true_load_comments');

