<?php
add_filter('adstm_list_gateway', function($foo){
	unset($foo['promo_code']);
	return $foo;
});
