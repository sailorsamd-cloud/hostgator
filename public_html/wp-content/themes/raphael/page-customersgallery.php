<?php

/**
 * Description of customersgallery
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> May 24, 2017 10:35:55 AM
 */
?>

<?php get_header();?>
	<!-- Customers -->
	<div class="page-customers">
		<div class="container">
			<div class="row">
				<div class="col-md-60 customers">
					<div class="p-heading">
                                                <div class="p-title" style="margin: 20px 0px 0px 0px;">
                                                    <?php do_action('adsgal_clientgallery_title');?>
						</div>
					</div>
					<div class="row">
						<?php do_action('adsgal_clientgallery');?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>