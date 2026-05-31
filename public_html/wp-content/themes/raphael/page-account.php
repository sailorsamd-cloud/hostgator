<?php get_header();?>
    <div class="account-details">
        <div class="container">
            <div class="row">
                <div class="col-md-60 account-details-content">
                    <div class="p-heading">
                        <div class="p-title">
							<?php echo function_exists('ads_set_custom_title') ? ads_set_custom_title('', '') : ''; ?>
                        </div>
                    </div>
                    <div class="row">
						<?php do_shortcode('[ads_account]');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>