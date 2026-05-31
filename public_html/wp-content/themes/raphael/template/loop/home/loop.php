<?php

if ( have_posts() ) : while ( have_posts() ) :
	the_post();
	do_action('adstm_iterator_loop_product');

	echo '<div class="col-xs-30 col-sm-15 col-md-15 col-lg-15 item"><div class="wrap_product">';

	do_action('adstm_product_item', 'ads-big');

	echo '</div></div>';
endwhile; endif;

do_action('adstm_end_loop_product');