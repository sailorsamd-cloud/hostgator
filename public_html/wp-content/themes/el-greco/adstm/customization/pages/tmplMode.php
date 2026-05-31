<?php
$tmpl = new ads\adsTemplate();

$curr_classic = __('You’re currently on: <b>Classic content</b>', 'elgreco');
$curr_sellvia = __('You’re currently on: <b>Sellvia content</b>', 'elgreco');
$tp_mode = intval(cz('tp_mode'));

$tmpl->addItem( 'custom', [
    'value' =>sprintf('

<style>
.flex_btns{display:flex;}
.mode_btn{padding:2px;border:2px solid transparent;margin:0 10px 0 0;}
.mode_btn_1.active{border-color:#1daeea;}
.mode_btn_2.active{border-color:#46ab88;}
</style>
<div class="form-group">
<p>%3$s</p>
<p>%7$s</p>
<p class="curr_mode">%6$s</p>
<div class="flex_btns">
<span class="mode_btn mode_btn_1 %4$s"><button class="btn btn-blue" name="tp_create" value="true">%1$s</button></span> <span class="mode_btn mode_btn_2 %5$s"><button class="btn btn-green" name="tp_create_sellvia_mode" value="true">%2$s</button></span>
</div>

</div>',
        __('Use Classic Content', 'elgreco'),
        __('Use Sellvia Content', 'elgreco'),
        __("Select what kind of demo content you'd like to start with. If you have Sellvia products in your store, we recommend using the content specifically adapted to Sellvia. To switch to the content developed for AliExpress products, click ‘Use Classic Content’.", 'elgreco'),
        $tp_mode == 1 ? 'active' : '',
        $tp_mode == 2 ? 'active' : '',
        $tp_mode === 1 ? $curr_classic : ($tp_mode === 2 ? $curr_sellvia : ''),
        __('Please note that you need to delete your already existing utility pages (e.g. Payment Methods) before applying new content. ', 'elgreco')
    )
] );



$tmpl->template('ads-modes',$tmpl->renderItems());
?>
<script type="text/javascript">
    jQuery(function($){
        $(document).ready(function(){
            let is_running = 0;
            $('body').on('click','button[name="tp_create"]',function(e){
                e.preventDefault();
                if(!is_running){
                    let data = {
                        'tp_create': true,
                        'action': 'cstm_template_action'
                    };
                    $('.mode_btn_1 button').attr('disabled','disabled');
                    $('.mode_btn_2 button').attr('disabled','disabled');
                    $('.mode_btn button').addClass('grey_ani');

                    is_running = 1;
                    $.ajax({
                        url:ajaxurl,
                        data:data,
                        type:'POST',
                        success:function(data){
                            $('.mode_btn_1 button').removeAttr('disabled');
                            $('.mode_btn_2 button').removeAttr('disabled');
                            $('.mode_btn').removeClass('active');
                            $('.mode_btn_1').addClass('active');
                            $('.mode_btn button').removeClass('grey_ani');
                            $('.curr_mode').html('<?php echo $curr_classic; ?>');
                            window.ADS.notify( 'New demo content applied', 'success' );
                            is_running = 0;

                        }
                    });
                }


                return false;
            });
            $('body').on('click','button[name="tp_create_sellvia_mode"]',function(e){
                e.preventDefault();
                if(!is_running){
                    let data = {
                        'tp_create_sellvia_mode': true,
                        'action': 'cstm_template_action'
                    };
                    $('.mode_btn_1 button').attr('disabled','disabled');
                    $('.mode_btn_2 button').attr('disabled','disabled');
                    $('.mode_btn button').addClass('grey_ani');
                    is_running = 1;
                    $.ajax({
                        url:ajaxurl,
                        data:data,
                        type:'POST',
                        success:function(data){
                            $('.mode_btn_1 button').removeAttr('disabled');
                            $('.mode_btn_2 button').removeAttr('disabled');
                            $('.mode_btn').removeClass('active');
                            $('.mode_btn_2').addClass('active');
                            $('.mode_btn button').removeClass('grey_ani');
                            $('.curr_mode').html('<?php echo $curr_sellvia; ?>');
                            window.ADS.notify( 'New demo content applied', 'success' );
                            is_running = 0;
                        }
                    });
                }

                return false;
            });
        });
    });
</script>
<div class="wrap">
    <div class="row">
        <div class="col-md-30">
            <form id="custom_form" method="POST">
                <?php
                wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
                <?php
                $tmpl->renderPanel( array(
                    'panel_class'   => 'success',
                    'panel_content' => '<div data-adstm_action="general" data-adstm_template="#ads-modes"></div>'
                ) );

                ?>
            </form>

        </div>
    </div>
</div>