</div><!--wrap-->
<?php $confidence = cz('tp_confidence_img_1') || cz('tp_confidence_img_2') || cz('tp_confidence_img_3');
$locations = get_nav_menu_locations();
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
?>
<footer class="footer">

    <div class="content-footer">
        <div class="container">
            <div class="row row-footer">
                <div class="col-xs-60 col-md-15">
                    <div class="contact-footer">
                        <div class="footer-head">
                            <a href="javascript:;"><?php _cz('tp_footer_menu_title_1'); ?></a>
                        </div>
                        <div class="box-toggle">
                        <div class="item"><?php do_action('adstm_phone_shop', true) ?></div>
                        <div class="item"><?php do_action('adstm_email_shop') ?></div>
                        <?php do_action('adstm_address'); ?>
                        </div>
                    </div>
                </div>
                <?php if( isset( $locations[ 'footer-company' ] ) && $locations[ 'footer-company' ] ) { ?>
                    <div class="col-xs-60 col-md-15">
                        <div class="menu-footer">
                            <div class="footer-head"><a href="javascript:;"><?php _cz('tp_footer_menu_title_2'); ?></a></div>
                            <div class="box-toggle">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-company',
                                    'container' => false,
                                    'container_class' => '',
                                    'container_id' => '',
                                    'menu_class' => 'info',
                                    'menu_id' => '',
                                    'echo' => true,
                                    'fallback_cb' => '__return_empty_string',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 1,
                                    'walker' => '',
                                ));

                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if( isset( $locations[ 'footer-help' ] ) && $locations[ 'footer-help' ] ) { ?>
                    <div class="col-xs-60 col-md-15">
                        <div class="menu-footer">
                            <div class="footer-head"><a href="javascript:;"><?php _cz('tp_footer_menu_title_3'); ?></a></div>
                            <div class="box-toggle">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-help',
                                'container' => false,
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'info',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => '__return_empty_string',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 1,
                                'walker' => '',
                            ));

                            ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-xs-60 col-md-15">

                    <?php if (adsTmpl::is_enableSocial()): ?>
                        <div class="social">
                            <div class="head-social"><?php _cz('tp_footer_menu_title_4'); ?></div>
                            <ul>
                                <?php if (cz('s_link_fb_page')): ?>
                                    <li><a href="<?php echo cz('s_link_fb_page'); ?>" target="_blank"
                                           rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (cz('s_link_in_page')): ?>
                                    <li><a href="<?php echo cz('s_link_in_page'); ?>" target="_blank"
                                           rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (cz('s_link_tw')): ?>
                                    <li>
                                        <a href="<?php echo cz('s_link_tw'); ?>" target="_blank" rel="nofollow"><i
                                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (cz('s_link_pt')): ?>
                                    <li>
                                        <a href="<?php echo cz('s_link_pt'); ?>" target="_blank" rel="nofollow">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (cz('s_link_yt')): ?>
                                    <li>
                                        <a href="<?php echo cz('s_link_yt'); ?>" target="_blank" rel="nofollow">
                                            <i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

	                <?php if(cz('s_link_fb')):?>

                        <div class="social-fb">

                            <div class="fb-page" data-href="<?php echo cz('s_link_fb'); ?>"
                                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                                 data-show-facepile="true" data-show-posts="false">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="<?php echo cz('s_link_fb'); ?>">
                                        <a target="_blank" href="<?php echo cz('s_link_fb'); ?>"
                                           target="_blank"><?php echo cz('s_fb_name_widget'); ?></a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
	                <?php endif;?>
                </div>

            </div>
            <?php if (cz('tp_footer_payment_methods') || $confidence): ?>
                <div class="content-partners">
                    <div class="wrap-partners">
                            <?php if (cz('tp_footer_payment_methods')): ?>

                                <div class="box-partners">
                                    <div class="name"><?php echo cz('tp_payment_methods'); ?></div>
                                    <ul class="box-payment">
	                                    <?php

                                        $tmp = '<li><img '.$src.'="%s" alt=""></li>';
	                                    tmpCz('tp_footer_payment_methods_1', $tmp);
	                                    tmpCz('tp_footer_payment_methods_2', $tmp);
	                                    tmpCz('tp_footer_payment_methods_3', $tmp);
	                                    tmpCz('tp_footer_payment_methods_4', $tmp);
	                                    tmpCz('tp_footer_payment_methods_5', $tmp);
	                                    tmpCz('tp_footer_payment_methods_6', $tmp);
	                                    ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if ($confidence): ?>
                                <div class="box-partners">
                                    <div class="name"><?php echo cz('tp_confidence'); ?></div>
                                    <ul class="box-confidence">
                                        <?php if (cz('tp_confidence_img_1')): ?>
                                            <li>
                                                <img <?php echo $src; ?>="<?php echo cz('tp_confidence_img_1'); ?>?1000">
                                            </li>
                                        <?php endif; ?>
                                        <?php if (cz('tp_confidence_img_2')): ?>
                                            <li>
                                                <img <?php echo $src; ?>="<?php echo cz('tp_confidence_img_2'); ?>?1000">
                                            </li>
                                        <?php endif; ?>
                                        <?php if (cz('tp_confidence_img_3')): ?>
                                            <li>
                                                <img <?php echo $src; ?>="<?php echo cz('tp_confidence_img_3'); ?>?1000">
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-xs-60 footer-copyright"><?php echo str_replace( '{{YEAR}}', date( 'Y' ), cz( 'tp_copyright' ) ); ?></div>
            </div>

        </div>
    </div>
</footer><!-- .body-footer -->

<?php if ( cz('add_fix') && is_singular( 'product' ) ) : ?>
    <div class="fix-btn single-active-btn">
        <?php do_action('adstm_single_btn_add_to_cart') ?>
    </div>
<?php endif; ?>

<?php //do_action('adstm_modal'); ?>
<?php do_action('adstm_footer'); ?>
<script type="text/javascript"> self != top ? document.body.className+=' is_frame' : '';</script>
<?php wp_footer(); ?>

<?php echo cz('tp_footer_script'); ?>

<?php include "adstm/customization/cz_styles.php"; ?>

</body>
</html>
