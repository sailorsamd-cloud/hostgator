<?php $typePost = isset($_GET['post_type']) && $_GET['post_type'] == 'post'; ?>

<?php get_header() ?>

	<!-- COLLECTION -->
	<div class="collection">
		<div class="container">
			<div class="row page-cat-main">

				<div class="col-xs-60 page-cat-product aship-box-products">

					<?php global $wp_query; ?>
                    <div class="search-top">
                        <div class="info-result-search"><?php printf( '%1$s <b>“%2$s”</b>. <span>%3$s</span> %4$s:',
			                    __( 'Search for', 'rap' ),
			                    get_search_query() ,
			                    $wp_query->found_posts,
			                    _n( 'result', 'results', $wp_query->found_posts, 'rap' )

		                    ); ?>
                        </div>
                        <div class="sortby-select">
		                    <?php do_action('sortby_show_select'); ?>
                        </div>
                    </div>

					<div class="js-list_product list_product">
						<div class="row">
							<?php
							$i = 0;

							$img_size = 'ads-medium';

							if( have_posts() ) : while ( have_posts() ) : the_post();

								$i++;

								$class = $img_size. ' item_'.$i;

								echo '<div class="col-xs-30 col-sm-20 col-md-15 col-lg-12 item '.$class.'">';
								echo '<div class="wrap_product">';
								do_action('adstm_product_item', $img_size);

								echo '</div>';
								echo '</div>';

							endwhile; endif;?>
						</div>
					</div>

					<div class="js-pagination pagination">
						<?php  do_action('adstm_paging_nav'); ?>
					</div>

					<div class="clearfix wrap-loadProduct" style="display: none">
						<button class="loadProduct"><?php _e( 'Load More', 'rap' ); ?></button>
					</div>

				</div>
			</div>
		</div>
	</div>

<?php get_footer() ?>