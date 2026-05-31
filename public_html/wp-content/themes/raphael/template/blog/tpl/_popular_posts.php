<?php

// The Query
$the_query = new WP_Query( array(
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 5
));

// The Loop
if ( $the_query->have_posts() ) { ?>

    <div class="blog-articles">

        <div class="blog-articles__header">
            <?php _e( 'Popular', 'rap' ) ?>
        </div>

        <?php while ( $the_query->have_posts() ) { ?>

            <?php $the_query->the_post(); ?>

            <div class="blog-articles__item">

                <a href="<?php echo get_the_permalink(); ?>" class="blog-articles__item-title">
                    <?php echo get_the_title(); ?>
                </a>

                <div class="blog-articles__item-tags">
                    <?php echo get_the_category_list( ', ', 1 ); ?>
                </div>

            </div>

        <?php } ?>

        <?php wp_reset_postdata(); ?>

    </div>

<?php } ?>