<?php

if( have_posts() ) : while ( have_posts() ) : the_post();
	do_action( 'adstm_iterator_loop_product' );
    $img_size = 'ads-big';
    do_action('adstm_product_item', $img_size);
endwhile; endif;


?>