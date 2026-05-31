<?php
$tmpl = new ads\adsTemplate();

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$btn = 	$tmpl->renderItems();

$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-add','name'=>'add', 'value' => __( 'Add', 'rap' ) ) );
$btnAdd = $tmpl->renderItems();

$tmpl->addItem( 'switcher', [ 'label' => __( 'Enable Homepage slider', 'rap' ), 'name' => 'tp_home_slider_enable' ] );
$tmpl->addItem( 'switcher', array( 'label' => __( 'Auto-rotate slides', 'rap' ), 'name' => 'tp_home_slider_rotating'));
$tmpl->addItem( 'text', array( 'label' => __( 'Change slides every', 'rap'), 'help'=>__('Slider rotating time in seconds', 'rap') , 'name' => 'tp_home_slider_rotating_time'));
$tmpl->addItem( 'text', array( 'label' => __( 'YouTube Video ID', 'rap'), 'help'=>__('Customize YouTube Video ID', 'rap') , 'name' => 'id_video_youtube_home'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Buttons colors', 'rap' ), 'name' => 'tp_home_buttons_color'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Buttons colors (hover)', 'rap' ), 'name' => 'tp_home_buttons_color_hover'));

$tmpl->addItem( 'select', array( 'label' => __( 'Text position', 'rap' ), 'name' => 'slider_home_position'));
$tmpl->addItem( 'text', array( 'label' => __( 'Font size (Desktop)', 'rap'), 'name' => 'slider_home_fs_desk'));
$tmpl->addItem( 'text', array( 'label' => __( 'Font size (Mobile)', 'rap'), 'name' => 'slider_home_fs_mob'));



$inVideo = 	$tmpl->renderItems();

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Banner #{{math @index "+" 1}} (recommended size: 1920*570px)', 'rap' ), 'crop_name'=> 'slider_home{{@index}}', 'name' => 'slider_home[{{@index}}][img]','value'=>'{{img}}', 'width'=> 1920, 'height'=> 570));
$tmpl->addItem( 'uploadImgCrop', [ 'label' => __( 'Banner #{{math @index "+" 1}} mobile (recommended size: 600*600px)', 'rap' ), 'crop_name' => 'slider_home{{@index}}_adap', 'name' => 'slider_home[{{@index}}][img_adap]', 'value' =>'{{img_adap}}', 'width' => 600, 'height' => 600 ] );
//$tmpl->addItem( 'text', array( 'label' => __( 'Head', 'rap' ), 'name' => 'slider_home[{{@index}}][head]','value'=>'{{head}}'));
//$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Head color', 'rap' ), 'name' => 'slider_home[{{@index}}][head_color]','value'=>'{{head_color}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Banner #{{math @index "+" 1}} text', 'rap' ), 'name' => 'slider_home[{{@index}}][text]','value'=>'{{text}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Banner #{{math @index "+" 1}} text color', 'rap' ), 'name' => 'slider_home[{{@index}}][text_color]','value'=>'{{text_color}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Banner #{{math @index "+" 1}} text overlay color', 'rap' ), 'name' => 'slider_home[{{@index}}][background]','value'=>'{{background}}'));
$tmpl->addItem( 'switcher', array( 'label' => __( 'Show button', 'rap' ), 'name' => 'slider_home[{{@index}}][shop_now_enabled]'));
$tmpl->addItem( 'text', array( 'label' => __( 'Banner #{{math @index "+" 1}} button text', 'rap' ), 'name' => 'slider_home[{{@index}}][button_text]','value'=>'{{button_text}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Banner #{{math @index "+" 1}} link', 'rap' ), 'name' => 'slider_home[{{@index}}][shop_now_link]','value'=>'{{shop_now_link}}'));
$tmpl->addItem( 'button', array( 'class'=>'btn btn-blue ads-no js-adstm-delete','name'=>'delete', 'value' => __( 'Delete', 'rap' ) ) );

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


$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable most popular categories', 'rap' ), 'name' => 'most_popular_enable'));

$tmpl->addItem( 'text', array( 'label' => __( 'Title', 'rap' ), 'name' => 'most_popular_head'));
$tmpl->addItem( 'switcher', array( 'label' => __( 'Always display image', 'rap' ), 'name' => 'most_popular_fix'));

