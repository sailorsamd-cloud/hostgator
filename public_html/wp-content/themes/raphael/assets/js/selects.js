function ttselect(query){
    let $ = jQuery;
    if(!$(query).length){return false;}

    $(query).each(function () {

        let $this = $(this);
        let this_parent = $(this).parent();
        let selonhtml = '';
        let selonhtmlopt = '';
        let firstopt = '';
        let selitid = $(this).attr('id');//id select
        let selitname = $(this).attr('name');//name select
        let selitclass = $(this).attr('class');//name select
        let firstoptval = $this.val();
        let selsearchhtml = '';
        if($this.is('[data-search]')){
            selsearchhtml = '<div class="twistedsearch"><input type="text" name="'+selitname+'_select_search"></div>'
        }

        $(this).children('option').each(function() {
            let optitid = $(this).val();
            let optithtml = $(this).html();

            if ($(this).is(':selected')) {
                selonhtmlopt += '<div class="optsel active" data-id="'+optitid+'">'+optithtml+'</div>';
                firstopt = $(this).text();
            }else{
                selonhtmlopt += '<div class="optsel" data-id="'+optitid+'">'+optithtml+'</div>';
            }
        });

        selonhtml += '<div style="'+($(this).attr('style') ? $(this).attr('style') : '')+'" class="twistedselect downselectbutton '+selitclass+'" id="'+selitid+'"><div class="twistedtext">'+firstopt+'</div><div class="selectbutton "></div>'+selsearchhtml+'<div class="ghostinshells">'+selonhtmlopt+'</div><input type="hidden" name="'+selitname+'" value="'+firstoptval+'">'
        $(this).replaceWith(selonhtml);

        let twistedselect = $('.twistedselect',this_parent);
        let twistedtext = $('.twistedtext',this_parent);
        let selectbutton = $('.selectbutton',this_parent);
        let twistedsearch = $('.twistedsearch',this_parent);
        let ghostinshells = $('.ghostinshells',this_parent);
        let optsel = $('.optsel',ghostinshells);

        if(selsearchhtml){
            $('input',twistedsearch).on('keyup',function(e){
                let thisfill=$(this).val().toLowerCase();
                twistedsearch.next().find('[data-id]').each(function(){
                    if($(this).html().toLowerCase().indexOf(thisfill)>-1 || thisfill==''){
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                });
            });
        }

        function openselect() {
            closeselect()
            twistedselect.removeClass("downselectbuttonH").removeClass("downselectbutton").addClass("upselectbutton");
            ghostinshells.show();
            twistedsearch.show();
            $('input[type="text"]',twistedselect).find().focus();
        }

        function closeselect() {
            twistedselect.removeClass("upselectbuttonH").removeClass("upselectbutton").addClass("downselectbutton");
            ghostinshells.hide();
            twistedsearch.hide();
        }

        twistedtext.on('click', function(){
            if (twistedselect.is('.downselectbutton')){
                twistedselect.removeClass("downselectbutton").addClass("downselectbuttonH");
                $('body').find('.focustwister').removeClass('focustwister');
                twistedselect.addClass('focustwister');
                openselect()
            }else if (twistedselect.is('.upselectbutton')){
                twistedselect.removeClass("upselectbutton").addClass("upselectbuttonH");
                $('body').find('.focustwister').removeClass('focustwister');
                closeselect()
            }
        });

        optsel.on('click', function(){
            twistedtext.html($(this).html());
            ghostinshells.next('input').val($(this).attr("data-id")).trigger('change');
            twistedselect.removeClass("upselectbutton").addClass("upselectbuttonH").removeClass('focustwister');
            closeselect();
        });


    });






}

jQuery(function($){
    $(document).ready(function(){
        ttselect('select[data-ttselect]');
    });
});