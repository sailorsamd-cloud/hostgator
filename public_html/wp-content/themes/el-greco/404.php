<?php get_header() ?>
<div class="fullpic page404">
	<div class="page404center">
        <h1>404</h1>
        <p <?php _cztxt('tp_404_text'); ?>>
            <?php _cz('tp_404_text'); ?>
		</p>
		<div class="flexbtns onblackbtns">
			<a class="btn-white" href="<?php echo adstm_home_url() ?>"><?php _e( 'Go Back Home', 'elgreco' ) ?></a>
			<a class="btn-white" href="<?php echo adstm_home_url( 'contact-us' ) ?>"><?php _e( 'Contact Us', 'elgreco' ) ?></a>
		</div>
	</div>	
</div>
<?php get_footer() ?>
