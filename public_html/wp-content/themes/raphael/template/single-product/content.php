<?php global $post; $review = adsTmpl::review(); $product = adsTmpl::product();
$is_active1 = '';
$is_active2 = '';
$is_active3 = '';
$is_active4 = '';

$tp_tab_item_details = cz( 'tp_tab_item_details' );
$tp_tab_item_specifics = cz( 'tp_tab_item_specifics' );
$tp_tab_shipping = cz( 'tp_tab_shipping' );
$tp_single_enable_why_buy_from_us = cz( 'tp_single_enable_why_buy_from_us' );


if($tp_tab_item_details){
    $is_active1 = 'active';
}elseif($tp_tab_item_specifics){
    $is_active2 = 'active';
}elseif($tp_tab_shipping){
    $is_active3 = 'active';
}elseif($is_active4){
    $is_active4 = 'active';
}

?>
<div>
    <div class="tab_heads">
        <?php
        if( $tp_tab_item_details ){ ?>
        <div id="item-details" class="tab_head <?php echo $is_active1; ?>">
            <?php _cz('tp_tab_item_details_label'); ?>
        </div>
        <?php }
        if( $tp_tab_item_specifics ){?>
            <div id="item-specs" class="tab_head <?php echo $is_active2; ?>">
                <?php _cz('tp_tab_item_specifics_label'); ?>
            </div>
        <?php }
        if ($tp_tab_shipping){ ?>
            <div id="item-returns" class="tab_head <?php echo $is_active3; ?>">
                <?php _cz('tp_tab_shipping_label'); ?>
            </div>
        <?php }
        if( $tp_single_enable_why_buy_from_us){ ?>
            <div id="item-why_buy" class="tab_head <?php echo $is_active4; ?>">
                <?php echo cz('tp_single_enable_tab_name') ?>
            </div>
        <?php } ?>
    </div>
    <div class="tab_bodies">
        <?php
        if( $tp_tab_item_details ) { ?>
            <div class="adap_tab_head <?php echo $is_active1; ?>" data-id="item-details">
                <?php _cz('tp_tab_item_details_label'); ?>
            </div>
            <div class="item-details tab_body content <?php echo $is_active1 ? 'show' : ''; ?>">
                <?php get_template_part('template/single-product/tab/_details') ?>
            </div>
            <?php
        }
        if( $tp_tab_item_specifics ){ ?>
            <div class="adap_tab_head <?php echo $is_active2; ?>" data-id="item-specs">
                <?php _cz('tp_tab_item_specifics_label'); ?>
            </div>
            <div class="item-specs tab_body content <?php echo $is_active2 ? 'show' : ''; ?>">
                <?php get_template_part( 'template/single-product/tab/_specifics' ) ?>
            </div>
        <?php }
        if( $tp_tab_shipping ){ ?>
            <div class="adap_tab_head <?php echo $is_active3; ?>" data-id="item-returns">
                <?php _cz('tp_tab_shipping_label'); ?>
            </div>
            <div class="item-returns tab_body content <?php echo $is_active3 ? 'show' : ''; ?>">
                <?php get_template_part( 'template/single-product/tab/_shipping' ) ?>
            </div>
        <?php }
        if ( $tp_single_enable_why_buy_from_us ): ?>
            <div class="adap_tab_head <?php echo $is_active4; ?>" data-id="item-why_buy">
                <?php echo cz('tp_single_enable_tab_name') ?>
            </div>
            <div class="item-why_buy tab_body content <?php echo $is_active4 ? 'show' : ''; ?>">
                <?php get_template_part( 'template/single-product/tab/_why_buy' ) ?>
            </div>
        <?php endif; ?>
    </div>
</div>