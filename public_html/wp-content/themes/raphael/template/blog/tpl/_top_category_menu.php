<?php

/**
 * Print categories lists of Blog for mobile and desktop.
 *
 * @param string $list_class Class for list.
 * @param string $active_class Active class for list item.
 * @param boolean $create_mobile_menu Flag for creation of mobile menu.
 * @param string $mobile_list_class Class for mobile menu.
 */

function get_top_blog_category_menu( $list_class = '', $active_class = 'active', $create_mobile_menu = false, $mobile_list_class = '' ) {

	$queried_object = get_queried_object();
	$post_slug  = '';

	if( is_object($queried_object) ) {
		$post_slug  = get_queried_object()->slug;
	}

	$categories = get_categories(
		array(
			'taxonomy' => 'category',
			'orderby'  => 'name',
			'order'    => 'ASC',
	        'child_of' => 0,
        )
	);

	$mobile_list = '';

	if( $create_mobile_menu ) {
		$mobile_list = get_top_blog_mobile_category_menu( $post_slug, $categories, $mobile_list_class );
	}

    $list_start  = '<ul class="'. $list_class .'">';
    $list_end = '</ul>';
	$list  = '';
	$item_active_class = $active_class;
	$first_item_active_class = $item_active_class;

	foreach( $categories as $category ) {

		if( $category->count > 0 ) {

            $item_class = '';

			if( ($category->slug) == $post_slug ) {
                $item_class = $item_active_class;
                $first_item_active_class = '';
            }

			$list .= sprintf(
				'<li class="%2$s" ><a href="%1$s">%3$s</a></li>', get_term_link( $category->term_id , 'category' ), $item_class, $category->name
			);
		}
	}

    $first_list_item = '' . sprintf(
        '<li class="%2$s" ><a href="%1$s">%3$s</a></li>', home_url('blog'), $first_item_active_class, __( 'All Categories', 'rap' )
    );

    $list = $list_start . $first_list_item . $list . $list_end;
	$list .= $mobile_list;

	echo $list;
}

/**
 * Create html for categories mobile list of Blog.
 *
 * @param string $post_slug.
 * @param array $categories.
 * @param string $mobile_list_class Class for mobile list.
 * @return string (output html) for categories mobile list.
 */

function get_top_blog_mobile_category_menu( $post_slug = '', $categories = [], $mobile_list_class = '' ) {

	$list_wrap_start = '<div class="'. $mobile_list_class  .' '. 'js-'. $mobile_list_class.'">';
	$list_wrap_end = '</div>';

	$list_toogle_btn = '';
	$list_toogle_btn_title = '';

	$list_start  = '<ul class="'. $mobile_list_class .'__list' .' '. 'js-'. $mobile_list_class .'__list">';
	$list_end = '</ul>';
	$list  = '';
	$first_list_item = '';

	foreach( $categories as $category ) {

		if( $category->count > 0 ) {

			if( ($category->slug) == $post_slug ) {
				$list_toogle_btn_title = $category->name;
			} else {
				$list .= sprintf(
					'<li><a href="%1$s">%2$s</a></li>', get_term_link( $category->term_id , 'category' ), $category->name
				);
			}

		}
	}

	if( !strlen($list) ) return '';

	if( !strlen($list_toogle_btn_title) ) {
		$list_toogle_btn_title = __( 'All Categories', 'rap' );
	} else {
		$first_list_item .= sprintf(
			'<li ><a href="%1$s">%2$s</a></li>', home_url('blog'), __( 'All Categories', 'rap' )
		);
	}

	$list_toogle_btn .=
			'<div class="'. $mobile_list_class .'__toogle-btn' .' '. 'js-'. $mobile_list_class .'__toogle-btn"><span class="blog-mobile-cat-name">' . $list_toogle_btn_title . '</span> <span class="blog-mobile-cat-toogle-icon"></span></div>';

	$list = $list_wrap_start . $list_toogle_btn . $list_start . $first_list_item . $list . $list_end .$list_wrap_end;

	return $list;

}
