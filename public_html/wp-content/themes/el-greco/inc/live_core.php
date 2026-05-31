<?php

if( ! function_exists('cz_ar') ) {
    function cz_ar( $name, $options ) {
        return isset( $options[ $name ] ) ? $options[ $name ] : '';
    }
}

function new_load_cz_menu() {

}

if( current_user_can( 'manage_options' ) ){
    add_action( 'new_live_admin', 'new_load_cz_menu',11);
}



function live_cstm_ajax(){
    $response = live_cstm_action();
    wp_send_json( $response );
}

add_action( 'wp_ajax_live_cstm_ajax', 'live_cstm_ajax' );

function live_cstm_action() {

    if ( isset( $_POST['handler'] ) && current_user_can( 'activate_plugins' ) ) {

        $handler = 'handler_' . $_POST['handler'];

        if( function_exists($handler ) ) {
            return $handler();
        }
    }

    return [ 'error' => __( 'Undefined action', 'elgreco' ) ];
}



function handler_live_cstm_save() {

}




function live_cstm_get_defaults() {

}

function handler_live_cstm_default() {

}


function handler_live_cstm_add() {

}



add_action('wp_ajax_get_products_live', function () {

});


function get_product_tmpl() {

    die;
}
add_action('wp_ajax_get_product_tmpl', 'get_product_tmpl');