$most_popular_top = $tmpl->renderItems();

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Category #{{math @index "+" 1}} image (recommended size: 380*210px)', 'rap' ), 'crop_name'=> 'most_popular_list{{@index}}', 'name' => 'most_popular_list[{{@index}}][image]','value'=>'{{image}}', 'width'=> 380, 'height'=> 210));
$tmpl->addItem( 'text', array( 'label' => __( 'Category #{{math @index "+" 1}} name', 'rap' ), 'name' => 'most_popular_list[{{@index}}][name]','value'=>'{{name}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Category #{{math @index "+" 1}} text color', 'rap' ), 'name' => 'most_popular_list[{{@index}}][color]','value'=>'{{color}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Category #{{math @index "+" 1}} image overlay color', 'rap' ), 'name' => 'most_popular_list[{{@index}}][bg_color]','value'=>'{{bg_color}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Category #{{math @index "+" 1}} link', 'rap' ), 'name' => 'most_popular_list[{{@index}}][link]','value'=>'{{link}}'));
$tmpl->addItem( 'button', array( 'class'=>'btn btn-blue ads-no js-adstm-delete','name'=>'delete', 'value' => __( 'Delete', 'rap' ) ) );

$template = sprintf(
	'%3$s{{#each most_popular_list}}
	<div class="panel panel-success">
	<div class="panel-body">    
	%1$s 
	</div> 
	</div>
	{{/each}}%2$s',
	$tmpl->renderItems(),
	$btnAdd,
	$most_popular_top
);

$tmpl->template('ads-most-popular',$template);

$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable super sale banner', 'rap' ), 'name' => 'tp_countdown'));
$tmpl->addItem( 'text', array( 'help' => __( 'Customize super sale banner text.', 'rap' ), 'name' => 'tp_countdown_text'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Super sale countdown timer color', 'rap' ), 'name' => 'tp_color_countdown'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Super sale banner text color', 'rap' ), 'name' => 'tp_color_text_countdown'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Super sale banner discount color', 'rap' ), 'name' => 'tp_color_text_countdown_sale'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-counter',$tmpl->renderItems());


$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable testimonials', 'rap' ), 'name' => 'testimonials_enabled'));
$tmpl->addItem( 'switcher', array( 'label' => __( 'Rotation', 'rap' ), 'name' => 'testimonials_rotating'));
$tmpl->addItem( 'text', array( 'label' => __( 'Rotating time', 'rap'), 'help'=>__('Rotating time', 'rap') , 'name' => 'testimonials_rotating_time'));
$rotation = $tmpl->renderItems();

$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Customer photo #{{math @index "+" 1}} (recommended size: 72*72px)', 'rap' ), 'crop_name'=> 'testimonials{{@index}}', 'name' => 'testimonials[{{@index}}][image]','value'=>'{{image}}', 'width'=> 72, 'height'=> 72));
$tmpl->addItem( 'text', array( 'label' => __( 'Customer name and country #{{math @index "+" 1}}', 'rap' ), 'name' => 'testimonials[{{@index}}][country]','value'=>'{{country}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Text #{{math @index "+" 1}}', 'rap' ), 'name' => 'testimonials[{{@index}}][text]','value'=>'{{text}}'));
$tmpl->addItem( 'select', array( 'label' => __( 'Stars #{{math @index "+" 1}}', 'rap' ), 'name' => 'testimonials[{{@index}}][stars]', 'value'=>'{{stars}}', 'values'=>'../values_stars'));
$tmpl->addItem( 'button', array( 'class'=>'btn btn-blue ads-no js-adstm-delete','name'=>'delete', 'value' => __( 'Delete', 'rap' ) ) );

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

/*features*/
$tmpl->addItem( 'hidden', array( 'name' => 'tp_show_discount', 'value'=>' ' ) );
$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable features', 'rap' ), 'name' => 'features_enable', 'value'=>1));

$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Features titles color', 'rap' ), 'name' => 'features_title_color', 'value'=>'{{features_title_color}}'));
$tmpl->addItem( 'colorpicker', array( 'label' => __( 'Features text color', 'rap' ), 'name' => 'features_text_color', 'value'=>'{{features_text_color}}'));

$t = $tmpl->renderItems();

$tmpl->addItem( 'text', array( 'label' => __( 'Title', 'rap' ), 'name' => 'features[item][{{@index}}][head]', 'value'=>'{{head}}'));
$tmpl->addItem( 'text', array( 'label' => __( 'Description', 'rap' ), 'name' => 'features[item][{{@index}}][text]', 'value'=>'{{text}}'));

