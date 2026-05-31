<?php

do_action('adstm_start_loop_recently_product', 4);

if ( have_posts() ) :

	printf( '<div class="list-product recently-products visible-lg">
				<div class="container">
					<div class="p-heading">
						<div class="p-title">%1$s</div>
			</div>',
		__( 'Your recently viewed items', 'rap' ) );

	echo '<div class="row">';

	while ( have_posts() ) : the_post();

		echo '<div class="col-md-15 inline-product">';
		do_action('adstm_product_item',  'ads-big');
		echo '</div>';

	endwhile;

	echo '</div></div></div>';

endif;

do_action('adstm_end_loop_product');
