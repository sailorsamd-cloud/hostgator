<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.09.2015
 * Time: 12:14
 */
get_header();

$m_head   = cz( 'tp_thankyou_fail_yes_head' );
$m_text   = '';
$m_img    = 'fail';
$m_script = cz( 'tp_thankyou_fail_yes_head_tag' );

if ( isset( $_GET[ 'fail' ] ) && $_GET[ 'fail' ] == 'no' ) {
	$m_head   = cz( 'tp_thankyou_fail_no_head' );
	$m_text   = cz( 'tp_thankyou_fail_no_text' );
	$m_script = cz( 'tp_thankyou_fail_no_head_tag' );
	$m_img    = 'chek';
}

?> 
	<!-- THANK ORDER TEMPLATE-->
	<div class="container-fluid page-thank-order">
		<div class="page-content">
			<div class="container">
				<div class="page-thank-order__main">
					<div class="page-thank-order__top">
						<div class="page-thank-order__top__img">
							<?php printf( '<img src="%1$s">',
								get_template_directory_uri() . '/images/' . $m_img . '.png'
							); ?>
						</div>
						<div class="page-thank__order__content">
							<?php printf( '<h3>%1$s</h3><div class="page-thank__order__content__dis">%2$s</div>%3$s',
								$m_head,
								$m_text,
								$m_script
							); ?>

							<div class="page-thank__order_btn">
								<a href="<?php echo esc_url( home_url( '/product/' ) ) ?>"
								   class="btn btn-default btn-danger rippler rippler-default">
									<?php _e( 'Continue shopping', 'rap' ); ?></a>
								<a href="<?php echo esc_url( home_url( '/contact-us/' ) ) ?>"
								   class="btn btn-default btn-danger rippler rippler-default">
									<?php _e( 'Contact Us', 'rap' ); ?></a>
							</div>
						</div>
					</div>
					<?php if ( adsTmpl::is_enableSocial() ): ?>
					<div class="page-thank-order__bottom">
						<div class="thank-order__social">
							<span><?php _e( 'Follow us:', 'rap' ) ?></span>
							<?php endif; ?>
							<ul>
								<?php if ( cz( 's_link_fb_page' ) ): ?>
									<li><a href="<?php echo cz( 's_link_fb_page' ); ?>" target="_blank"
									       rel="nofollow"><span class="fa fa-facebook"></span></a>
									</li>
								<?php endif; ?>
								<?php if ( cz( 's_link_in_page' ) ): ?>
									<li><a href="<?php echo cz( 's_link_in_page' ); ?>" target="_blank"
									       rel="nofollow"><span class="fa fa-instagram"></span></a>
									</li>
								<?php endif; ?>
								<?php if ( cz( 's_link_tw' ) ): ?>
									<li><a href="<?php echo cz( 's_link_tw' ); ?>" target="_blank" rel="nofollow">
											<span class="fa fa-twitter"></span></a></li>
								<?php endif; ?>
								<?php if ( cz( 's_link_pt' ) ): ?>
									<li><a href="<?php echo cz( 's_link_pt' ); ?>" target="_blank" rel="nofollow">
											<span class="fa fa-pinterest-p"></span></a></li>
								<?php endif; ?>
								<?php if ( cz( 's_link_yt' ) ): ?>
								<li><a href="<?php echo cz( 's_link_yt' ); ?>" target="_blank" rel="nofollow">
										<span class="fa fa-youtube"></span></a></li>
							</ul>
						</div>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer() ?>