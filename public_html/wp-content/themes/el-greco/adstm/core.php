<?php

/**
 * @return mixed
 */
function adstm_get_host() {
	
	return parse_url( ADSTM_HOME, PHP_URL_HOST );
}

/**
 * @param $path
 *
 * @return string
 */
function adstm_home_url( $path = '' ) {

	$url = ADSTM_HOME;

	if ( $path && is_string( $path ) )
		$url = ADSTM_HOME . '/' . ltrim( $path, '/' );

	return esc_url( $url );
}