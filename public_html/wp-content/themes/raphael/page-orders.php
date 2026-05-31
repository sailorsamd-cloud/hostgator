<?php

/**
 * Description of orders
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> Dec 15, 2016 4:09:15 PM
 */
?>

<?php get_header();?>
	<!-- Account Orders -->
	<div class="account-orders">
		<div class="container">
			<div class="row">
				<div class="col-md-60 article">
					<div class="p-heading">
						<div class="p-title">
							<?php echo function_exists('ads_set_custom_title') ? ads_set_custom_title('', '') : ''; ?>
						</div>
					</div>
                    <?php $page = isset($_GET['ads-page']) ? $_GET['ads-page'] : 1;?>
                    <?php adstm_orders_page($page, $limit = 20); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>