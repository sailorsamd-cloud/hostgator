<?php

if(!function_exists('list_review')){
    function list_review( $comment, $args, $depth ) {
        $images = maybe_unserialize($comment->images);
        $size = 'ads-medium';
        $gallery = \ads\adsPost::get_gallery($images, $size);

        $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';


        ?>
        <div <?php comment_class('feedback-one'); ?> id="li-comment-<?php comment_ID() ?>">
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

        <?php
    }
}