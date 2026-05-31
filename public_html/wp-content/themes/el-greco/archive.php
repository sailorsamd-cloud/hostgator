<?php

if ( is_post_type_archive('product') || is_tax( 'product_cat' ) ){
	// Is Products
	get_template_part( 'loop', 'product' );
}else{
	// If Blogs
	get_template_part( 'loop', 'blog' );
}
