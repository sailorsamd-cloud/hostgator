<?php get_header(); ?>

	<!-- COLLECTION -->
	<div class="collection">
		<div class="container">
			<div class="row page-cat-main">

				<div class="aship-box-products col-xs-60 page-cat-product">

                    <div class="clearfix">
                        <h1 class="aship-title cat-name"><?php echo adsTmpl::singleTerm(true) ?></h1>

                        <div class="category-top">
                            <!-- BREADCRUMBS -->
                            <div class="breadcrumbs">
                                <?php adsTmpl::breadcrumbs() ?>
                            </div>

                            <div class="category-select">
                                <?php do_action('sortby_show_select'); ?>
                            </div>
                        </div>
                    </div>

					<div class="js-list_product list_product">
                        <div class="row">
						<?php
                        $i = 0;

						$img_size = 'ads-big';

						if( have_posts() ) : while ( have_posts() ) : the_post();

                            $i++;

							$class = $img_size. ' item_'.$i;

							echo '<div class="col-xs-30 col-sm-20 col-md-15 col-lg-15 item '.$class.'">';
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

                    <div class="b-content">
						<?php do_action('adstm_category_description'); ?>
                    </div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>