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

		if( class_exists('\models\seo\Meta') ){
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
	 * @return mixed|string|void
	 */
	static public function adstm_single_term() {

		$other_title = get_query_var( 'other_title', false );

		return ( $other_title ) ? $other_title : single_term_title( '', false );
	}

	/**
	 * @return bool
	 */
	static function is_home_article(){
		return (bool)trim(cz( 'tp_home_article' ));
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
	static public function is_enableSocial(){
		if(cz('s_link_fb_page') ||
		   cz('s_link_in_page')||
		   cz('s_link_tw')||
		   cz('s_link_pt')||
		   cz('s_link_yt')){
			return true;
		}
		return false;
	}

	static public function is_enableSubscribe(){
		return !empty(cz( 'tp_subscribe' ));
	}

	/**
	 *
	 */
	static public function adstm_current_currency() {

		$list_currency = ads_get_list_currency();

		printf( '<img src="%1$s"><span>(%2$s)</span> ',
			pachFlag($list_currency[ ADS_CUR ][ 'flag' ]) . '?100',
			trim( $list_currency[ ADS_CUR ][ 'symbol' ] ) );
	}


	/**
	 * @return array
	 */
	static public function customizeJsParams(){
		$foo = array(
			'sliderRotating' => (bool)cz( 'tp_home_slider_rotating' ),
			'timerRotating' => (int)cz( 'tp_home_slider_rotating_time' ),
			'testimonialsTime' => (int)cz('testimonials_rotating_time'),
			'testimonialsRotating' => (bool)cz('testimonials_rotating'),
			'tp_single_stock_count' => (int)cz( 'tp_single_stock_count' )
		);
		return $foo;
	}

	static public function breadcrumbs(){
		adstm_breadcrumbs();
	}


	static public function singleTerm($count = false){

		$title = single_term_title( '', false );

		$other_title = get_query_var( 'other_title', false );

		$quantity = '';

		if($count){
			global $wp_query;
			$quantity = $wp_query->found_posts;
			$quantity = sprintf('<span class="count">(%1$s %2$s)</span>', $quantity, $quantity > 1 ? __('items', 'rap') : __('item', 'rap'));
		}

		$title = ( $other_title ) ? $other_title : $title;
		if(!$title){
			$title = __('All products', 'rap');
		}
		$title = $title.$quantity;

		return $title;
	}

	public static function product($field = false){
		global $ADSTM;
		return $field ? $ADSTM['product'][$field] : $ADSTM['product'];
	}

	/**
	 * @param bool $field
	 *
	 * @return adsFeedBackTM
	 */
	public static function review(){
		global $ADSTM;
		return $ADSTM['review'];
	}

	/**
	 * @return adsProductTM
	 */

	public static function singleProduct(){
		global $ADSTM;
		return  $ADSTM['info'];
	}


	public static function isOneFreeShipping(){
		return isOneFreeShipping();
	}

	/**
	 * @return mixed
	 */
	static public function host() {
		return parse_url(ADSTM_HOME, PHP_URL_HOST);
	}


	/**
	 * @param $path
	 *
	 * @return string
	 */
	static public function home_url( $path = ''){

		$url = ADSTM_HOME;

		if ( $path && is_string( $path ) )
			$url = ADSTM_HOME .'/' . ltrim( $path, '/' );

		return esc_url($url);
	}

	/**
	 * @return array
	 */
	public static function userData() {

		$usr = array(
			'email'       => '',
			'name'        => '',
			'address'     => '',
			'city'        => '',
			'state'       => '',
			'country'     => '',
			'postal_code' => '',
			'phone'       => ''
		);

		$users_can_register = get_option('users_can_register');
		if (class_exists('\models\account\User') && $users_can_register == '1') {
			$userModel = new \models\account\User();

			$usr = array(
				'email'       => $userModel->getEmail(),
				'name'        => trim($userModel->getFirst_name() . ' ' . $userModel->getLast_name()),
				'address'     => $userModel->getAddress(),
				'city'        => $userModel->getCity(),
				'state'       => $userModel->getState(),
				'country'     => $userModel->getAccount_country(),
				'postal_code' => $userModel->getPostal_code(),
				'phone'       => $userModel->getPhone_number()
			);
		}

		return $usr;
	}

	public static function isAuthAllow() {
		if(!class_exists('\models\account\User'))
			return false;

		$userModel = new \models\account\User();

		return	$userModel->getUser_id() == 0 && get_option('users_can_register') == 1;
	}

}