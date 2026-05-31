<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 09.09.2015
 * Time: 8:51
 */

function rem_create_pages() {

    global $wp_rewrite;

    if ( isset( $_POST[ 'tp_create' ] ) && $_POST[ 'tp_create' ] == true && is_admin() ) {
        update_option( 'posts_per_rss', 20 );
        update_option( 'posts_per_page', 20 );
        update_option( 'show_on_front', 'page' );
        update_option( 'comments_per_page', 25 );
        update_option( 'page_comments', 1 );
        //$wp_rewrite->set_permalink_structure( '/%category%/%postname%/' );
        $wp_rewrite->set_permalink_structure( '/%postname%/' );

        wp_delete_post(1, true );
        wp_delete_post(2, true );
        wp_delete_post(3, true );

	    $pageObj = new rem_PageTemplate();
	    $pageObj->addPage( array( 'title' => __('Home', 'rap'), 'post_name' => 'home', 'static' => 'front' ) );
	    $pageObj->addPage( array( 'title' => __('Blog', 'rap'), 'post_name' => 'blog', 'static' => 'posts' ) );

	    $pageObj->addPage( array( 'title' => __('Subscription', 'rap'), 'post_name' => 'subscription' ) );
	    $pageObj->addPage( array( 'title' => __('Thank you', 'rap'), 'post_name' => 'thank-you-contact' ) );
	    $pageObj->addPage( array( 'title' => __('Payment methods', 'rap'), 'post_name' => 'payment-methods' ) );
	    $pageObj->addPage( array( 'title' => __('Shipping & Delivery', 'rap'), 'post_name' => 'shipping-delivery' ) );
	    $pageObj->addPage( array( 'title' => __('About Us', 'rap'), 'post_name' => 'about-us' ) );
	    $pageObj->addPage( array( 'title' => __('Contact Us', 'rap'), 'post_name' => 'contact-us' ) );
	    $pageObj->addPage( array( 'title' => __('Privacy Policy', 'rap'), 'post_name' => 'privacy-policy' ) );
	    $pageObj->addPage( array( 'title' => __('Terms and Conditions', 'rap'), 'post_name' => 'terms-and-conditions' ) );
	    $pageObj->addPage( array( 'title' => __('Refunds & Returns Policy', 'rap'), 'post_name' => 'refund-policy' ) );
	    $pageObj->addPage( array( 'title' => __('Frequently Asked Questions', 'rap'), 'post_name' => 'frequently-asked-questions' ) );
	    $pageObj->addPage( array( 'title' => __('Track your order', 'rap'), 'post_name' => 'track-your-order' ) );
	    $pageObj->addPageContent( array( 'title' => __('Account', 'rap'), 'post_name' => 'account', 'content' => '[ads_account]' ) );
	    $pageObj->addPageContent( array( 'title' => __('Orders', 'rap'), 'post_name' => 'orders', 'content' => '[ads_orders]' ) );

	    $pageObj->addPage( array( 'title' => __('Your shopping cart', 'rap'), 'post_name' => 'cart' ) );
	    $pageObj->addPage( array( 'title' => __('Thank you page', 'rap'), 'post_name' => 'thankyou' ) );

	    $pageObj->create();

	    $memu   = array();
	    $memu[] = array( 'title' => __( 'Home', 'rap' ), 'url' => '/' );
	    $memu[] = array( 'title' => __( 'Products', 'rap' ), 'url' => '/product/' );
	    $memu[] = array( 'title' => __( 'Shipping', 'rap' ), 'url' => '/shipping-delivery/' );
	    $memu[] = array( 'title' => __( 'Returns', 'rap' ), 'url' => '/refund-policy/' );
	    $memu[] = array( 'title' => __( 'About', 'rap' ), 'url' => '/about-us/' );
	    $memu[] = array( 'title' => __( 'Tracking', 'rap' ), 'url' => '/track-your-order/' );
	    $memu[] = array( 'title' => __( 'Contact', 'rap' ), 'url' => '/contact-us/' );
	    createMemu( $memu, 'Top Menu', 'top_menu' );

	    $memu   = array();
	    $memu[] = array( 'title' => __( 'About us', 'rap' ), 'url' => '/about-us/' );
	    $memu[] = array( 'title' => __( 'Privacy Policy', 'rap' ), 'url' => '/privacy-policy/' );
	    $memu[] = array( 'title' => __( 'Terms and Conditions', 'rap' ), 'url' => '/terms-and-conditions/' );
	    $memu[] = array( 'title' => __( 'Contact Us', 'rap' ), 'url' => '/contact-us/' );
	    createMemu( $memu, 'Company Info', 'footer-company' );

	    $memu   = array();
	    $memu[] = array( 'title' => __( 'Payment methods', 'rap' ), 'url' => '/payment-methods/' );
	    $memu[] = array( 'title' => __( 'Shipping & Delivery', 'rap' ), 'url' => '/shipping-delivery/' );
	    $memu[] = array( 'title' => __( 'Returns Policy', 'rap' ), 'url' => '/refund-policy/' );
	    $memu[] = array( 'title' => __( 'Frequently Asked Questions', 'rap' ), 'url' => '/frequently-asked-questions/' );
	    createMemu( $memu, 'Need Some Help?', 'footer-help' );

        $memu   = array();
        $memu[] = array( 'title' => __( 'Costumes', 'rap' ), 'url' => '/costumes/', 'slug' => 'costumes' );
        $memu[] = array( 'title' => __( 'Custom category', 'rap' ), 'url' => '/custom-category/', 'slug' => 'custom-category' );
        $memu[] = array( 'title' => __( 'Gifts', 'rap' ), 'url' => '/gifts/', 'slug' => 'gifts' );
        $memu[] = array( 'title' => __( 'Jewelry', 'rap' ), 'url' => '/jewelry/', 'slug' => 'jewelry' );
        $memu[] = array( 'title' => __( 'Men clothing', 'rap' ), 'url' => '/men-clothing/', 'slug' => 'men-clothing' );
        $memu[] = array( 'title' => __( 'Phone cases', 'rap' ), 'url' => '/phone-cases/', 'slug' => 'phone-cases' );
        $memu[] = array( 'title' => __( 'Posters', 'rap' ), 'url' => '/posters/', 'slug' => 'posters' );
        $memu[] = array( 'title' => __( 'T-shirts', 'rap' ), 'url' => '/t-shirts/', 'slug' => 't-shirts' );
        $memu[] = array( 'title' => __( 'Toys', 'rap' ), 'url' => '/toys/', 'slug' => 'toys' );
        $memu[] = array( 'title' => __( 'Women clothing', 'rap' ), 'url' => '/women-clothing/', 'slug' => 'women-clothing' );
        createMemu( $memu, 'Category menu', 'category' );
        add_action( 'init', 'createCategoryProduct', 10, $memu );

        $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
        $IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);

        $classic_params = [

            'tp_subscribe_show' => true,
            'tp_header_phone'   => '',
            'tp_address'        => '',
            'tp_show_sort_discount' => true,
            'tp_currency_switcher'          => true,
            'tp_best_deals'          => true,
            'home_blog_enable'          => true,





            'tp_about_delivery_1'  => $IMG_DIR .'del1.png',
            'tp_about_delivery_2'  => $IMG_DIR .'del2.png',
            'tp_about_delivery_3'  => $IMG_DIR .'del3.png',
            'tp_about_delivery_4'  => $IMG_DIR .'del4.png',
            'tp_about_delivery_5'  => $IMG_DIR .'del5.png',


            'tp_tab_shipping_label'              => __( 'Shipping & Payment', 'rap' ),
            'tp_single_shipping_payment_content' => ads\customization\czOptions::getTemplateField( 'tm_single_shipping_payment_content' ),

            'features' => array(
                'tp_color_features'      => '#8c9092',
                'tp_color_head_features' => '#444444',
                'item'=> array(
                    array(
                        'head'=> '700+ ' . __( 'Clients Love Us!', 'rap' ),
                        'text'=> __( 'We offer best service and great prices on high quality products', 'rap' ),
                    ),
                    array(
                        'head'=> __( 'Shipping to', 'rap' ) . ' 185 ' . __( 'Countries', 'rap' ),
                        'text'=> __( 'Our store operates worldwide and you can enjoy free delivery of all orders', 'rap' ),
                    ),
                    array(
                        'head'=> '100%  ' . __( 'Safe Payment', 'rap' ),
                        'text'=> __( 'Buy with confidence using the world’s most popular and secure payment methods', 'rap' ),
                    ),
                    array(
                        'head'=> '2000+ ' . __( 'Successful Deliveries', 'rap' ),
                        'text'=> __( 'Our Buyer Protection covers your purchase from click to delivery', 'rap' ),
                    )
                )
            ),

            'tp_single_why_buy_content'        => ads\customization\czOptions::getTemplateField( 'tp_single_why_buy_content' ),
            'tp_text_top_header'        => __( 'Free Worldwide Shipping', 'rap' ),





            'tp_mode'    => 1
        ];
        mode_save($classic_params);
        wp_send_json([
            'status' => 'SUCCESS',
            'message'   => 'Classic mode activated'
        ]);

    }

    if ( isset( $_POST[ 'tp_create_sellvia_mode' ] ) && $_POST[ 'tp_create_sellvia_mode' ] == true && is_admin() ) {
        update_option( 'posts_per_rss', 20 );
        update_option( 'posts_per_page', 20 );
        update_option( 'show_on_front', 'page' );
        update_option( 'comments_per_page', 25 );
        update_option( 'page_comments', 1 );
        //$wp_rewrite->set_permalink_structure( '/%category%/%postname%/' );
        $wp_rewrite->set_permalink_structure( '/%postname%/' );

        wp_delete_post(1, true );
        wp_delete_post(2, true );
        wp_delete_post(3, true );

        $pageObj = new rem_PageTemplate();
        $pageObj->addPage( array( 'title' => __('Home', 'rap'), 'post_name' => 'home', 'static' => 'front' ) );
        $pageObj->addPage( array( 'title' => __('Blog', 'rap'), 'post_name' => 'blog', 'static' => 'posts' ) );

        $pageObj->addPage( array( 'title' => __('Subscription', 'rap'), 'post_name' => 'subscription' ) );
        $pageObj->addPage( array( 'title' => __('Thank you', 'rap'), 'post_name' => 'thank-you-contact' ) );
        $pageObj->addPage( array( 'title' => __('Payment methods', 'rap'), 'post_name' => 'payment-methods' ) );
        $pageObj->addPage( array( 'title' => __('Shipping & Delivery', 'rap'), 'post_name' => 'shipping-delivery' ) );
        $pageObj->addPage( array( 'title' => __('About Us', 'rap'), 'post_name' => 'about-us' ) );
        $pageObj->addPage( array( 'title' => __('Contact Us', 'rap'), 'post_name' => 'contact-us' ) );
        $pageObj->addPage( array( 'title' => __('Privacy Policy', 'rap'), 'post_name' => 'privacy-policy' ) );
        $pageObj->addPage( array( 'title' => __('Terms and Conditions', 'rap'), 'post_name' => 'terms-and-conditions' ) );
        $pageObj->addPage( array( 'title' => __('Refunds & Returns Policy', 'rap'), 'post_name' => 'refund-policy' ) );
        $pageObj->addPage( array( 'title' => __('Frequently Asked Questions', 'rap'), 'post_name' => 'frequently-asked-questions' ) );
        $pageObj->addPage( array( 'title' => __('Track your order', 'rap'), 'post_name' => 'track-your-order' ) );
        $pageObj->addPageContent( array( 'title' => __('Account', 'rap'), 'post_name' => 'account', 'content' => '[ads_account]' ) );
        $pageObj->addPageContent( array( 'title' => __('Orders', 'rap'), 'post_name' => 'orders', 'content' => '[ads_orders]' ) );

        $pageObj->addPage( array( 'title' => __('Your shopping cart', 'rap'), 'post_name' => 'cart' ) );
        $pageObj->addPage( array( 'title' => __('Thank you page', 'rap'), 'post_name' => 'thankyou' ) );

        $pageObj->create();

        $memu   = array();
        $memu[] = array( 'title' => __( 'Home', 'rap' ), 'url' => '/' );
        $memu[] = array( 'title' => __( 'Products', 'rap' ), 'url' => '/product/' );
        $memu[] = array( 'title' => __( 'Shipping', 'rap' ), 'url' => '/shipping-delivery/' );
        $memu[] = array( 'title' => __( 'Returns', 'rap' ), 'url' => '/refund-policy/' );
        $memu[] = array( 'title' => __( 'About', 'rap' ), 'url' => '/about-us/' );
        $memu[] = array( 'title' => __( 'Tracking', 'rap' ), 'url' => '/track-your-order/' );
        $memu[] = array( 'title' => __( 'Contact', 'rap' ), 'url' => '/contact-us/' );
        createMemu( $memu, 'Top Menu', 'top_menu' );

        $memu   = array();
        $memu[] = array( 'title' => __( 'About us', 'rap' ), 'url' => '/about-us/' );
        $memu[] = array( 'title' => __( 'Privacy Policy', 'rap' ), 'url' => '/privacy-policy/' );
        $memu[] = array( 'title' => __( 'Terms and Conditions', 'rap' ), 'url' => '/terms-and-conditions/' );
        $memu[] = array( 'title' => __( 'Contact Us', 'rap' ), 'url' => '/contact-us/' );
        createMemu( $memu, 'Company Info', 'footer-company' );

        $memu   = array();
        $memu[] = array( 'title' => __( 'Payment methods', 'rap' ), 'url' => '/payment-methods/' );
        $memu[] = array( 'title' => __( 'Shipping & Delivery', 'rap' ), 'url' => '/shipping-delivery/' );
        $memu[] = array( 'title' => __( 'Returns Policy', 'rap' ), 'url' => '/refund-policy/' );
        $memu[] = array( 'title' => __( 'Frequently Asked Questions', 'rap' ), 'url' => '/frequently-asked-questions/' );
        createMemu( $memu, 'Need Some Help?', 'footer-help' );

        $memu   = array();
        $memu[] = array( 'title' => __( 'Costumes', 'rap' ), 'url' => '/costumes/', 'slug' => 'costumes' );
        $memu[] = array( 'title' => __( 'Custom category', 'rap' ), 'url' => '/custom-category/', 'slug' => 'custom-category' );
        $memu[] = array( 'title' => __( 'Gifts', 'rap' ), 'url' => '/gifts/', 'slug' => 'gifts' );
        $memu[] = array( 'title' => __( 'Jewelry', 'rap' ), 'url' => '/jewelry/', 'slug' => 'jewelry' );
        $memu[] = array( 'title' => __( 'Men clothing', 'rap' ), 'url' => '/men-clothing/', 'slug' => 'men-clothing' );
        $memu[] = array( 'title' => __( 'Phone cases', 'rap' ), 'url' => '/phone-cases/', 'slug' => 'phone-cases' );
        $memu[] = array( 'title' => __( 'Posters', 'rap' ), 'url' => '/posters/', 'slug' => 'posters' );
        $memu[] = array( 'title' => __( 'T-shirts', 'rap' ), 'url' => '/t-shirts/', 'slug' => 't-shirts' );
        $memu[] = array( 'title' => __( 'Toys', 'rap' ), 'url' => '/toys/', 'slug' => 'toys' );
        $memu[] = array( 'title' => __( 'Women clothing', 'rap' ), 'url' => '/women-clothing/', 'slug' => 'women-clothing' );
        createMemu( $memu, 'Category menu', 'category' );
        add_action( 'init', 'createCategoryProduct', 10, $memu );

        $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
        $IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);

        $sellvia_params = [

            'tp_subscribe_show' => false,
            'tp_header_phone'   => '',
            'tp_address'        => '',
            'tp_show_sort_discount' => false,
            'tp_currency_switcher'   => false,
            'tp_best_deals'          => false,
            'home_blog_enable'          => false,

            'tp_about_delivery_1'  => $IMG_DIR .'del2.png',
            'tp_about_delivery_2'  => $IMG_DIR .'del3.png',
            'tp_about_delivery_3'  => $IMG_DIR .'del4.png',
            'tp_about_delivery_4'  => $IMG_DIR .'del6.png',
            'tp_about_delivery_5'  => $IMG_DIR .'del7.png',


            'tp_tab_shipping_label'              => __( 'Shipping & Delivery', 'rap' ),
            'tp_single_shipping_payment_content' => ads\customization\czOptions::getTemplateField( 'tm_single_shipping_payment_content_sellvia' ),

            'features' => array(
                'tp_color_features'      => '#8c9092',
                'tp_color_head_features' => '#444444',
                'item'=> array(
                    array(
                        'head'=> __( 'Curated Selections', 'rap' ),
                        'text'=> __( 'Discover exclusive products at unbeatable prices', 'rap' ),
                    ),
                    array(
                        'head'=> __( '1-3 Day US Shipping', 'rap' ),
                        'text'=> __( 'We offer free no-contact shipping within the US on every order', 'rap' ),
                    ),
                    array(
                        'head'=> __( '100% Safe Payment', 'rap' ),
                        'text'=> __( 'Buy with confidence using the world’s most secure payment methods', 'rap' ),
                    ),
                    array(
                        'head'=> __( 'Easy Returns', 'rap' ),
                        'text'=> __( 'Not in love with your purchase? Get a full refund, no questions asked', 'rap' ),
                    )
                )
            ),


            'tp_single_why_buy_content'        => ads\customization\czOptions::getTemplateField( 'tp_single_why_buy_content_sellvia' ),
            'tp_text_top_header'        => __( 'Fast US Shipping', 'rap' ),



            'tp_mode'    => 2
        ];
        mode_save($sellvia_params);
        wp_send_json([
            'status' => 'SUCCESS',
            'message'   => 'Sellvia mode activated'
        ]);

    }

}
add_action('admin_init', 'rem_create_pages');

