<?php

function adstm_home_article() {
	
	$content = cz( 'tp_home_article' );
	if( ! $content )
		return;

	if(cz('tp_home_article_more')){
        echo '<div class="container"><div class="homearticle content">' .
            apply_filters( 'the_content', $content ) .
            '<div class="adapmore"><span>' . __( 'Read more', 'elgreco' ) . '</span></div></div></div>';
    }else{
        echo '<div class="container"><div class="content homearticle_full">' .
            apply_filters( 'the_content', $content ) .
            '</div></div>';
    }


}
add_action( 'adstm_home_article', 'adstm_home_article' );