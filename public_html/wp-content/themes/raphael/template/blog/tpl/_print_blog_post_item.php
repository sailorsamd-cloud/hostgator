<?php

function print_blog_post_item( $post ) {

    $post_link           = $post['post_link'];
    $post_img            = $post['post_img'];
    $post_category_links = $post['post_category_links'];
    $post_title          = $post['post_title'];
    $post_author         = $post['post_author'];
    $post_date           = $post['post_date'];
    $post_views_count    = $post['post_views_count'];


    $html = sprintf(

        '<div class="blog-posts-wrap__item">

                    <div class="blog-post-item">
                
                        <a href="%1$s"  class="blog-post-item__img-wrap">
                            <div class="blog-post-item__img-wrap-inner">
                                %2$s
                            </div>
                        </a>
                
                        <div class="blog-post-item__tag-list">
                            %3$s
                        </div>
                
                        <a href="%1$s" class="blog-post-item__title">
                            %4$s
                        </a>
                
                        <div class="blog-post-item__more-info">
                
                            <div class="blog-post-item__more-info-author">
                                <span class="blog-post-item__span-by">
                                    %5$s
                                </span>
                                <div class="blog-post-item__more-info-author-link">
                                    %6$s
                                </div>
                                %7$s
                            </div>
                            
                            <div class="blog-post-item__more-info-views-count">
                                <i class="fa fa-eye"></i> %8$s                                                
                            </div>
                
                        </div>
                
                    </div>
                
                </div>',

        $post_link,
        $post_img,
        $post_category_links,
        $post_title,
        __( 'by', 'rap' ),
        $post_author,
        $post_date,
        $post_views_count
    );

    return $html;

}
