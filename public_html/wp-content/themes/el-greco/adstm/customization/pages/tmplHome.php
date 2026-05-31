<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$btn = 	$tmpl->renderItems();

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-add', 'name' =>'add', 'value' => __( 'Add', 'elgreco' ) ] );
$btnAdd = $tmpl->renderItems();

$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Homepage slider', 'elgreco' ), 'name' => 'tp_home_slider_enable' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Use full-width slider', 'elgreco' ), 'name' => 'tp_home_slider_full' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Auto-rotate slides', 'elgreco' ), 'name' => 'tp_home_slider_rotating' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable autorotation on mobile', 'elgreco' ), 'name' => 'tp_home_slider_rotating_mob' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Change slides every', 'elgreco'), 'help' =>__('Auto-rotation time in seconds', 'elgreco') , 'name' => 'tp_home_slider_rotating_time' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Button color', 'elgreco' ), 'name' => 'tp_home_buttons_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Button color (hover)', 'elgreco' ), 'name' => 'tp_home_buttons_color_hover' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Button text color', 'elgreco' ), 'name' => 'tp_home_buttons_text_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Button text color (hover)', 'elgreco' ), 'name' => 'tp_home_buttons_text_color_hover' ] );

$tmpl->addItem( 'colorpicker', [ 'label' => __( "'View video' button color", 'elgreco' ), 'name' => 'tp_home_video_btn_color' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( "'View video' button color (hover)", 'elgreco' ), 'name' => 'tp_home_video_btn_color_hover' ] );

$tmpl->addItem( 'text', [ 'label' => __( 'YouTube Video ID (first banner button)', 'elgreco'), 'help' =>__('YouTube Video opens in a lightbox', 'elgreco') , 'name' => 'id_video_youtube_home' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Text font size (Desktop)', 'elgreco'), 'name' => 'slider_home_fs_desk' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Text font size (Mobile)', 'elgreco'), 'name' => 'slider_home_fs_mob' ] );

$tmpl->addItem( 'select', [ 'label' => __( 'Choose slider font', 'elgreco' ), 'name' => 'add_fonts_slider3' ] );

//$tmpl->addItem( 'select', array( 'label' => __( 'Text position (Desktop)', 'elgreco' ), 'name' => 'sl_home_position'));

$inVideo = 	$tmpl->renderItems();

$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( '(recommended size: 1920*570px)', 'elgreco' ), 'crop_name' => 'slider_home{{@index}}', 'name' => 'slider_home[{{@index}}][img]', 'value' =>'{{img}}', 'width' => 1920, 'height' => 570 ] );
$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'mobile (recommended size: 500*500px)', 'elgreco' ), 'crop_name' => 'slider_home{{@index}}_adap', 'name' => 'slider_home[{{@index}}][img_adap]', 'value' =>'{{img_adap}}', 'width' => 500, 'height' => 500 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'text', 'elgreco' ), 'name' => 'slider_home[{{@index}}][text]', 'value' =>'{{text}}' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Text position (Desktop)', 'elgreco' ).' #{{math @index "+" 1}} ', 'name' => 'slider_home[{{@index}}][home_position]', 'value' =>'{{home_position}}', 'values' => "../home_position_val" ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Text position (Mobile)', 'elgreco' ).' #{{math @index "+" 1}} ', 'name' => 'slider_home[{{@index}}][home_position_mob]', 'value' =>'{{home_position_mob}}', 'values' => "../home_position_val_mob" ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'text color', 'elgreco' ), 'name' => 'slider_home[{{@index}}][text_color]', 'value' =>'{{text_color}}' ] );
$tmpl->addItem( 'switcher', [ 'label' => __( 'Show button', 'elgreco' ), 'name' => 'slider_home[{{@index}}][shop_now_enabled]' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'button text', 'elgreco' ), 'name' => 'slider_home[{{@index}}][button_text]', 'value' =>'{{button_text}}' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'link', 'elgreco' ), 'name' => 'slider_home[{{@index}}][shop_now_link]', 'value' =>'{{shop_now_link}}' ] );


$tmpl->addItem( 'button', [ 'class' =>'btn btn-blue ads-no js-adstm-delete', 'name' =>'delete', 'value' => __( 'Delete', 'elgreco' ) ] );

