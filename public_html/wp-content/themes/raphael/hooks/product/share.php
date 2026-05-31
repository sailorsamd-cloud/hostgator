<?php


function adstm_single_share(){
	if ( cz( 'tp_share' ) ){
		echo '<div class="share-single-product">';
		get_template_part( 'template/widget/_share_button' );
		echo '</div>';
	}
}

add_action('adstm_single_share', 'adstm_single_share');