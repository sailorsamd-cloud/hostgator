<?php
return array(
    'customization' => array(
        'title' => __('Customization', 'rap'),
        'icon'  => 'dashicons-admin-generic',
        'tmp' => 'tmplMode',
        'submenu' => array(
            'customization' => [
                'tmp'         => 'tmplMode',
                'title'       => __( 'Demo Content', 'andy' ),
                'description' => __( 'Theme Demo Content', 'andy' ),
            ],
            'czgeneral' => array(
                'tmp' => 'tmplGeneral',
                'title' => __('General', 'rap'),
            ),

            'czhead' => array(
                'tmp' => 'tmplHead',
                'title' => __('Head', 'rap'),
            ),
            'czheader' => array(
                'tmp' => 'tmplHeader',
                'title' => __('Header', 'rap'),
                'description' => __('Header main elements settings.', 'rap'),
            ),
            'czhome' => array(
                'tmp' => 'tmplHome',
                'title' => __('Home', 'rap'),
                'description' => __('Home page main settings.', 'rap'),
            ),
            'czsingleproduct' => array(
                'tmp' => 'tmplSingleProduct',
                'title' => __('Single product', 'rap'),
            ),
            'czCart' => array(
                'tmp' => 'tmplCart',
                'title' => __('Checkout', 'rap'),
            ),
            'czbooster' => [
                'tmp' => 'tmplOpc',
                'title' => __('Checkout Features', 'rap'),
            ],
            'czabout' => array(
                'tmp' => 'tmplAbout',
                'title' => __('About Us', 'rap'),
            ),
            'czthankyou' => array(
                'tmp' => 'tmplThankyou',
                'title' => __('Thank You', 'rap'),
            ),
            'czblog' => array(
                'tmp' => 'tmplBlog',
                'title' => __('Blog', 'rap'),
            ),
            'czcontactus' => array(
                'tmp' => 'tmplContactUs',
                'title' => __('Contact Us', 'rap'),
            ),
            'czsocial' => array(
                'tmp' => 'tmplSocial',
                'title' => __('Social Media', 'rap'),
                'description' => __('Social media pages integration.', 'rap'),
            ),
            'czsubscribe' => array(
                'tmp' => 'tmplSubscribe',
                'title' => __('Subscription Form', 'rap'),
                'description' => __('Subscription form settings for collecting users’ emails.', 'rap'),
            ),
            'czfooter' => array(
                'tmp' => 'tmplFooter',
                'title' => __('Footer', 'rap'),
                'description' => __('Footer options and settings.', 'rap'),

            ),
            'cz404' => [
                'tmp'         => 'tmpl404',
                'title'       => __( '404 page', 'rap' ),
                'description' => __( '404 page settings.', 'rap' ),
            ]
        )
    ),

);


