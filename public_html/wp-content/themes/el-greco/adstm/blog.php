<?php

function theme_thumb_photo( $id, $size = 'thumbnail', $class = 'blog-post-item__img' ) {

	$url = theme_thumb_photo_url( $id, $size );

	if ( ! $url ) {
		return '';
	}

	return '<img src="' . $url . '" class="img-responsive ' . $class . '">';
}

function theme_thumb_photo_url( $id, $size = 'thumbnail' ) {

	if ( ! has_post_thumbnail( $id ) ) {

		$args = [
			'post_type'   => 'attachment',
			'numberposts' => 1,
			'post_status' => null,
			'post_parent' => $id
		];

		$attachments = get_posts( $args );

		if ( $attachments ) {
			$img = wp_get_attachment_image_src( $attachments[ 0 ]->ID, $size, false );

			return $img[ 0 ];
		}
	} else {
		
		$thumb_id = get_post_thumbnail_id( $id );
		$url      = wp_get_attachment_image_src( $thumb_id, $size );

		if( ! $url ) {
			return '';
		}

		return $url[ 0 ];
	}
	
	return '';
}

/**
 * Получаем количество просмотров записи
 *
 * @param $postID
 *
 * @return integer
 */
function getPostViews( $postID ) {
	
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		add_post_meta( $postID, $count_key, '0' );

		return "0";
	}

	return $count;
}

function show_more_posts() {

	$offset = '';
	if ( isset( $_POST[ 'offset' ] ) && ! empty( $_POST[ 'offset' ] ) && is_numeric( $_POST[ 'offset' ] ) ) {
		$offset = $_POST[ 'offset' ];
	}
	$data_cat = 0;
	if ( isset( $_POST[ 'data_cat' ] ) && ! empty( $_POST[ 'data_cat' ] ) && is_numeric( $_POST[ 'data_cat' ] ) ) {
		$data_cat = $_POST[ 'data_cat' ];
	}

	$args = [
		'numberposts'      => 5,
		'category'         => $data_cat,
		'offset'           => $offset,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => [],
		'exclude'          => [],
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true,
	];

	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$post->view            = getPostViews( $post->ID );
		$post->thumb_photo     = theme_thumb_photo( $post->ID );
		$post->permalink       = '<h2 class="blog-title"><a href="/' . $post->post_name . '">' . $post->post_title . '</a></h2>';
		$post->date            = '<time class="meta-time" datetime="' . date( 'F d, Y', strtotime( $post->post_date ) ) . '" itemprop="datePublished">' . date( 'F d, Y', strtotime( $post->post_date ) ) . '</time>';
		$categories            = get_the_category( $post->ID );
		$post->category        = '<a href="category/' . $categories[ 0 ]->slug . '" rel="category tag">' . $categories[ 0 ]->name . '</a>';
		$post->comments_number = $post->comment_count;
		$post->read_more       = '<a class="btn more-link" href="/' . $post->post_name . '" target="_blank">Read More</a>';
	}
	wp_send_json( $posts );
}
add_action( 'wp_ajax_nopriv_more_posts', 'show_more_posts' );
add_action( 'wp_ajax_more_posts', 'show_more_posts' );

/**  @param $postID */
function setPostViews( $postID ) {
	
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	
	if( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}

//add_action( 'wp', function () {
//
//	if( ! session_id() ) {
//		session_start();
//	}
//
//	if( is_single() ) {
//
//		$postID = get_the_ID();
//
//		if( ! isset( $_SESSION[ 'post_views' ] ) ) {
//			$_SESSION[ 'post_views' ] = [];
//		}
//
//		if( ! in_array( $postID, $_SESSION[ 'post_views' ] ) ) {
//			$_SESSION[ 'post_views' ][ $postID ] = $postID;
//			setPostViews( $postID );
//		}
//	}
//} );