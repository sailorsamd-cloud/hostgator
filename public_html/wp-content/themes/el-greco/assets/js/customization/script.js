jQuery(function($){
    $(document).ready(function(){

        Handlebars.registerHelper('ifEquals', function(arg1, arg2, options) {
            return (arg1 == arg2) ? options.fn(this) : options.inverse(this);
        });


        $('body').append('<iframe src="'+'/#live'+'" id="home_frame" class="fixed_frame" ></iframe>');
        document.getElementById('home_frame').onload= function() {
            $("#home_frame").contents().find("body").removeClass("is_frame").addClass("is_frame_live");
        };

        $('.tab_head').on('click',function() {
            $('.tab_head').removeClass('active');
            $('.adap_tab_head').removeClass('active');
            $(this).addClass('active');
            $('.tab_body').removeClass('show');
            $('.'+$(this).attr('id')).addClass('show').prev().addClass('active');
        });

        $('.adap_tab_head').on('click',function() {
            if($(this).is('.active') && !$(this).is('.adap_inactive')){
                $(this).addClass('adap_inactive');
            }else{
                $('.tab_head').removeClass('active');
                $('.adap_tab_head').removeClass('active');
                $(this).addClass('active').removeClass('adap_inactive');
                $('.tab_body').removeClass('show');
                $('.'+$(this).attr('data-id')).addClass('show');
                $('#'+$(this).attr('data-id')).addClass('active');
            }
        });

        $('.auto_save').on('click',function () {
            $(this).parents('form').submit();
        });


        function do_serialize($el){

            var	serialized = $el.
            find('input[name],select[name],textarea[name]').not('input[type=\'checkbox\']').serialize();

            let che = '';
            $el.find( "input[type='checkbox']" ).each(function ( i,e ) {

                let value = $(this).prop( "checked" ) ? 1 : 0;
                che +='&'+$(this).attr('name')+'='+ value;
            });

            return serialized+che;
        }

        function getFormData($form){
            let unindexed_array = $form.serializeArray();
            let indexed_array = {};

            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }

        $('body').on('click','.open_sdf',function () {
            $(this).next().css('display','flex');

        });

        $('body').on('click','.close_sdf',function () {
            $('.sure_delete_fixed').hide();
        });




        $('body').on('click','.save_item',function () {

            let formdata = $(this).parents('form').serialize();

            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_save_featured',
                'params': formdata,
                'key':$(this).attr('data-key')
            };

            $.ajax({
                url:ajaxurl,
                action:'live_cstm_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);
                }
            });
            return false;
        });

        $('body').on('submit','.live_cstm_save',function () {

            let formdata = $(this).serialize();

            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_save',
                'params': formdata
            };

            $.ajax({
                url:ajaxurl,
                action:'live_cstm_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);
                }
            });
            return false;
        });


        $('body').on('click','.get_default',function () {
            let form = $(this).parents('form');
            let formdata = form.serialize();
            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_default',
                'params': formdata
            };

            $.ajax({
                url:ajaxurl,
                action:'live_cstm_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);
                    datadefs = data

                    $('input[type="text"]',form).each(function(){
                        let that = $(this);
                        let thatname = that.attr('name');

                        if(thatname.indexOf('[')>0){

                            let thatname_arr = thatname.replaceAll(']','').split('[');
                            let new_name;
                            if(thatname_arr[3]){
                                new_name = data.defs[thatname_arr[0]][thatname_arr[1]][thatname_arr[2]][thatname_arr[3]];
                            }else{
                                new_name = data.defs[thatname_arr[0]][thatname_arr[1]][thatname_arr[2]];
                            }

                            that.val(new_name).trigger('keyup');
                            if(that.is('.colorpicker')){
                                that.spectrum("set", new_name);
                            }
                        }else{
                            that.val(data.defs[thatname]).trigger('keyup');
                            if(that.is('.colorpicker')){
                                that.spectrum("set", data.defs[thatname]);
                            }
                        }

                    });

                    $('textarea',form).each(function(){
                        let that = $(this);
                        let thatname = that.attr('name');
                        if(thatname.indexOf('[')>0){
                            let thatname_arr = thatname.replaceAll(']','').split('[');
                            let new_name;
                            if(thatname_arr[3]){
                                new_name = data.defs[thatname_arr[0]][thatname_arr[1]][thatname_arr[2]][thatname_arr[3]];
                            }else{
                                new_name = data.defs[thatname_arr[0]][thatname_arr[1]][thatname_arr[2]];
                            }
                            that.val(new_name).trigger('keyup');
                        }else{
                            that.val(data.defs[thatname]).trigger('keyup');
                        }
                    });

                    $('input[type="checkbox"]',form).each(function(){
                        let that = $(this);
                        if(data.defs[that.attr('name')]){
                            that.prop('checked',true);
                        }else{
                            that.prop('checked',false);
                        }
                    });

                    $('input.file_url',form).each(function(){
                        let that = $(this);
                        let thatname = that.attr('name');
                        if(thatname.indexOf('[')>0){
                            let thatname_arr = thatname.replaceAll(']','').split('[');
                            let new_name;
                            if(thatname_arr[3]){
                                new_name = data.defs[thatname_arr[0]][thatname_arr[1]][thatname_arr[2]][thatname_arr[3]];
                            }else{
                                new_name = data.defs[thatname_arr[0]][thatname_arr[1]][thatname_arr[2]];
                            }
                            that.val(new_name).trigger('change');
                            $('img',that.parent()).attr('src',new_name).parent().show();

                        }else{
                            that.val(data.defs[thatname]).trigger('change');
                            $('img',that.parent()).attr('src',data.defs[that.attr('name')]).parent().show();
                        }




                    });


                }
            });
            return false;
        });


        $('body').on('click','.remove_item',function () {
            if($(this).parents('.elemenu_menu_cont').length){
                let that_key = $(this).parents('.add_list_one').attr('data-key');
                $('.elemenu_one[data-key="'+that_key+'"]',$(this).parents('.elemenu_menu_cont')).replaceWith('');

            }
            let max_key = -1;
            let add_list = $(this).parents('.add_list');

            $(this).parents('.add_list_one').replaceWith('');

            $('.add_list_one',add_list).each(function(){
                if($(this).attr('data-key') > max_key){
                    max_key = $(this).attr('data-key');
                }
            });

            add_list.next().find('.add_item').attr('data-key',max_key)

        });

        $('body').on('click','.remove_item_featured',function () {
            let key_to_delete = 0;
            if($(this).parents('.elemenu_menu_cont').length){
                let that_key = $(this).parents('.add_list_one').attr('data-key');
                $('.elemenu_one[data-key="'+that_key+'"]',$(this).parents('.elemenu_menu_cont')).replaceWith('');
                key_to_delete = that_key;

            }
            let max_key = -1;
            let add_list = $(this).parents('.add_list');

            $(this).parents('.add_list_one').replaceWith('');

            $('.add_list_one',add_list).each(function(){
                if($(this).attr('data-key') > max_key){
                    max_key = $(this).attr('data-key');
                }
            });

            add_list.next().find('.add_item').attr('data-key',max_key);

            $('.elemenu_menu').show();
            $('.menu_back').hide();
            $('.elemenu_menu_cont .add_block').show();

            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_delete_featured',
                'key': key_to_delete
            };

            $.ajax({
                url:ajaxurl,
                action:'live_cstm_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);


                }
            });
            return false;



        });

        $('body').on('click','.add_item',function () {

            let that = $(this).parent();
            let curr_key = parseInt($(this).attr('data-key'))+1;
            let that_field = $(this).attr('data-field');
            let that_isform = $(this).attr('data-isform');

            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_add',
                'field': that_field
            };

            $.ajax({
                url:ajaxurl,
                action:'live_cstm_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    if(that_isform==1){
                        that.prev().append('<form  action="live_cstm_save_featured" class="live_cstm_save_featured add_list_one" data-key="'+curr_key+'"></form>');
                    }else{
                        that.prev().append('<div class="add_list_one" data-key="'+curr_key+'"></div>');
                    }

                    let add_list_one = that.prev().find('.add_list_one[data-key="'+curr_key+'"]');
                    $('i',that.next()).each(function(){
                        let that_one = $(this);
                        if(that_one.attr('data-type')=="cb_image_crop"){
                            add_list_one.append( objTotmpl( $('#cb_image_crop').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'img':data.value[that_one.attr('data-var')],
                                'tip':that_one.attr('data-tip'),
                                'width':that_one.attr('data-width'),
                                'height':that_one.attr('data-height'),
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_image"){
                            add_list_one.append( objTotmpl( $('#cb_image_crop').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'img':data.value[that_one.attr('data-var')],
                                'tip':that_one.attr('data-tip'),
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_input"){
                            add_list_one.append( objTotmpl( $('#cb_input').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')],
                                'under_text':that_one.attr('data-under-text'),
                                'placeholder':that_one.attr('data-placeholder'),
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_checkbox"){
                            add_list_one.append( objTotmpl( $('#cb_checkbox').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')],
                                'under_text':that_one.attr('data-under-text'),
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_textarea"){
                            add_list_one.append( objTotmpl( $('#cb_textarea').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')],
                                'tip':that_one.attr('data-tip')
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_textarea_big"){
                            add_list_one.append( objTotmpl( $('#cb_textarea_big').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')]
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_separate"){
                            add_list_one.append( objTotmpl( $('#cb_separate').html(), {
                                'name':that_one.attr('data-name')
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_select"){
                            add_list_one.append( objTotmpl( $('#cb_select').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')],
                                'actor':that_one.attr('data-actor'),
                                'set_data': data.defs['values_'+that_one.attr('data-var')]
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_color_picker"){
                            add_list_one.append( objTotmpl( $('#cb_color_picker').html(), {
                                'key':curr_key,
                                'var':that_one.attr('data-var'),
                                'name':that_one.attr('data-name'),
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')],
                                'is_single':that_one.attr('data-is-single')
                            } ) );
                        }


                        if(that_one.attr('data-type')=="cb_product"){
                            add_list_one.append( objTotmpl( $('#cb_product').html(), {
                                'key':curr_key,
                                'fname':data.option+'['+curr_key+']['+that_one.attr('data-var')+']',
                                'value':data.value[that_one.attr('data-var')]
                            } ) );

                            $('[data-adstm_template]',add_list_one).each(function () {

                                $(this).html( objTotmpl( $($(this).data('adstm_template')).html(), {"re_goods_list":$(this).data('value'),"name":$(this).data('name')} ) );
                                selectProduct.init($(this));
                            });
                        }

                        if(that_one.attr('data-type')=="cb_remove_block"){
                            add_list_one.append( objTotmpl( $('#cb_remove_block').html(), {
                                'key':curr_key,
                                'field': that_field
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_save_block"){
                            add_list_one.append( objTotmpl( $('#cb_save_block').html(), {
                                'key':curr_key,
                                'field': that_field
                            } ) );
                        }

                        if(that_one.attr('data-type')=="cb_save_remove_block"){
                            add_list_one.append( objTotmpl( $('#cb_save_remove_block').html(), {
                                'key':curr_key,
                                'field': that_field
                            } ) );
                        }




                    });


                    $( ".colorpicker",add_list_one ).spectrum( {
                        preferredFormat: "rgb",
                        showInitial : true,
                        showInput   : true,
                        showAlpha   : true,
                        allowEmpty  : true
                    } );

                    $('.uploadImg-box',add_list_one).each(function(){
                        add_img($(this));
                    });


                    let max_key = -1;
                    let add_list = that.prev();
                    $('.add_list_one',add_list).each(function(){
                        if($(this).attr('data-key') > max_key){
                            max_key = parseInt($(this).attr('data-key'));
                        }
                    });

                    that.find('.add_item').attr('data-key',max_key);





                }
            });
            return false;
        });


        $('body').on('submit','.live_cstm_activate',function () {


            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_lic',
                'lic': $('#lic_one').val()
            };

            $.ajax({
                url:ajaxurl,
                action:'live_cstm_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                        if(!data.error){
                            location.reload();
                        }
                    },5000);
                }
            });
            return false;
        });



        let url_check_confirmed=0;
        let need_to_start_customize=0;
        let create_check_busy=0;










        $('body').on('submit','.live_cstm_save_one',function () {
            let that=$(this);

            let formdata = getFormData($(this));

            let data = {
                'action':'live_cstm_ajax',
                'handler': 'live_cstm_save_one',
                'params': formdata
            };

            $.ajax({
                url:ajaxurl,
                action:'alids_landing_page_ajax',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(data){
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);


                    $('.mg_flex_getstart').hide();
                    $('.dashboard_empty').removeClass('dashboard_empty');
                }
            });
            return false;
        });




        $('body').on('click','button[name="tp_create"]',function(e){
            e.preventDefault();
            let data = {
                'tp_create': true,
                'action': 'cstm_template_action'
            };
            $.ajax({
                url:ajaxurl,
                data:data,
                type:'POST',
                success:function(data){
                    $('.mode_btn').removeClass('active');
                    $('.mode_btn_1').addClass('active');
                    $('.curr_mode').html($('.curr_mode').attr('data-classic'));
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);

                }
            });

            return false;
        });
        $('body').on('click','button[name="tp_create_sellvia_mode"]',function(e){
            e.preventDefault();
            let data = {
                'tp_create_sellvia_mode': true,
                'action': 'cstm_template_action'
            };
            $.ajax({
                url:ajaxurl,
                data:data,
                type:'POST',
                success:function(data){
                    $('.mode_btn').removeClass('active');
                    $('.mode_btn_2').addClass('active');
                    $('.curr_mode').html($('.curr_mode').attr('data-sellvia'));
                    $('.live_cstm_message').html(data.message).show();
                    setTimeout(function () {
                        $('.live_cstm_message').hide().html('');
                    },5000);

                }
            });

            return false;
        });

//**









        function flexFadeOut(el,speed){
            el.css('transition','opacity '+speed+'ms ease-out');
            el.css('opacity',0);
            setTimeout(function(){
                el.css('height','0');
            },speed);
        }








        $('input[type="checkbox"][data-hider]').each(function () {
            if(!$(this).is(':checked')){
                $('[data-hider_link="'+$(this).attr('data-hider')+'"]').show();
            }else{
                $('[data-hider_link="'+$(this).attr('data-hider')+'"]').hide();
            }
        });


        $('body').on('change','input[type="checkbox"][data-hider]',function () {
            if(!$(this).is(':checked')){
                $('[data-hider_link="'+$(this).attr('data-hider')+'"]').show();
            }else{
                $('[data-hider_link="'+$(this).attr('data-hider')+'"]').hide();
            }
        });

        $('input[type="checkbox"][data-viser]').each(function () {
            if($(this).is(':checked')){
                $('[data-viser_link="'+$(this).attr('data-viser')+'"]').show();
            }else{
                $('[data-viser_link="'+$(this).attr('data-viser')+'"]').hide();
            }
        });


        $('body').on('change','input[type="checkbox"][data-viser]',function () {
            if($(this).is(':checked')){
                $('[data-viser_link="'+$(this).attr('data-viser')+'"]').show();
            }else{
                $('[data-viser_link="'+$(this).attr('data-viser')+'"]').hide();
            }
        });



/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

//prepare

        const objTotmpl = function ( tmpl, data ) {
            if ( typeof window.Handlebars === 'undefined' ) {
                return false
            }
            const template = window.Handlebars.compile( tmpl );
            return template( data );
        };




        function switchery( el ) {



        }

        function serializeADS ( $el ) {
            let serialized = $el.serialize();
            if ( !serialized )
                serialized = $el.find( 'input[name],select[name],textarea[name]' ).serialize();
            return serialized;
        }

        function createJQPagination( obj, total, current, count ) {

            count = count || 20;

            let $obj = $( obj ).find( '.pagination-menu' );

            total   = parseInt(total);
            current = parseInt(current);

            if( total > 0 )
                total = Math.ceil(total/count);

            let text = $obj.data('pagination-title');

            if( ! text ) {
                text = 'Page {current_page} of {max_page}'
            }
            $obj
                .html( $('<a/>',{href:'#', class:'first'}).data('action', 'first').html( '<i><<</i>' ) )
                .append( $('<a/>',{href:'#', class:'previous'}).data('action', 'previous').html( '<i><</i>' ) )
                .append( $('<input/>',{type:'text', readonly:'readonly'}).data('max-page',total) )
                .append( $('<a/>',{href:'#', class:'next'}).data('action', 'next').html( '<i>></i>' ) )
                .append( $('<a/>',{href:'#', class:'last'}).data('action', 'last').html( '<i>>></i>' ) )
                .jqPagination({
                    page_string  : text,
                    link_string  : '#',
                    max_page     : total,
                    current_page : current,
                    paged        : function( pageNumber ){
                        /*
                                                $.event.trigger( {
                                                    type : "pagination:click",
                                                    obj  : obj,
                                                    page : pageNumber
                                                } );*/

                        $( obj ).trigger( {
                            type : "pagination:click",
                            obj  : obj,
                            page : pageNumber
                        } );
                    }
                });
        }







//selectProductsAds.js

        window.checker = function (root) {
            let checkerObj = {
                all: '.checkAll',
                item: '.check-item'
            };

            function renderChecker() {

                let u = $(root).find(checkerObj.item).not(':checked');
                if (u.length && $(root +" "+ checkerObj.all).prop("checked")) {
                    $(root +" "+ checkerObj.all).prop("checked", false);
                } else if (u.length === 0 && !$(checkerObj.all).prop("checked")) {
                    $(root +" "+ checkerObj.all).prop("checked", true);
                }
                $.uniform.update(root +" "+ checkerObj.all);
            }

            $(document).on('change', root +" "+ checkerObj.all, function () {
                $(this).closest(root).find(checkerObj.item).prop('checked', $(this).is(':checked'));
                $.uniform.update();
            });

            $('body').on('click', root +" "+'.table-item', renderChecker);

        };

        $.fn.selectProductsAds = function(cb, options) {
            let settings = $.extend( {
                list         : function (e) {
                    return [];
                },
            }, options);


            let params = {active : [], count : false};

            let obj = {
                $box : null,
                page: 1,
                root: '#ads-modal-addProduct',
                template: {
                    modalAddProduct : '#ads-modal-addProduct',
                    modalProduct : '#ads-tmpl-modal-products'
                },
                search: {
                    disApply  : '#ads-search-apply',
                    disResult : '#ads-modal-addProduct #ads-search-results',
                    categories  : '#ads-modal-addProduct select#product_cat',
                    disSearch : '#ads-modal-addProduct #ads-search',
                },
                row: {
                    add : '.js-product-add',
                    delete : '.js-product-delete',
                },
                bulk: {
                    'apply': '.bulk-apply',
                    'value': 'select.bulk-value',
                }
            };

            function loadTemplate() {
                return new Promise(function (reject, resolve) {

                    if($('#ads-modal-addProduct').length == 1)
                        reject();


                    $.ajax({
                        url:ajaxurl,
                        dataType : 'html',
                        data     : {
                            action      : 'get_product_tmpl'
                        },
                        type:'POST',
                        success:function ( response ) {
                            $('body').append(response);
                            obj.template.modalProduct  = $('#ads-tmpl-modal-products').html();
                            reject();
                        }
                    });

                })
            }


            function renderSelectProduct(){
                $(obj.root + ' .product-item').find(obj.row.add ).show();
                $(obj.root + ' .product-item').find(obj.row.delete).hide();
                for(let id in params.active){
                    $(obj.root + ' .product-item-' + params.active[id]).find(obj.row.add ).hide();
                    $(obj.root + ' .product-item-' + params.active[id]).find(obj.row.delete).show();
                    //$('#ads-modal-addProduct').modal('hide');
                }
            }

            let jq_init = 0;
            function disSearch( page ) {

                let ob		 = obj,
                    str 	 = $(ob.search.disSearch).val(),
                    category = $('option:selected', ob.search.categories).val();

                $(obj.search.disResult).addClass('over');


                $.ajax({
                    url      : ajaxurl,
                    dataType : 'json',
                    data     : {
                        action      : 'get_products_live',
                        ads_str     : str,
                        page		: page,
                        category	: category
                    },
                    type     : "POST",
                    success  : function ( response ) {

                        $(obj.search.disResult).html( objTotmpl( obj.template.modalProduct, response ) );
                        $(obj.search.disResult).find( '.uniform-checkbox, .uniform-radio' ).uniform();

                        renderSelectProduct();
                        if(!jq_init){
                            createJQPagination(  obj.root, response.total, response.page);
                            jq_init = 1;
                        }

                        setTimeout( switchery( $(obj.root) ), 300 );
                        renderCount($(obj.root), params.count);
                    }
                });
            }

            function bulk($root) {
                $root.off('click', obj.bulk.apply);
                $root.on('click', obj.bulk.apply, function (e) {
                    e.preventDefault();

                    let value = $root.find(obj.bulk.value).val();

                    switch (value) {
                        case 'add':
                            let $items = $root.find('.check-item:checked').closest('.table-item');


                            $items.each(function () {
                                let id = $(this).data('id');

                                if(!params.count || params.active.length < params.count){
                                    params.active.push(id.toString());
                                }
                            });

                            cb(params.active.slice(0), obj.$box);
                            renderSelectProduct();
                            break;
                    }
                    $('#ads-search-results .check-item:checked').click();
                    return false;
                });

            }

            function handlerSearch($root){

                $root.on('change', obj.search.categories, function(){
                    disSearch( 1 );
                });

                $root.on('click', obj.search.disApply, function(e){
                    e.preventDefault();
                    //window.ADS.btnLock($(obj.search.disApply));
                    disSearch( 1 );
                });

                $root.on('pagination:click', function (e) {
                    disSearch( e.page );
                });

                $root.on('click',obj.row.add, function (e) {
                    let id = $(this).closest('.product-item').data('id').toString();

                    if(!params.count || params.active.length < params.count){
                        params.active.push(id);
                        cb(params.active.slice(0), obj.$box);
                    }

                    renderSelectProduct();
                });

                $root.on('click',obj.row.delete, function (e) {
                    let id = $(this).closest('.product-item').data('id').toString();
                    params.active.splice(params.active.indexOf(id),1);
                    cb(params.active.slice(0), obj.$box);
                    renderSelectProduct();
                });

                bulk($root);

            }

            function renderCount($root, count) {
                if(!count || count !==1){
                    return;
                }

                $root.find('.checkbox').hide();
                $root.find('.bulk-actions .form-group').hide();
            }

            return this.each(function() {
                $(this).off( ".selectProductsAds" );
                $(this).on('click.selectProductsAds', function(e){

                    obj.$box = this;
                    params.active = settings.list(obj.$box).slice(0);
                    params.count = $(obj.$box.closest('.js-ads-select-product')).find('.js-ads-select-product-count').val();
                    if(parseInt($(obj.targetValue).attr('data-count'))>0){
                        params.count = parseInt($(obj.targetValue).attr('data-count'));
                    }

                    params.count = parseInt(params.count);
                    e.preventDefault();
                    $(obj.template.modalAddProduct).remove();
                    loadTemplate().then(function(){
                        $(obj.template.modalAddProduct).appendTo("body").modal('show');
                        handlerSearch($(obj.root));
                        checker(obj.root);
                        disSearch(1);
                    });

                });

            });

        };


//customization.js

        let selectProduct = (function () {
            let $this;

            let obj = {
                $panel : null,
                root: '.js-ads-select-product',
                addProductBtn: '.js-ads-select-product-btn',
                targetValue: '.js-ads-select-product-params',
                tmpl: {
                    list : '#ads-tmpl-select-product-box',
                    list2: '#ads-tmpl-select-product-box-min',
                    target : {
                        list: '.ads-select-product-list',
                    }
                }
            };

            function getApply(e){

                let $root = $(e).closest( obj.root );
                let targetValue = $root.find(obj.targetValue).val();
                return targetValue ? targetValue.split(','): [];
            }

            function selectProduct($root) {

                $( obj.addProductBtn, $root ).selectProductsAds(function(data, e){

                    let post_ids = data.join(',');

                    let $root = $(e).closest( obj.root );

                    $root.find(obj.targetValue).val(post_ids);

                    $this.lists();

                }, { list : getApply });
            }

            return {

                request: function (action, args, callback) {

                    args = args !== '' && args instanceof jQuery ? serializeADS(args) : args;
                    if($('body').is('.is_slv')){
                        $.ajax({
                            url: ajaxurl,
                            data: {
                                action: 'ads_actions',
                                slv_controller: 'slvSelectProduct',
                                ads_action: action,
                                args: args
                            },
                            type: 'POST',
                            dataType: 'json',
                            success: callback
                        });
                    }else{
                        $.ajax({
                            url: ajaxurl,
                            data: {
                                action: 'ads_actions',
                                ads_controller: 'adsSelectProduct',
                                ads_action: action,
                                args: args
                            },
                            type: 'POST',
                            dataType: 'json',
                            success: callback
                        });
                    }


                },

                lists: function (th) {

                    $('.js-ads-select-product-params',th).each(function () {
                        let $root = $(this).closest(obj.root);
                        $this.request('list', {
                            list : $(this).val(),
                        }, function (response) {
                            $this.listRender(response, $root);

                        });

                    })

                },

                listRender: function (response, $root) {

                    let tmpl = $(obj.tmpl.list).html(),
                        target = $root.find(obj.tmpl.target.list);

                    if (response) {

                        if (response.hasOwnProperty('error')) {
                        } else {

                            target.html(objTotmpl(tmpl, response));
                            selectProduct($root);
                            $('body').trigger('product_update');

                        }
                    }
                },

                events : function(){
                    $('body').on('click', '.js-product-select-delete', function (e) {
                        let $row = $(this).closest('.product-item');
                        let post_id = $row.find('[name="item_id"]').val();

                        let $root = $row.closest( obj.root );
                        let targetValue = $root.find(obj.targetValue).val();
                        targetValue = targetValue ? targetValue.split(','): [];

                        targetValue = targetValue.filter(function (v) {
                            return v !== post_id;
                        });

                        $root.find(obj.targetValue).val(targetValue.join(','));

                        $row.remove();
                        $('body').trigger('product_update');
                        return false;
                    });
                },

                init: function (th) {

                    if(!$(th).find(obj.root).length){
                        return;
                    }

                    obj.$panel = th;

                    $this = this;

                    this.lists(th);

                    this.events();

                }
            }
        })();


        $('[data-adstm_template]').each(function () {

            $(this).html( objTotmpl( $($(this).data('adstm_template')).html(), {"re_goods_list":$(this).data('value'),"name":$(this).data('name')} ) );
            selectProduct.init($(this));
        });

        function color_init(){
            $( ".colorpicker" ).spectrum( {
                preferredFormat: "rgb",
                showInitial : true,
                showInput   : true,
                showAlpha   : true,
                allowEmpty  : true
            } );
        }

        if($( ".colorpicker" ).length){
            color_init();
        }


        function init_crop( e ) {
            if(typeof $.fn.cropper == 'undefined'){
                return;
            }

            let uploadedImageType = '';
            let height            = parseInt( $( e ).data( 'height' ) );
            let width             = parseInt( $( e ).data( 'width' ) );
            let options           = {
                aspectRatio : width / height,
                //dragMode: 'move',
                cropBoxResizable: false,
                zoomable: false,
                scalable: false,
                data        : {
                    x      : 0,
                    y      : 0,
                    height : height,
                    width  : width
                }
            };

            // Import image
            let $inputFileUrl = $( e ).find( '.file_url' );
            let $image      = $( e ).find( ".cropper" );
            let $self      = $( e );

            $image.cropper( options );

            $inputFileUrl.change( function () {
                if ( !$image.data( 'cropper' ) ) {
                    return;
                }
                $image.cropper( 'destroy' ).attr( 'src', $(this).val() );//.cropper( options );

            } );
            $image.cropper("setDragMode", "move");

            $( e ).find('.crop_file').prop('disabled', false).show();

            function crop (images, p, zoomWidth, zoomHeight){
                let crop_canvas,
                    left = p.left,
                    top =  p.top,
                    width = p.width,
                    height = p.height;

                let img = new Image();

                img.src = $(images).attr('src');

                let cW = $(images).width();
                let cH = $(images).height();

                let kW = img.width/cW;
                let kH = img.height/cH;

                crop_canvas = document.createElement('canvas');
                crop_canvas.width = width*kW;
                crop_canvas.height = height*kH;

                let kHW = zoomWidth/width;
                let kHH = zoomHeight/height;

                crop_canvas.getContext('2d').drawImage(img, left*kW, top*kH, zoomWidth, zoomHeight, 0, 0, width*kW, height*kH);

                $('body').append(crop_canvas);
                return crop_canvas.toDataURL("image/png");
            }

            $( e ).find('.crop_file').on('click', function () {
                let _this = $(this);


                let data = _this.data();
                let result;

                _this.prop('disabled', true);

                if ($image.data('cropper')) {
                    data = $.extend( {}, data ); // Clone a new one

                    if ( !data.option ) {
                        data.option = {};
                    }

                    if ( uploadedImageType === 'image/jpeg' ) {
                        data.option.fillColor = '#fff';
                    }

                    result = $image.cropper( 'getCroppedCanvas', data.option );


                    if ( result ) {

                        let form_Data = new FormData();

                        form_Data.append('action', 'ads_Media');
                        form_Data.append('ads_action', 'save_image64');
                        form_Data.append('file64', result.toDataURL( uploadedImageType ));
                        form_Data.append('src', $self.find('.file_url').val());
                        form_Data.append('crop_name', $self.find('.file_url').data('crop_name'));

                        $.ajax( {
                            url      : ajaxurl,
                            dataType : 'json',
                            data     : form_Data,
                            contentType:false,
                            processData:false,
                            type     : "POST",
                            success  : function ( attachment ) {
                                $self.find('.preview-upload').attr('src', attachment.url).parent().show();
                                $self.find('.file_url').val(attachment.url).trigger("change");
                                _this.hide();
                            }
                        } );
                    }
                }

                return false;

            } );
        }

        function add_img($el) {
            let _this = this;
            $el.find('.upload_file').click(function (e) {
                e.preventDefault();
                let button = $(this);
                let custom_uploader = wp.media({
                    multiple: false
                })
                    .on('select', function () {
                        let attachment = custom_uploader.state().get('selection').first().toJSON();
                        $(button).closest('.uploadImg-box').find('.preview-upload')
                            .attr('src', attachment.url)
                            .parent()
                            .show();
                        $(button).closest('.uploadImg-box').find('.file_url').val(attachment.url).trigger("change");
                        init_crop($(button).closest('.uploadImg-box'));
                    })
                    .open();

                return false;
            });

            $el.find('.remove_file').click(function () {
                let r = true;//confirm("Уверены?");
                if (r == true) {
                    $(this).closest('.uploadImg-box').find('.preview-upload').attr('src', '').parent().hide();
                    $(this).closest('.uploadImg-box').find('.crop_file').hide();
                    $(this).closest('.uploadImg-box').find('.file_url').val('').trigger("change");
                    $(this).closest('.uploadImg-box').find('.file_url').parent().removeClass('active');
                }
                return false;
            });
        }
        $('.uploadImg-box').each(function(){
            add_img($(this));
        });



        $('body').on('change','input.colorpicker',function(){

            let name = $(this).attr('name');
            if($(this).attr('data-name')){
                name = $(this).attr('data-name');
            }
            document.getElementById('home_frame').contentWindow.document.body.style.setProperty('--'+name.replaceAll('_','-'), $(this).val() || 'transparent')
            //document.getElementById('home_frame').contentWindow.document.body.style.setProperty('--main-menu-hover', $(this).val());
        });

        $('body').on('change','input.file_url',function(){

            let name = $(this).attr('name');
            if($(this).attr('data-name')){
                name = $(this).attr('data-name');
            }
            document.getElementById('home_frame').contentWindow.document.body.style.setProperty('--'+name.replaceAll('_','-'), 'url('+$(this).val()+')' || 'none')
            //document.getElementById('home_frame').contentWindow.document.body.style.setProperty('--main-menu-hover', $(this).val());
            console.log(name);
            $("#home_frame").contents().find('[data-czsrc="'+name+'"]').attr('src',$(this).val());
        });

        $('body').on('keyup','.live_type',function(){

            let name = $(this).attr('name');
            if($(this).attr('data-name')){
                name = $(this).attr('data-name');
            }

            $("#home_frame").contents().find('[data-cztxt="'+name+'"]').html($(this).val());
            $("#home_frame").contents().find('[data-czhref="'+name+'"]').attr('href',$(this).val());

        });


        function reinit_all(el){

            $( ".colorpicker",el ).spectrum( {
                preferredFormat: "rgb",
                showInitial : true,
                showInput   : true,
                showAlpha   : true,
                allowEmpty  : true
            } );

            $('.uploadImg-box',el).each(function(){
                add_img($(this));
            });

            $('[data-adstm_template]',el).each(function () {

                $(this).html( objTotmpl( $($(this).data('adstm_template')).html(), {"re_goods_list":$(this).data('value'),"name":$(this).data('name')} ) );
                selectProduct.init($(this));
            });

            $('.big_editor',el).each(function(){

                if(wp.editor){
                    let id = $(this).attr( 'id' );
                    wp.editor.initialize( id, {
                        tinymce: {
                            wpautop: true
                        },
                        quicktags: true
                    });
                }


            });



        }



        //frame nav


        $('.custom_sidebar_btn').on('click',function(e){
            $('.custom_sidebar').toggleClass('active');
        });

        $('body').on('click','.added_item_head',function(e){
            $(this).next().slideToggle(500);
        });


        $('.close_live_main').on('click',function(e){
            document.location.href = '/';

        });

        $('.custom_sidebar_item>h3').on('click',function(e){
            let that = $(this);
            let that_parent = $(this).parent();
            if((!that_parent.is('.template_loaded')) && that_parent.attr('data-template')!==undefined){
                let data_ajax = {
                    'action': 'live_template',
                    'template':$(this).parent().attr('data-template')
                };


                $.ajax({
                    url: ajaxurl,
                    data: data_ajax,
                    type: "POST",
                    dataType: 'html',
                    success: function (response) {

                        $('.wrap',that_parent).html(response);
                        reinit_all($('.wrap',that_parent));
                        that_parent.addClass('template_loaded');

                        let this_item = that_parent;
                        $('.custom_sidebar_item').hide();
                        this_item.show().addClass('active');
                        $('.wrap',this_item).show();
                        $('.close_live',this_item).show();
                        $('.custom_sidebar_head_inner .csh_big').html(that.html());
                        $('.custom_sidebar_head_inner').show();
                        $('.custom_sidebar_head').hide();


                    }
                });
            }else{
                let this_item = that_parent;
                $('.custom_sidebar_item').hide();
                this_item.show().addClass('active');
                $('.wrap',this_item).show();
                $('.close_live',this_item).show();
                $('.custom_sidebar_head_inner .csh_big').html(that.html());
                $('.custom_sidebar_head_inner').show();
                $('.custom_sidebar_head').hide();
            }





            // if(this_item.is('.tmpl_ads_tmplCart') || this_item.is('.tmpl_tmplOpc')){
            //     if(!$('#cart_frame').length){
            //         $('body').append('<iframe src="'+'/cart#live'+'" id="cart_frame" class="fixed_frame" ></iframe>')
            //         document.getElementById('cart_frame').onload= function() {
            //             $("#cart_frame").contents().find("body").removeClass("is_frame");
            //         };
            //     }else{
            //         $('#cart_frame').show();
            //     }
            // }
            //
            // if(this_item.is('.tmpl_tmplGeneral') || this_item.is('.tmpl_tmplHead') || this_item.is('.tmpl_tmplHeader')
            //     || this_item.is('.tmpl_tmplHome') || this_item.is('.tmpl_tmplSocial') || this_item.is('.tmpl_tmplSubscribe') || this_item.is('.tmpl_tmplFooter')){
            //     if(!$('#home_frame').length){
            //         $('body').append('<iframe src="/#live" id="home_frame" class="fixed_frame" ></iframe>')
            //
            //     }else{
            //         $('#home_frame').show();
            //     }
            // }
            //
            // if(this_item.is('.tmpl_tmplAbout')){
            //     if(!$('#about_frame').length){
            //         $('body').append('<iframe src="'+'/about-us#live'+'" id="about_frame" class="fixed_frame" ></iframe>')
            //         document.getElementById('about_frame').onload= function() {
            //             $("#about_frame").contents().find("body").removeClass("is_frame");
            //         };
            //     }else{
            //         $('#about_frame').show();
            //     }
            // }
            //
            // if(this_item.is('.tmpl_tmpl404')){
            //     if(!$('#frame_404').length){
            //         $('body').append('<iframe src="'+'/404page_custom#live'+'" id="frame_404" class="fixed_frame" ></iframe>')
            //         document.getElementById('frame_404').onload= function() {
            //             $("#frame_404").contents().find("body").removeClass("is_frame");
            //         };
            //     }else{
            //         $('#frame_404').show();
            //     }
            // }
            //
            // if(this_item.is('.tmpl_ads_tmplBlog')){
            //     if(!$('#blog_frame').length){
            //         $('body').append('<iframe src="'+'/blog#live'+'" id="blog_frame" class="fixed_frame" ></iframe>')
            //         document.getElementById('blog_frame').onload= function() {
            //             $("#blog_frame").contents().find("body").removeClass("is_frame");
            //         };
            //     }else{
            //         $('#blog_frame').show();
            //     }
            // }
            // if(this_item.is('.tmpl_tmplContactUs')){
            //     if(!$('#contact_frame').length){
            //         $('body').append('<iframe src="'+'/contact-us#live'+'" id="contact_frame" class="fixed_frame" ></iframe>')
            //         document.getElementById('contact_frame').onload= function() {
            //             $("#contact_frame").contents().find("body").removeClass("is_frame");
            //         };
            //     }else{
            //         $('#contact_frame').show();
            //     }
            // }
            // if(this_item.is('.tmpl_ads_tmplAccount')){
            //     if(!$('#account_frame').length){
            //         $('body').append('<iframe src="'+'/account#live'+'" id="account_frame" class="fixed_frame" ></iframe>')
            //         document.getElementById('account_frame').onload= function() {
            //             $("#account_frame").contents().find("body").removeClass("is_frame");
            //         };
            //     }else{
            //         $('#account_frame').show();
            //     }
            // }
            //
            // if(this_item.is('.tmpl_tmplSingleProduct')){
            //     if(!$('#single_frame').length){
            //         let iframe = document.getElementById("home_frame");
            //         let elmnt = iframe.contentWindow.document.querySelector(".product-item a");
            //         if(elmnt.getAttribute('href')){
            //             $('body').append('<iframe src="'+elmnt.getAttribute('href')+'#live'+'" id="single_frame" class="fixed_frame" ></iframe>')
            //             document.getElementById('single_frame').onload= function() {
            //                 $("#single_frame").contents().find("body").removeClass("is_frame");
            //             };
            //         }
            //
            //
            //     }else{
            //         $('#single_frame').show();
            //     }
            // }

        });

        $('.custom_sidebar_head_inner').on('click',function(e){
            $('.custom_sidebar_item').show();
            $('.custom_sidebar_item').removeClass('active');
            $('.custom_sidebar_item .wrap').hide();
            $('.custom_sidebar_head_inner').hide();
            $('.custom_sidebar_head').show();

            $('#cart_frame').hide();
            $('#about_frame').hide();
            $('#frame_404').hide();
            $('#blog_frame').hide();
            $('#contact_frame').hide();
            $('#account_frame').hide();
            $('#single_frame').hide();

            $('#home_frame').show();

        });

        $('body').on('query_begin',function () {
            $('form').addClass('is_busy');
        });

        $('body').on('query_end',function () {
            setTimeout(function () {
                $('.is_busy').removeClass('is_busy');
            },3000)
        });


        let live_reload = 0;
        $(document).on('request:done', function(e) {
            live_reload++;
            setTimeout(function(){
                if(live_reload==1){
                    if($('#cart_frame').length){
                        document.getElementById('cart_frame').contentWindow.location.reload(true);
                    }
                    if($('#home_frame').length){
                        document.getElementById('home_frame').contentWindow.location.reload(true);
                    }
                    if($('#about_frame').length){
                        document.getElementById('about_frame').contentWindow.location.reload(true);
                    }
                    if($('#frame_404').length){
                        document.getElementById('frame_404').contentWindow.location.reload(true);
                    }
                    if($('#blog_frame').length){
                        document.getElementById('blog_frame').contentWindow.location.reload(true);
                    }
                    if($('#contact_frame').length){
                        document.getElementById('contact_frame').contentWindow.location.reload(true);
                    }
                    if($('#account_frame').length){
                        document.getElementById('account_frame').contentWindow.location.reload(true);
                    }
                    if($('#single_frame').length){
                        document.getElementById('single_frame').contentWindow.location.reload(true);
                    }
                }
                live_reload--;

            },200)


        });


        function btnLock( $el ) {
            $el.addClass('is_busy').attr('disabled', true);
        }

        function btnUnLock( $el ) {
            setTimeout(function(){
                if($el.length)
                    $el.removeClass('is_busy').attr('disabled', false);
            },300);
        }


        let insta_busy = 0;
        $('body').on('click','#update_instagram_images', function (e) {
            e.preventDefault();
            if(!insta_busy){
                insta_busy = 1;
                btnLock( $('#update_instagram_images') );


                let name;
                if($('#s_in_name_api-').length){
                    name = $('#s_in_name_api-').val();

                }
                if($('#s_in_name_api').length){
                    name = $('#s_in_name_api').val();

                }

                window.ADS.aliExtension.enableIframe();
                window.ADS.aliExtension.getPage('https://www.instagram.com/'+name+'/').then(function (value) {

                    let data    = value.html.match( /window\._sharedData\s*=\s*(.*)<\/script>/im );

                    if( null === data){
                        window.open('https://www.instagram.com/'+name+'/');
                        return;
                    }

                    data = data[1].substring(0, data[1].length - 1);

                    data = JSON.parse(data);

                    try{
                        let entry = data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];

                        let images = [];
                        for(let i in entry){
                            images.push(entry[i]['node']['display_url'])
                        }

                        let params = {
                            followers : data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'],
                            photos : data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['count'],
                            images : images
                        }


                        $.ajax({
                            url: ajaxurl,
                            data: {action: 'adstm_instagram_html', 'params' : params },
                            type: "POST",
                            dataType: 'json',
                            success: function (response) {
                                btnUnLock( $('#update_instagram_images') );
                                insta_busy = 0;
                                $('.live_cstm_message').html(response.text).show();
                                setTimeout(function () {
                                    $('.live_cstm_message').hide().html('');
                                },5000);
                            }
                        });
                    }catch (e){
                        btnUnLock( $('#update_instagram_images') );
                        insta_busy = 0;
                    }

                })
            }

        });



        $('body').on('product_update',function(){
            $('.elemenu_menu').each(function(){
                let that = $(this);
                that.html('');
                $('.add_list_one',that.parent()).each(function(){
                    if($('.product_name',this).length){
                        that.append('<div class="elemenu_one" data-key="'+$(this).attr('data-key')+'">'+$('.product_name',this).html().trim()+'<span class="arrowdown"></span></div>')
                    }else{
                        that.append('<div class="elemenu_one" data-key="'+$(this).attr('data-key')+'">'+$('[data-new]',this).attr('data-new')+'<span class="arrowdown"></span></div>')
                    }

                });

            })
        });

        $('body').on('click','.elemenu_one',function(){
            $(this).parents('.elemenu_menu_cont').find('.add_list_one[data-key="'+$(this).attr('data-key')+'"]').toggle();
            $('.elemenu_menu').hide();
            $('.menu_back').show();
            $('.elemenu_menu_cont .add_block').hide();
        });

        $('body').on('click','.menu_back',function(){
            $(this).parents('.elemenu_menu_cont').find('.add_list_one').hide();
            $('.elemenu_menu').show();
            $('.menu_back').hide();
            $('.elemenu_menu_cont .add_block').show();
        });





    });
});
