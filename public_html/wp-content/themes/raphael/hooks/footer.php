<?php

function adstm_notify(){
	global $message;
	printf('<script type="text/html" id="ads-notify"/>%1$s</script>',
		apply_filters('ads_notify', $message)
	);
}

add_action('adstm_footer', 'adstm_notify');


function adstm_modal(){
    if(adsTmpl::is_home()){
		get_template_part( 'template/home/_modal');
	}
}

add_action('adstm_modal', 'adstm_modal');

function adstm_subscribe_form(){
	printf(
		'%1$s',
		cz( 'tp_subscribe' )
	);

}

add_action('adstm_subscribe_form', 'adstm_subscribe_form');


add_action('adstm_copyright', function(){
	printf('<div class="copyright" itemscope itemtype="http://schema.org/Organization">
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				%1$s
                <div class="copyright-address" itemprop="streetAddress">%2$s</div>
                <div class="copyright-line">%3s</div>
            </div>
        </div>',
		str_replace( '{{YEAR}}', date( 'Y' ), cz( 'tp_copyright' ) ),
		cz( 'tp_address' ),
		cz( 'tp_copyright__line' )
		);

});


add_action('adstm_address', function () {
	printf( '<div class="copyright-address">%1$s</div>',
		cz( 'tp_address' )
	);
});