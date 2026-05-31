<?php
/**
 * Description of confirmation
 *
 * @author Artem Yuriev <Art3mk4@gmail.com> Dec 14, 2016 9:54:29 AM
 */
?>

<?php get_header();?>
	<!-- Confirmation -->
	<div class="page-confirmation">
		<div class="container">
			<div class="row page-confirmation">
				<div class="col-md-60 article">
					<div class="p-heading">
						<div class="p-title">
							<?php echo function_exists('ads_set_custom_title') ? ads_set_custom_title('', '') : ''; ?>
						</div>
					</div>
					<?php adstm_confirmation();?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>