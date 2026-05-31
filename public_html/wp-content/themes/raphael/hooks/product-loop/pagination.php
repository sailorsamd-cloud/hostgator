<?php

function adstm_paging_nav()
{

	global $wp_query;

	$posts_per_page = ( isset( $wp_query->query_vars[ 'posts_per_page' ] ) &&
	                    intval( $wp_query->query_vars[ 'posts_per_page' ] ) ) ?
		$wp_query->query_vars[ 'posts_per_page' ] :
		intval( get_option( 'posts_per_page' ) );

	$big = 999999999;

	$paged = max( 1, get_query_var( 'paged' ) );
	$count = $wp_query->found_posts;
	$total = ceil( $count / $posts_per_page );
	$links = paginate_links(
		array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '/page/%#%',
			'total'     => $total,
			'current'   => $paged,
			'type'      => 'array',
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;'
		)
	);

	$pagination = array();
	if ( $links ) {
		foreach ( $links as $link ) {
			$pagination[] = array(
				'active' => adstm_search_current( $link ),
				'link'   => $link,
			);
		}
	}

	if ( count( $pagination ) ) {

		echo '<ul class="b-pagination" role="navigation">';
		foreach ( $pagination as $link ) {
			$class = '';
			if ( $link[ 'active' ] ) {
				$class = ' class="active" ';
			}
			echo '<li' . $class . '>' . $link[ 'link' ] . '</li>';
		}
		echo '</ul>';
	}
}


add_action('adstm_paging_nav', 'adstm_paging_nav');

function adstm_search_current( $string ){

	if ( preg_match( '/(current)/', $string ) ) {
		return true;
	}

	return false;
}
