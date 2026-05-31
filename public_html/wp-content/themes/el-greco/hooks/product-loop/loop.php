<?php

function adstm_start_loop_featured_product($posts_per_page = 4 ) {

    global $GLOBAL;

    if ( ! isset( $GLOBAL[ 'id_post_show' ] ) ) {
        $GLOBAL[ 'id_post_show' ] = [];
    }

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => $posts_per_page,
        'post__in'   => array_slice(explode(',',cz('home_featured_list')),0,$posts_per_page),
        'post__not_in'   => $GLOBAL[ 'id_post_show' ]
    ];

    query_posts( $args );
}
add_action( 'adstm_start_loop_featured_product', 'adstm_start_loop_featured_product', 10, 1 );

function adstm_start_loop_topselling_product( $posts_per_page = 4 ) {
	
	global $GLOBAL;
	
	if( ! isset( $GLOBAL[ 'id_post_show' ] ) ) {
		$GLOBAL[ 'id_post_show' ] = [];
	}

	$args = [
		'post_type'      => 'product',
		'posts_per_page' => $posts_per_page,
		'_orderby'       => 'promotionVolume',
		'_order'         => 'DESC',
		'post__not_in'   => $GLOBAL[ 'id_post_show' ]
	];

	query_posts( $args );
}
add_action( 'adstm_start_loop_topselling_product', 'adstm_start_loop_topselling_product', 10, 1 );

function adstm_start_loop_bestdials_product( $posts_per_page = 4 ) {
	
	global $GLOBAL;
	
	if ( ! isset( $GLOBAL[ 'id_post_show' ] ) ) {
		$GLOBAL[ 'id_post_show' ] = [];
	}

	$args = [
		'post_type'      => 'product',
		'posts_per_page' => $posts_per_page,
		'_orderby'       => 'discount',
		'_order'         => 'DESC',
		'post__not_in'   => $GLOBAL[ 'id_post_show' ]
	];

	query_posts( $args );
}
add_action( 'adstm_start_loop_bestdials_product', 'adstm_start_loop_bestdials_product', 10, 1 );

function adstm_start_loop_arrivals_product( $posts_per_page = 4 ) {
	
	global $GLOBAL;
	
	if ( ! isset( $GLOBAL[ 'id_post_show' ] ) ) {
		$GLOBAL[ 'id_post_show' ] = [];
	}

	$args = [
		'post_type'      => 'product',
		'posts_per_page' => $posts_per_page,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post__not_in'   => $GLOBAL[ 'id_post_show' ]
	];

	query_posts( $args );
}
add_action( 'adstm_start_loop_arrivals_product', 'adstm_start_loop_arrivals_product', 10, 1 );

function adstm_start_loop_related_product( $posts_per_page = 4 ) {
	
	global $post, $wpdb;

	$args = [ 'post_type' => 'none' ];

	if( isset( $post->links ) && $post->links != '' ) {

		$links = explode( ',', $post->links );

		if ( ! empty( $links ) ) {

			$links = ads_shuffle_assoc( $links );
			$args  = [
				'post_type'      => 'product',
				'posts_per_page' => $posts_per_page,
				'_orderby'       => 'post_id',
				'_order'         => 'array',
				'post__in'       => $links
			];

		}
	} else {

        if ( cz( 'tp_single_show_random_related_products' ) ) {

            $terms = wp_get_post_terms( $post->ID, 'product_cat' );

            $terms = current( $terms );


            if ( $terms ) {
                $term_id = $terms->term_id;
                $querystr = "SELECT p.ID
                        FROM {$wpdb->term_relationships} t INNER JOIN {$wpdb->posts} p ON p.ID = t.object_id
                        WHERE p.ID NOT IN({$post->ID}) AND
                        	t.term_taxonomy_id={$term_id} AND
                        	p.post_status = 'publish' AND
                        	p.post_type = 'product'
                        ORDER BY rand() LIMIT {$posts_per_page}";

                $pageposts = $wpdb->get_results( $querystr );

                $post__in = [];
                foreach( $pageposts as $sub ) {
                    $post__in[] = $sub->ID;
                }

                if( $post__in ) {
                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => $posts_per_page,
                        'post__in'       => $post__in
                    ];
                } else {
                    $args = [
                        'post_type' => 'none',
                    ];
                }
            }
        }
	}

    query_posts( $args );
}

function getChildTerm( $terms, $parent = 0 ) {
 
	foreach( $terms as $v ) {
        if( $v->parent == $parent ) {
            return getChildTerm( $terms, $v->term_id );
        }
    }

    return $parent;
}
add_action( 'adstm_start_loop_related_product', 'adstm_start_loop_related_product', 10, 1 );

function adstm_iterator_loop_product() {
	
	global $post, $GLOBAL;
	
	$GLOBAL[ 'id_post_show' ][] = $post->ID;
}
add_action( 'adstm_iterator_loop_product', 'adstm_iterator_loop_product', 10, 1 );

add_action( 'adstm_start_loop_recently_product', function( $posts_per_page = 4 ) {

	global $post, $wpdb, $GLOBAL;

	$posts_per_page = intval( $posts_per_page );

	$viewed = ads_recently_viewed_ids();
	$viewed = ads_shuffle_assoc( $viewed );
	$viewed = $viewed ? $viewed : [ 0 ];

	query_posts( [
		'post_type'      => 'product',
		'posts_per_page' => $posts_per_page,
		'post__in'       => $viewed,
		'post__not_in'   => $GLOBAL[ 'id_post_show' ],
		'_orderby'       => 'post_id',
		'_order'         => 'array',
		'post_status'    => [ 'publish' ]
	] );

}, 10, 1 );

function adstm_end_loop_product() {
	
	wp_reset_query();
}
add_action( 'adstm_end_loop_product', 'adstm_end_loop_product' );