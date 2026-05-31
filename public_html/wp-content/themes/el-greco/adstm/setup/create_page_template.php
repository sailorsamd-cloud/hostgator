<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 09.09.2015
 * Time: 8:51
 */

function adstm_create_pages() {

    global $wp_rewrite;

    if ( isset( $_POST[ 'tp_create' ] ) && $_POST[ 'tp_create' ] == true && is_admin() ) {
    	
        update_option( 'posts_per_rss', 20 );
        update_option( 'posts_per_page', 30 );
        update_option( 'show_on_front', 'page' );
        update_option( 'comments_per_page', 25 );
        update_option( 'page_comments', 1 );
        
        $wp_rewrite->set_permalink_structure( '/%postname%/' );

        wp_delete_post(1, true );
        wp_delete_post(2, true );
        wp_delete_post(3, true );

	    $pageObj = new adstm_PageTemplate();

        $front_page = get_post_by_name( 'home' );
        if(!$front_page){
            $pageObj->addPage( [ 'title' => __( 'Home', 'elgreco' ), 'post_name' => 'home', 'static' => 'front' ] );
        }

        $blog_page = get_page_by_path( 'blog' );
        if(!$blog_page){
            $pageObj->addPage( [ 'title' => __( 'Blog', 'elgreco' ), 'post_name' => 'blog', 'static' => 'posts' ] );
        }

	    $pageObj->addPage( [ 'title' => __( 'Subscription', 'elgreco' ), 'post_name' => 'subscription' ] );
	    $pageObj->addPage( [ 'title' => __( 'Thank you', 'elgreco' ), 'post_name' => 'thank-you-contact' ] );
	    $pageObj->addPage( [ 'title' => __( 'Payment Methods', 'elgreco' ), 'post_name' => 'payment-methods' ] );
	    $pageObj->addPage( [ 'title' => __( 'Shipping & Delivery', 'elgreco' ), 'post_name' => 'shipping-delivery' ] );
	    $pageObj->addPage( [ 'title' => __( 'About Us', 'elgreco' ), 'post_name' => 'about-us' ] );
	    $pageObj->addPage( [ 'title' => __( 'Contact Us', 'elgreco' ), 'post_name' => 'contact-us' ] );
	    $pageObj->addPage( [ 'title' => __( 'Privacy Policy', 'elgreco' ), 'post_name' => 'privacy-policy' ] );
	    $pageObj->addPage( [ 'title' => __( 'Terms and Conditions', 'elgreco' ), 'post_name' => 'terms-and-conditions' ] );
	    $pageObj->addPage( [ 'title' => __( 'Refunds & Returns Policy', 'elgreco' ), 'post_name' => 'refund-policy' ] );
	    $pageObj->addPage( [ 'title' => __( 'Frequently Asked Questions', 'elgreco' ), 'post_name' => 'frequently-asked-questions' ] );
	    $pageObj->addPage( [ 'title' => __( 'Track your order', 'elgreco' ), 'post_name' => 'track-your-order' ] );
	    $pageObj->addPageContent( [ 'title' => __( 'Account', 'elgreco' ), 'post_name' => 'account', 'content' => '[ads_account]' ] );
	    $pageObj->addPageContent( [ 'title' => __( 'Orders', 'elgreco' ), 'post_name' => 'orders', 'content' => '[ads_orders]' ] );

	    $pageObj->addPage( [ 'title' => __( 'Your shopping cart', 'elgreco' ), 'post_name' => 'cart' ] );
	    $pageObj->addPage( [ 'title' => __( 'Thank you page', 'elgreco' ), 'post_name' => 'thankyou' ] );

	    $pageObj->create();


        updateMenu( [
		    [ 'title' => __( 'About Us', 'elgreco' ), 'url' => '/about-us/' ],
            [ 'title' => __( 'Contact Us', 'elgreco' ), 'url' => '/contact-us/' ],
            [ 'title' => __( 'Blog', 'elgreco' ), 'url' => '/blog/' ],
            [ 'title' => __( 'Privacy Policy', 'elgreco' ), 'url' => '/privacy-policy/' ],
            [ 'title' => __( 'Terms & Conditions', 'elgreco' ), 'url' => '/terms-and-conditions/' ],

	    ], 'Company info', 'footer-company' );

        createMenu( [
            [ 'title' => __( 'FAQs', 'elgreco' ), 'url' => '/frequently-asked-questions/' ],
            [ 'title' => __( 'Payment Methods', 'elgreco' ), 'url' => '/payment-methods/' ],
            [ 'title' => __( 'Shipping & Delivery', 'elgreco' ), 'url' => '/shipping-delivery/' ],
            [ 'title' => __( 'Returns Policy', 'elgreco' ), 'url' => '/refund-policy/' ],
            [ 'title' => __( 'Tracking', 'elgreco' ), 'url' => '/track-your-order/' ],
        ], 'Purchase info', 'footer-purchase' );





        add_action( 'init', 'createCategoryProduct', 10, [
	        [ 'title' => __( 'Costumes', 'elgreco' ), 'url' => '/costumes/', 'slug' => 'costumes' ],
	        [ 'title' => __( 'Custom category', 'elgreco' ), 'url' => '/custom-category/', 'slug' => 'custom-category' ],
	        [ 'title' => __( 'Gifts', 'elgreco' ), 'url' => '/gifts/', 'slug' => 'gifts' ],
	        [ 'title' => __( 'Jewelry', 'elgreco' ), 'url' => '/jewelry/', 'slug' => 'jewelry' ],
	        [ 'title' => __( 'Men clothing', 'elgreco' ), 'url' => '/men-clothing/', 'slug' => 'men-clothing' ],
	        [ 'title' => __( 'Phone cases', 'elgreco' ), 'url' => '/phone-cases/', 'slug' => 'phone-cases' ],
	        [ 'title' => __( 'Posters', 'elgreco' ), 'url' => '/posters/', 'slug' => 'posters' ],
	        [ 'title' => __( 'T-shirts', 'elgreco' ), 'url' => '/t-shirts/', 'slug' => 't-shirts' ],
	        [ 'title' => __( 'Toys', 'elgreco' ), 'url' => '/toys/', 'slug' => 'toys' ],
	        [ 'title' => __( 'Women clothing', 'elgreco' ), 'url' => '/women-clothing/', 'slug' => 'women-clothing' ]
        ] );
        
        createMenu( [
	        [ 'title' => __( 'Costumes', 'elgreco' ), 'url' => '/costumes/' ],
	        [ 'title' => __( 'Custom category', 'elgreco' ), 'url' => '/custom-category/' ],
	        [ 'title' => __( 'Gifts', 'elgreco' ), 'url' => '/gifts/' ],
	        [ 'title' => __( 'Jewelry', 'elgreco' ), 'url' => '/jewelry/' ],
	        [ 'title' => __( 'Men clothing', 'elgreco' ), 'url' => '/men-clothing/' ],
	        [ 'title' => __( 'Phone cases', 'elgreco' ), 'url' => '/phone-cases/' ],
	        [ 'title' => __( 'Posters', 'elgreco' ), 'url' => '/posters/' ],
	        [ 'title' => __( 'T-shirts', 'elgreco' ), 'url' => '/t-shirts/' ],
	        [ 'title' => __( 'Toys', 'elgreco' ), 'url' => '/toys/' ],
	        [ 'title' => __( 'Women clothing', 'elgreco' ), 'url' => '/women-clothing/' ]
        ], 'Main menu', 'category' );

        $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
        $IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);

        $classic_params = [

            'tp_subscribe_show' => true,
            'tp_header_phone'   => '',
            'tp_address'        => '',
            'tp_show_sort_discount' => true,
            'home_blog_enable'      => true,
            'home_top_deals'        => true,
            'tp_bens_show'          => true,
            'tp_currency_switcher'          => true,
            'tp_shipping_tip'       => 'Free shipping worldwide',
            'tp_returns_tip'        => '60 Day Returns',

            'tp_about_delivery_1'  => $IMG_DIR .'del1.png',
            'tp_about_delivery_2'  => $IMG_DIR .'del2.png',
            'tp_about_delivery_3'  => $IMG_DIR .'del3.png',
            'tp_about_delivery_4'  => $IMG_DIR .'del4.png',
            'tp_about_delivery_5'  => $IMG_DIR .'del5.png',
            'store_benefits_days'   => 15,

            'tp_faqs_text'  => ads\customization\czOptions::getTemplateField( 'tp_faqs' ),

            'tp_tab_shipping_label'              => __( 'Shipping & Returns', 'elgreco' ),
            'tp_single_shipping_payment_content' => ads\customization\czOptions::getTemplateField( 'tm_single_shipping_payment_content' ),

            'features' => [
                'item'=> [
                    [
                        'head'=> __( 'FREE DELIVERY', 'elgreco' ),
                        'text'=> __( 'On all orders', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f1.png',
                    ],
                    [
                        'head'=> __( 'FREE RETURNS', 'elgreco' ),
                        'text'=> __( 'No questions asked return policy', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f2.png',
                    ],
                    [
                        'head'=> __( 'NEED HELP?', 'elgreco' ).' support@'.$cur_website,
                        'text'=> __( 'We\'re always there for you', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f3.png',
                    ],
                    [
                        'head'=> __( 'MONEY BACK GUARANTEE', 'elgreco' ),
                        'text'=> __( 'Worry-free shopping', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f4.png',
                    ]
                ]
            ],

            'store_benefits' => array(
                'item'=> array(
                    array(
                        'head'=> __( 'Estimated Delivery Date:', 'elgreco' ),
                        'text'=> __( 'Due to high demand, please allow at least 2-4 weeks for delivery.', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/n1.png',
                    ),
                    array(
                        'head'=> __( 'Insured & Trackable Worldwide Shipping', 'elgreco' ),
                        'text'=> __( 'Your tracking number will be sent to you after 3-5 processing days.', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/n2.png',
                    ),
                    array(
                        'head'=> __( 'Love It or Get A 100% Refund!', 'elgreco' ),
                        'text'=> __( 'We\'re absolutely confident that you\'ll love this product. If you don\'t, just return it for a FULL refund! No questions asked!', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/n3.png',
                    )

                )
            ),

            'tp_desc_add_text'   => '<ul>
                <li><span>'.__( 'Over 37,000', 'elgreco' ).'</span> '.__( 'happy customers worldwide', 'elgreco' ).'</li>
                <li><span>'.__( 'Real people', 'elgreco' ).'</span> '.__( 'on our support team ready to help', 'elgreco' ).'</li>
                <li><span>'.__( 'The finest materials and stunning design', 'elgreco' ).'</span> '.__( '— all our products are developed with an obsessive dedication to quality, durability, and functionality', 'elgreco' ).'</li>
                <li><span>'.__( 'We use the most secure', 'elgreco' ).'</span> '.__( ' online ordering systems on the market, and are constantly improving our software to make sure we offer the highest possible security', 'elgreco' ).'</li>
            </ul>',

            'tp_mode'    => 1
        ];
        mode_save($classic_params);
        wp_send_json([
            'status' => 'SUCCESS',
            'message'   => 'Classic mode activated'
        ]);

    }

    if (isset( $_POST[ 'tp_create_sellvia_mode' ] ) && $_POST[ 'tp_create_sellvia_mode' ] == true && is_admin() ) {

        update_option( 'posts_per_rss', 20 );
        update_option( 'posts_per_page', 30 );
        update_option( 'show_on_front', 'page' );
        update_option( 'comments_per_page', 25 );
        update_option( 'page_comments', 1 );

        $wp_rewrite->set_permalink_structure( '/%postname%/' );

        wp_delete_post(1, true );
        wp_delete_post(2, true );
        wp_delete_post(3, true );

        $pageObj = new adstm_PageTemplate();

        $front_page = get_post_by_name( 'home' );
        if(!$front_page){
            $pageObj->addPage( [ 'title' => __( 'Home', 'elgreco' ), 'post_name' => 'home', 'static' => 'front' ] );
        }

        $blog_page = get_page_by_path( 'blog' );
        if(!$blog_page){
            $pageObj->addPage( [ 'title' => __( 'Blog', 'elgreco' ), 'post_name' => 'blog', 'static' => 'posts' ] );
        }

        $pageObj->addPage( [ 'title' => __( 'Subscription', 'elgreco' ), 'post_name' => 'subscription' ] );
        $pageObj->addPage( [ 'title' => __( 'Thank you', 'elgreco' ), 'post_name' => 'thank-you-contact' ] );
        $pageObj->addPage( [ 'title' => __( 'Payment Methods', 'elgreco' ), 'post_name' => 'payment-methods' ] );
        $pageObj->addPage( [ 'title' => __( 'Shipping & Delivery', 'elgreco' ), 'post_name' => 'shipping-delivery' ] );
        $pageObj->addPage( [ 'title' => __( 'About Us', 'elgreco' ), 'post_name' => 'about-us' ] );
        $pageObj->addPage( [ 'title' => __( 'Contact Us', 'elgreco' ), 'post_name' => 'contact-us' ] );
        $pageObj->addPage( [ 'title' => __( 'Privacy Policy', 'elgreco' ), 'post_name' => 'privacy-policy' ] );
        $pageObj->addPage( [ 'title' => __( 'Terms and Conditions', 'elgreco' ), 'post_name' => 'terms-and-conditions' ] );
        $pageObj->addPage( [ 'title' => __( 'Refunds & Returns Policy', 'elgreco' ), 'post_name' => 'refund-policy' ] );
        $pageObj->addPage( [ 'title' => __( 'Frequently Asked Questions', 'elgreco' ), 'post_name' => 'frequently-asked-questions' ] );
        $pageObj->addPage( [ 'title' => __( 'Track your order', 'elgreco' ), 'post_name' => 'track-your-order' ] );
        $pageObj->addPageContent( [ 'title' => __( 'Account', 'elgreco' ), 'post_name' => 'account', 'content' => '[ads_account]' ] );
        $pageObj->addPageContent( [ 'title' => __( 'Orders', 'elgreco' ), 'post_name' => 'orders', 'content' => '[ads_orders]' ] );

        $pageObj->addPage( [ 'title' => __( 'Your shopping cart', 'elgreco' ), 'post_name' => 'cart' ] );
        $pageObj->addPage( [ 'title' => __( 'Thank you page', 'elgreco' ), 'post_name' => 'thankyou' ] );

        $pageObj->create();




        updateMenu( [
            [ 'title' => __( 'About Us', 'elgreco' ), 'url' => '/about-us/' ],
            [ 'title' => __( 'Contact Us', 'elgreco' ), 'url' => '/contact-us/' ],
            [ 'title' => __( 'Privacy Policy', 'elgreco' ), 'url' => '/privacy-policy/' ],
            [ 'title' => __( 'Terms & Conditions', 'elgreco' ), 'url' => '/terms-and-conditions/' ],

        ], 'Company info', 'footer-company' );



        createMenu( [
            [ 'title' => __( 'FAQs', 'elgreco' ), 'url' => '/frequently-asked-questions/' ],
            [ 'title' => __( 'Payment Methods', 'elgreco' ), 'url' => '/payment-methods/' ],
            [ 'title' => __( 'Shipping & Delivery', 'elgreco' ), 'url' => '/shipping-delivery/' ],
            [ 'title' => __( 'Returns Policy', 'elgreco' ), 'url' => '/refund-policy/' ],
            [ 'title' => __( 'Tracking', 'elgreco' ), 'url' => '/track-your-order/' ],
        ], 'Purchase info', 'footer-purchase' );





        add_action( 'init', 'createCategoryProduct', 10, [
            [ 'title' => __( 'Costumes', 'elgreco' ), 'url' => '/costumes/', 'slug' => 'costumes' ],
            [ 'title' => __( 'Custom category', 'elgreco' ), 'url' => '/custom-category/', 'slug' => 'custom-category' ],
            [ 'title' => __( 'Gifts', 'elgreco' ), 'url' => '/gifts/', 'slug' => 'gifts' ],
            [ 'title' => __( 'Jewelry', 'elgreco' ), 'url' => '/jewelry/', 'slug' => 'jewelry' ],
            [ 'title' => __( 'Men clothing', 'elgreco' ), 'url' => '/men-clothing/', 'slug' => 'men-clothing' ],
            [ 'title' => __( 'Phone cases', 'elgreco' ), 'url' => '/phone-cases/', 'slug' => 'phone-cases' ],
            [ 'title' => __( 'Posters', 'elgreco' ), 'url' => '/posters/', 'slug' => 'posters' ],
            [ 'title' => __( 'T-shirts', 'elgreco' ), 'url' => '/t-shirts/', 'slug' => 't-shirts' ],
            [ 'title' => __( 'Toys', 'elgreco' ), 'url' => '/toys/', 'slug' => 'toys' ],
            [ 'title' => __( 'Women clothing', 'elgreco' ), 'url' => '/women-clothing/', 'slug' => 'women-clothing' ]
        ] );

        createMenu( [
            [ 'title' => __( 'Costumes', 'elgreco' ), 'url' => '/costumes/' ],
            [ 'title' => __( 'Custom category', 'elgreco' ), 'url' => '/custom-category/' ],
            [ 'title' => __( 'Gifts', 'elgreco' ), 'url' => '/gifts/' ],
            [ 'title' => __( 'Jewelry', 'elgreco' ), 'url' => '/jewelry/' ],
            [ 'title' => __( 'Men clothing', 'elgreco' ), 'url' => '/men-clothing/' ],
            [ 'title' => __( 'Phone cases', 'elgreco' ), 'url' => '/phone-cases/' ],
            [ 'title' => __( 'Posters', 'elgreco' ), 'url' => '/posters/' ],
            [ 'title' => __( 'T-shirts', 'elgreco' ), 'url' => '/t-shirts/' ],
            [ 'title' => __( 'Toys', 'elgreco' ), 'url' => '/toys/' ],
            [ 'title' => __( 'Women clothing', 'elgreco' ), 'url' => '/women-clothing/' ]
        ], 'Main menu', 'category' );


        $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
        $IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);

        $sellvia_params = [
            'tp_subscribe_show' => false,
            'tp_header_phone'   => '',
            'tp_address'        => '',
            'tp_show_sort_discount' => false,
            'home_blog_enable'      => false,
            'home_top_deals'        => false,
            'tp_bens_show'          => true,
            'tp_currency_switcher'          => false,

            'tp_shipping_tip'       => 'Fast US Shipping',
            'tp_returns_tip'        => 'Free Returns',

            'tp_about_delivery_1'  => $IMG_DIR .'del2.png',
            'tp_about_delivery_2'  => $IMG_DIR .'del3.png',
            'tp_about_delivery_3'  => $IMG_DIR .'del4.png',
            'tp_about_delivery_4'  => $IMG_DIR .'del6.png',
            'tp_about_delivery_5'  => $IMG_DIR .'del7.png',

            'store_benefits_days'   => 4,

            'features' => [
                'item'=> [
                    [
                        'head'=> __( '1-3 DAY US SHIPPING ', 'elgreco' ),
                        'text'=> __( 'On all orders', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f1.png',
                    ],
                    [
                        'head'=> __( 'FREE RETURNS', 'elgreco' ),
                        'text'=> __( 'No questions asked return policy', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f2.png',
                    ],
                    [
                        'head'=> __( 'NEED HELP?', 'elgreco' ).' support@'.$cur_website,
                        'text'=> __( 'We\'re always there for you', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f3.png',
                    ],
                    [
                        'head'=> __( 'MONEY BACK GUARANTEE', 'elgreco' ),
                        'text'=> __( 'Worry-free shopping', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/f4.png',
                    ]
                ]
            ],

            'store_benefits' => array(
                'item'=> array(
                    array(
                        'head'=> __( 'ESTIMATED DELIVERY DATE:', 'elgreco' ),
                        'text'=> __( 'Your order will be delivered by the most reliable carriers', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/n1.png',
                    ),
                    array(
                        'head'=> __( 'FAST US SHIPPING', 'elgreco' ),
                        'text'=> __( 'We offer fast no-contact shipping within the US on every order', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/n2.png',
                    ),
                    array(
                        'head'=> __( 'FREE & EASY RETURNS', 'elgreco' ),
                        'text'=> __( 'If you’re not thrilled with your purchase, simply send it back for a full refund', 'elgreco' ),
                        'img'=> $IMG_DIR . 'single/n3.png',
                    )

                )
            ),

            'tp_desc_add_text'   => '<ul>
                <li><span>'.__( 'Over 37,000', 'elgreco' ).'</span> '.__( 'happy customers across the US', 'elgreco' ).'</li>
                <li><span>'.__( 'Real people', 'elgreco' ).'</span> '.__( 'on our support team ready to help', 'elgreco' ).'</li>
                <li><span>'.__( 'The finest materials and stunning design', 'elgreco' ).'</span> '.__( '— all our products are developed with an obsessive dedication to quality, durability, and functionality', 'elgreco' ).'</li>
                <li><span>'.__( 'We use the most secure', 'elgreco' ).'</span> '.__( ' online ordering systems on the market, and are constantly improving our software to make sure we offer the highest possible security', 'elgreco' ).'</li>
            </ul>',

            'tp_faqs_text'  => ads\customization\czOptions::getTemplateField( 'tp_faqs_sellvia' ),

            'tp_tab_shipping_label'              => __( 'Shipping & Delivery', 'elgreco' ),
            'tp_single_shipping_payment_content' => ads\customization\czOptions::getTemplateField( 'tm_single_shipping_payment_content_sellvia' ),

            'tp_mode'    => 2



        ];
        mode_save($sellvia_params);
        wp_send_json([
            'status' => 'SUCCESS',
            'message'   => 'Sellvia mode activated'
        ]);

    }

}
add_action( 'admin_init', 'adstm_create_pages' );

function createCategoryProduct() {
	
	$category   = [
		[ 'title' => __( 'Costumes', 'elgreco' ), 'url' => '/costumes/', 'slug' => 'costumes' ],
		[ 'title' => __( 'Custom category', 'elgreco' ), 'url' => '/custom-category/', 'slug' => 'custom-category' ],
		[ 'title' => __( 'Gifts', 'elgreco' ), 'url' => '/gifts/', 'slug' => 'gifts' ],
		[ 'title' => __( 'Jewelry', 'elgreco' ), 'url' => '/jewelry/', 'slug' => 'jewelry' ],
		[ 'title' => __( 'Men clothing', 'elgreco' ), 'url' => '/men-clothing/', 'slug' => 'men-clothing' ],
		[ 'title' => __( 'Phone cases', 'elgreco' ), 'url' => '/phone-cases/', 'slug' => 'phone-cases' ],
		[ 'title' => __( 'Posters', 'elgreco' ), 'url' => '/posters/', 'slug' => 'posters' ],
		[ 'title' => __( 'T-shirts', 'elgreco' ), 'url' => '/t-shirts/', 'slug' => 't-shirts' ],
		[ 'title' => __( 'Toys', 'elgreco' ), 'url' => '/toys/', 'slug' => 'toys' ],
		[ 'title' => __( 'Women clothing', 'elgreco' ), 'url' => '/women-clothing/', 'slug' => 'women-clothing' ]
	];
	
	foreach ( $category as $key => $item ) {
		wp_insert_term( $item[ 'title' ], 'product_cat', [
			'description' => '',
			'slug'        => $item[ 'slug' ],
			'parent'      => 0
		] );
	}
}

/**
 * @param $memu
 * @param $menu_name
 * @param bool|string $location
 *
 * @return bool
 */
function createMenu( $memu, $menu_name, $location = false ) {
	
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	if ( !$menu_exists ) {
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


class adstm_PageTemplate {
	
	private $_pages = [];

	public function __construct() {}

	/**
	 * @param $page
	 * @throws Exception
	 */
	public function addPage( $page ) {

		if ( empty( $page[ 'post_name' ] ) )
			throw new Exception( 'no post_name' );

		$page[ 'content' ] = $this->getContent( $page[ 'post_name' ] );

		array_push( $this->_pages, $page );
	}

	/**
	 * addPageContent
	 *
	 * @param object $pageObj
	 * @throws Exception
	 */
	public function addPageContent( $pageObj ) {
		
		if( empty( $pageObj[ 'post_name' ] ) ) {
			throw new Exception( 'no post_name' );
		}

		if( empty( $pageObj[ 'content' ] ) ) {
			throw new Exception(' no post_content' );
		}

		array_push( $this->_pages, $pageObj );
	}

	public function create() {
		
		foreach ( $this->_pages as $page ) {

			$new_page = [
				'post_type'    => 'page',
				'post_title'   => $page[ 'title' ],
				'post_name'    => $page[ 'post_name' ],
				'post_content' => $page[ 'content' ],
				'post_status'  => 'publish',
				'post_author'  => 1,
			];

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
	private function issetPage( $slug ) {
		
		$page_check = new WP_Query( [
			'pagename' => $slug
		] );
		
		if ( $page_check->post ) return true;

		return false;
	}

	/**
	 * @param $pagename
	 * @return mixed|string
	 */
	private function getContent( $pagename ) {

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