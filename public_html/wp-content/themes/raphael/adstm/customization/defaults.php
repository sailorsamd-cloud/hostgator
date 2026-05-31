<?php
/**
 * Autor: Pavel Shishkin
 * Date: 30.06.2016
 * Time: 19:04
 */

if(!defined('ADSTM_HOME')){
	define('ADSTM_HOME', home_url());
}
$cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
$TEMPLATE_URL = str_replace('//'.$cur_website,'',TEMPLATE_URL);
$IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);

return array(
	'tp_head'                => '',
	'tp_style'               => '',


	/*base*/
	'tp_create'              => true,

	'tp_color'                    => '#254162',
	'tp_color_additional'         => '#a0b4c5',
	'cart_color'              => '#254162',
	'cart_color_hover'              => '#5698D5',
	'tp_menu_hover_color'         => '#008fd3',
	'tp_discount_bg_color'        => '#008fd3',
	'tp_price_color'              => '#444444',
	'tp_cart_pay_btn_color'       => '#5698d5',
	'tp_cart_pay_btn_color_hover' => '#3984c9',

	'tp_img_left_cart' => $IMG_DIR . 'godaddy.png',
	'tp_logo_img'   => $IMG_DIR . 'logo.png',

	'tp_favicon'    => $TEMPLATE_URL . '/favicon.ico',
	's_mail'        => 'support@' . parse_url(ADSTM_HOME, PHP_URL_HOST),
	'tp_header_phone'       => '123 456 78 90',

	'tp_icon_phone'       => 'fa-phone',

	'tp_buttons_colors' => '#ff9749',

	'tp_header_email'           => 'support@' . parse_url(ADSTM_HOME, PHP_URL_HOST),
	'tp_text_top_header'        => __( 'Free Worldwide Shipping', 'rap' ),
	'shipping_icon'             => '',
	'tp_show_discount'          => true,

	'tp_buttons_cart'       => '#ff7800',
	'tp_buttons_cart_hover' => '#ffa561',


	'tp_countdown'      => true,
	'tp_countdown_text' => __( 'Super Sale up to', 'rap' ) . ' <span class="color sale">80% off</span> ' . __( 'all items!', 'rap' ) . ' <span class="color">' . __( 'limited time offer', 'rap' ) . '</span>',
	'tp_color_countdown'      => '#455560',
	'tp_color_text_countdown' => '#fff',
	'tp_color_text_countdown_sale' => '#EEA12D',

	'about_review_color' => '#003758',
	'about_review_color_hover' => '#008fd3',

	'login_subscription_color' => '#254162',

	/*home*/
	'id_video_youtube_home' => 'rsbZbmMk3BY',
	'slider_home_position' => 'center',
	'values_slider_home_position' => [
        ['value'=>'left', 'title' => __('Left', 'rap')],
        ['value'=>'center', 'title' => __('Center', 'rap')],
        ['value'=>'right', 'title' => __('Right', 'rap')],
    ],
	'slider_home_fs_mob' => '30',
	'slider_home_fs_desk' => '50',

	'slider_home' => array(
		array(
			'img'           => $IMG_DIR . 'slider/slide-1.jpg',
            'img_adap'      => $IMG_DIR . 'slider/slide-1.jpg',
			'head'          => 'What is Lorem Ipsum?',
			'head_color'    =>'#fff',
			'text'          => __('Great Collection of Best Products', 'rap'),
			'text_color'    =>'#fff',
            'button_text'   => __('Shop now', 'rap'),
			'shop_now_link' => home_url( '/product/' ),
			'shop_now_enabled' => true,
			'background'    => 'rgba(0, 0, 0, 0.6)',
		),
		array(
			'img'           => $IMG_DIR . 'slider/slide-2.jpg',
            'img_adap'      => $IMG_DIR . 'slider/slide-2.jpg',
			'head'          => 'What is Lorem Ipsum?',
			'head_color'    =>'#fff',
			'text'          => 'The world’s most popular and secure payment methods',
			'text_color'    =>'#fff',
            'button_text'   => __('Shop now', 'rap'),
			'shop_now_link' => home_url( '/product/' ),
			'shop_now_enabled' => true,
			'background'    => 'rgba(0, 0, 0, 0.6)',
		),
		array(
			'img'           => $IMG_DIR . 'slider/slide-3.jpg',
            'img_adap'      => $IMG_DIR . 'slider/slide-3.jpg',
			'head'          => 'What is Lorem Ipsum?',
			'head_color'    =>'#fff',
			'text'          => 'Our Buyer Protection covers your purchase from click to delivery',
			'text_color'    =>'#fff',
            'button_text'   => __('Shop now', 'rap'),
			'shop_now_link' => home_url( '/product/' ),
			'shop_now_enabled' => true,
			'background'    => 'rgba(0, 0, 0, 0.6)',
		),
	),

	'features_enable'=> true,
    'features_title_color'=> '#444444',
    'features_text_color' => '#444444',

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

	'most_popular_head'      => __( 'Most popular categories', 'rap' ),
    'most_popular_enable'      => true,
	'most_popular_fix'      => false,
	'most_popular_link_head'      => home_url("/product/?orderby=orders"),
	'most_popular_list' => [
		array(
			'image'=> $IMG_DIR.'home/category_1.jpg',
			'name'=> __( 'Category #1', 'rap' ),
			'color'=> '#444',
			'bg_color'=> 'rgba(0,0,0,.3)',
			'link'=> '#',
		),
		array(
			'image'=> $IMG_DIR.'home/category_2.jpg',
			'name'=> __( 'Category #2', 'rap' ),
			'color'=> '#444',
			'bg_color'=> 'rgba(0,0,0,.3)',
			'link'=> '#',
		),
		array(
			'image'=> $IMG_DIR.'home/category_3.jpg',
			'name'=> __( 'Category #3', 'rap' ),
			'color'=> '#444',
			'bg_color'=> 'rgba(0,0,0,.3)',
			'link'=> '#',
		)
	],

	'testimonials_enabled'      => true,
	'testimonials_rotating'      => true,
	'testimonials_rotating_time' => 4,
	'values_stars' => [['value'=>0, 'title' => 0],['value'=>1, 'title' => 1],['value'=>2, 'title' => 2],['value'=>3, 'title' => 3],['value'=>4, 'title' => 4],['value'=>5, 'title' => 5]],
	'testimonials' => [
		array(
			'image'=> $IMG_DIR.'home/user1.png',
			'country'=> 'Johnny Gwin, Nebraska',
			'text'=> '1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam erat, vehicula at purus at, dictum bibendum lorem. Vestibulum efficitur in leo in viverra. Sed vitae ligula tempus, tristique nulla et, ornare enim. Etiam feugiat lectus ut tellus egestas, id tristique tortor iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. ',
			'stars'=> 5,
		),
		array(
			'image'=> $IMG_DIR.'home/user1.png',
			'country'=> 'Johnny Gwin, Nebraska',
			'text'=> '1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam erat, vehicula at purus at, dictum bibendum lorem. Vestibulum efficitur in leo in viverra. Sed vitae ligula tempus, tristique nulla et, ornare enim. Etiam feugiat lectus ut tellus egestas, id tristique tortor iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. ',
			'stars'=> 5,

		),
		array(
			'image'=> $IMG_DIR.'home/user1.png',
			'country'=> 'Johnny Gwin, Nebraska',
			'text'=> '1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam erat, vehicula at purus at, dictum bibendum lorem. Vestibulum efficitur in leo in viverra. Sed vitae ligula tempus, tristique nulla et, ornare enim. Etiam feugiat lectus ut tellus egestas, id tristique tortor iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. ',
			'stars'=> 5,

		),


	],

	'tp_home_article'              => '',
	'tp_home_article_bg'           => $IMG_DIR . 'css/article_bg.jpg',
    'tp_home_slider_rotating'      => true,
    'tp_home_slider_rotating_time' => 4,
    'tp_home_buttons_color'        => '#fff',
    'tp_home_buttons_color_hover'  => '#019ce5',
	'home_blog_enable' => true,

	/*single product*/
	'tp_shipping_details'                => true,

	'tp_tab_shipping'                    => true,
	'tp_single_shipping_payment_content' => ads\customization\czOptions::getTemplateField( 'tm_single_shipping_payment_content' ),
	'tp_show_quantity_orders'            => true,
	'tp_pack'                            => false,
	'tp_share'                           => true,
	'tp_best_price_guarantee'            => true,
	'tp_comment_flag'                    => true,
	'tp_tab_item_review'                 => true,
    'tp_tab_item_review_label'           => __('Reviews', 'rap'),
	'review_date'                        => true,
    'tp_single_buyer_protection'         => true,
    'tp_enable_leave_review_box'         => true,

    'tp_item_imgs_lazy_load' => true,
    'tp_single_enable_pre_selected_variation' => true,
	'tp_single_enable_payment_icons'     => true,
	'tp_single_enable_payment_text'     => __('Guaranteed safe checkout', 'rap'),

	'single_payment_icons_1'     => $IMG_DIR .'icon_single/master_card.svg',
	'single_payment_icons_2'     => $IMG_DIR .'icon_single/visa.svg',
	'single_payment_icons_3'     => $IMG_DIR .'icon_single/maestro.svg',
	'single_payment_icons_4'     => $IMG_DIR .'icon_single/paypal.svg',
	'single_payment_icons_5'     => $IMG_DIR .'icon_single/american_express.svg',
	'single_payment_icons_6'     => $IMG_DIR .'icon_single/discover.svg',



	'tp_single_enable_why_buy_from_us'   => true,
	'tp_single_enable_tab_name'   => __('Why Buy From Us', 'rap'),
	'tp_single_why_buy_content'   => ads\customization\czOptions::getTemplateField( 'tp_single_why_buy_content' ),
	'tp_single_show_random_related_products' => true,
    'add_fix' => false,
    'tp_single_shipping_description' => __('Will be shipped in 3-5 days', 'rap'),
	'tp_single_stock_count' => 15,
	'tp_single_stock_enabled' => false,
    'tp_size_chart'                      => true,
	/*cart*/

	'tp_phone_number_required' => false,
	'tp_description_required'  => false,


	'tp_paypal_info_enable' => true,
	'tp_paypal_info_text'   => __( 'You can pay with your credit card without creating a PayPal account', 'rap' ),

	'tp_credit_card_info_enable' => true,
	'tp_credit_card_info_text'   => __( 'All transactions are secure and encrypted. Credit card information is never stored.', 'rap' ),

	'tp_readonly_read_required'            => false,
	'tp_readonly_read_required_text'       => __( 'I have read the', 'rap' ) . ' <a href="' . home_url( '/terms-and-conditions/' ) . '">' . __( 'Terms & Conditions', 'rap' ) . '</a>',


	/*Checkout _sidebar*/
	'sidebar_safe_shopping_guarantee_show' => true,
	'sidebar_safe_shopping_guarantee'      => __( 'SAFE SHOPPING GUARANTEE', 'rap' ),

    'sidebar_safe_shopping_guarantee_img_1' => $IMG_DIR . 'trustf/goDaddyf.svg',
    'sidebar_safe_shopping_guarantee_img_2' => $IMG_DIR . 'trustf/norton.svg',
    'sidebar_safe_shopping_guarantee_img_3' => $IMG_DIR . 'trustf/sslf.svg',
	/*SEO*/

	'tp_home_seo_title'                     => '',
	'tp_home_seo_description'               => '',
	'tp_home_seo_keywords'                  => '',

	'tp_seo_products_title'       => __( 'All products', 'rap' ),
	'tp_seo_products_description' => __( 'All products – choose the ones you like and add them to your shopping cart', 'rap' ),
	'tp_seo_products_keywords'    => '',

	/*about*/
	'tp_bg1_about'                => $IMG_DIR . 'about/bg_block1.jpg',
	'tp_about_b1_title'           => __( 'About Us', 'rap' ),
	'tp_about_b1_description'     => __( 'Welcome to', 'rap' ) . ' ' . parse_url(ADSTM_HOME, PHP_URL_HOST) . '. ' .
	                                 __( 'From day one our team keeps bringing together the finest materials and stunning design to create something very special for you. All our products are developed with a complete dedication to quality, durability, and functionality. We\'ve made it our mission to not only offer the best products and great bargains, but to also provide the most incredible customer service possible.', 'rap' ),


	'tp_about_us_keep_in_contact_title'       => __( 'Keep in contact with us ', 'rap' ),
	'tp_about_us_keep_in_contact_description' => __( 'We\'re continually working on our online store and are open to any suggestions.', 'rap' ) . '<br />' .
	                           __( 'If you have any questions or proposals, please do not hesitate to contact us.', 'rap' ) . '<br />',

	'tp_our_core_values'          => true,
	'tp_our_partners'             => true,
	'tp_our_partners_description' => __( 'We work with the world\'s most popular and trusted companies so you can enjoy safe shopping and fast delivery.', 'rap' ),

	'meet_our_team'           => true,
	'tp_about_b5_title'       => __( 'MEET OUR TEAM', 'rap' ),
	'tp_about_b5_description' => __( 'Our team is made up of experienced developers, designers and marketers who do their best to create the interface comfortable to use. It is vital for us to make your shopping easy and pleasant.', 'rap' ),

	'tp_mt1_img_1'  => $IMG_DIR . 'about/1.jpg',
	'tp_mt1_name_1' => __( 'Oprah Phillips', 'rap' ),
	'tp_mt1_cus_1'  => __( 'Customer Support Specialist', 'rap' ),

	'tp_mt1_img_2'  => $IMG_DIR . 'about/2.jpg',
	'tp_mt1_name_2' => __( 'Samantha Bailey', 'rap' ),
	'tp_mt1_cus_2'  => __( 'Customer Support Specialist', 'rap' ),

	'tp_mt1_img_3'  => $IMG_DIR . 'about/3.jpg',
	'tp_mt1_name_3' => __( 'Nataly Robinson', 'rap' ),
	'tp_mt1_cus_3'  => __( 'Customer Support Manager', 'rap' ),

	'tp_mt1_img_4'  => $IMG_DIR . 'about/4.jpg',
	'tp_mt1_name_4' => __( 'Anton Martin', 'rap' ),
	'tp_mt1_cus_4'  => __( 'Customer Support Specialist', 'rap' ),

	'tp_mt1_img_5'                  => $IMG_DIR . 'about/5.jpg',
	'tp_mt1_name_5'                 => __( 'Amber Lee', 'rap' ),
	'tp_mt1_cus_5'                  => __( 'Customer Support Specialist', 'rap' ),

	/*contact Us*/
	'tp_contactUs_text'             => __( 'Have any questions or need to get more information about the product? Either way, you’re in the right spot.', 'rap' ),

	/*thankyou*/
	'tp_bg_thankyou'                => $IMG_DIR . 'bg_page_thank.jpg',
	'tp_thankyou_fail_no_head_tag'  => '',
	'tp_thankyou_fail_no_head'      => __( 'Thank you for your order!', 'rap' ),
	'tp_thankyou_fail_no_text'      => '<p>' . __( 'Your order was accepted and you will get notification on your email address.', 'rap' ) .
	                                   '</p><p>*' . __( 'Please note that if you’ve ordered more than 2 items, you might not get all of them at the same time due to varying locations of our storehouses.', 'rap' ) . '</p>',
	'tp_thankyou_fail_yes_head_tag' => '',
	'tp_thankyou_fail_yes_head'     => '<p>' . __( 'We are sorry, we were unable to successfully process this transaction.' ) . '</p>',
	'tp_thankyou_fail_yes_text'     => '',

	/*social*/
	's_title_social_box'            => __( 'join us on social media', 'rap' ),
	's_link_fb'                     => '',
	's_fb_apiid'                    => '',
	's_fb_name_widget'              => '',

	's_link_in'       => '',
	's_in_name_api'   => '',
	's_in_name_group' => __('follow us on instagram', 'rap'),

	's_link_tw'           => '',

	's_link_pt'           => '',
	's_link_yt'           => '',
    's_link_fb_page'      => '',
    's_link_in_page'      => '',

    /*Instagram Feed*/
    'inwidget_user_id'       => '',
    'inwidget_client_id'     => '',
    'inwidget_client_secret' => '',
    'inwidget_access_token'  => '',

	/*contact form*/
	's_send_mail'         => 'support@' . parse_url(ADSTM_HOME, PHP_URL_HOST),
	's_send_from'         => 'support@' . parse_url(ADSTM_HOME, PHP_URL_HOST),

	/*subscribe*/
	'tp_subscribe'        => ads\customization\czOptions::getTemplateField( 'tp_subscribe' ),
	/*footer*/
	'tp_confidence'       => __( 'Buy with confidence:', 'rap' ),

	'tp_confidence_img_1' => $IMG_DIR . 'trustf/go_daddy.svg',
	'tp_confidence_img_2' => $IMG_DIR . 'trustf/norton.svg',
	'tp_confidence_img_3' => $IMG_DIR . 'trustf/sslf.svg',

	'tp_copyright'               => '© Copyright {{YEAR}}. All Rights Reserved',
	'tp_address'                 => '111 Your Street, Your City, Your State 11111, Your Country',
	'tp_copyright__line'         => parse_url(ADSTM_HOME, PHP_URL_HOST),
	'tp_footer_script'           => '',
	'tp_footer_payment_methods'  => true,
	'tp_payment_methods'  => __( 'Payment methods:', 'rap' ),
	'tp_footer_payment_methods_1'  => $IMG_DIR .'payment_methods/master_card.svg',
	'tp_footer_payment_methods_2'  => $IMG_DIR .'payment_methods/visa.svg',
	'tp_footer_payment_methods_3'  => $IMG_DIR .'payment_methods/paypal.svg',
	'tp_footer_payment_methods_4'  => $IMG_DIR .'payment_methods/american_express.svg',
	'tp_footer_payment_methods_5'  => $IMG_DIR .'payment_methods/discover.svg',
	'tp_footer_payment_methods_6'  => $IMG_DIR .'payment_methods/maestro.svg',
	'tp_footer_delivery_methods' => true,


    'tp_footer_menu_title_1'      => 'Contacts',
    'tp_footer_menu_title_2'      => 'Company',
    'tp_footer_menu_title_3'      => 'Need some help?',
    'tp_footer_menu_title_4'      => 'Follow us',

	/*blog*/
    'blog_buttons' => '#008fd3',
    'blog_more' => '#254162',
    'blog_more_hover' => '',

	'blog_top_full_screen_block_img'   => $IMG_DIR . 'blog/blog-top-full-screen-img.jpg',
	'blog_top_full_screen_block_title' => __( 'Get it first', 'rap' ),
	'blog_top_full_screen_block_text'  =>  __( 'Sign up for awesome content and insider offers in your inbox', 'rap' ),
	'blog_top_subscribe_form' => ads\customization\czOptions::getTemplateField( 'blog_top_subscribe_form' ),

	'blog_banner_1' => '<a href="#">
                <img src="'.IMG_DIR . 'blog/no_banner.jpg'.'">
            </a>',
	'blog_banner_mobile_show_1'=> true,
	'blog_banner_mobile_show_2'=> true,
	'blog_banner_2' => '<a href="#">
                <img src="'.IMG_DIR . 'blog/no_banner.jpg'.'">
            </a>',

	'blog_show_page_separator_1'           => false,
	'blog_page_separator_1_img_desktop'    => $IMG_DIR . 'blog/blog-separator-bg-1.jpg',
	'blog_page_separator_1_img_mobile'     => $IMG_DIR . 'blog/blog-separator-bg-1-mobile.jpg',
	'blog_page_separator_1_title'          => __( 'Want to go deep on a subject?', 'rap' ),
	'blog_page_separator_1_text'           => __( 'Get amazing ideas and find true inspiration', 'rap' ),
	'blog_page_separator_1_btn_text'       => __( 'Read more', 'rap' ),
	'blog_page_separator_1_btn_link'       => '#',

	'blog_show_page_separator_2'           => false,
	'blog_page_separator_2_img_desktop'    => $IMG_DIR . 'blog/blog-separator-bg-2.jpg',
	'blog_page_separator_2_img_mobile'     => $IMG_DIR . 'blog/blog-separator-bg-2-mobile.jpg',
	'blog_page_separator_2_title'          => __( 'Get the full story', 'rap' ),
	'blog_page_separator_2_text'           => __( 'Keep on exploring, learn more great facts', 'rap' ),
	'blog_page_separator_2_btn_text'       => __( 'Read more', 'rap' ),
	'blog_page_separator_2_btn_link'       => '#',

	'blog_show_bottom_subscribe'           => true,
	'blog_bottom_subscribe_title'          => __( 'Don\'t miss out!', 'rap' ),
	'blog_bottom_subscribe_text'           => __( 'Be the first to find out about flash sales and online exclusives', 'rap' ),
	'blog_bottom_subscribe_btn_text'       => __( 'Subscribe', 'rap' ),


    'tp_404_bgr'        =>'',
    'tp_404_text'       => __( "Sorry, but the page you are looking for has not been found.", 'rap' ).'<br />'.__( 'Please check your spelling.', 'rap' ),

    'tp_404_text_color' => '#333',

    'cm_readonly2'            => false,
    'tp_readonly_read_required_text2'       => __( 'I have read the', 'rap' ) . ' <a href="' . home_url( '/terms-and-conditions/' ) . '">' . __( 'Terms & Conditions', 'rap' ) . '</a>',
    'cm_readonly_notify2'         => __( 'Please accept Terms & Conditions by checking the box', 'rap' ),


    'sc_one_page_enable'=> false,

    'tp_trust_box_enable'   => false,
    'tp_trust_box_title' => __('Shop With Confidence', 'rap'),
    'tp_trust_box_desc' => __('Our store uses the most secure online ordering systems on the market, so you can be sure your details are completely safe with us. We are constantly improving our software to make sure we offer the highest possible security at all times.', 'rap'),
    'trust_box_img' => $IMG_DIR . 'opc/trust.png',


    'tp_whybuy_box_enable'   => false,
    'tp_whybuy_box_title' => __('Why Buy From Us?', 'rap'),

    'tp_whybuy_reason1_title' => __('Money Back Guarantee', 'rap'),
    'tp_whybuy_reason1_desc' => __('If for any reason you are not happy with your order, contact our customer care center and we\'ll issue a full refund. No questions asked!', 'rap'),
    'tp_whybuy_reason1_img' => $IMG_DIR . 'opc/wb1.png',

    'tp_whybuy_reason2_title' => __('Your Privacy Is Our Priority', 'rap'),
    'tp_whybuy_reason2_desc' => __('All information is encrypted and transmitted without risk using an industry-standard Secure Socket Layer (SSL) protocol.', 'rap'),
    'tp_whybuy_reason2_img' => $IMG_DIR . 'opc/wb2.png',

    'tp_opc_timer_enable'   => false,
    'tp_opc_timer_text'     => __( 'Due to extremely high demand your cart is reserved only for', 'rap' ),
    'tp_opc_timer_only'     => true,
    'tp_opc_timer_bgr'      => '#FF4B4B',
    'tp_opc_timer_color'    => '#fff',

    'tp_home_slider_enable'    => true,


    'tp_about_delivery_1'  => $IMG_DIR .'del1.png',
    'tp_about_delivery_2'  => $IMG_DIR .'del2.png',
    'tp_about_delivery_3'  => $IMG_DIR .'del3.png',
    'tp_about_delivery_4'  => $IMG_DIR .'del4.png',
    'tp_about_delivery_5'  => $IMG_DIR .'del5.png',

    'social_sharing'    => '',


    'home_top_deals_outline'     => false,
    'home_bgr_deals'          => '#f7faff',
    'tp_show_sort_discount'    => true,



    'tp_top_selling'                => true,
    'tp_top_selling_label'          => __( 'Top Selling Products', 'rap' ),

    'tp_best_deals'                 => true,
    'tp_best_deals_label'           => __( 'Best deals', 'rap' ),

    'tp_new_arrivals'               => true,
    'tp_new_arrivals_label'         => __( 'New arrivals', 'rap' ),


    'tp_our_core_values_title' => __('Our core values', 'rap'),
    'tp_our_core_values_value1' => __('Be Adventurous, Creative, and Open-Minded', 'rap'),
    'tp_our_core_values_value2' => __('Create Long-Term Relationships with Our Customers', 'rap'),
    'tp_our_core_values_value3' => __('Pursue Growth and Learning', 'rap'),
    'tp_our_core_values_value4' => __('Inspire Happiness and Positivity', 'rap'),
    'tp_our_core_values_value5' => __('Make Sure Our Customers are Pleased', 'rap'),

    'tp_tab_item_details'                => true,
    'tp_tab_item_details_label'          => __( 'Product Details', 'mic' ),

    'tp_tab_item_specifics'              => false,
    'tp_tab_item_specifics_label'        => __( 'Item Specifics', 'mic' ),

    'tp_tab_shipping'                    => true,
    'tp_tab_shipping_label'              => __( 'Shipping & Payment', 'mic' ),


    'tp_about_us_keep'          => true,

    'tp_currency_switcher'      => true,
    'tp_subscribe_show'      => true,



    'home_featured_ones' => false,
    'home_featured_list' => [],
    'home_featured_title'     => __( 'Featured products', 'rap' ),

    'home_bgr_featured'          => '#fff',
    'home_featured_count'   => '4',
    'values_home_featured_count' => [
        ['value' => '4', 'title' => '4'],
        ['value' => '8', 'title' => '8'],
        ['value' => '12', 'title' => '12'],
    ],


    'tp_bens_show'  => true,

    'tp_mode'    => 0,

    'tp_single_feat_img'    => 0,


);