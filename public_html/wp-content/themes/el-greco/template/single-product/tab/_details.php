<?php global $post; ?>

<?php
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
if ( $post->post_content != '' ) : ?>
	<div class="content" itemprop="description" itemtype="http://schema.org/Product">
		<div class="wrap-content">
            <?php the_content();
            if(cz('tp_desc_add_enable')){ ?>
                <div class="reasons_to_buy">
                    <div class="img_with_heading">
                        <?php if(cz('tp_desc_add_img')){ ?>
                            <img <?php _czsrc('tp_desc_add_img'); ?> <?php echo $src; ?>="<?php _cz('tp_desc_add_img'); ?>" alt="">
                        <?php } ?>
                        <h3 <?php _cztxt('tp_desc_add_title'); ?>>
                            <?php _cz('tp_desc_add_title'); ?>
                        </h3>
                    </div>

                    <div class="additional_content" <?php _cztxt('tp_desc_add_text'); ?>><?php _cz('tp_desc_add_text'); ?></div>

                </div>
            <?php }
            if(cz('tp_desc_add_enable2')){ ?>
                <div class="buy_with_confidence">
                    <div class="img_with_heading">
                        <?php if(cz('tp_desc_add_img2')){ ?>
                            <img <?php _czsrc('tp_desc_add_img2'); ?> <?php echo $src; ?>="<?php _cz('tp_desc_add_img2'); ?>" alt="">
                        <?php } ?>
                        <h3 <?php _cztxt('tp_desc_add_title2'); ?>>
                            <?php _cz('tp_desc_add_title2'); ?>
                        </h3>
                    </div>
                    <div class="additional_content" <?php _cztxt('tp_desc_add_text2'); ?>><?php _cz('tp_desc_add_text2'); ?></div>
                </div>
            <?php }




		?></div>
	</div>
<?php endif; ?>