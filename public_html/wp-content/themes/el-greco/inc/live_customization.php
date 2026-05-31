<?php
if( !current_user_can( 'manage_options' ) ) {
    wp_redirect('wp-login.php?redirect_to=live_customization');
}


if(!isset($_REQUEST['nolive'])){
    $template_dir = get_template_directory_uri();
    ?><!doctype html>
    <html lang="en-US" class="no-js" xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="shortcut icon" href="/wp-content/themes/frida/favicon.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
        <title>Live Customization</title>
        <meta name="description" content="Live Customization"/>
        <meta name="keywords" content=""/>
        <meta property="og:title" content="Live Customization" />
        <meta property="og:description" content="Live Customization" />
        <meta property="og:type" content="product" />
        <link rel='dns-prefetch' href='//s.w.org' />
        <meta name="generator" content="WordPress 5.6.4" />
        <link href="<?php echo $template_dir; ?>/assets/css/customization/alids-main.css" rel="stylesheet">
        <link href="<?php echo $template_dir; ?>/assets/css/customization/spectrum.css" rel="stylesheet">
        <link href="<?php echo $template_dir; ?>/assets/css/customization/cropper.css" rel="stylesheet">
        <link href="<?php echo $template_dir; ?>/assets/css/customization/style.css" rel="stylesheet">
        <link href="<?php echo $template_dir; ?>/assets/css/customization/bootstrap.css" rel="stylesheet">


    </head>
    <body class="<?php
    if(defined('SLV_PATH')){
        echo 'is_slv';
    }
        ?>">

    <?php
    $theme               = wp_get_theme();
    $theme_name = $theme->get( 'Name' );

    $field_options = 'cz_'.$theme_name;
    $data = get_option( $field_options );

    $options = live_cstm_get_defaults();

    if(defined( 'ADS_PATH' )){
        include ADS_PATH.'includes/live/settings_template.php';
    }elseif(defined( 'SLV_PATH' )){
        include SLV_PATH.'includes/live/settings_template.php';
    }



    ?>

    <script type="text/x-handlebars-template" id="cb_checkbox">
        <div class="glide_check">
            <input type="hidden" name="{{fname}}" value="0"/>
            <input type="checkbox" name="{{fname}}" id="{{var}}-{{key}}" {{#if value}} checked="checked" {{/if}} value="1"/>
            <label for="{{var}}-{{key}}">{{name}}</label>
            <span class="form-tip">{{under_text}}</span>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_image_crop">
        <div>
            <div class="field-group uploadImg-box" data-width="{{width}}" data-height="{{height}}">
                <label for="{{var}}-{{key}}">{{name}}</label>
                <div class="field-group image-cropper-container content-group active">
                    <img src="{{img}}" alt="" class="cropper preview-upload" />
                </div>
                <div class="form-tip">{{tip}}</div>
                <div class="field-group button_flex">
                    <button type="button" class="btn btn-green upload_file"><i class="cb_i_upload"></i><span class="hidden-xs">Upload</span></button>
                    <button type="button" class="btn btn-default remove_file"><i class="cb_i_cross"></i><span class="hidden-xs">Remove</span></button>
                    <button type="button" class="btn btn-blue crop_file" style="display: none;"><i class="cb_i_crop"></i><span class="hidden-xs">Crop</span></button>
                </div>
                <input type="hidden" class="file_url form-control" id="{{var}}-{{key}}" data-crop_name="{{var}}-crop" name="{{fname}}" value="{{img}}" />
            </div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_image">
        <div>
            <div class="field-group uploadImg-box" data-width="" data-height="">
                <label for="{{var}}-{{key}}">{{name}}</label>
                <div class="field-group image-cropper-container content-group active">
                    <img src="{{img}}" alt="" class="preview-upload" />
                </div>
                <div class="form-tip">{{tip}}</div>
                <div class="field-group button_flex">
                    <button type="button" class="btn btn-green upload_file"><i class="cb_i_upload"></i><span class="hidden-xs">Upload</span></button>
                    <button type="button" class="btn btn-default remove_file"><i class="cb_i_cross"></i><span class="hidden-xs">Remove</span></button>
                    <button type="button" class="btn btn-blue crop_file" style="display: none;"><i class="cb_i_crop"></i><span class="hidden-xs">Crop</span></button>
                </div>
                <input type="hidden" class="file_url form-control" id="{{var}}-{{key}}" data-crop_name="{{var}}-crop" name="{{fname}}" value="{{img}}" />
            </div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_input">
        <div>
            <label for="{{var}}-{{key}}">{{name}} {{#if tooltip}}<span class="css_tooltip {{tooltip}}">?</span>{{/if}}</label>
            <input type="text" name="{{fname}}" id="{{var}}-{{key}}" value="{{value}}" placeholder="{{placeholder}}" />
            <span class="form-tip">{{under_text}}</span>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_textarea">
        <div>
            <label for="{{var}}-{{key}}">{{name}}</label>
            <textarea type="text" name="{{fname}}" id="{{var}}-{{key}}">{{value}}</textarea>
            <div class="form-tip">{{tip}}</div>
            <span></span>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_textarea_big">
        <div>
            <label for="{{var}}-{{key}}">{{name}}</label>
            <textarea class="textarea_big editor" type="text" name="{{fname}}" id="{{var}}-{{key}}">{{value}}</textarea>
            <span></span>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_separate">
        <div class="cb_separate"><hr><h4>{{name}}</h4></div>
    </script>

    <script type="text/x-handlebars-template" id="cb_select">
        <div class="select_block" {{actor}} >
        <label>{{name}}</label>
        <select name="{{fname}}" id="{{var}}">
            {{#each set_data}}
            <option value="{{value}}" {{#ifEquals  value ../value}} selected {{/ifEquals}} >{{title}}</option>
            {{/each}}
        </select>

        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_color_picker">
        <div class="colorpicker_cont">
            <input type="text" name="{{fname}}"
                   {{#if is_single}}
                   data-name="{{var}}_key{{key}}"
                   {{else}}
                   data-name="{{var}}"
                   {{/if}}
                    id="{{var}}-{{key}}" value="{{value}}" class="colorpicker"/>
            <label for="{{var}}-{{key}}">{{name}}</label>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_product">
        <div>
            <h4><?php _e('Product','elgreco'); ?></h4>
            <div data-adstm_action="general" data-adstm_template="#ads-choose" data-value="{{value}}" data-name="{{fname}}" data-new="<?php echo _e('New product','elgreco') ;?>"></div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_remove_block">
        <div class="remove_block">
            <div class="btn btn-default remove_item" data-field="{{field}}" data-key="{{key}}"><?php echo _e('Delete','elgreco') ;?></div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_save_block">
        <div class="save_item_block">
            <div class="btn btn-green save_item" data-field="{{field}}" data-key="{{key}}"><?php echo _e('Save Featured Product Item','elgreco') ;?></div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_remove_block_featured">
        <div class="remove_block">
            <div class="btn btn-danger open_sdf"><?php echo _e('Delete Item','elgreco') ;?></div>
            <div class="sure_delete_fixed">
                <div class="sure_delete_fixed_inner">
                    <p><?php _e( 'Are you sure to delete this item? It won\'t be restored', 'elgreco' ); ?></p>
                    <div class="sdf_flex">
                        <div class="btn btn-danger remove_item_featured" data-field="{{field}}" data-key="{{key}}"><?php _e( 'Sure, Delete Item', 'elgreco' ); ?></div>
                        <div class="btn btn-green close_sdf"><?php _e( 'Cancel', 'elgreco' ); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="cb_save_remove_block">
        <div class="service_flex">
            <div class="save_item_block">
                <div class="btn btn-green save_item" data-field="{{field}}" data-key="{{key}}"><?php echo _e('Save Featured Product Item','elgreco') ;?></div>
            </div>
            <div class="remove_block">
                <div class="btn btn-danger open_sdf"><?php echo _e('Delete Item','elgreco') ;?></div>
                <div class="sure_delete_fixed">
                    <div class="sure_delete_fixed_inner">
                        <p><?php _e( 'Are you sure to delete this item? It won\'t be restored', 'elgreco' ); ?></p>
                        <div class="sdf_flex">
                            <div class="btn btn-danger remove_item_featured" data-field="{{field}}" data-key="{{key}}"><?php _e( 'Sure, Delete Item', 'elgreco' ); ?></div>
                            <div class="btn btn-green close_sdf"><?php _e( 'Cancel', 'elgreco' ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>




    <style>
        .flex_btns{display:flex;}
        .mode_btn{padding:2px;border:2px solid transparent;margin:0 10px 0 0;}
        .mode_btn_1.active{border-color:#1daeea;}
        .mode_btn_2.active{border-color:#46ab88;}
    </style>







    <div class="custom_sidebar active">
        <span class="close_live_main"></span>
        <div class="custom_sidebar_head">
            <div class="csh_small"><?php _e('You are customizing','elgreco'); ?></div>
            <div class="csh_big"><?php echo wp_get_theme(); ?></div>
        </div>
        <div class="custom_sidebar_head_inner">
            <span class="csh_back"></span>
            <div class="csh_small"><?php _e('Сustomizing','elgreco'); ?></div>
            <div class="csh_big"></div>
        </div>
        <div class="custom_sidebar_item " data-template="tmplDemo">
            <h3><?php echo __( 'Demo content', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplGeneral">
            <h3><?php echo __( 'General', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap">

<!--                <form action="live_cstm_save" class="live_cstm_save">-->
<!--                    <div class="fields_block">-->
<!--                        <h4>--><?php //_e( 'Right-to-Left Settings', 'elgreco' ); ?><!--</h4>-->
<!--                        <div class="fields_cont">-->
<!--                            --><?php
//                            cb_checkbox(__( 'Enable RTL layout', 'elgreco' ),'tp_do_rtl','',$data);
//                            ?>
<!--                            <div class="save_block">-->
<!--                                <input type="submit" value="--><?php //_e( 'Save Settings', 'elgreco' ); ?><!--" class="btn btn-green">-->
<!--                                <div class="btn btn-blue get_default">--><?php //_e( 'Default', 'elgreco' ); ?><!--</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
            </div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplHead">
            <h3><?php echo __( 'Head', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplHeader">
            <h3><?php echo __( 'Header', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>


        <div class="custom_sidebar_item " data-template="tmplHome">
            <h3><?php echo __( 'Home', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item" data-template="tmplSingle">
            <h3><?php echo __( 'Single Product Page', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item" data-template="tmplBoosters">
            <h3><?php echo __( 'Conversion Boosters', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplSocial">
            <h3><?php echo __( 'Social Media', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplSubscription">
            <h3><?php echo __( 'Subscription Form', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplAbout">
            <h3><?php echo __( 'About Us', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplContact">
            <h3><?php echo __( 'Contact Us', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmpl404">
            <h3><?php echo __( '404 Page', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <div class="custom_sidebar_item " data-template="tmplFooter">
            <h3><?php echo __( 'Footer', 'elgreco' ); ?></h3>
            <span class="csh_go"></span>
            <div class="wrap"></div>
        </div>

        <?php
        if(defined( 'ADS_PATH' )){
            include( ADS_PATH . 'includes/live/settings_tabs.php' );
        }elseif(defined( 'SLV_PATH' )){
            include( SLV_PATH . 'includes/live/settings_tabs.php' );
        }
         ?>




    </div>
    <div class="live_cstm_message"></div>


    <script type="text/x-handlebars-template" id="ads-choose">
        <div class="js-ads-select-product ads-select-product form-group">
            <input type="hidden" class="ads-field js-ads-select-product-params" name="{{name}}" value="{{re_goods_list}}" />
            <div class="ads-select-product-list product-list"></div>
            <div class="ads-select-product-btn-cont">
                <buttom class="ads-button btn btn-green ads-no js-ads-select-product-btn"><?php _e( 'Add Product', 'splttest' ) ?></buttom>
            </div>
        </div>
    </script>

    <script type="text/x-handlebars-template" id="ads-tmpl-select-product-box">{{#each products}}
        <div class="table-item product-item">
            <div class="pr-item-name">
                <span class="pr-item-name-text"></span>
            </div>
            <input type="hidden" name="item_id" value="{{item_id}}">
            <div class=""><a href="{{link}}" target="_blank"><img src="{{image}}" class="img-responsive"/></a></div>
            <div class="flex_max_width">
                <h4><a class="product_name" href="{{link}}" target="_blank">{{title}}</a></h4>
                <div class="price-item">
                    <strong>{{salePrice}}</strong>
                    {{#if discount}}
                    <s>{{price}}</s>
                    <br> <span class="discount">(-{{discount}}&#37;)</span>
                    {{/if}}
                </div>
            </div>
            <div class="delete_cont">
                <button class="btn btn-default js-product-select-delete ads-no"  name="delete">
                    <span class="red_font_trash"/>
                </button>
            </div>
        </div>
        {{/each}}</script>

    <script type="text/x-handlebars-template" id="ads-tmpl-select-product-box-min">
        <div class="ali_red_minis_list">
            {{#each products}}
            <div class="ali_red_minis_one">
                <img src="{{image}}" class="img-responsive"/>
            </div>
            {{/each}}</div>
    </script>

    <?php
    //pr($data);




    do_action('new_live_admin');
    wp_footer();




    ?>

    <script type="text/javascript">
        jQuery(function($){
            $(document).ready(function(){

            });
        });
    </script>

    </body>
    </html>
    <?php

}