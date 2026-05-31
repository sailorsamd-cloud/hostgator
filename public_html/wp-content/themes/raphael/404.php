<?php get_header() ?>
<div class="page-content">
	<div class="container">
		<div class="page-404">
			<div class="page-404__text">
				<h3><?php _e( '404 Page not found', 'rap' ); ?>.</h3>
				<p><?php echo cz('tp_404_text'); ?></p>
			</div>
			<div class="page-404__back_btn">
				<a href="/" class="btn btn_shopping"><?php _e( 'Go To Homepage', 'rap' ); ?></a>
                <a href="<?php echo adstm_home_url( 'contact-us' ) ?>" class="btn btn_contact"><?php _e( 'Contact Us', 'rap' ) ?></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
