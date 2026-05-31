<?php

$cats = get_the_category();
$args = array(
    'post_type' => 'post',
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => 3,
    'cat'     => $cats[0]->term_id
);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) { ?>

    <div class="blog-single-related-products">

        <div class="blog-single-related-products__title">
            <?php _e( 'Related posts', 'rap' ) ?>
        </div>

        <div class="blog-single-related-products-list">
            <div class="blog-single-related-products-list__inner">

                <?php while ( $the_query->have_posts() ) { ?>

                    <?php $the_query->the_post(); ?>

                    <a href="<?php echo get_the_permalink(); ?>" class="blog-single-related-products-item">

                        <div class="blog-single-related-products-item__inner">

                            <div class="blog-single-related-products-item__img-wrap">

                                <?php

                                $post_img = get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'blog-single-related-products-item__img' ) );
                                echo $post_img;

                                ?>

                            </div>


                            <div class="blog-single-related-products-item__title">
                                <?php echo get_the_title(); ?>
                            </div>

                        </div>

                    </a>

                <?php } ?>

            </div>

        <?php wp_reset_postdata(); ?>

        </div>
    </div>

<?php } ?>