//@TODO
function createCategoryProduct()
{
	$category   = array();
	$category[] = array( 'title' => __( 'Costumes', 'rap' ), 'url' => '/costumes/', 'slug' => 'costumes' );
	$category[] = array( 'title' => __( 'Custom category', 'rap' ), 'url' => '/custom-category/', 'slug' => 'custom-category' );
	$category[] = array( 'title' => __( 'Gifts', 'rap' ), 'url' => '/gifts/', 'slug' => 'gifts' );
	$category[] = array( 'title' => __( 'Jewelry', 'rap' ), 'url' => '/jewelry/', 'slug' => 'jewelry' );
	$category[] = array( 'title' => __( 'Men clothing', 'rap' ), 'url' => '/men-clothing/', 'slug' => 'men-clothing' );
	$category[] = array( 'title' => __( 'Phone cases', 'rap' ), 'url' => '/phone-cases/', 'slug' => 'phone-cases' );
	$category[] = array( 'title' => __( 'Posters', 'rap' ), 'url' => '/posters/', 'slug' => 'posters' );
	$category[] = array( 'title' => __( 'T-shirts', 'rap' ), 'url' => '/t-shirts/', 'slug' => 't-shirts' );
	$category[] = array( 'title' => __( 'Toys', 'rap' ), 'url' => '/toys/', 'slug' => 'toys' );
	$category[] = array( 'title' => __( 'Women clothing', 'rap' ), 'url' => '/women-clothing/', 'slug' => 'women-clothing' );
	foreach ( $category as $key => $item ) {
		wp_insert_term(
			$item[ 'title' ],
			'product_cat',
			array(
				'description' => '',
				'slug'        => $item[ 'slug' ],
				'parent'      => 0
			)
		);

	}
}

