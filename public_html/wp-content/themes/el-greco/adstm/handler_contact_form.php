<?php
/**
 * Author: Vitaly Kukin
 * Date: 04.06.2015
 * Time: 10:38
 */

/**
 * Handler for contact form
 */
function adstm_handler_contact() {

	if( ! isset( $_POST[ 'contactSender' ] ) ) {
		return false;
	}

	$foo = [
		'nameClient'           => 'strip_tags',
		'email'                => 'is_email',
		'message'              => 'strip_tags',
	    'g-recaptcha-response' => 'strip_tags'
	];

	$options        = new ads\adsOptions();
	$captchaOptions = $options->get( 'ads_recaptcha_options' );

 	if( $captchaOptions[ 'recaptcha_status' ] == 0 || $captchaOptions[ 'recaptcha_status' ] == '') {
		unset( $foo[ 'g-recaptcha-response' ] );
	}

	$args  = [];
	$error = false;

	foreach ( $foo as $key => $val ) {

		if ( $error ) {
			break;
		}

		if ( ! isset( $_POST[ $key ] ) ) {
			$error = $key;
		} else {

			$result = call_user_func( $val, trim( $_POST[ $key ] ) );

			if ( $result && ! empty( $result ) ) {
				$args[ $key ] = $result;
			} else {
				$error = $key;
			}
		}
	}

	if ( $error ) {
		$_POST[ 'error' ] = $error;
	} else {

		if( isset( $args['g-recaptcha-response'] ) ) {

			$validate = adstm_validate_captcha($args['g-recaptcha-response']);

			if ($validate['result'] == false) {
				$_POST['error'] = 'g-recaptcha-response';
				$_POST['message_captcha'] = $validate['message'];
				return false;
			}

		}

		$defaults = array(
			'nameClient' => '',
			'email'      => '',
			'phone'      => '',
			'location'   => '',
			'message'    => ''
		);

		$args = wp_parse_args( $args, $defaults );

		$options = new \ads\adsOptions();
		$argsNotifi = $options->get('ads_notifi_contact');
		$argsNotifi['template'] = trim(stripcslashes($argsNotifi['template']));

		foreach ( $args as $k => $v ) {
			$argsNotifi[ 'template' ] = str_replace( '{{' . $k . '}}', esc_attr($v), $argsNotifi[ 'template' ] );
		}

		if(empty($argsNotifi['template'])){

			$argsNotifi['template']     = "
                User Name: " . $args[ 'nameClient' ] . "\r\n
                Email: " . $args[ 'email' ] . "\r\n\n
                Message\r\n
                " . $args[ 'message' ] . "\r\n
            ";

		}

		adstm_sendmail(
			array(
				'email_to'   => array( $argsNotifi[ 'adminMailSend' ] ),
				'subject'    => $argsNotifi[ 'subject' ],
				'content'    => $argsNotifi[ 'template' ],
				'from_email' => $argsNotifi[ 'from_email' ],
				'from_name'  => $argsNotifi[ 'from_name' ]
			)
		);

		wp_redirect( home_url( '/thank-you-contact' ) );
		exit();
	}
}

add_action( 'wp', 'adstm_handler_contact' );


function adstm_sendmail( $ms ) {
	$sm = \SendMail\SendMail::i();

	return $sm->send( [
		'to'         => $ms[ 'email_to' ],
		'subject'    => $ms[ 'subject' ],
		'html'       => $ms[ 'content' ],
		'from_email' => $ms[ 'from_email' ],
		'from_name'  => $ms[ 'from_name' ]
	] );
}

/**
 * @param $captchaField
 *
 * @return array
 */
function adstm_validate_captcha( $captchaField ) {
	
	$options = new ads\adsOptions();
	$args    = $options->get( 'ads_recaptcha_options' );

	if( $args[ 'recaptcha_status' ] == 0)
		return [
			'result'  => true,
			'message' => ''
		];

	$secret = $args[ 'recaptcha_secret_key' ];
	$url    = $args[ 'recaptcha_url' ];

	$response = \wp_remote_request($url, [
		'method' => 'POST',
		'headers' => [
			'Accept'   => 'application/json'
		],
		'body' => [
			'secret'   => $secret,
			'response' => $captchaField
		]
	]);

	if( is_wp_error( $response ) ) {
		
		$code    = $response->get_error_code();
		$message = $response->get_error_message( $code );
		
		return [
			'result'  => false,
			'message' => $message
		];
	}

	if( wp_remote_retrieve_response_code( $response ) != '200' ) {
		return [
			'result'  => false,
			'message' => __( 'The request is invalid or malformed', 'elgreco' )
		];
	}

	$result = json_decode(wp_remote_retrieve_body( $response ), true );
	
	if( ! $result[ 'success' ] ) {
		
		foreach( $result[ 'error-codes' ] as $key => $codeKey )
			return [
				'result'  => false,
				'message' => getCaptchaCodes( $codeKey )
			];
	}

	return [
		'result'  => true,
		'message' => ''
	];
}

/**
 * @param $codeKey
 *
 * @return mixed|string
 */
function getCaptchaCodes( $codeKey ) {
	
	$codes = [
		'missing-input-secret'   => __('The secret parameter is missing', 'elgreco'),
		'invalid-input-secret'   => __('The secret parameter is invalid or malformed', 'elgreco'),
		'missing-input-response' => __('The response parameter is missing', 'elgreco'),
		'invalid-input-response' => __('The response parameter is invalid or malformed', 'elgreco'),
		'bad-request'            => __('The request is invalid or malformed', 'elgreco')
	];

	if ( isset( $codes[ $codeKey ] ) ) {
		return $codes[ $codeKey ];
	}

	return __( "Can't find error message", 'elgreco' );
}