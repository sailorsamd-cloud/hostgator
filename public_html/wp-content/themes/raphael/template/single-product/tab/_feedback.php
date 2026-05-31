<?php $reviews = adsTmpl::review(); ?>

        <div class="sm-feedback">
            <?php if($reviews->countFeedback() > 0):?>
            <?php get_template_part( 'template/single-product/_feedback-static' ) ?>
            <?php endif; ?>

            <?php comments_template( '/template/single-product/_review.php' ); ?>
        </div>

