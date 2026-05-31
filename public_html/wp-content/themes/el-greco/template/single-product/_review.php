<?php

global $ADSTM;

$reviews = $ADSTM[ 'review' ];
?>

<div>
    <div class="item-revs content">
        <h3 <?php _cztxt('tp_tab_reviews_label'); ?>><?php _cz('tp_tab_reviews_label'); ?></h3>

        <?php if( $reviews->countFeedback() > 0 ): ?>

            <div class="reviews-text">
                <svg class="" width="18" height="18" viewBox="0 0 18 18"><g fill="none" fill-rule="evenodd"><path fill="#50C450" d="M8.886 16.545l-2.115.849-1.476-1.727-2.27-.224-.498-2.209-1.906-1.245.595-2.185L.11 7.823l1.55-1.661-.05-2.263 2.151-.757 1.016-2.026 2.26.321L8.885.111l1.85 1.326 2.258-.321 1.017 2.026 2.15.757-.05 2.263 1.55 1.66-1.104 1.982.595 2.185-1.906 1.245-.498 2.21-2.27.223-1.476 1.727z"></path><path fill="#FFF" d="M5.645 8.91l-1.09 1.08 2.907 2.884L14 6.748l-1.09-1.081-5.45 5.045z"></path><path d="M-1-1h20v20H-1z"></path></g></svg>
                <?php _e('Our reviews are verified for authenticity', 'elgreco');?>
            </div>

            <?php get_template_part('template/single-product/review_static'); ?>

        <?php else: ?>
            <p class="text-center noreviews"><?php _e( 'There are no reviews yet', 'elgreco' ) ?> </p>
        <?php endif; ?>

        <?php if( cz( 'tp_enable_leave_review_box' ) ): ?>
            <?php get_template_part('template/single-product/leave_review'); ?>
        <?php endif; ?>

        <?php get_template_part('template/single-product/review_list'); ?>
    </div>
</div>