$template = sprintf(
    '%3$s {{#each slider_home}}
        <div class="panel panel-success">
            <div class="panel-body">
            %1$s
            </div>
	    </div>
	{{/each}}%2$s',
    $tmpl->renderItems(),
    $btnAdd,
    $inVideo
);

$tmpl->template('ads-slider',$template);


$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Most popular categories', 'elgreco' ), 'name' => 'tp_most_popular_enable' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Most popular categories', 'elgreco'), 'name' => 'tp_most_popular_heading' ] );
$mostpop = 	$tmpl->renderItems();


$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( '(recommended size: 400*200px)', 'elgreco' ), 'crop_name' => 'most_popular_items{{@index}}', 'name' => 'most_popular_items[{{@index}}][image]', 'value' =>'{{image}}', 'width' => 380, 'height' => 203 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'text', 'elgreco' ), 'name' => 'most_popular_items[{{@index}}][name]', 'value' =>'{{name}}' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'description', 'elgreco' ), 'name' => 'most_popular_items[{{@index}}][desc]', 'value' =>'{{desc}}' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'overlay color', 'elgreco' ), 'name' => 'most_popular_items[{{@index}}][bg_color]', 'value' =>'{{bg_color}}' ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Banner', 'elgreco' ).' #{{math @index "+" 1}} '.__( 'link', 'elgreco' ), 'name' => 'most_popular_items[{{@index}}][link]', 'value' =>'{{link}}' ] );
$tmpl->addItem( 'button', [ 'class' =>'btn btn-blue ads-no js-adstm-delete', 'name' =>'delete', 'value' => __( 'Delete', 'elgreco' ) ] );

$template = sprintf(
    '%3$s {{#each most_popular_items}}
        <div class="panel panel-success">
            <div class="panel-body">
            %1$s
            </div>
	    </div>
	{{/each}}%2$s',
    $tmpl->renderItems(),
    $btnAdd,
    $mostpop
);

$tmpl->template('ads-mostpopular',$template);



$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable testimonials', 'elgreco'), 'name' => 'testimonials_enabled'));
$tmpl->addItem( 'switcher', array( 'label' => __( 'Auto-rotate testimonials', 'elgreco'), 'name' => 'testimonials_rotating'));
$tmpl->addItem( 'text', array( 'label' => __( 'Change testimonials every', 'elgreco'), 'help'=>__('Auto-rotation time in seconds', 'elgreco') , 'name' => 'testimonials_rotating_time'));
$tmpl->addItem( 'text', [ 'label' => __( 'Testimonials block title', 'elgreco'), 'name' => 'testimonials_title' ] );
$rotation = $tmpl->renderItems();

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Review photo', 'elgreco' ).' #{{math @index "+" 1}} '.__( '(recommended size: 1000*500px)', 'elgreco'), 'crop_name'=> 'testimonials{{@index}}', 'name' => 'testimonials[{{@index}}][image]','value'=>'{{image}}', 'width'=> 1000, 'height'=> 500));
$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Customer photo', 'elgreco' ).' #{{math @index "+" 1}} '.__( '(recommended size: 180*180px)', 'elgreco'), 'crop_name'=> 'testimonials{{@index}}_author', 'name' => 'testimonials[{{@index}}][image_man]','value'=>'{{image_man}}', 'width'=> 90, 'height'=> 90));
$tmpl->addItem( 'text', array( 'label' => __( 'Customer name', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'testimonials[{{@index}}][name]','value'=>'{{name}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Text', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'testimonials[{{@index}}][text]','value'=>'{{text}}'));
$tmpl->addItem( 'select', array( 'label' => __( 'Stars', 'elgreco' ).' #{{math @index "+" 1}}', 'name' => 'testimonials[{{@index}}][stars]', 'value'=>'{{stars}}', 'values'=>'../values_stars'));
$tmpl->addItem( 'button', array( 'class'=>'btn btn-blue ads-no js-adstm-delete','name'=>'delete', 'value' => __( 'Delete', 'elgreco') ) );

$template = sprintf(
    '%3$s{{#each testimonials}}
	<div class="panel panel-success">
	<div class="panel-body">    
	%1$s 
	</div> 
	</div>
	{{/each}}%2$s',
    $tmpl->renderItems(),
    $btnAdd,
    $rotation
);

$tmpl->template('ads-testimonials',$template);



$tmpl->addItem( 'editor', [ 'help' => __( 'Add an article to your Homepage. Recommended content length: 300-500 words.' ), 'name' => 'tp_home_article' ] );
$tmpl->addItem( 'switcher', array( 'label' => __( 'Show \'Read more\' link on mobile', 'elgreco'), 'name' => 'tp_home_article_more'));

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-article',$tmpl->renderItems());










$tmpl->addItem( 'switcher', [ 'label' => __( 'Add underlay to product background', 'elgreco' ), 'name' => 'home_underlay', 'value' =>1 ] );



$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-productblocks',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Featured products', 'elgreco' ), 'name' => 'home_featured_ones', 'value' =>1 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Featured products', 'elgreco'), 'name' => 'home_featured_title' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Featured product background color', 'elgreco' ), 'name' => 'home_bgr_featured' ] );
$tmpl->addItem( 'product', [ 'name' => 'home_featured_list' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-productblocks-featured',$tmpl->renderItems());


$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Best deals', 'elgreco' ), 'name' => 'home_top_deals', 'value' =>1 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Best deals', 'elgreco'), 'name' => 'home_top_deals_title' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Number of products shown in Best deals', 'elgreco' ), 'name' => 'home_deals' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Best deals background color', 'elgreco' ), 'name' => 'home_bgr_deals' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-productblocks-deals',$tmpl->renderItems());