$template = sprintf(
	'%2$s{{#each features.item}}
	<div class="panel panel-success">
	<div class="panel-body">    
	%1$s
	</div> 
	</div> 
	{{/each}}%3$s',
	$tmpl->renderItems(),
    $t,
	$btn
);

$tmpl->template('ads-features',$template);

$tmpl->addItem( 'editor', array( 'help'=> __( 'Add 300-500 words article to your home page.' ), 'name' => 'tp_home_article'));
//$tmpl->addItem( 'uploadImgCrop', array( 'label' => __( 'Background', 'rap' ), 'name' => 'tp_home_article_bg'));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-article',$tmpl->renderItems());


$tmpl->addItem( 'switcher', array( 'label' => __( 'Enable blog', 'rap' ), 'name' => 'home_blog_enable', 'value'=>1));
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-green ads-no js-adstm-save','name'=>'save', 'value' => __( 'Save Settings', 'rap' )) );
$tmpl->addItem( 'buttons', array( 'class'=>'btn btn-blue ads-no js-adstm-save','name'=>'default', 'value' => __( 'Default', 'rap' ) ) );
$tmpl->template('ads-blog',$tmpl->renderItems());


$tmpl->addItem( 'switcher', [ 'label' => __( 'Show Featured products', 'rap' ), 'name' => 'home_featured_ones', 'value' =>1 ] );
$tmpl->addItem( 'text', [ 'label' => __( 'Featured products', 'rap'), 'name' => 'home_featured_title' ] );
$tmpl->addItem( 'product', [ 'name' => 'home_featured_list','count' => 8 ] );

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show \'Top selling products\' tab', 'rap' ), 'name' => 'tp_top_selling' ] );
$tmpl->addItem( 'text', [ 'label' => __( '\'Top selling products\' tab label ', 'rap' ), 'name' => 'tp_top_selling_label' ] );

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show \'Best deals\' tab', 'rap' ), 'name' => 'tp_best_deals' ] );
$tmpl->addItem( 'text', [ 'label' => __( '\'Best deals\' tab label', 'rap' ), 'name' => 'tp_best_deals_label' ] );

$tmpl->addItem( 'switcher', [ 'label' => __( 'Show \'New arrivals\' tab', 'rap' ), 'name' => 'tp_new_arrivals' ] );
$tmpl->addItem( 'text', [ 'label' => __( '\'New arrivals\' tab label ', 'rap' ), 'name' => 'tp_new_arrivals_label' ] );


$tmpl->addItem( 'switcher', [ 'label' => __( 'Show image outline', 'rap' ), 'name' => 'home_top_deals_outline', 'value' =>0 ] );
$tmpl->addItem( 'colorpicker', [ 'label' => __( '\'Best deals\' background color', 'rap' ), 'name' => 'home_bgr_deals' ] );



$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-green ads-no js-adstm-save', 'name' =>'save', 'value' => __( 'Save Settings', 'rap' ) ] );
$tmpl->addItem( 'buttons', [ 'class' =>'btn btn-blue ads-no js-adstm-save', 'name' =>'default', 'value' => __( 'Default', 'rap' ) ] );
$tmpl->template('ads-productblocks',$tmpl->renderItems());




?>

<div class="wrap">
	<div class="row">
		<div class="col-md-30">
			<form id="custom_form" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<?php
				$tmpl->renderPanel( array(
					'panel_title'   => __('Slider Settings', 'rap'),
					'panel_class'   => 'success',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-slider"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Most popular categories settings', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-most-popular"></div>'
				) );
                $tmpl->renderPanel( [
                    'panel_title'   => __('Product Settings', 'rap'),
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-productblocks"></div>'
                ] );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Features', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-features"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Testimonials', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-testimonials"></div>'
				) );
				$tmpl->renderPanel( array(
					'panel_title'   => __('Blog', 'rap'),
					'panel_class'   => 'success',
					'panel_description'   =>  '',
					'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-blog"></div>'
				) );

				
                $tmpl->renderPanel( array(
                    'panel_title'   => __('Article', 'rap'),
                    'panel_class'   => 'success',
                    'panel_description'   =>  '',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-article"></div>'
                ) );
				?>

                <button form="custom_form" class="btn btn-save no-ads" name="save"><?php _e( 'Save Settings', 'rap' ) ?></button>
				<button form="custom_form" class="btn btn-default" name="default"><?php _e( 'Default', 'rap' ) ?></button>
			</form>

		</div>
	</div>
</div>