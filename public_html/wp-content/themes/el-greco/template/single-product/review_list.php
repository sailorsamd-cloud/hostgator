<?php

global $wp_query;
global $ADSTM;
global $post;

$reviews = $ADSTM[ 'review' ];

$posts_per_page =
    isset( $wp_query->query_vars[ 'comments_per_page' ] ) && intval( $wp_query->query_vars[ 'comments_per_page' ] ) ?
        $wp_query->query_vars[ 'comments_per_page' ] : intval( get_option( 'comments_per_page' ) );
?>
<?php if( comments_open() ){ ?>
    <div class="fullreviews">
        <div class="rev_comments">
            <?php
            $page_comments = get_option( 'page_comments' );
            if(!$page_comments){
                $args = array(
                    'number'=>1500,
                    'offset'=>0,
                    'status'=>'approve',
                    'post_id' => $post->ID
                );
                ?>

                <div class="revs" data-perpage="<?php echo $posts_per_page; ?>">
                    <?php
                    foreach (get_comments($args) as $comment) {
                        $gallery_images = get_comment_meta( $comment->comment_ID, 'images', true );
                        $images = maybe_unserialize($gallery_images);
                        $size = 'ads-medium';
                        $gallery = \ads\adsPost::get_gallery($images, $size);
                        $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
                        ?>
                        <div <?php comment_class('feedback-one'); ?> id="li-comment-">
                            <div class="author-text">
                                <?php
                                if($comment->flag){
                                    printf( '<img class="flag" %2$s="%1$s"/>',  pachFlag( $comment->flag ) . '', $src );
                                }else{
                                    $comment_flag = get_comment_meta($comment->comment_ID, 'flag');
                                    if(isset($comment_flag) && isset($comment_flag[0])){
                                        printf( '<img class="flag" %2$s="%1$s"/>',  pachFlag( $comment_flag[0] ) . '', $src );
                                    }
                                }
                                printf( '<span class="name">%1$s</span>', $comment->comment_author);
                                if(cz('tp_revdate'))printf( '<div class="date">%1$s</div>', date_i18n( 'j M Y', strtotime( $comment->comment_date ) )); ?>
                            </div>
                            <div class="feedback">
                                <div class="star-text">
                                    <?php if($comment->star > 0 && false){ ?>
                                        <div class="stars">
                                            <?php  adsFeedBackTM::renderStarRating( $comment->star ); ?>
                                        </div>
                                    <?php }else{
                                        $comment_star = get_comment_meta($comment->comment_ID, 'star');
                                        if(isset($comment_star) && isset($comment_star[0])){ ?>
                                            <div class="stars">
                                                <?php  adsFeedBackTM::renderStarRating( $comment_star[0] ); ?>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>


                                <?php printf( '<p class="text">%1$s</p>', str_replace("\r\n",'<br \>',trim($comment->comment_content)));
                                if ($gallery) { ?>
                                    <div class="gallery revpics">
                                        <?php foreach ($gallery as $image):?>
                                            <a href="<?php echo ads_get_size_img( $image[ 'url' ], 'ads-large' );  ?>">
                                                <img <?php echo $src; ?>="<?php echo $image[$size];?>" >
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php } ?>


                                <?php if(cz('tp_irecommend_enable')){ ?>
                                    <div class="irecommend">
                                        <i class="icons-thumbs-up-alt"></i>
                                        <?php _e( 'Yes, I recommend this product', 'elgreco' ); ?>

                                    </div>
                                <?php }; ?>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>
                <?php


            }else{ ?>
                <div class="revs" data-perpage="<?php echo $posts_per_page; ?>">
                    <?php

                    wp_list_comments( [
                        'walker'            => null,
                        'max_depth'         => '',
                        'style'             => 'div',
                        'callback'          => 'list_review',
                        'end-callback'      => null,
                        'type'              => 'all',
                        'reply_text'        => 'Reply',
                        'page'              => 1,
                        'per_page'          => 1500,
                        'avatar_size'       => 32,
                        'reverse_top_level' => null,
                        'reverse_children'  => '',
                        'format'            => 'html5',
                        'echo'              => true,
                        'status'            => 'approve'
                    ], $reviews->comments );
                    ?>
                </div>
                <div class="pagercont">
                    <div class="pager">
                        <?php paginate_comments_links( [
                            'prev_text' => '<i class="arrowleft"></i>',
                            'next_text' => '<i class="arrowright"></i>',
                            'current'   => $reviews->getPage()
                        ] ); ?>
                    </div>
                </div>
                <?php if( get_comment_pages_count() > 1 ) : ?>
                    <div class="load_more_cont">
                        <span class="loadmore loadmore_review btn-black" data-max="<?php echo get_comment_pages_count();?>"><?php _e( 'Load More', 'elgreco' ) ?></span>
                    </div>

                <?php endif; ?>
            <?php } ?>
        </div>
    </div>
<?php } ?>