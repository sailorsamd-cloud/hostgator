<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 09.09.2015
 * Time: 8:51
 */

function adstm_modes() {

    global $wp_rewrite;

    if ( isset( $_POST[ 'tp_create_classic_mode' ] ) && $_POST[ 'tp_create_classic_mode' ] == true && is_admin() ) {
        $classic_params = [
            'store_benefits_days'   => 15
        ];
        mode_save($classic_params);



    }

    if ( isset( $_POST[ 'tp_create_sellvia_mode' ] ) && $_POST[ 'tp_create_sellvia_mode' ] == true && is_admin() ) {

        $cur_website = parse_url(ADSTM_HOME, PHP_URL_HOST);
        $IMG_DIR = str_replace('//'.$cur_website,'',IMG_DIR);

        $sellvia_params = [
            'tp_subscribe_show' => false,
            'tp_header_phone'   => '',
            'tp_address'        => '',
            'tp_show_sort_discount' => false,
            'home_blog_enable'      => false,
            'home_top_deals'        => false,
            'tp_bens_show'          => false,
            'tp_shipping_tip'       => 'Fast US Shipping',
            'tp_returns_tip'        => 'Free Returns',

            'tp_about_delivery_1'  => $IMG_DIR .'del2.png',
            'tp_about_delivery_2'  => $IMG_DIR .'del3.png',
            'tp_about_delivery_3'  => $IMG_DIR .'del4.png',
            'tp_about_delivery_4'  => $IMG_DIR .'del6.png',
            'tp_about_delivery_5'  => $IMG_DIR .'del7.png',

            'store_benefits_days'   => 4



        ];
        mode_save($sellvia_params);


    }
}
add_action( 'admin_init', 'adstm_modes' );

function mode_get_defaults() {

    $defaults = [];

    $file = get_template_directory() .'/adstm/customization/defaults.php';
    if( file_exists( $file ) ) {
        $defaults = include $file;
    }

    return apply_filters( 'cz_fields', $defaults );
}

function mode_save($params) {
    if( isset( $params ) ) {

        $options = mode_get_defaults();


        $data      = get_option( 'cz_' .wp_get_theme() );
        $mix_data = array_merge($options,$data);

        foreach( $params as $key => $value ) {
            $mix_data[ $key ] = $value;
        }

        update_option( 'cz_' .wp_get_theme() , $mix_data );
    }
}