$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Just arrived', 'elgreco' ), 'name' => 'home_new_in', 'value' =>1 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Just arrived', 'elgreco'), 'name' => 'home_new_in_title' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Number of products shown in Just arrived', 'elgreco' ), 'name' => 'home_newin' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Just arrived background color', 'elgreco' ), 'name' => 'home_bgr_arrived' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-productblocks-newin',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Trending now', 'elgreco' ), 'name' => 'home_most_liked', 'value' =>1 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Trending now', 'elgreco'), 'name' => 'home_most_liked_title' ] );
$tmpl->addItem( 'select', [ 'label' => __( 'Number of products shown in Trending now', 'elgreco' ), 'name' => 'home_liked' ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( 'Trending now background color', 'elgreco' ), 'name' => 'home_bgr_trending' ] );

$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-productblocks-liked',$tmpl->renderItems());



$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Blog', 'elgreco' ), 'name' => 'home_blog_enable', 'value' =>1 ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-blog',$tmpl->renderItems());

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show H1 tag on', 'elgreco' ), 'name' => 'home_h1_visible', 'value' =>1 , 'help' => __( 'H1 tag will be displayed under your Homepage slider. When hidden H1 will still be visible to search engines.', 'elgreco' )] );
$tmpl->addItem( 'text', [ 'label' => __( 'Homepage H1 tag', 'elgreco' ), 'name' => 'home_h1', 'help' => __( 'H1 tag acts as the title of your Homepage that helps search engines and your visitors understand what this page is about', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'elgreco' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'elgreco' ) ] );
$tmpl->template('ads-homeh1',$tmpl->renderItems());



?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php

                $tmpl->renderPanel( [
                    'panel_title'   => __('H1 Heading Tag', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-homeh1"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Homepage Slider', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-slider"></div>'
                ] );
                $tmpl->renderPanel( [
                    'panel_title'   => __('Most Popular Categories', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-mostpopular"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Product Settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-productblocks"></div>'
                ] );



                $tmpl->renderPanel( [
                    'panel_title'   => __('Featured Products', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-productblocks-featured"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Best Deals', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-productblocks-deals"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Just Arrived', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-productblocks-newin"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Trending Now', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-productblocks-liked"></div>'
                ] );

                $tmpl->renderPanel( array(
                    'panel_title'   => __('Testimonials', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-testimonials"></div>'
                ) );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Blog Settings', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-blog"></div>'
                ] );

                $tmpl->renderPanel( [
                    'panel_title'   => __('Article', 'elgreco'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-article"></div>'
                ] );



				?>

                <button form="custom_form" class="btn btn-green btn-save no-ads" name="save"><?php _e( 'Save All Settings', 'elgreco' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'elgreco' ) ?></button>
			</form>

		</div>
	</div>
</div>