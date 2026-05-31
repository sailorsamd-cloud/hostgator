<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'General Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_image_crop(__( 'Favicon image (png, gif)', 'elgreco' ),'tp_favicon','',$data,'',__( 'Recommended size: 32*32px', 'elgreco' ),'','',35,35);
            cb_checkbox(__( 'Enable currency switcher', 'elgreco'),'tp_currency_switcher','',$data);
            cb_checkbox(__( 'Enable one-page checkout', 'elgreco' ),'sc_one_page_enable','',$data);
            cb_checkbox(__( 'Show breadcrumbs', 'elgreco' ),'tp_show_breadcrumbs','',$data);

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Product Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Show discount badges', 'elgreco'),'tp_show_discount','',$data);
            cb_checkbox(__( 'Show star rating', 'elgreco' ),'tp_show_stars','',$data);
            cb_select(__( 'Additional product details on Homepage and Category page', 'elgreco' ),'tp_show_reviews_orders1', $data, $data,'','');
            cb_checkbox(__( 'Show one product per row on Homepage and Category page (mobile)', 'elgreco' ),'tp_2_per_row_mob','',$data);
            cb_checkbox(__( 'Enable \'sort by discount\' option', 'elgreco'),'tp_show_sort_discount','',$data);
            cb_select(__( 'Load more products on Category page', 'elgreco' ),'tp_paging_type', $data, $data,'','');
            cb_checkbox(__( 'Use classic pagination', 'elgreco'),'tp_classic_pager_mode','',$data);
            cb_checkbox(__( 'Show image title', 'elgreco' ),'tp_image_title','',$data);

            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Colors', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php


            cb_color_picker(__( 'Main menu hover color (desktop)', 'elgreco' ),'main_menu_hover','',$data,'');
            cb_color_picker(__( 'Buttons color', 'elgreco' ),'buttons_default','',$data,'');
            cb_color_picker(__( 'Buttons color (hover)', 'elgreco' ),'buttons_default_hover','',$data,'');
            cb_color_picker(__( 'Link color', 'elgreco' ),'link_default','',$data,'');
            cb_color_picker(__( 'Link color (hover)', 'elgreco' ),'link_default_hover','',$data,'');
            cb_color_picker(__( 'Discount badges color', 'elgreco' ),'tp_discount_bg_color','',$data,'');
            cb_color_picker(__( 'Prices color', 'elgreco' ),'tp_price_color','',$data,'');
            cb_color_picker(__( 'Cart/Payment buttons color', 'elgreco' ),'tp_cart_pay_btn_color','',$data,'');
            cb_color_picker(__( 'Cart/Payment buttons color (hover)', 'elgreco' ),'tp_cart_pay_btn_color_hover','',$data,'');
            cb_color_picker(__( 'Star rating color', 'elgreco' ),'tp_star_color','',$data,'');


            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>

</form>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Performance', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Lazy load images', 'elgreco' ),'tp_item_imgs_lazy_load','',$data);
            cb_checkbox(__( 'Enable Gutenberg block library CSS', 'elgreco' ),'tp_gutenberg_block_library','',$data,'',__( 'Remove Gutenberg code library to make your website load faster if you don\'t use this editor', 'elgreco' ));
            cb_checkbox(__( 'Enable jQuery Migrate', 'elgreco' ),'tp_jquery_migrate','',$data);
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>
<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Font Settings', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_select(__( 'Choose a font', 'elgreco' ),'add_fonts3', $data, $data,'','');
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>

<form action="live_cstm_save" class="live_cstm_save">
    <div class="fields_block">
        <h4><?php _e( 'Right-to-Left layout', 'elgreco' ); ?></h4>
        <div class="fields_cont">
            <?php
            cb_checkbox(__( 'Enable RTL layout', 'elgreco' ),'tp_do_rtl','',$data);
            ?>
            <div class="save_block">
                <input type="submit" value="<?php _e( 'Save Settings', 'elgreco' ); ?>" class="btn btn-green">
                <div class="btn btn-blue get_default"><?php _e( 'Default', 'elgreco' ); ?></div>
            </div>
        </div>
    </div>
</form>