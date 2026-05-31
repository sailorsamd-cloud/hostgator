<?php

function adstm_paging_nav() {

	global $wp_query;

	$posts_per_page =
		isset( $wp_query->query_vars[ 'posts_per_page' ] ) && intval( $wp_query->query_vars[ 'posts_per_page' ] ) ?
		$wp_query->query_vars[ 'posts_per_page' ] :
		intval( get_option( 'posts_per_page' ) );

	$big = 999999999;

	$paged = max( 1, get_query_var( 'paged' ) );
	$count = $wp_query->found_posts;
	$total = ceil( $count / $posts_per_page );

	$ul_class = '';

	if(cz('tp_classic_pager_mode')){
        $links = paginate_links( [
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '/page/%#%',
            'total'     => $total,
            'current'   => $paged,
            'type'      => 'array',
            'prev_text' => '<i class="arrowleft"></i><u>'.__('Previous','elgreco').'</u>',
            'next_text' => '<u>'.__('Next','elgreco').'</u><i class="arrowright"></i>'
        ] );
        $ul_class = 'classic_pager';
	}else{
        $links = paginate_links( [
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '/page/%#%',
            'total'     => $total,
            'current'   => $paged,
            'type'      => 'array',
            'prev_text' => '<i class="arrowleft"></i>',
            'next_text' => '<i class="arrowright"></i>'
        ] );
	}


	$pagination = [];
	if( $links ) {
		foreach( $links as $link ) {
			$pagination[] = [
				'active' => adstm_search_current( $link ),
				'link'   => $link,
			];
		}
	}
	
	if( count( $pagination ) ) {
		
		$pagination2 = $pagination;
		$pagprev     = array_shift( $pagination2 );
		$pagnext     = array_pop( $pagination2 );
		
		echo '<ul class="'.$ul_class.'">';

		foreach ( $pagination as $key => $link ) {
			$class = '';
			if ( $link[ 'active' ] ) {
				$class = ' class="active" ';
			}
			echo '<li' . $class . '>'.$link[ 'link' ].'</li>';
		}
		
		echo '</ul>
		<div class="adappagercont">'; ?>
		    <?php foreach( $links as $link ) {
		        if(strstr($link,'prev') || strstr($link,'next')){
                    echo $link;
                }

            } ?>
        <?php echo '</div>';

        echo '<div class="loadmorecont"><span class="loadmore load_more btn-black">'.__('Load More', 'elgreco').'</span></div>';

	}
}
add_action( 'adstm_paging_nav', 'adstm_paging_nav' );

function adstm_search_current( $string ) {

	if ( preg_match( '/(current)/', $string ) ) {
		return true;
	}

	return false;
}