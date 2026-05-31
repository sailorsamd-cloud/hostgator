<?php
/**
 * Created by PhpStorm.
 * User: sunfun
 * Date: 07.09.16
 * Time: 9:21
 */
if(!function_exists('list_review')){
	function list_review( $comment, $args, $depth ) {
        $src = cz( 'tp_item_imgs_lazy_load' ) ? 'data-src' : 'src';
        $images = maybe_unserialize($comment->images);
        $size = 'ads-small';
        $gallery = \ads\adsPost::get_gallery($images, $size);

        if (!$gallery) {
	            $gallery = array();
	        }
		?>
		<div <?php comment_class('feedback-one'); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="author-text">
				<?php printf( '<span class="name" itemprop="name">%1$s</span>', $comment->comment_author); ?>
				<?php if($comment->flag AND cz('tp_comment_flag')){
					printf( '<img class="flag" src="%1$s"/>',  pachFlag( $comment->flag ) . '?1000' );
				} ?>
			</div>
			<div class="feedback">

				<?php if(cz('review_date'))printf( '<div class="date">%1$s</div>', date_i18n( 'j M Y H:i', strtotime( $comment->comment_date ) )); ?>

                <div class="star-text">
					<span itemprop="itemReviewed">
					<meta itemprop="name" content="<?php the_title(); ?>"/>
					</span>
                    <?php if($comment->star > 0){ ?>
                        <div class="stars">
                            <?php  adsFeedBackTM::renderStarRating( $comment->star ); ?>
                        </div>
                    <?php } ?>
                </div>


				<?php printf( '<p class="text">%1$s</p>', $comment->comment_content ); ?>
                <div class="gallery">
                    <?php foreach ($gallery as $image):?>
	                        <a href="<?php echo ads_get_size_img( $image[ 'url' ], 'ads-large' );  ?>">
		                            <img <?php echo $src; ?>="<?php echo $image[$size];?>" >
		                        </a>
	                    <?php endforeach; ?>
                </div>
			</div>
		</div>
		<?php
	}
}