function createMemu( $memu, $menu_name, $location = false )
{
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	if ( !$menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		if ( $location ) {
			$locations              = get_theme_mod( 'nav_menu_locations' );
			$locations[ $location ] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}

		foreach ( $memu as $key => $item ) {
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'    => $item[ 'title' ],
				'menu-item-position' => $key,
				'menu-item-url'      => home_url( $item[ 'url' ] ),
				'menu-item-status'   => 'publish' ) );
		}

		return true;
	}

	return false;
}


/**
 * @param $memu
 * @param $menu_name
 * @param bool|string $location
 *
 * @return bool
 */
function updateMenu( $memu, $menu_name, $location = false ) {

    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if ( $menu_exists->term_id ) {
        wp_delete_term( $menu_exists->term_id, 'nav_menu' );

        $menu_id = wp_create_nav_menu( $menu_name );

        if ( $location ) {
            $locations              = get_theme_mod( 'nav_menu_locations' );
            $locations[ $location ] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        foreach ( $memu as $key => $item ) {
            wp_update_nav_menu_item( $menu_id, 0, [
                'menu-item-title'    => $item[ 'title' ],
                'menu-item-position' => $key,
                'menu-item-url'      => home_url( $item[ 'url' ] ),
                'menu-item-status'   => 'publish'
            ] );
        }

        return true;
    }else{
        $menu_id = wp_create_nav_menu( $menu_name );

        if ( $location ) {
            $locations              = get_theme_mod( 'nav_menu_locations' );
            $locations[ $location ] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }

        foreach ( $memu as $key => $item ) {
            wp_update_nav_menu_item( $menu_id, 0, [
                'menu-item-title'    => $item[ 'title' ],
                'menu-item-position' => $key,
                'menu-item-url'      => home_url( $item[ 'url' ] ),
                'menu-item-status'   => 'publish'
            ] );
        }

        return true;
    }

    return false;
}

/**
 *
 * @return array
 */

function mode_get_defaults() {

    $defaults = [];

    $file = get_template_directory() .'/adstm/customization/defaults.php';
    if( file_exists( $file ) ) {
        $defaults = include $file;
    }

    return apply_filters( 'cz_fields', $defaults );
}

/**
 * @param $params
 *
 * @return bool
 */

function mode_save($params) {
    if( isset( $params ) ) {

        $options = mode_get_defaults();

        $data      = get_option( 'cz_' .wp_get_theme() );
        $mix_data = array_merge($options,$data);

        foreach( $params as $key => $value ) {
            $mix_data[ $key ] = $value;
        }

        return update_option( 'cz_' .wp_get_theme() , $mix_data );
    }
    return false;
}


class rem_PageTemplate
{
	private
		$_pages = array();

	function __construct()
	{
	}

	/**
	 * @param $page
	 * @throws Exception
	 */
	public function addPage( $page )
	{

		if ( empty( $page[ 'post_name' ] ) )
			throw new Exception( 'no post_name' );

		$page[ 'content' ] = $this->getContent( $page[ 'post_name' ] );

		array_push( $this->_pages, $page );
	}

	/**
	 * addPageContent
	 *
	 * @param type $pageObj
	 * @throws Exception
	 */
	public function addPageContent($pageObj)
	{
		if (empty($pageObj['post_name'])) {
			throw new Exception( 'no post_name' );
		}

		if (empty($pageObj['content'])) {
			throw new Exception(' no post_content');
		}

		array_push( $this->_pages, $pageObj );
	}

	/**
	 * @return int|WP_Error
	 */
	public function create()
	{
		foreach ( $this->_pages as $page ) {

			$new_page = array(
				'post_type'    => 'page',
				'post_title'   => $page[ 'title' ],
				'post_name'    => $page[ 'post_name' ],
				'post_content' => $page[ 'content' ],
				'post_status'  => 'publish',
				'post_author'  => 1,
			);

			if ( !$this->issetPage( $page[ 'post_name' ] ) ) {
				$id = wp_insert_post( $new_page );
				if ( isset( $page[ 'static' ] ) && $page[ 'static' ] == 'front' ) update_option( 'page_on_front', $id );
				if ( isset( $page[ 'static' ] ) && $page[ 'static' ] == 'posts' ) update_option( 'page_for_posts', $id );
			}
		}
	}

	/**
	 * @param $slug
	 * @return bool
	 */
	private function issetPage( $slug )
	{
		$args       = array(
			'pagename'           => $slug
		);

		$page_check = new WP_Query( $args );
		if ( $page_check->post ) return true;

		return false;
	}

	/**
	 * @param $pagename
	 * @return mixed|string
	 */
	private function getContent( $pagename )
	{
        if(isset( $_POST[ 'tp_create_sellvia_mode' ] ) && $_POST[ 'tp_create_sellvia_mode' ] == true){
            $file = dirname( __FILE__ ) . '/sellvia_pages_default/' . $pagename . '.php';
        }else{
            $file = dirname( __FILE__ ) . '/pages_default/' . $pagename . '.php';
        }

		if ( file_exists( $file ) ) {
			ob_start();
			include( $file );
			$text = ob_get_contents();
			ob_end_clean();

			return $text;
		}

		return '';
	}
}