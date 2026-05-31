<?php $confidence = cz('tp_confidence_img_1') || cz('tp_confidence_img_2') || cz('tp_confidence_img_3');
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';

$is_socs = cz('s_link_fb_page') || cz('s_link_in_page') || cz('s_link_tw') || cz('s_link_pt') || cz('s_link_yt');
$xl_size = $is_socs ? '3' : '4';
?>
<div class="footer">
    <div class="container">
        <div class="footerT">
            <div class="row no-gutters justify-content-between">
                <div class="footone col-md-4 col-xl-<?php echo $xl_size; ?>">
                    <h5 <?php _cztxt('tp_footer_menu_title_1'); ?>><?php _cz('tp_footer_menu_title_1'); ?></h5>
                    <div class="fonecont">
                        <p class="emailfooter">
                            <?php if( cz( 'tp_header_phone' ) ){ ?>
                                <a href="tel:<?php echo str_replace(' ', '', cz( 'tp_header_phone' )) ?>" <?php _cztxt( 'tp_header_phone' ) ?>><?php echo cz( 'tp_header_phone' ) ?></a><br/>
                            <?php }
                            if( cz( 'tp_header_email' ) ){ ?>
                                <a href="mailto:<?php _cz( 'tp_header_email' ) ?>" <?php _cztxt( 'tp_header_email' ) ?>><?php _cz( 'tp_header_email' ) ?></a>
                            <?php } ?>
                        </p>
                        <p <?php _cztxt( 'tp_address' ) ?>><?php _cz( 'tp_address' ) ?></p>
                    </div>
                </div>
                <div class="footone col-xl-<?php echo $xl_size; ?>  col-md-4">
                    <h5 <?php _cztxt('tp_footer_menu_title_2'); ?>><?php _cz('tp_footer_menu_title_2'); ?></h5>
                    <?php
                    wp_nav_menu( [
                        'theme_location'  => 'footer-company',
                        'container'       => false,
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'info',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '__return_empty_string',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<div class="fonecont"><ul>%3$s</ul></div>',
                        'depth'           => 1,
                        'walker'          => '',
                    ] );
                    ?>
                </div>
                <div class="footone col-xl-<?php echo $xl_size; ?>  col-md-4">
                    <h5 <?php _cztxt('tp_footer_menu_title_3'); ?>><?php _cz('tp_footer_menu_title_3'); ?></h5>
                    <?php wp_nav_menu( [
                        'theme_location'  => 'footer-purchase',
                        'container'       => false,
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'info',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '__return_empty_string',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<div class="fonecont"><ul>%3$s</ul></div>',
                        'depth'           => 1,
                        'walker'          => '',
                    ] ); ?>
                </div>
                <?php if ($is_socs){ ?>
                    <div class="footone col-xl-2 col-md-12">
                    <h5 <?php _cztxt('tp_footer_menu_title_4'); ?>><?php _cz('tp_footer_menu_title_4'); ?></h5>
                    <?php get_template_part( 'template/social-links' ); ?>
                    </div>
                <?php } ?>

            </div>
        </div>
        <?php if( cz( 'tp_footer_payment_methods' ) || cz('tp_footer_trust_seals') ) : ?>
            <div class="footerC">
                <?php if (cz('tp_footer_payment_methods')){ ?>
                    <div class="box-partners">
                        <div class="name"><?php echo __( 'Payment methods:', 'elgreco' ); ?></div>
                        <div class="footpics">
                            <?php
                            $tp_footer_1 = cz('tp_footer_1');
                            $tp_footer_2 = cz('tp_footer_2');
                            $tp_footer_3 = cz('tp_footer_3');
                            $tp_footer_4 = cz('tp_footer_4');
                            $tp_footer_5 = cz('tp_footer_5');
                            $tp_footer_6 = cz('tp_footer_6');

                            if($tp_footer_1){ ?>
                                <div><img <?php _czsrc('tp_footer_1'); ?> <?php echo $src; ?>="<?php echo $tp_footer_1; ?>" alt=""></div>
                            <?php }
                            if($tp_footer_2){ ?>
                                <div><img <?php _czsrc('tp_footer_2'); ?> <?php echo $src; ?>="<?php echo $tp_footer_2; ?>" alt=""></div>
                            <?php }
                            if($tp_footer_3){ ?>
                                <div><img <?php _czsrc('tp_footer_3'); ?> <?php echo $src; ?>="<?php echo $tp_footer_3; ?>" alt=""></div>
                            <?php }
                            if($tp_footer_4){ ?>
                                <div><img <?php _czsrc('tp_footer_4'); ?> <?php echo $src; ?>="<?php echo $tp_footer_4; ?>" alt=""></div>
                            <?php }
                            if($tp_footer_5){ ?>
                                <div><img <?php _czsrc('tp_footer_5'); ?> <?php echo $src; ?>="<?php echo $tp_footer_5; ?>" alt=""></div>
                            <?php }
                            if($tp_footer_6){ ?>
                                <div><img <?php _czsrc('tp_footer_6'); ?> <?php echo $src; ?>="<?php echo $tp_footer_6; ?>" alt=""></div>
                            <?php }
                            ?>
                        </div>
                    </div>
                <?php }
                    if ($confidence && cz('tp_footer_trust_seals')){ ?>
                    <div class="box-partners">
                        <div class="name" <?php _cztxt('tp_confidence'); ?>><?php _cz('tp_confidence'); ?></div>
                        <div class="footpics">
                            <?php
                            $tp_confidence_img_1 = cz('tp_confidence_img_1');
                            $tp_confidence_img_2 = cz('tp_confidence_img_2');
                            $tp_confidence_img_3 = cz('tp_confidence_img_3');

                            if($tp_confidence_img_1){ ?>
                                <div><img <?php _czsrc('tp_confidence_img_1'); ?> <?php echo $src; ?>="<?php echo $tp_confidence_img_1; ?>" alt=""></div>
                            <?php }
                            if($tp_confidence_img_2){ ?>
                                <div><img <?php _czsrc('tp_confidence_img_2'); ?> <?php echo $src; ?>="<?php echo $tp_confidence_img_2; ?>" alt=""></div>
                            <?php }
                            if($tp_confidence_img_3){ ?>
                                <div><img <?php _czsrc('tp_confidence_img_3'); ?> <?php echo $src; ?>="<?php echo $tp_confidence_img_3; ?>" alt=""></div>
                            <?php }

                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <div class="footer-copyright"><?php echo str_replace( '{{YEAR}}', date( 'Y' ), cz( 'tp_copyright' ) ); ?></div>
    </div>
</div>
    <?php if( cz( 'tp_enable_upbutton' ) ){ ?>
        <div class="upbutton">
            <span class="arrowtop"></span>
            <div><?php _e( 'Top', 'elgreco' ) ?></div>
        </div>
    <?php } ?>
    <div class="shade"></div>
<script type="text/javascript">
    if(document.location.hash=="#live"){
        document.body.className+=' is_frame_live'
    }else{
        if(document.body.classList.contains('tax-product_cat') || document.body.classList.contains('single-product')){
            self != top ? document.body.className+=' is_frame_live' : document.body.className+=' show_live_icon';
        }else{
            self != top ? document.body.className+=' is_frame' : document.body.className+=' show_live_icon';
        }
    }
</script>
    <?php
    do_action('live_btn');
    wp_footer();
    echo cz( 'tp_footer_script' );
    ?>
    </body>
</html>