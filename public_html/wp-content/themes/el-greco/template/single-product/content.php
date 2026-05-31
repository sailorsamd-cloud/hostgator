<?php
global $post;
$product = adsTmpl::product();
$tp_tab_opened2 = cz('tp_tab_opened2');
$src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
?>
<div class="tab_heads">
    <?php
    if( cz( 'tp_tab_item_details' ) ) : ?>
        <div id="item-details" class="tab_head <?php if($tp_tab_opened2=='tab1'){ ?> active<?php } ?>" <?php _cztxt('tp_tab_item_details_label'); ?>>
            <?php _cz('tp_tab_item_details_label'); ?>
        </div>
    <?php endif;
    if( cz( 'tp_tab_item_specifics' ) ) : ?>
        <div id="item-specs" class="tab_head <?php if($tp_tab_opened2=='tab2'){?> active<?php } ?>" <?php _cztxt('tp_tab_item_specifics_label'); ?>>
            <?php _cz('tp_tab_item_specifics_label'); ?>
        </div>
    <?php endif;
    if ( cz( 'tp_tab_shipping' ) ) : ?>
        <div id="item-returns" class="tab_head <?php if($tp_tab_opened2=='tab3'){?> active<?php } ?>" <?php _cztxt('tp_tab_shipping_label'); ?>>
            <?php _cz('tp_tab_shipping_label'); ?>
        </div>
    <?php endif;

    if( cz( 'tp_tab_item_faqs' ) ) : ?>
    <div id="faqs" class="tab_head" <?php _cztxt( 'tp_faqs_title' ) ?>>
        <?php _cz( 'tp_faqs_title' ) ?>
    </div>
    <?php endif;
    if( cz( 'about_us_tab_enable' ) ) : ?>
    <div id="aboutus" class="tab_head" <?php _cztxt('about_us_tab_title'); ?>>
        <?php _cz('about_us_tab_title'); ?>
    </div>
    <?php endif; ?>
</div>
<div class="tab_bodies">
    <?php if( cz( 'tp_tab_item_details' ) ){ ?>
        <div class="adap_tab_head <?php if($tp_tab_opened2=='tab1'){ ?> active<?php } ?>" data-id="item-details" <?php _cztxt('tp_tab_item_details_label'); ?>>
            <?php _cz('tp_tab_item_details_label'); ?>
        </div>
        <div class="item-details tab_body content <?php if($tp_tab_opened2=='tab1'){?> show<?php } ?>">
            <?php get_template_part( 'template/single-product/tab/_details' ) ?>
        </div>
    <?php }
    if( cz( 'tp_tab_item_specifics' ) ){ ?>
        <div class="adap_tab_head <?php if($tp_tab_opened2=='tab2'){ ?> active<?php } ?>" data-id="item-specs" <?php _cztxt('tp_tab_item_specifics_label'); ?>>
            <?php _cz('tp_tab_item_specifics_label'); ?>
        </div>
        <div class="item-specs tab_body content <?php if($tp_tab_opened2=='tab2'){?> show<?php } ?>">
            <?php get_template_part( 'template/single-product/tab/_specifics' ) ?>
        </div>
    <?php }
    if( cz( 'tp_tab_shipping' ) ){ ?>
        <div class="adap_tab_head <?php if($tp_tab_opened2=='tab3'){ ?> active<?php } ?>" data-id="item-returns" <?php _cztxt('tp_tab_shipping_label'); ?>>
            <?php _cz('tp_tab_shipping_label'); ?>
        </div>
        <div class="item-returns tab_body content  <?php if($tp_tab_opened2=='tab3'){?> show<?php } ?>">
            <?php get_template_part( 'template/single-product/tab/_shipping' ) ?>
        </div>
    <?php }
    if ( cz( 'tp_tab_item_faqs' ) ){ ?>
        <div class="adap_tab_head" data-id="faqs" <?php _cztxt( 'tp_faqs_title' ) ?>>
            <?php _cz( 'tp_faqs_title' ) ?>
        </div>
        <div class="faqs tab_body content" <?php _cztxt( 'tp_faqs_text' ) ?>>
            <?php _cz( 'tp_faqs_text' ) ?>
        </div>
    <?php }
    if ( cz( 'about_us_tab_enable' ) ){
        $about_us_tab = cz( 'about_us_tab' ); ?>
        <div class="adap_tab_head" data-id="aboutus" <?php _cztxt('about_us_tab_title'); ?>>
            <?php _cz('about_us_tab_title'); ?>
        </div>
        <div class="aboutus tab_body content">
            <div class="aboutus_tab"><?php
                foreach( $about_us_tab['item'] as $key => $item ){
                    ?><div class="aboutus_tab_one">
                        <div class="aboutus_tab_head">
                            <?php if($item['img']){ ?>
                                <div class="img-feat">
                                    <img <?php _czsrc('about_us_tab_img_key'.$key); ?> <?php echo $src; ?>="<?php echo $item['img']; ?>" alt="">
                                </div>
                            <?php } ?>
                            <div class="aboutus_title" <?php _cztxt('about_us_tab[item]['.$key.'][head]'); ?>><?php echo $item['head']; ?></div>
                        </div>
                        <div class="aboutus_tab_text">
                            <p <?php _cztxt('about_us_tab[item]['.$key.'][text]'); ?>><?php echo $item['text']; ?></p>
                        </div>
                    </div>
                <?php }
            ?></div>
        </div>
    <?php } ?>
</div>
