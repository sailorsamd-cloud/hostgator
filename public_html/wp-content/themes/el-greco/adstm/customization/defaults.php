<?php
/**
 * Autor: Pavel Shishkin
 * Date: 30.06.2016
 * Time: 19:04
 */

if( ! defined( 'ADSTM_HOME' ) ) define( 'ADSTM_HOME', home_url() );
$cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
$TEMPLATE_URL = str_replace('//'.$cur_website,'',TEMPLATE_URL);
$IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);
return [
	'tp_head'                => '',
	'tp_style'               => '',


	/*base*/
	'tp_create'              => true,

	'tp_color'                    => '#2eb6e9',

	'cart_color'                  => '#444',
	'cart_color_hover'            => '#676767',
    'buttons_default'             => '#444',
    'buttons_default_hover'       => '#676767',
    'link_default'                => '#22516c',
    'link_default_hover'          => '#213957',

    'main_menu_hover'             => '#2eb6e9',

	'tp_discount_bg_color'        => '#F53B3B',
	'tp_price_color'              => '#444',
	'tp_cart_pay_btn_color'       => 'rgb(38, 191, 49)',
	'tp_cart_pay_btn_color_hover' => 'rgb(34, 164, 43)',
    'tp_account_btn_color'        => '#444',
    'tp_account_btn_color_hover'  => '#676767',
    'tp_last_chance_color'        => '#444',

    'tp_show_stars'              => true,

    'tp_sticky_header' => true,
    'tp_sticky_header_mob' => true,

    'header_behavior' => 'header1',
    'values_header_behavior' => [
        ['value' => 'header1', 'title' => __( 'Collapse categories on scroll', 'elgreco' ) ],
        ['value' => 'header2', 'title' => __( 'Always show categories', 'elgreco' ) ]

    ],

    'tp_logo_img'      => $IMG_DIR . 'logo.png',

	'tp_favicon'      => $TEMPLATE_URL . '/favicon.png',
	's_mail'          => 'support@' . $cur_website,
	'tp_header_phone' => '123 456 78 90',

	'tp_header_email'           => 'support@' . $cur_website,

	'shipping_icon'             => '',

    'tp_show_reviews'           => true,
	'tp_show_discount'          => true,

    'tp_show_reviews_orders1' => 'reviews',
    'values_tp_show_reviews_orders1' => [
        ['value'=>'reviews', 'title' => __('Review count', 'elgreco')],
        ['value'=>'orders', 'title' => __('Order count', 'elgreco')],
        ['value'=>'none', 'title' => __('None', 'elgreco')],

    ],



    'tp_paging_type' => 'only_more',
    'values_tp_paging_type' => [
        
        ['value'=>'only_more', 'title' => __('"Load more" button', 'elgreco')],
        ['value'=>'only_page', 'title' => __('Paging', 'elgreco')],
    ],


	'tp_countdown'            => true,
	'tp_countdown_text'       => __( 'Super Sale up to', 'elgreco' ) . ' <span class="color sale">80%</span> ' .
	                             __( 'off all items!', 'elgreco' ) . ' <span class="color">' .
	                             __( 'limited time offer', 'elgreco' ) . '</span>',
	
	'tp_color_countdown'           => '#455560',
	'tp_color_text_countdown'      => '#3c5460',
	'tp_color_text_countdown_sale' => '#eea12d',


    'tp_item_imgs_lazy_load' => true,
    'tp_add_btn_sticky'      => true,

    'tp_2_per_row_mob'      => false,

    /*category*/
    'cat_banner_enable'    => true,
    'cat_banner_img'      => $IMG_DIR.'/banner.png',
    'cat_banner_href'     => home_url( '/product/' ),

    'tp_products_not_in' => '',



    /*home*/
    'id_video_youtube_home' => 'rsbZbmMk3BY',

    'slider_home_fs_mob' => '30',
    'slider_home_fs_desk' => '60',


    'sl_home_position' => 'left_block',
    'values_sl_home_position' => [
        ['value'=>'left_block', 'title' => __('Left', 'elgreco')],
        ['value'=>'center_block', 'title' => __('Center', 'elgreco')],
        ['value'=>'right_block', 'title' => __('Right', 'elgreco')],
    ],

    'home_position_val' => [
        ['value'=>'left_block', 'title' => __('Left', 'elgreco')],
        ['value'=>'center_block', 'title' => __('Center', 'elgreco')],
        ['value'=>'right_block', 'title' => __('Right', 'elgreco')],
    ],

    'values_home_position' => [
        ['value'=>'left_block', 'title' => __('Left', 'elgreco')],
        ['value'=>'center_block', 'title' => __('Center', 'elgreco')],
        ['value'=>'right_block', 'title' => __('Right', 'elgreco')],
    ],


    'home_position_val_mob' => [
        ['value'=>'left_block_mob', 'title' => __('Left', 'elgreco')],
        ['value'=>'center_block_mob', 'title' => __('Center', 'elgreco')],
        ['value'=>'right_block_mob', 'title' => __('Right', 'elgreco')],
    ],

    'values_home_position_mob' => [
        ['value'=>'left_block_mob', 'title' => __('Left', 'elgreco')],
        ['value'=>'center_block_mob', 'title' => __('Center', 'elgreco')],
        ['value'=>'right_block_mob', 'title' => __('Right', 'elgreco')],
    ],
    

	'slider_home' => [
		[
			'img'              => $IMG_DIR . '1.jpg',
            'img_adap'              => $IMG_DIR . '1.jpg',
			'text'             => __( 'Your one-stop shop for finding best deals', 'elgreco' ),
			'text_color'       => '#444',
            'button_text'      => __( 'Shop now', 'elgreco' ),
			'shop_now_link'    => home_url( '/product/' ),
			'shop_now_enabled' => true,
            'home_position'    => 'left_block',
            'home_position_mob'=> 'center_block_mob',

		],
		[
			'img'              => $IMG_DIR . '2.jpg',
            'img_adap'         => $IMG_DIR . '2.jpg',
			'text'             => __( 'Enjoy full Buyer Protection', 'elgreco' ),
			'text_color'       => '#444',
            'button_text'      => __( 'Shop now', 'elgreco' ),
			'shop_now_link'    => home_url( '/product/' ),
			'shop_now_enabled' => true,
            'home_position'    => 'left_block',
            'home_position_mob'=> 'center_block_mob',
		],
		[
			'img'              => $IMG_DIR . '3.jpg',
            'img_adap'         => $IMG_DIR . '3.jpg',
			'text'             => __( 'Top-quality products at lowest prices', 'elgreco' ),
			'text_color'       => '#444',
            'button_text'      => __( 'Shop now', 'elgreco' ),
			'shop_now_link'    => home_url( '/product/' ),
			'shop_now_enabled' => true,
            'home_position'    => 'left_block',
            'home_position_mob'=> 'center_block_mob',

		],
	],


    'home_top_deals'      => true,
    'home_new_in'      => true,
    'home_most_liked'      => true,

    'home_top_deals_title'      => __( 'Best deals', 'elgreco' ),
    'home_new_in_title'      => __( 'Just arrived', 'elgreco' ),
    'home_most_liked_title'      => __( 'Trending now', 'elgreco' ),

    'all_products_name'          => __( 'All Products', 'elgreco' ),

	'most_popular_items' => [
        [
            'image'    => $IMG_DIR.'cat_1.jpg',
            'name'     => '',
            'desc'     => '',
            'bg_color' => 'rgba(0,0,0,0)',
            'link'     => '/product',
        ],
        [
            'image'    => $IMG_DIR.'cat_2.jpg',
            'name'     => '',
            'desc'     => '',
            'bg_color' => 'rgba(0,0,0,0)',
            'link'     => '/product',
        ],
		[
			'image'    => $IMG_DIR.'cat_3.jpg',
			'name'     => '',
            'desc'     => '',
			'bg_color' => 'rgba(0,0,0,0)',
			'link'     => '/product',
		]
	],

	'testimonials_enabled'       => true,
	'testimonials_rotating'      => true,
	'testimonials_rotating_time' => 4,
    'testimonials_title' => __( 'Why our customers love us', 'elgreco' ),
	'values_stars' => [
		[ 'value' => 0, 'title' => 0 ],
		[ 'value' => 1, 'title' => 1 ],
		[ 'value' => 2, 'title' => 2 ],
		[ 'value' => 3, 'title' => 3 ],
		[ 'value' => 4, 'title' => 4 ],
		[ 'value' => 5, 'title' => 5 ]
	],
	'testimonials' => [
		[
			'image'   => $IMG_DIR . 'r1.jpg',
            'image_man'   => $IMG_DIR . 'r1_1.jpg',
			'name' => __( 'Jack Miller', 'elgreco' ),
			'text'    => __( 'This is a fantastic product that I would recommend to anyone! It’s already earned a permanent spot in my must-have list.', 'elgreco' ),
			'stars'   => 5,
		],
        [
            'image'   => $IMG_DIR . 'r2.jpg',
            'image_man'   => $IMG_DIR . 'r1_2.jpg',
            'name' => __( 'Jane Doe', 'elgreco' ),
            'text'    => __( 'This is a fantastic product that I would recommend to anyone! It’s already earned a permanent spot in my must-have list.', 'elgreco' ),
            'stars'   => 5,
        ],
        [
            'image'   => $IMG_DIR . 'r3.jpg',
            'image_man'   => $IMG_DIR . 'r1_3.jpg',
            'name' => __( 'William Johnson', 'elgreco' ),
            'text'    => __( 'This is a fantastic product that I would recommend to anyone! It’s already earned a permanent spot in my must-have list.', 'elgreco' ),
            'stars'   => 5,
        ]
	],

	'tp_home_article'               => '',
    'tp_home_article_more'          => false,
    'tp_home_slider_full'           => true,
    'tp_home_slider_rotating'       => true,
    'tp_home_slider_rotating_mob'   => false,
    'tp_home_slider_rotating_time'  => 5,
    'tp_home_buttons_color'         => '#F53B3B',
    'tp_home_buttons_color_hover'   => '#d0112b',

    'tp_home_buttons_text_color'         => '#fff',
    'tp_home_buttons_text_color_hover'   => '#fff',

    'tp_home_video_btn_color'         => '#444',
    'tp_home_video_btn_color_hover'   => '#444',

	/*single product*/
    'tp_tab_item_details'                => true,
    'tp_tab_item_details_label'     => __( 'Product Details', 'elgreco' ),
	'tp_tab_item_specifics'              => false,
    'tp_tab_item_specifics_label'     => __( 'Item Specifics', 'elgreco' ),

    'tp_tab_shipping_label'     => __( 'Shipping & Payment', 'elgreco' ),

    'tp_tab_reviews'                     => true,
    'tp_tab_reviews_label'     => __( 'Reviews', 'elgreco' ),


    'tp_tab_opened2' => 'tab1',
    'values_tp_tab_opened2' => [
        ['value' => 'tab1', 'title' => __( 'Product Details', 'elgreco' ) ],
        ['value' => 'tab2', 'title' => __( 'Item Specifics', 'elgreco' ) ],
        ['value' => 'tab3', 'title' => __( 'Shipping & Payment', 'elgreco' ) ]
        //['value' => 'tab4', 'title' => __( 'Customer Reviews', 'elgreco' ) ]


    ],

    'features_enable'=> true,
    'features_bgr_color'=> '#f7f7f8',
    'features_title_color'=> '#444444',
    'features_text_color' => '#444444',

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


    'about_us_tab_enable'=> true,
    'about_us_tab_title' => 'About Us',
    'about_us_tab' => [
        'item'=> [
            [
                'head'=> __( 'Customer commitment', 'elgreco' ),
                'text'=> __( 'We’re a company with a customer-obsessed culture and try to meet and exceed your expectations every time you shop our store. Your opinion is our biggest drive for improvement. Feel like a true insider with our exclusive offers and closed promotions.', 'elgreco' ),
                'img'=> $IMG_DIR . 'single/s1.png',
            ],
            [
                'head'=> __( 'Passion for our work', 'elgreco' ),
                'text'=> __( 'We\'re real fans of what we do! Our store is full of amazing carefully hand-picked products that you won’t find anywhere else, that’s for sure.We strongly believe that great stuff shouldn’t cost a fortune that’s why you can trust us to offer goods for every budget.', 'elgreco' ),
                'img'=> $IMG_DIR . 'single/s2.png',
            ],
            [
                'head'=> __( 'Inspiration and creativeness', 'elgreco' ),
                'text'=> __( 'Get the treat that you deserve and indulge yourself in your favorite merch, we cater for all tastes. Shopping has never been more enjoyable!', 'elgreco' ),
                'img'=> $IMG_DIR . 'single/s3.png',
            ]
        ]
    ],

    'tp_single_gallery_minis_bottom'      => false,

	'tp_tab_shipping'                    => true,
	'tp_single_shipping_payment_content' => ads\customization\czOptions::getTemplateField( 'tm_single_shipping_payment_content' ),


	'tp_pack'                            => false,
	'tp_share'                           => true,
	'tp_comment_flag'                    => true,
    'tp_revdate'                         => true,
    'tp_single_buyer_protection'         => true,
    'tp_enable_leave_review_box'         => true,
    'cm_readonly'                        => false,
    'cm_readonly_notify'                 => __( 'Please accept Terms & Conditions by checking the box', 'elgreco' ),
    'tp_related'                         => true,
    'tp_recently'                        => true,
    'tp_size_chart'                      => true,

    'tp_single_enable_pre_selected_variation' => true,

    'single_payment_icons_1'  => $IMG_DIR .'f1.png',
    'single_payment_icons_2'  => $IMG_DIR .'f2.png',
    'single_payment_icons_3'  => $IMG_DIR .'f3.png',
    'single_payment_icons_4'  => $IMG_DIR .'f4.png',
    'single_payment_icons_5'  => $IMG_DIR .'f9.png',
    'single_payment_icons_6'  => $IMG_DIR .'f8.png',


	'tp_single_show_random_related_products' => true,

	'tp_single_stock_count'   => 15,
    'tp_single_stock_min'   =>5,
    'tp_single_stock_max'   =>30,
	'tp_single_stock_enabled' => true,

    'tp_guarantee_safe'     => __( 'Guaranteed safe checkout', 'elgreco' ),
    'tp_star_color'         => '#FFBE72',

    'tp_tab_item_faqs'                        => true,
    'tp_faqs_text'                        => ads\customization\czOptions::getTemplateField( 'tp_faqs' ),
    'tp_faqs_title'                         =>__( 'FAQs', 'elgreco' ),

    'tp_trust_enabled'       => true,
    'tp_trust_title'         => __( 'Verified by shoppers', 'elgreco' ),
    'tp_trust_text'          => __( 'Product always receives high satisfaction ratings from our customers', 'elgreco' ),
    'tp_trust_bgr_color'     => 'rgba(46, 182, 233,0.2)',
    'tp_trust_color'         => 'rgb(46, 182, 233)',

    'tp_trust_img'           => '',

    'tp_yousave_enabled'        => true,


	
	/*cart*/
	'tp_phone_number_required' => false,
	'tp_description_required'  => false,
	
	'tp_paypal_info_enable' => true,
	'tp_paypal_info_text'   => __( 'You can pay with your credit card without creating a PayPal account', 'elgreco' ),

	'tp_credit_card_info_enable' => true,
	'tp_credit_card_info_text'   => __( 'All transactions are secure and encrypted. Credit card information is never stored.', 'elgreco' ),

	'tp_readonly_read_required'            => false,
	'tp_readonly_read_required_text'       => __( 'I have read the', 'elgreco' ) . ' <a href="' . home_url( '/terms-and-conditions/' ) . '">' . __( 'Terms & Conditions', 'elgreco' ) . '</a>',

	/*Checkout _sidebar*/
	'sidebar_safe_shopping_guarantee_show' => true,
	'sidebar_safe_shopping_guarantee'      => __( 'SAFE SHOPPING GUARANTEE', 'elgreco' ),

    'sidebar_safe_shopping_guarantee_img_1' => $IMG_DIR . 'trustf/goDaddyf.svg',
    'sidebar_safe_shopping_guarantee_img_2' => $IMG_DIR . 'trustf/norton.svg',
    'sidebar_safe_shopping_guarantee_img_3' => $IMG_DIR . 'trustf/sslf.svg',
	/*SEO*/

	'tp_home_seo_title'       => '',
	'tp_home_seo_description' => '',
	'tp_home_seo_keywords'    => '',

	'tp_seo_products_title'       => __( 'All Products', 'elgreco' ),
	'tp_seo_products_description' => __( 'All products – choose the ones you like and add them to your shopping cart', 'elgreco' ),
	'tp_seo_products_keywords'    => '',

	/*about*/
	'tp_bg1_about'                => '',
	'tp_about_b1_title'           => __( 'About Us', 'elgreco' ),
	'tp_about_b1_description'     => __( 'Welcome to', 'elgreco' ) . ' ' . parse_url( ADSTM_HOME, PHP_URL_HOST ) . '. ' .
	                                 __( 'From day one our team keeps bringing together the finest materials and stunning design to create something very special for you. All our products are developed with a complete dedication to quality, durability, and functionality. We\'ve made it our mission to not only offer the best products and great bargains, but to also provide the most incredible customer service possible.', 'elgreco' ),


	'tp_about_us_keep_in_contact_title'       => __( 'Keep in contact with us ', 'elgreco' ),
	'tp_about_us_keep_in_contact_description' => __( "We're continually working on our online store and are open to any suggestions. If you have any questions or proposals, please do not hesitate to contact us.", 'elgreco' ),

	'tp_our_core_values'          => true,
	'tp_our_partners'             => true,
	'tp_our_partners_description' => __( 'We work with the world\'s most popular and trusted companies so you can enjoy safe shopping and fast delivery.', 'elgreco' ),
    'tp_our_partners_title'       => __( 'Our Partners', 'elgreco' ),


	/*contact Us*/
	'tp_contactUs_text'             => __( 'Have any questions or need to get more information about the product? Either way, you’re in the right spot.', 'elgreco' ),

	/*thankyou*/
	'tp_bg_thankyou'                => $IMG_DIR . 'bg_page_thank.jpg',
	'tp_thankyou_fail_no_head_tag'  => '',
	'tp_thankyou_fail_no_head'      => __( 'Thank you for your order!', 'elgreco' ),
	'tp_thankyou_fail_no_text'      => '<p>' . __( 'Your order was accepted and you will get notification on your email address.', 'elgreco' ) .
	                                   '</p><p>*' . __( 'Please note that if you’ve ordered more than 2 items, you might not get all of them at the same time due to varying locations of our storehouses.', 'elgreco' ) . '</p>',
	'tp_thankyou_fail_yes_head_tag' => '',
	'tp_thankyou_fail_yes_head'     => '<p>' . __( 'We are sorry, we were unable to successfully process this transaction.' ) . '</p>',
	'tp_thankyou_fail_yes_text'     => '',

	/*social*/
	's_title_social_box'            => __( 'join us on social media', 'elgreco' ),
	's_link_fb'                     => '',
	's_fb_apiid'                    => '',
	's_fb_name_widget'              => '',

	's_link_in'       => '',
	's_in_name_api'   => '',
	's_in_name_group' => __( 'Shop our instagram', 'elgreco' ),

	's_link_tw'           => '',
	's_link_gl'           => '',
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
	's_send_mail'         => 'support@' . $cur_website,
	's_send_from'         => 'support@' . $cur_website,

	/*subscribe*/
	'tp_subscribe'        => ads\customization\czOptions::getTemplateField( 'tp_subscribe' ),
	/*footer*/
	'tp_confidence'       => __( 'Buy with confidence:', 'elgreco' ),

    'footer_background_color'     => '#222',
    'footer_title_color'          => '#b7b7b7',
    'footer_text_color'           => '#eee',
    'footer_links_color'          => '#eee',
    'footer_links_color_hover'    => '#b7b7b7',
    'footer_copyright_color'      => '#dadada',

    'tp_footer_menu_title_1'      => __( 'Contact', 'elgreco' ),
    'tp_footer_menu_title_2'      => __( 'Company info', 'elgreco' ),
    'tp_footer_menu_title_3'      => __( 'Purchase info', 'elgreco' ),
    'tp_footer_menu_title_4'      => __( 'Join us on', 'elgreco' ),


	'tp_confidence_img_1' => $IMG_DIR . 'f5.png',
	'tp_confidence_img_2' => $IMG_DIR . 'f6.png',
	'tp_confidence_img_3' => $IMG_DIR . 'f7.png',
	
    'tp_enable_upbutton'  => true,
	'tp_copyright'               => __( '© {{YEAR}}. All Rights Reserved', 'elgreco' ),
	'tp_address'                 => '111 Your Street, Your City, Your State 11111, Your Country',
	'tp_copyright__line'         => site_url(),
	'tp_footer_script'           => '',
	'tp_footer_payment_methods'  => true,
    'tp_show_payment_methods'    => true,
    'tp_footer_trust_seals'      => true,

    'tp_our_core_values_title' => __('Our core values', 'elgreco'),
    'tp_our_core_values_value1' => __('Be Adventurous, Creative, and Open-Minded', 'elgreco'),
    'tp_our_core_values_value2' => __('Create Long-Term Relationships with Our Customers', 'elgreco'),
    'tp_our_core_values_value3' => __('Pursue Growth and Learning', 'elgreco'),
    'tp_our_core_values_value4' => __('Inspire Happiness and Positivity', 'elgreco'),
    'tp_our_core_values_value5' => __('Make Sure Our Customers are Pleased', 'elgreco'),



	'tp_payment_methods'  => __( 'Payment methods:', 'elgreco' ),
	'tp_footer_1'  => $IMG_DIR .'f1.png',
	'tp_footer_2'  => $IMG_DIR .'f2.png',
	'tp_footer_3'  => $IMG_DIR .'f3.png',
	'tp_footer_4'  => $IMG_DIR .'f4.png',
	'tp_footer_5'  => $IMG_DIR .'f9.png',
	'tp_footer_6'  => $IMG_DIR .'f8.png',

	'tp_about_delivery_1'  => $IMG_DIR .'del1.png',
	'tp_about_delivery_2'  => $IMG_DIR .'del2.png',
	'tp_about_delivery_3'  => $IMG_DIR .'del3.png',
	'tp_about_delivery_4'  => $IMG_DIR .'del4.png',
	'tp_about_delivery_5'  => $IMG_DIR .'del5.png',


	/*blog*/

    'blog_main_logos'   => $IMG_DIR . 'logo.png',
    'blog_links' => '#2C91CB',
    'blog_links_hover' => '#0D6393',
    'blog_buttons' => '#444444',
    'blog_buttons_hover' => '#222222',
    'blog_banner_main'   => $TEMPLATE_URL . '/images_blog/banner.jpg',
    'blog_banner_main_link' => '/',

    'blog_banner_single'   => $TEMPLATE_URL . '/images_blog/5.jpg',
    'blog_banner_single_link' => '/',

    'blog_upbutton' => true,
    'tp_subscribe_blog'        => ads\customization\czOptions::getTemplateField( 'blog_subscribe' ),


    'blog_more' => '#254162',
    'blog_more_hover' => '',

	'blog_top_full_screen_block_img'   => $IMG_DIR . 'blog/blog-top-full-screen-img.jpg',
	'blog_top_full_screen_block_title' => __( 'Get it first', 'elgreco' ),
	'blog_top_full_screen_block_text'  =>  __( 'Sign up for awesome content and insider offers in your inbox', 'elgreco' ),
	'blog_top_subscribe_form' => ads\customization\czOptions::getTemplateField( 'blog_top_subscribe_form' ),

	'blog_banner_1' => '<a href="#">
                <img src="'.$IMG_DIR . 'blog/no_banner.jpg'.'">
            </a>',
	'blog_banner_mobile_show_1'=> true,
	'blog_banner_mobile_show_2'=> true,
	'blog_banner_2' => '<a href="#">
                <img src="'.$IMG_DIR . 'blog/no_banner.jpg'.'">
            </a>',

	'blog_show_page_separator_1'           => false,
	'blog_page_separator_1_img_desktop'    => $IMG_DIR . 'blog/blog-separator-bg-1.jpg',
	'blog_page_separator_1_img_mobile'     => $IMG_DIR . 'blog/blog-separator-bg-1-mobile.jpg',
	'blog_page_separator_1_title'          => __( 'Want to go deep on a subject?', 'elgreco' ),
	'blog_page_separator_1_text'           => __( 'Get amazing ideas and find true inspiration', 'elgreco' ),
	'blog_page_separator_1_btn_text'       => __( 'Read more', 'elgreco' ),
	'blog_page_separator_1_btn_link'       => '#',

	'blog_show_page_separator_2'           => false,
	'blog_page_separator_2_img_desktop'    => $IMG_DIR . 'blog/blog-separator-bg-2.jpg',
	'blog_page_separator_2_img_mobile'     => $IMG_DIR . 'blog/blog-separator-bg-2-mobile.jpg',
	'blog_page_separator_2_title'          => __( 'Get the full story', 'elgreco' ),
	'blog_page_separator_2_text'           => __( 'Keep on exploring, learn more great facts', 'elgreco' ),
	'blog_page_separator_2_btn_text'       => __( 'Read more', 'elgreco' ),
	'blog_page_separator_2_btn_link'       => '#',

	'blog_show_bottom_subscribe'           => true,
	'blog_bottom_subscribe_title'          => __( 'Don\'t miss out!', 'elgreco' ),
	'blog_bottom_subscribe_text'           => __( 'Be the first to find out about flash sales and online exclusives', 'elgreco' ),
	'blog_bottom_subscribe_btn_text'       => __( 'Subscribe', 'elgreco' ),


    'tp_404_bgr'        =>'',
    'tp_404_text'       => __( "We can't seem to find the page you're looking for.", 'elgreco' ).'<br />'.__( 'Here are some helpful links instead:', 'elgreco' ),
    

    /*booster*/
    'tp_trust_box_enable'   => true,
    'tp_trust_box_title' => __('Shop With Confidence', 'elgreco'),
    'tp_trust_box_desc' => __('Our store uses the most secure online ordering systems on the market, so you can be sure your details are completely safe with us. We are constantly improving our software to make sure we offer the highest possible security at all times.', 'elgreco'),
    'trust_box_img' => $IMG_DIR . 'boost/trust.png',



    'tp_whybuy_box_enable'   => true,
    'tp_whybuy_box_title' => __('Why Buy From Us?', 'elgreco'),

    'tp_whybuy_reason1_title' => __('Money Back Guarantee', 'elgreco'),
    'tp_whybuy_reason1_desc' => __('If for any reason you are not happy with your order, contact our customer care center and we\'ll issue a full refund. No questions asked!', 'elgreco'),
    'tp_whybuy_reason1_img' => $IMG_DIR . 'boost/wb1.png',

    'tp_whybuy_reason2_title' => __('Your Privacy Is Our Priority', 'elgreco'),
    'tp_whybuy_reason2_desc' => __('All information is encrypted and transmitted without risk using an industry-standard Secure Socket Layer (SSL) protocol.', 'elgreco'),
    'tp_whybuy_reason2_img' => $IMG_DIR . 'boost/wb2.png',

    'tp_trustbox_enable'   => false,
    'tp_trustbox_code'   => '',

    'tp_trustbox_rating' => __( 'Excellent', 'elgreco' ),

    'tp_trustbox_main_star' => '5',
    'values_tp_trustbox_main_star' => [
        ['value'=>'4', 'title' => '4' ],
        ['value'=>'5', 'title' => '5' ],
    ],


    'tp_trustbox_reviews_count'   => 528,
    'tp_trustbox_link'   => 'https://www.trustpilot.com/',

    'trust_reviews' => [
        [
            'title'  => __( 'Overall....very good process!', 'elgreco' ),
            'text'   => __( 'Easy, fast, fair terms. The very best company I\'ve dealt with in this space.', 'elgreco' ),
            'author' => 'David',
            'date'   => __( '24 days ago', 'elgreco' ),
            'stars'  => '5',
        ],
    ],

    'tp_shipping_tip'   => 'Free shipping worldwide',
    'tp_shipping_tip_img'   => $IMG_DIR . 'single/r1.png',
    'tp_returns_tip'   => '60 Day Returns',
    'tp_returns_tip_img'   => $IMG_DIR . 'single/r2.png',



    'tp_irecommend_enable'   => true,
    'tp_irecommend_color'   => '#5698D5',


    'tp_sale_badge2_enable'   => true,
    'tp_sale_badge_color'   => '#008fd3',

    'tp_desc_add_enable'   => true,
    'tp_desc_add_title'   => '4 GREAT REASONS TO BUY FROM US:',
    'tp_desc_add_text'   => '<ul>
        <li><span>'.__( 'Over 37,000', 'elgreco' ).'</span> '.__( 'happy customers worldwide', 'elgreco' ).'</li>
        <li><span>'.__( 'Real people', 'elgreco' ).'</span> '.__( 'on our support team ready to help', 'elgreco' ).'</li>
        <li><span>'.__( 'The finest materials and stunning design', 'elgreco' ).'</span> '.__( '— all our products are developed with an obsessive dedication to quality, durability, and functionality', 'elgreco' ).'</li>
        <li><span>'.__( 'We use the most secure', 'elgreco' ).'</span> '.__( ' online ordering systems on the market, and are constantly improving our software to make sure we offer the highest possible security', 'elgreco' ).'</li>
    </ul>',
    'tp_desc_add_img'   => $IMG_DIR . 'single/m1.png',
    'tp_desc_add_enable2'   => true,
    'tp_desc_add_title2'   => 'BUY WITH CONFIDENCE',
    'tp_desc_add_text2'   => '<p>'.__( 'Our mission is to make your shopping experience as safe and enjoyable as possible. Have questions? Feel free to contact our award-winning customer care team for advice on everything from product specifications to order tracking.', 'elgreco' ).'</p>
    <ul>
        <li><span>'.__( 'Money back guarantee:', 'elgreco' ).'</span> '.__( 'Something not quite right? If you’re not totally satisfied with your purchase, you can return it within 15 days for a full refund', 'elgreco' ).'</li>
        <li><span>'.__( 'Risk-Free Purchase:', 'elgreco' ).'</span> '.__( 'We utilize industry-standard Secure Sockets Layer (SSL) technology to allow for the encryption of all the sensitive information, so you can be sure your details are completely safe with us', 'elgreco' ).'</li>
        <li><span>'.__( 'Trustworthy payment method:', 'elgreco' ).'</span> '.__( 'We partner with the most popular online payment solutions that guarantee enhanced security and fast transaction processing', 'elgreco' ).'</li>
    </ul>',
    'tp_desc_add_img2'   => $IMG_DIR . 'single/m2.png',

    'tp_share_fb'   => false,

    'store_benefits_enable'=> true,
    'store_benefits_days'=> 15,


    'store_benefits_days_lang2' => 'en_US',
    'values_store_benefits_days_lang2' => [
        ['value' => 'en_US', 'title' => 'English (US)'],
        ['value' => 'fr_FR', 'title' => 'Française'],
        ['value' => 'cs_CZ', 'title' => 'Čeština'],
        ['value' => 'de_DE', 'title' => 'Deutsch'],
        ['value' => 'pl_PL', 'title' => 'Polski'],
        ['value' => 'pt_PT', 'title' => 'Portuguese (Portugal)'],
        ['value' => 'pt_BR', 'title' => 'Português do Brasil'],
        ['value' => 'es_ES', 'title' => 'Español']
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

    'sc_one_page_enable'=> true,

    'tp_do_rtl'         => false,


    'add_fonts3' => 'none',
    'values_add_fonts3' => [
        ['value' => 'none', 'title' => 'Default'],
        ['value' => 'zilla_slab', 'title' => 'Zilla Slab'],
        ['value' => 'pt_sans', 'title' => 'PT Sans'],
        ['value' => 'lora', 'title' => 'Lora'],
        ['value' => 'oswald', 'title' => 'Oswald'],
        ['value' => 'prompt', 'title' => 'Prompt'],
        ['value' => 'overlock_sc', 'title' => 'Overlock SC'],
        ['value' => 'raleway', 'title' => 'Raleway'],
        ['value' => 'source_sans_pro', 'title' => 'Source Sans Pro'],
        ['value' => 'crimson_text', 'title' => 'Crimson Text'],
    ],


    'add_fonts_slider3' => 'none',
    'values_add_fonts_slider3' => [
        ['value' => 'none', 'title' => 'Default'],
        ['value' => 'lobster', 'title' => 'Lobster'],
        ['value' => 'pacifico', 'title' => 'Pacifico'],
        ['value' => 'caveat', 'title' => 'Caveat'],
        ['value' => 'courgette', 'title' => 'Courgette'],
        ['value' => 'fredoka_one', 'title' => 'Fredoka One'],
        ['value' => 'great_vibes', 'title' => 'Great Vibes'],
        ['value' => 'sacramento', 'title' => 'Sacramento'],
        ['value' => 'bangers', 'title' => 'Bangers'],
        ['value' => 'mountains_of_christmas', 'title' => 'Mountains of Christmas'],
        ['value' => 'chewy', 'title' => 'Chewy'],
        ['value' => 'knewave', 'title' => 'Knewave'],
        ['value' => 'sue_ellen_francisco', 'title' => 'Sue Ellen Francisco'],
        ['value' => 'love_ya_like_a_sister', 'title' => 'Love Ya Like A Sister'],

    ],

    'cm_readonly2'            => false,
    'tp_readonly_read_required_text2'       => __( 'I have read the', 'elgreco' ) . ' <a href="' . home_url( '/terms-and-conditions/' ) . '">' . __( 'Terms & Conditions', 'elgreco' ) . '</a>',
    'cm_readonly_notify2'         => __( 'Please accept Terms & Conditions by checking the box', 'elgreco' ),





    'tp_opc_timer_enable'   => true,
    'tp_opc_timer_text'     => __( 'Due to extremely high demand your cart is reserved only for', 'elgreco' ),
    'tp_opc_timer_only'     => true,
    'tp_opc_timer_bgr'      => '#FF4B4B',
    'tp_opc_timer_color'    => '#fff',

    'home_blog_enable'    => true,

    'home_h1'    => __( 'High-quality products at low price', 'elgreco' ),
    'home_h1_visible'    => false,

    'tp_home_slider_enable'    => true,
    'tp_most_popular_enable'    => true,

    'tp_most_popular_heading'     => __( 'Most popular categories', 'elgreco' ),




    'tp_header_bgr'             => '#fff',
    'tp_header_color'           => '#444',
    'tp_header_color_hover'     => '#676767',
    'tp_menu_bgr'               => '#f5f5f5',
    'tp_menu_color'             => '#444',
    'tp_menu_color_hover'       => '#676767',

    'tp_direct_to_checkout'    => false,
    'tp_image_title'    => true,
    'tp_show_breadcrumbs'    => true,
    'tp_show_sort_discount'    => true,

    'video_order' => 'first',
    'values_video_order' => [
        ['value' => 'first', 'title' => __( 'First one', 'elgreco' )],
        ['value' => 'last', 'title' => __( 'Last one', 'elgreco' )],
    ],

    'social_sharing'    => '',

    'tp_stock_display' => 'badge',
    'values_tp_stock_display' => [
        ['value' => 'badge', 'title' => 'Show In stock badge'],
        ['value' => 'count', 'title' => 'Show quantity remaining in stock (e.g. "15 in stock")'],
        ['value' => 'none', 'title' => 'Never show quantity remaining in stock'],
    ],

    'tp_instock_color'             => '#50c450',
    'tp_outofstock_color'          => '#d93025',
    'home_underlay'    => true,
    'single_underlay'    => true,

    'single_bgr_recs'          => '#f6f6f7',


    'home_bgr_deals'          => '#fff',
    'home_bgr_arrived'        => '#EEF6F6',
    'home_bgr_trending'       => '#fff',


    'home_deals' => '4',
    'values_home_deals' => [
        ['value' => '4', 'title' => '4'],
        ['value' => '8', 'title' => '8'],
        ['value' => '12', 'title' => '12'],
    ],

    'home_newin' => '4',
    'values_home_newin' => [
        ['value' => '4', 'title' => '4'],
        ['value' => '8', 'title' => '8'],
        ['value' => '12', 'title' => '12'],
    ],

    'home_liked' => '4',
    'values_home_liked' => [
        ['value' => '4', 'title' => '4'],
        ['value' => '8', 'title' => '8'],
        ['value' => '12', 'title' => '12'],
    ],

    'tp_gutenberg_block_library'    => false,
    'tp_jquery_migrate'    => true,


    'tp_about_us_keep'          => true,

    'tp_currency_switcher'      => true,
    'tp_subscribe_show'      => true,



    'home_featured_ones' => false,
    'home_featured_list' => [],
    'home_featured_title'     => __( 'Featured products', 'elgreco' ),

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

    'tp_classic_pager_mode' => false,

    'tp_logo_text'      => '',
    'tp_logo_text_color'        => '#333',
    'tp_bold_logo_text'  => false,

    'tp_single_tiled' => false,

    'custom_font' => 'none',
    'values_custom_font' => [
        ['value' => 'none', 'title' => 'Default'],
        ['value' => '1', 'title' => 'Outfit'],
        ['value' => '2', 'title' => 'Noto Sans'],
        ['value' => '3', 'title' => 'Lato'],
        ['value' => '4', 'title' => 'Poppins'],
        ['value' => '5', 'title' => 'Cinzel'],
        ['value' => '6', 'title' => 'Rubik'],
        ['value' => '7', 'title' => 'Oxanium'],
        ['value' => '8', 'title' => 'Kalam'],
        ['value' => '9', 'title' => 'Engagement'],
        ['value' => '10', 'title' => 'Playball'],
        ['value' => '11', 'title' => 'Fugaz One'],
        ['value' => '12', 'title' => 'Playfair Display'],
        ['value' => '13', 'title' => 'Goldman'],
        ['value' => '14', 'title' => 'Kodchasan'],
        ['value' => '15', 'title' => 'Knewave'],
        ['value' => '16', 'title' => 'Bangers'],
        ['value' => '17', 'title' => 'Anton'],
        ['value' => '18', 'title' => 'Manjari'],
        ['value' => '19', 'title' => 'Saira'],


    ],










];
