<?php


add_action('ads_top_category', function(){
    $btmVideo = '';
    if(cz('id_video_youtube_home') ){
        $btmVideo = sprintf('<a data-lity href="https://www.youtube.com/watch?v=%1$s" class="btn view_video" ><span>%2$s</span></a>',
            cz( 'id_video_youtube_home' ),
            __( 'View Video', 'rap' ));
    }

	$position = cz('slider_home_position');

	$btmVideo_one_slider = true;

    foreach (cz('slider_home') as $key => $item) {
        $emptyTextClass = ! $item[ 'text' ] ? 'emptyText' : '';

        $shop_now_enabled = isset($item[ 'shop_now_enabled' ]) ? $item[ 'shop_now_enabled' ] : true;

        if ( ! $item[ 'img' ] ) {
            continue;
        }

        printf( '<div class="slider-%7$s">
		<a href="%2$s">
            <div class="bg scene'.$key.'">
            <div class="wrap-bg">
                <div class="container info %6$s %9$s">
                    <div class="text" style="color: %8$s;background-color: %10$s">%1$s</div>
                    <div class="ft">
                        %11$s
                        %4$s
                    </div>
                </div>
            </div>
		</div>
		</a>
	</div>',
            $item[ 'text' ],
            $item[ 'shop_now_link' ],
            $item[ 'button_text' ],
	        $btmVideo_one_slider ? $btmVideo : '',
            $item[ 'img' ],
            $emptyTextClass,
            $key,
	        $item[ 'text_color' ],
	        $position,
	        isset($item[ 'background' ])? $item[ 'background' ] : 'transparent',
	        $shop_now_enabled ? sprintf('<a href="%s" class="btn shop_now">%s</a>' , $item[ 'shop_now_link' ], $item[ 'button_text' ]) : ''

        );

	    $btmVideo_one_slider = false;
    }
});

function adstm_home_article() {

    $content = cz( 'tp_home_article' );
    if( ! $content )
        return;

    echo '<div class="home_article_cont">'.
        apply_filters( 'the_content', $content ) .
        '</div>';
}
add_action( 'adstm_home_article', 'adstm_home_article' );