<?php

global $img_size;
$viewed = ads_recently_viewed_ids();

if( count( $viewed ) > 0 ) : ?>
    <div class="recents_slider_cont">
        <div class="container">
            <h3><?php _e('Recently Viewed', 'elgreco') ?></h3>
            <div class="recents_slider">
                <?php
                query_posts( [
                    'post_type'      => 'product',
                    'posts_per_page' => 8,
                    'post__in'       => ads_shuffle_assoc( $viewed ),
                    '_orderby'       => 'post_id',
                    '_order'         => 'array',
                    'post_status'    => [ 'publish' ]
                ] );

                if( have_posts() ) : while ( have_posts() ) : the_post();
                    echo '<div class="item swiper-slide">';
                    do_action( 'adstm_product_item', 'ads-large', true );
                    echo '</div>';
                endwhile; endif;

                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>