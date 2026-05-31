<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Gavrilov
 * Date: 25.05.2018
 * Time: 12:17
 */

function get_template_color() {

    $accent_color = cz( 'tp_color' );

    if( !$accent_color ) {
        $accent_color = '#008fd3';
    }

    return $accent_color;

}

add_shortcode( 'get-icon', function($atts){

    $args = shortcode_atts( array(
        'icon' => 0,
        'color' => get_template_color(),
    ), $atts );

    return theme_get_icon($args['icon'], $args['color']);

});
