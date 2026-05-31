<?php

do_action('adstm_start_loop_related_product', 6);

if ( have_posts() ) : while ( have_posts() ) :	the_post();

	do_action('adstm_iterator_loop_product');

	echo '<div class="">';

	echo '<div class="wrap_product">';

	do_action('adstm_product_item',  'ads-big');

	echo '</div>';
	echo '</div>';

endwhile; endif;

do_action('adstm_end_loop_product');