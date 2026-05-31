<?php
/**
 * Author: Vitaly Kukin
 * Date: 14.10.2016
 * Time: 10:16
 */

function adstm_updparam() {

    return 'https://sr01.alidropship.com/themes/update?special_theme_update=el-greco';
}

function adstm_switch_theme() {

    if( ! current_user_can('level_9') ) return null;

    if( isset( $_GET['activated'] ) && $_GET['activated'] == 'true' )
        adstm_download_language_pack();
}
add_action( 'admin_init', 'adstm_switch_theme' );

function adstm_init_update_option() {

    if( ! current_user_can('level_9') || ! isset( $_POST['WPLANG'] ) )
        return null;

    if(
        isset( $_POST['option_page'] )  &&
        isset( $_POST['action'] ) &&
        $_POST['option_page'] == 'general' &&
        $_POST['action'] == 'update'
    ) {
        adstm_download_language_pack( $_POST['WPLANG'] );
    }

}
add_action('admin_init', 'adstm_init_update_option', 10);

function adstm_get_available_translations( $wplang = false ) {

    if( $wplang == 'us_US' ) return false;
    
    global $wp_version;

    $theme_data = wp_get_theme();
    $theme_version = $theme_data->get('Version');

    $get_locale = $wplang ? $wplang : get_locale();

    $api_url = adstm_updparam() . '&locale=' . $get_locale;
   
    $theme_base = get_option('template');
    
    $request = [
        'slug'    => $theme_base,
        'version' => $theme_version,
        'site'    => get_bloginfo('url')
    ];
    
    // Start checking for an update
    $send_for_check = [
        'body' => [
            'action'  => 'translation_check',
            'request' => serialize( $request ),
            'api-key' => md5( get_bloginfo('url') )
        ],
        'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url'),
        'sslverify'  => false,
    ];
    
    $raw_response = wp_remote_post( $api_url, $send_for_check );

    $response = [];
    if ( ! is_wp_error( $raw_response ) && ( $raw_response['response']['code'] == 200 ) ) {
        $response = maybe_unserialize( $raw_response['body'] );
    }

    return $response;
}

function adstm_download_language_pack( $wplang = false ) {

    // Confirm the translation is one we can download.
    $translation = adstm_get_available_translations( $wplang );

    if ( ! $translation && empty( $translation ) )
        return false;

    if( isset( $translation['message'] ) )
        return false;

    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

    $translation       = (object) $translation;
    $translation->slug = get_option('template');
    $translation->type = 'theme';

    $upgrade = new Language_Pack_Upgrader( new Automatic_Upgrader_Skin );

    $result = $upgrade->upgrade( $translation, [ 'clear_update_cache' => false ] );

    return ! $result || is_wp_error( $result ) ? false : $translation->language;
}

/**
 * Take over the update check
 *
 * @param $checked_data
 * @param false $upd
 * @param false $wplang
 * @param false $translation
 * @return mixed
 */
function adstm_check_for_update( $checked_data, $upd = false, $wplang = false, $translation = false  ) {

    global $wp_version;

    if( function_exists( 'wp_get_theme' ) ) {
        $theme_data = wp_get_theme( get_option( 'template' ) );
        $theme_version = $theme_data->Version;
    } else {
        $theme_data = wp_get_theme();
        $theme_version = $theme_data->get( 'Version' );
    }

    $theme_base = get_option( 'template' );

    $api_url = adstm_updparam();

    $request = [
        'slug'    => $theme_base,
        'version' => $theme_version,
        'site'    => get_bloginfo('url')
    ];

    $get_locale = $wplang ? $wplang : get_locale();
    $api_url .= '&locale=' . $get_locale;

    if( $translation )
        $api_url .= '&need_translation=true';

    // Start checking for an update
    $send_for_check = [
        'body' => [
            'action'  => 'basic_check',
            'request' => serialize($request),
            'api-key' => md5(get_bloginfo('url'))
        ],
        'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
    ];

    $raw_response = wp_remote_post($api_url, $send_for_check);

    $response = '';

    if( ! is_wp_error($raw_response) && ( $raw_response['response']['code'] == 200 ) )
        $response = @unserialize( $raw_response['body'] );

    // Feed the update data into WP updater
    if ( $response && ! empty( $response ) ) {
        $response = (array) $response;
        $checked_data->response[ $theme_base ] = $response;
        $checked_data->translations[] = isset( $response['translations'] ) ? $response['translations'] : [];
    }
    return $checked_data;
}
add_filter( 'pre_set_site_transient_update_themes', 'adstm_check_for_update' );

/**
 * Take over the Theme info screen
 *
 * @param $def
 * @param $action
 * @param $args
 *
 * @return bool|mixed|WP_Error
 */
function adstm_theme_api_call( $def, $action, $args ) {

    global $wp_version;

    if( function_exists( 'wp_get_theme' ) ) {
        $theme_data    = wp_get_theme( get_option( 'template' ) );
        $theme_version = $theme_data->Version;
    } else {
        $theme_data    = wp_get_theme();
        $theme_version = $theme_data->get( 'Version' );
    }

    $theme_base = get_option( 'template' );

    $api_url = adstm_updparam();

    if( $args->slug != $theme_base )
        return $def;

    $args->slug    = $theme_base;
    $args->version = $theme_version;
    $args->site    = get_bloginfo( 'url' );

    $request_string = [
        'body'        => [
            'action'  => $action,
            'request' => serialize( $args )
        ],
        'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' )
    ];

    $request = wp_remote_post($api_url, $request_string);

    if( is_wp_error( $request ) ) {

        $res = new WP_Error('themes_api_failed',
            '<p>'.__('An Unexpected HTTP Error occurred during the API request.', 'elgreco').'</p><p><a href="?" onclick="document.location.reload(); return false;">'.__('Try again', 'elgreco').'</a></p>', $request->get_error_message());
    } else {

        $res = unserialize( $request['body'] );

        if( $res === false )
            $res = new WP_Error( 'themes_api_failed', __( 'An unknown error occurred', 'elgreco' ), $request['body'] );
    }

    return $res;
}
add_filter( 'themes_api', 'adstm_theme_api_call', 10, 3 );