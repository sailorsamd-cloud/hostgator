<div class="blog-breadcrumbs">
    <div class="container">

    <?php
    
    if( is_single() ) {

	    adsTmpl::breadcrumbs();

    } else {

        $html = '';

        $home_url = home_url();
        $home_page_title = __( 'Home', 'rap' );
        $blog_page_title = get_the_title( get_option('page_for_posts', true) );

        $category = get_queried_object();
        $is_blog_category_page = false;

        if( is_object( $category ) ) {
	        $is_blog_category_page = $category->term_id ? true : false;
        }

        if( !$is_blog_category_page ) {

            $html = sprintf(

                '<div class="pr-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">

                        <a href="%1$s" rel="v:url" property="v:title">
                            %2$s
                        </a>
               
                        <span class="fa fa-angle-right"></span>
                
                        <span class="current">%3$s</span>
                
                </div>',

                $home_url,
                $home_page_title,
                $blog_page_title
            );

        } else {

            $html = sprintf(

                '<div class="pr-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">

                        <a href="%1$s" rel="v:url" property="v:title">
                            %2$s
                        </a>
               
                        <span class="fa fa-angle-right"></span>
    
                        <span class="current">
                            <a href="%3$s">
                                %4$s
                            </a>
                        </span>
                        
                        <span class="fa fa-angle-right"></span>
                
                        <span class="current">%5$s</span>
                
                </div>',

                $home_url,
                $home_page_title,
                get_permalink( get_option( 'page_for_posts' ) ),
                $blog_page_title,
                $category->name
            );

        }

        echo $html;

    }

    ?>

    </div>
</div>
