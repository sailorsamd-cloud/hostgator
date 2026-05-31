<?php

/**
 * Created by PhpStorm.
 * User: sunfun
 * Date: 20.04.17
 * Time: 14:15
 */
class adsTmpl {

	/**
	 * Get count items in Basket
	 *
	 * @return int
	 */
	static public function quantityOrders() {
		
		/** @var object $adsBasket */
		global $adsBasket;
		
		return $adsBasket->countItems();
	}

	static public function isExpressCheckoutEnabled() {

		if ( ! function_exists( 'isExpressCheckoutEnabled' ) ) {
			return false;
		}

		return isExpressCheckoutEnabled();
	}

	static public function isPromocodesEnabled() {
		
		if ( ! function_exists( 'isPromocodesEnabled' ) ) {
			return false;
		}

		return isPromocodesEnabled();
	}


	static public function get_list_contries( $selected = '' ) {
		
		if ( function_exists( 'ads_get_list_contries' ) ) {
			ads_get_list_contries( $selected );
		}
	}

	/**
	 * Meta
	 */
	static public function box_meta(){

		$seo = '<title>' . wp_title('', false) . '</title>';

		if( class_exists( '\models\seo\Meta' ) ) {
			
			$seo = \models\seo\Meta::block();
		}

		echo $seo;
	}

	/**
	 * @return bool
	 */
	static public function is_home() {
		
		return is_front_page() || is_home();
	}



	/**
	 * @return mixed|string
	 */
	static public function adstm_single_term() {

		$other_title = get_query_var( 'other_title', false );

		return ( $other_title ) ? $other_title : single_term_title( '', false );
	}

	/**
	 * @return bool
	 */
	static function is_home_article() {
		
		return (bool) trim( cz( 'tp_home_article' ) );
	}

	/**
	 * @return bool
	 */
	static public function adstm_isExpressCheckoutEnabled() {

		if ( ! function_exists( 'isExpressCheckoutEnabled' ) ) {
			return false;
		}

		return isExpressCheckoutEnabled();
	}

	/**
	 * @return bool
	 */
	static public function is_enableSocial() {
		
		if( cz( 's_link_fb_page' ) ||
		   cz( 's_link_in_page' )||
		   cz( 's_link_tw' )||
		   cz( 's_link_gl' )||
		   cz( 's_link_pt' )||
		   cz( 's_link_yt' )){
			return true;
		}
		
		return false;
	}

	static public function is_enableSubscribe() {
		
		return ! empty( cz( 'tp_subscribe' ) );
	}

	/**
	 *
	 */
	static public function adstm_current_currency() {

		$list_currency = ads_get_list_currency();

		echo '<img src="' . pachFlag( $list_currency[ ADS_CUR ][ 'flag' ] ) . '">' .
		     '<span>(' . trim( $list_currency[ ADS_CUR ][ 'symbol' ] ) . ')</span> ';
	}
	
	/**
	 * @return array
	 */
	static public function customizeJsParams() {
		
		return [
			'tp_single_stock_count' => (int) cz( 'tp_single_stock_count' ),
            'tp_single_stock_enabled' => (bool) cz( 'tp_single_stock_enabled' ),
		];
	}

	static public function breadcrumbs() {
		if(cz('tp_show_breadcrumbs')){
            adstm_breadcrumbs();
        }else{
		    echo '<div class="pr-breadcrumbs"></div>';
        }
	}

	static public function singleTerm( $count = false ) {

		$title       = single_term_title( '', false );
		$other_title = get_query_var( 'other_title', false );
		$quantity    = '';

		if( $count ) {
			
			global $wp_query;
			
			$quantity = $wp_query->found_posts;
			$quantity = sprintf('<span class="count">(%1$s)</span>', $quantity);
		}

		$title = ( $other_title ) ? $other_title : $title;

        function endsWith($haystack, $needle) {
            return substr_compare($haystack, $needle, -strlen($needle)) === 0;
        }
		if( ! $title && (endsWith($_SERVER['REQUEST_URI'], '/product/') ||  $cp_start = stripos($_SERVER['REQUEST_URI'],'product/?') ||  $cp_start = stripos($_SERVER['REQUEST_URI'],'product/page/'))) {
			$title = __( 'All Products', 'elgreco' ) ;
		}
		
		$title = '<h1>' . $title . '</h1>' . $quantity;

		return $title;
	}

	public static function product( $field = false ) {
		
		global $ADSTM;
		
		return $field ? $ADSTM[ 'product' ][ $field ] : $ADSTM[ 'product' ];
	}

	/**
	 * @return mixed
	 */
	public static function review() {
		
		global $ADSTM;
		
		return $ADSTM[ 'review' ];
	}

	/**
	 * @return adsProductTM
	 */

	public static function singleProduct() {
		
		global $ADSTM;
		
		return  $ADSTM['info'];
	}


	public static function isOneFreeShipping() {
		
		return isOneFreeShipping();
	}

	/**
	 * @return mixed
	 */
	static public function host() {
		
		return parse_url( ADSTM_HOME, PHP_URL_HOST );
	}
	
	/**
	 * @param $path
	 *
	 * @return string
	 */
	static public function home_url( $path = '' ) {

		$url = ADSTM_HOME;

		if ( $path && is_string( $path ) )
			$url = ADSTM_HOME . '/' . ltrim( $path, '/' );

		return esc_url( $url );
	}

	/**
	 * @return array
	 */
	public static function userData() {

		$usr = [
			'email'       => '',
			'name'        => '',
			'address'     => '',
			'city'        => '',
			'state'       => '',
			'country'     => '',
			'postal_code' => '',
			'phone'       => ''
		];

		$users_can_register = get_option( 'users_can_register' );
		
		if( class_exists( '\models\account\User' ) && $users_can_register == '1' ) {
			$userModel = new \models\account\User();

			$usr = [
				'email'       => $userModel->getEmail(),
				'name'        => trim($userModel->getFirst_name() . ' ' . $userModel->getLast_name()),
				'address'     => $userModel->getAddress(),
				'city'        => $userModel->getCity(),
				'state'       => $userModel->getState(),
				'country'     => $userModel->getAccount_country(),
				'postal_code' => $userModel->getPostal_code(),
				'phone'       => $userModel->getPhone_number()
			];
		}

		return $usr;
	}

	public static function isAuthAllow() {
		
		if( ! class_exists( '\models\account\User' ) )
			return false;

		$userModel = new \models\account\User();

		return	$userModel->getUser_id() == 0 && get_option( 'users_can_register' ) == 1;
	}
}