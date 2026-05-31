<?php
return [
    'customization' => [
        'title' => __( 'Customization', 'elgreco' ),
        'icon'  => 'dashicons-admin-generic',
        'tmp'   => 'tmplMode',
        'submenu' => [
            'customization' => [
                'tmp'         => 'tmplMode',
                'title'       => __( 'Demo Content', 'elgreco' ),
                'description' => __( 'Theme Demo Content', 'elgreco' ),
            ],
            'czgeneral' => [
                'tmp'       => 'tmplGeneral',
                'title'     => __( 'General', 'elgreco' ),
            ],

            'czhead' => [
                'tmp'   => 'tmplHead',
                'title' => __( 'Head', 'elgreco' ),
            ],
            'czheader' => [
                'tmp'         => 'tmplHeader',
                'title'       => __( 'Header', 'elgreco' ),
                'description' => __( 'Header main elements settings.', 'elgreco' ),
            ],

            'czhome' => [
                'tmp'         => 'tmplHome',
                'title'       => __( 'Home', 'elgreco' ),
                'description' => __( 'Home page main settings.', 'elgreco' ),
            ],
            'czsingleproduct' => [
                'tmp'   => 'tmplSingleProduct',
                'title' => __( 'Single Product', 'elgreco' ),
            ],
            'czbooster' => array(
                'tmp' => 'tmplBooster',
                'title' => __('Conversion Boosters', 'elgreco'),
            ),
            'czCart' => [
                'tmp'   => 'tmplCart',
                'title' => __( 'Checkout', 'elgreco' ),
            ],
            'czabout' => [
                'tmp'   => 'tmplAbout',
                'title' => __( 'About Us', 'elgreco' ),
            ],
            'czthankyou' => [
                'tmp'   => 'tmplThankyou',
                'title' => __( 'Thank You', 'elgreco' ),
            ],
            'czcontactus' => [
                'tmp'   => 'tmplContactUs',
                'title' => __( 'Contact Us', 'elgreco' ),
            ],
            'czsocial' => [
                'tmp'         => 'tmplSocial',
                'title'       => __( 'Social Media', 'elgreco' ),
                'description' => __( 'Social media pages integration.', 'elgreco' ),
            ],
            'czfooter' => [
                'tmp'         => 'tmplFooter',
                'title'       => __( 'Footer', 'elgreco' ),
                'description' => __( 'Footer options and settings.', 'elgreco' ),
            ],
            /*'czsidebar' => [
                'tmp'         => 'tmplSidebar',
                'title'       => __( 'Sidebar Drawer', 'elgreco' ),
                'description' => __( 'Sidebar options and settings.', 'elgreco' ),
            ],*/
            'czsubscribe' => [
                'tmp'         => 'tmplSubscribe',
                'title'       => __( 'Subscription Form', 'elgreco' ),
                'description' => __( 'Subscription form settings for collecting users’ emails.', 'elgreco' ),
            ],
            'czblog' => [
                'tmp'         => 'tmplBlog',
                'title'       => __( 'Blog', 'elgreco' ),
                'description' => __( 'Blog settings.', 'elgreco' ),
            ],
            'cz404' => [
                'tmp'         => 'tmpl404',
                'title'       => __( '404 Page', 'elgreco' ),
                'description' => __( '404 Page settings.', 'elgreco' ),
            ],



        ]
    ]
];


