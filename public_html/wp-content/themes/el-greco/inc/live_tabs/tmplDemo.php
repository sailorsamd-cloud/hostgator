<?php
$theme               = wp_get_theme();
$theme_name = $theme->get( 'Name' );

$field_options = 'cz_'.$theme_name;
$data = get_option( $field_options );
?><div class="fields_block">
    <div class="fields_cont">
        <?php
        $tp_mode = intval(cz_ar('tp_mode',$data));
        echo sprintf('
<div class="fields_cont">
<p>%3$s</p>
<p>%7$s</p>
<p>%8$s <b class="curr_mode" data-classic="%9$s" data-sellvia="%10$s">%6$s</b></p>
<div class="flex_btns">
<span class="mode_btn mode_btn_1 %4$s"><button class="btn btn-blue" name="tp_create" value="true">%1$s</button></span> <span class="mode_btn mode_btn_2 %5$s"><button class="btn btn-green" name="tp_create_sellvia_mode" value="true">%2$s</button></span>
</div>
</div>',
            __('Use Classic Content', 'elgreco'),
            __('Use Sellvia Content', 'elgreco'),
            __("Select what kind of demo content you'd like to start with. If you have Sellvia products in your store, we recommend using the content specifically adapted to Sellvia. To switch to the content developed for AliExpress products, click ‘Use Classic Content’.", 'elgreco'),
            $tp_mode == 1 ? 'active' : '',
            $tp_mode == 2 ? 'active' : '',
            $tp_mode === 1 ? __('Classic content', 'elgreco') : ($tp_mode === 2 ? __('Sellvia content', 'elgreco') : ''),
            __('Please note that you need to delete your already existing utility pages (e.g. Payment Methods) before applying new content. ', 'elgreco'),
            __('You’re currently on:', 'elgreco'),
            __('Classic content', 'elgreco'),
            __('Sellvia content', 'elgreco')
        );
        ?>
    </div>
</div>